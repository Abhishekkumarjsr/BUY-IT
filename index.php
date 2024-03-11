<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUY-IT</title>
    <!-- Google Fonts Link For Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="Index.css">
    <link rel="shortcut icon" type="x-icon" href="weblogo.png">
    <script src="index.js" defer></script>
</head>

<body>
    <header>
        <nav class="navbar">
            <span class="hamburger-btn material-symbols-rounded">menu</span>
            <a href="#" class="logo">
                <img src="logo1.jpg" alt="logo">
                <h2>𝐁𝐔𝐘-𝚰𝐓</h2>
            </a>
            <ul class="links">
                <span class="close-btn material-symbols-rounded">close</span>
                <li><a href="#">Home</a></li>
                <!-- <li><a href="#">Portfolio</a></li> -->
                <!-- <li><a href="#">Courses</a></li> -->
                <li><a href="#">About us</a></li>
                <li><a href="#">Contact us</a></li>
            </ul>
            <button class="login-btn">LOG IN</button>
        </nav>
    </header>

    <div class="blur-bg-overlay"></div>
    <div class="form-popup">
        <span class="close-btn material-symbols-rounded">close</span>
        <div class="form-box login">
            <div class="form-details">
                <h2>Welcome Back</h2>
                <p>Please log in using your personal information to stay connected with us.</p>
            </div>
            <div class="form-content">
                <h2>LOGIN</h2>
                <form action="login.php" method="POST">
                    <div class="input-field">
                        <input type="text" name="username" required>
                        <label>Username</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" required>
                        <label>Password</label>
                    </div>
                    <a href="#" class="forgot-pass-link">Forgot password?</a>
                    <button type="submit">Log In</button>
                </form>
                <div class="bottom-link">
                    Don't have an account?
                    <a href="#" id="signup-link">Signup</a>
                </div>
            </div>
        </div>
        <div class="form-box signup">
            <div class="form-details">
                <h2>Create Account</h2>
                <p>To become a part of our community, please sign up using your personal information.</p>
            </div>
            <div class="form-content">
                <h2>SIGNUP</h2>
                <form action="signin.php" method="POST">
                    <div class="input-field">
                        <input type="text" name="username" required>
                        <label>Create Username</label>
                    </div>
                    <div class="radio">
                        <input type="radio" id="male" name="gender" value="male">
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="female">
                        <label for="female">Female</label>
                        <input type="radio" id="other" name="gender" value="other">
                        <label for="other">Other</label>
                        <!-- <input class="radio-btn" type="submit" value="Submit"> -->
                    </div>
                    <div class="date-of-birth">
                        <label for="dob">Date of Birth:</label>
                        <input type="date" id="dob" name="dob" placeholder="" required>
                    </div>
                    <div class="input-field">
                        <input type="text" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        <label for="exampleInputEmail1">Enter your email</label>
                    </div>
                    <!-- <p>We'll never share your email with anyone else.</p> -->
                    <div class="input-field">
                        <input type="password" name="password" id="exampleInputPassword1" required>
                        <label for="exampleInputPassword1">Create Password</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="confirm_password" id="confirmPassword" required>
                        <label for="confirmPassword">Confirm Password</label>
                    </div>
                    <div class="checkbox">
                        <input type="checkbox" name="robotCheckbox" class="checkbox-size form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">I agree the <a href="#">Terms & Conditions</a></label>
                    </div>
                    <button type="submit" class="">Sign In</button>
                </form>
                <div class="bottom-link">
                    Already have an account?
                    <a href="#" id="login-link">Login</a>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="module">
    // Import the functions you need from the SDKs you need
    import {
        initializeApp
    } from "https://www.gstatic.com/firebasejs/10.7.2/firebase-app.js";
    import {
        getAnalytics
    } from "https://www.gstatic.com/firebasejs/10.7.2/firebase-analytics.js";
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
        apiKey: "AIzaSyDMPws8mALNcGp6xBijUlraVModmImce7Y",
        authDomain: "toddilers.firebaseapp.com",
        projectId: "toddilers",
        storageBucket: "toddilers.appspot.com",
        messagingSenderId: "823472928465",
        appId: "1:823472928465:web:6feaa716fb4cc12669f7f0",
        measurementId: "G-1KY9HVPTTL"
    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const analytics = getAnalytics(app);
</script>

</html>