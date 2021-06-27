-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- ホスト: mysql1036.db.sakura.ne.jp
-- 生成日時: 2021 年 6 月 27 日 09:32
-- サーバのバージョン： 5.7.32-log
-- PHP のバージョン: 7.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `goldcat587_arsenal_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `arsenal_member_table`
--

CREATE TABLE `arsenal_member_table` (
  `id` int(11) NOT NULL,
  `number` tinyint(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `country` varchar(3) NOT NULL,
  `birth` date NOT NULL,
  `age` tinyint(2) NOT NULL,
  `position` varchar(16) NOT NULL,
  `value` varchar(16) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `arsenal_member_table`
--

INSERT INTO `arsenal_member_table` (`id`, `number`, `name`, `country`, `birth`, `age`, `position`, `value`, `comment`) VALUES
(1, 1, 'B.Leno', 'GER', '1992-05-04', 29, 'FW', '2200', 'ユーロ2020　ドイツ代表メンバー'),
(2, 1, 'B.Leno', 'GER', '1992-05-04', 29, 'GK', '2200', 'ユーロ2020　ドイツ代表メンバー');

-- --------------------------------------------------------

--
-- テーブルの構造 `arsenal_transfer_table`
--

CREATE TABLE `arsenal_transfer_table` (
  `id` int(11) NOT NULL,
  `indate` date NOT NULL,
  `name` varchar(64) NOT NULL,
  `birth` date NOT NULL,
  `age` tinyint(2) NOT NULL,
  `country` varchar(3) NOT NULL,
  `position` varchar(10) NOT NULL,
  `value` int(12) NOT NULL,
  `comment` text NOT NULL,
  `like` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `arsenal_transfer_table`
--

INSERT INTO `arsenal_transfer_table` (`id`, `indate`, `name`, `birth`, `age`, `country`, `position`, `value`, `comment`, `like`) VALUES
(1, '2021-06-26', 'B.White', '1997-10-08', 23, 'ENG', 'FW', 4500, 'ユーロ2021　イングランド代表', 0),
(2, '2021-06-26', 'B.White', '1997-10-08', 23, 'ENG', 'DF', 4500, 'ユーロ2021　イングランド代表', 0),
(3, '2021-06-26', 'B.White', '1997-10-08', 23, 'ENG', 'DF', 4500, 'ユーロ2020　イングランド代表', 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `arsenal_member_table`
--
ALTER TABLE `arsenal_member_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `arsenal_transfer_table`
--
ALTER TABLE `arsenal_transfer_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `arsenal_member_table`
--
ALTER TABLE `arsenal_member_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- テーブルのAUTO_INCREMENT `arsenal_transfer_table`
--
ALTER TABLE `arsenal_transfer_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
