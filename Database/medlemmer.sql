CREATE DATABASE IF NOT EXISTS hioa_gaming;

USE hioa_gaming ;

CREATE TABLE members (
  member_no   INT  			  AUTO_INCREMENT NOT NULL,
  birth_date  DATE            NOT NULL,
  first_name  VARCHAR(50)     NOT NULL,
  last_name   VARCHAR(50)     NOT NULL,
  student     BOOLEAN         NOT NULL,
  gender      ENUM ('M','F')  NOT NULL,
  join_date   DATE            NOT NULL,
  member_type ENUM ('Y','S')  NOT NULL,
  position    VARCHAR(35)	  NOT NULL,
  PRIMARY KEY (member_no)
);
