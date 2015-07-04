<?php
session_start();
include_once 'config.php';
if(isset($_SESSION["cart"]))
    $cart=$_SESSION["cart"];
if(isset($_REQUEST["bid"]))
    $bid=$_REQUEST["bid"];
if(isset($_REQUEST["action"]))
    $action=$_REQUEST["action"];
switch ($action)
{
    case 'add':
        if(isset($cart))
        {
            $cart.=",".$bid;
        }
        else
        {
            $cart=$bid;
        }
        break;
        
    case 'update':
        foreach ($_POST as $key=>$value)
        {
            if(strstr($key,'qty'))
            {
                $bid=  str_replace('qty', '', $key);
                echo $bid.'<br>';
                for($i=1;$i<=$value;$i++)
                {
                    if(isset($newcart))
                    {
                        $newcart.=",".$bid;
                    }
                    else
                    {
                        $newcart=$bid;
                    }
                }
            }
        }
        if(isset($newcart))
        {
            $cart=$newcart;
            //echo "$cart";
        }
        else
        {
            $cart="";
        }
        break;
    
    case 'delete':
        if(isset($_SESSION["cart"]))
        {
            $items=  explode(',',$_SESSION["cart"]);
            foreach($items as $item)
            {
                if($item!=$bid)
                {
                    if(isset($newcart))
                    {
                        $newcart=",".$item;
                    }
                    else
                    {
                        $newcart=$item;
                    }
                }
            }
            if(isset($newcart))
            {
                $cart=$newcart;
            }
            else
            {
                $cart="";
            }
        }
        break;
}
$_SESSION["cart"]=$cart;
//echo $_SESSION["cart"];
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
        $con=new clscon();
        $con->Disp_Data();
        ?>
    </body>
</html>
