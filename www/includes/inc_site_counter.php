<?php
	$Body = "";

	include("includes/inc_connect.php");

	$conn = mysqli_connect($HOST, $USER, $PASSWD);
	if (!$conn) {
		$Body .= "<p>Error: Unable to connect to MySQL Database.</p>";
		$Body .= "<p>Error Code " . $conn->errno . ": " . $conn->error . "</p>";
	} else {
		if (!($conn->select_db($DBNAME))) {
			$Body .= "<p>Error: Unable to select Database.</p>";
			$Body .= "<p>Error Code " . $conn->errno . ": " . $conn->error . "</p>";
		}
	}

	/* set a cookie if this is the first visit - the expires
	argument is 1 day to prevent visits from incrementing each
	time the user returns to the page that contains the site
	counter */
	if (empty($_COOKIE['visits'])) {
		// increment the counter in the database
		$conn->query("UPDATE visit_counter " .
			" SET counter = counter + 1 " .
			" WHERE id = 1 ");

		// query the visit_counter table and assign the counter
		// value to the $visitors variable
		$result = $conn->query("SELECT counter " .
			" FROM visit_counter WHERE id = 1");
		if (($row = $result->fetch_assoc()) !== NULL) {
			$visitors = $row['counter'];
		} else {
			$visitors = 1;
		}
		// set the cookie value
		setcookie("visits", $visitors, time() + (60*60*24));
	} else {
		// otherwise, assign the cookie value to the $visitor variable
		$visitors = $_COOKIE['visits'];
	}
?>
