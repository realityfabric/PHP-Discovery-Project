USE chinese_zodiac;

CREATE TABLE randomproverb (
	proverb_number INT AUTO_INCREMENT PRIMARY KEY,
    proverb VARCHAR(255), -- at least 100 characters
    display_count INT
);
