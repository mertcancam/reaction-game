   $("#toggleLogin").click(function() {
        
        if ($("#loginActive").val() == "1") {
            
            $("#loginActive").val("0");
            $("#loginModalTitle").html("Sign Up");
            $("#loginSignupButton").html("Sign Up");
            $("#toggleLogin").html("Login");
            $("#username-field").show();
 
        } else {
            
            $("#loginActive").val("1");
            $("#loginModalTitle").html("Login");
            $("#loginSignupButton").html("Login");
            $("#toggleLogin").html("Sign up");
            $("#username-field").hide();
        }
        
        
    })
    
  
  function getRandomColor() {
    var letters = '012345'.split('');
    var color = '#';        
    color += letters[Math.round(Math.random() * 5)];
    letters = '0123456789ABCDEF'.split('');
    for (var i = 0; i < 5; i++) {
        color += letters[Math.round(Math.random() * 15)];
    }
    return color;
}  


$("#third-bar").height($(window).height() - $("#top").height() - $("#second-bar").height());

var counter = 0;


$("#beginButton").one("click", function() {
    var start = new Date().getTime();

    function reappear() {
        var width = ((Math.random() * 100) + 4);
        if (Math.random() < 0.5) {
            $("#shapes").css("borderRadius", "50%");
        } else {
            $("#shapes").css("borderRadius", "0");
        }
        $("#shapes").css("marginTop", ((Math.random() * 435) + 1) + "px");
        $("#shapes").css("marginLeft", ((Math.random() * 1050) + 1) + "px");
        $("#shapes").css("width", width + "px");
        $("#shapes").css("height", width + "px");
        $("#shapes").css("backgroundColor", getRandomColor());
        $("#shapes").css("display", "block");
        start = new Date().getTime();
        counter++;
        if (counter == 16) {
            $(".window-popup").show(100);
            $("#button-popup-close").click(function () {
                $(".window-popup").hide(100);
                location.reload();
            });
        }

    }

    function timer() {
        setTimeout(reappear, (Math.random() * 1250) + 200);
    }
    timer();
    var start = new Date().getTime();
    var score = 0;
    $("#shapes").click(function () {
        $("#shapes").css("display", "none");
        var end = new Date().getTime();
        var result = (end - start) / 1000;
        score = score + result;
        $("#score").html(score.toFixed(3));
        $("#final-score").html(score.toFixed(3));
        $("#time").html(result);
        timer();
    });   
});

 $("#loginSignupButton").click(function() {
        
        $.ajax({
            type: "POST",
            url: "action.php?action=loginSignup",
            data: "email=" + $("#email").val() + "&password=" + $("#password").val() + "&loginActive=" + $("#loginActive").val() + "&username=" + $("#username").val(),
            success: function(result) {
                if (result == "1") {
                    
                    window.location.assign("http://mertcancam.com");
                    
                } else {
                    
                    $("#loginAlert").html(result).show();
                    
                }
            }
            
        })
        
    })
   




