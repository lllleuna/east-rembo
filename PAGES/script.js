function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password");
    var checkbox = document.getElementById("pass_cb");

    // Check if the checkbox is checked
    if (checkbox.checked) {
      // Change the password input type to password
      passwordInput.type = "password";
    } else {
      // Change the password input type to text
      passwordInput.type = "text";
    }

    var passwordInput = document.getElementById("confirmpass");
    var checkbox = document.getElementById("conpass_cb");

    // Check if the checkbox is checked
    if (checkbox.checked) {
      // Change the password input type to password
      passwordInput.type = "password";
    } else {
      // Change the password input type to text
      passwordInput.type = "text";
    }
}