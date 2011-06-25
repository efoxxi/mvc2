##############################################
#                                            #
#	Assignment                                 #
#	04/14/2011                                 #
#                                            #
# Mikhail Kotov                              #
# James Zuccon                               #
# Reece Dixon                                #
#                                            #
##############################################

# Cleaning current DB

DROP TABLE IF EXISTS csvmembers;
DROP TABLE IF EXISTS csvprojects;
DROP TABLE IF EXISTS projectmembers;
DROP TABLE IF EXISTS issues;
DROP TABLE IF EXISTS members;
DROP TABLE IF EXISTS projects;

# Creating temporary tables that was imported from csv files

CREATE TABLE csvmembers (
  id varchar(20) NOT NULL,
  name varchar(20) NULL,
  surname varchar(20) NULL,
  projectName varchar(20) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE csvprojects (
  id varchar(20) NOT NULL,
  projectDetails varchar(255) NOT NULL,
  issue varchar(20) NOT NULL,
  issueDetails varchar(255) NOT NULL,
  issueDate date NOT NULL,
  issueType varchar(20) NOT NULL,
  priority varchar(20) NOT NULL,
  status varchar(20) NOT NULL,
  memberName varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO csvprojects VALUES('Ailium', 'Integrate diverse database formats', 'mssql', 'Add MS SQL to list of supported databases', '2011-01-12', 'requirement', 'medium', 'resolved', 'benmou');
INSERT INTO csvprojects VALUES('Coursemaster', 'System to keep track of all courses offered to and undertaken by employees', ' ', '', '0000-00-00', '', '', '', '');
INSERT INTO csvprojects VALUES('Jabberfly', 'In-house instant discussion/chatter forum', 'login crash', 'System crashes when user logs in twice', '2011-03-10', 'bug', 'high', 'open', 'forpre');
INSERT INTO csvprojects VALUES('Jabberfly', 'In-house instant discussion/chatter forum', 'legal', 'Need to avoid too much similarity with commercial chatting systems', '2011-02-28', 'general', 'low', 'open', 'forpre');
INSERT INTO csvprojects VALUES('Jettube', 'System for fast email with mobile users in buses and planes', 'safety', 'What if drivers or pilots are distracted by this system?', '2011-01-03', 'general', 'medium', 'discarded', 'frahol');
INSERT INTO csvprojects VALUES('Rhymbo', 'Add catchy rhythms to IP phone ring tones', '', '', '0000-00-00', '', '', '', '');
INSERT INTO csvprojects VALUES('Skygen', 'Automatic generation of cloud-based multi-user spreadsheets', 'cloud services accou', 'The cloud services account', '2010-12-13', 'general', 'medium', 'open', 'artden');
INSERT INTO csvprojects VALUES('Skygen', 'Automatic generation of cloud-based multi-user spreadsheets', 'date format', 'Dates from our existing sample data get scrambled when transferred to prototype cloud-based system.', '2011-03-16', 'bug', 'high', 'open', 'artden');
INSERT INTO csvprojects VALUES('Tekdrive', 'Centralised  backup drive technology and interface', 'hard drives', 'New solid state hard drives are not yet available from the manufacturer', '2011-02-23', 'general', 'high', 'open', 'arnrim');
INSERT INTO csvprojects VALUES('Tekdrive', 'Centralised  backup drive technology and interface', 'timeout', 'Backups carried out in proof of concept system time out before completing full backup', '2011-02-23', 'general', 'high', 'open', 'arnrim');

INSERT INTO csvmembers VALUES('arnrim', 'Arnold', 'Rimmer', 'Tekdrive');
INSERT INTO csvmembers VALUES('artden', 'Arthur', 'Dent', 'Skygen');
INSERT INTO csvmembers VALUES('benmou', 'Benjy', 'Mouse', 'Ailium');
INSERT INTO csvmembers VALUES('davlis', 'Dave', 'Lister', 'Skygen');
INSERT INTO csvmembers VALUES('edwelg', 'Edward', 'Elgar', '');
INSERT INTO csvmembers VALUES('forpre', 'Ford', 'Prefect', 'Jabberfly');
INSERT INTO csvmembers VALUES('frahol', 'Frank', 'Hollister', 'Jettube');
INSERT INTO csvmembers VALUES('krikoc', 'Kristine', 'Kochanksi', 'Skygen');
INSERT INTO csvmembers VALUES('olapet', 'Olaf', 'Petersen', '');
INSERT INTO csvmembers VALUES('projel', 'Prostetnic', 'Jeltz', 'Jabberfly');
INSERT INTO csvmembers VALUES('samvim', 'Sam', 'Vimes', 'Ailium');
INSERT INTO csvmembers VALUES('slabar', 'Slarti', 'Bartfast', 'Ailium');
INSERT INTO csvmembers VALUES('zapbee', 'Zaphod', 'Beeblebrox', 'Jettube');


# Creating DB tables

CREATE TABLE issues (
 	id varchar(20) NOT NULL,  
  projectid varchar(20) NOT NULL,
  memberid varchar(20) NOT NULL,
  details varchar(255) NOT NULL,
  date date NOT NULL,
  type varchar(20) NOT NULL,
  priority varchar(20) NOT NULL,
  status varchar(20) NOT NULL,
  PRIMARY KEY (id,projectid,memberid),
  KEY projectid (projectid),
  KEY memberid (memberid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE members (
  id varchar(20) NOT NULL,
  name varchar(20) NOT NULL,
  surname varchar(20) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE projectmembers (
  projectid varchar(20) NOT NULL,
  memberid varchar(20) NOT NULL,
  PRIMARY KEY (projectid,memberid),
  KEY projectid (projectid),
  KEY memberid (memberid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE projects (
  id varchar(20) NOT NULL,
  projectDetails varchar(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE issues
  ADD CONSTRAINT issues_ibfk_1 FOREIGN KEY (projectid) REFERENCES projects (id) ON UPDATE NO ACTION,
  ADD CONSTRAINT issues_ibfk_2 FOREIGN KEY (memberid) REFERENCES members (id) ON UPDATE NO ACTION;

ALTER TABLE projectmembers
  ADD CONSTRAINT projectmembers_ibfk_1 FOREIGN KEY (projectid) REFERENCES projects (id) ON UPDATE NO ACTION,
  ADD CONSTRAINT projectmembers_ibfk_2 FOREIGN KEY (memberid) REFERENCES members (id) ON UPDATE NO ACTION;


# Insert data
INSERT INTO members SELECT DISTINCT id, name, surname FROM csvmembers;
INSERT INTO projects SELECT DISTINCT id, projectDetails FROM csvprojects;
INSERT INTO projectmembers SELECT DISTINCT p.id, m.id
  FROM members AS m, projects AS p, csvprojects AS cp, csvmembers AS cm
  WHERE cm.projectName = p.id AND m.id = cm.id AND p.id = cp.id;

INSERT INTO issues SELECT DISTINCT issue, p.id, memberName, issueDetails, issueDate, issueType, priority, status
  FROM projects AS p, members AS m, csvprojects AS cp
  WHERE issue NOT LIKE '' AND p.id = cp.id AND m.id = cp.memberName;

# Drop temporary tables
DROP TABLE IF EXISTS csvmembers;
DROP TABLE IF EXISTS csvprojects;
