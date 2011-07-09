# Project member reports:
# all project team members, sorted by project name and family name (project name, last name, given name)
CREATE VIEW report1 AS SELECT m.name, m.surname, p.id AS projectname FROM members AS m, projects AS p, projectmembers AS pm
WHERE pm.memberid = m.id AND pm.projectid = p.id ORDER BY p.id, m.surname, m.name;

# all project issues for a selected member (project name, issue short description, type, priority, status) 
CREATE VIEW report2 AS SELECT m.name, m.surname, p.id AS projectname, i.issue, i.details, i.type, i.priority, i.status FROM members AS m, projects AS p, issues AS i, projectmembers AS pm
WHERE pm.projectid = p.id AND pm.memberid = m.id AND pm.id = i.pmid AND m.id LIKE 'artden';

# Project issue reports:
# all issues for a selected project (issue short description, issue details, type, priority, status)
CREATE VIEW report3 AS SELECT p.id AS projectname, i.issue, i.details, i.type, i.priority, i.status FROM projects AS p, issues AS i, projectmembers AS pm
WHERE pm.projectid = p.id AND pm.id = i.pmid AND p.id LIKE 'Skygen';

# all issues, from all projects, with a selected status, eg all open issues (project name, issue id, issue short description, status)
CREATE VIEW report4 AS SELECT p.id AS projectname, i.issue, i.details, i.status FROM projects AS p, issues AS i, projectmembers AS pm
WHERE pm.projectid = p.id AND pm.id = i.pmid AND i.status NOT LIKE 'open';

# list of members who are not currently allocated to any open issues
CREATE VIEW report5 AS SELECT m.name, m.surname, i.issue, i.details, i.status FROM projects AS p, issues AS i, members AS m, projectmembers AS pm
WHERE pm.projectid = p.id AND pm.memberid = m.id AND pm.id = i.pmid AND i.status LIKE 'open';

# number of issues which have been resolved in each project
CREATE VIEW report6 AS SELECT COUNT(i.id) FROM projects AS p, issues AS i, members AS m, projectmembers AS pm
WHERE pm.projectid = p.id AND pm.memberid = m.id AND pm.id = i.pmid AND i.status LIKE 'resolved';
