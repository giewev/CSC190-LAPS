create database if not exists laps;
use laps;

drop table if exists users;
create table users
	( qid INT
	 name varchar(256),
	 pass varchar(256));


CREATE TABLE tbl_scores(
	uname varchar(255),
	qid INT,
	score INT
);

INSERT INTO tbl_users (name, qid, score) VALUES ('John', '1', 'apple1!');
INSERT INTO tbl_users (name, qid, score) VALUES ('Johny', '2', 'orange1!');
INSERT INTO tbl_scores (uname, qid, score) VALUES ('Johnson', '4', '10');
