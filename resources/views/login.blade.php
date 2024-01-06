<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalaa|Login</title>
    <link rel="shortcut icon" type="image" href="{{ asset('images/homepage/logo.png') }}">

    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">


  </head>
  <body>
    <section class="container">
        <div class="login-container">
            <div class="circle circle-one"></div>
            <div class="form-container">
                <img src="{{asset('images/login/illustration.png')}}" alt="illustration" class="illustration" />
                <h1 class="opacity">WELCOME</h1>
                <form action="{{ route('login.verify') }}" method="post">
                @csrf
                    <input type="text" name="username" placeholder="Username"  autocomplete="username" required />
                    
                    <div class="password-container">
                      <input type="password" name="password" id="passwordInput" class="password-input" style="margin-bottom: 0;" placeholder="Password" autocomplete="current-password"  required>
                      <span class="toggle-password" onclick="togglePasswordVisibility()"><i class="fas fa-eye"></i></span>
                    </div>
                    <div class="forget-password opacity">
                        <a href="" style="color:#800e0e;">Forgot Password?</a>
                    </div>
                    <button type="submit" style="color: #F0FFF0">Login</button>
                </form>
                <div class="icons">
                  <div class="opacity" style="text-align: center; margin-bottom: 1rem">Or Login with</div>
                  <center><i class="fab fa-facebook-f"></i>
                  <i class="fab fa-twitter"></i>
                  <i class="fab fa-instagram"></i>
                  <i class="fab fa-google"></i></center>
              </div>
      
                <div class="register-forget opacity">
                    <span>Don't have an account? <a href="{{route('signup')}}" style="color:#800e0e;" id="signupLink" onclick="showSignupDialog()">Signup</a></span>
                </div>
                



            </div>
            <div class="circle circle-two"></div>
        </div>
    </section>
  </body>

  <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>

  <script>
   function togglePasswordVisibility() {
  const passwordInput = document.getElementById('passwordInput');
  const icon = document.querySelector('.toggle-password i');

  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    icon.classList.remove('fa-eye');
    icon.classList.add('fa-eye-slash');
  } else {
    passwordInput.type = 'password';
    icon.classList.remove('fa-eye-slash');
    icon.classList.add('fa-eye');
  }
}

  </script>

</html>
