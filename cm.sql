
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";



CREATE TABLE IF NOT EXISTS 'mess' (
  'ID' int(11) NOT NULL AUTO_INCREMENT,
  'body' text NOT NULL,
  'subj' text NOT NULL,
  'retrieve_IDs' int(11) NOT NULL,
  'user_ID' int(11) NOT NULL,
  
  PRIMARY KEY ('ID')
) 
ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


/*Table for 'read'*/

CREATE TABLE IF NOT EXISTS 'read' (
  'ID' int(11) NOT NULL AUTO_INCREMENT,
  'mess_ID' int(11) NOT NULL,
  'reads_ID' int(11) NOT NULL,
  'date' date NOT NULL,
  PRIMARY KEY ('ID')
) 
ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;




/*Table for 'user'*/


CREATE TABLE IF NOT EXISTS 'user' (
  'ID' int(13) NOT NULL AUTO_INCREMENT,
  'uname' text NOT NULL,
  'pword' text NOT NULL,
  'fname' text NOT NULL,
  'lname' text NOT NULL,
  
  
  PRIMARY KEY ('ID')
) 
ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



INSERT INTO user (first_name, last_name, password, username) VALUES ('Fae','Fort','puffy1','ffort');
INSERT INTO user (first_name, last_name, password, username) VALUES ('Tim','Taber','kingss','ttaber');
INSERT INTO user (first_name, last_name, password, username) VALUES ('Red','Brown','gradesdaily','wegotthis');
INSERT INTO user (first_name, last_name, password, username) VALUES ('Saint','West','goku','swest');
INSERT INTO user (first_name, last_name, password, username) VALUES ('Blue','Ivy','loveeatpray','Ivystar');
INSERT INTO user (first_name, last_name, password, username) VALUES ('Faith','Smalls','redribbon','FaithSmalls');
INSERT INTO user (first_name, last_name, password, username) VALUES ('Tevin','Donswell','teeswhite','tdonswell');

SHOW TABLES;
SELECT * FROM mess;
SELECT * FROM user;
SELECT * FROM read;
