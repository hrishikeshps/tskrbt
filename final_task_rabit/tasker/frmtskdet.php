<?php
session_start();
include_once '../buslogic.php';
if(!isset($_SESSION["lcod"]))
{
    header("location:../login.php");
}
if(isset($_REQUEST["tcod"]))
{
    $_SESSION["tcod"]=$_REQUEST["tcod"];
}
if(isset($_POST["btnsub"]))
{
    $obj=new clsapp();
    $obj->apptskcod=$_SESSION["tcod"];
    $obj->appregcod=$_SESSION["lcod"];
    $obj->appdat=date('y-m-d');
    $obj->appdsc=$_POST["txtdsc"];    
    $obj->save_app();
    header("location:frmsrctsk.php");
    
}
include_once 'header.php';
?>

  <div class="mid-content">
 <form name="frmtskdet" method="Post" action="frmtskdet.php">
 <?php
 if(isset($_SESSION["tcod"]))
 {
     $obj=new clstsk();
     $obj->tskcod=$_SESSION["tcod"];
     $obj->find_tsk();
     echo "<h3>".$obj->tsktit."</h3>";
     echo "<table><tr><td>";
     echo "<p>".$obj->tskdsc."</p>";
     echo "";
     $obj1=new clsreg();
     $obj1->regcod=$obj->tskregcod;
     $obj1->find_reg();
     
     echo "<br><b>Posted By ".$obj1->regnam."</b></td></tr>";
      $dt=date("Y-m-d", strtotime($obj->tskstrdat));
     echo "<tr><td>Starting Date :".$dt."</td></tr>";
     $obj2=new clscat();
     $obj2->catcod=$obj->tskcatcod;
     $obj2->find_cat();
     echo "<tr><td>Task Category :".$obj2->catnam."</td></tr>";
    $arr=$obj1->srcprf($_SESSION["lcod"]);
    if(count($arr)>0 && $arr[0][4]=='V')
    {
        echo "<tr><td><textarea name='txtdsc' rows=5 cols=50 val-message='Enter Description' class='cls-req' ></textarea>";
        echo "<input type='Submit' name='btnsub' value='Post Application' onclick='return validation();' />";
       echo "</td></tr>";
    }  
    echo "</table>";
 }
 ?>
</form>
<?php 
 include_once 'footer.php';
?>




