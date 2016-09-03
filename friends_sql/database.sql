create table contacts (
    id integer PRIMARY KEY AUTO_INCREMENT, 
    name varchar(50) NOT NULL
);

create table friends (
    id integer PRIMARY KEY AUTO_INCREMENT, 
    user_id integer NOT NULL, 
    friend_id integer NOT NULL,
    mutual boolean NOT NULL DEFAULT false
);

insert into contacts (id, name) values
    (1, 'Nikita Kiselev'),
    (2, 'John Doe'),
    (3, 'Vachik Magasyan'),
    (4, 'Vasiliy Pechen'),
    (5, 'Jeffrey Way'),
    (6, 'Taylor Otwell'),
    (7, 'Steve Jobs'),
    (8, 'Jony Ive');

insert into friends (user_id, friend_id, mutual) values
    (1, 3, 0),
    (1, 4, 0),
    (3, 2, 1),
    (4, 2, 0),
    (5, 1, 0),
    (5, 2, 0),
    (5, 3, 0),
    (5, 4, 0),
    (5, 7, 0),
    (5, 8, 0),
    (6, 5, 1);