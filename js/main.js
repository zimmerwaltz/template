
$(document).ready(function(){
    
    
    //preloader function starts
        $(window).on('load',function(){
            $("#preloader").fadeOut();
        });
    //preloader function ends
    
    
    //form validate function starts
    $('#contactform').validate({
            ignore: ".ignore", //to prevent jquery from ignoring hidden fields
            rules:{
                name:{required:true},
                email:{
                    required: true,
                    email:true
                },
                number:{
                    required:true,
                    digits:false,
                    maxlength:10
                },
                city:{required: true},
                message:{
                    required: false,
                    maxlength:150
                        },
                hiddenRecaptcha:{
                required: function () {
                    if (grecaptcha.getResponse() == '') {
                        return true;
                    } else {
                        return false;
                    }
                }
            }//recaptcha validation ends
                
           },//rules ends
            
            messages: {
                hiddenRecaptcha: "Tick the reCaptcha checkbox",//rules ends
            },//custom validation messages

            submitHandler: function(form) {
               $.ajax({
                  
                    type: 'post',
                    url: 'php/process_form.php',
                    data: $('#contactform').serialize(),
                    success: function (response) {
                    //response returned from process.php
                      $('.validation-messages').html(response);
                        $('#contactform')[0].reset();
                        console.log(response);
                    },
                    error: function (response) {
                        console.log(response.statusText);
                    }
                });     
            } //what to do onsubmit

        }); //validate ends 
    

        //remove error message on recaptcha validate
        function recaptchaCallback() {
          $('#hiddenRecaptcha').valid();
        };

    
        //image slider code starts
        var controls = $('.controls');
        var slideContent = $('.slide-content span');
        var all = $('.slide'); //next button
    
        controls.on('click',function(){
            var sliderButton = $(this);
            //using ternary operator instead of if statement
            sliderButton.data('button')==="next"? nextSlide() : prevSlide();
        })

        
        //map arrow keys to the prev and next function
        $(document).keydown(function(e){
            if (e.keyCode == 37) { 
               prevSlide(); //fire on click of left arrow key
            }
            if (e.keyCode == 39) { 
                nextSlide(); //fire on click of right arrow key
            }
        });
    
        // function to show next slide
        function nextSlide(){
             var currSlide = $('.slider-inner .active');
                var nextSlide = currSlide.next();

                if(nextSlide.length){//show next slide
                    all.removeClass('active').css('z-index','-8')
                    .find(slideContent).removeClass();//remove animation on all slide content
                    nextSlide.addClass('active').css('z-index','8')
                    .find(slideContent).addClass('animated fadeInUp');//add animation on current slide content
                }
                else{//show first slide after the last slide is over
                    all.removeClass('active').css('z-index','-8')
                    .find(slideContent).removeClass();//remove animation on all slide content
                    all.eq(0).addClass('active').css('z-index','8')//find first slide and make it current
                    .find(slideContent).addClass('animated fadeInUp');//add animation on current slide content
                }
        }
    
        // function to show previous slide
        function prevSlide(){
            var currSlide = $('.slider-inner .active');
            var prevSlide = currSlide.prev();

            if(prevSlide.length){//show previous slide
                all.removeClass('active').css('z-index','-8')
                .find(slideContent).removeClass();//remove animation on all slide content;
                prevSlide.addClass('active').css('z-index','8')
                .find(slideContent).addClass('animated fadeInUp');//add animation on current slide content;
            }   
            else{//show last slide 
                all.removeClass('active').css('z-index','-8')
                .find(slideContent).removeClass();//remove animation on all slide content
                all.last().addClass('active').css('z-index','8')//find last slide and make it current
                .find(slideContent).addClass('animated fadeInUp');//add animation on current slide content;
            }
        }
    
    //image slider code ends
    
   
    
});//dom ends


// animating the navbar menu items for mobile
var burgerIcon = $('.navbar-toggler');
var menuItems = $('.nav-link');

burgerIcon.on('click',function(){
   var $this = $(this);
    if($this.hasClass('collapsed')){
        menuItems.addClass('animated bounceIn');
    }
    else{
        menuItems.removeClass('bounceIn');
    }

});


//making navbar bg darker on scroll
$(window).scroll(function(){

    var heroArea = $('#hero');//grab hero section
    var navbar = $('.navbar');//grab navbar 

    if ($(this).scrollTop() >= heroArea.height()/80) {
        //if window top is srcolled below half the hero section height
        navbar.addClass('navbarBg');
    }
    else{
        navbar.removeClass('navbarBg');
    }
    


});


//counting the number of charaters on textarea
var formMessage = $('#message');//grabbing the message field

var theCount = $('#the-count');//grabbing the count below the message field

theCount.text("0");//setting the count to 0 initially

//message field on keyup function
formMessage.keyup(function(){

    var $this = $(this);
    var len = $this.val().length; //counting the characters
    var theLength = theCount.text(len);//updating the count on the frontend
    if(len>150){
        theLength.css("color","red");//changing color to red if it exceeds 150
    }
    else{
        theLength.css("color","initial");
    }

});
    
    
    
    

