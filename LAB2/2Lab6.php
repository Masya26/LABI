<html lang="ru">
<head>
<meta charset="utf-8" />
<script src="jquery-3.6.0.min.js"></script> 
</head>
<body>
<p>Какой вид спорта вы предпочитаете??</p>
<script src="2Lab6.js"></script>
<form action="sports.php" metod="get">
<?php
	$link = mysqli_connect("127.0.0.1", "f0547594_root", "123456", "f0547594_root");
	mysqli_query($link, 'SET NAMES utf-8');
	if (!$link) {
		echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
		echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
		exit;
		}
	mysqli_select_db($link, "f0547594_root");
?>
<p><input type="radio" id="basketball" value="basketball" name="sport" checked>Баскетбол</input></p>
<p><input type="radio" id="volleyball" value="volleyball" name="sport">Волейбол</input></p>
<p><input type="radio" id="football" value="football" name="sport">Футбол</input></p>
<p><input type="radio" id="hockey" value="hockey" name="sport">Хоккей</input></p>
<button type="submit" id="send">Проголосовать</button>
</form>

<footer id="index-footer">
<div>
	<button id="stats">Показать статистику</button>
	<script>
	$("#stats").click(function(){ 
	$("#count").css("visibility", "visible"); 
	}) 
</script>
</div>
<div id="count" style="visibility:hidden">
<?php
	$basketball=mysqli_query($link,"SELECT sport FROM `sports` WHERE sport='basketball' ");
	$volleyball=mysqli_query($link,"SELECT sport FROM `sports` WHERE sport='volleyball' ");
	$football=mysqli_query($link,"SELECT sport FROM `sports` WHERE sport='football' ");
	$hockey=mysqli_query($link,"SELECT sport FROM `sports` WHERE sport='hockey' ");
	$all=mysqli_query($link,"SELECT * FROM sports ");
	$data1=mysqli_num_rows($basketball);
	$data2=mysqli_num_rows($hockey);
	$data3=mysqli_num_rows($football);
	$data4=mysqli_num_rows($hockey);
	$data5=mysqli_num_rows($all);
						
	print "Баскетбол: " .$data1 . " (" . round ($data1/$data5*100, 2) ."%)";
	echo "<br />";	
	print "Волейбол: " .$data2. " (" . round ($data2/$data5*100, 2) ."%)";
	echo "<br />";				
	print "Футбол: " .$data3. " (" . round ($data3/$data5*100, 2) ."%)";
	echo "<br />";			
	print "Хоккей: " .$data4. " (" . round($data4/$data5*100, 2) ."%)";
	echo "<br />";			
	print "Всего ответов: " .$data5;
	echo "<br />";
?>
</footer>
</body>

</html>