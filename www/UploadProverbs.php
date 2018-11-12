<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Proverbs</title>
</head>
<body>
<h1>Proverbs</h1>
<hr />
<form action="UploadProverbs.php" method="post">
<p>Proverb: <input type="text" name="proverb" placeholder="Women hold up half the sky." /></p>
<p><input type="submit" name="submit" value="Submit Proverb" /></p>
</form>
<?php
if (isset($_POST['submit'])) {
	if ($_POST['proverb'] !== "") {
		$flag = writeProverb($_POST['proverb']);
		
		if ($flag === FALSE) {
			echo "<p>Error Submitting Proverb!</p>";
		}
	} else {
		echo "<p>Please include a proverb to submit.</p>";
	}
}

function writeProverb ($proverb) {
	$file = fopen("proverbs.txt", "a");
	$flag = FALSE;
	$flag = fwrite($file, $proverb . "\n");
	fclose($file);
	
	return $flag; // num bytes written, or false if failed (same as fwrite)
}
?>
</body>
</html>
