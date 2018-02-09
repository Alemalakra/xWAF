<?php
require('xwaf.php'); // Before all your code starts.
$xWAF = new xWAF();
$xWAF->start();
// Done, Protection enabled.
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
	<form method="POST">
		Sample Input: <input type="text" name="someinputname" value="Vuln me">
		<br>
		CSRF: <input type="text" name="csrf" value="<?php echo $xWAF->getCSRF(); ?>">
		<br>
		<button type="submit">Submit Form POST</button>
	</form>
</div>
