-- Ce fichier sert à initialiser la base de données
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `post_date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `posts` (`post_id`, `post_title`, `post_content`, `post_date_create`) VALUES
(1, 'Bienvenue sur le blog de l\'AVBN !', 'Je vous souhaite à toutes et à tous la bienvenue sur le blog qui parlera de... l\'Association de VolleyBall de Nuelly !', '2022-02-17 16:28:41'),
(2, 'L\'AVBN à la conquête du monde !', 'C\'est officiel, le club a annoncé à la radio hier soir \"J\'ai l\'intention de conquérir le monde !\".\r\nIl a en outre précisé que le monde serait à sa botte en moins de temps qu\'il n\'en fallait pour dire \"Association de VolleyBall de Nuelly\". Pas dur, ceci dit entre nous...', '2022-02-17 16:28:42');

ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

/* Table Commentaire */
CREATE TABLE `comments` (
    `comment_id` int (11) NOT NULL,
    `post_id` INT (11) NOT NULL,
    `comment_user` varchar(255) NOT NULL,
    `comment_content` text NOT NULL,
    `comment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `comments` (`comment_id`, `post_id`, `comment_user`, `comment_content`, `comment_date`) VALUES
(1, 1, 'Mathieu', 'Preum\'s', '2022-03-03 13:00:42'),
(2, 1, 'Sam', 'Quelqu\'un a un avis là-dessus ? Je ne sais pas quoi en penser.', '2022-03-03 13:01:42');

ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3