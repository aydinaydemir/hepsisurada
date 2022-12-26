<?php
include "dbconfig.php";
 
$URL = "https://hepsisuradacs306-default-rtdb.firebaseio.com/Messages.json?orderBy=%22userID%22&equalTo=$userID";
$pureURL = "https://hepsisuradacs306-default-rtdb.firebaseio.com/Messages.json";

$userID = $_POST['uid'];
$msg = $_POST['message'];


function send_msg($msg, $name, $userID) { 
    global $pureURL;
    $ch = curl_init();
    $msg_json = new stdClass();
    $msg_json->msg = $msg;
    $msg_json->name = $name;
    $msg_json->time = date('H:i');
    $msg_json->userID = $userID;
    $encoded_json_obj = json_encode($msg_json); 
    curl_setopt_array($ch, array(CURLOPT_URL => $pureURL,
                                CURLOPT_POST => TRUE,
                                CURLOPT_RETURNTRANSFER => TRUE,
                                CURLOPT_HTTPHEADER => array('Content-Type: application/json' ),
                                CURLOPT_POSTFIELDS => $encoded_json_obj ));
    $response = curl_exec($ch); 
    header("Location: http://localhost/hepsisurada/php-firebase/message_client.php");
    exit();
    return $response;
}

if (!empty ($msg) && !empty($userID)){
    $admin_msg = $msg;
    send_msg($admin_msg, "admin", intval($userID));
    echo $user_msg;
}

?>