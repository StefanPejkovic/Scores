CREATE DATABASE IF NOT EXISTS  scores;

USE scores;

CREATE TABLE IF NOT EXISTS korisnici(
	id INT  AUTO_INCREMENT PRIMARY KEY,
	ime TEXT NOT NULL,
	prezime TEXT NOT NULL,
	email TEXT NOT NULL,
	lozinka TEXT NOT NULL,
	admin BOOLEAN DEFAULT FALSE NOT NULL 
);

CREATE TABLE IF NOT EXISTS utakmice(
	id INT  AUTO_INCREMENT PRIMARY KEY,
	tim1 TEXT NOT NULL,
	tim2 TEXT NOT NULL,
	status TEXT NOT NULL,
	golovi1 INT DEFAULT 0 NOT NULL,
	golovi2 INT DEFAULT 0 NOT NULL,
	datum_vreme DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS komentari(
	id INT  AUTO_INCREMENT PRIMARY KEY,
	korisnik_id TEXT REFERENCES korisnici(id),
	utakmica_id TEXT REFERENCES utakmica(id),
	datum_vreme DATETIME DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO korisnici(ime, prezime, email, lozinka) VALUES 
('Stefan', 'Pejkovic', 'stefanpejkovic2004@gmail.com', 'Pali123'),
('Mihajlo', 'Milojevic', 'milojevicm374@gmail.com', 'Mihajlo123'),
('Nikola', 'Rogonjic', 'nikolarogonjic14@gmail.com', 'Nikola123'),
('Sara', 'Matovic', 'saramatovic04@gmail.com', 'Sara123');

INSERT INTO utakmice(tim1, tim2, status,datum_vreme) VALUES 
('Milan', 'Inter', 'u toku', STR_TO_DATE('15.01.2023', '%d.%m.%Y %H:%m:%d')),
('Milan', 'Inter', 'u toku', STR_TO_DATE('15.01.2023', '%d.%m.%Y %H:%m:%d')),
('Milan', 'Inter', 'zavrsena', STR_TO_DATE('15.01.2023', '%d.%m.%Y %H:%m:%d')),
('Milan', 'Inter', 'u toku', STR_TO_DATE('15.01.2023', '%d.%m.%Y %H:%m:%d')),
('Milan', 'Inter', 'predstojeca', STR_TO_DATE('15.01.2023', '%d.%m.%Y %H:%m:%d'));