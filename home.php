<?php
  session_start();
require_once "config_db.php";
ini_set('max_execution_time', 0); // for infinite time of execution
	if (!isset($_SESSION['access_token'])) {
		header('Location: index.php');
		exit();
  }
  if(strpos($_SESSION["email"], '@daiict.ac.in') != true){
    header("Location: logout.php?invalid_email");
    exit();
  }
  $msg = "";

  if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $uni_name = $_POST["uni_name"];
    $dep_name = $_POST["dep_name"];
    $prof_email = $_POST["prof_email"];
    $desc = $_POST["desc"];
   
    if(empty($name) || empty($uni_name) || empty($dep_name) || empty($prof_email[0])){
      $msg = "<font color='red'>All fields are required</font>"; 
    }else{
      $header = "From: Letter Of Recommendation - DAIICT <daiict-lor@dletter-daiict.com>\r\n";
      $header .= "Content-Type: text/html\r\n";
      
      foreach($prof_email as $email){
        
        $code = md5(rand());
        $time = time();
        $url = "http://".$_SERVER['SERVER_NAME'].chop($_SERVER["PHP_SELF"],"home.php")."confirmation.php?code1=".$code."&code2=".$time;
        $query = "INSERT INTO `applied_student` (`student_id`, `student_name`, `uni_name`, `dep_name`, `prof_email`, `time`, `status`, `code`, `desc`) VALUES(".mysqli_real_escape_string($con, chop($_SESSION['email'], '@daiict.ac.in')).", '".mysqli_real_escape_string($con, $name)."', '".mysqli_real_escape_string($con, $uni_name)."', '".mysqli_real_escape_string($con, $dep_name)."', '".mysqli_real_escape_string($con, $email)."', ".$time.", 'pending', '".$code."', '".mysqli_real_escape_string($con, $desc)."')";
        mysqli_query($con, $query) or die(mysqli_error($con));
        $body = "
          Respected faculty<br><br>
          One of our DAIICT student named <b>".$name." (id : ".chop($_SESSION['email'], '@daiict.ac.in').")</b> has asked for letter of recommendation.<br>
          <a href='".$url."'>Click here</a> to review the application.<br><br>
          Thank you<br>";

        
        $mail = explode("<", $email);
        $mail = substr($mail[1], 0, strlen($mail[1])-1 );
        mail($mail, "Request on Application for letter of recommendation from ".chop($_SESSION['email'], '@daiict.ac.in'), $body, $header);
      }
     
      $msg = "<font color='green'>Succesfully sent</font>";
      $name = "";
      $uni_name = "";
      $dep_name = "";
      $desc = "";
    }
    

  }
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Letter of recommendation | DAIICT</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

      <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
      <style rel="stylesheet" type="text/css">
.icon-bar{
  background-color:white !important;
}
</style>
<script>
  $(document).ready(function(){
    $("#btnpls").click(function(){
      // $(".btnplus").remove();
      
      var structure = $('<input name="prof_email[]" type="text" id="inputProf" class="form-control temp" placeholder="Professor\'s name" required autofocus>');
      $('#details').append(structure);
    });

    $("#btnmin").click(function(){
      $('#details').children().last().remove();
    });
    
    $("#inputProf").bind("keydown.autocomplete", PlanAutoComplete);
  });

  $(document).on('keydown', '#inputProf:not(.autocompleted)', PlanAutoComplete);

  function PlanAutoComplete() {
      $(this).addClass("autocompleted").autocomplete({
          source: 'autocomplete.php',
      });
  }
    </script>
    <link rel="stylesheet" href="style2.css">

</head>

<body style="background-image: linear-gradient(to right, #1f1c2c, #928dab);">

<nav class="navbar navbar-dark" style="background: transperant;">
    <div class="container-fluid" style="display:inline-block;">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="#" style="color:white;"><?php echo chop($_SESSION["email"],"@daiict.ac.in"); ?></a>
        </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="logout.php" class="logout_btn" style="background: none; color: white; font-size:16px;"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <form class="form-signin" id="frm" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <center><?php echo $msg; ?></center>
                
                <button class="btnplus" id="btnpls" type="button">
                    <img class="plus" src="plus.svg" height="50px" width="50px">
                  </button>
                  <button class="btnminus" id="btnmin" type="button">
                      <img class="minus" src="minus.svg" height="50px" width="50px">
                    </button> Add/Remove faculties
              <div class="form-label-group" id="flg">
                <input name="name" type="text" id="inputName" class="form-control" placeholder="Your name" required autofocus value="<?php if(isset($name)){echo $name;} ?>">
              </div>

              <div class="form-label-group" id="flg">
                <input name="uni_name" type="text" id="inputUni" class="form-control" placeholder="University's name" required autofocus value="<?php if(isset($uni_name)){echo $uni_name;} ?>">
                <input name="dep_name" type="text" id="inputDep" class="form-control" placeholder="Department's name" required autofocus value="<?php if(isset($dep_name)){echo $dep_name;} ?>">
                
                <input name="prof_email[]" type="text" id="inputProf" class="form-control" placeholder="Professor's name" required autofocus>  
                <div id="details">
                  
                </div>
                
                <div class="form-label-group" id="flg">
                <textarea name="desc" class="form-control" id="stud_desc" rows="3" cols="5" style="border-radius:20px; resize:none;" placeholder="Description of what you want to mention in the letter(optional)" autofocus><?php if(isset($desc)){ echo $desc;} ?></textarea>
              </div>

              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" id="submitbtn" name="submit">Submit</button>
       
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>