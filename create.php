<?php
include('config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];
    
    $sql = "INSERT INTO employees (name, address, salary) VALUES (:name, :address, :salary)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':salary', $salary);
    $stmt->execute();
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Employee</title>
</head>
<body>
    <form method="post">
        Name: <input type="text" name="name" required><br><br>
        Address: <input type="text" name="address" required><br><br>
        Salary: <input type="number" name="salary" required><br><br>
        <input type="submit" value="Add Employee">
    </form>
</body>
</html>
