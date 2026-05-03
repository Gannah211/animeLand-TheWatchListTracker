-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 23, 2026 at 11:21 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anime_land`
--

-- --------------------------------------------------------

--
-- Table structure for table `anime`
--

CREATE TABLE `anime` (
  `id` int NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `img_url` varchar(1000) NOT NULL,
  `anime_url` varchar(1000) NOT NULL,
  `num_of_episodes` int NOT NULL,
  `num_of__seasons` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `anime`
--

INSERT INTO `anime` (`id`, `title`, `description`, `img_url`, `anime_url`, `num_of_episodes`, `num_of__seasons`) VALUES
(1, 'Hunter x Hunter', 'Hunter × Hunter is an adventure anime about a young boy named Gon Freecss who sets out to become a Hunter—a licensed elite who takes on dangerous missions—in hopes of finding his missing father. Along the way, he forms close friendships, faces powerful enemies, and uncovers a much darker and complex world than he expected.', 'https://img1.ak.crunchyroll.com/i/spire3/cbb55a6382682bf71e91f685c6473c5a1487736090_full.jpg', 'https://www.crunchyroll.com/hunter-x-hunter', 148, 6),
(2, 'Naruto', 'Naruto follows Naruto Uzumaki, a young ninja with a sealed fox spirit inside him, who dreams of becoming the strongest ninja and earning the title of Hokage. Despite being rejected by others, he grows through hard work, friendships, and battles, proving his worth and protecting his village.', 'https://img1.ak.crunchyroll.com/i/spire2/0145388e3ecfdb5a63ce1e9feaeef44a1279141923_full.jpg', 'https://www.crunchyroll.com/naruto', 220, 5),
(3, 'One Piece', 'One Piece follows Monkey D. Luffy, a carefree pirate with rubber powers who sets sail to find the legendary treasure “One Piece” and become the Pirate King. Along the journey, he builds a loyal crew, explores vast seas, and takes on powerful enemies while chasing freedom and adventure.', 'https://img1.ak.crunchyroll.com/i/spire4/8056a82e973dde98ebb82abd39dc69731564519729_full.jpg', 'https://www.crunchyroll.com/one-piece', 1135, 20),
(4, 'Attack On Titans', 'Attack on Titan follows Eren Yeager, a young man living in a world where humanity hides behind massive walls to survive giant humanoid creatures called Titans. After a tragic loss, he joins the military to fight them, uncovering shocking truths about the world, freedom, and the cost of war.', 'https://img1.ak.crunchyroll.com/i/spire1/13b484b48acc14537703fbc505b087121558560482_full.jpg', 'https://www.crunchyroll.com/attack-on-titan', 60, 4),
(5, 'Dragon Ball Super', 'Dragon Ball follows Goku, a powerful and pure-hearted fighter who constantly trains to become stronger and protect Earth. The story revolves around epic battles, martial arts, and the search for the mystical Dragon Balls, which can summon a dragon to grant any wish.', 'https://img1.ak.crunchyroll.com/i/spire3/98ea4207e23a2ea3e3af39ad641d88001533322009_full.jpg', 'https://www.crunchyroll.com/dragon-ball-super', 131, 5),
(6, 'Demon Slayer', 'Demon Slayer: Kimetsu no Yaiba follows Tanjiro Kamado, a kind-hearted boy who becomes a demon slayer after his family is slaughtered and his sister is turned into a demon. He sets out on a journey to avenge his family and find a cure, facing powerful demons while holding onto his compassion and humanity.', 'https://img1.ak.crunchyroll.com/i/spire3/f1fe5c7a43cb2f38f4152a58f89479821554508873_full.jpg', 'https://www.crunchyroll.com/demon-slayer-kimetsu-no-yaiba', 26, 4),
(7, 'Swords Art Online', 'Sword Art Online follows Kirito, a skilled gamer trapped inside a virtual reality MMORPG where dying in the game means dying in real life. He fights to survive, clear all levels, and escape, forming bonds and facing dangerous challenges along the way.', 'https://img1.ak.crunchyroll.com/i/spire1/1695b24f123889418228be89e00b9a0d1570828158_full.jpg', 'https://www.crunchyroll.com/sword-art-online', 89, 3),
(8, 'Death Note', 'Death Note follows Light Yagami, a brilliant student who discovers a supernatural notebook that can kill anyone whose name is written in it. As he tries to create a “perfect world,” a mysterious detective known as L begins a tense battle of wits to stop him.', 'https://m.media-amazon.com/images/M/MV5BYTgyZDhmMTEtZDFhNi00MTc4LTg3NjUtYWJlNGE5Mzk2NzMxXkEyXkFqcGc@._V1_.jpg', 'https://www.crunchyroll.com/death-note-drama', 37, 1),
(9, 'Bleach', 'Bleach follows Ichigo Kurosaki, a teenager who gains the powers of a Soul Reaper—a warrior who protects the living world from evil spirits called Hollows. As he battles powerful enemies, he uncovers deeper secrets about the spirit world and his own mysterious powers.', 'https://img1.ak.crunchyroll.com/i/spire2/52edb7a843abacb4ff0f642c8eda14401325114125_full.jpg', 'https://www.crunchyroll.com/bleach', 366, 16),
(10, 'Spy x Family', 'Spy × Family is a comedy-action anime about a spy, an assassin, and a telepath who form a fake family—without knowing each other’s secrets.', 'https://static.wikia.nocookie.net/spy-x-family9171/images/7/76/SPY_x_FAMILY_Key_Visual_1.png/revision/latest/scale-to-width-down/1000?cb=20220306150609', 'https://www.crunchyroll.com/series/G4PH0WXVJ/spy-x-family', 37, 2),
(11, 'Yu-Gi-Oh', 'Yu-Gi-Oh! follows Yugi Muto, a shy boy who solves an ancient puzzle and awakens a powerful spirit within him. Together, they take on high-stakes card duels where strategy, courage, and the “heart of the cards” decide the outcome.', 'https://img1.ak.crunchyroll.com/i/spire1/837409ac43551c978dd2978d3a55f92a1415999996_full.jpg', 'https://www.crunchyroll.com/yu-gi-oh', 244, 5),
(12, 'Re:ZERO -Starting Life in Another World', 'Re:ZERO -Starting Life in Another World is a dark isekai where Subaru Natsuki gets transported to another world and gains the ability to return to a past point every time he dies.', 'https://img1.ak.crunchyroll.com/i/spire2/4ea073a64ebabedc9a2d2d690659c8c01579337678_full.jpg', 'https://www.crunchyroll.com/rezero-starting-life-in-another-world-', 63, 2),
(13, 'Jujutsu Kaisen', 'Jujutsu Kaisen is a dark action anime about Yuji Itadori, a normal student who becomes involved in the world of curses after swallowing a powerful cursed object.', 'https://static.wikia.nocookie.net/jujutsu-kaisen/images/8/88/Anime_Key_Visual_2.png/revision/latest/scale-to-width-down/1000?cb=20201212034001', 'https://www.crunchyroll.com/series/GRDV0019R/jujutsu-kaisen', 47, 3),
(14, 'Chainsaw Man', 'Chainsaw Man is a dark action anime about Denji, a poor boy who merges with his pet devil and gains the ability to turn parts of his body into chainsaws.', 'https://static.wikia.nocookie.net/chainsaw-man/images/e/ec/Chainsaw_Man_TV_Anime_Key_Visual_2.png/revision/latest/scale-to-width-down/1000?cb=20251221082749', 'https://www.crunchyroll.com/chainsaw-man', 12, 1),
(15, 'Beyond Journey\'s End', 'Frieren: Beyond Journey\'s End is a fantasy anime about Frieren, an elf mage who outlives her former hero party after they defeat the Demon King.', 'https://static.wikia.nocookie.net/frieren/images/7/75/Season_1_key_visual.png/revision/latest?cb=20231210232211', 'https://www.crunchyroll.com/series/GG5H5XQX4/frieren-beyond-journeys-end', 28, 1),
(16, '11eyes', '11eyes is a dark fantasy story about Kakeru Satsuki, a boy who suddenly gets trapped in a mysterious alternate world called the “Red Night.” Along with others who share special powers, he must fight dangerous creatures and uncover the truth behind their fate while trying to return to their normal world.', 'https://img1.ak.crunchyroll.com/i/spire2/1b95d5f8110840d5b1ab4c93a669d1641423696225_full.jpg', 'https://www.crunchyroll.com/11eyes', 37, 1),
(17, 'Pokemon', 'Pokémon follows Ash Ketchum, a young trainer who travels the world with his partner Pikachu to catch Pokémon, battle other trainers, and aim to become a Pokémon Master. Along the journey, he makes friends, faces rivals, and explores different regions filled with unique creatures.', 'https://static.wikia.nocookie.net/pokemon/images/2/2f/Pokémon_Horizons_-_The_Series_Key_Art_EN.jpg/revision/latest/scale-to-width-down/1000?cb=20230721113709', 'https://www.crunchyroll.com/pokemon', 1234, 25),
(18, 'My Hero Academia', 'My Hero Academia follows Izuku Midoriya, a boy born without superpowers in a world where they are common. After inheriting a powerful ability from the legendary hero All Might, he enrolls in a hero academy to train and become a true hero.', 'https://img1.ak.crunchyroll.com/i/spire2/cccce22d1dfaaf713284a617ee0b539a1572467883_full.jpg', 'https://www.crunchyroll.com/my-hero-academia', 150, 7),
(19, 'Golden Kamuy', 'Golden Kamuy is a historical adventure about Saichi Sugimoto, a war veteran searching for hidden gold in Hokkaido.', 'https://img1.ak.crunchyroll.com/i/spire2/7943e146610905c512671cf3dfc2a4371539039331_full.jpg', 'https://www.crunchyroll.com/golden-kamuy', 49, 5),
(20, 'Mob Psycho 100', 'Mob Psycho 100 is about Shigeo Kageyama (Mob), a quiet boy with overwhelming psychic powers trying to live a normal life.', 'https://img1.ak.crunchyroll.com/i/spire4/24452933dd3f9282b32e49f0ce5fdc5b1546985597_full.jpg', 'https://www.crunchyroll.com/mob-psycho-100', 37, 3);

-- --------------------------------------------------------

--
-- Table structure for table `anime_season`
--

CREATE TABLE `anime_season` (
  `s_id` int NOT NULL,
  `a_id` int NOT NULL,
  `u_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `anime_season`
--

INSERT INTO `anime_season` (`s_id`, `a_id`, `u_id`) VALUES
(1, 7, 2),
(2, 7, 2),
(1, 1, 2),
(1, 19, 2),
(2, 19, 2),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `c_id` int NOT NULL,
  `u_id` int NOT NULL,
  `a_id` int NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`c_id`, `u_id`, `a_id`, `content`) VALUES
(1, 1, 1, 'wow'),
(2, 1, 1, 'I am adding another comment '),
(3, 1, 2, 'this is a comment '),
(5, 2, 20, 'this is a comment '),
(6, 2, 20, 'wow amazing show :)'),
(7, 2, 19, 'i am writing a comment '),
(8, 2, 1, 'I update mt comment again'),
(9, 2, 1, 'any one new here ?'),
(10, 2, 10, 'this website makes my life easier <3 <3'),
(11, 5, 4, 'the greatest show ever !!'),
(12, 5, 1, 'I am new ,Hi !'),
(13, 5, 4, 'this website is a hidden gem 💎💎'),
(14, 5, 3, 'OMG! they also have one Piece here !! '),
(15, 5, 3, 'to anyone new ...Hi, I am the best user here ! '),
(16, 5, 11, 'this is very nostalgic '),
(17, 2, 1, 'Hi best user ! how are you ?');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` int NOT NULL,
  `content` varchar(255) NOT NULL,
  `a_id` int NOT NULL,
  `anime_character` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `content`, `a_id`, `anime_character`) VALUES
(1, 'Enjoy The Little Detours To The Fullest .. Because That\'s Where You\'ll Find The Things More Important Than What You Want.', 1, 'Ging Freecss'),
(2, 'Hard work is worthless for those that don’t believe in themselves.', 2, 'Naruto Uzumaki'),
(3, 'If you don’t take risks, you can’t create a future.', 3, 'Monkey D. Luffy'),
(4, 'No One Knows What The Outcome Will Be. So, Choose Whatever You\'ll Regret The Least.', 4, 'Levi Ackerman'),
(5, 'You are not worth my time.', 5, 'Jiren'),
(6, 'Weaklings have no rights or choices!', 6, 'Inosuke Hashibira'),
(7, 'In every world, once you die, you’re gone.', 7, 'Kirito'),
(8, 'I didn’t say I’d kill you… I just said your name is very writeable.', 8, 'Ryuk'),
(9, 'The moment you think of giving up, think of the reason why you held on so long.', 9, 'Kenpachi Zaraki'),
(10, 'Ignorance isn\'t bliss. Ignorance is weakness. Ignorance is a sin.', 10, 'Loid Forger'),
(11, 'It’s not about the cards you have… but how you use them.', 11, 'Yugi Muto'),
(12, 'I hate myself.', 12, 'Subaru'),
(13, 'Know your place, fool.', 13, 'Ryomen Sukuna'),
(14, 'All Devils Are Born With A Name. The More That Name Is Feared, The More Powerful The Devil Itself.', 14, 'Makima'),
(15, 'Even the greatest heroes are forgotten someday.', 15, 'Heiter'),
(16, 'I won’t run away anymore. I’ll face whatever comes.', 16, 'Kakeru Satsuki '),
(17, 'I wanna be the very best, like no one ever was!', 17, 'Ash Ketchum'),
(18, 'Sometimes I do feel like I’m a failure… but even so, I’m not going to give up!', 18, 'Izuku Midoriya'),
(19, 'The weak get eaten.', 19, 'Asirpa'),
(20, 'If everyone is special, then no one is.', 20, 'Teruki Hanazawa');

-- --------------------------------------------------------

--
-- Table structure for table `season`
--

CREATE TABLE `season` (
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `season`
--

INSERT INTO `season` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(1, 'adimn', 'admin@gmail.com', '123'),
(2, 'test', 'test@gmail.com', '$2y$10$gdYuXCTzVHHzG4.qW.B1Dey0UB1Ke0ktcP/cW.FN.27658Q4AxQuS'),
(3, 'test', 'test@gmail.com', '$2y$10$yqTRUvwMRLn767izP1aZ5u.h8PcaOPQDsBOqcvF6QiziDkdvb8KIe'),
(4, 'user123', 'user@gmail.com', '$2y$10$k/DhTxZUyJpVPkleVu.HOuNcy0WbTr80U0YeaijD8q16PzrmZimIK'),
(5, 'theBestUser', 'best@gmail.com', '$2y$10$7/kmgOQYTG9n/GpsoU929.gQfLH4G3.5pUWXrF0oA2httIFru/rNe');

-- --------------------------------------------------------

--
-- Table structure for table `user_anime`
--

CREATE TABLE `user_anime` (
  `u_id` int NOT NULL,
  `a_id` int NOT NULL,
  `rate` int DEFAULT '0',
  `watch_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'plan to watch'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_anime`
--

INSERT INTO `user_anime` (`u_id`, `a_id`, `rate`, `watch_status`) VALUES
(1, 1, 4, 'Currently Watching'),
(1, 2, 4, 'Plan to Watch'),
(1, 10, 0, 'Currently Watching'),
(1, 6, 0, 'plan to watch'),
(2, 1, 0, 'plan to watch'),
(2, 3, 0, 'Currently Watching'),
(2, 4, 0, 'plan to watch'),
(2, 5, 0, 'plan to watch'),
(2, 6, 0, 'Currently Watching'),
(2, 7, 0, 'plan to watch'),
(2, 20, 5, 'Didn\'t Finish'),
(2, 9, 2, 'Currently Watching'),
(2, 19, 2, 'Currently Watching'),
(2, 10, 0, 'plan to watch'),
(5, 4, 0, 'plan to watch'),
(5, 3, 0, 'plan to watch'),
(5, 11, 0, 'plan to watch');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anime`
--
ALTER TABLE `anime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anime_season`
--
ALTER TABLE `anime_season`
  ADD KEY `a_id` (`a_id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `a_id` (`a_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `a_id` (`a_id`);

--
-- Indexes for table `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_anime`
--
ALTER TABLE `user_anime`
  ADD KEY `u_id` (`u_id`),
  ADD KEY `a_id` (`a_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anime`
--
ALTER TABLE `anime`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `c_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anime_season`
--
ALTER TABLE `anime_season`
  ADD CONSTRAINT `anime_season_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `anime` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `anime_season_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `season` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `anime_season_ibfk_3` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `anime` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `quotes`
--
ALTER TABLE `quotes`
  ADD CONSTRAINT `quotes_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `anime` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `user_anime`
--
ALTER TABLE `user_anime`
  ADD CONSTRAINT `user_anime_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `user_anime_ibfk_2` FOREIGN KEY (`a_id`) REFERENCES `anime` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
