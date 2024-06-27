<?php
session_start();
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $submissionId = $_POST['submission_id'];
    $stmt = $conn->prepare("UPDATE contact_submissions SET status='replied' WHERE id=?");
    $stmt->bind_param("i", $submissionId);
    $stmt->execute();
    $stmt->close();
}
$sql = "SELECT * FROM contact_submissions";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Submissions</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<div class="side-panel">
    <a href="admin.php">Contact Page</a>
    <a href="contact_submissions.php">Contact Submissions</a>
</div>
<div class="admin-container">
    <h2>Contact Submissions</h2>
    <?php if ($result->num_rows > 0): ?>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Title</th>
                <th>Message</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td><?= $row['title']; ?></td>
                    <td><?= $row['message']; ?></td>
                    <td><?= $row['status']; ?></td>
                    <td>
                        <?php if ($row['status'] == 'new'): ?>
                            <form action="send_reply.php" method="post">
                                <input type="hidden" name="submission_id" value="<?= $row['id']; ?>">
                                <input type="hidden" name="customer_email" value="<?= $row['email']; ?>">
                                <textarea name="reply_message" required placeholder="Type your reply here..."></textarea>
                                <button type="submit">Reply</button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No submissions found.</p>
    <?php endif; ?>
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