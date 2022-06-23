<?php

namespace application\models;

use PDO;

class UserModel extends Model
{
    public function insUser(&$param)
    {
        $sql = "INSERT INTO t_user(uid, upw, nm, gender)
                VALUES(:uid, :upw, :nm, :gender)";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute(array($param["uid"], $param["upw"], $param["nm"], $param["gender"]));
    }

    public function selUser(&$param)
    {
        $sql = "SELECT * FROM t_user WHERE uid = :uid";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute(array($param["uid"]));

        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
