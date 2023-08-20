<!DOCTYPE html>
<html>
<head>
    <title>Optional Cookie Example</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Optional Cookie Example</h1>
        <label for="darkMode">Dark Mode:</label>
        <input type="checkbox" id="darkMode">
    </div>
    <script>
        const darkModeToggle = document.getElementById('darkMode');

        // Check if the dark mode cookie exists
        if (getCookie('darkMode') === 'true') {
            document.body.classList.add('dark-mode');
            darkModeToggle.checked = true;
        }

        // Toggle dark mode on checkbox change
        darkModeToggle.addEventListener('change', function () {
            if (darkModeToggle.checked) {
                document.body.classList.add('dark-mode');
                setCookie('darkMode', 'true', 365);
            } else {
                document.body.classList.remove('dark-mode');
                deleteCookie('darkMode');
            }
        });

        // Utility functions for handling cookies
        function setCookie(name, value, days) {
            const expires = new Date();
            expires.setTime(expires.getTime() + days * 24 * 60 * 60 * 1000);
            document.cookie = `${name}=${value};expires=${expires.toUTCString()};path=/`;
        }

        function getCookie(name) {
            const match = document.cookie.match(new RegExp(`(^| )${name}=([^;]+)`));
            return match ? match[2] : null;
        }

        function deleteCookie(name) {
            document.cookie = `${name}=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/`;
        }
    </script>
</body>
</html>
