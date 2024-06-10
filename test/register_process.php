<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "arjd";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$username = $_POST['uname'];
$password = $_POST['psw'];
if(isset($username) && isset($password)){
    $stmt = $conn->prepare("SELECT username, password FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        header('Location: register.php?register=failed');
        exit; 
    } else {
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        header('Location: index.php?register=success');
        exit;
    }
}
$conn->close();
?>