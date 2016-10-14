CREATE TABLE members (
	member_no   INT             NOT NULL,
    birth_date  DATE            NOT NULL,
    first_name  VARCHAR(50)     NOT NULL,
    last_name   VARCHAR(50)     NOT NULL,
    gender      ENUM ('M','F')  NOT NULL,
    join_date   DATE            NOT NULL,
    PRIMARY KEY (member_no)
);

CREATE TABLE departments (
    dept_no     CHAR(4)         NOT NULL,
    dept_name   VARCHAR(40)     NOT NULL,
    PRIMARY KEY (dept_no),
    UNIQUE  KEY (dept_name)
);


CREATE TABLE dept_member (
    member_no      INT         NOT NULL,
    dept_no     CHAR(4)     NOT NULL,
    from_date   DATE        NOT NULL,
    to_date     DATE        NOT NULL,
    KEY         (member_no),
    KEY         (dept_no),
    FOREIGN KEY (member_no) REFERENCES members (member_no) ON DELETE CASCADE,
	FOREIGN KEY (dept_no) REFERENCES departments (dept_no) ON DELETE CASCADE,

    PRIMARY KEY (member_no, dept_no)

);

CREATE TABLE dept_manager (
   dept_no      CHAR(4)  NOT NULL,
   member_no    INT      NOT NULL,
   from_date    DATE     NOT NULL,
   to_date      DATE     NOT NULL,
   KEY         (member_no),
   KEY         (dept_no),
   FOREIGN KEY (member_no)  REFERENCES members (member_no)    ON DELETE CASCADE,
   FOREIGN KEY (dept_no) REFERENCES departments (dept_no) ON DELETE CASCADE,
   PRIMARY KEY (member_no, dept_no)
);

CREATE TABLE titles (
    member_no      INT          NOT NULL,
    title       VARCHAR(50)  NOT NULL,
    from_date   DATE         NOT NULL,
    to_date     DATE,
    KEY         (member_no),
    FOREIGN KEY (member_no) REFERENCES members (member_no) ON DELETE CASCADE,
    PRIMARY KEY (member_no, title, from_date)

);
