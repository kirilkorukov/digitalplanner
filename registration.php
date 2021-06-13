

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div id="registration" class="center">
    <form id="registrationForm" action="login.php" method="post">
        <h1 style="margin-bottom:35px;">Registration form</h1>
        <label for="email">Email</label>
        <input type="email" id="email" name="email">
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