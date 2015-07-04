<?php
session_start();
include_once '../buslogic.php';
if(!isset($_SESSION["lcod"]))
{
    header("location:../login.php");
}
if(isset($_POST["btnupd"]))
{
    $obj=new clscat();
    $obj->catcod=$_SESSION["cod"];
    $obj->catnam=$_POST["txtcat"];
    $obj->update_cat();
    unset($_SESSION["cod"]);
}
if(isset($_POST["btnsub"]))
{
    $obj=new clscat();
    $obj->catnam=$_POST["txtcat"];
    $obj->save_cat();
}
if(isset($_REQUEST["ccod"]))
{
    if(isset($_REQUEST["mode"]) && $_REQUEST["mode"]=='D')
    {
        $obj=new clscat();
        $obj->catcod=$_REQUEST["ccod"];
        $obj->delete_cat();
    }
    if(isset($_REQUEST["mode"]) && $_REQUEST["mode"]=='E')
    {
        $obj=new clscat();
        $obj->catcod=$_REQUEST["ccod"];
        $obj->find_cat();
        $cnam=$obj->catnam;
        $_SESSION["cod"]=$_REQUEST["ccod"];
    }
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
            <a class="login" href="frmvrftsk.php">Verify Taskers</a>
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
      <form name="frmcat" method="Post" action="frmcat.php">
          <h2>Add Categories</h2>
          <table class="table-bordered" width="100%">
              <tr>
                  <td>Enter Category</td>
                  <td>
                      <input type="text" name="txtcat"
          value="<?php if(isset($cnam)) echo $cnam;?>" val-message="Enter Category" class="cls-req"/>
                  </td>
              </tr>
              <tr>
                  <td></td>
                  <td>
       <?php
    if(!isset($cnam))
    echo "<input type=Submit name=btnsub value=Submit onclick='return validation();'/>";
    else
    echo "<input type=Submit name=btnupd value=Update onclick='return validation();' />";
            ?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" name="btncan" value="Cancel"/>
                  </td>
              </tr>
          </table> 
    <?php     
      $obj=new clscat();    
      $arr=$obj->disp_cat();
    if(count($arr)>0)
        echo "<h4>Categories</h4>";
        echo "<table class=table-bordered width=100%>";
    for($i=0;$i<count($arr);$i++)
    {
       echo "<tr><td>".$arr[$i][1]."</td><td>";
       echo "<a href=frmcat.php?ccod=".$arr[$i][0]."&mode=E >Edit</a>";
       echo "&nbsp;&nbsp;&nbsp;&nbsp;";
       echo "<a href=frmcat.php?ccod=".$arr[$i][0]."&mode=D >Delete</a>";
       echo "</td></tr>";
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
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/custom.js"></script>
</body>
</html>


