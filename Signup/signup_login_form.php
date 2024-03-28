<?php
require_once 'mvc/signup_view.php';
require_once 'config_session.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Members signup</title>
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    body div {
        padding: 3rem;
    }
    tr td {
        padding: 0.5rem;
    }
    .errors {
        color: red;
    }
    .success {
        color: green;
        font-size: 1.5rem;
    }
</style>
</head>

<body>
<div>
    <h3> Become a member!</h3>

    <form action="signup.php" method="post">
        <?php
        signup_inputs();
        ?>
        <button>Sign up</button>
    </form>

    <?php
        check_signup_errors(); 
    ?>
</div>
<div>
    <h3>Log in</h3>
    <input type="text" name="email" placeholder="e-mail"><br><br>
    <input type="password" name="psw" placeholder="password"><br><br>
    <button>Log in</button>
</body>

</html>