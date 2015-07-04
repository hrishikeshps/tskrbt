<?php
session_start();
include_once '../buslogic.php';
if(!isset($_SESSION["lcod"]))
{
    header("location:../login.php");
}
if(isset($_REQUEST["tcod"]))
    $_SESSION["tcod"]=$_REQUEST["tcod"];
if(isset($_POST["btnsub"]))
{
    $obj=new clsrev();
    $obj->revdat=date('y-m-d');
    $obj->revscr=$_POST["r1"];
    $obj->revdsc=$_POST["txtdsc"];
    $obj2=new clsasg();
    $obj->revasgcod=$obj2->srcasgcod($_SESSION["tcod"]);
    $obj->save_rev();
    $obj1=new clstsk();
    $obj1->tskcod=$_SESSION["tcod"];
    $obj1->tsksts='C';
    $obj1->updtsksts();
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
      <form name="frmrev" method="Post" action="frmrev.php">
    <?php
    if(isset($_SESSION["tcod"]))
    {
        $obj=new clstsk();
        $obj->tskcod=$_SESSION["tcod"];
        $obj->find_tsk();
        echo "<h4>".$obj->tsktit."</h4>";
    }
    ?>
          <table class="table-bordered" width="100%">
              <tr><th>Your Review</th><th></th></tr>
              <tr>
                  <td>Score</td>
                  <td>
      <input type="radio" name="r1" value="1"/>1
      <input type="radio" name="r1" value="2"/>2
      <input type="radio" name="r1" value="3"/>3
      <input type="radio" name="r1" value="4"/>4
      <input type="radio" name="r1" value="5"/>5
                  </td>
              </tr>
              <tr>
                  <td>Description</td>
                  <td>
                      <textarea name="txtdsc" rows="6" cols="40">
                      </textarea>
                  </td>
              </tr>
              <tr>
                  <td></td>
                  <td>
         <input type="Submit" name="btnsub" value="Submit"/>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
</body>
</html>






