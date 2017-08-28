$(document).ready(function(){
    $(".git_hub") 
        .mouseenter(function(){
            $("#git_hub_logo").css("background", 'url("./images/git_hub_white.png") no-repeat');
        })
        .mouseleave(function(){
            $("#git_hub_logo").css("background", 'url("./images/git_hub.png") no-repeat');
        })
        .click(function(){
            window.open("https://www.linkedin.com/in/thomas-pearson-4180b8138/");
        });

    $("#linkedin")
        .mouseenter(function(){
            $("#linkedin_logo").css("background", 'url("./images/linkedin_white.png") no-repeat');
        })
        .mouseleave(function(){
            $("#linkedin_logo").css("background", 'url("./images/linkedin.png") no-repeat');
        })
        .click(function(){
            window.open("https://github.com/xsv24");
        });

    $("#email_manual")
        .mouseenter(function(){
            $("#email_logo").css("background-image", "url(./images/email_white.png)");
        })
        .mouseleave(function(){
            $("#email_logo").css("background-image", "url(./images/email.png)");
        })
        .click(function(){
            window.location.href = "mailto:xsv24@hotmail.com";
        });
});
