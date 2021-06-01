<?php
    $mysqli = new mysqli("localhost", "f0547594_root", "123456", "f0547594_root");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $email = $_GET['email'];
    $name = $_GET['name'];
    $mess = $_GET['mess'];

    $result = $mysqli->query(
        "INSERT INTO mes SET name='$name', email='$email', mess='$mess'"
    );
?>
