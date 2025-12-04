<?php
require __DIR__ . '/functions.php';
require __DIR__ . '/header.php';

// Random User Data
$userData = generateRandomUserData();
$deviceid = $userData['deviceid'];
$imei = $userData['imei'];
$fname = $userData['fname'];
$lname = $userData['lname'];
$email = $userData['email'];
$number = $userData['number'];

// GET Inputs
$mobile = $_GET['mobile'] ?? '';
$otp  = $_GET['otp'] ?? '';
$refer  = $_GET['refer'] ?? '';
$sessionId = $_GET['sessionId'] ?? '';  // 
// Verify OTP API
$url = "https://api.6gain.com/v1/account/registerWithPhone";

$data = json_encode([
    "identity"         => $mobile,
    "password"         => "Kumar123",
    "verifyCode"       => $otp,
    "verifySessionId"  => $sessionId,   // ⭐ USING REAL SESSION ID
    "registerSource"   => "default",
    "referralCode"     => $refer
]);

$headers = [
    "Content-Type: application/json",
    "Content-Length: " . strlen($data)
];

// Call API
$output = httpCall($url, $data, $headers, "POST");
$json = json_decode($output, true);

$status = $json["code"] ?? "";
$msg    = $json["message"] ?? "No message";

// Output
echo '
<h1 class="header-text">Aisha yadav WhatsApp</h1>
<div class="success-message">'.$msg.'</div>
<a href="https://t.me/+XcybaJ2p2-M5Nzc1" target="_blank" class="telegram-btn">Join Our Telegram</a>
';

require __DIR__ . '/footer.php';
?>