<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Auto-generated Username Form</title>
    <script>
        function generateUsername() {
            const firstName = document.getElementById('first_name').value.trim();
            const middleName = document.getElementById('middle_name').value.trim();
            const surname = document.getElementById('surname').value.trim();

            if (firstName && surname) {
                let username = firstName[0].toLowerCase();
                if (middleName) {
                    username += middleName[0].toLowerCase();
                }
                username += surname.toLowerCase();
                document.getElementById('username').value = username;
                checkUsernameAvailability(username);
            }
        }

        function checkUsernameAvailability(username) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'check_username.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.available) {
                        document.getElementById('username').value = response.username;
                    } else {
                        document.getElementById('username').value = response.suggested;
                    }
                }
            };
            xhr.send('username=' + encodeURIComponent(username));
        }
    </script>
</head>
<body>
    <form action="process_form.php" method="POST">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" onkeyup="generateUsername()" required>
        
        <label for="middle_name">Middle Name:</label>
        <input type="text" id="middle_name" name="middle_name" onkeyup="generateUsername()">
        
        <label for="surname">Surname:</label>
        <input type="text" id="surname" name="surname" onkeyup="generateUsername()" required>
        
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" readonly>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
