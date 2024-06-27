<?php
session_start();
include 'db.php';
$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $contact_email_visible = isset($_POST['contact_email_visible']) ? 1 : 0;
    $contact_phone_visible = isset($_POST['contact_phone_visible']) ? 1 : 0;
    $contact_address_en_visible = isset($_POST['contact_address_en_visible']) ? 1 : 0;
    $contact_address_ar_visible = isset($_POST['contact_address_ar_visible']) ? 1 : 0;
    $contact_title_en_visible = isset($_POST['contact_title_en_visible']) ? 1 : 0;
    $contact_title_ar_visible = isset($_POST['contact_title_ar_visible']) ? 1 : 0;
    $contact_email = $_POST['contact_email'];
    $contact_phone = $_POST['contact_phone'];
    $contact_address_en = $_POST['contact_address_en'];
    $contact_address_ar = $_POST['contact_address_ar'];
    $contact_title_en = $_POST['contact_title_en'];
    $contact_title_ar = $_POST['contact_title_ar'];
    $sql = "UPDATE contact_info SET email=?, phone=?, address_en=?, address_ar=?, title_en=?, title_ar=?, email_visible=?, phone_visible=?, address_en_visible=?, address_ar_visible=?, title_en_visible=?, title_ar_visible=? WHERE id=1";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ssssssiiiiii", $contact_email, $contact_phone, $contact_address_en, $contact_address_ar, $contact_title_en, $contact_title_ar, $contact_email_visible, $contact_phone_visible, $contact_address_en_visible, $contact_address_ar_visible, $contact_title_en_visible, $contact_title_ar_visible);
        if ($stmt->execute()) {
            $message = "Information updated successfully!";
        } else {
            $message = "Error updating information.";
        }
        $stmt->close();
    }
    $conn->close();
}
include 'db.php';
$sql = "SELECT email, phone, address_en, address_ar, title_en, title_ar, email_visible, phone_visible, address_en_visible, address_ar_visible, title_en_visible, title_ar_visible FROM contact_info WHERE id=1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $contact_email = $row["email"];
    $contact_phone = $row["phone"];
    $contact_address_en = $row["address_en"];
    $contact_address_ar = $row["address_ar"];
    $contact_title_en = $row["title_en"];
    $contact_title_ar = $row["title_ar"];
    $contact_email_visible = $row["email_visible"];
    $contact_phone_visible = $row["phone_visible"];
    $contact_address_en_visible = $row["address_en_visible"];
    $contact_address_ar_visible = $row["address_ar_visible"];
    $contact_title_en_visible = $row["title_en_visible"];
    $contact_title_ar_visible = $row["title_ar_visible"];
} else {
    $message = "No results found.";
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Manage Contact Page</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<div class="side-panel">
    <a href="admin.php">Contact Page</a>
    <a href="contact_submissions.php">Contact Submissions</a>
</div>
<div class="admin-container">
    <h2>Manage Contact Page</h2>
    <?php if ($message != ''): ?>
        <p class="message"><?= $message; ?></p>
    <?php endif; ?>
    <form action="admin.php" method="post">
        
        <label for="contact_email">Contact Email:</label>
        <input type="email" id="contact_email" name="contact_email" value="<?= $contact_email; ?>" required>

        <label for="contact_phone">Contact Phone:</label>
        <input type="text" id="contact_phone" name="contact_phone" value="<?= $contact_phone; ?>" required>

        <label for="contact_address_en">Contact Address (English):</label>
        <input type="text" id="contact_address_en" name="contact_address_en" value="<?= $contact_address_en; ?>" required>

        <label for="contact_address_ar">Contact Address (Arabic):</label>
        <input type="text" id="contact_address_ar" name="contact_address_ar" value="<?= $contact_address_ar; ?>" required>

        <label for="contact_title_en">Contact Title (English):</label>
        <input type="text" id="contact_title_en" name="contact_title_en" value="<?= $contact_title_en; ?>" required>

        <label for="contact_title_ar">Contact Title (Arabic):</label>
        <input type="text" id="contact_title_ar" name="contact_title_ar" value="<?= $contact_title_ar; ?>" required>

        <label><input type="checkbox" name="contact_email_visible" value="1" <?= $contact_email_visible ? 'checked' : ''; ?>> Show Contact Email</label>
        <label><input type="checkbox" name="contact_phone_visible" value="1" <?= $contact_phone_visible ? 'checked' : ''; ?>> Show Contact Phone</label>
        <label><input type="checkbox" name="contact_address_en_visible" value="1" <?= $contact_address_en_visible ? 'checked' : ''; ?>> Show Contact Address (English)</label>
        <label><input type="checkbox" name="contact_address_ar_visible" value="1" <?= $contact_address_ar_visible ? 'checked' : ''; ?>> Show Contact Address (Arabic)</label>
        <label><input type="checkbox" name="contact_title_en_visible" value="1" <?= $contact_title_en_visible ? 'checked' : ''; ?>> Show Contact Title (English)</label>
        <label><input type="checkbox" name="contact_title_ar_visible" value="1" <?= $contact_title_ar_visible ? 'checked' : ''; ?>> Show Contact Title (Arabic)</label>
        <button type="submit">Update Information</button>
    </form>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var toggleButton = document.createElement('button');
    toggleButton.textContent = 'Menu';
    toggleButton.style.position = 'fixed';
    toggleButton.style.top = '0';
    toggleButton.style.left = '0';
    document.body.appendChild(toggleButton);
    toggleButton.addEventListener('click', function() {
        var sidePanel = document.querySelector('.side-panel');
        if (sidePanel.style.display === 'block') {
            sidePanel.style.display = 'none';
        } else {
            sidePanel.style.display = 'block';
        }
    });
    if (window.innerWidth < 768) {
        document.querySelector('.side-panel').style.display = 'none';
    }
});
</script>
</body>
</html>