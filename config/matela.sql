CREATE DATABASE matela;
USE matela;

CREATE TABLE catalogue(
    id smallint primary key AUTO_INCREMENT,
    name varchar(20) NOT NULL,
    size varchar(10) NOT NULL,
    price smallint NOT NULL,
    promotion smallint
);

INSERT INTO catalogue
(name,size,price,promotion)
VALUES
("EPEDA","90x190",759,0),
("DREAMWAY","90x190",809,20),
("BULTEX","140x190",759,40),
("EPEDA","160x200",1025,0);

alter TABLE catalogue
ADD img TEXT;

Update catalogue
set
img="https://media.but.fr/images_produits/produit-niv3/8435487702208_Q.jpg"
Where name="EPADA";

Update catalogue
set
img="https://media.but.fr/images_produits/produit-niv3/3663728594632_Q.jpg"
Where name="DREAMWAY";
Update catalogue
set
img="https://media.but.fr/images_produits/produit-niv3/3133613206075_Q.jpg"
Where name="BULTEX";

set
img="https://media.but.fr/images_produits/produit-niv3/3546800387653_Q.jpg"
Where size="160x200";