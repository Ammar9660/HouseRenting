<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo">
            <img src="logo_bg_rm.png" alt="logo">
        </div>
        <div class="header_right">
            <a href="./../Intoduction.php">Home</a>
            <!--  -->
        </div>
    </header>
    <div class="container">
        <div class="login">
            <h2>Login </h2>
            <label for="username">Username </label>
            <input type="text" id="username" name="username" placeholder="Enter Username">

            <label for="password">Password </label>
            <input type="password" id="password" name="password" placeholder="Enter Password">
            <br>
            <button type="submit">Login</button>
        </div>
        <div class="signup">
            <h2>New User</h2>

            <button type="submit">Register</button>
        </div>
    </div>
</body>
</html>