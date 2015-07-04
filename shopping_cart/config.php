<?php
class clscon
{
    public $link;
    function db_Connect()
    {
        $host="localhost";
        $uname="root";
        $pwd="";
        $this->link=  mysqli_connect($host,$uname,$pwd,"dbemployee10");
        return $this->link;
    }
    function db_Close()
    {
        mysqli_close($this->link);
    }
    function Disp_Data()
    {
        if(isset($_SESSION["cart"]))
        {
            if($_SESSION["cart"]!="")
            {
                $items=  explode(',',$_SESSION["cart"]);
                //print_r($items);
                foreach ($items as $item)
                {
                    $contents[$item]=  isset($contents[$item])?$contents[$item]+1:1;
                }
               // print_r($contents);
                
                $output[]="<form action=cart.php?action=update method=post>";
                $output[]="<table border=2>";
                $output[]="<tr><th></th><th>Book Detail</th><th>Pub</th><th>Price</th><th>Qty</th><th>Amount</th>";
                $total=0;
                $link=  $this->db_Connect();
                foreach ($contents as $id=>$qty)
                {
                    $qry="select * from tbbook where bookid='$id'";
                    $res=  mysqli_query($link, $qry)or die(mysqli_error($link));
                    if($r= mysqli_fetch_row($res))
                    {
                        $output[]="<tr>";
                        $output[]="<td>";
                        $output[]="<a href=cart.php?bid=$r[0]&action=delete><img src=delete.jpg height=15 width=15 /></a>";
                        $output[]="</td>";
                        $output[]="<td>";
                        $output[]="$r[1] by $r[2]";
                        $output[]="</td>";
                        $output[]="<td>";
                        $output[]="$r[3]";
                        $output[]="</td>";
                        $output[]="<td>";
                        $output[]="$r[4]";
                        $output[]="</td>";
                        $output[]="<td>";
                        $output[]="<input type=text name=qty$r[0] value=$qty />";
                        $output[]="</td>";
                        $amt=$r[4]*$qty;
                        $total+=$amt;
                        $output[]="<td>";
                        $output[]="$amt";
                        $output[]="</td>";
                        $output[]="</tr>";
                    }
                    
                }
                $output[]="</table><br>";
                $output[]="Total: $total <br>";
                $_SESSION['totamt']=$total;
                $output[]="<input type=submit value=Update name=b1 /> <br>";
                $output[]="<a href=pay.php> Pay Now </a>";
                $output[]="</form>";
                echo join($output);
                $this->db_Close();
            }
        }
    }
    
    function Save_Data()
    {
        if(isset($_SESSION["cart"]))
        {
            $items=  explode(',',$_SESSION["cart"]);
            foreach ($items as $item)
            {
                $contents[$items]=isset($contents[$items])?$contents[$item]+1:1;
            }
            $d=  date('y/m/d');
            $link=  $this->db_Connect();
            $qry="insert tbord values(null,'$d')";
            $res=  mysqli_query($link, $qry);
            $ordcod=  mysqli_insert_id($link);
            foreach ($contents as $id=>$qty)
            {
                $qry1="insert tborddet values($ordcod,$id,$qty)";
                $res1=  mysqli_query($link, $qry1);
                
            }
            session_unset();
            $this->db_Close();
        }
    }
    
}
?>