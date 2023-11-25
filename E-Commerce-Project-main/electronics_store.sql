CREATE DATABASE electronics_store;

USE electronics_store;


CREATE TABLE User_Groups_Perms
(
	Role_ID INT NOT NULL AUTO_INCREMENT,
	U_ID INT NOT NULL,
	Role_Name VARCHAR(255) NOT NULL,
	CONSTRAINT PK_UGP_RID PRIMARY KEY (Role_ID)
	
);




CREATE TABLE User_Info
(
	U_ID INT NOT NULL AUTO_INCREMENT,
	Role_ID INT,
	U_Email VARCHAR(255) NOT NULL UNIQUE,
	U_Pass VARCHAR(255) NOT NULL,
	F_Name VARCHAR(255) NOT NULL,
	L_Name VARCHAR(255) NOT NULL,
	Phone_Num VARCHAR(32),
	Created_On TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	Modified_On DATE,
	CONSTRAINT PK_UINFO_UID PRIMARY KEY (U_ID)
	
);



ALTER TABLE User_Info
ADD CONSTRAINT FK_UINFO_RID FOREIGN KEY (Role_ID) REFERENCES User_Groups_Perms(Role_ID) ON DELETE NO ACTION ON UPDATE NO ACTION;


ALTER TABLE User_Groups_Perms
ADD CONSTRAINT FK_UGP_UID FOREIGN KEY (U_ID) REFERENCES User_Info(U_ID) ON DELETE NO ACTION ON UPDATE NO ACTION;


CREATE TABLE User_Address
(
	UA_ID INT NOT  NULL AUTO_INCREMENT,
	U_ID INT NOT NULL,
	Address_1 VARCHAR(255),
	City VARCHAR(255),
	Zip_Code VARCHAR(255),
	Country VARCHAR(255),
	CONSTRAINT PK_U_ADDRESS_UAID PRIMARY KEY (UA_ID),
	CONSTRAINT FK_UADD_UID FOREIGN KEY (U_ID) REFERENCES User_Info(U_ID)
);



CREATE TABLE User_Payment
(
	Payment_ID INT NOT NULL AUTO_INCREMENT,
	U_ID INT NOT NULL,
	Payment_Type VARCHAR(255),
	Cardholder_Name VARCHAR(255),
	Card_Num INT,
	Card_Back INT,
	Card_Exp INT,
	CONSTRAINT PK_UPAY_PAYID PRIMARY KEY (Payment_ID),
	CONSTRAINT FK_UPAY_UID FOREIGN KEY (U_ID) REFERENCES User_Info(U_ID)
);

CREATE TABLE Product_Info
(
	Prod_ID INT NOT NULL AUTO_INCREMENT,
	Prod_Name VARCHAR(255),
	Prod_Client_Price FLOAT NOT NULL,
	Prod_Manufacturer_Price FLOAT NOT NULL,
	Prod_Details TEXT,
	Prod_Comments TEXT,
	Prod_Stock INT,
	Prod_Category VARCHAR(255),
	Prod_Image_Path VARCHAR(255),
	CONSTRAINT PK_PINFO_PID PRIMARY KEY (Prod_ID)
);

CREATE TABLE Product_Popularity
(
	Prod_ID INT NOT NULL,
	Prod_ID_Pop INT,
	CONSTRAINT FK_PPOP_PID FOREIGN KEY (Prod_ID) REFERENCES Product_Info(Prod_ID)
);

CREATE TABLE Cart_Info
(
	Cart_ID INT NOT NULL AUTO_INCREMENT,
	U_ID INT NOT NULL,
	Prod_ID INT NOT NULL,
	Quantity INT,
	CONSTRAINT PK_CINFO_CID PRIMARY KEY (Cart_ID),
	CONSTRAINT FK_CINFO_UID FOREIGN KEY (U_ID) REFERENCES User_Info(U_ID),
	CONSTRAINT FK_CINFO_PID FOREIGN KEY (Prod_ID) REFERENCES Product_Info(Prod_ID)
);

CREATE TABLE Order_Details
(
	Order_ID INT NOT NULL AUTO_INCREMENT,
	U_ID INT NOT NULL,
	Prod_ID INT NOT NULL,
	Date_of_Purchase TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	Date_of_expected_delivery DATE NOT NULL,
	CONSTRAINT PK_ODET_OID PRIMARY KEY (Order_ID),
	CONSTRAINT FK_ODET_UID FOREIGN KEY (U_ID) REFERENCES User_Info(U_ID),
	CONSTRAINT FK_ODET_PID FOREIGN KEY (Prod_ID) REFERENCES Product_Info(Prod_ID)
);

CREATE TABLE Store_Info
(
	Store_ID INT NOT NULL,
	Prod_ID INT NOT NULL,
	Store_Name VARCHAR(255) NOT NULL,
	Location VARCHAR(64),
	CONSTRAINT PK_SINFO_SID PRIMARY KEY (S_ID),
	CONSTRAINT FK_SINFO_PID FOREIGN KEY (Prod_ID) REFERENCES Product_Info(Prod_ID)
);

CREATE TABLE Discount
(
	Discount_ID INT NOT NULL,
	Prod_ID INT NOT NULL,
	Discount_Percentage FLOAT NOT NULL,
	Discount_Usage INT,
	CONSTRAINT PK_DISCOUNT_DID PRIMARY KEY (Discount_ID),
	CONSTRAINT FK_DISCOUNT_PID FOREIGN KEY (Prod_ID) REFERENCES Product_Info(Prod_ID)
);

CREATE TABLE Store_Products (
    store_id INT,
    product_id INT,
    PRIMARY KEY (store_id, product_id),
    FOREIGN KEY (store_id) REFERENCES Store_Info(Store_ID),
    FOREIGN KEY (product_id) REFERENCES Product_Info(Prod_ID)
);

INSERT INTO `User_Info` (`U_Email`, `U_Pass`, `F_Name`, `L_Name`, `Phone_Num`) VALUES 
('6ixgod@gmail.com', 'drakeToronto1!', 'Jean-Francois', 'Lariviere', '5141112222'),
('johntimothy@gmail.com', 'Gymothy123!', 'John', 'Tim', '5141231234'),
('trenman1@gmail.com', 'Runnerman1?', 'Brandon', 'Paulozio', '1234567890'),
('denisthemenace@gmail.com', 'Iamnotamenace123!', 'Denice', 'Plaziba', '4181231234'),
('alexthegreat@gmail.com', 'greekGOD418!', 'Alex', 'Great', '5144116932'),
('kimberleyyy@gmail.com', 'TommyONLY2022', 'Kimberly', 'Tommy', '5145145145'),
('munchospice@gmail.com', 'Iceforspice??3', 'Cornelius', 'Robert', '1231231234'),
('mangolovareal@gmail.com', 'Manmustgo4sure!', 'Manji', 'Stallion', '5140325892'),
('barbacardi@gmail.com', 'booleanCard32!', 'Bardi', 'Park', '5148924512'),
('sousaport@gmail.com', 'SIUNaldo7!', 'Mike', 'Sousa', '4187773287');

INSERT INTO `Product_Info` (`Prod_Name`, `Prod_Client_Price`, `Prod_Manufacturer_Price`, `Prod_Details`, `Prod_Comments`, `Prod_Stock`, `Prod_Category`, `Prod_Image_Path`) VALUES
( 'Razer Ornata V3 TKL Gaming Keyboard', 150, 115, 'Razer Ornata V3 is a Gaming Keyboard', '', 3, 'Keyboard', 'images/razer_ornata_v3.jpg'),
( 'RAZER ISKUR GAMING CHAIR', 1105.25, 775.5, 'When sitting for long periods, your back tends to slouch and lose some of its natural curvature due to fatigue. The Razer Iskur’s lumbar support is engineered to prop up your posture and take pressure off your back, so you can maintain a form that allows you to game on, and on, and on.', '', 2, 'Accessories', 'images/razer_iskur_gaming_chair.jpg'),
( 'Razer BlackWidow Chroma V2', 200, 115.5, ' Razer BlackWidow Chroma V2, this wrist rest features ergonomics, that ensure, that no matter how intense your gaming marathons are, you are always comfortable.', '', 1, 'Keyboard', 'images/razer_blackwidow_chroma_v2.jpg'),
( 'Razer - Kraken Analog Gaming Headset ', 120, 75.5, ' Razer Kraken has built a reputation as a cult classic within the gaming community. It made its mark as a staple at countless gaming events, conventions, and tournaments.', '', 1, 'Headset', 'images/razer_kraken_analog_headset.jpg'),
( 'Razer Gaming Mouse Computer Accessory Games Playing Using Wired', 80, 30.5, 'The mouse comes with a compact size, which is more appropriate for gamers who have smaller hands and offers more comfortable grip.', '', 1, 'Mouse', 'images/razer_gaming_mouse.jpg'),
('Logitech G314 Mechanical Gaming Keyboard', 80, 60, "It’s designed to help serious players perform at a higher level and push themselves even further. The G413 SE features tactile mechanical switches; PBT keycaps, 6-key rollover anti-ghosting performance; a black-brushed aluminum top case with white LED lighting; 12 function key media controls; and reliable USB-corded technology.", '', 5, 'Keyboard', 'images/logitech_g314_keyboard.jpg'),
('ASUS ROG Azoth 75 Wireless Gaming Keyboard', 350, 220, 'The ROG Azoth is where custom DIY mechanical keyboards meets high-end gaming. The ROG Azoth is a 75% custom DIY mechanical keyboard, which comes with Tri-mode connectivity, OLED display, and a full DIY lubing kit for your switches. The ROG Azoth is your next gaming keyboard for the next chapter of your gaming journey.', '', 3, 'Keyboard', 'images/asus_rog_azoth75.jpg'),
('ENHANCE Infiltrate KL2 Gaming Keyboard', 50, 20, 'A premium design made from brushed aluminum metal sits nicely on modern gaming desks and comes equipped with a variety of LED lighting modes. Easily switch from 3 different rgb lighting modes or enable the dynamic breathing with one dedicated key. Engage a turbo input mode that significantly increases the speed of key inputs from 21 characters per second to 62 characters per second.', '', 10, 'Keyboard', 'images/enhance_gaming_keyboard.jpg'),
('Razer Seiren Mini USB Streaming Microphone', 45, 15, "The Razer Seiren Mini is tuned with a tighter pickup angle, so it can focus on your voice while ensuring that background noises like typing and mouse clicks don’t get picked up.", '', 5, 'Microphone', 'images/razer_seiren_mini_microphone.jpg'),
('Blue Yeti USB Microphone', 180, 100, 'Yeti is a premium USB microphone, producing clear, powerful, broadcast-quality sound for music, podcasts, Twitch streaming, YouTube videos, and Zoom calls.', '', 12, 'Microphone', 'images/blue_yeti_microphone.jpg'),
('Tomshine Professional BM700 Microphone', 30, 10, 'High output, low self-noise, and the accurate reproduction of even the most subtle sound. Suitable especially for studios, recording studios, broadcasting stations, stage performances and computer.', '', 4, 'Microphone', 'images/tomshine_bm700_microphone.jpg'),
('Adesso Xtream M4 USB Microphone', 60, 40, 'The Adesso Xtream M4 is a USB cardioid condenser microphone that offers high-quality recordings and USB plug-and-play connectivity. Designed for computer-based recording, this microphone is ideal for gamers and streamers.', '', 2, 'Microphone', 'images/adesso_xtream_microphone.jpg'),
('Vivitar Podcast Microphone', 30, 12, 'The Vivitar Vlog Podcast Microphone Kit is designed for podcasting, voice-over recording, vlogging, streaming, and other spoken word pursuits. Its unidirectional polar pattern is the best natural defense against unwanted room-tone creeping in to your recording. With a 20 Hz to 20 kHz frequency response, the mic is sure to pick up all the nuances in your voice.', '', 1, 'Microphone', 'images/vivitar_podcast_microphone.jpg'),
('NERDI Stereo Gaming Headset', 30, 15, 'With NERDI gaming headset, gamer can always enjoy an immersive gaming experience no matter in which platform. Plug and play. Take out the NERDI gaming headphones and enter the gaming world right away!', '', 15, 'Headset', 'images/nerdi_stereo_headset.jpg'),
('PDP Gaming Wired Headset', 35, 25, "The lightweight build offers long-lasting comfort whether you’re spending the day in co-op missions, or just playing a quick match. Hear your enemies before you see them with the two powerful 40mm speaker drivers.", '', 2, 'Headset', 'images/pdp_gaming_headset.jpg'),
('Turtle Beach Recon 70 Gaming Headset', 50, 30, "Featuring Turtle Beach’s latest lightweight and comfortable headset design for hours of play, with high-quality 40mm speakers and over-ear premium synthetic leather cushions that let you hear every crisp high and thundering low while blocking noise.", '', 0, 'Headset', 'images/turtlebeach_recon70_headset.jpg'),
('HyperX Cloud Alpha Headset', 140, 60, 'The HyperX™ Cloud Alpha’s dual-chamber driver system separates the bass from the mids and highs, allowing them to be tuned individually for reduced distortion.', '', 6, 'Headset', 'images/hyperx_cloudalpha_headset.jpg'),
('onn. 24-inch Class 1080p Full HD Gaming Monitor', 240, 140, 'onn. monitors are designed for versatility and high definition performance.', '', 0, 'Monitor', 'images/onn._24in_monitor.jpg'),
('Samsung Odyssey G5 34 inch 165Hz Curved, 3440 x 1440, Gaming Monitor', 700, 380, 'Boasting an ultra-wide 1000R curved display with WQHD resolution, it presents every moment of action in stunning and immersive picture quality.', '', 2, 'Monitor', 'images/samsung_odyssey_monitor.jpg'),
('LG 32GN600 32Inch 165Hz Monitor', 450, 250, '2560 x 1440 QHD resolution at 165 Hz with a 5 ms response time that can be enhanced to 1 ms using Motion Blur Reduction (MBR) technology for liquid smooth graphics during high action games.', '', 1, 'Monitor', 'images/lg_32gn600_monitor.jpg');

INSERT INTO `Store_Info` (`Store_ID`, `Prod_ID`, `Store_Name`) VALUES
(1, 1, 'Razer'),
(1, 2, 'Razer'),
(1, 3, 'Razer'),
(1, 4, 'Razer'),
(1, 5, 'Razer'),
(2, 6, 'Logitech'),
(3, 7, 'ASUS'),
(4, 8, 'ENHANCE'),
(1, 9, 'Razer'),
(5, 10, 'Blue Yeti'),
(6, 11, 'Tomshine'),
(7, 12, 'Adesso'),
(8, 13, 'Vivitar'),
(9, 14, 'NERDI'),
(10, 15, 'PDP'),
(11, 16, 'Turtle Beach'),
(12, 17, 'HyperX'),
(13, 18, 'onn.'),
(14, 19, 'Samsung'),
(15, 20, 'LG');

INSERT INTO `Discount` (`Discount_ID`, `Prod_ID`, `Discount_Percentage`, `Discount_Usage`) VALUES 
(1, 5, 0.15, 5),
(2, 20, 0.1, 10),
(3, 12, 0.2, 20);
