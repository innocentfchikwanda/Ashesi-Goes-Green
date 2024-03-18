DROP DATABASE IF EXISTS AshesiGreen;
CREATE DATABASE AshesiGreen;

-- Table for membership status
CREATE TABLE Membership_status(
	memberId  int(11) NOT NULL,
	member_status varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    
-- putting data into the membership status
INSERT INTO Membership_status (memberId, member_status) VALUES
(1, 'Student'),
(2, 'Faculty'),
(3, 'Visitor');

-- Table for the users
CREATE TABLE Users(
userId int(11) NOT NULL,
roleId int(11) NOT NULL,
fname varchar(50) NOT NULL,
lname varchar(50) NOT NULL,
gender int(11) NOT NULL,
memberId int(11) NOT NULL,
dob date NOT NULL,
email varchar(50) NOT NULL,
tel varchar(20) NOT NULL,
passwd varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table for role
CREATE TABLE Role (
 roleId int(11) NOT NULL,
rname varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- putting data into the role
INSERT INTO Role (roleId, rname) VALUES
(1, 'admin'),
(2, 'standard');

-- Indexes for table `Family_name`
ALTER TABLE Membership_status
ADD PRIMARY KEY (memberId);

-- Indexes for table `People`
ALTER TABLE Users
ADD PRIMARY KEY (userId),
ADD KEY roleId (roleId),
ADD KEY memberId (memberId);

-- Indexes for table `Role`
ALTER TABLE Role
ADD PRIMARY KEY (roleId);

-- AUTO_INCREMENT for table `Family_name`
ALTER TABLE Membership_status
MODIFY memberId int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

-- AUTO_INCREMENT for table `People`
ALTER TABLE Users
MODIFY userId int(11) NOT NULL AUTO_INCREMENT;

-- AUTO_INCREMENT for table `Role`
ALTER TABLE Role
MODIFY roleId int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

-- Constraints for table `People`
--
ALTER TABLE Users
ADD CONSTRAINT `people_ibfk_1` FOREIGN KEY (roleId) REFERENCES Role (roleId) ON
DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `people_ibfk_2` FOREIGN KEY (memberId) REFERENCES Membership_status
(memberId) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



