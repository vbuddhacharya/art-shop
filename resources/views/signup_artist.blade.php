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
    <style>
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
        }

        .close-btn {
            margin-top: 10px;
            cursor: pointer;
            color: #007BFF;
        }

        .password-match-error {
            color: red;
        }

    </style>
  </head>
  <body>
    <section class="container">
        <div class="login-container">
            <div class="circle circle-one"></div>
            <div class="form-container">
                <img src="{{asset('images/login/illustration.png')}}" alt="illustration" class="illustration" />
                <h1 class="opacity">WELCOME</h1>
                <form id="signupForm" action="{{route('artist.register')}}" method="post">
                @csrf
                    <input type="text" name="name" placeholder="Full Name" style="width: 70%;" required />
                    <input type="text" name="address" placeholder="Address" style="width: 90%;" required />
                    <input type="text" name="contact" placeholder="Contact" style="margin-bottom:0px; width: 90%;" required />
                    <div class="inline-fields">
                        <input type="text" name="email" placeholder="Email" style="margin-bottom: 0px; margin-right: 17%; width: 42%;" required />
                        <input type="text" name="username" placeholder="Username" style="margin-bottom: 0px; width:40%;" required />
                    </div>
                    <span class="inline-fields">
                        <span class="password-container" style="width: 330px; height: 100px;">
                            <input type="password" name="password" id="passwordInput" class="password-input" style="margin-bottom: 0; width: 70%;" placeholder="Password" required>
                            <span class="toggle-password" onclick="togglePasswordVisibility()"><i class="fas fa-eye"></i></span>
                        </span>
                        <span class="password-container">
                            <input type="password" name="password" id="confirmPassword" class="password-input" style="margin-bottom: 0; width: 100%; " placeholder="Confirm Password" required>
                            <span class="toggle-password-icon" onclick="togglePasswordVisible()" style="margin-bottom: 0px;"><i class="fas fa-eye"></i></span>
                            <span id="passwordMatchError" class="password-match-error" style="margin-top:0px"></span>                      
                        </span>

                    </span>
                    <fieldset  style="margin-bottom: 2rem; color: #530606;">
                    <legend  style="color: #530606;">Social Media Links</legend>
                    <span class="inline-fields">
                        <input type="text" id="facebook" name="facebook" placeholder="Facebook" style="margin-right: 10px; margin-top:0px; margin-bottom:0px">
                        <input type="text" id="twitter" name="twitter" placeholder="Twitter" style="margin-right: 10px; margin-top:0px; margin-bottom:0px">
                        <input type="text" id="instagram" name="instagram" placeholder="Instagram" style=" margin-top:0px; margin-bottom:0px" >
                    </span>
                    </fieldset>
                    <fieldset  style="margin-bottom: 2rem; color: #530606;">
                    <legend  style="color: #530606;">Biography</legend>
                    <textarea id="bio" name="bio" style="width: 100%; height: 10vh;"></textarea>
                    </fieldset>

                    <center><input type="text" name="user_type" placeholder="User Type" value="Artist" style="text-align: center;" readonly /></center>
                    <button type="submit" style="color: #F0FFF0">Signup</button>
                </form>
                <div class="icons">
                  <div class="opacity" style="text-align: center; margin-bottom: 1rem">Or Signup with</div>
                  <center><i class="fab fa-facebook-f"></i>
                  <i class="fab fa-twitter"></i>
                  <i class="fab fa-instagram"></i>
                  <i class="fab fa-youtube"></i></center>
              </div>
      
                <div class="register-forget opacity">
                    <span>Already have an account? <a href="{{ route('login') }}" style="color:#800e0e;">Login</a></span>
                </div>
                



            </div>
            <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <p>Passwords do not match!</p>
            <span class="close-btn" onclick="closeModal()">Close</span>
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

// document.addEventListener('DOMContentLoaded', function () {
//             var passwordInput = document.getElementById('passwordInput');
//             var confirmPasswordInput = document.getElementById('confirmPassword');
//             var passwordMatchError = document.getElementById('passwordMatchError');
//             var signupForm = document.getElementById('signupForm');

            // Event listener for form submission
            // signupForm.addEventListener('submit', function (event) {
            //     if (!isPasswordMatch()) {
            //         // Prevent form submission if passwords don't match
            //         event.preventDefault();
            //     }
            // });

            // Event listener for input changes
        //     passwordInput.addEventListener('input', isPasswordMatch);
        //     confirmPasswordInput.addEventListener('input', isPasswordMatch);

        //     function isPasswordMatch() {
        //         var password = passwordInput.value;
        //         var confirmPassword = confirmPasswordInput.value;

        //         if (password === confirmPassword) {
        //             passwordMatchError.textContent = '';
        //             return true;
        //         } else {
        //             passwordMatchError.textContent = 'Passwords do not match';
        //             return false;
        //         }
        //     }
        // });



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

            function showModal() {
                modal.style.display = 'flex';
            }

            function closeModal() {
                modal.style.display = 'none';
            }
        });


  </script>

</html>
