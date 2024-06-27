<?php
session_start();
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(strip_tags($_POST['name']));
    $email = htmlspecialchars(strip_tags($_POST['email']));
    $title = htmlspecialchars(strip_tags($_POST['title']));
    $message = htmlspecialchars(strip_tags($_POST['message']));
    $stmt = $conn->prepare("INSERT INTO contact_submissions (name, email, title, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $title, $message);
    if ($stmt->execute()) {
        $success_message = "Your message has been sent successfully!";
    } else {
        $error_message = "There was an error sending your message. Please try again.";
    }
}
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
include 'db.php';
$contact_email = '';
$contact_phone = '';
$contact_address_en = '';
$contact_address_ar = '';
$contact_title_en = '';
$contact_title_ar = '';
$sql = "SELECT title_en, title_ar, email, phone, address_en, address_ar, email_visible, phone_visible, address_en_visible, address_ar_visible, title_en_visible, title_ar_visible FROM contact_info WHERE id=1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $contact_email = $row["email_visible"] ? $row["email"] : '';
    $contact_phone = $row["phone_visible"] ? $row["phone"] : '';
    $contact_address_en = $row["address_en_visible"] ? $row["address_en"] : '';
    $contact_address_ar = $row["address_ar_visible"] ? $row["address_ar"] : '';
    $contact_title_en = $row["title_en_visible"] ? $row["title_en"] : '';
    $contact_title_ar = $row["title_ar_visible"] ? $row["title_ar"] : '';
} else {
    echo "0 results";
}
$conn->close();
$content = [
    'en' => [
        'home' => 'Home',
        'about' => 'About us',
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
        'contact_info' => 'social@plusfmbahrain.com',
        'phone_info' => '+973 17 564 250',
        'location_info' => 'الطابق 40، برج المؤيد، السيف، مملكة البحرين'
    ]
];
?>
<?php if (!empty($success_message)): ?>
    <div id="success-message" class="alert success"><?php echo $success_message; ?></div>
<?php elseif (!empty($error_message)): ?>
    <div id="error-message" class="alert error"><?php echo $error_message; ?></div>
<?php endif; ?>
<!DOCTYPE html>
<html lang="<?php echo $language; ?>">
<head>
    <meta charset="UTF-8">
    <title>Contact us</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="contact.css">
</head>
<body>
<body class="<?php echo $language == 'ar' ? 'arabic' : 'english'; ?>">
    <div class="navbar <?php echo $language == 'ar' ? 'rtl' : 'ltr'; ?>">
        <a href="index.php">
            <img src="logo.svg" alt="Logo" width="51.5" height="51.5">
        </a>
        <span class="menu-icon <?php echo $language == 'ar' ? 'rtl' : 'ltr'; ?>" onclick="toggleMenu()">&#9776;</span>
        <a href="index.php"><?php echo $content[$language]['home']; ?></a>
        <a href="about.php"><?php echo $content[$language]['about']; ?></a>
        <a href="contact.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''; ?>"><?php echo $content[$language]['contact']; ?></a>
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
    <div id="contact-text">
        <?php if (!empty($contact_title_en) && $language == 'en'): ?>
            <p><strong><?php echo $contact_title_en; ?></strong></p>
        <?php endif; ?>
        <?php if (!empty($contact_title_ar) && $language == 'ar'): ?>
            <p><strong><?php echo $contact_title_ar; ?></strong></p>
        <?php endif; ?>
        <?php if (!empty($contact_email)): ?>
            <p><img src="email.svg" alt="Email"> <?php echo $contact_email; ?></p>
        <?php endif; ?>
        <?php if (!empty($contact_phone)): ?>
            <p><img src="phone.svg" alt="Phone"> <?php echo $contact_phone; ?></p>
        <?php endif; ?>
        <?php if (!empty($contact_address_en) && $language == 'en'): ?>
            <p><img src="location.svg" alt="Location"> <?php echo $contact_address_en; ?></p>
        <?php endif; ?>
        <?php if (!empty($contact_address_ar) && $language == 'ar'): ?>
            <p><img src="location.svg" alt="Location"> <?php echo $contact_address_ar; ?></p>
        <?php endif; ?>
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
    <div class="contact-form">
        <form action="contact.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>
            </div>
            <button type="submit">Send</button>
        </form>
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
    <script>
        window.onload = function() {
            if (document.getElementById('success-message')) {
                setTimeout(function() {
                    document.getElementById('success-message').style.display = 'none';
                }, 5000);
            }
            if (document.getElementById('error-message')) {
                setTimeout(function() {
                    document.getElementById('error-message').style.display = 'none';
                }, 5000);
            }
        }
    </script>
</body>
</html>