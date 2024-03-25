<?php

try {
    require_once "include.php";

    
    $statement = $pdo->query("SELECT email, phone, first_name, last_name, age FROM members;");
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

    echo '<table border="1">';
    foreach($rows as $row) {
        echo "<tr><td>";
        echo($row['first_name']);
        echo "</td><td>";
        echo($row['last_name']);
        echo "</td><td>";
        echo($row['age']);
        echo "</td><td>";
        echo($row['email']);
        echo "</td><td>";
        echo($row['phone']);
        echo "</td></tr>";
    }
    echo "</table>";
 } catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}
