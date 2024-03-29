<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $psw = $_POST["psw"];

    try {
        require_once 'include.php';
        require_once 'mvc/login_model.php';
        require_once 'mvc/login_contrl.php';
        
        // Error handling
        $errors = [];

        if (is_input_empty( $email, $psw)) {
         $errors["empty_input"] = "All fields must be filled!";
         }

        $result = get_user($pdo, $email); 

        if(is_email_wrong($result)) {
            $errors["login_incorect"] = "Incorect login info!";
        }

        if (!is_email_wrong($result) && is_psw_wrong($psw, $result["psw"])) { //if the email is right but the password is wrong
            $errors["login_incorect"] = "Incorect login info!";
        }

        require_once "config_session.php";

        if ($errors) { //will return true if errors is not empty
            $_SESSION["errors_login"] = $errors;

            header("Location: signup_login_form.php");
            exit();
        } 

        header("Location: signup_login_form.php?login=success");
        $pdo = null;
        $statement = null;

        die();
    }
    catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

} else {
    header("Location: signup_login_form.php");
    die();
}
