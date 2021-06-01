<html>
<head>
<meta charset = "utf-8">
</head>
<body>
<?php
$link = mysqli_connect("127.0.0.1", "f0547594_root", "123456", "f0547594_root");
 mysqli_query($link, 'SET NAMES utf-8');
 if (!$link) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
 // подключение к базе данных:
 mysqli_select_db($link, "f0522117_opros");
 $sql_add = "INSERT INTO sports (sport) VALUES ('".$_GET['sport']."')";
 mysqli_query($link, $sql_add);

 if (mysqli_affected_rows($link)>0)
 { print "<Благодарю за ответ!";}
 else { print "Что-то пошло не так! :( "; }
?>
</body>
</html>

