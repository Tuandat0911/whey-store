<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="boxicons/css/boxicons.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="assets/logos.png"/>
    <title>login</title>
</head>
<body>
<div class="wrapper">
    <nav class="nav">
        <div class="nav-logo">
            <a href="home.php">
                <img src="assets/logo2.png" alt="" style="width: 150px">
            </a>

        </div>
        <div class="nav-button">
            <button class="btn white-btn" id="loginBtn" onclick="login()">Sign In</button>
            <button class="btn" id="registerBtn" onclick="register()">Sign Up</button>
        </div>
        <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>
        </div>
    </nav>

    <!----------------------------- Form box ----------------------------------->
    <div class="form-box">

        <!------------------- login form -------------------------->

        <div class="login-container" id="login">
            <div class="top">
                <span>Don't have an account? <a href="#" onclick="register()">Sign Up</a></span>
                <header>Login</header>
            </div>
            <form action="xu_ly_login.php" method="post">
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Email" name="email_login">
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" placeholder="Password" name="password_login">
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-box">
                    <input type="submit" class="submit" value="Sign In">
                </div>
            </form>

            <div class="two-col">
                <div class="one">
                    <input type="checkbox" id="login-check">
                    <label for="login-check"> Remember Me</label>
                </div>
                <div class="two">
                    <label><a href="#">Forgot password?</a></label>
                </div>
            </div>
        </div>

        <!------------------- registration form -------------------------->
        <div class="register-container" id="register">
            <div class="top">
                <span>Have an account? <a href="#" onclick="login()">Login</a></span>
                <header>Sign Up</header>
            </div>

            <form action="xu_ly_signup.php" method="post">
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Username" name="username">
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Email" name="email_signup">
                    <i class="bx bx-envelope"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" placeholder="Password" name="password_signup">
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-box">
                    <input type="submit" class="submit" value="Register">
                </div>
            </form>

            <div class="two-col">
                <div class="one">
                    <input type="checkbox" id="register-check">
                    <label for="register-check"> Remember Me</label>
                </div>
                <div class="two">
                    <label><a href="#">Terms & conditions</a></label>
                </div>
            </div>
        </div>
    </div>
</div>



<script>

    function myMenuFunction() {
        var i = document.getElementById("navMenu");

        if(i.className === "nav-menu") {
            i.className += " responsive";
        } else {
            i.className = "nav-menu";
        }
    }

</script>

<script>

    var a = document.getElementById("loginBtn");
    var b = document.getElementById("registerBtn");
    var x = document.getElementById("login");
    var y = document.getElementById("register");

    function login() {
        x.style.left = "4px";
        y.style.right = "-520px";
        a.className += " white-btn";
        b.className = "btn";
        x.style.opacity = 1;
        y.style.opacity = 0;
    }

    function register() {
        x.style.left = "-510px";
        y.style.right = "5px";
        a.className = "btn";
        b.className += " white-btn";
        x.style.opacity = 0;
        y.style.opacity = 1;
    }

</script>

</body>
</html>