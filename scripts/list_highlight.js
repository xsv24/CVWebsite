$(document).ready(function(){
    $("li").hover(
        function(){
           $(this).find(".fill_skill_star, .skill_star").stop().velocity({paddingLeft: "4px", easing: "ease-in-out"});//.css("padding-left", "2px");
        },
        function(){
            $(this).find(".fill_skill_star, .skill_star").stop().velocity({paddingLeft: "2px", easing: "ease-in-out"});//.css("padding-left", "0px");
        }
    );
});
