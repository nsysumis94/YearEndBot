<?php
require('../include/mysql.php');
$team=$_POST['team'];
$sn=$_POST['sn'];
$result = $mysqli->query("UPDATE employee SET team='$team' WHERE sn='$sn'");
echo "success";
?>