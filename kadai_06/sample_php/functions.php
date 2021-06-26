<?php
//共通で使うものを別ファイルにしておきましょう。

session_start();

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES,'UTF-8');
}

//CSRF対策

function random($length = 16)
{
    return substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, $length);
}

function createToken(){
  if (!isset($_SESSION['token'])){
    $_SESSION['token'] =random();
  }
}

function validateToken() {
    if(
        empty($_SESSION['token']) ||
        $_SESSION['token'] !== filter_input(INPUT_POST,'token')
    ){
        exit('Invalid post request');
    }
}



?>