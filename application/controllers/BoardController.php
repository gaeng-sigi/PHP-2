<?php

namespace application\controllers;

use application\models\BoardModel;

class BoardController extends Controller
{
    public function write()
    {
        $this->addAttribute("title", "글쓰기");
        $this->addAttribute(_HEADER, $this->getView("template/header.php"));
        $this->addAttribute(_MAIN, $this->getView("board/write.php"));
        $this->addAttribute(_FOOTER, $this->getView("template/footer.php"));

        return "template/t1.php";
    }

    public function writeProc()
    {
        $model = new BoardModel();

        $title = $_POST["title"];
        $ctnt = $_POST["ctnt"];

        $param = [
            "title" => $title,
            "ctnt" => $ctnt,
            "i_user" => $_SESSION[_LOGINUSER]->i_user
        ];

        $model->insBoard($param);

        return "redirect:/board/list";
    }

    public function list()
    {
        $model = new BoardModel();

        // $this->list = $model->selBoardList();
        $this->addAttribute("title", "리스트");
        $this->addAttribute("list", $model->selBoardList());
        $this->addAttribute(_JS, ["board/list"]);
        $this->addAttribute(_HEADER, $this->getView("template/header.php"));
        $this->addAttribute(_MAIN, $this->getView("board/list.php"));
        $this->addAttribute(_FOOTER, $this->getView("template/footer.php"));

        return "template/t1.php"; // view 파일명

    }

    public function detail()
    {
        $model = new BoardModel();

        // print "i_board : {i_board}<br>";
        $param = ["i_board" => $_GET["i_board"]];

        $this->addAttribute("data", $model->selBoard($param));
        $this->addAttribute(_TITLE, "디테일");
        $this->addAttribute(_JS, ["board/detail"]);

        $this->addAttribute(_HEADER, $this->getView("template/header.php"));
        $this->addAttribute(_MAIN, $this->getView("board/detail.php"));
        $this->addAttribute(_FOOTER, $this->getView("template/footer.php"));

        return "template/t1.php";

        // 글번호, 제목, 내용, 글쓴이 이름, 작성일
    }

    public function mod()
    {
        $model = new BoardModel();

        $param = ["i_board" => $_GET["i_board"]];

        $this->addAttribute("data", $model->selBoard($param));
        $this->addAttribute(_TITLE, "수정");
        $this->addAttribute(_HEADER, $this->getView("template/header.php"));
        $this->addAttribute(_MAIN, $this->getView("board/mod.php"));
        $this->addAttribute(_FOOTER, $this->getView("template/footer.php"));

        return "template/t1.php";
    }

    public function modProc()
    {
        $model = new BoardModel();

        $i_board = $_POST["i_board"];
        $title = $_POST["title"];
        $ctnt = $_POST["ctnt"];

        $param = [
            "i_board" => $i_board,
            "title" => $title,
            "ctnt" => $ctnt,
        ];

        $model->updBoard($param);

        return "redirect:detail?i_board=${i_board}";
    }

    public function del()
    {
        $model = new BoardModel();

        $param = ["i_board" => $_GET["i_board"]];
        $model->delBoard($param);

        return "redirect:/board/list";
    }
}
