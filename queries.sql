INSERT into content_type
SET name = "Текст", class= "text";
INSERT into content_type
SET name = "Цитата", class= "quote";
INSERT into content_type
SET name = "Картинка", class= "photo";
INSERT into content_type
SET name = "Видео", class= "video";
INSERT into content_type
SET name = "Ссылка", class= "link";

INSERT into user
SET email = "natasha1988@yandex.ru", name = "zvezdochka", password = "qwerty";
INSERT into user
SET email = "nikolai@mail.ru", name = "sunny_nicky", password = "sunny_nicky123", contacts = "Стучите в аську!";
INSERT into user
SET email = "lara-ne-croft@gmail.com", name = "Лариса", password = "lara-ne-croft", avatar = "userpic-larisa-small.jpg";
INSERT into user
SET email = "woooooow@gmail.com", name = "Владик", password = "admin", avatar = "userpic.jpg";
INSERT into user
SET email = "vittorio@rambler.com", name = "Виктор", password = "vittorio", avatar = "userpic-mark.jpg";

INSERT into comment
SET content = "А я вот жду Stranger things!", author_id = 2, post_id = 2;
INSERT into comment
SET content = "Очень интересно", author_id = 1, post_id = 6;
INSERT into comment
SET content = "Волшебно...", author_id = 2, post_id = 6;

INSERT into post
SET creation_date = "2019-08-03", title = "Цитата", content = "Мы в жизни любим только раз, а после ищем лишь похожих", author_id = 3, content_type = 2;
INSERT into post
SET creation_date = "2019-07-07", title = "Игра престолов", content = "Не могу дождаться начала финального сезона своего любимого сериала!", author_id = 4, content_type = 1;
INSERT into post
SET creation_date = "2019-08-01", title = "Наконец, обработал фотки!", content = "Не могу дождаться начала финального сезона своего любимого сериала!", author_id = 5, content_type = 3;
INSERT into post
SET creation_date = "2017-05-15", title = "Моя мечта", content = "coast-medium.jpg", author_id = 3, content_type = 3;
INSERT into post
SET creation_date = "2018-01-12", title = "Лучшие курсы", content = "www.htmlacademy.ru", author_id = 4, content_type = 5;
INSERT into post
SET creation_date = "2019-08-18", title = "Полезный пост про Байкал", content = "Озеро Байкал – огромное древнее озеро в горах Сибири к северу от монгольской границы. Байкал считается самым глубоким озером в мире. Он окружен сетью пешеходных маршрутов, называемых Большой байкальской тропой. Деревня Листвянка, расположенная на западном берегу озера, – популярная отправная точка для летних экскурсий. Зимой здесь можно кататься на коньках и собачьих упряжках.", author_id = 3, content_type = 1;

INSERT into post_like
SET user_id = 2, post_id = 6;
INSERT into post_like
SET user_id = 2, post_id = 4;
INSERT into post_like
SET user_id = 3, post_id = 2;
INSERT into post_like
SET user_id = 3, post_id = 3;
INSERT into post_like
SET user_id = 4, post_id = 3;

SELECT p.title, u.name, c.name as "content_type", COUNT(l.post_id) as "likes"
FROM post as p
JOIN user as u
ON p.author_id = u.id
LEFT JOIN content_type as c
ON p.content_type = c.id
LEFT JOIN post_like as l
ON p.id = l.post_id;

SELECT u.name, p.title, p.content
FROM user as u
JOIN post as p
ON u.id = p.author_id
WHERE u.id = 3;

SELECT c.content, p.title, u.name
FROM comment as c
JOIN post as p
ON c.post_id = p.id
JOIN user as u
ON c.author_id = u.id
WHERE p.id = 6;

INSERT into post_like
SET post_id = 3, user_id = 2;

INSERT into subscription
SET user_id = 2, friend_id = 3;


