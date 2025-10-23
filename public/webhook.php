<?php
// Simple webhook receiver for GitHub
// URL: http://65.108.12.171:8081/webhook.php

$secret = "bheem_academy_deploy_2025";
$logFile = "/home/academy/webhook.log";

// Log request
file_put_contents($logFile, date("Y-m-d H:i:s") . " - Webhook received\n", FILE_APPEND);

// Verify GitHub signature if present
if (isset($_SERVER["HTTP_X_HUB_SIGNATURE_256"])) {
    $payload = file_get_contents("php://input");
    $hash = "sha256=" . hash_hmac("sha256", $payload, $secret);
    
    if (!hash_equals($hash, $_SERVER["HTTP_X_HUB_SIGNATURE_256"])) {
        http_response_code(403);
        die("Invalid signature");
    }
}

// Execute deployment script
exec("sudo /home/academy/deploy.sh > /home/academy/deploy_output.log 2>&1 &");

file_put_contents($logFile, date("Y-m-d H:i:s") . " - Deployment triggered\n", FILE_APPEND);

http_response_code(200);
echo "Deployment triggered";
