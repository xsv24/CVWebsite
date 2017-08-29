$(document).ready(function(){
    
    // class of contents
    function Contents(id, value){
        this.id = id;
        this.value = value;
    }

    function isEmailOkay(email){
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

    function capitalize(str_val){
        return str_val.charAt(0).toUpperCase() + str_val.slice(1);
    }

    // check the contents are not empty or equal to orginal value
    function check_contents(contents){
        var email = "";
        var pass = true;
        $.each(contents, function(index, value){
            var id = value.id.toLowerCase()
            var value = value.value.toLowerCase();
            if(id == value){
                pass = false;
            }

            if(id == "email")
                email = value;

        });
        if(pass === false){
            $("#error_text").text("Please complete fill the form!").css("visibility", "visible");
            return false;
        }
        
        var isEmail = isEmailOkay(email);
        if(!isEmail){
            $("#error_text").text("Please check email is correct").css("visibility", "visible");
            return false;
        }
            
        return true;
    }
    // convert array of contents objects to json
    function convert_to_json(contents){
        var json_text = '{';
            $.each(contents, function(index, value){
                var id = value.id;
                var value = value.value;
            
                if(index != contents.length -1)
                    json_text +=  '"'+ id + '":"' + value + '",';
                else
                     json_text +=  '"'+ id + '":"' + value + '"}';
            });
            console.log(json_text);
        return JSON.parse(json_text);
    }
    function response_handler(data){
        var res = JSON.parse(data);
        
        if(res.success === true){
            console.log("success");
            $("#progress").removeClass("progress");
            $("#progress").addClass("complete_tick");
        }else{
            console.log("Fail" + res.error_msg);
            $("#error_text").text("Failed to Send!").css("visibility", "visible");
        }
    }
    // post_data for email
    function post_data(contents){
        var json = convert_to_json(contents);
        console.log("json sent: " + json);
        $.ajax({
            type:"post",
            url:"./controller/email.php",
            data:json,
            success: function(data){
                response_handler(data);
            }
               
        })   
    }

    // Submit button click
    $("#submit").click(function(){
        $("#error_text").css("visibility", "hidden");
        $("#progress").removeClass("complete_tick");

        var contents = [];
        $("input[type!=submit], textarea").each(function(index, value){
            contents.push(new Contents($(this).attr("id"), $(this).val()));
        });
        res = check_contents(contents);
        
        // request email message be sent
        if(res){
            $("#progress").addClass("progress");
            post_data(contents);
        }
    });

    
    $("input[type=text], input[id=email] ,textarea[id=message]").on({
        // On input text click clear default text
        click: function(){
            $(this).val("");
        },
         // On input text focus select default text so it can be overwritten
        focusin : function(){
            $(this).select();
        },
        // On input text foucs is out and the value is empty reset 
        focusout :function(){
            val = $(this).val();
            if(val == ""){
                $(this).val( capitalize($(this).attr("name")) );
            }
        }
    });
});



