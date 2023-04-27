use database login_management;

select * from Rak;
select * from gudang;
select * from barang;
select *from users;
desc users;
CREATE TABLE jenis(id_jenis varchar(255) NOT NULL PRIMARY KEY , nama_jenis varchar(255) NOT NULL )ENGINE InnoDB;
CREATE TABLE merek(id_merek varchar(255) NOT NULL PRIMARY KEY , nama_merek varchar(255) NOT NULL )ENGINE InnoDB;
CREATE TABLE gudang(id_gudang varchar(255) NOT NULL PRIMARY KEY , nama_gudang varchar(255) NOT NULL )ENGINE InnoDB;
CREATE TABLE Rak(id_rak varchar(255) NOT NULL PRIMARY KEY , nama_rak varchar(255) NOT NULL )ENGINE InnoDB;
show tables ;

CREATE TABLE barang(id_jenis varchar(255) NOT NULL,
id_merek varchar(255) NOT NULL ,
id_gudang varchar(255) NOT NULL ,
id_rak varchar(255) NOT NULL ,
id_barang varchar(255) NOT NULL PRIMARY KEY,
nama_barang varchar(255) NOT NULL ,
status varchar(255) NOT NULL ,
FOREIGN KEY (id_jenis) REFERENCES jenis(id_jenis),
FOREIGN KEY (id_merek) REFERENCES merek(id_merek),
FOREIGN KEY (id_gudang) REFERENCES gudang(id_gudang))ENGINE InnoDB;

ALTER TABLE barang ADD FOREIGN KEY (id_rak) REFERENCES Rak(id_rak);

desc barang;
desc jenis;
SHOW TABLES ;

INSERT INTO Rak VALUES();
INSERT INTO gudang VALUES();
INSERT INTO jenis VALUES();
INSERT INTO merek VALUES();

ALTER TABLE barang MODIFY status ENUM("Bagus", "Rusak") NOT NULL ;

UPDATE barang SET status = 'Rusak' WHERE id_barang = "KK01";