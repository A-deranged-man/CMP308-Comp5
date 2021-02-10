<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include("header.php");
    include("../model/api.php");
    if($_SESSION["logged-in"] === "yes")
    {
        header("Location: questions.php");
    }
    ?>

    <form class="form" action="../controller/register.php" method="post">
        <h1>Registration</h1>

        <div class="fieldWrapper">
            <label for="fname">First Name:</label>
            <br>
            <input type="text" name="fname" id="fname" placeholder="First Name">
            <span id="confirmMessage" class="confirmMessage"></span>
        </div>

        <div class="fieldWrapper">
            <label for="lname">Last Name:</label>
            <br>
            <input type="text" name="lname" id="lname" placeholder="Last Name">
            <span id="confirmMessage" class="confirmMessage"></span>
        </div>


        <div class="fieldWrapper">
            <label for="email">Email Address:</label>
            <br>
            <input type="text" name="email" id="email" placeholder="Email Address" required onkeyup="validateEmail(); return false;">
            <span id="confirmEmail" class="confirmEmail"></span>
        </div>

        <div class="fieldWrapper">
            <label for="password_entry">Password:</label>
            <br>
            <input type="password" name="password" id="password_entry" value="" placeholder="Password" required>
        </div>
        <div class="fieldWrapper">
            <label for="pass2">Confirm Password:</label>
            <br>
            <input type="password" name="confirm_pass" id="pass2" onkeyup="checkPass(); return false;" value="">
            <span id="confirmMessage" class="confirmMessage"></span>
        </div>
        <input type="submit" name="submit" value="Register">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>

    <script src="../scripts/validate.js"></script>

<?php

    include("footer.php");
?>
