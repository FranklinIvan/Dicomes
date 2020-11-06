
/*$('.toggle').click(function(){
    $('.formulario').animated({
        height:"toggle",
        'padding-top':'toggle',
        'padding-bottom':'toggle',
         opacity:'toggle'

    }, "slow" );

});*/
$(document).ready(function(){
    $("#registro").hide();
    $("#iniciar").hide();
    
    $("#crear").click(function(){

        $("#registro").slideToggle();
        $("#iniciar").slideToggle();
        $("#login").hide();
      

    
        });
    $("#iniciar").click(function(){
         $("#login").slideToggle();
         $("#iniciar").slideToggle();
            $("#registro").hide();
            
            
            
            

        });
    }, "slow");