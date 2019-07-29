<?php
if(!isset($_GET["code1"]) || !isset($_GET["code2"])){
    die("Invalid page request");
}
require_once "config_db.php";
$error=" ";
$query = "SELECT * FROM `applied_student` WHERE `code`='".mysqli_real_escape_string($con, $_GET['code1'])."' AND `time`=".mysqli_real_escape_string($con, (int)$_GET['code2']);
$result = mysqli_query($con, $query) or die(mysqli_error($con));
if(mysqli_num_rows($result)!=1){
    echo "<script type='text/javascript'>alert('Invalid page request')</script>";
        die();
}
$data = mysqli_fetch_assoc($result);
if(isset($_GET["accept"])){
    if($data["status"] != "pending"){
        echo "<script type='text/javascript'>alert('Already responded')</script>";
        die();
    }
    $query = "UPDATE `applied_student` SET `status`='accepted' WHERE `id`=".$data["id"];
    mysqli_query($con, $query) or die(mysqli_error($con));
    $header = "From: LOR - DAIICT <no-reply@daiict.ac.in>\r\n";
    $header .= "Content-Type: text/html\r\n";
    
    $body = "Hello  ".$data["student_name"].",<br>
    We here by inform you that ".$data["prof_email"]." has accepted to write letter of recommendation as you've applied to ".$data["uni_name"]." in ".$data["dep_name"]." program.";
    mail($data["student_id"]."@daiict.ac.in", "Application for letter of recommendation", $body, $header);
    $data["status"] = "accepted";
    
}elseif(isset($_GET["reject"])){
    if(!strlen(trim($_POST["profDescription"])))
    {
        $error = "<font color='red'>Enter the Message</font>";
    }
    else
    {
        if($data["status"] != "pending"){
            echo "<script type='text/javascript'>alert('Already responded')</script>";
            die();
        }
        $query = "UPDATE `applied_student` SET `status`='rejected' WHERE `id`=".$data["id"];
        mysqli_query($con, $query) or die(mysqli_error($con));
        $header = "From: LOR - DAIICT <no-reply@daiict.ac.in>\r\n";
        $header .= "Content-Type: text/html\r\n";
        
        $body = "Hello  ".$data["student_name"].",<br>
        We here by inform you that ".$data["prof_email"]." has rejected to write letter of recommendation as you've applied to ".$data["uni_name"]." in ".$data["dep_name"]." program. The message from professor is <blockquote>".data["prof_desc"]."</blockquote>";
        mail($data["student_id"]."@daiict.ac.in", "Application for letter of recommendation", $body, $header);
        $data["status"] = "rejected";
    }
}elseif(isset($_GET["maybe"])){
    if(!strlen(trim($_POST["profDescription"])))
    {
        $error = "<font color='red'>Enter the Message</font>";
    }
    else
    {
        if($data["status"] != "pending"){
            echo "<script type='text/javascript'>alert('Already responded')</script>";
            die();
        }
        $query = "UPDATE `applied_student` SET `status`='maybe' WHERE `id`=".$data["id"];
        mysqli_query($con, $query) or die(mysqli_error($con));
        $header = "From: LOR - DAIICT <no-reply@daiict.ac.in>\r\n";
        $header .= "Content-Type: text/html\r\n";
        
        $body = "Hello  ".$data["student_name"].",<br>
        We here by inform you that ".$data["prof_email"]." has not confirmed to write letter of recommendation as you've applied to ".$data["uni_name"]." in ".$data["dep_name"]." program. The message from professor is <blockquote>".$data["prof_desc"]."</blockquote>";
        mail($data["student_id"]."@daiict.ac.in", "Application for letter of recommendation", $body, $header);
        $data["status"] = "maybe";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style3.css">
</head>

<body style="background-image: linear-gradient(to right, #1f1c2c, #928dab);">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card my-5 border-white">
                    <div class="card-header">
                        Accept/Reject request for <strong>Letter Of Recommendation</strong>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"> Respected <?php echo explode('<',$data["prof_email"])[0]?>,</h5>
                        <p class="card-text">
                            As part of the prerequisites for acceptance to <b><?php echo $data["uni_name"].' in '.$data["dep_name"].' program '; ?>,</b> I have been asked to provide a letter of recommendation. Would you be so kind as to
                            write such a letter, with particular comments in regard to our past association in (the
                            honors program, an internship, coursework, conference, etc.)?</p><br />
                            <?php if(!empty($data["desc"])){
                                ?>
                            <p><b>Things I want to mention in the letter:</b><br/>
                            <?php echo htmlentities($data["desc"]); ?>
                            </p><br/>
                                <?php
                            } ?>
                            
                            <p>Thank you in advance for your time. You can communicate with me through my email (<b><?php echo $data["student_id"]."@daiict.ac.in"; ?></b>)</p><br>
                            <p>Regards,<br />
                            <b><?php echo $data["student_name"]." (".$data['student_id'].")"; ?></b></p>
                            <p class='card-footer'>
                            Current application status : <?php echo $data["status"]; ?>
                        </p>
                        <center><?php echo $error; ?></center>
                        <form class="form-signin" id="frm" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                                <textarea name="profDescription" class="form-control" id="prof_desc" rows="3" cols="5" style="border-radius:0px; resize:none;" placeholder="Send message to Student" autofocus><?php if(isset($desc)){ echo $desc;} ?></textarea>
                        </form>

                        <div class="card-footer">
                            <a href="confirmation.php?code1=<?php echo $_GET['code1'].'&code2='.$_GET['code2'].'&accept'; ?>" class="btn btn-primary">
                               Accept
                            </a>
                            <a href="confirmation.php?code1=<?php echo $_GET['code1'].'&code2='.$_GET['code2'].'&reject'; ?>" class="btn btn-danger">
                                Reject
                            </a>
                            <a href="confirmation.php?code1=<?php echo $_GET['code1'].'&code2='.$_GET['code2'].'&maybe'; ?>" class="btn btn-warning">
                                Maybe
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>