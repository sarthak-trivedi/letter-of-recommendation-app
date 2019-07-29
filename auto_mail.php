<?php
require_once "config_db.php";
ini_set('max_execution_time', 0); // for infinite time of execution
$header = "From: LOR - DAIICT <no-reply@daiict.ac.in>\r\n";
$header .= "Content-Type: text/html\r\n";
$time = (int)(time())-(36*60*60);
$query = "SELECT * FROM `applied_student` WHERE (`last_notified` IS NULL OR `last_notified` <= ". $time .") AND (`status` = 'accepted') AND (`created` = 0)";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
echo "Accepted = ".mysqli_num_rows($result).'<br>';

while($data = mysqli_fetch_assoc($result)){
    $time = time();
    $url = "http://".$_SERVER['SERVER_NAME'].chop($_SERVER["PHP_SELF"],"auto_mail.php")."confirmation.php?code1=".$data["code"]."&code2=".$data["time"];
    $url2 = "http://".$_SERVER['SERVER_NAME'].chop($_SERVER["PHP_SELF"],"auto_mail.php")."application_sent.php?code1=".$data["code"]."&code2=".$data["time"];
    $query = "UPDATE `applied_student` SET `last_notified` = ".$time." WHERE `id`=".$data["id"];
    mysqli_query($con, $query) or die(mysqli_error($con));
    $body = "
    Respected faculty<br><br>
    One of our DAIICT student named <b>".$data["student_name"]." (id : ".$data["student_id"].")</b> had asked for letter of recommendation.<br>
    You've already accepted his/her request<br>
    <a href='".$url."'>Click here</a> to review the application.<br><br>
    If you've already sent him/her letter of recommendation then <a href='".$url2."'>Click here</a><br><br>
    Thank you<br>";
    $mail = explode("<", $data["prof_email"]);
    $mail = substr($mail[1], 0, strlen($mail[1])-1 );
    mail($mail, "Reminder on Application for letter of recommendation", $body, $header);
}

$time = (int)(time())-(60*60*60);
$query = "SELECT * FROM `applied_student` WHERE (`last_notified` IS NULL OR `last_notified` <= ". $time .") AND (`status` = 'pending')";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
echo "Pending = ".mysqli_num_rows($result);

while($data = mysqli_fetch_assoc($result)){
    $time = time();
    $url = "http://".$_SERVER['SERVER_NAME'].chop($_SERVER["PHP_SELF"],"auto_mail.php")."confirmation.php?code1=".$data["code"]."&code2=".$data["time"];
    $query = "UPDATE `applied_student` SET `last_notified` = ".$time." WHERE `id`=".$data["id"];
    mysqli_query($con, $query) or die(mysqli_error($con));
    $body = "
    Respected faculty<br><br>
    One of our DAIICT student named <b>".$data["student_name"]." (id : ".$data["student_id"].")</b> had asked for letter of recommendation.<br>
    Request is still pending<br>
    <a href='".$url."'>Click here</a> to review the application.<br><br>
    Thank you<br>";
    $mail = explode("<", $data["prof_email"]);
    $mail = substr($mail[1], 0, strlen($mail[1])-1 );
    mail($mail, "Reminder on Application for letter of recommendation", $body, $header);
}


?>