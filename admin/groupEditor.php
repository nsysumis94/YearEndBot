<!DOCTYPE html>
<html>
<head>
	<title>隊伍分類</title>
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
    $('#example').DataTable({"oLanguage":{"sUrl":"../js/dataTables.Chinese.traditional.txt"}});
} );

function chTeam(sn, chg){
	$.post("../api/chTeam.php", {"sn":sn,"team":chg},function(data){});
}
</script>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"> <img class="logo" src="../img/logo.png" alt="" height="30px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="score.php">分數統計表 <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link active" href="groupEditor.php">隊伍設定<span class="sr-only">(current)</span></a>
    </div>
  </div>
</nav>
<?php
include("../include/mysql.php");
$result = $mysqli->query("SELECT * FROM employee");
?>
<div class="container">
	<div class="row">
		<table id="example" class="table table-striped table-bordered" width="100%">
			<thead>
				<tr>
					<th>員編</th>
					<th>姓名</th>
					<th>隊伍</th>
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
							<select onchange="chTeam(<?php echo $row['sn'];?>,this.options[this.options.selectedIndex].value)">
								<option value="0" <?php if($row['team']==0){echo "selected";}?>>未分隊</option>
								<option value="1" <?php if($row['team']==1){echo "selected";}?>>藍隊</option>
								<option value="2" <?php if($row['team']==2){echo "selected";}?>>白隊</option>
								<option value="3" <?php if($row['team']==3){echo "selected";}?>>福委</option>
								<option value="4" <?php if($row['team']==4){echo "selected";}?>>不參加</option>
							</select>
						</td>
					</tr>
		<?php
			}
		?>
			</tbody>
		</table>
	</div>
</div><!--end of container-->
</body>
</html>