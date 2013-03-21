
drop table if exists comments;
drop table if exists users;
drop table if exists ideas;

create table ideas (
  id int(11) NOT NULL AUTO_INCREMENT,
  title varchar(255) NOT NULL,
  body text NOT NULL,
  date_created datetime NOT NULL,
  last_updated datetime NOT NULL,
  PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

create table users (
  id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(128) NOT NULL,
  fname varchar(128) NULL,
  lname varchar(128) NULL,
  email varchar(128) NOT NULL,
  password varchar(128) NOT NULL, 
  date_created datetime NOT NULL,
  last_updated datetime NOT NULL,
  PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

create table comments (
  id int(11) NOT NULL AUTO_INCREMENT,
  idea_id int(11) NOT NULL,
  user_id int(11) NOT NULL,
  title varchar(255) NOT NULL,
  body text NOT NULL,
  date_created datetime NOT NULL,
  last_updated datetime NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(idea_id) REFERENCES ideas(id),
  FOREIGN KEY(user_id) REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

insert into users(id, username, fname, lname, email, password, date_created, last_updated)
values(1, 'bob', 'Bob', 'Smith', 'bob@aol.com', '123456', '2012-04-01 09:44:22', '2012-04-01 10:44:22');

insert into users(id, username, fname, lname, email, password, date_created, last_updated)
values(2, 'bill', 'Bill', 'Smith', 'bill@aol.com', '123456', '2012-04-02 12:34:22', '2012-04-07 07:22:22');

insert into users(id, username, fname, lname, email, password, date_created, last_updated)
values(3, 'barbara', 'Barbara', 'Jones', 'barbara@aol.com', '123456', '2012-04-03 14:34:22', '2012-04-11 16:22:22');
