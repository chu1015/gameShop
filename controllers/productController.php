<?php
require_once "token.php";
class Product extends Token
{
    ## 首頁單頁顯示數量
    public $list = 12;

    ## 管理頁單頁顯示數量
    public $managerList = 10;

    ## 購買紀錄單頁顯示數量
    public $shoppingLog = 10;

    /**
     * 計算首頁有幾頁
     */
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
        $sql = "SELECT * FROM `list` WHERE `status` = 1";
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
        $product["quantity"] = $list->quantity;
        $product["img"] = $list->img;
        $product["status"] = $list->status;
        return $product;
    }

    /**
     * 放進購物車
     */
    public function inputCart($pid)
    {
        $user = $this->ckCookie();
        $product = $this->getProduct($pid["id"]);

        $sql = "SELECT COUNT(*) as amount FROM `cart` WHERE userId = ? AND gameId =?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("ii", $user["id"], $product["id"]);
        $result = $stmt->execute();
        $result = $stmt->get_result();
        $result = $result->fetch_assoc();
        if ($result["amount"] > 0) {
            $res["result"] = "exist";
            return $res;
        }

        $sql = "INSERT INTO cart(userId, gameId, gameName, price, subtotal)" . "VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("iisii", $user["id"], $product["id"], $product["name"], $product["price"], $product["price"]);
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
     * 購物車清單產品列表
     */
    public function showCart($id)
    {
        $sql = "SELECT `list`.`id`, `gameName`, `list`.`price`, `quantity`, `amount`, `cart`.`subtotal`,`list`.`status` FROM `list`, `cart`
                     WHERE `list`.`id` = `cart`.`gameId` AND `cart`.`userId`= ?";
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
     * 購物車清單產品數量
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
     * 改變產品購買數量
     */
    public function qtyChange($data)
    {
        $user = $this->ckCookie();
        $sql = "UPDATE `cart` SET `amount` = ?, `subtotal` = ? WHERE `gameId` = ? AND `userId` = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('iiii', $data["quantity"], $data["subtotal"], $data["id"], $user["id"]);
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
     * 移除購物車內容
     */
    public function remove($id)
    {
        $user = $this->ckCookie();
        $sql = "DELETE FROM `cart` WHERE `gameId` = ? AND userId = ?";
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
     * 確認商品狀態
     */
    public function ckProduct($id)
    {
        $sql = "SELECT COUNT(`list`.`status`) AS 'status' FROM `list`, `cart` WHERE `list`.`id` = `cart`.`gameId` AND  `cart`.`userId`= ? AND `list`.`status` = 0";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = $result->fetch_assoc();
        // var_dump($result["status"]);
        return $result["status"];
        // if ($result["status"] > 0) {
        //     $res["result"] = "productError";
        //     return $res;
        // }
    }

    /**
     * 確認庫存量
     */
    public function ckquantity($id)
    {
        $sql = "SELECT COUNT(*) AS 'compare' FROM `list`, `cart` WHERE
                        `list`.`id` = `cart`.`gameId` AND  `cart`.`userId`= ? AND `list`.`quantity` >= `cart`.`amount`";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = $result->fetch_assoc();
        return $result["compare"];
    }

    /**
     * 購買扣庫存
     */
    public function Subtract($id)
    {
        $sql = "UPDATE `list` AS A,
                (SELECT `cart`.`gameId` AS `gameId`, (`list`.`quantity` - `cart`.`amount`) AS 'uqty'
                    FROM `list`, `cart` WHERE `list`.`id` = `cart`.`gameId` AND  `cart`.`userId`= ? AND `list`.`quantity` >= `cart`.`amount`) AS B
                SET A.`quantity` = B.`uqty`
                WHERE A.`id`= B.`gameId`";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("i", $id);
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
     * 
     * @param array $data 結帳資料
     *
     *  return array 
     * 
     */
    public function Checkout($data)
    {
        $res = [
            'result' => false
        ];

        try
        {
            ## turn on transactions
            $this->mysqli->autocommit(false);

            ## 確認是否被停權
            $user = $this->ckCookie();
            if ($user["permission"] !== 1) {
                throw new Exception("permissionError");
            }

            ## 確認商品是否下架
            $status = $this->ckProduct($user["id"]);
            if ($status > 0) {
                throw new Exception("productError");
            }

            $couuntCart = $this->countCart($user["id"]);
            $compare = $this->ckquantity($user["id"]);

            ## 確認購物車內有無商品
            if ($couuntCart === 0 && $compare === 0) {
                throw new Exception("cartError");
            }

            ## 確認商品庫存是否足夠
            if ($couuntCart !== $compare) {
                throw new Exception("qtyError");
            }

            ## 購買扣庫存
            $Subtract = $this->Subtract($user["id"]);
            if ($Subtract === false) {
                throw new Exception("subtractError");
            }

            ## 將購物車內容輸入到購買紀錄
            date_default_timezone_set("Asia/Taipei");
            $time = date("Y-m-d H:i:s");
            $sql = "INSERT INTO `shopping` (`userId`, `gameId`, `gameName`, `store`, `amount`, `price`, `subtotal`, `date`)
                        (SELECT ?, `gameId`, `gameName`, ?, `amount`, `price`, `subtotal`, ? FROM `cart` WHERE `userId` = ?)";
            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param("issi", $user["id"], $data["store"], $time, $user["id"]);
            $msg = $stmt->execute();

            ## 將購物車內容刪除
            $sql2 = "DELETE FROM `cart` WHERE userId = ?";
            $stmt = $this->mysqli->prepare($sql2);
            $stmt->bind_param("i", $user["id"]);
            $msg2 = $stmt->execute();

            if ($msg !== true || $msg2 !== true) {
                throw new Exception("shopLogError");
            }

            ## turn off transactions + commit queued queries
            $this->mysqli->autocommit(true);
            $res["result"] = true;
        } catch (Exception $e) {
            ## remove all queries from queue if error (undo)
            $this->mysqli->rollback();
            $res["erroMsg"] = $e->getMessage();
        }
        return $res;
    }

    // /**
    //  * 結帳
    //  */
    // public function Checkout($data)
    // {

    //     ## 確認是否被停權
    //     $user = $this->ckCookie();
    //     if ($user["permission"] === 1) {
    //         ##確認商品是否下架
    //         $status = $this->ckProduct($user["id"]);
    //         if ($status > 0) {
    //             $res["result"] = "productError";
    //             return $res;
    //         } else {
    //             ##確認商品庫存是否足夠
    //             $couuntCart = $this->countCart($user["id"]);
    //             $compare = $this->ckquantity($user["id"]);
    //             if ($couuntCart != 0 && $compare!= 0 && $couuntCart == $compare) {
    //                 $Subtract = $this->Subtract($user["id"]);

    //                 ##將購物車內容輸入到購買紀錄
    //                 // $cart = $this->showCart($user["id"]);
    //                 date_default_timezone_set("Asia/Taipei");
    //                 $time = date("Y-m-d H:i:s");
    //                 $sql = "INSERT INTO `shopping` (`userId`, `gameId`, `gameName`, `store`, `amount`, `price`, `subtotal`, `date`)
    //                     (SELECT ?, `gameId`, `gameName`, ?, `amount`, `price`, `subtotal`, ? FROM `cart` WHERE `userId` = ?)";
    //                 $stmt = $this->mysqli->prepare($sql);
    //                 $stmt->bind_param("issi", $user["id"], $data["store"], $time, $user["id"]);
    //                 $msg = $stmt->execute();

    //                 ##將購物車內容刪除
    //                 $sql2 = "DELETE FROM `cart` WHERE userId = ?";
    //                 $stmt = $this->mysqli->prepare($sql2);
    //                 $stmt->bind_param("i", $user["id"]);
    //                 $msg2 = $stmt->execute();
    //                 if ($msg && $msg2) {
    //                     $res["result"] = true;
    //                     return $res;
    //                 } else {
    //                     $res["result"] = false;
    //                     return $res;
    //                 }
    //             } else {
    //                 $res["result"] = "qtyError";
    //                 return $res;
    //             }
    //         }
    //     } else {
    //         $res["result"] = "permissionError";
    //         return $res;
    //     }

    // }

    /**
     * 購買紀錄
     */
    public function shopping()
    {
        $user = $this->ckCookie();
        $sql = "SELECT * FROM `shopping` WHERE `userId` = ? ORDER BY `date` DESC";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("i", $user["id"]);
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
     * 購買紀錄分頁計算
     */
    public function countShoppingPage()
    {
        $user = $this->ckCookie();
        $sql = "SELECT COUNT(*) as total FROM `shopping` WHERE `userId` = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("i", $user["id"]);
        $stmt->execute();
        $result = $stmt->get_result();
        // $result = $this->mysqli->query($sql);
        $res = $result->fetch_assoc();
        $res = ceil($res['total'] / $this->shoppingLog);
        return $res;
    }

    /**
     * 購買紀錄分頁計算
     */
    public function showShopping($page)
    {
        $user = $this->ckCookie();
        $pages = isset($page) ? $page : 1;
        $start = ($pages - 1) * $this->shoppingLog;
        $sql = "SELECT * FROM `shopping` WHERE `userId` = ? ORDER BY `date` DESC LIMIT {$start}, {$this->shoppingLog}";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("i", $user["id"]);
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
            $sql = "INSERT INTO list(`name`, `descript`, `price`, `quantity`, `img`)" . "VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param("ssiis", $data["name"], $data["des"], $data["price"], $data["quantity"], $data["img"]);
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

    /**
     * 商品修改
     */
    public function updateProduct($data)
    {
        $user = $this->ckCookie();
        if ($user["level"] === 1) {
            $sql = "UPDATE `list` SET `name` = ?, `descript` = ?,  `price` = ? ,`quantity` = ?, `img` = ? WHERE `list`.`id` = ?";
            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param('ssiisi', $data["name"], $data["des"], $data["price"], $data["qty"], $data["img"], $data["id"]);
            $msg = $stmt->execute();
            if ($msg) {
                $res["result"] = true;
                return $res;
            } else {
                $res["result"] = false;
                return $res;
            }
        } else {
            $res["result"] = "levelError";
            return $res;
        }
    }

}
