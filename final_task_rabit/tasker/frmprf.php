<?php
session_start();
include_once '../buslogic.php';
if(!isset($_SESSION["lcod"]))
    header("location:../index.php");

if(isset($_POST["btnsub"]))
{
    $obj=new clsprf();
    $obj->prfexp=$_POST["txtexp"];
    $obj->prfhrlrat=$_POST["txthrlrat"];
    $obj->prfqal=$_POST["txtqal"];
    $obj->prfregcod=$_SESSION["lcod"];
    $obj->prfsts='N';
    $obj->save_prf();
    $obj1=new clsreg();
    $obj1->regcod=$_SESSION["lcod"];
    $obj1->regpic=$_FILES["filupl"]["name"];
    $obj1->update_reg();
    move_uploaded_file($_FILES["filupl"]["tmp_name"]
            ,"../regpics/".$obj1->regpic);
}
if(isset($_POST["btnupd"]))
{
    $obj=new clsprf();
    $obj->prfexp=$_POST["txtexp"];
    $obj->prfhrlrat=$_POST["txthrlrat"];
    $obj->prfqal=$_POST["txtqal"];
    $obj->prfregcod=$_SESSION["lcod"];
    $obj->prfcod=$_SESSION["pcod"];
    $obj->update_prf();
    if($_FILES["filupl"]["name"]!="")
    {
    $obj1=new clsreg();
    $obj1->regcod=$_SESSION["lcod"];
    $obj1->regpic=$_FILES["filupl"]["name"];
    $obj1->update_reg();
    move_uploaded_file($_FILES["filupl"]["tmp_name"]
            ,"../regpics/".$obj1->regpic);
    }
}
if(!isset($_POST["btnsub"]))
{
    $obj=new clsreg();
    $arr=$obj->srcprf($_SESSION["lcod"]);
    if(count($arr)>0 && $arr[0][4]=='V')
    {
        $exp=$arr[0][1];
        $rat=$arr[0][2];
        $qal=$arr[0][3];
        $pic=$arr[0][5];
        $_SESSION["pic"]=$arr[0][5];
        $_SESSION["pcod"]=$arr[0][0];
    }
}
include_once 'header.php';
?>

 <form name="frmprf" method="Post" action="frmprf.php"
       enctype="multipart/form-data">
     
          <h3>Profile</h3>
          <table class="table-bordered" width="100%">
              <tr>
                  <td>Profile Picture</td>
                  <td>
       <input type="file" name="filupl"/>
                  </td>
              </tr>
              <tr>
                  <td>Qualification</td>
                  <td>
     <input type="text" name="txtqal"
   value="<?php if(isset($qal)) echo $qal; ?>" val-message="Enter Qualification" class="cls-req" />
                  </td>
              </tr>
              <tr>
                  <td>Hourly Rate</td>
                  <td>
                      <input type="text" name="txthrlrat" 
     value="<?php if(isset($rat)) echo $rat;?>" val-message="Enter Hourly Rate" int-message="Integer value allow in Hourly Rate" class="cls-req cls-int"/>
                  </td>
              </tr>
              <tr>
                  <td>Experience</td>
                  <td>
 <textarea name="txtexp" rows="5" cols="30" val-message="Enter Experience" class="cls-req">
<?php
if(isset($exp))
    echo $exp;
?>
 </textarea>
                  </td>
              </tr>
              <tr>
                  <td></td>
                  <td>
 <?php
 if(!isset($_SESSION["pcod"]))
echo "<input type=Submit name=btnsub value=Submit onclick='return validation();' />";
 else
echo "<input type=Submit name=btnupd value=Update onclick='return validation();' />";

?>        
<input type="Reset" name="btncan" value="Cancel"/>
                  </td>
              </tr>
          </table>
    
</form>
   <?php
include_once 'footer.php';
   ?>


