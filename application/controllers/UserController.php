<?php

namespace application\controllers;

class UserController extends Controller
{

    public function join()
    {
        $this->addAttribute(_TITLE, "회원가입");
        $this->addAttribute(_HEADER, $this->getView("template/header.php"));
        $this->addAttribute(_MAIN, $this->getView("board/join.php"));
        $this->addAttribute(_FOOTER, $this->getView("template/footer.php"));

        return "template/t1.php";
    }

    public function login()
    {
    }
}
