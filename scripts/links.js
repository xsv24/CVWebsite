$(document).ready(function(){
    $(".git_hub") 
        .mouseenter(function(){
            $("#git_hub_logo").css("background-position", '-50.5px 0px');
        })
        .mouseleave(function(){
            $("#git_hub_logo").css("background-position", "0px 0px");
        })
        .click(function(){
            window.open("https://github.com/xsv24");
        });

    $("#linkedin")
        .mouseenter(function(){
            $("#linkedin_logo").css("background-position","-48px 0px");
        })
        .mouseleave(function(){
            $("#linkedin_logo").css("background-position", "0px 0px");
        })
        .click(function(){
            window.open("https://www.linkedin.com/in/thomas-pearson-4180b8138/");
        });

    $("#email_manual")
        .mouseenter(function(){
            $("#email_logo").css("background-position", "-48px 0px");
        })
        .mouseleave(function(){
            $("#email_logo").css("background-position", "0px 0px");
        })
        .click(function(){
            window.location.href = "mailto:thomaspearson.dev@gmail.com";
        });
});
