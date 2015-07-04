<?php
include_once 'config.php';

function Disp_Data()
{
    $con=new clscon();
    $link=$con->db_Connect();
    $qry="select * from tbbook";
    $res=  mysqli_query($link, $qry);
    $output[]="<table border=2>";
    $i=1;
    while($r=mysqli_fetch_row($res))
    {
        $i++;
        if($i==2)
        {
            $output[]='<tr>';
            $i=0;
        }
        $output[]='<td>';
        $output[]="<img src=$r[5] height=100 width=75 />";
        $output[]='</td>';
        $output[]='<td>';
        $output[]="Title: <a href=detail.php?bid=$r[0]>$r[1] </a><br>";
        $output[]="Author: $r[2] <br>";
        $output[]="Pub: $r[3] <br>";
        $output[]="Prc: $r[4] <br>";
        $output[]="<a href=cart.php?bid=$r[0]&action=add><img src=addtocart.jpg height=40 width=130 /></a> <br>";
        $output[]='</td>';
        if($i==1)
        {
            $output[]='</tr>';
        }
    }
        $output[]="</table>";
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
Disp_Data()
        ?>
    </body>
</html>
