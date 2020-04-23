function srollToBottom(){
    var element = document.getElementById("chat-body");
    element.scrollTop = element.scrollHeight;
}


$("#user_type_msg").keypress(function(e){
    var key = e.which;
    if(key==13){
        $("#submit-chatbot").click();
        return false;
    }
});

$(document).on("keydown", function(e){
    if(e.key =="Escape"){
        $("#mychatbot").hide();
        $("#chatbot-circle").show();
    }
});

