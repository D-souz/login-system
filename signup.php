<?php require "header.php" ?>

<main> 
<h1>Signup here</h1>
<form action="includes/signupScript.php" method="POST">
    <input type="text" name="uid" placeholder="Username"><br><br>
    <input type="email" name="mail" placeholder="Email"><br><br>
    <input type="password" name="pwd" placeholder="Password"><br><br>
    <input type="password" name="pwd-repeat" placeholder="Confirm password"><br><br>
    <button type="submit" name="signup-submit">Signup</button>
</form>
</main>

<?php require "footer.php" ?>