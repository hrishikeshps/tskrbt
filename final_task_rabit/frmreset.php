<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
include_once 'buslogic.php';
if(isset($_POST["btnsub"]))
{
//    echo'hiiiiii';
    $obj=new clsreg();
    $obj->regeml=$_POST["txteml"];
    $obj->find();
    if(isset($obj->regcod))
    {
        mail($_POST["txteml"],"Password Reset",
  "<a href=http://www.taskrabbits.com/frmact.php?rcod=".
   $obj->regcod." >Click this link to reset password</a>"        
                );
        $msg="Password reset mail has been sent on your registered Email ID.";
    }
 else 
     {
        $msg="This Email ID is not registered";
    }
}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TaskRabbit</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
<!--wrapper-start-->
<div class="wrapper inner"> 
  <!--header-->
  <div class="header">
    <div class="center">
      <div class="main-header">
        <div class="logo"><a href="login.php"><img src="images/logo.png" alt=" " /></a></div>    
        <div class="header-login"><a class="login" href="index.php">Sign Up</a> <a class="login" href="login.php">Login</a> 
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <!--header-end--> 
  <div class="mid-content main-con">
  
<Div class="signpage">
<form name="frmreset" method="post" action="frmreset.php">
<fieldset>
<h3>Forgot Password</h3>
<div class="logingtext">
    <p> <br />Enter Registered Email </p>
</div>
<div class="form-field">
    <input name="txteml" type="text" placeholder="Email"  val-message="Email required" class="cls-req cls-email" /></div>
 
 <div class="form-field">
<input name="btnsub" type="submit" value="Submit" class="login" onclick="return validation();" /></div>
<?php
if(isset($msg))
echo "<label>".$msg."</label>";
?>

</fieldset>
</form>

</Div>
  </div>
  
    <!--footer-->
      <div class="footer">
    
         <div class="copyright"><div class="center">Copyright &copy; 2015 taskrabbits, All rights reserved.  </div></div>
      </div>
  <!--footer-end-->
</div>
<!--wrapper-end--> 
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>

