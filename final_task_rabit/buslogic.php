<?php
include_once 'config.php';
class clscat
{
    public $catcod,$catnam;
    function save_cat()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call inscat('$this->catnam')";
        $res=  mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }
    }
    function update_cat()
    {
     $con=new clscon();
        $link=$con->db_connect();
        $qry="call updcat('$this->catcod','$this->catnam')";
        $res=  mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }   
    }
    function delete_cat()
    {
      $con=new clscon();
        $link=$con->db_connect();
        $qry="call delcat('$this->catcod')";
        $res= mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }  
    }
    function disp_cat()
    {
       $con=new clscon();
        $link=$con->db_connect(); 
        $qry="call dspcat()";
        $res=  mysqli_query($link, $qry);
        $arr=array();
        $i=0;
        while ($r=  mysqli_fetch_row($res))
        {
            $arr[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $arr;
    }
    function find_cat()
    {
        
        $con=new clscon();
       $link=$con->db_connect();
       $qry="call fndcat('$this->catcod')";
      
       $res=  mysqli_query($link, $qry);
       if(mysqli_num_rows($res)>0)
       {
           $r= mysqli_fetch_row($res);
           $this->catcod=$r[0];
           $this->catnam=$r[1];
       }
       $con->db_close();
    }
}
class clsreg
{
    public $regcod,$regeml,$regpwd,$regdat,$regpic,$regnam,$regrol;
   
    
    function logincheck($eml,$pwd)
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call logincheck('$eml','$pwd',@cod,@rol)";
        $res=mysqli_query($link,$qry);
        $res1=mysqli_query($link,"Select @cod,@rol");
        $r=  mysqli_fetch_row($res1);
        if($r[0]==-1)
        {
            $con->db_close();
            return 'N';
        }
        else
        {
            $_SESSION["lcod"]=$r[0];
            $a=$r[1];
            $con->db_close();
            return $a;
        }
    }
    function save_reg()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call insreg('$this->regeml','$this->regpwd','$this->regdat','$this->regpic','$this->regnam','$this->regrol')";
        $res=  mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }
    }
    function updat()
    {
     $con=new clscon();
        $link=$con->db_connect();
        $qry="call updusr('$this->regcod','$this->regpwd')";
        $res=  mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }   
    }
     function update_reg()
    {
     $con=new clscon();
        $link=$con->db_connect();
        $qry="call updreg('$this->regcod','$this->regpic')";
        $res=  mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }   
    }
    function delete_reg()
    {
      $con=new clscon();
        $link=$con->db_connect();
        $qry="call delreg('$this->regcod')";
        $res= mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }  
    }
    function srcprf($rcod)
    {
       $con=new clscon();
        $link=$con->db_connect(); 
        $qry="call srcprf('".$rcod."')";
        $res=  mysqli_query($link, $qry);
        $arr=array();
        $i=0;
        while ($r=  mysqli_fetch_row($res))
        {
            $arr[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $arr;
    }
    
    
    
    function disp_reg()
    {
       $con=new clscon();
        $link=$con->db_connect(); 
        $qry="call dspreg()";
        $res=  mysqli_query($link, $qry);
        $arr=array();
        $i=0;
        while ($r=  mysqli_fetch_row($res))
        {
            $arr[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $arr;
    }
    function find_reg()
    {
        
        $con=new clscon();
       $link=$con->db_connect();
       $qry="call fndreg('$this->regcod')";
      
       $res=  mysqli_query($link, $qry);
       if(mysqli_num_rows($res)>0)
       {
           $r= mysqli_fetch_row($res);
           $this->regcod=$r[0];
           $this->regeml=$r[1];
           $this->regpwd=$r[2];
           $this->regdat=$r[3];
           $this->regpic=$r[4];
           $this->regnam=$r[5];
           $this->regrol=$r[6];
       }
       $con->db_close();
    }
    function find()
    {
        $con=new clscon();
       $link=$con->db_connect();
       $qry="call fndusr('$this->regeml')";
       $res=  mysqli_query($link, $qry);
       if(mysqli_num_rows($res)>0)
       {
           $r= mysqli_fetch_row($res);
           $this->regcod=$r[0];
           $this->regeml=$r[1];
           $this->regpwd=$r[2];
           $this->regdat=$r[3];
           $this->regpic=$r[4];
           $this->regnam=$r[5];
           $this->regrol=$r[6];
       }
       $con->db_close();
    }
}
class clsprf
{
    public $prfcod,$prfregcod,$prfqal,$prfexp,$prfhrlrat,$prfsts;
  
    function updprfsts()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call updprfsts('$this->prfcod','$this->prfsts')";
        $res=  mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }
    }
    function save_prf()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call insprf('$this->prfregcod','$this->prfqal','$this->prfexp','$this->prfhrlrat','$this->prfsts')";
        $res=  mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }
    }
    function update_prf()
    {
     $con=new clscon();
        $link=$con->db_connect();
        $qry="call updprf('$this->prfcod','$this->prfregcod','$this->prfqal','$this->prfexp','$this->prfhrlrat')";
        $res=  mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }   
    }
    function delete_prf()
    {
      $con=new clscon();
        $link=$con->db_connect();
        $qry="call delprf('$this->prfcod')";
        $res= mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }  
    }
    function disp_prf()
    {
       $con=new clscon();
        $link=$con->db_connect(); 
        $qry="call dspnonvrftsk()";
        $res=  mysqli_query($link, $qry);
        $arr=array();
        $i=0;
        while ($r=  mysqli_fetch_row($res))
        {
            $arr[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $arr;
    }
    function find_prf()
    {
        
        $con=new clscon();
       $link=$con->db_connect();
       $qry="call fndprf('$this->prfcod')";
      
       $res=  mysqli_query($link, $qry);
       if(mysqli_num_rows($res)>0)
       {
           $r= mysqli_fetch_row($res);
           $this->prfcod=$r[0];
           $this->prfregcod=$r[1];
           $this->prfqal=$r[2];
           $this->prfexp=$r[3];
           $this->prfhrlrat=$r[4];
           $this->prfsts=$r[5];
           
       }
       $con->db_close();
    }
}
class clstsk
{
    public $tskcod,$tskdat,$tskregcod,$tsktit,$tskdsc,$tskstrdat,$tskcatcod,$tsksts;
   
    function updtsksts()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call updtsksts($this->tskcod,'".$this->tsksts."')";
        $res=  mysqli_query($link, $qry);
        $con->db_close();
    }
    
    function save_tsk()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call instsk('$this->tskdat','$this->tskregcod','$this->tsktit','$this->tskdsc','$this->tskstrdat','$this->tskcatcod','$this->tsksts')";
      // echo $qry;
        $res=  mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }
    }
    function update_tsk()
    {
     $con=new clscon();
        $link=$con->db_connect();
        $qry="call updtsk('$this->tskcod','$this->tskdat','$this->tskregcod','$this->tsktit','$this->tskdsc','$this->tskstrdat','$this->tskcatcod','$this->tsksts')";
        $res=  mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }   
    }
    function delete_tsk()
    {
      $con=new clscon();
        $link=$con->db_connect();
        $qry="call deltsk('$this->tskcod')";
        $res= mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }  
    }
    
    function srctsk($ccod)
    {
       $con=new clscon();
        $link=$con->db_connect(); 
        $qry="call srctsk('".$ccod."')";
        $res=  mysqli_query($link, $qry);
        $arr=array();
        $i=0;
        while ($r=  mysqli_fetch_row($res))
        {
            $arr[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $arr;    
    }
    
    function disp_tsk($rcod)
    {
       $con=new clscon();
        $link=$con->db_connect(); 
        $qry="call dspmytsk('".$rcod."')";
        $res=  mysqli_query($link, $qry);
        $arr=array();
        $i=0;
        while ($r=  mysqli_fetch_row($res))
        {
            $arr[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $arr;
    }
    function find_tsk()
    {
        
        $con=new clscon();
       $link=$con->db_connect();
       $qry="call fndtsk('$this->tskcod')";
      
       $res=  mysqli_query($link, $qry);
       if(mysqli_num_rows($res)>0)
       {
           $r= mysqli_fetch_row($res);
           $this->tskcod=$r[0];
           $this->tskdat=$r[1];
           $this->tskregcod=$r[2];
           $this->tsktit=$r[3];
           $this->tskdsc=$r[4];
           $this->tskstrdat=$r[5];
           $this->tskcatcod=$r[6];
           $this->tsksts=$r[7];
           
       }
       $con->db_close();
    }
}
class clsapp
{
    public $appcod,$apptskcod,$appregcod,$appdat,$appdsc;
    function save_app()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call insapp('$this->apptskcod','$this->appregcod','$this->appdat','$this->appdsc')";
        $res=  mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }
    }
    function update_app()
    {
     $con=new clscon();
        $link=$con->db_connect();
        $qry="call updapp('$this->appcod','$this->apptskcod','$this->appregcod','$this->appdat','$this->appdsc')";
        $res=  mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }   
    }
    function delete_app()
    {
      $con=new clscon();
        $link=$con->db_connect();
        $qry="call delapp('$this->appcod')";
        $res= mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }  
    }
    function disp_app($tskcod)
    {
       $con=new clscon();
        $link=$con->db_connect(); 
        $qry="call dspapp('".$tskcod."')";
        $res=  mysqli_query($link, $qry);
        $arr=array();
        $i=0;
        while ($r=  mysqli_fetch_row($res))
        {
            $arr[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $arr;
    }
    function dspactapp($rcod)
    {
       $con=new clscon();
        $link=$con->db_connect(); 
        $qry="call dspactapp('".$rcod."')";
        $res=  mysqli_query($link, $qry);
        $arr=array();
        $i=0;
        while ($r=  mysqli_fetch_row($res))
        {
            $arr[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $arr;
    }
    function find_app()
    {
        
        $con=new clscon();
       $link=$con->db_connect();
       $qry="call fndapp('$this->appcod')";
      
       $res=  mysqli_query($link, $qry);
       if(mysqli_num_rows($res)>0)
       {
           $r= mysqli_fetch_row($res);
           $this->appcod=$r[0];
           $this->apptskcod=$r[1];
           $this->appregcod=$r[2];
           $this->appdat=$r[3];
           $this->appdsc=$r[4];   
       }
       $con->db_close();
    }
}
class clsmsg
{
    public $msgcod,$msgdat,$msgappcod,$msgsndregcod,$msgdsc,$msgfil;
    function save_msg()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call insmsg('$this->msgdat','$this->msgappcod','$this->msgsndregcod','$this->msgdsc','$this->msgfil')";
        $res=  mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }
    }
    function update_msg()
    {
     $con=new clscon();
        $link=$con->db_connect();
        $qry="call updmsg('$this->msgcod','$this->msgdat','$this->msgappcod','$this->msgsndregcod','$this->msgdsc','$this->msgfil')";
        $res=  mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }   
    }
    function delete_msg()
    {
      $con=new clscon();
        $link=$con->db_connect();
        $qry="call delmsg('$this->msgcod')";
        $res= mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }  
    }
    function dspmsgbyapp($acod)
    {
       $con=new clscon();
        $link=$con->db_connect(); 
        $qry="call dspmsgbyapp('".$acod."')";
        $res=  mysqli_query($link, $qry);
        $arr=array();
        $i=0;
        while ($r=  mysqli_fetch_row($res))
        {
            $arr[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $arr;
    }
    function find_msg()
    {
        
        $con=new clscon();
       $link=$con->db_connect();
       $qry="call fndmsg('$this->msgcod')";
      
       $res=  mysqli_query($link, $qry);
       if(mysqli_num_rows($res)>0)
       {
           $r= mysqli_fetch_row($res);
           $this->msgcod=$r[0];
           $this->msgdat=$r[1];
           $this->msgappcod=$r[2];
           $this->msgsndregcod=$r[3];
           $this->msgdsc=$r[4];  
           $this->msgfil=$r[5]; 
       }
       $con->db_close();
    }
}
class clsasg
{
    public $asgcod,$asgtskcod,$asgregcod,$asghrlprc,$asghrs;
   
    function srcasgcod($tcod)
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call srcasgcod($tcod)";
        $res=  mysqli_query($link, $qry);
        $r=  mysqli_fetch_row($res);
        $con->db_close();
        return $r[0];
    }
    
    function save_asg()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call insasg('$this->asgtskcod','$this->asgregcod','$this->asghrlprc','$this->asghrs')";
       echo $qry;
        $res=  mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }
    }
    function update_asg()
    {
     $con=new clscon();
        $link=$con->db_connect();
        $qry="call updasg('$this->asgcod','$this->asgtskcod','$this->asgregcod','$this->asghrlprc','$this->asghrs')";
        $res=  mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }   
    }
    function delete_asg()
    {
      $con=new clscon();
        $link=$con->db_connect();
        $qry="call delasg('$this->asgcod')";
        $res= mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }  
    }
    function dspasgtsk($rcod)
    {
       $con=new clscon();
        $link=$con->db_connect(); 
        $qry="call dspasgtsk('".$rcod."')";
        $res=  mysqli_query($link, $qry);
        $arr=array();
        $i=0;
         if(mysqli_num_rows($res)>0)
       {
        while ($r=mysqli_fetch_row($res))
        {
            $arr[$i]=$r;
            $i++;
        }
       }
        $con->db_close();
        return $arr;
    }
    
    
    function dspwrkhis($rcod)
    {
       $con=new clscon();
        $link=$con->db_connect(); 
        $qry="call dspwrkhis('".$rcod."')";
        $res=  mysqli_query($link, $qry);
        $arr=array();
        $i=0;
         if(mysqli_num_rows($res)>0)
       {
        while ($r=mysqli_fetch_row($res))
        {
            $arr[$i]=$r;
            $i++;
        }
       }
        $con->db_close();
        return $arr;
    }
    function find_asg()
    {
        
        $con=new clscon();
       $link=$con->db_connect();
       $qry="call fndasg('$this->asgcod')";
      
       $res=  mysqli_query($link, $qry);
       if(mysqli_num_rows($res)>0)
       {
           $r= mysqli_fetch_row($res);
           $this->asgcod=$r[0];
           $this->asgtskcod=$r[1];
           $this->asgregcod=$r[2];
           $this->asghrlprc=$r[3];
           $this->asghrs=$r[4];  
           
       }
       $con->db_close();
    }
}
class clsdis
{
    public $discod,$disasgcod,$disregcod,$disdat,$distit,$disdsc,$disressts;
    function save_dis()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call insdis('$this->disasgcod','$this->disregcod','$this->disdat','$this->distit','$this->disdsc','$this->disressts')";
        $res=  mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }
    }
    function update_dis()
    {
     $con=new clscon();
        $link=$con->db_connect();
        $qry="call upddis('$this->discod','$this->disasgcod','$this->disregcod','$this->disdat','$this->distit','$this->disdsc','$this->disressts')";
        $res=  mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }   
    }
    function delete_dis()
    {
      $con=new clscon();
        $link=$con->db_connect();
        $qry="call deldis('$this->discod')";
        $res= mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }  
    }
    function disp_dis()
    {
       $con=new clscon();
        $link=$con->db_connect(); 
        $qry="call dspdis()";
        $res=  mysqli_query($link, $qry);
        $arr=array();
        $i=0;
        while ($r=  mysqli_fetch_row($res))
        {
            $arr[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $arr;
    }
    function find_dis()
    {
        
        $con=new clscon();
       $link=$con->db_connect();
       $qry="call fnddis('$this->discod')";
      
       $res=  mysqli_query($link, $qry);
       if(mysqli_num_rows($res)>0)
       {
           $r= mysqli_fetch_row($res);
           $this->discod=$r[0];
           $this->disasgcod=$r[1];
           $this->disregcod=$r[2];
           $this->disdat=$r[3];
           $this->distit=$r[4]; 
           $this->disdsc=$r[5];
           $this->disressts=$r[6];
           
       }
       $con->db_close();
    }
}
class clsrev
{
    public $revcod,$revasgcod,$revdat,$revdsc,$revscr;
    function save_rev()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call insrev('$this->revasgcod','$this->revdat','$this->revdsc','$this->revscr')";
        $res=  mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }
    }
    function update_rev()
    {
     $con=new clscon();
        $link=$con->db_connect();
        $qry="call updrev('$this->revcod','$this->revasgcod','$this->revdat','$this->revdsc','$this->revscr')";
        $res=  mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }   
    }
    function delete_rev()
    {
      $con=new clscon();
        $link=$con->db_connect();
        $qry="call delrev('$this->revcod')";
        $res= mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }  
    }
    function disp_rev()
    {
       $con=new clscon();
        $link=$con->db_connect(); 
        $qry="call dsprev()";
        $res=  mysqli_query($link, $qry);
        $arr=array();
        $i=0;
        while ($r=  mysqli_fetch_row($res))
        {
            $arr[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $arr;
    }
    function find_rev()
    {
        
        $con=new clscon();
       $link=$con->db_connect();
       $qry="call fndrev('$this->revcod')";
      
       $res=  mysqli_query($link, $qry);
       if(mysqli_num_rows($res)>0)
       {
           $r= mysqli_fetch_row($res);
           $this->revcod=$r[0];
           $this->revasgcod=$r[1];
           $this->revdat=$r[2];
           $this->revdsc=$r[3];
           $this->revscr=$r[4]; 
           
       }
       $con->db_close();
    }
}
?>
