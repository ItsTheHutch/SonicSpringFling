/*Create the table for the database*/

CREATE TABLE ssfDonations (
ID INTEGER NOT NULL AUTO_INCREMENT, 
FullName VARCHAR(255), 
Email VARCHAR(255), 
Amount FLOAT, 
Message TEXT, 
TimeOfDonation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  
PRIMARY KEY (ID)
);

/*Insert garbage data

INSERT INTO ssfDonations (FullName, Email, Message, Amount) 
VALUES ('John Cena', 'john.cena@wwe.com', 'I LOOOOOOOOVE THE MARATHON AND DON\'T FORGET HIS NAME IS JOHN CENAAAAAAAA!', 9000.01);

INSERT INTO ssfDonations (FullName, Email, Message, Amount) 
VALUES ('John Cena', 'john.cena@wwe.com', 'for the kids!', 3.08);

INSERT INTO ssfDonations (FullName, Email, Message, Amount) 
VALUES ('John Cena', 'john.cena@wwe.com', 'that hutch guy is super great!', 152.00);


select * from MegaManathon;*/




/*DROP TABLE SonicSpringFling;*/

