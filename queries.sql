-- Заполнение таблицы category
INSERT INTO category (`name`, `code`) VALUES ('Доски и лыжи', 'boards');
INSERT INTO category (`name`, `code`) VALUES ('Крепления', 'attachment');
INSERT INTO category (`name`, `code`) VALUES ('Ботинки', 'boots');
INSERT INTO category (`name`, `code`) VALUES ('Одежда', 'clothing');
INSERT INTO category (`name`, `code`) VALUES ('Инструменты', 'tools');
INSERT INTO category (`name`, `code`) VALUES ('Разное', 'other');

-- Заполнение таблицы lot
INSERT INTO lot (`date_add`, `title`, `description`, `image`, `initial_rate`, `date_close`, `rate_step`, `user_id`, `winner_id`, `category_id`)
VALUES ('2019-08-12', '2014 Rossignol District Snowboard', 'Сноуборд', 'img/lot-1.jpg', '10999', '2019-08-12', 100, 1, 2, 1);
INSERT INTO lot (`date_add`, `title`, `description`, `image`, `initial_rate`, `date_close`, `rate_step`, `user_id`, `winner_id`, `category_id`)
VALUES ('2019-08-13', 'DC Ply Mens 2016/2017 Snowboard', 'Сноуборд поновее', 'img/lot-2.jpg', '159999', '2019-08-12', 200, 2, 2, 1);
INSERT INTO lot (`date_add`, `title`, `description`, `image`, `initial_rate`, `date_close`, `rate_step`, `user_id`, `winner_id`, `category_id`)
VALUES ('2019-08-14', 'Крепления Union Contact Pro 2015 года размер L/XL', 'Крепленее для большого размера', 'img/lot-3.jpg', '8000', '2019-08-12', 400, 3, 3, 2);
INSERT INTO lot (`date_add`, `title`, `description`, `image`, `initial_rate`, `date_close`, `rate_step`, `user_id`, `winner_id`, `category_id`)
VALUES ('2019-08-15', 'Ботинки для сноуборда DC Mutiny Charocal', 'Ботинки класной фирмы DC', 'img/lot-4.jpg', '10999', '2019-08-12', 600, 2, 1, 3);
INSERT INTO lot (`date_add`, `title`, `description`, `image`, `initial_rate`, `date_close`, `rate_step`, `user_id`, `winner_id`, `category_id`)
VALUES ('2019-08-15', 'Куртка для сноуборда DC Mutiny Charocal', 'Куртка класной фирмы DC', 'img/lot-5.jpg', '7500', '2019-08-12', 300, 1, 3, 4);
INSERT INTO lot (`date_add`, `title`, `description`, `image`, `initial_rate`, `date_close`, `rate_step`, `user_id`, `winner_id`, `category_id`)
VALUES ('2019-08-15', 'Маска Oakley Canopy', 'Шикарная маска сочитается вообще со всем', 'img/lot-6.jpg', '5400', '2019-08-12', 2000, 1, 2, 6);

-- Заполнение таблицы bet
INSERT INTO bet (`rate`, `user_id`, `lot_id`) VALUES (6000, 2, 6);
INSERT INTO bet (`rate`, `user_id`, `lot_id`) VALUES (7000, 1, 6);
INSERT INTO bet (`rate`, `user_id`, `lot_id`) VALUES (8000, 3, 5);

-- Заполнение таблицы user
INSERT INTO user (`email`, `name`, `password`, `avatar`, `contact`, `lot_id`, `bet_id`) VALUES ('petr@ya.ru', 'Петр', '12345678', 'img/petr.jpg', '89250774779', 6, 2);
INSERT INTO user (`email`, `name`, `password`, `avatar`, `contact`, `lot_id`, `bet_id`) VALUES ('vasya@mail.ru', 'Вася', '12345678', 'img/vasya.jpg', '89250774780', 6, 1);
INSERT INTO user (`email`, `name`, `password`, `avatar`, `contact`, `lot_id`, `bet_id`) VALUES ('egor@gmail.com', 'Егор', '12345678', 'img/egor.jpg', '89250774781', 5, 3);

-- Получить все категории
SELECT * FROM category;
SELECT name FROM category ORDER BY id;

-- Получить все новые лоты
SELECT l.title, l.date_add, l.image, l.initial_rate, c.name FROM lot l JOIN category c ON l.category_id = c.id WHERE (date_add > NOW() - INTERVAL 5 DAY) AND date_close > NOW();

-- Показать лот по его id + category
SELECT l.*, c.name FROM lot l JOIN category c ON l.category_id = c.id WHERE l.id = 5;

-- Обновить название лота по его идентификатору;
UPDATE lot SET title = 'Маска Oakley Canopy fix 2' WHERE id = 6;

-- Получить список ставок с сортировкой
SELECT b.* FROM lot l JOIN bet b ON b.lot_id = l.id WHERE l.id = 6 ORDER BY b.date_add;