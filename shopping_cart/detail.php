<?php
include_once 'config.php';
function GetDetail()
{
    if(isset($_REQUEST["bid"]))
    {
        $con=new clscon();
        $link=$con->db_Connect();
        $bid=$_REQUEST["bid"];
        $qry="select * from tbbook where bookid=$bid";
        $res=  mysqli_query($link, $qry);
        $output[]="<table border=2>";
        if($r=  mysqli_fetch_row($res))
        {
            $output[]="<tr>";
            $output[]="<td>";
            $output[]="<img src=$r[5] width=70 height=100 >";
            $output[]="</td>";
            $output[]="<td>";
            $output[]="ID: $r[0] <br>";
            $output[]="Title: $r[1] <br>";
            $output[]="Author: $r[2] <br>";
            $output[]="Publisher: $r[3] <br>";
            $output[]="Price: $r[4] <br>";
            $output[]="<a href=cart.php?bid=$r[0]&action=add>Add To Cart</a><br>";
            $output[]="</td>";
            $output[]="</tr>";
        }
        $output[]="</table>";
        $con->db_Close();
    }
    echo join($output);
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
GetDetail()
        ?>
    </body>
</html>
