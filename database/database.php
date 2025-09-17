<?php
$name = $_POST['name'] ?? "";
$bp   = $_POST['buying_price'] ?? "";
$sp   = $_POST['selling_price'] ?? "";
$display = isset($_POST['display']) ? 'Yes' : 'No';
$show = isset($_POST['show']);


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'])) {
    $stmt = $conn->prepare("INSERT INTO products (name, buying_price, selling_price, display) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sdds", $name, $bp, $sp, $display);

    if ($stmt->execute()) {
        echo "Product added successfully.<br><br>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Database</title>
</head>
<body>

<h2>ADD PRODUCT</h2>
<form method="post">
  Name: <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>"><br><br>
  Buying Price: <input type="text" name="buying_price" value="<?php echo htmlspecialchars($bp); ?>"><br><br>
  Selling Price: <input type="text" name="selling_price" value="<?php echo htmlspecialchars($sp); ?>"><br><br>
  Display: <input type="checkbox" name="display" <?php if($display === 'Yes') echo "checked"; ?>><br><br>
  <input type="submit" value="SAVE">
  <input type="submit" name="show" value="DISPLAY">
</form>

<?php
if ($show) {
    $sql = "SELECT id, name, (selling_price - buying_price) AS profit 
            FROM products WHERE display = 'Yes'";
    $result = $conn->query($sql);

    echo "<h3>DISPLAY</h3>";
    echo "<table border='1'>
          <tr><th>NAME</th><th>PROFIT</th><th>ACTION</th></tr>";

    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".htmlspecialchars($row['name'])."</td>
                    <td>".htmlspecialchars($row['profit'])."</td>
                    <td>
                        <a href='edit.php?id=".$row['id']."'>Edit</a> | 
                        <a href='delete.php?id=".$row['id']."'>Delete</a>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No products found</td></tr>";
    }

    echo "</table>";
}

$conn->close();
?>

</body>
</html>
