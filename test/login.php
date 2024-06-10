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
if(isset($_POST['uname']) && isset($_POST['psw'])){
    $stmt = $conn->prepare("SELECT username, password FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $_POST['uname'], $_POST['psw']);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        header('Location: welcome.php');
        exit; 
    }
    header('Location: index.php?login=failed');
    exit;
}
$conn->close();
?>