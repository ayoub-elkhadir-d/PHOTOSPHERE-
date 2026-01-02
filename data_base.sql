

CREATE table User (
 
 id int PRIMARY KEY AUTO_INCREMENT,
 name varchar(100) not null,
 username varchar(40) not null ,
 email varchar(50) not null,
 password varchar(50) not null,
 role varchar(20),
 bio varchar(1000),
 profilpic varchar(50),
 isactive boolean,
 monthly_uploads int ,
 subscription_start datetime,
 subscription_end datetime,
 last_login datetime,
 created_at datetime
 
);
CREATE table album(
 id int PRIMARY KEY AUTO_INCREMENT,
 user_id int,
 FOREIGN KEY (user_id) REFERENCES user(id),
 title varchar(100),
 description varchar(1000),
 photo_cover_url varchar(1000),
 visibility boolean ,
 photo_count int,
 created_at datetime,
 updated_at datetime
);

CREATE table Post(
id int PRIMARY KEY AUTO_INCREMENT,
user_id int,
FOREIGN KEY (user_id) REFERENCES user(id),
title varchar(100),
description varchar(100),
file_path varchar(100),
status varchar(20),
views_count int,
published_at datetime,
created_at datetime,
updated_at datetime
);
CREATE table comment (
id int PRIMARY KEY AUTO_INCREMENT,
user_id int,
FOREIGN KEY (user_id) REFERENCES user(id),
post_id int,
FOREIGN KEY (post_id) REFERENCES Post(id),
content text,
created_at datetime,
updated_at datetime
);

CREATE table like(
id int PRIMARY KEY AUTO_INCREMENT,
user_id int,
FOREIGN KEY (user_id) REFERENCES user(id),
post_id int,
FOREIGN KEY (post_id) REFERENCES Post(id),
created_at datetime
);

CREATE table Tag(
  id int PRIMARY KEY AUTO_INCREMENT,
  name varchar(100),
  slug varchar(100),
   usage_count int

);
INSERT INTO User (name, username, email, password, role, bio, profilpic, isactive, monthly_uploads, subscription_start, subscription_end, last_login, created_at) VALUES
('User One','user1','user1@mail.com','123','USER','Photographer','u1.jpg',1,10,'2025-01-01','2025-12-31','2026-01-01','2025-01-01'),
('User Two','user2','user2@mail.com','123','USER','Traveler','u2.jpg',1,8,'2025-01-01','2025-12-31','2026-01-01','2025-01-02'),
('User Three','user3','user3@mail.com','123','USER','Nature lover','u3.jpg',1,12,'2025-01-01','2025-12-31','2026-01-01','2025-01-03'),
('User Four','user4','user4@mail.com','123','USER','Street photos','u4.jpg',1,6,NULL,NULL,'2026-01-01','2025-01-04'),
('User Five','user5','user5@mail.com','123','USER','Portraits','u5.jpg',1,9,NULL,NULL,'2026-01-01','2025-01-05'),
('User Six','user6','user6@mail.com','123','USER','Urban life','u6.jpg',1,4,NULL,NULL,'2026-01-01','2025-01-06'),
('User Seven','user7','user7@mail.com','123','USER','Wildlife','u7.jpg',1,15,NULL,NULL,'2026-01-01','2025-01-07'),
('User Eight','user8','user8@mail.com','123','USER','Minimal','u8.jpg',1,5,NULL,NULL,'2026-01-01','2025-01-08'),
('User Nine','user9','user9@mail.com','123','USER','Art photos','u9.jpg',1,11,NULL,NULL,'2026-01-01','2025-01-09'),
('Admin','admin','admin@mail.com','admin','ADMIN','Admin','admin.jpg',1,0,NULL,NULL,'2026-01-01','2025-01-10');

INSERT INTO album (user_id,title,description,photo_cover_url,visibility,photo_count,created_at,updated_at) VALUES
(1,'Nature','Nature shots','a1.jpg',1,10,NOW(),NOW()),
(2,'City','City life','a2.jpg',1,8,NOW(),NOW()),
(3,'Travel','Travel photos','a3.jpg',1,12,NOW(),NOW()),
(4,'Street','Street vibes','a4.jpg',1,6,NOW(),NOW()),
(5,'Portrait','People','a5.jpg',0,9,NOW(),NOW()),
(6,'Urban','Urban style','a6.jpg',1,4,NOW(),NOW()),
(7,'Wild','Wildlife','a7.jpg',1,15,NOW(),NOW()),
(8,'Minimal','Minimal art','a8.jpg',1,5,NOW(),NOW()),
(9,'Art','Artistic','a9.jpg',1,11,NOW(),NOW()),
(10,'Admin Album','System','a10.jpg',0,0,NOW(),NOW());

INSERT INTO Post (user_id,title,description,file_path,status,views_count,published_at,created_at,updated_at) VALUES
(1,'Post 1','Desc','p1.jpg','PUBLISHED',100,NOW(),NOW(),NOW()),
(2,'Post 2','Desc','p2.jpg','PUBLISHED',80,NOW(),NOW(),NOW()),
(3,'Post 3','Desc','p3.jpg','PUBLISHED',120,NOW(),NOW(),NOW()),
(4,'Post 4','Desc','p4.jpg','DRAFT',20,NULL,NOW(),NOW()),
(5,'Post 5','Desc','p5.jpg','PUBLISHED',60,NOW(),NOW(),NOW()),
(6,'Post 6','Desc','p6.jpg','PUBLISHED',90,NOW(),NOW(),NOW()),
(7,'Post 7','Desc','p7.jpg','PUBLISHED',200,NOW(),NOW(),NOW()),
(8,'Post 8','Desc','p8.jpg','PUBLISHED',40,NOW(),NOW(),NOW()),
(9,'Post 9','Desc','p9.jpg','PUBLISHED',70,NOW(),NOW(),NOW()),
(1,'Post 10','Desc','p10.jpg','PUBLISHED',110,NOW(),NOW(),NOW());

INSERT INTO comment (user_id,post_id,content,created_at,updated_at) VALUES
(2,1,'Nice!',NOW(),NOW()),
(3,1,'Great shot',NOW(),NOW()),
(4,2,'Love it',NOW(),NOW()),
(5,3,'Awesome',NOW(),NOW()),
(6,4,'Cool',NOW(),NOW()),
(7,5,'Amazing',NOW(),NOW()),
(8,6,'Well done',NOW(),NOW()),
(9,7,'Perfect',NOW(),NOW()),
(1,8,'Nice colors',NOW(),NOW()),
(10,9,'Approved',NOW(),NOW());

INSERT INTO likes (user_id,post_id,created_at) VALUES
(1,1,NOW()),
(2,1,NOW()),
(3,2,NOW()),
(4,2,NOW()),
(5,3,NOW()),
(6,4,NOW()),
(7,5,NOW()),
(8,6,NOW()),
(9,7,NOW()),
(10,8,NOW());

INSERT INTO Tag (name,slug,usage_count) VALUES
('Nature','nature',15),
('City','city',10),
('Travel','travel',12),
('Street','street',9),
('Portrait','portrait',7),
('Urban','urban',8),
('Wildlife','wildlife',11),
('Minimal','minimal',6),
('Art','art',13),
('Photography','photography',20);