<?php
session_start();
include_once '../buslogic.php';
if(!isset($_SESSION["lcod"]))
{
    header("location:../login.php");
}
if(isset($_POST["btnsub"]))
{
    $obj=new clstsk();
    $obj->tskcatcod=$_POST["drpcat"];
    $obj->tskdat=date('y-m-d');
    $obj->tskdsc=$_POST["txtdsc"];
    $obj->tskregcod=$_SESSION["lcod"];
    $obj->tskstrdat=$_POST["txtstrdat"];
    $obj->tsksts='A';
    $obj->tsktit=$_POST["txttit"];
    $obj->save_tsk();
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
<link href="../css/jquery-ui.css" rel="stylesheet" type="text/css" />
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
      <form name="frmtsk" method="Post" action="frmtsk.php">
          <h3>Task Details</h3>
          <table class="table-bordered" width="100%">
              <tr>
                  <td>Select Category</td>
                  <td>
                      <select name="drpcat">
           <?php
             $obj=new clscat();
             $arr=$obj->disp_cat();
       for($i=0;$i<count($arr);$i++)
       {
  echo "<option value=".$arr[$i][0]." />".$arr[$i][1];
       }
           ?>
                      </select>
                  </td>
              </tr>       
              <tr>
                  <td>
                      Task Title
                  </td>
                  <td>
     <input type="text" name="txttit" val-message="Enter Task Title" class="cls-req"/>                 
                  </td>
              </tr>
              <tr>
                  <td>
                      Start Date
                  </td>
                  <td>
    <input type="text" name="txtstrdat" id="txtstrdat" val-message="Enter Start Date" class="cls-req"/>
                  </td>
              </tr>
              <tr>
                  <td>Description</td>
                  <td>
                      <textarea name="txtdsc" rows="5" cols="30" val-message="Enter Description" class="cls-req">
                      </textarea>
                  </td>
              </tr>
              <tr>
                  <td></td>
                  <td>
            <input type="Submit" name="btnsub" value="Submit" onclick="return validation();" />
            &nbsp;&nbsp;&nbsp;&nbsp;
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
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/custom.js"></script>
<script type="text/javascript" src="../js/jquery-ui.js"></script>
<script>
    $(document).ready(function(){ 
      $( "#txtstrdat" ).datepicker({ dateFormat: 'yy-mm-dd' });
    });
</script>
 
<!--wrapper-end--> 
</body>
</html>



