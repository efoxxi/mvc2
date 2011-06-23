/*
SQLyog Community Edition- MySQL GUI v5.31
Host - 5.0.27-community-nt : Database - skillsauditv20
*********************************************************************
Server version : 5.0.27-community-nt
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `emps` */

DROP TABLE IF EXISTS `emps`;

CREATE TABLE `emps` (
  `strEmployeeId` varchar(6) default NULL,
  `strEmployeeFirstName` varchar(45) default NULL,
  `strEmployeeLastName` varchar(45) default NULL,
  `strDepartmentName` varchar(45) default NULL,
  `intSalary` int(6) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `emps` */

insert  into `emps`(`strEmployeeId`,`strEmployeeFirstName`,`strEmployeeLastName`,`strDepartmentName`,`intSalary`) values ('arnrim','Arnold','Rimmer','Accounting',1235);
insert  into `emps`(`strEmployeeId`,`strEmployeeFirstName`,`strEmployeeLastName`,`strDepartmentName`,`intSalary`) values ('slabar','Slarti','Bartfast','Accounting',4567);
insert  into `emps`(`strEmployeeId`,`strEmployeeFirstName`,`strEmployeeLastName`,`strDepartmentName`,`intSalary`) values ('davlis','Dave','Lister','IT',6789);
insert  into `emps`(`strEmployeeId`,`strEmployeeFirstName`,`strEmployeeLastName`,`strDepartmentName`,`intSalary`) values ('forpre','Ford','Prefect','IT',34567);
insert  into `emps`(`strEmployeeId`,`strEmployeeFirstName`,`strEmployeeLastName`,`strDepartmentName`,`intSalary`) values ('projel','Prostetnic','Jeltz','IT',12345);
insert  into `emps`(`strEmployeeId`,`strEmployeeFirstName`,`strEmployeeLastName`,`strDepartmentName`,`intSalary`) values ('artden','Arthur','Dent','Marketing',76777);
insert  into `emps`(`strEmployeeId`,`strEmployeeFirstName`,`strEmployeeLastName`,`strDepartmentName`,`intSalary`) values ('edwelg','Edward','Elgar','Marketing',88777);
insert  into `emps`(`strEmployeeId`,`strEmployeeFirstName`,`strEmployeeLastName`,`strDepartmentName`,`intSalary`) values ('zapbee','Zaphod','Beeblebrox','Marketing',55666);
insert  into `emps`(`strEmployeeId`,`strEmployeeFirstName`,`strEmployeeLastName`,`strDepartmentName`,`intSalary`) values ('benmou','Benjy','Mouse','Training',44333);
insert  into `emps`(`strEmployeeId`,`strEmployeeFirstName`,`strEmployeeLastName`,`strDepartmentName`,`intSalary`) values ('frahol','Frank','Hollister','Training',33444);
insert  into `emps`(`strEmployeeId`,`strEmployeeFirstName`,`strEmployeeLastName`,`strDepartmentName`,`intSalary`) values ('krikoc','Kristine','Kochanksi','Training',12333);
insert  into `emps`(`strEmployeeId`,`strEmployeeFirstName`,`strEmployeeLastName`,`strDepartmentName`,`intSalary`) values ('olapet','Olaf','Petersen','Training',34777);
insert  into `emps`(`strEmployeeId`,`strEmployeeFirstName`,`strEmployeeLastName`,`strDepartmentName`,`intSalary`) values ('samvim','Sam','Vimes','Training',98555);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
