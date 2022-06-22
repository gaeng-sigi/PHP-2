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
        $stmt->bindValue(':title', $param["title"]);
        $stmt->bindValue(':ctnt', $param["ctnt"]);
        $stmt->bindValue(':i_user', $param["i_user"]);

        $stmt->execute();
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
        $sql = "SELECT A.i_board, A.title, A.ctnt, B.nm, A.created_at
                FROM t_board A
                INNER JOIN t_user B
                ON A.i_user = B.i_user
                WHERE A.i_board = :i_board";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':i_board', $param["i_board"]); // bindValue 숫자면 그냥 문자면 "" 넣어서 들어간다.

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function updBoard(&$param)
    {
        $sql = "UPDATE t_board
                SET title = :title, ctnt = :ctnt
                WHERE i_board = :i_board";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':i_board', $param["i_board"]);
        $stmt->bindValue(':title', $param["title"]);
        $stmt->bindValue(':ctnt', $param["ctnt"]);

        $stmt->execute();
    }

    public function delBoard(&$param)
    {
        $sql = "DELETE FROM t_board
                WHERE i_board = :i_board";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':i_board', $param["i_board"]);

        $stmt->execute();
    }
}
