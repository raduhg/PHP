<?php

declare(strict_types = 1);

function signup_inputs() {

    //first name
    if (isset($_SESSION["signup_data"]["first_name"])) {
        echo '<input type="text" name="first-name" placeholder="First name" value="'.$_SESSION["signup_data"]["first_name"] .'"><br><br>';
    } else {
        echo '<input type="text" name="first-name" placeholder="First name"><br><br>'; 
    }

    //last name
    if (isset($_SESSION["signup_data"]["last_name"])) {
        echo '<input type="text" name="last-name" placeholder="Last name" value="'.$_SESSION["signup_data"]["last_name"] .'"><br><br>';
    } else {
        echo '<input type="text" name="last-name" placeholder="Last name"><br><br>'; 
    }

    //age
    if (isset($_SESSION["signup_data"]["age"])) {
        echo '<input type="number" name="age" placeholder="Age" value="'.$_SESSION["signup_data"]["age"] .'"><br><br>';
    } else {
        echo '<input type="text" name="age" placeholder="Age"><br><br>';
    }

    //phone number
    if (isset($_SESSION["signup_data"]["phone_number"])) {
        echo '<input type="text" name="phone-number" placeholder="Phone number" value="'.$_SESSION["signup_data"]["phone_number"] .'"><br><br>';
    } else {
        echo '<input type="text" name="phone-number" placeholder="Phone number"><br><br>'; 
    }

    //email
    if (isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["errors_signup"]["email_taken"]) && !isset($_SESSION["errors_signup"]["invalid_email"])) {
        echo '<input type="text" name="email" placeholder="e-mail" value="'.$_SESSION["signup_data"]["email"] .'"><br><br>';
    } else {
        echo '<input type="text" name="email" placeholder="e-mail"><br><br>'; 
    }

    //password
    echo '<input type="password" name="psw" placeholder="Choose a password"><br><br>';
}

function check_signup_errors() 
{
    if (isset($_SESSION["errors_signup"])){
        $errors = $_SESSION["errors_signup"];

         echo "<br>";

        foreach ($errors as $error) {
            echo '<p class="errors">' .$error . '</p>';
        }

        unset($_SESSION["errors_signup"]);
    } else if (isset($_GET["signup"]) && $_GET["signup"] == "success") {
        echo "<br>";
        echo '<p class="success">Signup successful!</p>';
    }

}