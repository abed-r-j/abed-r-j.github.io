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
        'contact' => 'Contact us',
        'contact_info' => 'social@plusfmbahrain.com',
        'phone_info' => '+973 17 564 250',
        'location_info' => '40th Floor, AlMoayyed Tower, Seef, Kingdom of Bahrain'
    ],
    'ar' => [
        'home' => 'الرئيسية',
        'about' => 'معلومات عنا',
        'contact' => 'اتصل بنا',
        'language' => 'العربية',
        'download' => 'حمل تطبيقنا',
        'contact' => 'اتصل بنا',
        'contact_info' => 'social@plusfmbahrain.com',
        'phone_info' => '+973 17 564 250',
        'location_info' => 'الطابق 40، برج المؤيد، السيف، مملكة البحرين'
    ]
];
?>
<!DOCTYPE html>
<html lang="<?php echo $language; ?>">
<head>
    <meta charset="UTF-8">
    <title>Contact us</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="contact.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php">
            <img src="logo.svg" alt="Logo" width="51.5" height="51.5">
        </a>
        <span class="menu-icon" onclick="toggleMenu()">&#9776;</span>
        <a href="index.php"><?php echo $content[$language]['home']; ?></a>
        <a href="about.php"><?php echo $content[$language]['about']; ?></a>
        <a href="contact.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''; ?>"><?php echo $content[$language]['contact']; ?></a>
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
    <div id="contact-text">
        <p><strong><?php echo $content[$language]['contact']; ?></strong></p>
        <p><img src="email.svg" alt="Email"> <?php echo $content[$language]['contact_info']; ?></p>
        <p><img src="phone.svg" alt="Phone"> <?php echo $content[$language]['phone_info']; ?></p>
        <p><img src="location.svg" alt="Location"> <?php echo $content[$language]['location_info']; ?></p>
        <div class="social-icons">
            <a href="https://www.facebook.com/"><img src="facebookicon.svg" alt="Facebook"></a>
            <a href="https://www.tiktok.com/"><img src="tiktokicon.svg" alt="Tiktok"></a>
            <a href="https://www.instagram.com/"><img src="instagramicon.svg" alt="Instagram"></a>
        </div>
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