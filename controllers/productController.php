<?php
require_once("token.php");
class Product extends Token
{
    // public $product;
    public function getProduct($id){
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

    public function inputCart($pid){
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
        if($msg){
            $res["result"] = true;
            return $res;
        } else {
            $res["result"] = false;
            return $res;
        }
    }
    public function showCart($id){
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
            $res["result"] =  false;
            return $res;
        }
    }

    public function remove($id){
        $user = $this->ckCookie();
        $sql = "DELETE FROM `cart` WHERE `cart`.`id` = ? AND userId = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("ii", $id["del"], $user["id"]);
        $msg = $stmt->execute();
        if($msg){
            $res["result"] = true;
            return $res;
        } else {
            $res["result"] = false;
            return $res;
        }
    }

    public function Checkout($data){
        $user = $this->ckCookie();
        $cart = $this->showCart($user["id"]);
        date_default_timezone_set("Asia/Taipei");
        $time=date("Y-m-d H:i:s");
        foreach($cart as $value){
            $sql = "INSERT INTO `shopping` (`userId`, `gameId`, `gameName`, `store`, `price`, `date`)"
                     . "VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param("iissis", 
                        $user["id"], $value["gameId"], $value["gameName"], $data["store"], $value["price"], $time);
            $msg = $stmt->execute();
        }

        $sql2 = "DELETE FROM `cart` WHERE userId = ?";
        $stmt = $this->mysqli->prepare($sql2);
        $stmt->bind_param("i", $user["id"]);
        $msg2 = $stmt->execute();
        if($msg && $msg2){
            $res["result"] = true;
            return $res;
        } else {
            $res["result"] = false;
            return $res;
        }

    }

}
