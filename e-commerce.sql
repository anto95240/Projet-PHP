CREATE TABLE IF NOT EXISTS  user_Table (
    UserId        INTEGER       NOT NULL PRIMARY KEY,
    Email         VARCHAR (255) NOT NULL,
    Password VARCHAR (100) NOT NULL
);


CREATE TABLE IF NOT EXISTS  categorie_Table (
    CategorieId    INTEGER          NOT NULL PRIMARY KEY,
    Name           VARCHAR (50)     NOT NULL
);


CREATE TABLE IF NOT EXISTS  address_Table (
    AddressId     INTEGER           NOT NULL PRIMARY KEY,
    UserId        INTEGER           NOT NULL,
    FirstName     VARCHAR (80)      NOT NULL,
    LastName      VARCHAR (80)      NOT NULL,
    StreetAddress VARCHAR (100)     NOT NULL,
    City          VARCHAR (50)      NOT NULL,
    State         VARCHAR (50)      NOT NULL,
    PostalCode    VARCHAR (30)      NOT NULL,
    Country       VARCHAR (50)      NOT NULL,
    FOREIGN KEY (UserId) REFERENCES user_Table (UserId)
);


CREATE TABLE IF NOT EXISTS  product_Table (
    ProductId      INTEGER           NOT NULL PRIMARY KEY,
    CategorieId    INTEGER           NOT NULL,
    Name           TEXT              NOT NULL,
    Image          TEXT              NOT NULL,
    Description    TEXT              NOT NULL,
    Price          INTEGER           NOT NULL,
    Stock_Quantity INTEGER           NOT NULL,
    FOREIGN KEY (CategorieId) REFERENCES categorie_Table (CategorieId)
);



CREATE TABLE IF NOT EXISTS  cart_Table (
    CartId    INTEGER          NOT NULL PRIMARY KEY,
    UserId    INTEGER          NOT NULL,
    ProductId INTEGER          NOT NULL,
    Quantity  INTEGER          NOT NULL,
    Statut    VARCHAR (30)     NOT NULL,
    FOREIGN KEY (UserId) REFERENCES user_Table (UserId),
    FOREIGN KEY (ProductId) REFERENCES product_Table (ProductId)
);



CREATE TABLE IF NOT EXISTS  command_Table (
    CommandId     INTEGER          NOT NULL PRIMARY KEY,
    UserId        INTEGER          NOT NULL,
    Quantity	  INTEGER		   NOT NULL,
	TotalPrice    INTEGER		   NOT NULL,      
    CommandDate   DATE             NOT NULL,
    CommandStatut VARCHAR (30)     NOT NULL,
    FOREIGN KEY (UserId) REFERENCES user_Table (UserId),
    FOREIGN KEY (ProductId) REFERENCES product_Table (ProductId)
);



CREATE TABLE IF NOT EXISTS  invoices_Table (
    InvoiceId   INTEGER        NOT NULL PRIMARY KEY,
    CommandId   INTEGER        NOT NULL,
    UserId      INTEGER        NOT NULL,
    Total       FLOAT (53)     NOT NULL,
    InvoiceDate DATE           NOT NULL,
    FOREIGN KEY (CommandId) REFERENCES command_Table (CommandId),
    FOREIGN KEY (UserId) REFERENCES user_Table (UserId)
);



CREATE TABLE IF NOT EXISTS  jointure_Table (
    Id        INTEGER NOT NULL PRIMARY KEY,
    UserId    INTEGER NOT NULL,
    AddressId INTEGER NOT NULL,
    CartId    INTEGER NOT NULL,
    ProductId INTEGER NOT NULL,
    InvoiceId INTEGER NOT NULL,
    CommandId INTEGER NOT NULL,
    FOREIGN KEY (CartId) REFERENCES cart_Table (CartId),
    FOREIGN KEY (CommandId) REFERENCES command_Table (CommandId),
    FOREIGN KEY (ProductId) REFERENCES product_Table (ProductId),
    FOREIGN KEY (InvoiceId) REFERENCES invoices_Table (InvoiceId),
    FOREIGN KEY (UserId) REFERENCES user_Table (UserId),
    FOREIGN KEY (AddressId) REFERENCES address_Table (AddressId)
);

