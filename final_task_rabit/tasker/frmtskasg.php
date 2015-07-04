<?php
session_start();
include_once '../buslogic.php';
if(!isset($_SESSION["lcod"]))
{
    header("location:../login.php");
}
include_once 'header.php';
?>

  <div class="mid-content">
 <form name="frmtskasg" method="Post" action="frmtskasg.php">
 <?php
   $obj=new clsasg();
   $arr=$obj->dspasgtsk($_SESSION["lcod"]);
  
     if(count($arr)==0)
     {
         echo "<h3>No task assigned yet.</h3>";
     }
         else
     {
             echo "<br>";
         echo "<table border=1>";
         echo "<tr><th><b>Assigned Tasks</b></th></tr>";
         for($i=0;$i<count($arr);$i++)
         {
             echo "<tr><td>";
             echo "<h3>".$arr[$i][1]."</h4>";
             $dt=date("Y-m-d", strtotime($arr[$i][3]));
             echo "<b>Start Date :</b>".$dt."<br>";
             echo "<b>Posted By :</b>".$arr[$i][5]."<br>";
             echo "<b>Assigned Hours :</b>".$arr[$i][7]."<br>";
             echo "<b>Assigned Rate :</b>$".$arr[$i][6]."<br>";
             echo "<p>".$arr[$i][4]."</p>";
             if($arr[$i][2]=='C')
             {
                 echo "<b>Task Status :Closed</b><br>";
                 $obj1=new clsrev();
                 $obj1->revcod=$arr[$i][0];
                 $obj1->find_rev();
                 echo "<b>Review Date :</b>".$obj1->revdat."<br>";
                 echo "<b>Review :</b>".$obj1->revdsc."<br>";
                 for($j=1;$j<=5;$j++)
                 {
                     if($j<=$obj1->revscr)
                      echo "<img src='../images/FilledStar.png' height=10px width=10px />";
               else
                        echo "<img src='../images/EmptyStar.png' height=10px width=10px />";               
                 }
             }
             else {
             echo "<b>Task Status :Active</b>";    
             }
             echo "</td></tr>";
         }
         echo "</table>";
     }
 ?>
</form>
 <?php
 include_once 'footer.php';
 ?>