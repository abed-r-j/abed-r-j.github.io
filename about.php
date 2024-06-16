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
        'download' => 'Download our application',
        'about_us' => 'About us',
        'launch_info' => 'Plus FM was launched in Bahrain in November 2022.',
        'advertise_info' => 'To advertise with us, please contact Group Plus 0097339477 727',
        'tune_in' => 'Tune in: 89.2 fm'
    ],
    'ar' => [
        'home' => 'الرئيسية',
        'about' => 'معلومات عنا',
        'contact' => 'اتصل بنا',
        'language' => 'العربية',
        'download' => 'حمل تطبيقنا',
        'about_us' => 'معلومات عنا',
        'launch_info' => 'تم إطلاق Plus FM في البحرين في نوفمبر 2022.',
        'advertise_info' => 'للإعلان معنا، يرجى التواصل مع جروب بلس 0097339477 727',
        'tune_in' => 'التردد: 89.2 fm'
    ]
];
?>
<!DOCTYPE html>
<html lang="<?php echo $language; ?>">
<head>
    <meta charset="UTF-8">
    <title>About us</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="about.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php">
            <img src="logo.svg" alt="Logo" width="51.5" height="51.5">
        </a>
        <span class="menu-icon" onclick="toggleMenu()">&#9776;</span>
        <a href="index.php"><?php echo $content[$language]['home']; ?></a>
        <a href="about.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : ''; ?>"><?php echo $content[$language]['about']; ?></a>
        <a href="contact.php"><?php echo $content[$language]['contact']; ?></a>
        <div class="dropdown">
            <details>
                <summary><?php echo $content[$language]['language']; ?></summary>
                <div class="dropdown-details">
                    <a href="?lang=en">English</a>
                    <a href="?lang=ar">العربية</a>
                </div>
            </details>
        </div>
    </div>
    <img id="rectangle" src="rectangle.svg" alt="Rectangle">
    <img id="audioon" src="audioon.svg" alt="Audio On">
    <img id="audiowave" src="audiowave.svg" alt="Audio Wave">
    <div id="about-text">
        <p><strong><?php echo $content[$language]['about_us']; ?></strong></p>
        <p><?php echo $content[$language]['launch_info']; ?></p>
        <p><?php echo $content[$language]['advertise_info']; ?></p>
        <p><strong><?php echo $content[$language]['tune_in']; ?></strong></p>
    </div>
    <script>
        function toggleMenu() {
            var navbar = document.querySelector('.navbar');
            navbar.classList.toggle('active');
        }
    </script>
    <div class="footer">
        <div class="footer-left">
            <a href="index.php">
                <img src="logo.svg" alt="Logo" width="51.5" height="51.5">
            </a>
            <a href="about.php"><?php echo $content[$language]['about']; ?></a>
            <a href="contact.php"><?php echo $content[$language]['contact']; ?></a>
        </div>
        <div class="footer-center social-icons">
            <a href="https://www.facebook.com/"><img src="facebookicon.svg" alt="Facebook"></a>
            <a href="https://www.tiktok.com/"><img src="tiktokicon.svg" alt="Tiktok"></a>
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
</body>
</html>