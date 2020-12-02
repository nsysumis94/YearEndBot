<?php
require('../include/mysql.php');
$uid=$_POST['uid'];
$employeeNo=$_POST['employeeNo'];
$employeeName=$_POST['employeeName'];
if($uid == '' || $employeeNo=='' || $employeeName==''){
	echo "請確認資料是否有完整填寫";
}
else{
	$result = $mysqli->query("SELECT count(*) as count FROM employee WHERE id='$employeeNo' AND name='$employeeName'");
    $row = $result->fetch_assoc();
    $employee = $row['count'];
	if($employee > 0 ){
			$mysqli->query("UPDATE employee SET uid='$uid' WHERE id='$employeeNo' AND name='$employeeName'");
			echo "註冊成功";
	}
	else{
		echo "註冊失敗，請確認資料是否填寫正確";
	}
}
?>