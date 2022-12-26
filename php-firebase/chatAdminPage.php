<?php
    $userID = $_GET['userID'];  // set a default value of 1 if no userID parameter is passed
    $URL = "https://hepsisuradacs306-default-rtdb.firebaseio.com/Messages.json?orderBy=%22userID%22&equalTo=$userID";
    $pureURL = "https://hepsisuradacs306-default-rtdb.firebaseio.com/Messages.json";

    

    function get_messages() { 
        global $URL;
        $ch = curl_init();
        curl_setopt_array($ch, [ CURLOPT_URL => $URL,
                                CURLOPT_POST => FALSE, // It will be a get request 
                                CURLOPT_RETURNTRANSFER => true, ]);
        $response = curl_exec($ch); 
        curl_close($ch);
        return json_decode($response, true); 
    }
    
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
        header("Location: http://localhost/hepsisurada/php-firebase/chatAdminPage.php?userID=$userID");
        exit();
        return $response;
    }

     $msg_res_json = get_messages();
     global $userID;

    if (isset($_POST['usermsg'])) {
        $user_msg = $_POST['usermsg'];
        send_msg($user_msg, "admin", intval($userID));
        echo $user_msg;
    }

?>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="stylexxx.css">
</head>

<div class="menu">
<div class="back"><i class="fa fa-chevron-left"></i> <img src="hs.jpg" draggable="false"/></div>
<div class="name">Support</div>
<div class="last">18:09</div>
</div>
<ol class="chat">
<?php
     



    $keys = array_keys($msg_res_json);
    for ($i = 0; $i < count($keys); $i++){
        $chat_msg = $msg_res_json[$keys[$i]];
        $name = $chat_msg['name'];
        $msg = $chat_msg['msg'];
        $time = $chat_msg['time'];
        if ($name == 'admin') {
            $from = 'other';
            $imgSrc = "hs.jpg";
        } else {
            $from = 'self';
            $imgSrc = "https://icons.iconarchive.com/icons/icons8/windows-8/512/Users-Guest-icon.png";
        }
       echo  '
       <li class="'.$from.'">
       <div class="avatar">
                <img src=' . $imgSrc . ' draggable="false"/>
            </div>
                <div class="msg">
                    <p><b>'.$name.'</b></p>
                    <p>'.$msg.'</p>
                    <time>'.$time.'</time>
                </div>
            </li>';
    }
?>
</ol>
<form name="form" action = "chatAdminPage.php?userID=<?php echo $userID ?>" method="POST">
    <input name="usermsg" class="textarea" type="text" placeholder="Type here!"/>
    <input type="submit" style="display: none" />
</form>