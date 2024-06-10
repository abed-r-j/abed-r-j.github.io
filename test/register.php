<?php
session_start();
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en';
$dir = $lang == 'ar' ? 'rtl' : 'ltr';
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $dir; ?>">
<head>
    <title>Registration Page</title>
    <style>
        body[dir="rtl"] input[type=text], body[dir="rtl"] input[type=password], body[dir="rtl"] .btn1 {
            background-position: left center;
            padding-right: 15px;
            padding-left: 50px;
            direction: rtl;
        }
        body {
            font-family: 'Ubuntu', sans-serif;
            background-image: url('https://wallpaperaccess.com/full/676960.jpg');
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }
        .container {
            width: 300px;
            padding: 16px;
            margin: 0 auto;
            margin-top: 100px;
            margin-bottom: 120px;
            border-radius: 15px;
            box-shadow: 0px 0px 10px 0px rgb(0, 0, 0);
            backdrop-filter: blur(5px);
            background-color: rgba(255, 255, 255, 0.25);
        }
        input[type=text] {
            background-image: url(https://cdn-icons-png.flaticon.com/128/1077/1077012.png);
            background-position: <?php echo $lang == 'ar' ? 'right' : 'left'; ?> 255px center;
            background-repeat: no-repeat;
            background-size: 20px 20px;
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: 1px solid #cccccc;
            border-radius: 15px;
            box-sizing: border-box;
            padding-right: <?php echo $lang == 'en' ? '50px' : '15px'; ?>;
            padding-left: <?php echo $lang == 'ar' ? '50px' : '15px'; ?>;
        }
        input[type=password] {
            background-image: url(https://cdn-icons-png.flaticon.com/128/807/807241.png);
            background-position: <?php echo $lang == 'ar' ? 'right' : 'left'; ?> 255px center;
            background-repeat: no-repeat;
            background-size: 20px 20px;
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: 1px solid #cccccc;
            border-radius: 15px;
            box-sizing: border-box;
            padding-right: <?php echo $lang == 'en' ? '50px' : '15px'; ?>;
            padding-left: <?php echo $lang == 'ar' ? '50px' : '15px'; ?>;
        }
        input[type=text]:focus, input[type=password]:focus {
            outline: none;
        }
        .btn1 {
            background-image: url(https://cdn-icons-png.flaticon.com/128/2921/2921222.png);
            background-position: 255px center;
            background-repeat: no-repeat;
            background-size: 20px 20px;
            background-color: #4caf4fe8;
            color: rgb(255, 255, 255);
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }
        .btn1:hover {
            opacity: 1;
            transform: scale(1.015);
        }
    </style>
</head>
<body>
    <div style="text-align: right; margin: 10px;">
        <form method="get" action="language.php" style="display: inline;">
            <select name="lang" onchange="this.form.submit()">
                <option value="en" <?php echo $lang == 'en' ? 'selected' : ''; ?>>English</option>
                <option value="ar" <?php echo $lang == 'ar' ? 'selected' : ''; ?>>العربية</option>
            </select>
        </form>
    </div>
    <script>
        var urlParams = new URLSearchParams(window.location.search);
        if(urlParams.has('register') && urlParams.get('register') === 'failed') {
            alert('User already exists');
        }
    </script>
    <form class="container" action="register_process.php" method="post">
        <label for="uname"><b><?php echo $lang == 'en' ? 'Username' : 'اسم المستخدم'; ?></b></label>
        <input type="text" placeholder="<?php echo $lang == 'en' ? 'Enter Username' : 'أدخل اسم المستخدم'; ?>" name="uname" required>
        <label for="psw"><b><?php echo $lang == 'en' ? 'Password' : 'كلمة المرور'; ?></b></label>
        <input type="password" placeholder="<?php echo $lang == 'en' ? 'Enter Password' : 'أدخل كلمة المرور'; ?>" name="psw" required>
        <input class="btn1" type="submit" value="<?php echo $lang == 'en' ? 'Register' : 'تسجيل'; ?>">
        <p><?php echo $lang == 'en' ? 'Already a member?' : 'هل أنت عضو بالفعل؟'; ?> <a href="index.php"><?php echo $lang == 'en' ? 'Login here' : 'تسجيل الدخول هنا'; ?></a>.</p>
    </form>
</body>
</html>