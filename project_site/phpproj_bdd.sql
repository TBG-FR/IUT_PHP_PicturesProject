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
   title                varchar(100) not null,
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
   name                 varchar(100) not null,
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
   title                varchar(255) not null,
   description          varchar(510),
   date                 datetime,
   public               bool not null,
   filename_original    int not null,
   filename_watermarked int,
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
   username             VARCHAR(30) not null,
   password             VARCHAR(255) not null,
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

#('2','Admin','Admin','1');
('2','Admin','$2y$10$WmJrNnMyaSEhP3ZzK190TOrcnj44qc3XtgS961U6tmc2.WFc.ibtC','1');

/* ===== ===== Tests d'Insertion ===== ===== */
INSERT INTO phpproj_User (username, password) VALUES
#('Roger','Rabbit'),
('Roger','$2y$10$WmJrNnMyaSEhP3ZzK190TOBWxGRWdmiqjoCSCNR/xFCoyKgMYAB2q'),

#('Jojo','LaCompote');
('Jojo','$2y$10$WmJrNnMyaSEhP3ZzK190TO6ZngeZdGcIttAQ7Jaf3UZv4MLv9DMWa');