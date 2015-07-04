<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include_once 'buslogic.php';
if(isset($_POST["btnsub"]))
{
    $obj=new clsreg();
    $obj->regdat=date('y-m-d');
    $obj->regnam=$_POST["txtnam"];
    $obj->regeml=$_POST["txteml"];
    $obj->regpic="";
    $obj->regpwd=$_POST["txtpwd"];
    $obj->regrol=$_POST["r1"];
    $obj->save_reg();
    header("location:login.php");
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
<div class="wrapper"> 
  <!--header-->
  <div class="header">
    <div class="center">
      <div class="main-header">
       <div class="logo"><a href="index.php"><img src="images/logo.png" alt=" " /></a></div>     
        <div class="header-login"><a class="login" href="index.php">Sign Up</a>
            <a class="login" href="login.php">Login</a> 
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <!--header-end--> 
  <div class="mid-content main-con">
<div class="banner">
<div class="center">

<fieldset>
<h2>Register As</h2>
<form name="index" method="Post" action="index.php">
    <p>
        <input type="radio" checked="true" value="T" name="r1"/>Tasker
        <input type="radio" value="H" name="r1"/>Hirer
    </p>
<div class="form-field">
<input name="txtnam" type="text" value="" val-message="Enter Name" class="cls-req" placeholder="Name" /></div>
<div class="form-field second">
<input name="txteml" type="text" placeholder="Email" class="cls-email"/></div>
<div class="form-field">
<input name="txtpwd" id="txtpwd" type="password" value="" class="cls-req" placeholder="Password" val-message="Enter Password"/></div>
<div class="form-field second">
<input name="txtconpwd" type="password" value="" placeholder="Confirm Password" class="cls-con-pwd" compare-msg="Pasword & compare password is not equal" compare-with="txtpwd"/>
</div>
<input name="btnsub" onclick="return validation();" type="submit" value="Submit" class="submit" />
</fieldset>
</form>
</div>
</div>  
<div class="work">
<div class="center">
<h1>Live smarter.</h1>
<p>Get things done easily, reliably and quickly.</p>
<ul>
<li class="work1 first"><a href="#">
<h3>Personal Assistance</h3></a>
</li>
<li class="work2"><a href="#">
<h3>Organization</h3></a>
</li>
<li class="work3"><a href="#">
<h3>Minor Home Repairs</h3></a>
</li>
</ul>
<ul>
<li class="work4 first"><a href="#">
<h3>Deliveries</h3></a>
</li>
<li class="work5"><a href="#">
<h3>Moving Help</h3></a>
</li>
<li class="work6"><a href="#">
<h3>Furniture Assembly</h3></a>
</li>
</ul>

</div>
</div>

  </div>
  
    <!--footer-->
      <div class="footer">
       
         <div class="copyright"><div class="center">Copyright &copy; 2015 taskrabbit, All rights reserved.  </div></div>
      </div>
  <!--footer-end-->
</div>
<!--wrapper-end--> 
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>
