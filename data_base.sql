

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
 
)
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
)
