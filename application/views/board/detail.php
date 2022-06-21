<!DOCTYPE html>
<html lang="en">

<?php include_once "application/views/template/head.php"; ?>

<body>
    <h1>디테일</h1>

    <div><button id="btnDel" value="<?= $this->data->i_board ?>" data-i_board=<?= $this->data->i_board ?>>삭제</button></div>

    <div>글 번호: <?= $this->data->i_board ?></div>
    <div>글 제목: <?= $this->data->title ?></div>
    <div>글 내용: <?= $this->data->ctnt ?></div>
    <div>글 작성자: <?= $this->data->nm ?></div>
    <div>글 작성일: <?= $this->data->created_at ?></div>
</body>

</html>