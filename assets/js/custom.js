

/*=============================================================
    Authour URI: www.binarytheme.com
    License: Commons Attribution 3.0

    http://creativecommons.org/licenses/by/3.0/

    100% To use For Personal And Commercial Use.
    IN EXCHANGE JUST GIVE US CREDITS AND TELL YOUR FRIENDS ABOUT US
   
    ========================================================  */


(function ($) {
    "use strict";
    var mainApp = {

        main_fun: function () {

            //ADD REMOVE PADDING CLASS ON SCROLL
            $(window).scroll(function () {
                if ($(".navbar").offset().top >50) {
                    $(".navbar-fixed-top").addClass("navbar-pad-original");
                } else {
                    $(".navbar-fixed-top").removeClass("navbar-pad-original");
                }
            });
            //SLIDESHOW SCRIPT
            $('.carousel').carousel({
                interval: 5000 //TIME IN MILLI SECONDS
            })
            // PRETTYPHOTO FUNCTION 

            $("a.preview").prettyPhoto({
                social_tools: false
            });


            $('.panel-image img.panel-image-preview').on('click', function(e) {
                $(this).closest('.panel-image').toggleClass('hide-panel-body');
            });


            /*====================================
               WRITE YOUR SCRIPTS BELOW 
            ======================================*/
        

        },

        initialization: function () {
            mainApp.main_fun();

        }

    }
    // Initializing ///

    $(document).ready(function () {
        mainApp.main_fun();
    });
    
    
    $('.popovers').popover();
    window.setTimeout(function() {
    $(".alert").fadeTo(2000, 500).slideUp(500, function(){
    $(this).remove(); 
    });
    // 500 : Time will remain on the screen
    }, 500);

    
}(jQuery))


function AllowOnlyNumbers(e) {

    e = (e) ? e : window.event;
    var key = null;
    var charsKeys = [
        97, // a  Ctrl + a Select All
        65, // A Ctrl + A Select All
        99, // c Ctrl + c Copy
        67, // C Ctrl + C Copy
        118, // v Ctrl + v paste
        86, // V Ctrl + V paste
        115, // s Ctrl + s save
        83, // S Ctrl + S save
        112, // p Ctrl + p print
        80 // P Ctrl + P print
    ];

    var specialKeys = [
    8, // backspace
    9, // tab
    27, // escape
    13, // enter
    35, // Home & shiftKey +  #
    36, // End & shiftKey + $
    37, // left arrow &  shiftKey + %
    39, //right arrow & '
    46, // delete & .
    45 //Ins &  -
    ];

    key = e.keyCode ? e.keyCode : e.which ? e.which : e.charCode;

    //console.log("e.charCode: " + e.charCode + ", " + "e.which: " + e.which + ", " + "e.keyCode: " + e.keyCode);
    //console.log(String.fromCharCode(key));

    // check if pressed key is not number 
    if (key && key < 48 || key > 57) {

        //Allow: Ctrl + char for action save, print, copy, ...etc
        if ((e.ctrlKey && charsKeys.indexOf(key) != -1) ||
            //Fix Issue: f1 : f12 Or Ctrl + f1 : f12, in Firefox browser
            (navigator.userAgent.indexOf("Firefox") != -1 && ((e.ctrlKey && e.keyCode && e.keyCode > 0 && key >= 112 && key <= 123) || (e.keyCode && e.keyCode > 0 && key && key >= 112 && key <= 123)))) {
            return true
        }
            // Allow: Special Keys
        else if (specialKeys.indexOf(key) != -1) {
            //Fix Issue: right arrow & Delete & ins in FireFox
            if ((key == 39 || key == 45 || key == 46)) {
                return (navigator.userAgent.indexOf("Firefox") != -1 && e.keyCode != undefined && e.keyCode > 0);
            }
                //DisAllow : "#" & "$" & "%"
            else if (e.shiftKey && (key == 35 || key == 36 || key == 37)) {
                return false;
            }
            else {
                return true;
            }
        }
        else {
            return false;
        }
    }
    else {
        return true;
       }
    }
    
    
var m="A.M.";
function mueveReloj(){
    momentoActual = new Date();
    hora = momentoActual.getHours();
    minuto = momentoActual.getMinutes();
    segundo = momentoActual.getSeconds();

if(hora==12)
{
    m="M.D.";
}
if(hora==13)
{
    hora="0"+1;
    m="P.M.";
}
if(hora==14)
{
    hora="0"+2;
    m="P.M.";
}
if(hora==15)
{
    hora="0"+3;
    m="P.M.";
}
if(hora==16)
{
    hora="0"+4;
    m="P.M.";
}
if(hora==17)
{
    hora="0"+5;
    m="P.M.";
}
if(hora==18)
{
    hora="0"+6;
    m="P.M.";
}
if(hora==19)
{
    hora="0"+7;
    m="P.M.";
}
if(hora==20)
{
    hora="0"+8;
    m="P.M.";
}
if(hora==21)
{
    hora="0"+9;
    M="P.M.";
}
if(hora==22)
{
    hora=10;
    m="P.M.";
}
if(hora==23)
{
    hora=11;
    m="P.M.";
}
if((hora==0)||(hora==24))
{
    hora=12;
    m="M.N";
}

    str_segundo = new String (segundo)
    if (str_segundo.length == 1)
       segundo = "0" + segundo;

    str_minuto = new String (minuto)
    if (str_minuto.length == 1)
       minuto = "0" + minuto;

    str_hora = new String (hora)
    if (str_hora.length == 1)
       hora = "0" + hora;

    horaImprimible = hora + ":" + minuto + ":" + segundo+" "+m;

    cl.innerHTML = horaImprimible;//cl=clock=reloj

    setTimeout("mueveReloj()",1000);
};
