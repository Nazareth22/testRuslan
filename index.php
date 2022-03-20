<!DOCTYPE html>
<html>
<head>
    <title>METANIT.COM</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="qwerty.css">
</head>
<body>
<h2>Список пользователей</h2>
<?php
include "Connection.php";
include "Output.php";

$connection = new Connection("db","ruslan","111","ruslan","3306");

$output = new Output($connection);
$output->select();


if (isset($_POST["first_name"], $_POST["last_name"], $_POST["middle_name"], $_POST["age"]))
{

    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $middleName = $_POST["middle_name"];
    $age = $_POST["age"];

        $sql = "INSERT INTO first (first_name, last_name, middle_name, age) VALUES ('$firstName', '$lastName','$middleName','$age')";
        $affectedRowsNumber = $connection->exec($sql);

    header('Location: /index.php');
}

?>
<h3>Create a new User</h3>
<form method="post">
    <p>FirstName:
        <input type="text" name="first_name" /></p>
    <p>LastName:
        <input type="text" name="last_name" /></p>
    <p>MiddleName:
        <input type="text" name="middle_name" /></p>
    <p>Age:
        <input type="number" name="age" /></p>
    <input type="submit" value="Save">
</form>
</body>
</html>
