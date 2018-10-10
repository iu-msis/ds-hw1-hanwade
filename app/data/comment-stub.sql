DROP TABLE IF EXISTS Comment;

CREATE TABLE Comment (
  id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  comment NOT NULL
);

INSERT INTO Comment(id, comment)
             VALUES(1, "I have something important to say");
INSERT INTO Comment(id, comment)
             VALUES(2, "D&S is awesome");
INSERT INTO Comment(id, comment)
             VALUES(3, "It is incredibly late");
INSERT INTO Comment(id, comment)
             VALUES(4, "I should have started this earlier");
INSERT INTO Comment(id, comment)
             VALUES(5, "I have an interview tomorrow")
INSERT INTO Comment(id, comment)
             VALUES(6, "I should get some sleep");
