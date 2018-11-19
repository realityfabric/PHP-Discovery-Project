<?php
include("inc_site_counter.php");
?>
<p>&copy; 2018</p>
<?php


error_reporting(E_ALL);
ini_set('display_errors', '1');

$HOST = "localhost";
$USER = "root";
$PASSWD = "password";
$DBNAME = "chinese_zodiac";



// $proverb = randomProverbFromFile();
$proverb = randomProverbFromDB($HOST, $USER, $PASSWD, $DBNAME);

echo "<p>Your random proverb is: \"$proverb\"</p>";
echo "<p>Total visitors to this site: $visitors</p>";
function randomProverbFromFile () {
	$proverbs = readProverbs();
	$ProverbCount = count($proverbs);
	return $proverbs[rand(0, $ProverbCount - 1)];
}

function randomProverbFromDB ($HOST, $USER, $PASSWD, $DBNAME) {
	$proverbs = readProverbsFromDB($HOST,$USER,$PASSWD, $DBNAME);
	$ProverbCount = getProverbsCount($HOST, $USER, $PASSWD, $DBNAME);
	$proverb = $proverbs[rand(0, $ProverbCount - 1)];
	updateDisplayCount($proverb[1], $HOST, $USER, $PASSWD, $DBNAME);
	return $proverb[0];
}

function readProverbs () {
	$filename = "proverbs.txt";

	$proverbs = file($filename);

	return $proverbs;
}

function readProverbsFromDB ($HOST,$USER,$PASSWD, $DBNAME) {
	$conn = mysqli_connect($HOST,$USER,$PASSWD,$DBNAME);

	if ($conn->connect_error) {
		die('Connect Error (' . $conn->connect_errno . ') '
			. $conn->connect_error);
	} else {
		$TableName = "randomproverb";
		$query = "SELECT proverb, proverb_number FROM $TableName";
		$result = $conn->query($query);

		$proverbs = array();

		while ($row = $result->fetch_row()) {
			$proverbs[] = $row;
		}

		$conn->close();

		return $proverbs;
	}
}

function getProverbsCount ($HOST, $USER, $PASSWD, $DBNAME) {
	$conn = mysqli_connect($HOST, $USER, $PASSWD, $DBNAME);

	if ($conn->connect_error) {
		die('Connect Error (' . $conn->connect_errno . ') '
			. $conn->connect_error);
	} else {
		$TableName = "randomproverb";
		$query = "SELECT COUNT(*) AS `count` FROM $TableName";

		$result = $conn->query($query);
		$row = $result->fetch_row();

		$conn->close();

		return $row[0];
	}
}

// This isn't the same way the book wants
// but this is better
// unless there are duplicate proverbs, I guess
// just don't have duplicate proverbs :)
function updateDisplayCount ($id, $HOST,$USER,$PASSWD, $DBNAME) {
	$conn = mysqli_connect($HOST,$USER,$PASSWD,$DBNAME);

	if ($conn->connect_error) {
		die('Connect Error (' . $conn->connect_errno . ') '
			. $conn->connect_error);
	} else {
		$TableName = "randomproverb";
		$query =
			"UPDATE $TableName "
			. "SET display_count = display_count + 1 "
			. "WHERE proverb_number = $id";

		$result = $conn->query($query);

		$conn->close();
	}
}
?>
