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
</style>
</head>

<body>
<div>
    <h3> Become a member!</h3>

    <form action="formHandler.php" method="post">
        <input type="text" name="first-name" placeholder="First name"><br><br>
        <input type="text" name="last-name" placeholder="Last name"><br><br>
        <input type="number" name="age" placeholder="Age"><br><br>
        <input type="text" name="email" placeholder="e-mail"><br><br>
        <input type="text" name="phone-number" placeholder="Phone number"><br><br>
        <button>Sign up</button>
    </form>
</div>
<div>
    <h3>Database contents</h3>
    <?php 
        require_once "databaseDisplay.php"
    ?>
</body>

</html>