$(document).ready(function(){
            $("#getting").click(function(){
                $("#getting").css({"display":"none"});
                
            });

            $(".close").click(function(){
                $(".chatbot-box").css("display","none");
                $('.chatbot-circle').css('display','block');
                $("#getting").css({"display":"block"});
            });

            $('.chatbot-circle').click(function(){
                $('.chatbot-circle').css('display','none');
                $(".chatbot-box").css("display","block");
            })
});