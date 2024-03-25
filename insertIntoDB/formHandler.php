<?php
//transfers the data from the form to the database

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first-name"];
    $last_name = $_POST["last-name"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone-number"];

    try {
        require_once "include.php";

        $query = "INSERT INTO members (email, phone, first_name, last_name, age) VALUES(?, ?, ?, ?, ?);";

        $statement = $pdo->prepare($query);
        $statement->execute([$email, $phone_number, $first_name, $last_name, $age]);


        $pdo = null;
        $statement = null;

        header("Location: index.php");

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}   else {
    header("Location: index.php");
}
