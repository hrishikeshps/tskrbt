<?php
session_start();
include_once '../buslogic.php';
if(!isset($_SESSION["lcod"]))
{
    header("location:../login.php");
}
if(isset($_REQUEST["pcod"]))
{
    $obj=new clsprf();
    $obj->prfcod=$_REQUEST["pcod"];
    $obj->prfsts='V';
    $obj->updprfsts();
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
        <div class="header-login"><a class="login" href="frmcat.php">Categories</a> 
            <a class="login" href="frmvrftsk.php">Verify Taskers</a>  <a class="login" href="../login.php?sts=s">Logout</a>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <!--header-end--> 
  <div class="mid-content">
            <div class="center cat-min">
      <form name="frmvrftsk" method="Post" action="frmvrftsk.php">
          <h3>Verify Taskers</h3>
       <?php
       $obj=new clsprf();
       $arr=$obj->disp_prf();
       echo "<table class=table-bordered width=100%>";
       for($i=0;$i<count($arr);$i++)
       {
            echo "<tr><td><img src=../regpics/".$arr[$i][1].
                    " height=120px width=120px border=2 /></td>";
           echo "<td><b>".$arr[$i][0]."</b><br>".$arr[$i][2];
           echo "<br><b>Rate :$".$arr[$i][4]." per hour";
           echo "<br>".$arr[$i][3]."<br>";
           echo "<a href=frmvrftsk.php?pcod=".$arr[$i][5].
                   " >Verify Tasker</a></td></tr>";
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



