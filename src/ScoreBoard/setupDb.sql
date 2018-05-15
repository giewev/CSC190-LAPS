create database if not exists laps;
use laps;

drop table if exists users;
create table users
	( qid INT,
	 name varchar(256),
	 pass varchar(256));


CREATE TABLE scores(
	uname varchar(255),
	qid INT,
	score INT
);

INSERT INTO users (name, qid, pass) VALUES ('John', '1', 'apple1!');
INSERT INTO users (name, qid, pass) VALUES ('Johny', '2', 'orange1!');
INSERT INTO scores (uname, qid, score) VALUES ('John', '1', '10');
