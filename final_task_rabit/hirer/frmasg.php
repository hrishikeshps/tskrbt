<?php
session_start();
include_once '../buslogic.php';
if(!isset($_SESSION["lcod"]))
{
    header("location:../login.php");
}
if(isset($_REQUEST["acod"]))
{
    $_SESSION["acod"]=$_REQUEST["acod"];
}
if(isset($_POST["btnsub"]))
{
    $obj3=new clsasg();
    $obj3->asghrlprc=$_POST["txthrlrat"];
    $obj3->asghrs=$_POST["txthrs"];
    $obj3->asgtskcod=$_SESSION["tcod"];
    $obj3->asgregcod=$_SESSION["rcod"];
    $obj3->save_asg();
   // header("location:frmmytsk.php");
    //update tsksts
    $obj4=new clstsk();
    $obj4->tskcod=$_SESSION["tcod"];
    $obj4->tsksts='G';
    $obj4->updtsksts();
    unset($_SESSION["tcod"]);
    header("location:frmmytsk.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TaskRabbit</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
<!--wrapper-start-->
<div class="wrapper inner"> 
  <!--header-->
  <div class="header">
    <div class="center">
      <div class="main-header">
        <div class="logo"><a href="index.html"><img src="../images/logo.png" alt=" " /></a></div>    
        <div class="header-login"><a class="login" href="frmmytsk.php">My Tasks</a> 
            <a class="login" href="frmtsk.php">Create New Task</a> 
            <a class="login" href="../login.php?sts=s">Logout</a>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <!--header-end--> 
  <div class="mid-content">
      <div class="center cat-min">
      <form name="frmasg" method="Post" action="frmasg.php">
          <h2>
        <?php
        if(isset($_SESSION["acod"]))
        {
            $obj=new clsapp();
            $obj->appcod=$_SESSION["acod"];
            $obj->find_app();
            $_SESSION["tcod"]=$obj->apptskcod;
            $_SESSION["rcod"]=$obj->appregcod;
            $obj1=new clstsk();
            $obj1->tskcod=$obj->apptskcod;
            $obj1->find_tsk();
            echo $obj1->tsktit;
        }
        ?>
          </h2>
          <h4>Assigning to
          <?php
          $obj2=new clsreg();
          $obj2->regcod=$obj->appregcod;
          $obj2->find_reg();
          echo $obj2->regnam;
          ?>
          </h4>
          <br></br>
          <table class="table-bordered" width="100%">
                      <tr><td>
                  Hourly Price($)
                  </td>
                          <td>
     <input type="text" name="txthrlrat" val-message="Enter Hourly Price" int-message="Integer value allow in Hourly price" class="cls-req cls-int" />
                          </td>
                      </tr>
              <tr>
                  <td>No. Of Hours</td>
                  <td><input name="txthrs" type="text" val-message="Enter No. Of Hours" int-message="Integer value allow in No. Of Hours" class="cls-req cls-int" /></td>
              </tr>
              <tr>
                  <td></td>
                  <td>
               <input type="Submit" name="btnsub" value="Submit" onclick="return validation();"/>
               &nbsp;&nbsp;&nbsp;
               <input type="Reset" name="btncan" value="Cancel"/>
                  </td>
              </tr>
          </table>
          
      </form>
      </div>
  </div>
  
    <!--footer-->
      <div class="footer">
       
         <div class="copyright"><div class="center">Copyright &copy; 2014 Alumnz, All rights reserved.  </div></div>
      </div>
  <!--footer-end-->
</div>
<!--wrapper-end--> 
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/custom.js"></script>
</body>
</html>






