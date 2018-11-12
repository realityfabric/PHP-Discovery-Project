<!-- Inserts a copyright symbol and the current year. -->
<p>&copy; 2018</p>
<?php
$proverbs = readProverbs();
$ProverbCount = count($proverbs);
$proverb = $proverbs[rand(0, $ProverbCount - 1)];

echo "<p>Your random proverb is: \"$proverb\"</p>";

function readProverbs () {
	$filename = "proverbs.txt";

	$proverbs = file($filename);

	return $proverbs;
}
?>
