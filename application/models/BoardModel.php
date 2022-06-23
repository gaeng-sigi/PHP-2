<?php

namespace application\models;

use PDO;

class BoardModel extends Model
{
    public function insBoard(&$param)
    {
        $sql = "INSERT INTO t_board(title, ctnt, i_user)
                VALUES(:title, :ctnt, :i_user)";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute(array($param["title"], $param["ctnt"], $param["i_user"]));
    }

    public function selBoardList()
    {
        $sql = "SELECT A.i_board, A.title, A.ctnt, B.nm, A.created_at
        FROM t_board A
        INNER JOIN t_user B
        ON A.i_user = B.i_user
        ORDER BY A.i_board DESC";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function selBoard(&$param)
    {
        $sql = "SELECT A.i_user, A.i_board, A.title, A.ctnt, B.nm, A.created_at
                FROM t_board A
                INNER JOIN t_user B
                ON A.i_user = B.i_user
                WHERE A.i_board = :i_board";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute(array($param["i_board"]));

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function updBoard(&$param)
    {
        $sql = "UPDATE t_board
                SET title = :title, ctnt = :ctnt
                WHERE i_board = :i_board";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute(array($param["title"], $param["ctnt"], $param["i_board"]));
    }

    public function delBoard(&$param)
    {
        $sql = "DELETE FROM t_board
                WHERE i_board = :i_board";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute(array($param["i_board"]));
    }
}
