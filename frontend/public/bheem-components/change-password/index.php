<?php
/**
 * Change Password Component - Entry Point
 * Redirects to view.php with user ID parameter
 */

$userid = isset($_GET['id']) ? (int)$_GET['id'] : 0;
header("Location: view.php?id=" . $userid);
exit;
?>
