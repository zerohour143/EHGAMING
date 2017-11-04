use EHgaming;

Create table users(
  uid int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  uname VARCHAR(25) NOT NULL, 
  pass VARCHAR(25) NOT NULL,
  fbname VARCHAR(50),
  skype VARCHAR(50) NOT NULL,
  gmail VARCHAR(50) NOT NULL,
  utype int 
);

Create table games(
	gid int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    uid int,
    FOREIGN KEY(uid) REFERENCES users(uid),
    title VARCHAR(50) NOT NULL,
    details VARCHAR(300) NOT NULL,
    dateAdded TIMESTAMP NOT NULL,
    picture  VARCHAR(50)    
);

Create table services(
	sid int AUTO_INCREMENT PRIMARY KEY,
    serviceName VARCHAR(35) NOT NULL,
    gid int,
    FOREIGN KEY(gid) REFERENCES games(gid),
    price int NOT NULL,
    category VARCHAR(25) NOT NULL,
    details VARCHAR(500) 
);

Create table transactions(
	tid int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	gid int,
	sid int,
	transDate TIMESTAMP,
	status int NOT NULL,
	characterName VARCHAR(35) NOT NULL,
	details VARCHAR(300) NOT NULL,
  ModifiedDate DATETIME NOT NULL,
	FOREIGN KEY(gid) REFERENCES games(gid),
	FOREIGN KEY(sid) REFERENCES services(sid)
);

Create table feedback(
	fid int NOT NULL PRIMARY KEY,
	uid int,
	details VARCHAR(350),
	date TIMESTAMP,
  ModifiedDate DATETIME NOT NULL,
	FOREIGN KEY(uid) REFERENCES users(uid)
);