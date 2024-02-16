DROP TABLE IF EXISTS produits ;
CREATE TABLE produits (
    id INT  AUTO_INCREMENT  ,
    noprod VARCHAR(5) NOT NULL,
    name VARCHAR(20) NOT NULL ,
    price DECIMAL(10,2) NOT NULL ,
    descr VARCHAR(50) NOT NULL ,
	CONSTRAINT pk_id PRIMARY KEY (id)  ); 