<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign in & Sign up Form</title>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
   <link rel="stylesheet" href="style.css">
  
    <link rel="stylesheet" href="test.css">
  </head>
  <body>
  <nav>
        <div class="nav-bar">
            <i class='bx bx-menu sidebarOpen' ></i>
            <img src="img/logo.png" class="logo">

            <div class="menu">
                <div class="logo-toggle">
                    <span class="logo"><a href="#">CodingLab</a></span>
                    <i class='bx bx-x siderbarClose'></i>
                </div>

                <ul class="nav-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="lessons-html.php">Learn</a></li>
                    <li><a href="#">Leaderboard</a></li>
                    <li><a href="#">Dashboard</a></li>
                    <button class="login-btn">LOG IN</button>
                </ul>
               
            </div>

           
    </nav>
    <main>
      
     <div class="box">
      <span class="icon-close"> <img src="img/cross.256x256.png">
      
      </span>
        <div class="inner-box">
          
          <div class="forms-wrap">
            <form action="login.php" autocomplete="off" class="sign-in-form" method="post">
              <div class="logo">
                
              </div>
              <div class="heading">
                <h2>Welcome Back</h2>
                <h6>Not registred yet?</h6>
                <a href="#" class="toggle">Sign up</a>
              </div>
            

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                    name = "username";
                  />
                  <label>Username</label>
                </div>
                
                <div class="input-wrap">
                  <input
                    type="password"
                    name = "password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Password</label>
                </div>
                

                <input type="submit" name="submit" value="Sign In" class="sign-btn" />


              </div>
            </form>
            <form action="signup.php" autocomplete="off" class="sign-up-form" method="post">
              

              

              <div class="actual-form">
                <div class="heading1">
                  <h2>Let the typing journey begin</h2>
                  
                  </div>
                <div class="input-wrap">
                  <input
                    type="text"
                    minlength="9"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="name";
                  />
                  
                  <label>Name</label>
                </div>
                <div class="input-wrap">
                  <input
                    type="text"
                    minlength="9"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="username"
                  />
                  
                  <label>Username</label>
                </div>


                <div class="input-wrap">
                  <input
                    type="email"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="email"
                  />
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="password"
                  />
                  <label>Password</label>
                </div>
                <div class="heading">
                
                  <h6>Already have an account?</h6>
                  <a href="#" class="toggle">Sign in</a>
                </div>
                <div class = "input-wrap">
                <input type="file" name="pfp" accept="image/*">
                </div> 

                <input type="submit" value="Sign Up" class="sign-btn" name="submit"/>

              </div>
            </form>
          </div>
          <span class="active" data-value="1"></span>
                <span data-value="2"></span>
                <span data-value="3"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <div id="stars-container"></div>
    <!-- Javascript file -->
    
    <script src="app.js"></script>
    <script src="three3.js"></script>
  </body>
</html>
