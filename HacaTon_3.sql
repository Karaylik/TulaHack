-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 28 2024 г., 11:12
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `HacaTon`
--

-- --------------------------------------------------------

--
-- Структура таблицы `aplic`
--

CREATE TABLE `aplic` (
  `id` int NOT NULL,
  `NameOrg` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `Phone` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `Email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `info` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `Adress` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `aplic`
--

INSERT INTO `aplic` (`id`, `NameOrg`, `Phone`, `Email`, `info`, `Adress`) VALUES
(1, 'Суши Ёби-Доёби', '880005553535', 'exmp@email.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'ул.Прокудина дом 8, кв.21');

-- --------------------------------------------------------

--
-- Структура таблицы `Orders`
--

CREATE TABLE `Orders` (
  `id` int NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `Time` time NOT NULL,
  `Date` date NOT NULL,
  `person` int NOT NULL,
  `RestId` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `Orders`
--

INSERT INTO `Orders` (`id`, `UserEmail`, `Time`, `Date`, `person`, `RestId`) VALUES
(2, 'OverMape', '03:17:00', '2024-04-02', 3, 1),
(3, 'OverMape', '17:21:00', '2024-04-28', 3, 1),
(4, 'OverMape', '12:21:00', '2024-05-01', 4, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `rest`
--

CREATE TABLE `rest` (
  `id` int NOT NULL,
  `NameRest` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `AdressRest` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Kitch` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Img` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `rest`
--

INSERT INTO `rest` (`id`, `NameRest`, `AdressRest`, `Kitch`, `Img`) VALUES
(1, 'Атмосфера', 'ул. Ленина, д. 10, Тула', 'Русская', 'img1.jpg'),
(2, 'Лесной Ручей', 'пр. Ленинского Комсомола, д. 25, Тула', 'Европейская', 'img2.jpg'),
(3, 'Мясной Рай', 'ул. Кирова, д. 15, Тула', 'Гриль', 'img3.jpg'),
(4, 'Лавка Сладостей', 'ул. Советская, д. 5, Тула', 'Десерты и кафе', 'img4.jpg'),
(5, 'Пиццерия Веселая Фамилия', 'пр. Ленина, д. 45, Тула', 'Итальянская', 'img5.jpg'),
(6, 'Суши-Бар Сакура', 'ул. Гоголя, д. 20, Тула', 'Японская', 'img6.jpg'),
(7, 'Кафе Прованс', 'ул. Пушкина, д. 30, Тула', 'Французская', 'img7.jpg'),
(8, 'Трактир У Василия', 'ул. Красноармейская, д. 55, Тула', 'Домашняя русская', 'img8.jpg'),
(9, 'Гурман', 'пр. Кирова, д. 12, Тула', 'Международная', 'img9.jpg'),
(10, 'Мексиканская Сенсация', 'ул. Октябрьская, д. 8, Тула', 'Мексиканская', 'img10.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `rest_full`
--

CREATE TABLE `rest_full` (
  `id` int NOT NULL,
  `NameRest` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `AdressRest` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Kitch` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Img` json DEFAULT NULL,
  `About` longtext
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `rest_full`
--

INSERT INTO `rest_full` (`id`, `NameRest`, `AdressRest`, `Kitch`, `Img`, `About`) VALUES
(1, 'Атмосфера', 'ул. Ленина, д. 10, Тула', 'Русская', '{\"1\": \"img1.jpg\", \"2\": \"img2.jpg\", \"3\": \"img3.jpg\", \"4\": \"img4.jpg\", \"5\": \"img5.jpg\", \"6\": \"img6.jpg\"}', 'Уютный уголок с изысканной кухней и внимательным сервисом. Место, где каждый вкус найдет свое отражение в бесподобных блюдах. Элегантный ресторан с панорамным видом на городской центр.'),
(2, 'Лесной Ручей', 'пр. Ленинского Комсомола, д. 25, Тула', 'Европейская', '{\"1\": \"img7.jpg\", \"2\": \"img8.jpg\", \"3\": \"img9.jpg\", \"4\": \"img10.jpg\", \"5\": \"img11.jpg\", \"6\": \"img12.jpg\"}', 'Веселое место для радостных встреч и уютных ужинов.\nСовременный ресторан с эклектичным меню и авторским подходом к приготовлению блюд.\nОазис для гурманов, где каждый ингредиент ценится по достоинству.'),
(3, 'Мясной Рай', 'ул. Кирова, д. 15, Тула', 'Гриль', '{\"1\": \"img13.jpg\", \"2\": \"img14.jpg\", \"3\": \"img15.jpg\", \"4\": \"img16.jpg\", \"5\": \"img17.jpg\", \"6\": \"img18.jpg\"}', 'Аутентичное заведение с насыщенными вкусами и традиционными рецептами.\nКулинарное путешествие в мир разнообразных вкусов и ароматов.\nРесторан-концепт, где даже самый требовательный гурман будет в восторге от кулинарных экспериментов.'),
(4, 'Лавка Сладостей', 'ул. Советская, д. 5, Тула', 'Десерты и кафе', '{\"1\": \"img19.jpg\", \"2\": \"img20.jpg\", \"3\": \"img21.jpg\", \"4\": \"img22.jpg\", \"5\": \"img23.jpg\", \"6\": \"img24.jpg\"}', 'Аутентичное заведение с насыщенными вкусами и традиционными рецептами.\nКулинарное путешествие в мир разнообразных вкусов и ароматов.\nРесторан-концепт, где даже самый требовательный гурман будет в восторге от кулинарных экспериментов.'),
(5, 'Пиццерия Веселая Фамилия', 'пр. Ленина, д. 45, Тула', 'Итальянская', '{\"1\": \"img25.jpg\", \"2\": \"img26.jpg\", \"3\": \"img27.jpg\", \"4\": \"img28.jpg\", \"5\": \"img29.jpg\", \"6\": \"img30.jpg\"}', 'Ресторан \"Пиццерия Веселая Фамилия\" приглашает вас на настоящее кулинарное путешествие, где каждое блюдо наполнено волшебством восточных специй. Уютная атмосфера и внимательный персонал создадут незабываемый опыт для ваших чувств.'),
(6, 'Суши-Бар Сакура', 'ул. Гоголя, д. 20, Тула', 'Японская', '{\"1\": \"img31.jpg\", \"2\": \"img32.jpg\", \"3\": \"img33.jpg\", \"4\": \"img34.jpg\", \"5\": \"img35.jpg\", \"6\": \"img36.jpg\"}', 'В ресторане \"Суши-Бар Сакура\" вы окунетесь в атмосферу старого Сицилийского дворца, где готовят исключительно по традиционным семейным рецептам. Каждое блюдо наполнено щедростью и чувством, помогая вам почувствовать абсолютное удовольствие от еды.'),
(7, 'Кафе Прованс', 'ул. Пушкина, д. 30, Тула', 'Французская', '{\"1\": \"img43.jpg\", \"2\": \"img44.jpg\", \"3\": \"img45.jpg\", \"4\": \"img46.jpg\", \"5\": \"img47.jpg\", \"6\": \"img48.jpg\"}', 'Кафе \"Прованс\" - это уютное место, где каждое блюдо приготовлено из натуральных и экологически чистых ингредиентов. Здесь вы насладитесь свежестью и натуральностью каждого блюда, словно проведя день в гармонии с природой.'),
(8, 'Трактир У Василия', 'ул. Красноармейская, д. 55, Тула', 'Домашняя русская', '{\"1\": \"img49.jpg\", \"2\": \"img50.jpg\", \"3\": \"img51.jpg\", \"4\": \"img52.jpg\", \"5\": \"img53.jpg\", \"6\": \"img54.jpg\"}', 'В ресторане \"Трактир У Василия\" вы окунетесь в мир страстей и чувственности итальянской кухни. Изысканные блюда, отличное вино и атмосфера истинного уюта сделают ваш вечер особенным и незабываемым.'),
(9, 'Гурман', 'пр. Кирова, д. 12, Тула', 'Международная', '{\"1\": \"img55.jpg\", \"2\": \"img56.jpg\", \"3\": \"img57.jpg\", \"4\": \"img58.jpg\", \"5\": \"img59.jpg\", \"6\": \"img60.jpg\"}', 'Ресторан \"Гурман\" предлагает вам погрузиться в волшебный мир вкусов и ароматов, где каждое блюдо из местных продуктов — настоящее произведение искусства. Отличная кухня, уютная обстановка и радушный прием гарантированы.'),
(10, 'Мексиканская Сенсация', 'ул. Октябрьская, д. 8, Тула', 'Мексиканская', '{\"1\": \"img61.jpg\", \"2\": \"img62.jpg\", \"3\": \"img63.jpg\", \"4\": \"img64.jpg\", \"5\": \"img65.jpg\", \"6\": \"img66.jpg\"}', 'Ресторан \"Мексиканская Сенсация\" приглашает вас на ужин в атмосферу моря и приключений, где каждое блюдо носит в себе вкус и аромат свежих морепродуктов. Побалуйте себя изысканными угощениями и насладитесь приятной атмосферой прибрежного ресторана.');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `login` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `pass` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `SecondName` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `patronymic` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `PhoneNumber` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `name`, `pass`, `SecondName`, `patronymic`, `PhoneNumber`, `Email`) VALUES
(7, 'OverMape', 'Игорь', '202cb962ac59075b964b07152d234b70', 'Сафронов', 'Игорь Сафронов', '7 953 189-79-53', NULL),
(8, 'ллл', 'Миша', '202cb962ac59075b964b07152d234b70', 'Сим', 'Хуй', '888', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `aplic`
--
ALTER TABLE `aplic`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rest`
--
ALTER TABLE `rest`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rest_full`
--
ALTER TABLE `rest_full`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `aplic`
--
ALTER TABLE `aplic`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `Orders`
--
ALTER TABLE `Orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `rest`
--
ALTER TABLE `rest`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `rest_full`
--
ALTER TABLE `rest_full`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
