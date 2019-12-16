<?php

require_once("token.php");

class User extends Token
{
    public $list = 5;

    /**
     * 註冊
     */
    public function register($origin)
    {
        $acFlag = preg_match('/^\w{6,12}$/', $origin["account"]);
        $pwFlag = preg_match('/^\w{6,12}$/', $origin["password"]);
        if (!($acFlag
            && $pwFlag
            && ($origin["password"] === $origin["ckPassword"])
            && $origin["name"] != "")) {
            $res["result"] = "格式不符";
            return $res;
        }

        $account = $origin["account"];
        $sql = "SELECT COUNT(*) as amount FROM `users` WHERE account = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("s", $origin["account"]);
        $result = $stmt->execute();
        $result = $stmt->get_result();
        $result = $result->fetch_assoc();
        if ($result["amount"] > 0) {
            $res["result"] = "帳號已存在";
            return $res;
        }
        // $sql = "SELECT COUNT(*) as amount FROM `users` WHERE account = $account";
        // $result = $this->mysqli->query($sql);
        // var_dump($result["amount"]);
        
        // $sql = "SELECT * FROM `users` WHERE account = ?";
        // $stmt = $this->mysqli->prepare($sql);
        // $stmt->bind_param("s", $origin["account"]);
        // $stmt->execute();
        // $result = $stmt->get_result();
        // if (($result->num_rows > 0)) {
        //     $res["result"] = "帳號已存在";
        //     return $res;
        // }
        
        $pwd = password_hash($origin["password"], PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(nickName, account, password)" . "VALUES (?, ?, ?)";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('sss', $origin["name"], $account, $pwd);
        $msg = $stmt->execute();
        if ($msg) {
            $res["result"] = "成功";
            return $res;
        } else {
            $res["result"] = "error";
            return $res;
        }
    }

    /**
     * 登入
     */
    public function login($origin)
    {
        $acFlag = preg_match('/^\w{6,12}$/', $origin["account"]);
        $pwFlag = preg_match('/^\w{6,12}$/', $origin["password"]);
        if (!($acFlag && $pwFlag)) {
            $res["result"] = false;
            return $res;
        }
        $sql = "SELECT * FROM `users` WHERE account = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("s", $origin["account"]);
        $stmt->execute();

        $result = $stmt->get_result();
        if (!($result->num_rows > 0)) {
            $res["result"] = false;
            return $res;
        }
        $user = $result->fetch_object();
        if (password_verify($origin["password"], $user->password)) {
            $id = $user->id;
            $token = $user->account;
            $token = password_hash($token, PASSWORD_DEFAULT);
            $sql = "UPDATE `users` SET `token` = ? WHERE `id` = ?";
            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param("si", $token, $id);
            $stmt->execute();
            setcookie("token", $token, time() + 3600, "/");
            // $res["token"] = $token;
            $res["result"] = true;
            return $res;
        } else {
            $res["result"] = false;
            return $res;
        }
    }

    /**
     * 登出
     */
    public function logout()
    {
        $sql = "SELECT * FROM `users` WHERE token = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("s", $_COOKIE["token"]);
        $stmt->execute();
        $result = $stmt->get_result();

        $user = $result->fetch_object();
        $id = $user->id;
        $token = null;
        $sql = "UPDATE `users` SET `token` = ? WHERE `id` = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("si", $token, $id);
        $msg = $stmt->execute();

        if ($msg) {
            setcookie("token", "", time() - 3600, "/");
            $res["result"] = true;
            return $res;
        } else {
            $res["result"] = false;
            return $res;
        }
    }

    /**
     *  計算管理會員有幾頁
     */
    public function createPage()
    {
        $sql = "SELECT COUNT(*) as total FROM `users` WHERE `level` = 0";
        $result = $this->mysqli->query($sql);
        $res = $result->fetch_assoc();
        $res = ceil($res['total'] / $this->list);
        return $res;
    }

    /**
     * 製作管理會員分頁
     */
    public function showpage($page)
    {
        $pages = isset($page) ? $page : 1;
        $start = ($pages - 1) * $this->list;
        $sql = "SELECT * FROM `users` WHERE `level` = 0 ORDER BY `id` LIMIT {$start}, {$this->list}";
        $result = $this->mysqli->query($sql);
        while ($row = $result->fetch_assoc()) {
            $all[] = $row;
        }
        return $all;
    }

    /**
     * 會員清單
     */
    public function userList()
    {
        $user = $this->ckCookie();
        if ($user["level"] === 1) {
            $sql = "SELECT * FROM `users` WHERE `level` = 0";
            $result = $this->mysqli->query($sql);
            // $stmt->bind_param("i", 0);
            // $stmt->execute();
            // $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                $userList[] = $row;
            }
            return $userList;
        } else {
            $res["result"] = false;
            return $res;
        }
    }

    /**
     * 會員停復權
     */
    public function Suspension($member)
    {
        $this->ckCookie();
        if ($member["permission"] === "1") {
            $sql = "UPDATE `users` SET `permission` = '0' WHERE `users`.`id` = ?";
            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param("i", $member["userId"]);
            $msg = $stmt->execute();
            if ($msg) {
                $res["result"] = true;
                return $res;
            } else {
                $res["result"] = false;
                return $res;
            }
        } else {
            $sql = "UPDATE `users` SET `permission` = '1' WHERE `users`.`id` = ?";
            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param("i", $member["userId"]);
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

}
