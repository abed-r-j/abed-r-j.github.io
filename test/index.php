<?php
session_start();
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en';
$dir = $lang == 'ar' ? 'rtl' : 'ltr';
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $dir; ?>">
<head>
    <title>Login Page</title>
    <style>
        body[dir="rtl"] input[type=text], body[dir="rtl"] input[type=password], body[dir="rtl"] input[type=email], body[dir="rtl"] input[type=name], body[dir="rtl"] textarea, body[dir="rtl"] .btn1, body[dir="rtl"] .btn2 {
            background-position: left center;
            padding-right: 15px;
            padding-left: 50px;
            direction: rtl;
        }
        body {
            font-family: 'Ubuntu', sans-serif;
            background-image: url('https://wallpaperaccess.com/full/676960.jpg');
            background-size: cover;
            background-position: center;
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
        }
        .container2 {
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
            box-sizing: border-box;
            border-radius: 15px;
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
            box-sizing: border-box;
            border-radius: 15px;
            padding-right: <?php echo $lang == 'en' ? '50px' : '15px'; ?>;
            padding-left: <?php echo $lang == 'ar' ? '50px' : '15px'; ?>;
        }
        input[type=text]:focus, input[type=password]:focus, input[type=email]:focus, input[type=name]:focus, textarea:focus{
            outline: none;
        }
        .btn1 {
            background-image: url(https://cdn-icons-png.flaticon.com/128/2050/2050106.png);
            background-position: <?php echo $lang == 'ar' ? 'right' : 'left'; ?> 255px center;
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
        .btn1:hover, .btn2:hover {
            opacity:1;
            transform: scale(1.015);
        }
        .testimonial {
            width: 50%;
            margin: 20px auto;
            background-color: rgba(255, 255, 255, 0.355);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 0px 10px 0px rgb(0, 0, 0);
            backdrop-filter: blur(5px);
        }
        .testimonial h3 {
            font-size: 1.2em;
            margin-bottom: 10px;
        }
        .testimonial p {
            font-style: italic;
        }
        input[type=name] {
            background-image: url('https://cdn-icons-png.flaticon.com/128/3596/3596095.png');
            background-position: <?php echo $lang == 'ar' ? 'right' : 'left'; ?> 255px center;
            background-repeat: no-repeat;
            background-size: 20px 20px;
            background-color: #f1f1f1;
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            border-radius: 15px;
            box-sizing: border-box;
            padding-right: <?php echo $lang == 'en' ? '50px' : '15px'; ?>;
            padding-left: <?php echo $lang == 'ar' ? '50px' : '15px'; ?>;
        }
        input[type=email] {
            background-image: url('https://cdn-icons-png.flaticon.com/128/2374/2374449.png');
            background-position: <?php echo $lang == 'ar' ? 'right' : 'left'; ?> 255px center;
            background-repeat: no-repeat;
            background-size: 20px 20px;
            background-color: #f1f1f1;
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            border-radius: 15px;
            box-sizing: border-box;
            padding-right: <?php echo $lang == 'en' ? '50px' : '15px'; ?>;
            padding-left: <?php echo $lang == 'ar' ? '50px' : '15px'; ?>;
        }
        textarea {
            background-image: url('https://cdn-icons-png.flaticon.com/128/3845/3845696.png');
            background-position: <?php echo $lang == 'ar' ? 'right' : 'left'; ?> 255px center;
            background-repeat: no-repeat;
            background-size: 20px 20px;
            background-color: #f1f1f1;
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            border-radius: 15px;
            box-sizing: border-box;
            padding-right: <?php echo $lang == 'en' ? '50px' : '15px'; ?>;
            padding-left: <?php echo $lang == 'ar' ? '50px' : '15px'; ?>;
        }
        textarea {
            height: 100px;
            resize: none;
        }
        .btn2 {
            background-image: url(https://cdn-icons-png.flaticon.com/128/15059/15059690.png);
            background-position: <?php echo $lang == 'ar' ? 'right' : 'left'; ?> 255px center;
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
    <form class="container" action="login.php" method="post">
        <label for="uname"><b><?php echo $lang == 'en' ? 'Username' : 'اسم المستخدم'; ?></b></label>
        <input type="text" placeholder="<?php echo $lang == 'en' ? 'Enter Username' : 'أدخل اسم المستخدم'; ?>" name="uname" required>
        <label for="psw"><b><?php echo $lang == 'en' ? 'Password' : 'كلمة المرور'; ?></b></label>
        <input type="password" placeholder="<?php echo $lang == 'en' ? 'Enter Password' : 'أدخل كلمة المرور'; ?>" name="psw" required>
        <button type="submit" class="btn1"><?php echo $lang == 'en' ? 'Login' : 'تسجيل الدخول'; ?></button>
    </form>
    <script>
        var urlParams = new URLSearchParams(window.location.search);
        if(urlParams.has('login') && urlParams.get('login') === 'failed') {
            alert('<?php echo $lang == 'en' ? 'Invalid credentials' : 'بيانات الاعتماد غير صحيحة'; ?>');
        }
    </script>
    <div class="testimonial">
        <h3>testuser</h3>
        <p>They are very professional and delivered the project on time.</p>
    </div>
    <div class="testimonial">
        <h3>Abed</h3>
        <p>It was a very beautiful website.</p>
    </div>
    <div class="container2">
        <form action="contact.php" method="post">
            <label for="name"><b><?php echo $lang == 'en' ? 'Name' : 'الاسم'; ?></b></label>
            <input type="name" placeholder="<?php echo $lang == 'en' ? 'Enter Your Name' : 'أدخل اسمك'; ?>" name="name" required>
            <label for="email"><b><?php echo $lang == 'en' ? 'Email' : 'البريد الإلكتروني'; ?></b></label>
            <input type="email" placeholder="<?php echo $lang == 'en' ? 'Enter Your Email' : 'أدخل بريدك الإلكتروني'; ?>" name="email" required>
            <label for="message"><b><?php echo $lang == 'en' ? 'Message' : 'رسالة'; ?></b></label>
            <textarea name="message" placeholder="<?php echo $lang == 'en' ? 'Enter Your Message' : 'أدخل رسالتك'; ?>" required></textarea>
            <button type="submit" class="btn2"><?php echo $lang == 'en' ? 'Submit' : 'إرسال'; ?></button>
        </form>
    </div>
</body>
</html>