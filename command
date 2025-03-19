-- Insertion de plusieurs utilisateurs
INSERT INTO `user` (firstname, lastname, username, display_name, email, password, birthdate, creation_date) VALUES
('Alice', 'Dupont', 'alice_d', 'Alice', 'alice@example.com', 'f6a2b505c7822dca5c782d7481777bb99959c2d2', '1995-04-12', CURDATE()),
('Bob', 'Martin', 'bob_m', 'Bob', 'bob@example.com', 'f6a2b505c7822dca5c782d7481777bb99959c2d2', '1990-07-24', CURDATE()),
('Charlie', 'Lemoine', 'charlie_l', 'Charlie', 'charlie@example.com', 'f6a2b505c7822dca5c782d7481777bb99959c2d2', '1988-11-15', CURDATE());

-- Insertion de plusieurs tweets

INSERT INTO tweet (id_user, content, creation_date) VALUES 
(1, 'Mon premier tweet !', '2025-02-19 19:15:00'),
(1, "Quelq'un d'autre est fan de SQL ici ?", NOW()),
(2, 'Hello Twitter !', NOW()),
(2, "Le soleil brille aujourd'hui ☀️", NOW()),
(3, "Je teste cette plateforme, qui d'autre est nouveau ici ?", NOW());

-- Insertion de relations follow (Alice suit Bob et Charlie)
INSERT INTO `follow` (id_user_follow, id_user_followed) VALUES
(1, 2), (1, 3);

-- Insertion de likes (Alice aime un tweet de Bob)
INSERT INTO `likes` (id_user, id_tweet) VALUES (1, 3);

-- Insertion de retweets (Charlie retweete un tweet d'Alice)
INSERT INTO `retweet` (id_user, id_tweet, creation_date) VALUES
(3, 1, NOW());

-- Insertion d'un hashtag
INSERT INTO `hashtag` (name) VALUES ('#SQLRocks');


INSERT INTO tweet (id_user, content, creation_date, NSFW)
VALUES
    (1, 'Mon premier tweet !', '2025-02-10 13:15:00', false),
    (1, "Quelqu'un d'autre est fan de SQL ici ?", NOW(), true),
    (1, 'Hello Twitter !', NOW(), false),
    (1, "Le soleil brille aujourd'hui ☀️", NOW(), false),
    (1, "Je teste cette plateforme, qui d'autre est nouveau ici ?", NOW(), false);

SELECT id,role,firstname,lastname,username,display_name,email,password,birthdate FROM user;

UPDATE user SET display_name= 'Rosyiepie🍓' WHERE id = 1;

-- follow
INSERT INTO follow (id_user_follow, id_user_followed) VALUES ('6', '3');

INSERT INTO user (biography) VALUES ('Winx club || One piece') WHERE username = 'bibi123';



UPDATE user SET biography = "Binu avec un cœur d'artichaut ☀️🍓" WHERE id = 6;
-- voir les followed
SELECT user.username FROM user JOIN follow ON user.id = follow.id_user_followed WHERE id_user_followed = 2;
UPDATE user SET biography = "J'adore faire la fête et les cupcakes ! Loror temr, perferendis? Monster hign", city = 'Guadeloupe' WHERE id = 2;

UPDATE user SET display_name = "Cupcak3_h1gn☀️🍓" WHERE id = 2;

-- voir les followed
SELECT user.username,follow.id_user_followed  FROM user JOIN follow ON user.id = follow.id_user_followed WHERE id_user_followed = 2;


INSERT INTO likes (id_user, id_tweet) VALUES ('1', '18');


UPDATE tweet SET content = "Rafayel's upcoming birthday and will start tomorrow around 12 pm my time (UTC+1)!!! Friday Pookie's 🫡☀️" WHERE id = 10;

UPDATE tweet SET content = 'Mon etat actu : 🙂🙃🫠😉😊😇🥰', creation_date = default  WHERE id_user = 10;



SELECT YEAR(creation_date) AS year, MONTHNAME(creation_date) AS month FROM user;

SELECT CONCAT(MONTHNAME(creation_date), ' ', YEAR(creation_date)) AS affichage_nom FROM user;
INSERT


INSERT INTO tweet(content, id_user) VALUES ("Expresso SABRINA 'My gives a shit are on vacations~'");

INSERT INTO tweet(content, id_user) VALUES ("J'adore faire la fête et les cupcakes !~ #rose #winx'", 3);


INSERT INTO tweet(content, id_user) VALUES ("Expresso SABRINA 'My gives a shit are on vacations !~ #Kandiss #candace", 34);


DELETE FROM tweet WHERE content = "Rafayel's upcoming birthday and will start tomorrow around 12 pm my time (UTC+1)!!! Friday Pookie's 🫡☀️";
DELETE FROM tweet WHERE content = "The artist way";




INSERT INTO `bookmark` (id_user, id_tweet) VALUES (10, 25);



SELECT * FROM bookmark JOIN user ON user.id = bookmark.id_user JOIN tweet ON tweet.id = bookmark.id_tweet;



SELECT genre.name AS 'Genre', COUNT(movie.title) AS 'Nombre de films' 
FROM movie_genre 
JOIN genre ON genre.id = movie_genre.id_genre 
JOIN movie ON movie_genre.id_movie = movie.id 
GROUP BY genre.name;




REPONSE:
INSERT INTO tweet (id_user, reply_to, content, creation_date)
VALUES (?, ?, 'Mon avis sur ce tweet !', NOW());

DELETE FROM bookmark WHERE id_user = 10;

