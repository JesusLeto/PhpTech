<?php

$connect = mysqli_connect('localhost', "root", "root", "newsdb");

if(!$connect){
    die("Error connect db");
}
