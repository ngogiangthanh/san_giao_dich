/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     3/1/2017 2:16:30 PM                          */
/*==============================================================*/


drop table if exists LIEN_HE;

drop table if exists LINH_VUC;

drop table if exists NGUOI_DUNG;

drop table if exists PHAN_HOI;

drop table if exists TAGS;

drop table if exists TRA_LOI;

drop table if exists VAN_DE;

drop table if exists Y_TUONG;

/*==============================================================*/
/* Table: LIEN_HE                                               */
/*==============================================================*/
create table LIEN_HE
(
   ID                   int not null AUTO_INCREMENT,
   ID_PHAN_HOI          int,
   HO_TEN               varchar(200) not null,
   EMAIL                varchar(256) not null,
   TIEU_DE              varchar(256) not null,
   NOI_DUNG_PHAN_HOI    text,
   NOI_DUNG_LIEN_HE     text not null,
   TRANG_THAI           tinyint not null,
   primary key (ID)
);

/*==============================================================*/
/* Table: LINH_VUC                                              */
/*==============================================================*/
create table LINH_VUC
(
   ID          int not null AUTO_INCREMENT,
   TEN_LOAI_            varchar(200) not null,
   primary key (ID)
);

/*==============================================================*/
/* Table: NGUOI_DUNG                                            */
/*==============================================================*/
create table NGUOI_DUNG
(
   ID                   int not null AUTO_INCREMENT,
   URL_DAI_DIEN         varchar(200),
   HO_TEN               varchar(200) not null,
   DIA_CHI              varchar(200) not null,
   EMAIL                varchar(256) not null,
   SDT                  char(20) not null,
   TAI_KHOAN            varchar(128) not null,
   MAT_KHAU             varchar(128) not null,
   QUYEN_HAN            tinyint not null,
   TRANG_THAI           tinyint not null,
   primary key (ID)
);

/*==============================================================*/
/* Table: PHAN_HOI                                              */
/*==============================================================*/
create table PHAN_HOI
(
   ID                   int not null AUTO_INCREMENT,
   ID_Y_TUONG           int not null,
   ID_NGUOI_DUNG        int not null,
   NOI_DUNG_PHAN_HOI    text not null,
   DANH_GIA             tinyint not null,
   primary key (ID)
);

/*==============================================================*/
/* Table: TAGS                                                  */
/*==============================================================*/
create table TAGS
(
   ID                   int not null AUTO_INCREMENT,
   TEN_TAGS             varchar(200) not null,
   TUAN_SUAT            int not null,
   primary key (ID)
);

/*==============================================================*/
/* Table: TRA_LOI                                               */
/*==============================================================*/
create table TRA_LOI
(
   ID                   int not null AUTO_INCREMENT,
   ID_NGUOI_DUNG        int not null,
   ID_VAN_DE            int not null,
   NOI_DUNG             text not null,
   QUYEN_XEM            tinyint not null,
   primary key (ID)
);

/*==============================================================*/
/* Table: VAN_DE                                                */
/*==============================================================*/
create table VAN_DE
(
   ID                   int not null AUTO_INCREMENT,
   ID_NGUOI_DUNG        int not null,
   URL_THUMBNAIL        varchar(200) not null,
   TIEU_DE_VAN_DE       varchar(256) not null,
   MO_TA_VAN_DE         text not null,
   TAGS                 varchar(500),
   TRANG_THAI           tinyint not null,
   LUOT_XEM             int not null,
   primary key (ID)
);

/*==============================================================*/
/* Table: Y_TUONG                                               */
/*==============================================================*/
create table Y_TUONG
(
   ID                   int not null AUTO_INCREMENT,
   ID_LINH_VUC          int not null,
   ID_NGUOI_DUNG        int not null,
   URL_THUMBNAIL        varchar(200),
   TEN_Y_TUONG          varchar(256),
   TOM_TAT              text,
   CHI_TIET_Y_TUONG     text,
   URL_FILE             varchar(200),
   TAGS                 varchar(500),
   TRANG_THAI           tinyint,
   LUOT_XEM             int,
   primary key (ID)
);

alter table LIEN_HE add constraint FK_PHAN_HOI_LIEN_HE foreign key (ID_PHAN_HOI)
      references NGUOI_DUNG (ID) on delete restrict on update restrict;

alter table PHAN_HOI add constraint FK_GUI_PHAN_HOI__ANH_GIA foreign key (ID_NGUOI_DUNG)
      references NGUOI_DUNG (ID) on delete restrict on update restrict;

alter table PHAN_HOI add constraint FK_Y_TUONG_CO_PHAN_HOI foreign key (ID_Y_TUONG)
      references Y_TUONG (ID) on delete restrict on update restrict;

alter table TRA_LOI add constraint FK_GUI_TRA_LOI foreign key (ID_NGUOI_DUNG)
      references NGUOI_DUNG (ID) on delete restrict on update restrict;

alter table TRA_LOI add constraint FK_TRA_LOI_CHO_VAN_DE foreign key (ID_VAN_DE)
      references VAN_DE (ID) on delete restrict on update restrict;

alter table VAN_DE add constraint FK_DANG_TIM_GIAI_PHAP foreign key (ID_NGUOI_DUNG)
      references NGUOI_DUNG (ID) on delete restrict on update restrict;

alter table Y_TUONG add constraint FK_DANG_Y_TUONG foreign key (ID_NGUOI_DUNG)
      references NGUOI_DUNG (ID) on delete restrict on update restrict;

alter table Y_TUONG add constraint FK_THUOC_LINH_VUC foreign key (ID_LINH_VUC)
      references LINH_VUC (ID) on delete restrict on update restrict;

