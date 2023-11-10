CREATE DATABASE electronics_store;

USE electronics_store;


CREATE TABLE User_Info
(
	U_ID INT NOT NULL AUTO_INCREMENT,
	Role_ID INT,
	U_Email VARCHAR(255) NOT NULL UNIQUE,
	U_Pass VARCHAR(255) NOT NULL,
	F_Name VARCHAR(255) NOT NULL,
	L_Name VARCHAR(255) NOT NULL,
	Phone_Num INT,
	Created_On TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	Modified_On DATE,
	CONSTRAINT PK_UINFO_UID PRIMARY KEY (U_ID)
	
);



ALTER TABLE User_Info
ADD CONSTRAINT FK_UINFO_RID FOREIGN KEY (Role_ID) REFERENCES User_Groups_Perms(Role_ID);


ALTER TABLE User_Groups_Perms
ADD CONSTRAINT FK_UGP_UID FOREIGN KEY (U_ID) REFERENCES User_Info(U_ID);

CREATE TABLE User_Address
(
	U_ID INT NOT NULL,
	Address_1 VARCHAR(255),
	Address_2 VARCHAR(255),
	City VARCHAR(255),
	Zip_Code VARCHAR(255),
	Country VARCHAR(255),
	Phone_Num INT,
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
	S_ID INT NOT NULL AUTO_INCREMENT,
	Prod_ID INT NOT NULL,
	Store_Name VARCHAR(255) NOT NULL,
	Store_Adresse VARCHAR(255) NOT NULL,
	CONSTRAINT PK_SINFO_SID PRIMARY KEY (S_ID),
	CONSTRAINT FK_SINFO_PID FOREIGN KEY (Prod_ID) REFERENCES Product_Info(Prod_ID)
);

CREATE TABLE Discount
(
	Discount_ID INT NOT NULL AUTO_INCREMENT,
	Prod_ID INT NOT NULL,
	Discount_Eliglibility BOOLEAN NOT NULL DEFAULT FALSE,
	CONSTRAINT PK_DISCOUNT_DID PRIMARY KEY (Discount_ID),
	CONSTRAINT FK_DISCOUNT_PID FOREIGN KEY (Prod_ID) REFERENCES Product_Info(Prod_ID)
);

INSERT INTO Product_Info VALUES (1,"RAZER ISKUR GAMING CHAIR",1105.25,500.00,"Product details
When sitting for long periods, your back tends to slouch and lose some of its natural curvature due to fatigue. The Razer Iskur’s lumbar support is engineered to prop up your posture and take pressure off your back, so you can maintain a form that allows you to game on, and on, and on.
•Fully sculpted lumbar support for all-day gaming with superior ergonomics
•Multi-layered synthetic leather to withstand longer hours of wear and tear
•High density foam cushions for the perfect balance of support and comfort
•4D Armrests for fully customizable positioning
•Engineered to carry with a steel-reinforced body and angled seat edges
•Memory foam head cushion for dynamic contouring of your head",null,30,"Chairs",null);
