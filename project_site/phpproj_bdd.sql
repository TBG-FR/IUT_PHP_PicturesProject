/*==============================================================*/
/*   PHP_Pictures_Project : SQL Script for Database Creation    */
/*                     (SGBD :  MySQL 5.0)                      */
/*==============================================================*/


/*==============================================================*/
/* TABLES CLEANING                                              */
/*==============================================================*/
DROP TABLE IF EXISTS phpproj_PictureKEYword;
DROP TABLE IF EXISTS phpproj_GalleryPicture;
DROP TABLE IF EXISTS phpproj_KEYword;
DROP TABLE IF EXISTS phpproj_Picture;
DROP TABLE IF EXISTS phpproj_Gallery;
DROP TABLE IF EXISTS phpproj_User;


/*==============================================================*/
/* TABLE CREATION : phpproj_Gallery                             */
/*==============================================================*/
CREATE TABLE phpproj_Gallery
(
    id          INT NOT NULL AUTO_INCREMENT,
    title       VARCHAR(100) NOT NULL,
    type        INT NOT NULL,
    
    PRIMARY KEY (id)
)
ENGINE=InnoDB
CHARACTER SET utf8
COLLATE utf8_bin
AUTO_INCREMENT=3;


/*==============================================================*/
/* TABLE CREATION : phpproj_GalleryPicture                      */
/*==============================================================*/
CREATE TABLE phpproj_GalleryPicture
(
    pic_id      INT NOT NULL,
    gal_id      INT NOT NULL,
    
    PRIMARY KEY (pic_id, gal_id)
)
ENGINE=InnoDB
CHARACTER SET utf8
COLLATE utf8_bin;


/*==============================================================*/
/* TABLE CREATION : phpproj_KEYword                             */
/*==============================================================*/
CREATE TABLE phpproj_KEYword
(
    id          INT NOT NULL AUTO_INCREMENT,
    name        VARCHAR(100) NOT NULL,
    active      BOOL NOT NULL,
    
    PRIMARY KEY (id)
)
ENGINE=InnoDB
CHARACTER SET utf8
COLLATE utf8_bin;


/*==============================================================*/
/* TABLE CREATION : phpproj_Picture                             */
/*==============================================================*/
CREATE TABLE phpproj_Picture
(
    id                      INT NOT NULL AUTO_INCREMENT,
    title                   VARCHAR(255) NOT NULL,
    description             VARCHAR(510),
    date                    DATETIME,
    public                  BOOL NOT NULL,
    filename_original       INT NOT NULL,
    filename_watermarked    INT,
    
    PRIMARY KEY (id)
)
ENGINE=InnoDB
CHARACTER SET utf8
COLLATE utf8_bin;


/*==============================================================*/
/* TABLE CREATION : phpproj_PictureKEYword                      */
/*==============================================================*/
CREATE TABLE phpproj_PictureKEYword
(
    pic_id      INT NOT NULL,
    KEY_id      INT NOT NULL,
    
    PRIMARY KEY (pic_id, KEY_id)
)
ENGINE=InnoDB
CHARACTER SET utf8
COLLATE utf8_bin;


/*==============================================================*/
/* TABLE CREATION : phpproj_User                                */
/*==============================================================*/
CREATE TABLE phpproj_User
(
    id          INT NOT NULL AUTO_INCREMENT,
    username    VARCHAR(30) NOT NULL,
    password    VARCHAR(255) NOT NULL,
    admin       BOOL NOT NULL DEFAULT 0,
    firstname   VARCHAR(50),
    lastname    VARCHAR(75),
    address     VARCHAR(255),
    zip         INT(6),
    city        VARCHAR(100),
    email       VARCHAR(200) NOT NULL,
    
    PRIMARY KEY (id)
)
ENGINE=InnoDB
CHARACTER SET utf8
COLLATE utf8_bin
AUTO_INCREMENT=3;


/*==============================================================*/
/* ADDING CONSTRAINTS (FOREIGN KEYS)                            */
/*==============================================================*/
alter TABLE phpproj_Gallery add constraINT FK_UserGallery foreign KEY (id)
      references phpproj_User (id) on delete restrict on update restrict;
alter TABLE phpproj_GalleryPicture add constraINT FK_GalleryPictureG foreign KEY (gal_id)
      references phpproj_Gallery (id) on delete restrict on update restrict;
alter TABLE phpproj_GalleryPicture add constraINT FK_GalleryPictureP foreign KEY (pic_id)
      references phpproj_Picture (id) on delete restrict on update restrict;
alter TABLE phpproj_PictureKEYword add constraINT FK_PictureKEYwordK foreign KEY (KEY_id)
      references phpproj_KEYword (id) on delete restrict on update restrict;
alter TABLE phpproj_PictureKEYword add constraINT FK_PictureKEYwordP foreign KEY (pic_id)
      references phpproj_Picture (id) on delete restrict on update restrict;


/*==============================================================*/
/* INSERTING DEFAULT/TEST VALUES                                */
/*==============================================================*/

INSERT INTO phpproj_User (id, username, password, email, admin) VALUES

#('0','NA','NA','na@na.com','0'), #This value should not exist, ids start from 3, and user with id=2 is the Admin
#('1','NA','NA','na@na.com','0'), #This value should not exist, ids start from 3, and user with id=2 is the Admin

#('2','Admin','Admin','1'); #This is the same entry, without hashed password
('2','Admin','$2y$10$WmJrNnMyaSEhP3ZzK190TOrcnj44qc3XtgS961U6tmc2.WFc.ibtC','admin@phpprojpictures.fr','1'); #This is the same entry, with hashed password

/* ===== ===== Tests d'Insertion ===== ===== */
INSERT INTO phpproj_User (username, password, firstname, lastname, address, zip, city, email) VALUES
#('Roger','Rabbit'),
('OSS 117','$2y$10$WmJrNnMyaSEhP3ZzK190TOScGHQ6QVpxRDR9O8spBsDqqdrlbMduy','Hubert','Bonisseur de La Bath','5, rue du nid d\'espions','1954','Le Caire','cebonvieuxhubert@gmail.com'),

#('Jojo','LaCompote');
('Jojo','$2y$10$WmJrNnMyaSEhP3ZzK190TO6ZngeZdGcIttAQ7Jaf3UZv4MLv9DMWa','Jojo','DuRU','13 Rue Peter Fink','01000','Bourg-en-Bresse','jojo-labonnecompote@univ-lyon1.fr');