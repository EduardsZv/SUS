USE uzskaite;

CREATE TABLE Pacients (
	PersonasKods char(12),
	Vards nvarchar(50) not null,
	Uzvards nvarchar(50) not null,
    Vecums int not null,
    Adrese nvarchar(100) not null,
    PRIMARY KEY (PersonasKods)
); 
CREATE TABLE Darbinieks (
	ID int auto_increment,
    Vards nvarchar(50) not null,
    Uzvards nvarchar(50) not null,
    Darbs nvarchar(50) not null,
    PRIMARY KEY (ID)
);
CREATE TABLE Lietotajs (
	Lietotajvards nvarchar(50) not null,
    Parole nvarchar(50) not null,
    DarbinieksID int not null,
    PRIMARY KEY (Lietotajvards),
    FOREIGN KEY (DarbinieksID) REFERENCES Darbinieks(ID)
);
CREATE TABLE Arsts (
	ID int auto_increment not null,
    DarbinieksID int not null,
    IrGalvenais boolean default 0,
    PRIMARY KEY (ID),
    FOREIGN KEY (DarbinieksID) REFERENCES Darbinieks(ID)
);
CREATE TABLE Recepte (
	ID int auto_increment not null,
    Zales nvarchar(50) not null,
    Daudzums nvarchar(50) not null,
    LietotNo date not null,
    LietotLidz date null,
    Biezums nvarchar(50) not null,
    PacientsID char(12) not null,
    ArstsID int not null,
    PRIMARY KEY (ID),
    FOREIGN KEY (PacientsID) REFERENCES Pacients(PersonasKods),
    FOREIGN KEY (ArstsID) REFERENCES Arsts(ID)
);
CREATE TABLE Uznemsana (
	ID int auto_increment not null,
	PacientsID char(12) not null,
	ArstsID int not null,
    PalatasNr int not null,
    GultasNr int not null,
    Uznemts date not null,
    Izrakstijies date null,
    Diagnoze nvarchar(200) not null,
    PRIMARY KEY (ID),
    FOREIGN KEY (PacientsID) REFERENCES Pacients(PersonasKods),
    FOREIGN KEY (ArstsID) REFERENCES Arsts(ID)
);
CREATE TABLE Analizes (
	PacientsID char(12) not null,
    DarbinieksID int not null,
    Urea float(3, 1) not null,
    Kreatinins float(2, 1) not null,
    Natrijs float(4, 1) not null,
    Kalijs float(2, 1) not null,
    Kalcijs float(2, 1) not null,
    Fosfors float(3, 1) not null,
    Hemoglobins float(3, 1) not null,
    FOREIGN KEY (PacientsID) REFERENCES Pacients(PersonasKods),
    FOREIGN KEY (DarbinieksID) REFERENCES Darbinieks(ID)
);
CREATE TABLE Sesija (
ID int auto_increment not null,
lietotajvards nvarchar(50) not null,
lietotajsIP nvarchar(45) not null,
Expires datetime not null,
PRIMARY KEY (ID),
FOREIGN KEY (lietotajvards) REFERENCES lietotajs(lietotajvards)
)