function validation()
{
     var bool=true;      
     var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
   /* 
     * Required Validations 
     */   
    $('.cls-req').each(function(e){
        var th=$(this);       
      var  cur_val=th.val().trim();
     if(cur_val=='' || cur_val==null){
         bool=false;
         alert(th.attr('val-message'));
     }      
    });
    /* 
     * End Required Validation
     * Email Validations
     */     
        $('.cls-email').each(function(e){                 
            var cur_email=$(this).val().trim();       
            if(re.test(cur_email)==false)
            {
                bool=false;
               alert("Enter Valid Email");
            }
        });    
    /* 
    * End Email Validations      
     * Confirm Password
     */     
        $('.cls-con-pwd').each(function(e){
            var th=$(this);
            var cur_val=th.val().trim(); 
            var comp_id=th.attr('compare-with');
            var comp_val=$('#'+comp_id).val().trim();       
            if(cur_val!=comp_val)
            {
                bool=false;
               alert(th.attr('compare-msg'));
            }
        });    
    /* 
     * End Confirm Password
     * Integer Value allow
     */
    $('.cls-int').each(function(e){
            var th=$(this);
            var cur_val=th.val().trim();
                        
            var numbers = /^[0-9]+$/;  
            if(!cur_val.match(numbers))  
            {             
                  bool=false;
                  alert(th.attr('int-message')); 
            }
    });
    return bool;
}
 