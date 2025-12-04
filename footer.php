</div>
<script>
        // Simple script to handle form submission and display a message
        const otpForm = document.getElementById('otp-form');
        const phoneNumberInput = document.getElementById('phone-number');
        const messageDiv = document.getElementById('message');

        otpForm.addEventListener('submit', function(event) {

            const phoneNumber = phoneNumberInput.value;

            // Basic validation to check if the input is not empty
            if (phoneNumber) {
                // Display a confirmation message
                messageDiv.textContent = `Sending OTP to ${phoneNumber}...`;


                }, 2000);

            } else {
                // Display an error if the input is empty
                messageDiv.textContent = 'Please enter a phone number.';
            }
        });
    </script>

</body>
</html>