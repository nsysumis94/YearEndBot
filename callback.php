<?php
require 'vendor/autoload.php';
require 'config.php';

function processPic($uid,$messageId,$bot){
    $url="https://api.line.me/v2/bot/message/".$messageId."/content";
    $path='download/'.$messageId.".jpg";

    $response = $bot->getMessageContent($messageId);
    $fmd5=md5($response->getRawBody());
    if ($response->isSucceeded()) {
        file_put_contents($path, $response->getRawBody());
    } else {
        error_log($response->getHTTPStatus() . ' ' . $response->getRawBody());
    }

    if(compareMD5($fmd5)){
        return "這張圖我好像在哪裡看過誒，請重新拍一張給我唷!!";
    }

    $output = shell_exec('python barcode_scanner_image.py -i '.$path);
    $passcodes=file("hash.txt");
    $flag="找不到正確的QR Code捏，再試試看吧";
    foreach($passcodes as $pass){
        if($pass==$output){
            $marked=markUid($uid,$output,$messageId);
            if($marked){
                $flag="恭喜成功找到地標!!";
            }else{
                $flag="這個地標已經完成過囉!";
            }
            insertMD5($fmd5);
        }
    }
    return $flag;
}

function compareMD5($md5){
    require('include/mysql.php');
    $result = $mysqli->query("SELECT count(*) as count FROM pics WHERE pics='$md5'");
    $row = $result->fetch_assoc();
    return $row['count'];
}

function insertMD5($md5){
    require('include/mysql.php');
    $result = $mysqli->query("INSERT INTO pics VALUES ('$md5')");
    return true;
}

function markUid($uid,$md5,$messageId){
    require('include/mysql.php');
    $result = $mysqli->query("SELECT count(*) as count FROM uidmap WHERE md5='$md5' AND uid='$uid'");
    $row = $result->fetch_assoc();
    if($row['count']==0){
        $mysqli->query("INSERT INTO uidmap VALUES (NULL,'$uid','$md5','$messageId')");
        $mysqli->query("UPDATE employee SET taskCount=taskCount+1 WHERE uid='$uid'");
        return true;
    }else{
        return false;
    }
    
}


$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($channel_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channel_secret]);
$bodyMsg = file_get_contents('php://input');
//uncomment following line if you want the message to be logged
file_put_contents('log.txt', date('Y-m-d H:i:s') . 'Recive: ' . $bodyMsg."\n",FILE_APPEND);
$obj = json_decode($bodyMsg, true);
foreach ($obj['events'] as $event) {
    if($event['message']['type']=="image"){
        $uid=$event['source']['userId'];
        $qr=processPic($uid,$event['message']['id'],$bot);
        $replyMessage=$qr;
    }
    else{
        $replyMessage="你好，我只收有闖關QR Code的照片喔";
    }
    $response = $bot->replyText($event['replyToken'], $replyMessage);
}
?>
