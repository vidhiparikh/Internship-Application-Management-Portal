$(document).ready(function () {

  
    $("#termsConditions").on("ifUnchecked", function(){
        $("#register_user").attr("disabled", "true");
    });
    
    $("#termsConditions").on("ifChecked", function(){
        $("#register_user").removeAttr("disabled");
    });
    
    
        
    
});
