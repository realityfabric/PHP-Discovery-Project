<?php

$zodiacs = array("rat", "ox", "tiger", "rabbit", "dragon", "snake", "horse", "goat", "monkey", "rooster", "dog", "pig");

echo "<table>";
echo "<tr>";
foreach($zodiacs as $zodiac) echo "<td>$zodiac</td>";
echo "</tr>";

echo "<tr>";
foreach($zodiacs as $zodiac) echo "<td><img src=\"static/ZodiacImages/$zodiac.png\"</td>";
echo "</tr>";

for ($y = 1912; $y < 2020; $y += 12) {
	echo "<tr>";
	for ($i = 0; $i < 12; $i++) {
		$year = $y + $i;
		echo "<td>$year</td>";
	}
	echo "</tr>";
}
echo "</table>";
