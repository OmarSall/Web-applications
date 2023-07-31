<?php
$error = false;
$md5 = false;
$pin = "";
if ( isset($_GET['pin']) ) {
    $pin = $_GET['pin'];
    if ( strlen($pin) != 4 ) {
        $error = "Input must be exactly four digits!";
    } else if ( $pin[0] > "a" && $pin[0] < "z" || 
                $pin[1] > "a" && $pin[1] < "z"  ||
                $pin[2] > "a" && $pin[2] < "z" ||
                $pin[3] > "a" && $pin[3] < "z" ) {
        $error = "Input must four digits - cannot be letters!";
    } else {
        $md5 = hash('md5', $pin);
    }
}
?>
<!DOCTYPE html>
<head><title>Omar Salloum PIN Code</title></head>
<body style ="font-family: sans-serif">
<h1>MD5 PIN code maker</h1>
<?php
if ( $error !== false ) {
    print '<p style="color:red">';
    print htmlentities($error);
    print "</p>\n";
}

if ( $md5 !== false ) {
    print "<p>MD5 value: ".htmlentities($md5)."</p>";
}
?>

<form>
<input type="text" name="pin" value="<?= htmlentities($pin) ?>"/>
<input type="submit" value="Compute MD5 for PIN"/>
</form>
<ul>
<li><a href="makePin.php">Reset</a></li>
<li><a href="index.php">Back to Cracking</a></li>
</ul>
</body>
</html>
