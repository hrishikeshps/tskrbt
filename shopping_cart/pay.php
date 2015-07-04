<?php
//header("location:confirm.php")
session_start();
$totamt=$_SESSION["totamt"];
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
    <body onload="document.getElementById('btntest').click();">
        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_xclick" />
            <input type="hidden" name="business" value="rishi.work19.seller@gmail.com" />
            <input type="hidden" name="item_name" value="Book Purchase Payment" />
            <input type="hidden" name="amount" value="<?php echo $totamt; ?>" />
            <input type="hidden" name="return" value="confirm.php" />
            <input type="hidden" name="cancel_return" value="cancel_confirm.php" />
            <input type="hidden" name="rm" value="2" />
            <input type="submit" style="display:none;" id="btntest" value="Buy with additional parameters!" />
            Please wait while we process your payment.....
        </form>
    </body>
</html>
