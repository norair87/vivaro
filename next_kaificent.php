<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<title>vivaro</title>
</head>
<body>
<?php
session_start();
if(isset($_POST['next'])){
	$_SESSION['site_name1']=$_POST['site_name1'];
	$_SESSION['site_name2']=$_POST['site_name2'];
}

?>
<header>
	<div class="logo"></div>
	<div class="title"><h1>Vivaro calkulator</h1></div>
</heatitle
<div class="form">
	<form action="next_kaificent.php" name="myform" method="post">
	<div class="rate"><label>rate:</label><input type="text" name="rate"></div>
<fieldset><legend><?php echo $_SESSION['site_name1']?></legend>
	<div class="site_name1_p1"><label>P1:<input type="text" name="P1_1"></label></div>
	<div class="site_name1_x"><label>X:<input type="text" name="X_1"></label></div>
	<div class="site_name1_p2"><label>P2:<input type="text" name="P2_1"></label></div>
</fieldset>	
<fieldset>
    <legend><?php echo $_SESSION['site_name2']?></legend>
  	<div class="site_name2_p1"><label>P1:</label><input type="text" name="P1_2"></div>
		<div class="Xsite_name2_x"><label>X:</label><input type="text" name="X_2"></div>
		<div class="P2site_name2_p2"><label>P2:</label><input type="text" name="P2_2"></div>
</fieldset>
  	
		<input type="submit" value="calkulation" name="calk">
		</form>
</div>
<?php

require_once('calk.php');
$calk = new calk($site_1,$site_2,$_POST['rate']);
//use calk\calk as vivaro;



var_dump( $calk->rate());

	echo "<pre>";
var_dump( $site_1);die;

?>
	
</body>
</html>