<!-- USING MODEL VIEW CONTROLLER -->
<?php
    $oldguess = '';
    $message = false;
    if ( isset($_POST['guess']) ) {
        //Trick for integer / numeric parameters
        $oldguess = $_POST['guess'] + 0;
        if ( $oldguess == 42) {
            $message = "Great job!";
        } else if ( $oldguess < 42) {
            $message = "Too low";
        } else {
            $message = "Too high...";
        }
    }

?>




<html>
<head>
<title> Guessing Game for Omar Salloum</title>
</head>
<body style = "font-family: sans-serif;">
    <h1> Welcome to my guessing game </h1>
    <p>
    <?php
       if ( $message !== false ) {
        echo("<p>$message</p>\n");
       }
    ?>

    <form method="post">
        <p><label for="guess">Input Guess</label>
        <input type ="text" name="guess" id="guess" size="40"
            value ="<?= htmlentities($oldguess) ?>"/></p>
        
        <input type="submit"/>
    </form>
    </p>
    </body>
</html>