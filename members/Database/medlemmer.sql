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
  status      VARCHAR(35)	    NOT NULL,
  end_date    DATE            NOT NULL,
  bday        DATE            NOT NULL,
  email       VARCHAR(254)    NOT NULL,
  payment     VARCHAR(50)     NOT NULL,
  PRIMARY KEY (member_no)
);

CREATE TABLE single (
  player_no   INT             AUTO_INCREMENT NOT NULL,
  first_name  VARCHAR(50)     NOT NULL,
  last_name   VARCHAR(50)     NOT NULL,    
  email       VARCHAR(255)    NOT NULL, 
  lan_date    DATE            NOT NULL, 
  game        VARCHAR(255)    NOT NULL, 
  student     BOOLEAN         NOT NULL,
  PRIMARY KEY (player_no)
)

CREATE TABLE team (
  player_no   INT             AUTO_INCREMENT NOT NULL,
  first_name  VARCHAR(50)     NOT NULL,
  last_name   VARCHAR(50)     NOT NULL, 
  team_name   VARCHAR(255)    NOT NULL,   
  email       VARCHAR(255)    NOT NULL, 
  lan_date    DATE            NOT NULL, 
  game        VARCHAR(255)    NOT NULL, 
  student     BOOLEAN         NOT NULL,
  PRIMARY KEY (player_no)
)