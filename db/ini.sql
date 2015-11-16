--create user table 
drop table if exists user;
create table user(
       userId integer primary key autoincrement,       
       password varchar(3) not null,       
       name varchar(100) not null,       
       gender tinyint(1) default 0,       
       telephone char(11) default null,       
       email varchar(255) default null,
       avatar text default null,
       slogan char(100) default null,             
       birthday date not null,       
       createdAt date not null,
       character tinyint(1) default 0    
);


