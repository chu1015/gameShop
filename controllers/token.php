<?php
class Token
{
    public $mysqli, $user;
    /**
     * 建立資料庫連線
     */
    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }
    
    /**
     * 確認登入者cookie裡的token
     */
    public function ckCookie()
    {
        if(isset($_COOKIE["token"])){
        $sql = "SELECT * FROM `users` WHERE token = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("s", $_COOKIE["token"]);
        $stmt->execute();
        $result = $stmt->get_result();
        if (!($result->num_rows > 0)){
            $res["result"] = "error";
            setcookie("token", "", time() - 3600, "/");
            return $res;
        }
        $data = $result->fetch_object();
        $user["result"] = "";
        $user["id"] = $data->id;
        $user["nickName"] = $data->nickName;
        $user["account"] = $data->account;
        $user["level"] = $data->level;
        $user["permission"] = $data->permission;
        return $user;
     }
    }

}
