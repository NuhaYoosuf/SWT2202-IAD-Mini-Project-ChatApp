<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: chat.php");
  }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="styles/style1.css" />
    <title>Chat App</title>
    
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">

           <!-- Register -->
          <section class="form signup">
          <form  class="sign-up-form" method="POST" >
            
            <h2 class="title">Sign up</h2>
            <div class="error-text"></div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="uname" placeholder="Username"  />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Email"  />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" />
            </div>
            <div class="input-field">
              <i class="fas fa-upload"></i>
              <input type="file" name="image" class="select" />
            </div>
            <div class="field button">
            <input type="submit" name="submit" class="btn" value="Sign up" />
          </div>
            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
           
          </form>

          </section>


          <!-- login -->
           <section class="form login">
          <form  class="sign-in-form " method="POST"  >
            <h2 class="title">Sign in</h2>
            <div class="error-text"></div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="text" name="email" placeholder="Email"  />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password"  />
            </div>
            <div class="field button">
              <input type="submit" name="submit" value="Login" class="btn solid " />
            </div>
            
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>

            
          </form>
        </section>
         <script src="javascript/login.js"></script>
            
        </div>
      </div>
      
     <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            
            <h3>New here ?</h3>
            <h6>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam adm dolor sit am .
            </h6>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/log.png" class="image" alt=""  />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <h6>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </h6>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/register.png" class="image" alt=""  />
        </div>
      </div>
    </div> 
    <script src="javascript/signup.js"></script>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/app.js"></script>
    
  </body>
</html>


