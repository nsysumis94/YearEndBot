<!DOCTYPE html>
<html>
<head>
    <title>尾牙活動報到</title>
</head>
<script src="https://d.line-scdn.net/liff/1.0/sdk.js"></script>
<script src="js/jquery.js"></script>
<link href='css/bootstrap.min.css' rel='stylesheet' type='text/css'>
<link href='css/reg.css' rel='stylesheet' type='text/css'>
<script>

window.onload = function (e) {
    liff.init(function (data) {
        initializeApp(data);
    });
};

function initializeApp(data) {
    var uid = data.context.userId;
    liff.getProfile().then(function (profile) {
            document.getElementById('uid').value = uid;
        }).catch(function (error) {
            window.alert("Error getting profile: " + error);
        });
}

function register(){
    uid=document.getElementById('uid').value;
    employeeNo=document.getElementById('employeeNo').value;
    employeeName=document.getElementById('employeeName').value;
    $.post("api/register.php", {"uid":uid,"employeeNo":employeeNo,"employeeName":employeeName},function(data){alert(data)});
    //alert(uid+employeeName+employeeNo);
}
</script>
<body>
    <div class="wrapper fadeInDown">
      <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
          <img src="img/logo.png" id="icon" alt="User Icon" />
          <!--<h1>亞元科技尾牙報</h1>-->
        </div>

        <!-- Login Form -->
        <form>
          <input type="text" id="employeeNo" class="fadeIn second" name="employeeNo" placeholder="員工編號">
          <input type="text" id="employeeName" class="fadeIn third" name="employeeName" placeholder="員工姓名">
          <input type="hidden" id="uid" class="fadeIn third" name="uid">
          <input type="button" class="fadeIn fourth" value="點我報到" onclick="register()">
        </form>

        <!-- Remind Passowrd -->
        <div id="formFooter">
          <!--<a class="underlineHover" href="#">Go to the Site</a>-->
        </div>

      </div>
    </div>
</body>
</html>
