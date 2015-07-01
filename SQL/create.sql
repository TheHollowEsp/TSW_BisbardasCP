USE cakephp;
DROP TABLE IF EXISTS users,friendship,posts,likes;

CREATE TABLE users (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(15),
    email VARCHAR(50),
    password VARCHAR(255),
    registered DATETIME DEFAULT NULL,
    img VARCHAR(255)
);

CREATE TABLE friendship (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user INT UNSIGNED,
    friend INT UNSIGNED,
    userStatus VARCHAR(10) DEFAULT 'accepted',
    friendStatus VARCHAR(10) DEFAULT 'pending',
    FOREIGN KEY (user) 
        REFERENCES users(id)
        ON DELETE CASCADE,
	FOREIGN KEY (friend) 
        REFERENCES users(id)
        ON DELETE CASCADE
);

CREATE TABLE posts (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	parent_id INT UNSIGNED,
    title VARCHAR(50) NOT NULL,
    body TEXT NOT NULL,
    author INT UNSIGNED,
    imgPath VARCHAR(250) DEFAULT NULL,
    created DATETIME DEFAULT NULL,
    likes SMALLINT DEFAULT NULL,
    FOREIGN KEY (parent_id) 
        REFERENCES posts(id)
        ON DELETE CASCADE,
	FOREIGN KEY (author) 
        REFERENCES users(id)
        ON DELETE CASCADE

);



CREATE TABLE likes (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    post_id INT UNSIGNED,
    author INT UNSIGNED,
    FOREIGN KEY (post_id) 
        REFERENCES posts(id)
        ON DELETE CASCADE,
	FOREIGN KEY (author) 
        REFERENCES users(id)
        ON DELETE CASCADE
);

INSERT INTO users VALUES (NULL,'hrlopez','riopedre2001@gmail.com',SHA2('241193', 256),NOW(),NULL);
INSERT INTO users VALUES (NULL,'johndoe','riopedre2002@gmail.com',SHA2('241194', 256),NOW(),NULL);
INSERT INTO posts VALUES (NULL,NULL,'Presentacion','Esto es un post inicial',1,NULL,NOW(),'1');
INSERT INTO friendship VALUES (NULL,1,2,'accepted','accepted');
INSERT INTO likes VALUES (NULL,1,2);