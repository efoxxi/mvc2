#
# Web Programming 2 PHP/Database Application Assignment
# Last update: 01/07/2011
#
# Mikhail Kotov
# James Zuccon
# Reece Dixon
#

# Cleaning current DB

DROP VIEW IF EXISTS report1;
DROP VIEW IF EXISTS report2;
DROP VIEW IF EXISTS report3;
DROP VIEW IF EXISTS report4;
DROP VIEW IF EXISTS report5;
DROP VIEW IF EXISTS report6;

DROP TABLE IF EXISTS csvmembers;
DROP TABLE IF EXISTS csvprojects;
DROP TABLE IF EXISTS issues;
DROP TABLE IF EXISTS projectmembers;
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
CREATE TABLE projects (
  id varchar(20) NOT NULL,
  details varchar(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE members (
  id varchar(20) NOT NULL,
  name varchar(20) NOT NULL,
  surname varchar(20) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE projectmembers (
  id int(11) NOT NULL AUTO_INCREMENT,
  projectid varchar(20) NOT NULL,
  memberid varchar(20) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY pmunique (projectid,memberid),
  KEY FK_pm1 (projectid),  
  KEY FK_pm2 (memberid),
  CONSTRAINT FK_pm1 FOREIGN KEY (projectid) REFERENCES projects (id) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT FK_pm2 FOREIGN KEY (memberid) REFERENCES members (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE issues (
  id int(11) NOT NULL AUTO_INCREMENT,
  pmid int(11) NOT NULL,
  issue varchar(20) NOT NULL,
  details varchar(255) NOT NULL,
  date date NOT NULL,
  type varchar(20) NOT NULL,
  priority varchar(20) NOT NULL,
  status varchar(20) NOT NULL,
  PRIMARY KEY (id),
  KEY FK_issues (pmid),
  CONSTRAINT FK_issues FOREIGN KEY (pmid) REFERENCES projectmembers (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


# Insert data
INSERT INTO members SELECT DISTINCT id, name, surname FROM csvmembers;
INSERT INTO projects SELECT DISTINCT id, projectDetails FROM csvprojects;
INSERT INTO projectmembers SELECT DISTINCT NULL, p.id, m.id
  FROM members AS m, projects AS p, csvprojects AS cp, csvmembers AS cm
  WHERE cm.projectName = p.id AND m.id = cm.id AND p.id = cp.id;

INSERT INTO issues SELECT DISTINCT NULL, pm.id, issue, issueDetails, issueDate, issueType, priority, status
  FROM projects AS p, members AS m, csvprojects AS cp, projectmembers AS pm
  WHERE issue NOT LIKE '' AND p.id = cp.id AND m.id = cp.memberName AND pm.projectid = p.id AND pm.memberid = m.id;

# Drop temporary tables
#DROP TABLE IF EXISTS csvmembers;
#DROP TABLE IF EXISTS csvprojects;

# Project member reports:
# all project team members, sorted by project name and family name (project name, last name, given name)
CREATE VIEW report1 AS SELECT m.name AS 'First Name',
                              m.surname AS 'Last Name',
                              p.id AS 'Project'
FROM members AS m, projects AS p, projectmembers AS pm
WHERE pm.memberid = m.id AND pm.projectid = p.id ORDER BY p.id, m.surname, m.name;

# all project issues for a selected member (project name, issue short description, type, priority, status) 
CREATE VIEW report2 AS SELECT m.name AS 'First Name',
                              m.surname AS 'Last Name',
                              p.id AS 'Project',
                              i.issue AS 'Issue',
                              i.details AS 'Details',
                              i.type AS 'Type',
                              i.priority AS 'Priority',
                              i.status AS 'Status'
FROM members AS m, projects AS p, issues AS i, projectmembers AS pm
WHERE pm.projectid = p.id AND pm.memberid = m.id AND pm.id = i.pmid AND m.id LIKE 'artden';

# Project issue reports:
# all issues for a selected project (issue short description, issue details, type, priority, status)
CREATE VIEW report3 AS SELECT p.id AS 'Project',
                              i.issue AS 'Issue',
                              i.details AS 'Details',
                              i.type AS 'Type',
                              i.priority AS 'Priority',
                              i.status AS 'Status'
FROM projects AS p, issues AS i, projectmembers AS pm
WHERE pm.projectid = p.id AND pm.id = i.pmid AND p.id LIKE 'Skygen';

# all issues, from all projects, with a selected status, eg all open issues (project name, issue id, issue short description, status)
CREATE VIEW report4 AS SELECT p.id AS 'Project',
                              i.issue AS 'Issue',
                              i.details AS 'Details',
                              i.status AS 'Status'
FROM projects AS p, issues AS i, projectmembers AS pm
WHERE pm.projectid = p.id AND pm.id = i.pmid AND i.status NOT LIKE 'open';

# list of members who are not currently allocated to any open issues
CREATE VIEW report5 AS SELECT m.name AS 'First Name',
                              m.surname AS 'Last Name',
                              i.issue AS 'Issue',
                              i.details AS 'Details',
                              i.status AS 'Status'
FROM projects AS p, issues AS i, members AS m, projectmembers AS pm
WHERE pm.projectid = p.id AND pm.memberid = m.id AND pm.id = i.pmid AND i.status LIKE 'open';

# number of issues which have been resolved in each project
CREATE VIEW report6 AS SELECT COUNT(i.id) AS 'Resolved Issues'
FROM projects AS p, issues AS i, members AS m, projectmembers AS pm
WHERE pm.projectid = p.id AND pm.memberid = m.id AND pm.id = i.pmid AND i.status LIKE 'resolved';
