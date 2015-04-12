use connections;

CREATE TABLE IF NOT EXISTS account
(
  id int AUTO_INCREMENT PRIMARY KEY,
  name varchar(256) NOT NULL,
  dob  date NOT NULL,
  achivements BLOB(2048)
)
