<?php
include('config.php');
$id = $_GET['id'];
$sql = "SELECT id, name, address, salary FROM employees WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row) { echo "<br>";
    echo "ID: " . htmlspecialchars($row['id']) . "<br>";
    echo "Name: " . htmlspecialchars($row['name']) . "<br>";
    echo "Address: " . htmlspecialchars($row['address']) . "<br>";
    echo "Salary: " . htmlspecialchars($row['salary']) . "<br>";
} else {
    echo "No record found.";
}
?>
<a href="index.php">Back to View Employees</a>
