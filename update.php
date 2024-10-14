<?php
include('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $sql = "SELECT * FROM employees WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
?>
            <form action="update.php" method="POST">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">
                <label>Name:</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>"><br>
                <label>Address:</label>
                <input type="text" name="address" value="<?php echo htmlspecialchars($user['address']); ?>"><br>
                <label>Salary:</label>
                <input type="text" name="salary" value="<?php echo htmlspecialchars($user['salary']); ?>"><br>
                <input type="submit" name="update" value="Update">
            </form>
<?php
        } else {
            echo "No user found.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} elseif (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];

    try {
        $sql = "UPDATE employees SET name = :name, address = :address, salary = :salary WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        $stmt->bindParam(':salary', $salary, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "Record updated successfully.";
        } else {
            echo "Error updating record.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    header("Location: index.php");
    exit();
}
?>
