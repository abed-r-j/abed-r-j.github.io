<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "arj";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if(!isset($_SESSION['username'])){
    header('Location: index.html');
    exit;
}
$sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."'";
$result = $conn->query($sql);
$username = "";
$email = "";
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $username = $row["username"];
    $email = $row["email"];
  }
} else {
  echo "0 results";
}
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
</head>
<body>
    <h1>Welcome, <?php echo $username; ?></h1>
    <p>Your email is: <?php echo $email; ?></p>
</body>
</html>