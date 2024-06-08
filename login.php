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
    $sql = "SELECT username, password FROM users WHERE username = '".$_POST['uname']."' AND password = '".$_POST['psw']."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $_SESSION['username'] = $_POST['uname'];
        header('Location: welcome.php');
        exit;
    } else {
        header('Location: index.html?login=failed');
        exit;
    }
}
$conn->close();
?>