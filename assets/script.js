$(document).ready(function(){
    var ids = $(".id").val();
    $.ajax({
        url:"inc/retrivequestions.php",                    
        data:{ids:ids},
        method:"POST",
        dataType:"text",
        success:function(data)
        {
            console.log(data)
        }
    }); 
})