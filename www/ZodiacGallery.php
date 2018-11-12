<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Zodiac Gallery</title>
</head>
<body>
<h1>Zodiac Gallery</h1>
<?php
function setImageArray () {
	$imgPath = "static/ZodiacImages/";
	
	$zodiacImages = array(
		"rat" => "",
		"ox" => "",
		"tiger" => "",
		"rabbit" => "",
		"dragon" => "",
		"snake" => "",
		"horse" => "",
		"goat" => "",
		"monkey" => "",
		"rooster" => "",
		"dog" => "",
		"pig" => ""
	);
	
	foreach ($zodiacImages as $animal => $path) {
		$zodiacImages[$animal] = $imgPath . $animal . ".png";
	}
	
	return $zodiacImages;
}

function createImgTag ($path, $alt) {
	return "<img src='$path' alt='$alt' style='height: 100px;' />";
}

function createLink ($path, $text) {
	return "<a href='$path'>$text</a>";
}

foreach (setImageArray() as $animal => $path) {
	echo createLink($path, createImgTag($path, $animal));
	echo " ";
}

?>
</body>
</html>
