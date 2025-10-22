<?php
/**
 * Blog Detail Component - Entry Point
 * Redirects to view.php with default entry ID
 */

$entryid = isset($_GET['entryid']) ? (int)$_GET['entryid'] : 0;
header("Location: view.php?entryid=" . $entryid);
exit;
?>
