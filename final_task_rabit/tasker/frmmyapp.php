<?php
session_start();
include_once '../buslogic.php';
if(!isset($_SESSION["lcod"]))
{
    header("location:../login.php");
}
include_once 'header.php';
?>

<form name="frmmyapp" method="Post" action="frmmyapp.php">
    <h2>Active Applications</h2>
    <?php
    if(isset($_SESSION["lcod"]))
    {
        $obj=new clsapp();
        $arr=$obj->dspactapp($_SESSION["lcod"]);
        echo '<table classs="table-bordered "  width="100%">';
        if(count($arr)>0)
            echo "<tr><th>Task Title</th><th>Category</th><th>Start Date</th><th>Application Date</th></tr>";
        for($i=0;$i<count($arr);$i++)
        {
          echo "<tr><td style=text-align:center;>".$arr[$i][0]."</td>";
          echo "<td style=text-align:center;>".$arr[$i][1]."</td>";
          $dt=date("Y-m-d", strtotime($arr[$i][2]));
          $dt1=date("Y-m-d", strtotime($arr[$i][3]));
          
          echo "<td style=text-align:center;>".$dt."</td>";
          echo "<td style=text-align:center;>".$dt1."</td>";
          $obj1=new clsmsg();
          $arr1=$obj1->dspmsgbyapp($arr[$i][4]);
          if(count($arr1)>0)
              echo "<td><a href=frmmsg.php?acod=".$arr[$i][4]." >Messages(".count($arr1).")</a></td>";
          echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</form>
 <?php
    include_once 'footer.php';
 ?>



