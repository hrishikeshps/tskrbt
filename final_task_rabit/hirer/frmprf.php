<?php
session_start();
include_once '../buslogic.php';
if(!isset($_SESSION["lcod"]))
{
    header("location:../login.php");
}
if(isset($_REQUEST["pcod"]))
    $_SESSION["pcod"]=$_REQUEST["pcod"];
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
      <form name="frmprf" method="Post" action="frmprf.php">
          <h3>Tasker Profile</h3>
          <br>
       <?php
       $obj=new clsreg();
       $obj->regcod=$_SESSION["pcod"];
       $obj->find_reg();
       echo "<table class=table-bordered width=100%><tr><td>";
       echo "<img src=../regpics/".$obj->regpic." height=120px width=120px border=2 /></td>";
       echo "<td><b>".$obj->regnam."</b><br>";
       echo "Active Since :".$obj->regdat."<br>";
       $arr=$obj->srcprf($_SESSION["pcod"]);
       echo "Qualification :".$arr[0][3]."<br>";
       echo "Hourly Rate :$".$arr[0][2]."<br>";
       echo "Experience :".$arr[0][1]."</td></tr></table>";
       ?>
              <hr></br>
          <h3>Work History</h3>
          <?php
          $obj2=new clsasg();
        $arr1=$obj2->dspwrkhis($_SESSION["pcod"]);
          if(count($arr1)==0)
              echo "No work done yet!";
          else
          {
              echo "<table>";
              for($i=0;$i<count($arr1);$i++)
              {
                  echo "<tr><td>";
                  echo $arr1[$i][0]."<br>";
                  echo "Started On :".$arr1[$i][1]."<br>";
                  echo "Assigned By :".$arr1[$i][4]."<br>";
                  echo "Assigned at $".$arr1[$i][2]." for ".$arr1[$i][3]." hours<br>";
                  echo "Hirer wrote following review on ".$arr1[$i][5]."<br>";
                  echo "<p>".$arr1[$i][6]."</p>";
                  for($j=1;$j<=5;$j++)
                  {
              if($j<$arr1[$i][7])
               {
    echo "<img src='../images/FilledStar.png' height=10px width=10px />";
               }
               else
               {
         echo "<img src='../images/EmptyStar.png' height=10px width=10px />";             
               }
                      
                  }
                  echo "</td></tr>";
              }
              echo "</table>";
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





