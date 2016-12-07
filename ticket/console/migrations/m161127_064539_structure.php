<?php

use yii\db\Migration;

class m161127_064539_structure extends Migration
{
    public function up()
    {
$this->execute(" CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL,
  `name_city` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`id`, `name_city`) VALUES
(9, 'Бангкок '),
(5, 'Берлин'),
(2, 'Владивосток'),
(4, 'Лондон'),
(1, 'Москва'),
(8, 'Нижний Новгород'),
(6, 'Новосибирск'),
(3, 'Пекин'),
(7, 'Санкт-Петербург');

-- --------------------------------------------------------

--
-- Структура таблицы `flight`
--

CREATE TABLE IF NOT EXISTS `flight` (
  `id` int(11) NOT NULL,
  `number_flight` char(11) NOT NULL,
  `date_departure` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `departure_city_id` int(11) NOT NULL,
  `arrival_city_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `flight`
--

INSERT INTO `flight` (`id`, `number_flight`, `date_departure`, `status`, `departure_city_id`, `arrival_city_id`) VALUES
(1, '786', '2016-11-16 00:00:00', 1, 2, 1),
(2, '86', '2016-11-16 00:00:00', 1, 4, 2),
(3, 'А21', '2016-11-14 00:00:00', 1, 5, 8),
(4, '112', '2016-11-09 00:00:00', 1, 7, 1),
(5, '22', '2016-11-19 00:00:00', 1, 1, 9),
(6, '671', '2016-11-03 00:00:00', 1, 9, 4),
(7, 'А77', '2016-11-11 00:00:00', 1, 5, 7),
(8, '422', '2016-11-13 00:00:00', 1, 3, 9),
(9, 'Я33', '2016-11-10 00:00:00', 1, 7, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1478920576),
('m130524_201442_init', 1478920599),
('m161127_064539_structure', 1480229288);

-- --------------------------------------------------------

--
-- Структура таблицы `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `date_birth` date NOT NULL,
  `flight_id` int(11) NOT NULL,
  `status_ticket` tinyint(4) NOT NULL DEFAULT '1',
  `phone_number` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ticket`
--

INSERT INTO `ticket` (`id`, `first_name`, `last_name`, `date_birth`, `flight_id`, `status_ticket`, `phone_number`) VALUES
(3, 'Пупина', 'Марина', '1995-03-13', 3, 1, '9536664512'),
(4, 'Варава ', 'Анатолий', '2014-12-10', 1, 1, '9533996541'),
(5, 'Щукин', 'Денис', '2016-04-13', 2, 1, '9529335489'),
(6, 'Егорова ', 'Екатерина', '2016-03-08', 4, 1, '9628574585'),
(7, 'Польских', 'Полина', '2016-01-04', 5, 1, '9514569878'),
(8, 'Лорева', 'Лариса', '2015-11-04', 5, 1, '9523658964'),
(9, 'Русских ', 'Раиса', '2015-11-13', 6, 1, '9136547893'),
(10, 'gtg', 'dfg', '2016-03-12', 1, 1, '9537441123'),
(11, 'gnhg', 'gnfg', '2013-03-12', 1, 1, '9136547896');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name_city` (`name_city`);

--
-- Индексы таблицы `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`id`),
  ADD KEY `number_flight` (`number_flight`),
  ADD KEY `departure_city_id` (`departure_city_id`),
  ADD KEY `arrival_city_id` (`arrival_city_id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flight_id` (`flight_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `flight`
--
ALTER TABLE `flight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `flight`
--
ALTER TABLE `flight`
  ADD CONSTRAINT `flight_ibfk_1` FOREIGN KEY (`departure_city_id`) REFERENCES `city` (`id`),
  ADD CONSTRAINT `flight_ibfk_2` FOREIGN KEY (`arrival_city_id`) REFERENCES `city` (`id`);

--
-- Ограничения внешнего ключа таблицы `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`flight_id`) REFERENCES `flight` (`id`);
");
    }

    public function down()
    {
        echo "m161127_064539_structure cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
