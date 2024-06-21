<?php
session_start();
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'en';
}
if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
    if ($lang == 'en' || $lang == 'ar') {
        $_SESSION['lang'] = $lang;
    }
}
$language = $_SESSION['lang'];
$content = [
    'en' => [
        'home' => 'Home',
        'about' => 'About us',
        'contact' => 'Contact us',
        'language' => 'English',
        'download' => 'Download our application'
    ],
    'ar' => [
        'home' => 'الرئيسية',
        'about' => 'معلومات عنا',
        'contact' => 'اتصل بنا',
        'language' => 'العربية',
        'download' => 'حمل تطبيقنا'
    ]
];
?>
<!DOCTYPE html>
<html lang="<?php echo $language; ?>">
<head>
    <meta charset="UTF-8">
    <title>Bahrain FM Landing Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
</head>
<body>
<body class="<?php echo $language == 'ar' ? 'arabic' : 'english'; ?>">
    <div class="navbar <?php echo $language == 'ar' ? 'rtl' : 'ltr'; ?>">
        <a href="index.php">
            <img src="logo.svg" alt="Logo" width="51.5" height="51.5">
        </a>
        <span class="menu-icon <?php echo $language == 'ar' ? 'rtl' : 'ltr'; ?>" onclick="toggleMenu()">&#9776;</span>
        <a href="index.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>"><?php echo $content[$language]['home']; ?></a>
        <a href="about.php"><?php echo $content[$language]['about']; ?></a>
        <a href="contact.php"><?php echo $content[$language]['contact']; ?></a>
        <div class="dropdown <?php echo $language == 'ar' ? 'rtl' : 'ltr'; ?>">
            <details>
                <summary><?php echo $content[$language]['language']; ?></summary>
                <div class="dropdown-details">
                    <a href="?lang=en"class="english">English</a>
                    <a href="?lang=ar"class="arabic">العربية</a>
                </div>
            </details>
        </div>
    </div>
    <div class="image-container">
        <img src="singlelongwave.svg" alt="Wave Image">
        <img src="centerlogo.svg" alt="Logo" class="logo">
        <img src="audio.svg" alt="Audio" class="audio">
    </div>
    <div class="footer <?php echo $language == 'ar' ? 'rtl' : 'ltr'; ?>">
        <div class="footer-left">
            <a href="index.php">
                <img src="logo.svg" alt="Logo" width="51.5" height="51.5">
            </a>
            <a href="about.php"><?php echo $content[$language]['about']; ?></a>
            <a href="contact.php"><?php echo $content[$language]['contact']; ?></a>
        </div>
        <div class="footer-center social-icons">
            <a href="https://www.facebook.com/"><img src="facebookicon.svg" alt="Facebook"></a>
            <a href="https://www.tiktok.com/"><img src="tiktokicon.svg" alt="TikTok"></a>
            <a href="https://www.instagram.com/"><img src="instagramicon.svg" alt="Instagram"></a>
        </div>
        <div class="footer-right">
            <p><?php echo $content[$language]['download']; ?></p>
            <div style="display: flex; flex-direction: row;">
                <a href="https://www.apple.com/app-store/">
                    <img src="Playstore.svg" alt="Download on App Store">
                </a>
                <a href="https://play.google.com/store">
                    <img src="Appstore.svg" alt="Get it on Google Play">
                </a>
            </div>
        </div>
    </div>
    <script>
        function toggleMenu() {
            var navbar = document.querySelector('.navbar');
            navbar.classList.toggle('active');
        }
    </script>
</body>
</html>