<?php
session_start();
include_once '../buslogic.php';
if(!isset($_SESSION["lcod"]))
{
    header("location:../login.php");
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
      <form name="frmmytsk" method="Post" action="frmmytsk.php">
          <h3>My Tasks</h3>
         <?php
         $obj=new clstsk();
         $arr=$obj->disp_tsk($_SESSION["lcod"]);
         if(count($arr)>0)
  echo "<table class=table-bordered><tr><th>Task Title</th><th>Category</th><th>Start Date</th><th>Status</th></tr>";
         for($i=0;$i<count($arr);$i++)
         {
             $dt=date("Y-m-d", strtotime($arr[$i][2]));
  echo "<tr><td>".$arr[$i][1]."</td><td>".$arr[$i][4];
  echo "</td><td>".$dt."</td><td>";
           if($arr[$i][5]=='A')
           {
               echo 'Active';
           }
 else {
               echo 'closed';
 }
  echo "</td>";
  if($arr[$i][5]=='A')
      echo "<td><a href=frmapp.php?tcod=".$arr[$i][0]." >View Applications</td>";
  else if($arr[$i][5]=='G')
      echo "<td><a href=frmrev.php?tcod=".$arr[$i][0]." >Close Task</a></td>";
  echo "</tr>";
         }
   echo "</table>";
         ?>
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




