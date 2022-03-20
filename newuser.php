<!DOCTYPE html>
<html>
<head>
    <title>METANIT.COM</title>
    <meta charset="utf-8" />
</head>
<body>

<?php
include "Connection.php";
include "Output.php";

$output = new Output(new Connection("db","ruslan","111","ruslan","3306"));
$output->select();

if (isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["middle_name"]) && isset($_POST["age"])) {

    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $middleName = $_POST["middle_name"];
    $age = $_POST["age"];

    $sql = "INSERT INTO first (first_name, last_name, middle_name, age) VALUES ('$firstName', $lastName,$middleName,$age)";
    $affectedRowsNumber = $output >exec($sql);
}
?>
<h3>Create a new User</h3>
<form method="post">
    <p>FirstName:
        <input type="text" name="FirstName" /></p>
    <p>LastName:
        <input type="text" name="LastName" /></p>
    <p>MiddleName:
        <input type="text" name="MiddleName" /></p>
    <p>Age:
        <input type="number" name="Age" /></p>
    <input type="submit" value="Save">
</form>
</body>
</html>
