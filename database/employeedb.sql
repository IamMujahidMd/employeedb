SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `userdata` (
  `id` int(11) NOT NULL,
  `FullName` varchar(200) DEFAULT NULL,
  `UserName` varchar(12) DEFAULT NULL,
  `UserEmail` varchar(200) DEFAULT NULL,
  `UserMobileNumber` varchar(10) DEFAULT NULL,
  `LoginPassword` varchar(255) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `userdata` (`id`, `FullName`, `UserName`, `UserEmail`, `UserMobileNumber`, `LoginPassword`, `RegDate`) VALUES
(1, 'Anuj kumar', 'anujk30', 'anuj@gmail.com', '8285723658', 'c1337889a5edf8dd4db7173a84741863', '2018-03-27 09:24:56'),
(6, 'uytuyt', 'ewewqeqw', 'tgrinfo.biz@gmail.com', '0987301857', '81dc9bdb52d04dc20036dbd8313ed055', '2018-03-27 10:34:22');

ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `userdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

