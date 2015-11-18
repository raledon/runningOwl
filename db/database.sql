drop table if exists user;
create table user(
    userId integer primary key autoincrement,
    password varchar(30) not null,
    name varchar(100) not null,
    gender tinyint(1) default 0 check(gender in (0,1)),
    birthday date not null,
    email varchar(100) default null,
    mobile varchar(11) default null,
    slogan text not null,
    character tinyint(1) default 1,
    avatar text default null,
    createdAt date not null
);

drop table if exists event;
create table event(
    eventId integer primary key autoincrement,
    typeId int default 0,
    description text default null,
    createdBy integer not null,
    createdAt date not null,
    location text default null,
    scale int default 0    
);

drop table if exists eventtype;
create table eventtype(
    typeId integer primary key autoincrement,
    info text not null
);

drop table if exists bodyinfo;
create table bodyinfo(
    infoId integer primary key autoincrement,
    userId integer not null,
    createdAt date not null,
    height int(3) not null,
    weight int(3) not null
    
    
);

drop table if exists healthInfo;
create table healthInfo(
    infoId integer primary key autoincrement,
    userId integer not null,
    createdAt date not null,
    heartRate int default -1,
    bloodPressure int default -1
);

drop table if exists sleepInfo;
create table sleepInfo(
    infoId integer primary key autoincrement,
    userId integer not null,
    startAt date not null,
    endAt date not null,
    validSleepTime int not null
);

drop table if exists exerciseInfo;
create table exerciseInfo(
    infoId integer primary key autoincrement,
    userId integer not null,
    createdAt date not null,
    distance double default 0.0,
    lasted int default 0
);

drop table if exists joinEvent;
create table joinEvent(
    eventId integer not null,
    userId integer not null,
    createdAt date not null,
    constraint c primary key(eventId, userId)
);

drop table if exists advice;
create table advice(
    adviceId integer primary key autoincrement,
    content text not null,
    createdBy integer not null,
    createdAt datetime not null
);

drop table if exists reply;
create table reply(
    replyId integer primary key autoincrement,
    adviceId integer not null,
    content text not null,
    createdAt date not null,
    createdBy integer not null
);

drop table if exists sendAdvice;
create table sendAdvice(
    adviceId integer not null,
    sendTo integer not null,
    createdAt date not null,
    isReplied tinyint(1) default 0,
    constraint c primary key(adviceId, sendTo)
);