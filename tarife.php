<?php include("header.php");?>
    </script>
    <style>
 
.box-container1{background-color: #fcfcfc;
    padding: 25px;
    padding-top: 35px;
    margin-top: 50px;
    text-align: center;
   border-radius: 10px;	
       border: 1px solid #e6e6e6;		
}.sub-header{						
    background-color: #d5f2f8;						
    border-radius: 30px;						
    width: 80%;						
    margin: 0 auto;						
    margin-top: -60px;						
    height: 48px;						
    font-size: 18px;						
    line-height:48px;						
    margin-bottom: 25px;						
    text-align: center;			
}				
.center{				
    text-align: center;						
    height: 140px;		
}		
input.BlueButton {		
    -webkit-appearance: none;		
    -moz-appearance: none;		
    appearance: none;		
    width: 100%; 				
    height: 48px;				
    padding:10px;				
    cursor: pointer;				
    font-family: telenor, Arial;				
    font-size: 18px;				
    background: #007AD0;					
    color: #fff;				
    border: 1px solid #007AD0;				
    border-radius: 3px;		
}		
input.BlueButton:hover {			
    -webkit-appearance: none;		
    -moz-appearance: none;		
    appearance: none;			
    color: #ffffff;				
    background: #046cb6;				
    border: 1px solid #046cb6;		
}			
@media only screen and (min-width: 401px) and (max-width: 960px) { 				
    .box-container{								
        background-color: #f8f0f4;								
        padding: 25px;								
        padding-top: 35px;								
        margin-top: 50px; 						
        text-align: center;					
    }					
    .sub-header{								
        background-color: #a3defe;								
        border-radius: 30px;								
        width: 100%;								
        margin: 0 auto;								
        margin-top: -60px;								
        height: 48px;								
        font-size: 18px;								
        line-height:48px;								
        margin-bottom: 25px;							
        text-align: center;						
    }				
    input.BlueButton {				
        -webkit-appearance: none;			
        -moz-appearance: none;			
        appearance: none;					
        width: 100%;						
        height: 48px;						
        padding:10px;						
        cursor: pointer;						
        font-family: telenor, Arial;						
        font-size: 18px;						
        background: #007AD0;						
        color: #fff;						
        border: 1px solid #007AD0;						
        border-radius: 3px;				}				
        input.BlueButton:hover {					
            -webkit-appearance: none;			
            -moz-appearance: none;			
            appearance: none;			
            color: #ffffff;						
            background: #046cb6;						
            border: 1px solid #046cb6;					
        }			}

</style>
    </style>
    <br>
    <br>
    <br>
   <br><br>
    </div>
  </div>
</div>
<table >


</table>
<script>
$(document).ready(function(){
    var brojac=0;
    //brojac na 0
    $.ajax({
        type:"GET",
        url:"daj_tarife.php",
        data:{'gornja_granica':0, 'donja_granica':6},
        success:function(data){
            $('table').append(data);
            //uvecava za 6
            brojac=brojac+6;
        }
    });
    $(".BlueButton").onclick(function(){
        alert("aaa");
        window.open("/sajt/mobilni_telefoni.php");
    });
});
</script>

    <?php include("footer.php")?>