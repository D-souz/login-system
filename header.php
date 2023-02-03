<!DOCTYPE html>
<html lang = "en">
    <head>
        <title>header page</title>
        <meta charset = "UTF-8">
        <meta name="viewport" content="width=device-device, initial-width = 1.0">
        <link rel="stylesheet"  href="styles/mystyle.css">
    </head>
    <body>
        <header> 
            <div>
                <!-- login form if the user already has an account -->
                <form action="includes/login.php" method="post" id="form">
                    <input type="text" name="mailuid" placeholder="Username/Email..."><br><br>
                    <input type="password" name="pwd" placeholder="Password..."><br><br>
                    <button type="submit" name="login-submit">Login</button>
                </form><br>
                <a href="signup.php">Sign up</a><br><br>
                <form action="includes/logout.php" method="post">
                    <button type="submit" name="logout-submit">Logout</button>
                </form>
            </div>
        </header>
    </body>
</html>