CREATE SCHEMA gexpert;

CREATE TABLE gexpert.`__users` ( 
	id                   INT NOT NULL AUTO_INCREMENT,
	name                 VARCHAR( 500 ) NOT NULL,
	emp_code             VARCHAR( 150 ) NOT NULL,
	email                VARCHAR( 500 ) NOT NULL,
	phone                VARCHAR( 50 ) NOT NULL,
	CONSTRAINT pk___users PRIMARY KEY ( id )
 );

CREATE TABLE gexpert.category ( 
	id                   INT NOT NULL AUTO_INCREMENT,
	name                 VARCHAR( 500 ) NOT NULL,
	code                 VARCHAR( 150 ) NOT NULL,
	logo                 VARCHAR( 1500 ) NOT NULL,
	date_created         TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	status               INT NOT NULL,
	CONSTRAINT pk_category PRIMARY KEY ( id )
 );

CREATE TABLE gexpert.test_details ( 
	id                   INT NOT NULL AUTO_INCREMENT,
	category             INT NOT NULL,
	name                 VARCHAR( 500 ) NOT NULL,
	description          VARCHAR( 10000 ) NOT NULL,
	instruction          VARCHAR( 5000 ),
	logo                 VARCHAR( 500 ) NOT NULL,
	time_taken           INT UNSIGNED NOT NULL,
	date_created         TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	created_by           INT NOT NULL,
	last_modified        TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
	valid_from           DATE NOT NULL,
	valid_to             DATE NOT NULL,
	status               INT NOT NULL,
	CONSTRAINT pk_test_details PRIMARY KEY ( id ),
	CONSTRAINT category UNIQUE ( category ),
	CONSTRAINT created_by UNIQUE ( created_by ),
	CONSTRAINT fk_test_details FOREIGN KEY ( category ) REFERENCES gexpert.category( id ) ON DELETE NO ACTION ON UPDATE NO ACTION,
	CONSTRAINT fk_test_details_0 FOREIGN KEY ( created_by ) REFERENCES gexpert.`__users`( id ) ON DELETE NO ACTION ON UPDATE NO ACTION
 );

CREATE TABLE gexpert.`__login` ( 
	id                   INT NOT NULL AUTO_INCREMENT,
	name                 INT NOT NULL,
	password             INT NOT NULL,
	last_login           INT NOT NULL,
	status               INT NOT NULL,
	user_id              INT,
	CONSTRAINT pk___login PRIMARY KEY ( id ),
	CONSTRAINT fk___login FOREIGN KEY ( user_id ) REFERENCES gexpert.`__users`( id ) ON DELETE NO ACTION ON UPDATE NO ACTION
 );

CREATE INDEX idx___login ON gexpert.`__login` ( user_id );

CREATE TABLE gexpert.questions ( 
	id                   INT NOT NULL AUTO_INCREMENT,
	test_id              INT NOT NULL,
	question_type        INT NOT NULL,
	level_id             INT NOT NULL,
	date_created         TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	status               INT NOT NULL,
	question             VARCHAR( 1500 ) NOT NULL,
	CONSTRAINT pk_questions PRIMARY KEY ( id ),
	CONSTRAINT pk_questions_0 UNIQUE ( test_id ),
	CONSTRAINT fk_questions FOREIGN KEY ( test_id ) REFERENCES gexpert.test_details( id ) ON DELETE NO ACTION ON UPDATE NO ACTION
 );

CREATE TABLE gexpert.answers ( 
	id                   INT NOT NULL,
	answer               VARCHAR( 3000 ) NOT NULL,
	answer_hint          VARCHAR( 5000 ) NOT NULL,
	is_correct           BIT NOT NULL DEFAULT 0,
	question_id          INT NOT NULL,
	date_created         TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	percent              INT NOT NULL,
	CONSTRAINT pk_answers UNIQUE ( question_id ),
	CONSTRAINT fk_answers FOREIGN KEY ( question_id ) REFERENCES gexpert.questions( id ) ON DELETE NO ACTION ON UPDATE NO ACTION
 );

