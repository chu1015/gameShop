<?php
require_once("token.php");
class Product extends Token
{
    public $list = 12;
    public $managerList = 10;

    ##計算首頁有幾頁
    public function createPage()
    {
        $sql = "SELECT COUNT(*) as total FROM `list` WHERE `status` = 1";
        $result = $this->mysqli->query($sql);
        $res = $result->fetch_assoc();
        $res = ceil($res['total'] / $this->list);
        return $res;
    }

    /**
     * 製作首頁分頁
     */
    public function showpage($page)
    {
        $pages = isset($page) ? $page : 1;
        $start = ($pages - 1) * $this->list;
        $sql = "SELECT * FROM `list` WHERE `status` = 1 ORDER BY `id` LIMIT {$start}, {$this->list}";
        $result = $this->mysqli->query($sql);
        while ($row = $result->fetch_assoc()) {
            $all[] = $row;
        }
        return $all;

    }

    /**
     * 首頁清單
     */
    public function productList()
    {
        $sql = "SELECT * FROM `list` WHere `status` = 1";
        $result = $this->mysqli->query($sql);

        while ($row = $result->fetch_assoc()) {
            $all[] = $row;
        }
        return $all;
    }

    /**
     * 管理商品清單分頁計算
     */
    public function controlProduct()
    {
        $sql = "SELECT COUNT(*) as total FROM `list`";
        $result = $this->mysqli->query($sql);
        $res = $result->fetch_assoc();
        $res = ceil($res['total'] / $this->managerList);
        return $res;

        // $sql = "SELECT * FROM `list`";
        // $result = $this->mysqli->query($sql);
    
        // while ($row = $result->fetch_assoc()) {
        //     $all[] = $row;
        // }
        // return $all;
    }

    /**
     * 管理商品清單分頁製作
     */
    public function controlProductShow($page)
    {
        $pages = isset($page) ? $page : 1;
        $start = ($pages - 1) * $this->managerList;
        $sql = "SELECT * FROM `list` ORDER BY `id` LIMIT {$start}, {$this->managerList}";
        $result = $this->mysqli->query($sql);
        while ($row = $result->fetch_assoc()) {
            $all[] = $row;
        }
        return $all;

    }

    /**
     * 產品內容
     */
    public function getProduct($id)
    {
        $sql = "SELECT * FROM `list` WHERE `id` = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $list = $result->fetch_object();
        $product["id"] = $list->id;
        $product["name"] = $list->name;
        $product["descript"] = $list->descript;
        $product["price"] = $list->price;
        $product["img"] = $list->img;
        return $product;
    }

    /**
     * 放進購物車
     */
    public function inputCart($pid)
    {
        // return $id;
        $user = $this->ckCookie();
        $product = $this->getProduct($pid["id"]);
        // $user = $this->user;
        // return $user;
        // return $product;
        $sql = "INSERT INTO cart(userId, gameId, gameName, price)" . "VALUES (?, ?, ?, ?)";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("iisi", $user["id"], $product["id"], $product["name"], $product["price"]);
        $msg = $stmt->execute();
        if ($msg) {
            $res["result"] = true;
            return $res;
        } else {
            $res["result"] = false;
            return $res;
        }
    }

    /**
     * 購物車清單
     */
    public function showCart($id)
    {
        $sql = "SELECT * FROM `cart` WHERE userId = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            while ($row = $result->fetch_assoc()) {
                $all[] = $row;
            }
            return $all;
        } else {
            $res["result"] = false;
            return $res;
        }
    }

    /**
     * 購物車清單
     */
    public function countCart($id)
    {
        $sql = "SELECT * FROM `cart` WHERE userId = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $num = mysqli_num_rows($result);
        return $num;
    }

    /**
     * 移除購物車內容
     */
    public function remove($id)
    {
        $user = $this->ckCookie();
        $sql = "DELETE FROM `cart` WHERE `cart`.`id` = ? AND userId = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("ii", $id["del"], $user["id"]);
        $msg = $stmt->execute();
        if ($msg) {
            $res["result"] = true;
            return $res;
        } else {
            $res["result"] = false;
            return $res;
        }
    }

    /**
     * 結帳
     */
    public function Checkout($data)
    {
        $user = $this->ckCookie();
        $cart = $this->showCart($user["id"]);
        date_default_timezone_set("Asia/Taipei");
        $time = date("Y-m-d H:i:s");
        // "INSERT INTO `shopping` (`userId`, `gameId`, `gameName`, `store`, `price`, `date`)
        //                          (SELECT `userId`, `gameId`, `gameName`, "7-11", `price`, "2019-12-06 17:03:00" FROM `cart`)"

        // foreach ($cart as $value) {
            // $sql = "INSERT INTO `shopping` (`userId`, `gameId`, `gameName`, `store`, `price`, `date`)"
            //     . "VALUES (?, ?, ?, ?, ?, ?)";
            $sql = "INSERT INTO `shopping` (`userId`, `gameId`, `gameName`, `store`, `price`, `date`)
                        (SELECT ?, `gameId`, `gameName`, ?, `price`, ? FROM `cart` WHERE `userId` = ?)";
            $stmt = $this->mysqli->prepare($sql);
            // $stmt->bind_param("iissis",
            //     $user["id"], $value["gameId"], $value["gameName"], $data["store"], $value["price"], $time);
            $stmt->bind_param("issi", $user["id"], $data["store"], $time, $user["id"]);
            $msg = $stmt->execute();
        // }

        $sql2 = "DELETE FROM `cart` WHERE userId = ?";
        $stmt = $this->mysqli->prepare($sql2);
        $stmt->bind_param("i", $user["id"]);
        $msg2 = $stmt->execute();
        if ($msg && $msg2) {
            $res["result"] = true;
            return $res;
        } else {
            $res["result"] = false;
            return $res;
        }

    }

    /**
     * 商品上下架
     */
    public function status($data)
    {
        $this->ckCookie();
        if ($data["status"] === "1") {
            $sql = "UPDATE `list` SET `status` = '0' WHERE `list`.`id` = ?";
            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param("i", $data["productId"]);
            $msg = $stmt->execute();
            if ($msg) {
                $res["result"] = true;
                return $res;
            } else {
                $res["result"] = false;
                return $res;
            }
        } else {
            $sql = "UPDATE `list` SET `status` = '1' WHERE `list`.`id` = ?";
            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param("i", $data["productId"]);
            $msg = $stmt->execute();
            if ($msg) {
                $res["result"] = true;
                return $res;
            } else {
                $res["result"] = false;
                return $res;
            }
        }
    }

    /**
     * 商品上傳
     */
    public function upLoad($data)
    {
        $user = $this->ckCookie();
        if ($user["level"] === 1) {
            $sql = "INSERT INTO list(`name`, `descript`, `price`, `img`)" . "VALUES (?, ?, ?, ?)";
            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param("ssis", $data["name"], $data["des"], $data["price"], $data["img"]);
            $msg = $stmt->execute();
            if ($msg) {
                $res["result"] = true;
                return $res;
            } else {
                $res["result"] = false;
                return $res;
            }
        } else {
            $res["result"] = "error";
            return $res;
        }
    }

}
