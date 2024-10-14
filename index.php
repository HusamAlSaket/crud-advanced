<?php
include('config.php');

try {
    $sql = "SELECT id, name, address, salary FROM employees";
    $stmt = $conn->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($result) > 0) {
        echo "<table border='1' cellpadding='10' cellspacing='0'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Salary</th>
                    <th>Action</th>
                </tr>";
        foreach ($result as $row) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['id']) . "</td>
                    <td>" . htmlspecialchars($row['name']) . "</td>
                    <td>" . htmlspecialchars($row['address']) . "</td>
                    <td>" . htmlspecialchars($row['salary']) . "</td>
                    <td>
                    <a href='view.php?id=" . htmlspecialchars($row['id']) . "' class='btn btn-warning btn-sm'>View</a>
                    <a href='update.php?id=" . htmlspecialchars($row['id']) . "' class='btn btn-warning btn-sm'>Update</a>
                    <a href='delete.php?id=" . htmlspecialchars($row['id']) . "' class='btn btn-danger btn-sm'>Delete</a>

                </td>
                </tr>";
        }
        echo "</table>";
    }
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
?>
