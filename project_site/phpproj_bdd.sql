/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  05/10/2017 10:20:41                      */
/*==============================================================*/

drop table if exists phpproj_PictureKeyword;

drop table if exists phpproj_GalleryPicture;

drop table if exists phpproj_Keyword;

drop table if exists phpproj_Picture;

drop table if exists phpproj_Gallery;

drop table if exists phpproj_User;

/*==============================================================*/
/* Table : phpproj_Gallery                                      */
/*==============================================================*/
create table phpproj_Gallery
(
   id                   int not null AUTO_INCREMENT,
   title                varchar(254) not null,
   type                 int not null,
   primary key (id)
)
ENGINE=InnoDB
CHARACTER SET utf8
COLLATE utf8_bin
AUTO_INCREMENT=3;

/*==============================================================*/
/* Table : phpproj_GalleryPicture                               */
/*==============================================================*/
create table phpproj_GalleryPicture
(
   pic_id               int not null,
   gal_id               int not null,
   primary key (pic_id, gal_id)
)
ENGINE=InnoDB
CHARACTER SET utf8
COLLATE utf8_bin;

/*==============================================================*/
/* Table : phpproj_Keyword                                      */
/*==============================================================*/
create table phpproj_Keyword
(
   id                   int not null AUTO_INCREMENT,
   name                 varchar(254) not null,
   active               bool not null,
   primary key (id)
)
ENGINE=InnoDB
CHARACTER SET utf8
COLLATE utf8_bin;

/*==============================================================*/
/* Table : phpproj_Picture                                      */
/*==============================================================*/
create table phpproj_Picture
(
   id                   int not null AUTO_INCREMENT,
   title                varchar(254) not null,
   description          varchar(254),
   date                 datetime,
   public               bool not null,
   path_original    varchar(254) not null,
   path_watermarked varchar(254),
   primary key (id)
)
ENGINE=InnoDB
CHARACTER SET utf8
COLLATE utf8_bin;

/*==============================================================*/
/* Table : phpproj_PictureKeyword                               */
/*==============================================================*/
create table phpproj_PictureKeyword
(
   pic_id               int not null,
   key_id               int not null,
   primary key (pic_id, key_id)
)
ENGINE=InnoDB
CHARACTER SET utf8
COLLATE utf8_bin;

/*==============================================================*/
/* Table : phpproj_User                                         */
/*==============================================================*/
create table phpproj_User
(
   id                   int not null AUTO_INCREMENT,
   username             VARCHAR(25) not null,
   password             VARCHAR(50) not null,
   admin                bool not null DEFAULT 0,
   primary key (id)
)
ENGINE=InnoDB
CHARACTER SET utf8
COLLATE utf8_bin
AUTO_INCREMENT=3;

alter table phpproj_Gallery add constraint FK_UserGallery foreign key (id)
      references phpproj_User (id) on delete restrict on update restrict;

alter table phpproj_GalleryPicture add constraint FK_GalleryPictureG foreign key (gal_id)
      references phpproj_Gallery (id) on delete restrict on update restrict;

alter table phpproj_GalleryPicture add constraint FK_GalleryPictureP foreign key (pic_id)
      references phpproj_Picture (id) on delete restrict on update restrict;

alter table phpproj_PictureKeyword add constraint FK_PictureKeywordK foreign key (key_id)
      references phpproj_Keyword (id) on delete restrict on update restrict;

alter table phpproj_PictureKeyword add constraint FK_PictureKeywordP foreign key (pic_id)
      references phpproj_Picture (id) on delete restrict on update restrict;
      
/*==============================================================*/
/*                                        */
/*==============================================================*/
INSERT INTO phpproj_User VALUES
#('0','NA','NA','FALSE'),
#('1','NA','NA','FALSE'),
('2','Admin','Admin','1');

/* ===== ===== Tests d'Insertion ===== ===== */
INSERT INTO phpproj_User (username, password) VALUES
('Roger','Rabbit'),
('Jojo','LaCompote');