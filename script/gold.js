   $("#toggleLogin").click(function () {

     if ($("#loginActive").val() == "1") {

       $("#loginActive").val("0");
       $("#loginModalTitle").html("Sign Up");
       $("#loginSignupButton").html("Sign Up");
       $("#toggleLogin").html("Login");
       $("#username-field").show();
       $("#usernameOption").hide();

     } else {

       $("#loginActive").val("1");
       $("#loginModalTitle").html("Login");
       $("#loginSignupButton").html("Login");
       $("#toggleLogin").html("Sign up");
       $("#username-field").hide();
       $("#usernameOption").show();
     }


   })

   function ajaxScore() {
     $.ajax({
       type: "POST",
       url: "functions.php?action=yourScore",
       datatype: 'json',
       data: ({
         score: $("#final-score").html(),
         level: $("#hidden_value").html()
       }),
       //data: "score=" + $("#final-score").html() + + "&level=" + $("#hidden_value").html(),
       success: function (result) {

         var myObj = $.parseJSON(result);

         if ($.trim(myObj.first) != '1') {
           $("#noLoginalert").html(result).show();
         }

       }
     })
   }


   var button = document.getElementById("loginSignupButton");

   function disableSubmitButton() {
     button.disabled = true;
   }

   function enableSubmitButton() {
     button.disabled = false;
   }

   function showSpinner() {
     var spinner = document.getElementById("spinner");
     spinner.style.display = 'block';
   }

   function hideSpinner() {
     var spinner = document.getElementById("spinner");
     spinner.style.display = 'none';
   }

   function resetTheGame() {
     location.reload();
   }

   var reset_button = document.getElementById("resetButton");
   reset_button.addEventListener("click", resetTheGame);


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

   var counterLeft = 30;
   $("#counter").html(counterLeft);

   $("#beginButton").one("click", function () {
     //myGlobal = $("#levelOption option:selected").text();
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

       // 2 yerine 16 yazilacak

       if (counter == 31) {
         $(".window-popup").fadeIn(function () {

           ajaxScore();

         });
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
       counterLeft--;
       $("#counter").html(counterLeft);
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

   var callback = function () {
     showSpinner();
     disableSubmitButton();

     /*if(document.getElementById('stayLoggedIn').checked) {
      $("#stayLoggedIn").val('1');
    } else {
       $("#stayLoggedIn").val('0');
    }*/

     $.ajax({
       type: "POST",
       url: "actions.php?action=loginSignup",
       datatype: 'json',
       data: ({
         email: $("#email").val(),
         username: $("#username").val(),
         password: $("#password").val(),
         loginActive: $("#loginActive").val()
       }),
       /*data: "email=" + $("#email").val() + "&username=" + $("#username").val() + "&password=" + $("#password").val() + "&loginActive=" + $("#loginActive").val(),*/
       success: function (result) {


         hideSpinner();
         enableSubmitButton();

         var myObj = $.parseJSON(result);

         if ($.trim(myObj.top) == '1') {
           //http://localhost/reaction-game/ YERINE http://www.mertcancam.com/ YAZILACAK

           window.location.replace("http://www.reflekses.com/?page=gold");


         } else {

           $("#loginAlert").html(myObj[0]).show();

         }
       }

     })

   };

   $("#loginSignupButton").click(callback);
   $("input").keypress(function () {
     if (event.which == 13) callback();
   });