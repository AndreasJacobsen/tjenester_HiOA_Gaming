CREATE TABLE single (
  player_no   INT             AUTO_INCREMENT NOT NULL,
  full_name   VARCHAR (120)   NOT NULL,
  player_name VARCHAR (200)   NOT NULL,
  email       VARCHAR(255)    NOT NULL,
  lan_date    DATE            NOT NULL,
  game        VARCHAR(255)    NOT NULL,
  student     BOOLEAN         NOT NULL,
  PRIMARY KEY (player_no)
)

CREATE TABLE team (
  player_no   INT             AUTO_INCREMENT NOT NULL,
  full_name   VARCHAR(120)     NOT NULL,
  team_name   VARCHAR(255)    NOT NULL,
  email       VARCHAR(255)    NOT NULL,
  lan_date    DATE            NOT NULL,
  game        VARCHAR(255)    NOT NULL,
  student     BOOLEAN         NOT NULL,
  PRIMARY KEY (player_no)
)