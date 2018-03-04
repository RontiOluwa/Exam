$(document).ready(function() {

    // Hide Question div
    $('.addquestion').hide(); 
    
    // Create Assessment(Test or Question)

    $(".create").click(function() {
        let type = $(".type").val();   
        let name = $(".name").val();   
        let course = $(".course").val();   
        // console.log(type+name+course);
        if(type ==="" || name === "" || course === ""){
            console.log("Can not submit empty field")
        }
        else
        {
            $.ajax({
                    url:"inc/add.php",
                    method:"POST",
                    data:{type:type,name:name,course:course},
                    dataType:"text",
                    success:function(data)
                    {
                        console.log(data)
                        $('.ids').val(data);
                        if(isNaN(data))
                        {
                            document.write(data + " is not a number <br/>");
                        }
                        else
                        {
                            console.log("Great");
                            $('.addquestion').show(); 
                            $('.add').hide();
                        }
                    }
            });
        }
    })

    // Adding Question to Assessment
    $('.subques').click(function() {
        let question = $(".question").val();   
        let option1 = $(".option1").val();   
        let option2 = $(".option2").val();   
        let option3 = $(".option3").val();   
        let option4 = $(".option4").val();   
        let answer = $(".answer").val();               
        let ids = $('.ids').val();
            if(ids === "" || question==="" || option1 === "" || option2 === "" || option3 === "" || option4 === "" || answer ==="")
            {
                console.log("A Field is missing");
            }
            else 
            {
                $.ajax({
                    url:"inc/addquestions.php",
                    method:"POST",
                    data:{question:question,option1:option1,option2:option2,option3:option3,option4:option4,answer:answer,ids:ids},
                    dataType:"text",
                    success:function(data)
                    {
                        console.log(data);
                        if(data === "Just added a question add  another if not ok")
                        {
                            $(".question").val("");   
                            $(".option1").val("");
                            $(".option2").val("");  
                            $(".option3").val("");
                            $(".option4").val("");
                            $(".answer").val("");
                        }
                    }
                });   
            }  
    })

    //List of Course

    $.ajax({
        url:"inc/cousre-list.php",
        method:"GET",
        dataType:"text",
        success:function(data)
        {
            $(".course").html(data);
        }
    }); 

})