<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalaa|Signup</title>
    <link rel="shortcut icon" type="image" href="{{ asset('images/homepage/logo.png') }}">

    <link rel="stylesheet" href="{{asset('css/signup_artist.css')}}">
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
                <form id="signupForm" action="{{route('register')}}" method="post">
                @csrf
                    <input type="text" name="name" placeholder="Full Name" class="input-field" style="width: 70%;" required />
                    <input type="text" name="address" placeholder="Address" class="input-field" style="width: 90%;" required />
                    <input type="text" name="contact" placeholder="Contact" class="input-field" style="margin-bottom:0px; width: 90%;" required />
                    <div class="inline-fields">
                        <input type="text" name="email" placeholder="Email" class="input-field" style="margin-bottom: 0px; margin-right: 17%; width: 43%;" required />
                        <input type="text" name="username" placeholder="Username" class="input-field" style="margin-bottom: 0px; width:40%;" required />
                    </div>
                    <span class="inline-fields" style="margin-bottom: 0rem;">
                        <span class="password-container" style="width: 300px; height: 85px;">
                            <input type="password" name="password" id="passwordInput" class="input-field" class="password-input" style="margin-bottom: 0; width: 80%;" placeholder="Password" required>
                            <span class="toggle-password" onclick="togglePasswordVisibility()"><i class="fas fa-eye"></i></span>
                        </span>
                        <span class="password-container" style="height:85px; width:250px">
                            <input type="password" name="password" class="input-field" id="confirmPassword" class="password-input" style="margin-left: 1.5rem; margin-bottom: 0; width: 88%; " placeholder="Confirm Password" required>
                            <span class="toggle-password-icon" onclick="togglePasswordVisible()" style="margin-bottom: 0px;"><i class="fas fa-eye"></i></span>
                        </span>
                    </span>
                    <center><span id="passwordMatchError" class="password-match-error" style="font-size: 1rem; color: #530606;"></span></center>                      
                    <br>
                    <div class="opacity">
                        <label for="user_type">Are you Artist or Customer?
                            <br>
                            <input type="radio" name="user_type" value="artist" id=""> Artist 
                            &nbsp; &nbsp; &nbsp;<input type="radio" name="user_type" id="" value="customer" checked> Customer
                        </label>
                    </div>
                    <br>
                    <fieldset id="socialMediaField" style="margin-bottom: 2rem; color: #530606;" class="hidden">
                    <legend  style="color: #530606;">Social Media Links</legend>
                    <span class="inline-fields">
                        <input type="text" id="facebook" name="facebook" placeholder="Facebook" class="input-field" style="margin-right: 10px; margin-top:0px; margin-bottom:0px">
                        <input type="text" id="twitter" name="twitter" placeholder="Twitter" class="input-field" style="margin-right: 10px; margin-top:0px; margin-bottom:0px">
                        <input type="text" id="instagram" name="instagram" placeholder="Instagram" class="input-field" style=" margin-top:0px; margin-bottom:0px" >
                    </span>
                    </fieldset>
                    <fieldset  style="margin-bottom: 2rem; color: #530606;" id="biographyField" class="hidden">
                    <legend  style="color: #530606;">Biography</legend>
                    <textarea id="bio" class="opacity" name="bio" style="width: 100%; height: 10vh;"></textarea>
                    </fieldset>

                    <!-- <center><input type="text" name="user_type" placeholder="User Type" value="Artist" style="text-align: center;" readonly /></center> -->
                    <button type="submit" style="color: #F0FFF0">Signup</button>
                </form>
                <div class="icons">
                  <div class="opacity" style="text-align: center; margin-bottom: 1rem">Or Signup with</div>
                  <center><i class="fab fa-facebook-f"></i>
                  <i class="fab fa-twitter"></i>
                  <i class="fab fa-instagram"></i>
                  <i class="fab fa-google"></i></center>
              </div>
      
                <div class="register-forget opacity">
                    <span>Already have an account? <a href="{{ route('login') }}" style="color:#800e0e;">Login</a></span>
                </div>
                
            </div>

                <div class="circle circle-two"></div>

            </div>
</section>


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

function togglePasswordVisible() {
  const passwordInput = document.getElementById('confirmPassword');
  const icon = document.querySelector('.toggle-password-icon i');

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

//password donot match
        document.addEventListener('DOMContentLoaded', function () {
            var passwordInput = document.getElementById('passwordInput');
            var confirmPasswordInput = document.getElementById('confirmPassword');
            var passwordMatchError = document.getElementById('passwordMatchError');
            var signupForm = document.getElementById('signupForm');
            var modal = document.getElementById('myModal');

            // Event listener for form submission
            signupForm.addEventListener('submit', function (event) {
                if (!isPasswordMatch()) {
                    // Display modal if passwords don't match
                    showModal();
                    // Prevent form submission
                    event.preventDefault();
                }
            });

            // Event listener for input changes
            passwordInput.addEventListener('input', isPasswordMatch);
            confirmPasswordInput.addEventListener('input', isPasswordMatch);

            function isPasswordMatch() {
                var password = passwordInput.value;
                var confirmPassword = confirmPasswordInput.value;

                if (password === confirmPassword) {
                    passwordMatchError.textContent = '';
                    return true;
                } else {
                    passwordMatchError.textContent = 'Passwords do not match';
                    return false;
                }
            }

           
        });


        // JavaScript to toggle visibility based on radio button selection
    const userTypeRadios = document.getElementsByName('user_type');
    const socialMediaFields = document.getElementById('socialMediaField');
    const biographyField = document.getElementById('biographyField');

    for (const radio of userTypeRadios) {
      radio.addEventListener('change', function () {
        if (this.value === 'artist') {
          socialMediaFields.classList.remove('hidden');
          biographyField.classList.remove('hidden');
        } else {
          socialMediaFields.classList.add('hidden');
          biographyField.classList.add('hidden');
        }
      });
    }

  </script>

</html>
