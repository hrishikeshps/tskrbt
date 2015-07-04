<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
include_once 'buslogic.php';
if(isset($_REQUEST["sts"])&& $_REQUEST["sts"]=='s')
{
    unset($_SESSION["lcod"]);
}
if(isset($_POST["btnsub"]))
{
    $obj=new clsreg();
    $r=$obj->logincheck($_POST["txteml"], $_POST["txtpwd"]);
    if($r=='N')
        $msg="Email Password Incorrect";
    else if($r=='T')
        header("location:tasker/frmsrctsk.php");
    else if($r=='A')
        header("location:admin/frmcat.php");
    else if($r=='H')
        header("location:hirer/frmmytsk.php");
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
        <div class="header-login"><a class="login" href="index.php">Sign Up</a> <a class="login">Login</a> 
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <!--header-end--> 
  <div class="mid-content main-con">
  
<Div class="signpage">
<form name="frmlog" method="post" action="login.php">
<fieldset>
<h3>Sign In</h3>
<div class="logingtext">
    <p> <br />Log in </p>
</div>
<div class="form-field">
    <input name="txteml" type="text" placeholder="Email"  val-message="Email required" class="cls-req cls-email" /></div>
<div class="form-field">
    <input name="txtpwd" type="Password" value=""  val-message="Enter Password" class="cls-req" /></div>
 <p><em>*</em>requires field </p> 
 <div class="form-field">
<input name="btnsub" type="submit" value="Sign In" class="login" onclick="return validation();" /></div>
<?php
if(isset($msg))
echo "<label>".$msg."</label>";
?>
 <div class="form-field">
     <a href="frmreset.php">Forgot Password?</a>   
 </div>
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
