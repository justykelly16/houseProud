$(document).ready(function(){
    $("#login").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'checklogin.php',
            type: 'POST',
            data: {username:$("#htlfndr-sing-in-email").val(), password:$("#htlfndr-sing-in-pass").val()},
            success: function(resp){
                if(resp==="invalid"){
                    $("#errorMsg").html("Invalid username and password!");
                }else{
                    window.location.href=resp;
                }
            }
        });
    });
});