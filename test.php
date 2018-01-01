<?php
require('xwaf.php'); // BEFORE OF ALL! IMPORTANT

$xWAF = new xWAF();
$xWAF->start();

// Done, Blocking XSS, SQL, and HTML Malicious code.

?>
<title>xWAF Test</title>

<div align="center">
	<?php
	// This is optional
	if (isset($_POST['csrf'])) {
		// Aright! Form Requested.
		if ($xWAF->verifyCSRF($_POST['csrf'])) {
			echo "Form Validation Completed without Errors or Vulns!<br><br><br>";
			$Post = print_r($_POST);
			echo "<code>". $Post ."</code>";
		} else {
			echo "Invalid CSRF Token!";
		}
	}
	// This is optional
	?>

	<br><br><br><br><br><br>
	<form method="POST">
		Sample Input: <input type="text" name="someinputname" value="Vuln me">
		<br>
		CSRF: <input type="text" name="csrf" value="<?php echo $xWAF->getCSRF(); ?>">
		<br>
		<button type="submit">Submit Form POST</button>
	</form>
</div>
