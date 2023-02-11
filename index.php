<?php require "header.php" ?>

<main> 
    <?php 
    // checking if there are session variables to login or out the user
    if (isset($_SESSION['userId'])) {
        echo "<p>You are logged in!</p>";
    }
    else {
        echo "<p>You are logged out!</p>";
    }
    
    ?>


</main>

<?php require "footer.php" ?>