create database if not exists laps;
use laps;

drop table if exists users;
create table users
	(id int,
	 name varchar(256),
	 pass varchar(256));

