
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/validation.js"></script>

</head>

<body>
    <div id="login" class="center">
    <form id="loginForm"  onsubmit="return validate()">
        <h1 style="margin-bottom:35px;">Login form</h1>
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
        <p class="error" id="error"></p>
        <button name="loginButton" id="loginButton">Login</button>
        
    </form>
</div>
</body>

</html>