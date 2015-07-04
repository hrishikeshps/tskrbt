<?php
session_start();
include_once '../buslogic.php';
if(!isset($_SESSION["lcod"]))
{
    header("location:../login.php");
}
if(isset($_REQUEST["tcod"]))
    $_SESSION["tcod"]=$_REQUEST["tcod"];
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
      <form name="frmapp" method="Post" action="frmapp.php">
       <?php
   if(isset($_SESSION["tcod"]))
   {
       $obj=new clsapp();
       $arr=$obj->disp_app($_SESSION["tcod"]);
       if(count($arr)>0)
       {
           echo "<h2>".count($arr)." applications found</h2>";
       echo "<table class=table-bordered width=100%>";
       for($i=0;$i<count($arr);$i++)
       {
           echo "<tr><td  align=Center >";
           echo "<img src='../regpics/".$arr[$i][5]."' height=120px width=120px /><br>";
           echo "<h4><a href=frmprf.php?pcod=".$arr[$i][3].">".$arr[$i][4]."</a></h4>";
           for($j=0;$j<5;$j++)
           {
               if($j<$arr[$i][9])
               {
    echo "<img src='../images/FilledStar.png' height=10px width=10px />";
               }
               else
               {
         echo "<img src='../images/EmptyStar.png' height=10px width=10px />";             
               }
           }
       echo "</td>";
       echo"<td><table>";
       $dt=date("Y-m-d", strtotime($arr[$i][1]));
       echo "<tr><td>Applied On :".$dt."</td></tr>";
       echo "<tr><td>".$arr[$i][2]."</td></tr>";
       echo "<tr><td><a href=frmmsg.php?acod=".$arr[$i][0]." >Messages</a>";
       echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
       echo "<a href=frmasg.php?acod=".$arr[$i][0].">Assign Task</a></td></tr>";
       echo'</table></td>';
       }
       echo "</table>";
   }
 else {
       
 
   echo '<h2>No Tasker apply for your Task</h2>';
 }
   }
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





