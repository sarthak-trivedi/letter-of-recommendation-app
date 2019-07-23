<?php
    require_once "config_db.php";
    if(!isset($_GET["code1"]) || !isset($_GET["code2"])){
        die("Invalid request");
    }
    $code1 = $_GET["code1"];
    $code2 = $_GET["code2"];
    $query = "UPDATE `applied_student` SET `created` = 1 WHERE `code` = '".mysqli_real_escape_string($con, $code1)."' AND `time` = ".mysqli_real_escape_string($con, $code2);
    mysqli_query($con, $query) or die(mysqli_error($con));
    echo "Successfully done! you can close the window now";
?>