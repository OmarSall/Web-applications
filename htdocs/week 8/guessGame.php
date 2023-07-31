<?php
    $oldguess = isset($_POST['guess']) ? $_POST['guess'] : '';
?>

<p>Guessing game...</p>
<form method="post">
    <p><label for="guess"> Input Guess</label>
    <input type="text" name="guess" id="guess"
    size="40" value="<?= htmlentities($oldguess) ?>"/></p>
    <input type="submit"/>
</form>

<!--
<?= $oldguess ?> <br>
-->

<!-- The same form -->

<!--
<?php echo($oldguess); ?>
 -->

<pre>
    $_POST:
    Array(
    )
</pre>