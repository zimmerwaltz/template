
<?php

//All php captcha code
 
// grab recaptcha library
require_once "php/recaptchalib.php";

// your secret key
$secret = "6LdXTiYTAAAAAIP0-ddyu1cGcMHYLITwzFOsu6sV";
 
// empty response
$response = null;
 
// check secret key
$reCaptcha = new ReCaptcha($secret);

// if submitted check response
if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!--font awesome library-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!--main stylesheet-->
    <link rel="stylesheet" href="css/main.css">

    <title>Template</title>

    
  </head>
  
  <body>
  
   
   
    <nav class="navbar navbar-expand-lg navbar-dark">
              <a class="navbar-brand" href="."><i class="fa fa-superpowers"></i> Blade</a>
              <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar top-bar"></span>
                <span class="icon-bar middle-bar"></span>
                <span class="icon-bar bottom-bar"></span>			
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto menu">
                      <li class="nav-item active">
                        <a class="nav-link" href=".">Home <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Projects</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                      </li>
                      <li class="nav-item search-button">
                        <a class="nav-link" href=""><i class="fa fa-search"></i></a>
                      </li>                                
                    </ul>

                    <ul class="navbar-nav ml-auto search-bar">
                        <li class="nav-item">
                            <form class="form-inline my-2 my-lg-0 justify-content-center">
                              <input class="form-control mr-sm-2" type="search" placeholder="Search" autofocus>
                              <a href="" class="btn"><i class="fa fa-times close pull-right"></i></a>
                            </form>
                        </li>
                    </ul>
              </div><!-- nav bar collapse -->
    </nav>
    <!-- navbar ends  -->
   
   
   <div class="container-fluid">
        
    <section id="particles-js">
<!-- particles.js container -->
       
             <h1>We bring <span class="highlight">usability</span> to your product</h1>
            
    </section>    
        
         
         <!-- image slider starts -->
    <section id="gallery">
       
           
           <span class="controls prev" data-button="prev">Prev</span>
           
           
            <div class="slider-inner">
               
                <div class="slide slide1 active">
                   <div class="overlay"></div>
                    <div class="slide-content">
                        <span>Image One</span>
                    </div>
                </div>
                
                <div class="slide slide2">
                   <div class="slide-content">
                        <span>Image Two</span>
                    </div>
                </div>
                  
                <div class="slide slide3">
                   <div class="slide-content">
                        <span>Image Three</span>
                    </div>
                </div>
                
            </div><!-- slider inner -->
            
            <span class="controls next" data-button="next">Next</span>
            
        
        
    </section> <!-- section -->
    <!-- image slider ends -->
        
        
      <!-- form starts -->
    <section id="form-holder">

        <div class="row justify-content-center align-items-center flex-column">
          <h5>Submit an ajax form after validating the fields and enter the form fields into a database using mysqli</h5>
            <div class="col-sm-8 col-md-6 card">

                <div class="card-body">

                    <form id="contactform" method="" action="">
                       
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="name" class="form-control" id="name" name="name" placeholder="Full name">
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                        </div>
                        
                        <div class="form-group">
                            <label for="contact_number">Contact Number</label>
                            <input type="text" class="form-control" id="number" name="number" placeholder="9898989898">
                        </div>
                        
                        <div class="form-group">
                            <label for="city">City</label>
                            <select class="form-control" id="city" name="city" required>
                                <option value="Mumbai">Mumbai</option>
                                <option value="Pune">Pune</option>
                                <option value="Delhi">Delhi</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                            <p class="character-count text-right"><span id="the-count"></span>/150</p>
                        </div>


                        <!-- recaptcha starts-->
                        <div class="g-recaptcha" data-sitekey="6LdXTiYTAAAAAEphSmmJeOW6jm0Su_NwjFej4hdA" data-callback="recaptchaCallback"></div>
                        <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
                        <!-- recaptcha ends-->

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-success btn-lg">Submit</button>
                        </div>

                    </form> <!-- form ends -->        

                    <div class="validation-messages">
                        <!--
                        <p class="success-message"></p>
                        <p class="error-message"></p>            
                        -->
                    </div>           

                </div><!-- card body -->
            </div><!-- card  -->
        </div><!-- row -->
    </section><!-- section ends-->
    <!-- form ends -->
   
   
   
</div> <!-- container fluid ends -->
    
    <!--preloader starts-->
    <div id="preloader">
      <div id="loader"></div>
    </div>    
    <!--preloader ends-->
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!--jquery form validator-->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
    
     <!--re captcha code js-->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    
    <!-- scripts for particle.js begins -->
    <script src="js/particles/particles.min.js"></script>
    <script src="js/particles/app.js"></script>
    <!-- scripts for particle.js ends -->
    
    <script src='js/main.js'></script> 
    
  </body>
</html>