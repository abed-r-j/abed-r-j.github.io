<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome Page</title>
    <style>
        body {
            font-family: 'Ubuntu', sans-serif;
            background-image: url('https://wallpaperaccess.com/full/676960.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
        }
        .container {
            width: 300px;
            padding: 16px;
            margin: 0 auto;
            margin-top: 100px;
            border-radius: 15px;
            box-shadow: 0px 0px 10px 0px rgb(0, 0, 0);
            backdrop-filter: blur(5px);
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    $lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en';
    ?>
    <div style="text-align: right; margin: 10px;">
        <form method="get" action="language.php" style="display: inline;">
            <select name="lang" onchange="this.form.submit()">
                <option value="en" <?php echo $lang == 'en' ? 'selected' : ''; ?>>English</option>
                <option value="ar" <?php echo $lang == 'ar' ? 'selected' : ''; ?>>العربية</option>
            </select>
        </form>
    </div>
    <div class="container">
        <?php
        echo "<h1>" . ($lang == 'en' ? 'Welcome back, ' : 'مرحبا بك، ') . $_SESSION['username'] . "</h1>";
        ?>
        <p><?php echo $lang == 'en' ? 'Click <a href="index.php">here</a> to go back to the login page.' : 'انقر <a href="index.php">هنا</a> للعودة إلى صفحة الدخول.'; ?></p>
    </div>
</body>
</html>