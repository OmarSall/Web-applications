<!DOCTYPE html>
<head><title>Omar Salloum MD5 Cracker</title></head>
<body>
<h1>MD5 cracker</h1>
<p>This application takes an MD5 hash
of a four digit pin and check all 10,000
possible four digit PINs to determine the PIN.</p>
<pre>
Debug Output:
<?php
$goodtext = "PIN: Not found";
$count = 0;
// If there is no parameter, this code is all skipped
if ( isset($_GET['md5']) ) {
    $time_pre = microtime(true);
    $md5 = $_GET['md5'];

    // This is our alphabet
    $digits = "0123456789";
    $show = 15;

    // Outer loop to go through the alphabet for the
    // first position in our "possible" pre-hash
    // text
    for($i=0; $i<strlen($digits); $i++ ) {
        $ch1 = $digits[$i];   // The first of  characters

        // Our inner loop. Note the use of new variables
        // $j and $ch2 
        for($j=0; $j<strlen($digits); $j++ ) {
            $ch2 = $digits[$j];  // Our second character
            
            for($k=0; $k<strlen($digits); $k++ ){
                $ch3 = $digits[$k];

                for($l=0; $l<strlen($digits); $l++ ){
                    $ch4 = $digits[$l];
                    // Concatenate the two characters together to 
                    // form the "possible" pre-hash text
                    $try = $ch1.$ch2.$ch3.$ch4;

                    // Run the hash and then check to see if we match
                    $check = hash('md5', $try);
                    if ( $check == $md5 ) {
                        $goodtext = $try;
                        break;   // Exit the inner loop
                    }
                    $count++;
                    // Debug output until $show hits 0
                    if ( $show > 0 ) {
                        print "$check $try\n";
                        $show = $show - 1;
                    }
                }
            }   
        }
    }
    //Print total checks
    print "Total checks: ";
    print $count;
    print "\n";
    // Compute elapsed time
    $time_post = microtime(true);
    print "Elapsed time: ";
    print $time_post-$time_pre;
    print "\n";
}
?>
</pre>
<!-- Use the very short syntax and call htmlentities() -->
<p> <?= htmlentities($goodtext); ?></p>
<form>
<input type="text" name="md5" size="60" />
<input type="submit" value="Crack MD5"/>
</form>
<ul>
<li><a href="index.php">Reset this page</a></li>
<li><a href="makePin.php">Make an MD5 PIN</a></li>
<li><a href="md5.php">MD5 Encoder</a></li>
<li><a href="https://www.wa4e.com/assn/crack/" target="_blank">Specification for this assignment</a></li>
<li><a href="https://github.com/csev/wa4e/tree/master/code/crack" target="_blank">Source code for similar to this application</a></li>
</ul>
</body>
</html>

