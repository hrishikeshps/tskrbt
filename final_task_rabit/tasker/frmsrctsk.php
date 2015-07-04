<?php
session_start();
include_once '../buslogic.php';
if(!isset($_SESSION["lcod"]))
{
    header("location:../login.php");
}
if(isset($_REQUEST["ccod"]))
{       
   $_SESSION["ccod"]=$_REQUEST["ccod"];
}
include_once 'header.php';
?>

<script language="javascript">
function abc(a)
{
    window.location="frmsrctsk.php?ccod="+a;
}
</script>

  <div class="mid-content">
 <form name="frmsrctsk" method="Post" action="frmsrctsk.php">
 <h3>Search Tasks</h3>
 <table class="table-bordered" width="100%">
     <tr>
         <td>Select Category</td>
         <td>
             <select name="drpcat" onchange="abc(this.value);">
                 <?php
                 $obj=new clscat();
                 $arr=$obj->disp_cat();
                 for($i=0;$i<count($arr);$i++)
                 {
     if(isset($_SESSION["ccod"])&& $_SESSION["ccod"]==$arr[$i][0])
        echo "<option value=".$arr[$i][0]." selected />".$arr[$i][1];
     else
         echo "<option value=".$arr[$i][0]." />".$arr[$i][1];
                 }
                 ?>
             </select>
         </td>
     </tr>
 </table>       
 <?php
   if(isset($_SESSION["ccod"]))
   {
       $obj=new clstsk();
       $arr=$obj->srctsk($_SESSION["ccod"]);
       if(count($arr)>0)
       {
           echo "<h4>Search Results (".count($arr).")</h4>";
           echo "<table border=2  class=table-bordered width=100%>";
       }
       for($i=0;$i<count($arr);$i++)
       {
echo "<tr><td><b><a href=frmtskdet.php?tcod=".$arr[$i][0]." >".$arr[$i][1]."</a></b>";
echo "<p>".$arr[$i][2]."</p>";
 $dt=date("Y-m-d", strtotime($arr[$i][3]));
echo "Starting on ".$dt." posted by ".$arr[$i][4];
echo "</td></tr>";
       }
       echo "</table>";
   }
 ?>
</form>
 <?php
 include_once 'footer.php';
 ?>