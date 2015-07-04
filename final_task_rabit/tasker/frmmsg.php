<?php
session_start();
include_once '../buslogic.php';
if(!isset($_SESSION["lcod"]))
{
    header("location:../login.php");
}
if(isset($_REQUEST["acod"]))
{
    $_SESSION["acod"]=$_REQUEST["acod"];
}
if(isset($_REQUEST["dccod"]))
{

    $fn="../msgfils/".$_REQUEST["dccod"];
   // echo $fn;
    if(file_exists($fn))
    {
  header("Content-Disposition:attachement;filename=$fn");
  header("Content-type:application/octet-stream");
  readfile($fn);      
    }
}
if(isset($_POST["btnsub"]))
{
    $obj=new clsmsg();
    $obj->msgappcod=$_SESSION["acod"];
    $obj->msgsndregcod=$_SESSION["lcod"];
    $obj->msgdat=date('y-m-d');
    $obj->msgdsc=$_POST["txtdsc"];
    $s=$_FILES["filupl"]["name"];
    $obj->msgfil=$s;
    $obj->save_msg();
    if($s!="")
    {
        move_uploaded_file($_FILES["filupl"]["tmp_name"],
                "../msgfils/".$_FILES["filupl"]["name"]);
    }
}
include_once 'header.php';
?>

  <div class="mid-content">
      <form name="frmmsg" method="Post" action="frmmsg.php" enctype="multipart/form-data">
          <h3>
       <?php
       if(isset($_SESSION["acod"]))
       {
       $obj=new clsapp();
       $obj->appcod=$_SESSION["acod"];
       $obj->find_app();
       $obj1=new clstsk();
       $obj1->tskcod=$obj->apptskcod;
       $obj1->find_tsk();
       echo $obj1->tsktit;
       }
       ?>
          </h3>
          <h4>Post Message</h4>
          <table>
              <tr>
                  <td>Description</td>
                  <td>
                      <textarea name="txtdsc" rows="6" cols="50" val-message="Enter Description" class="cls-req">
                      </textarea>
                  </td>
                  <tr>
                      <td>Upload File</td>
                      <td> <input type="File" name="filupl"/></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td>
                <input type="Submit" name="btnsub" value="Submit" onclick="return validation();"/>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="Reset" name="btncan" value="Cancel"/>
                      </td>
                  </tr>
              </tr>
          </table>
         <?php
       if(isset($_SESSION["acod"]))
       {
           $obj=new clsmsg();
           $arr=$obj->dspmsgbyapp($_SESSION["acod"]);
           if(count($arr)>0)
           {
               echo "<table border=2><tr><th>Messages</th></tr>";
               for($i=0;$i<count($arr);$i++)
               {
                   echo "<tr><td>";
                   $dt=date("Y-m-d", strtotime($arr[$i][0]));
                   echo "Posted On :".$dt."<br>";
                   echo "<p>".$arr[$i][1]."</p>";
                   if($arr[$i][2]!="")
                   {
    echo "<a href=frmmsg.php?dccod=".$arr[$i][2]." >Download Attachment </a><br>";    
                   }
                   echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                   echo "Posted By :".$arr[$i][3];
                   echo "</td></tr>";
               }
               echo "</table>";
           }
       } 
         ?>
      </form>
 <?php 
         include_once 'footer.php';
 ?>