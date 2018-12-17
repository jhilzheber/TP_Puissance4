CREATE TABLE player (
                        identifier int unsigned auto_increment primary key,
                        pseudo varchar(255) not null,
                        statute enum('inlive', 'dead') not null,
                        team_id int not null,
                        constraint team_player_id_fk foreign key (team_id) references pawn (identifier)
);

CREATE TABLE pawn (
                        identifier int unsigned auto_increment primary key,
                        position_id int,
                        name_id int not null,
                        constraint position_pawn_id_fk foreign key (position_id) references position (identifier),
                        constraint color_pawn_id_fk foreign key (name_id) references team (identifier)
);

CREATE TABLE team (
                        identifier int unsigned auto_increment primary key,
                        color enum('red', 'yellow') not null
);

CREATE TABLE position (
                        identifier int unsigned auto_increment primary key,
                        positionX_id int,
                        positionY_id int,
                        constraint positionX_position_id_fk foreign key (positionX_id) references positionX (identifier),
                        constraint positionY_position_id_fk foreign key (positionY_id) references positionY (identifier)
);

CREATE TABLE positionX (
                        identifier int unsigned auto_increment primary key,
                        positionX int
);

CREATE TABLE positionY (
                        identifier int unsigned auto_increment primary key,
                        positionY int
);

INSERT INTO player (identifier, pseudo, statute, team_id) VALUES
(1, 'Hynaya', 'inlive', 1),
(2, 'Marcel', 'inlive', 1),
(3, 'Bidule', 'dead', 1),
(4, 'Truc', 'inlive', 2),
(5, 'Pupuce', 'dead', 2),
(6, 'Machin', 'inlive', 2);

INSERT INTO pawn (identifier, position_id, name_id) VALUES
  (1, 1, 1),
  (2, 2, 1),
  (3, 3, 1),
  (4, 4, 2),
  (5, 5, 2),
  (6, 6, 2);

INSERT INTO team (identifier,color) VALUES
(1, 'red'),
(2, 'yellow');

INSERT INTO position (identifier, positionX_id, positionY_id) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 6),
(7, 7, 1);

INSERT INTO positionX (identifier, positionX) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4,'4'),
(5, '5'),
(6, '6'),
(7, '7');

INSERT INTO positionY (identifier, positionY) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6');