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
        $.each(contents, function(index, value){
            var id = value.id.toLowerCase()
            var value = value.value.toLowerCase();
            if(id == value){
                $("#error_text").text("Please complete fill the form!");
                return false;
            }

            if(id == "email")
                email = value;

        });
        
        var isEmail = isEmailOkay(email);
        if(!isEmail){
            $("#error_text").text("Please check email is correct");
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

    // post_data for email
    function post_data(contents){
        var json = convert_to_json(contents);
        console.log("json sent: " + json);
        $.ajax({
            type:"post",
            url:"./controller/email.php",
            data:json,
            success: function(data){
                console.log("returned: " + data);
            }
        })    
    }

    // Submit button click
    $("#submit").click(function(){
        $("#error_text").text("");

        var contents = [];
        $("input[type!=submit], textarea").each(function(index, value){
            contents.push(new Contents($(this).attr("id"), $(this).val()));
        });
        res = check_contents(contents);
        
        // request email message be sent
        if(res)
            post_data(contents);
        
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



