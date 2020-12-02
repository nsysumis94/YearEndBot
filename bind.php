<html>
<head>
<title>尾牙打卡小遊戲</title>
</head>
<script src="https://d.line-scdn.net/liff/1.0/sdk.js"></script>
<body>
<script>
window.onload = function (e) {
    liff.init(function (data) {
        initializeApp(data);
    });
};
function initializeApp(data) {
    var uid = data.context.userId;
    liff.getProfile().then(function (profile) {
            document.getElementById('displayname').textContent = profile.displayName;

            var profilePicture = document.getElementById('profilepicture');
            profilePicture.src=profile.pictureUrl;
        }).catch(function (error) {
            window.alert("Error getting profile: " + error);
        });
}
</script>
<!DOCTYPE html>
<head>
</head>
<body>
<link href='https://fonts.googleapis.com/css?family=Noto+Sans+TC' rel='stylesheet' type='text/css'>
<link href='css/button.css' rel='stylesheet' type='text/css'>
<link href='css/round.css' rel='stylesheet' type='text/css'>

<div id="profile">
    <img id="profilepicture" class="img-circle" src="">
    Hi <span id="displayname"></span> 歡迎來到打卡小遊戲，請在指定關卡按下下面打卡按鈕
</div>
<a href="#" class="button" onclick="fetchLocation()">
    <span>點我打卡!</span>
</a>
    <script>
        var tipsEle = document.getElementById('tips')
        function fetchLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(onGeoSuccess, onGeoError)
            } else {
                alert('not support')
            }
        }
        function onGeoSuccess(event){
            alert("完成打卡！\n你的位置是:\n 緯度:" + event.coords.latitude + "\n 經度:" + event.coords.longitude + "\n 海拔高度:" + event.coords.altitude)
        }
        function onGeoError(event){
            alert("Error code " + event.code + ". " + event.message)
        }
    </script>
</body>
</body>
</html>
