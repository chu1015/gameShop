<?php
require_once("token.php");
class User extends Token
{
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
        $sql = "SELECT COUNT(*) as amount FROM `users` WHERE account = $account";
        $stmt = $this->mysqli->query($sql);
        $result = $stmt->fetch_assoc();
        if ($result) {
            $res["result"] = "帳號已存在";
            return $res;
        }

        $pwd = password_hash($origin["password"], PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(nickName, account, password)" . "VALUES (?,?,?)";
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

    public function logout()
    {
        $sql = "SELECT * FROM `users` WHERE token = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("s", $_COOKIE["token"]);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $user = $result->fetch_object();
        $id = $user->id;
        $token = NULL;
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

}
