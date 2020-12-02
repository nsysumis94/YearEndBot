<!DOCTYPE html>
<html>
<head>
	<title>成績統計</title>
</head>
<script src="../js/jquery.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap4.min.js"></script>
<link href='../css/bootstrap.min.css' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Noto+Sans+TC' rel='stylesheet' type='text/css'>
<link href='../css/admin.css' rel='stylesheet' type='text/css'>
<link href='https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
<script>
$(document).ready(function() {
    $('#example').DataTable({"order": [[ 3, "desc" ]],"oLanguage":{"sUrl":"../js/dataTables.Chinese.traditional.txt"}});
	
} );

</script>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"> <img src="../img/logo.png" alt="" height="30px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="score.php">分數統計表 <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="groupEditor.php">隊伍設定</a>
    </div>
  </div>
</nav>


<?php
include("../include/mysql.php");
$result = $mysqli->query("SELECT team,SUM(taskCount) as count FROM employee GROUP BY team");
?>
<div class="container">
	<div class="row">
		<h3>團體得分資訊</h3>
	</div>
	<div class="row">
		<table id="GroupTable" class="table table-striped table-bordered" style="width:80%">
			<thead>
				<tr>
					<th>藍隊</th>
					<th>白隊</th>
					<th>福委</th>
					<th>未分隊</th>
				</tr>
			</thead>
			<tbody>
			<tr>
		<?php
			$team=array(0,0,0,0);
			while($row = $result->fetch_assoc()) {
				if($row['team']==0){
					$team[0]=$row['count'];
				}
				else if($row['team']==1){
					$team[1]=$row['count'];
				}
				else if($row['team']==2){
					$team[2]=$row['count'];
				}
				else if($row['team']==3){
					$team[3]=$row['count'];
				}
			}
		?>

				<td><?php echo $team[1];?></td>
				<td><?php echo $team[2];?></td>
				<td><?php echo $team[3];?></td>
				<td><?php echo $team[0];?></td>
			</tr>
			</tbody>
		</table>
	</div>
	<div class="row">
		<?php
		$result = $mysqli->query("SELECT * FROM employee");
		?>
		<h3>個人得分資訊</h3>
	</div>
	<div class="row">
	<table id="example" class="table table-striped table-bordered" width="100%">
		<thead>
			<tr>
				<th>員編</th>
				<th>姓名</th>
				<th>隊伍</th>
				<th>完成數量</th>
			</tr>
		</thead>
		<tbody>
	<?php
		while($row = $result->fetch_assoc()) {
	?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['name']; ?></td>
					<td>
					<?php
						if($row['team']==0){
							echo "未分隊";
						}
						else if($row['team']==1){
							echo "藍隊";
						}
						else if($row['team']==2){
							echo "白隊";
						}
						else if($row['team']==3){
							echo "福委";
						}
					?>
					</td>
					<td><?php echo $row['taskCount']; ?></td>
				</tr>
	<?php
		}
	?>
		</tbody>
	</table>
	</div>
</div>
</body>
</html>