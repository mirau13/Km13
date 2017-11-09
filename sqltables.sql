CREATE TABLE comm (
    commid int(11) not null AUTO_INCREMENT PRIMARY KEY,
    user_id int(11) not null,
    date datetime not null,
    message TEXT not null
);