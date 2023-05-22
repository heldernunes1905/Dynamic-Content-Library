-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 10:33 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `characters`
--

CREATE TABLE `characters` (
  `character_id` int(10) UNSIGNED NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `birthday` date NOT NULL,
  `pictures` text NOT NULL,
  `description` text NOT NULL,
  `comment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `characters`
--

INSERT INTO `characters` (`character_id`, `first_name`, `last_name`, `birthday`, `pictures`, `description`, `comment_id`) VALUES
(1, 'chara', 'chara', '2023-01-03', 'fsa', 'chara', 1),
(2, 'jfe', 'asf', '2023-01-02', 'asf', 'jfe desc', 4),
(3, 'hgfd', 'ewq', '2023-01-25', 'qwe', 'eqw fede', 3),
(4, 'htbfgxvc', 'sdgfzvxc', '2023-01-02', '0zdfq5hqptz9131.jpg', 'hfueoua desc', 4),
(7, 'a', 'a', '2023-04-04', 'default.jpg', '', 0),
(8, 'you222', 'are', '2023-04-21', 'default.jpg', 'stupid', 1),
(9, 'Walter', 'White', '1958-09-07', 'water_white.jpg', 'Walter Hartwell White Sr., also known by his alias Heisenberg, is a fictional character and the protagonist of the American crime drama television series Breaking Bad, portrayed by Bryan Cranston. Walter was a skilled chemist and co-founder of a technology firm before he accepted a buy-out from his partners.', 0),
(10, 'Jesse', 'Pinkman', '1984-09-24', 'jessepinkjpg.jpg', 'Jesse Bruce Pinkman is a fictional character and the deuteragonist of the American crime drama television series Breaking Bad, played by Aaron Paul. He is a crystal meth cook and dealer who works with his former high school chemistry teacher, Walter White.', 0),
(11, 'Gus', 'Fring', '1958-01-01', 'gusfring.jpg', 'Gustavo \"Gus\" Fring is a fictional character portrayed by Giancarlo Esposito in the Breaking Bad franchise, serving as the main antagonist of the crime drama series Breaking Bad and a major character in its prequel Better Call Saul.', 0),
(12, 'Saul', 'Goodman', '1960-11-19', 'saulgood.jpg', 'James Morgan \"Jimmy\" McGill, better known by his business name Saul Goodman, is a character created by Vince Gilligan and Peter Gould and portrayed by Bob Odenkirk in the television franchise Breaking Bad.', 0),
(13, 'Tyler', 'Durden', '0001-01-01', 'tylerdurden.jpg', 'Tyler is manipulative, selfish, hypocritical and most importantly a danger to society. Behind The Narrator\'s back, he slowly turns the fight club into \'Project Mayhem\', a terrorist organization. His ultimate plan: to erase debt by destroying buildings that contain credit card records', 0),
(14, 'Marla', 'Singer', '1957-08-02', 'marlasinger.jpg', '“Marla\'s philosophy of life, she told me, is that she can die at any moment. The tragedy of her life is that she doesn\'t.” Marla is the love & hate interest in Tyler’s life, but lets not forget Marla met Tyler at a very strange time in his life. She is a prostitute working the streets.', 0),
(15, 'The', 'Narrator', '0001-01-01', 'thenarrator.jpg', 'The Narrator is a fictional character and both the protagonist and main antagonist of the 1996 Chuck Palahniuk novel Fight Club, its 1999 film adaptation of the same name, and the comic books Fight Club 2 and Fight Club 3.', 0),
(16, 'Angel', 'Face', '0001-01-01', 'angelface.jpg', 'Angel Face is the secondary antagonist of the Fight Club franchise. Serving as the secondary antagonist of the novel Fight Club, and it\'s 1999 film adaptation of the same name, a major antagonist of its comic sequel Fight Club 2, and a posthumous antagonist of Fight Club 3.', 0),
(17, 'Ariad', 'Ne', '0001-01-01', 'ariadne.jpg', 'Ariadne is a graduate student at the École d\'Architecture in Paris. She was contacted by Dom Cobb for a specific job: to design three complete dream layer mazes on the Fischer inception job. Although the job was dangerous, Ariadne was propelled by her intellectual curiosity which made her unable to pull herself away from such a unique opportunity. Her Totem is a slightly hollowed out bishop chess piece. She is portrayed by Elliot Page.', 0),
(18, 'Dominick', 'Cobb', '0001-01-01', 'dominickcobb.jpg', 'Dominick \"Dom\" Cobb is the main protagonist of the film, Inception. Cobb is well known in the black market because of his level of expertise in the field of extraction, which consists of stealing his mark\'s ideas by infiltrating their dreams and stealing valuable information from them.', 0),
(19, 'Saito', ' ', '0001-01-01', 'saito.jpg', 'Saito (Ken Watanabe) is a character from Inception movie. Saito is a Japanese CEO of a energy company who hires Dom Cobb and his team to incept his business rival Robert Fischer to break up his company in exchange for reuniting Cobb with his family.', 0),
(20, 'Mal', 'Cobb', '0001-01-01', 'malcobb.jpg', 'Mal Cobb was the wife of Dom Cobb. She met him at university, through her father, a professor of architecture. She had two children with Dom, Phillipa and James, and together with her husband explored the art of shared dreaming. When experimenting with dreaming Dom and Mal went too deep and found themselves in Limbo.', 0),
(21, 'Jenny', 'Curran', '1945-07-16', 'Jennycurran.jpg', 'Jenny Curran is the deuteragonist of the 1986 novel Forrest Gump, and the 1994 movie based on the book. She is an old friend and later the love interest of titular protagonist Forrest Gump. She is played by Hanna Hall as a child, and by. Robin Wright.', 0),
(22, 'Forrest', 'Gump', '1944-06-06', 'forrestgump.jpg', 'Forrest Alexander Gump is a fictional character and the title protagonist of the 1986 novel by Winston Groom, Robert Zemeckis\' 1994 film of the same name, and Gump and Co., the written sequel to Groom\'s novel. W', 0),
(23, 'Lieutenant', 'Dan Taylor', '1942-01-01', 'dantaylor.jpg', 'Lieutenant Dan Taylor is a supporting character in the 1994 dramedy film Forrest Gump. He is a former military man. Throughout the film, Forrest Gump tries to help Dan find peace with God. He is portrayed by Gary Sinise.', 0),
(24, 'Benjamin', 'Blue', '1943-03-02', 'benblue.jpg', 'Bubba. Benjamin Buford Blue, better known as \"Bubba\", is a major character from the movie Forrest Gump. He was Forrest\'s best friend for awhile, and the two met in the military. Bubba was going to start a shrimp boat company like his family.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_title` text NOT NULL,
  `comment_type` int(11) NOT NULL,
  `profile_type` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `comment` longtext NOT NULL,
  `rating` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `comment_title`, `comment_type`, `profile_type`, `profile_id`, `comment`, `rating`, `date`) VALUES
(29, 1, 'afsaf', 1, 2, 3, 'Put your comment here', '', '2023-02-28 20:02:38'),
(30, 1, 'afsaf', 1, 1, 8, 'WASSSSSSSSSSSSSSSSSSSSSup', '', '2023-03-01 15:42:48'),
(32, 6, 'afsaf', 1, 1, 1, 'gyjkhu', '', '2023-03-03 14:23:26'),
(33, 1, 'afsaf', 1, 1, 10, 'Put your comment here', '', '2023-03-17 20:47:40'),
(46, 1, 'title111', 1, 2, 1, 'Put your comment here11', '', '2023-03-19 13:01:30'),
(47, 1, 'title1', 1, 3, 1, 'Put your comment here', '', '2023-03-19 13:16:33'),
(48, 8, 'titulo', 1, 2, 1, 'Do aço primo\r\n', '', '2023-03-19 14:11:34'),
(49, 8, 'title', 1, 3, 1, 'Put your comment here', '', '2023-03-19 14:11:50'),
(50, 8, 'title', 3, 4, 1, 'Put your comment here', '', '2023-03-20 12:05:31'),
(51, 6, 'title', 3, 4, 1, 'THis is just a test to see if it all works out baby', '', '2023-03-24 22:16:30'),
(52, 8, 'title', 1, 2, 3, 'Put your comment here', '', '2023-03-24 23:46:25'),
(67, 1, 'title', 3, 4, 1, 'trying', '', '2023-03-25 21:47:03'),
(68, 1, 'title', 3, 4, 4, 'THELLO PEOPLE', '', '2023-03-26 15:49:36'),
(69, 1, 'title', 1, 2, 2, 'Put your comment here', '', '2023-04-27 19:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `contentId` int(10) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `content_type` varchar(20) NOT NULL,
  `description` mediumtext NOT NULL,
  `images` longtext NOT NULL,
  `altImg` varchar(255) NOT NULL,
  `rating` mediumtext NOT NULL,
  `release_date` date NOT NULL,
  `ranking` int(11) NOT NULL,
  `studio_id` int(11) NOT NULL,
  `links` text NOT NULL,
  `duration` int(11) NOT NULL,
  `ep_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`contentId`, `title`, `content_type`, `description`, `images`, `altImg`, `rating`, `release_date`, `ranking`, `studio_id`, `links`, `duration`, `ep_number`) VALUES
(1, 'The Karate Kid', 'movie', 'The Karate Kid is a 1984 American martial arts drama film written by Robert Mark Kamen and directed by John G. Avildsen. It is the first installment in the Karate Kid franchise, and stars Ralph Macchio, Pat Morita, Elisabeth Shue and William Zabka.[3][4] The Karate Kid follows Daniel LaRusso (Macchio), a teenager taught karate by Mr. Miyagi (Morita) to help defend himself and compete in a tournament against his bullies, one of whom is Johnny Lawrence (Zabka), the ex-boyfriend of his love interest Ali Mills (Shue).', 'MV5BNTkzY2YzNmYtY2ViMS00MThiLWFlYTEtOWQ1OTBiOGEwMTdhXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_FMjpg_UX1000_.jpg', 'a', '1', '1984-10-25', 12, 1, 'a', 115, 10),
(2, 'The Super Mario Bros. Movie', 'movie', 's', 'The_Super_Mario_Bros._Movie_poster.jpg', 's', '3', '2023-04-25', 1, 2, 's', 200, 1),
(3, 'Thor: Love and Thunder', 'movie', 'd', 'MV5BYmMxZWRiMTgtZjM0Ny00NDQxLWIxYWQtZDdlNDNkOTEzYTdlXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_.jpg', 'd', '4', '2022-07-06', 123, 3, 'd', 78, 1),
(4, 'One Piece Film: Red', 'movie', 'f', 'One_Piece_Film_Red_Visual_Poster.jpg', 'f', '4', '2022-11-03', 13, 3, 'f', 65, 1),
(43, 'Karate kid 2', 'movie', 'ewfrf', 'Karate_kid_part_II.jpg', 'gafsa', '412', '2023-03-22', 21, 3, '1rwq', 74, 0),
(44, 'hoagsohig', 'show', '123123', 'pzd73vyin2ma15.jpg', 'hoagsohig', '1', '2023-03-16', 1, 4, '1', 20, 25),
(53, 'Titulo2', 'show', 'desc', '2', 'title', '1', '2023-04-04', 12, 1, '123', 115, 1),
(54, 'Forrest Gump', 'movie', 'Forrest, a man with low IQ, recounts the early years of his life when he found himself in the middle of key historical events. All he wants now is to be reunited with his childhood sweetheart, Jenny.', 'fgump.jpg', 'Forrest Gump', '4', '1994-10-07', 12, 17, 'https://www.imdb.com/title/tt0109830/', 142, 1),
(55, 'Inception', 'movie', 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O., but his tragic past may doom the project and his team to disaster.', 'inception.jpg', 'Inception', '4', '2010-06-08', 8, 16, 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O., but his tragic past may doom the project and his team to disaster.', 148, 1),
(56, 'fight club', 'movie', 'Unhappy with his capitalistic lifestyle, a white-collared insomniac forms an underground fight club with Tyler, a careless soap salesman. Soon, their venture spirals down into something sinister.', 'fight_club.jpg', 'fight club', '4', '1999-11-19', 5, 15, 'https://www.imdb.com/title/tt0137523/', 139, 1),
(57, 'Breaking Bad', 'show', 'Walter White, a chemistry teacher, discovers that he has cancer and decides to get into the meth-making business to repay his medical debts. His priorities begin to change when he partners with Jesse.', 'breakbad.jpg', 'Breaking Bad', '5', '2008-01-20', 3123, 14, 'https://www.imdb.com/title/tt0903747/', 48, 7),
(58, 'Spider-Man: Across the Spider-Verse', 'movie', 'After reuniting with Gwen Stacy, Brooklyn\'s full-time, friendly neighborhood Spider-Man is catapulted across the Multiverse, where he encounters a team of Spider-People charged with protecting its very existence. However, when the heroes clash on how to handle a new threat, Miles finds himself pitted against the other Spiders. He must soon redefine what it means to be a hero so he can save the people he loves most.', 'spid_across.jpg', 'Spider-Man: Across the Spider-Verse', '0', '2023-06-01', 0, 1, 'https://www.imdb.com/title/tt9362722/', 115, 1),
(59, 'Oppenheimer', 'movie', 'Physicist J Robert Oppenheimer works with a team of scientists during the Manhattan Project, leading to the development of the atomic bomb.', 'oppenheimer.jpg', 'Oppenheimer', '0', '2023-07-21', 0, 1, 'https://www.imdb.com/title/tt15398776/', 150, 1),
(61, 'Elemental', 'movie', 'In a city where fire, water, land, and air residents live together, a fiery young woman and a go-with-the-flow guy discover something elemental: how much they actually have in common.', 'elemental.jpg', 'Elemental', '0', '2023-07-13', 0, 1, 'https://www.imdb.com/title/tt15789038/', 102, 1),
(62, 'Mission: Impossible – Dead Reckoning Part One', 'movie', 'Ethan Hunt and the IMF team must track down a terrifying new weapon that threatens all of humanity if it falls into the wrong hands. With control of the future and the fate of the world at stake, a deadly race around the globe begins. Confronted by a mysterious, all-powerful enemy, Ethan is forced to consider that nothing can matter more than the mission -- not even the lives of those he cares about most.', 'mideadreconing.jpg', 'Mission: Impossible – Dead Reckoning Part One', '0', '2023-07-12', 0, 1, 'https://www.imdb.com/title/tt9603212/', 0, 1),
(63, 'Barbie', 'movie', 'After being expelled from Barbieland for being a less than perfect-looking doll, Barbie sets off for the human world to find true happiness.', 'barbie.jpg', 'Barbie', '0', '2023-07-20', 0, 1, 'https://www.imdb.com/title/tt1517268/', 100, 1),
(64, 'The Flash', 'movie', 'Worlds collide when the Flash uses his superpowers to travel back in time to change the events of the past. However, when his attempt to save his family inadvertently alters the future, he becomes trapped in a reality in which General Zod has returned, threatening annihilation. With no other superheroes to turn to, the Flash looks to coax a very different Batman out of retirement and rescue an imprisoned Kryptonian -- albeit not the one he\'s looking for.', 'theflash.jpg', 'The Flash', '0', '2023-07-15', 0, 1, 'https://www.imdb.com/title/tt0439572/', 144, 1),
(65, 'Kathal', 'movie', 'A local politician\'s prized jackfruit trees have disappeared from his garden. A young policewoman desperately tries to solve this strange case to prove herself worthy of her position.', 'kathal.jpg', 'Kathal', '7', '2023-05-19', 0, 1, 'https://www.imdb.com/title/tt18413766/', 115, 1),
(66, 'Creed III', 'movie', 'Still dominating the boxing world, Adonis Creed is thriving in his career and family life. When Damian, a childhood friend and former boxing prodigy resurfaces after serving time in prison, he\'s eager to prove that he deserves his shot in the ring. The face-off between former friends is more than just a fight. To settle the score, Adonis must put his future on the line to battle Damian -- a fighter who has nothing to lose.', 'creed3.jpg', 'Creed III', '7', '2023-03-02', 0, 1, 'https://www.imdb.com/title/tt11145118/', 117, 1),
(67, 'White Men Can\'t Jump', 'movie', 'A remake of the 1992 film about a pair of basketball hustlers who team up to earn extra cash.', 'whitejump.jpg', 'White Men Can\'t Jump', '4', '2023-05-19', 0, 1, 'https://www.imdb.com/title/tt6436620/', 101, 1),
(68, 'Virupaksha', 'movie', 'Mysterious deaths occur in a village due to an unknown person\'s occult practices. The whole town is afraid, and the problems continue as they search for the one responsible.', 'virupashka.jpg', 'Virupaksha', '8', '2023-04-21', 0, 1, 'https://en.wikipedia.org/wiki/Virupaksha_(film)', 146, 1);

-- --------------------------------------------------------

--
-- Table structure for table `content_character`
--

CREATE TABLE `content_character` (
  `content_character_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `character_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content_character`
--

INSERT INTO `content_character` (`content_character_id`, `content_id`, `character_id`) VALUES
(1, 1, '1'),
(2, 2, '1,2,3'),
(3, 3, '2'),
(4, 4, '3'),
(5, 9, '2'),
(11, 53, '1'),
(12, 54, '21,22,23,24'),
(13, 55, '17,18,19,20'),
(14, 56, '13,14,15'),
(15, 57, '9,10,11,12'),
(16, 58, '1'),
(17, 59, '1'),
(18, 60, '1'),
(19, 61, '1'),
(20, 62, '1'),
(21, 63, ''),
(22, 64, ''),
(23, 65, '1'),
(24, 66, ''),
(25, 67, '1'),
(26, 68, '1');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `forum_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(400) NOT NULL,
  `date` datetime NOT NULL,
  `type` int(11) NOT NULL,
  `public` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`forum_id`, `title`, `description`, `date`, `type`, `public`) VALUES
(1, 'new Title', 'This is the new title for the fierst forum', '2023-04-28 20:13:56', 1, 1),
(3, 'Forum 2', 'Website News', '2023-05-22 10:27:04', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genre_id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre_id`, `name`, `description`) VALUES
(1, 'Martial arts', 'subgenre of action films that feature numerous martial arts combat between characters'),
(2, 'Action', ' fast-paced and include a lot of action like fight scenes, chase scenes, and slow-motion shots.'),
(3, 'Romance', 'ype of genre fiction novel which places its primary focus on the relationship and romantic love between two people, and usually has an \"emotionally satisfying and optimistic ending.\"'),
(4, 'Adventure', 'The adventure genre consists of books where the protagonist goes on an epic journey, either personally or geographically. Often the protagonist has a mission and faces many obstacles in his way.'),
(10, 'Sports', 'Books in the sports fiction genre are made up of stories where a sport has an impact on the plot or main character.'),
(11, 'Teen', 'Teen film is a film genre targeted at teenagers, preteens, or young adults by the plot being based on their special interests, such as coming of age, attempting to fit in, bullying, peer pressure, first love, teen rebellion, conflict with parents, and teen angst or alienation.'),
(12, 'Drama', 'The drama genre features stories with high stakes and many conflicts. They\'re plot-driven and demand that every character and scene move the story forward. '),
(13, 'Childrens film', 'ntains children or relates to them in the context of home and family.'),
(14, 'Comedy', 'Comedy is a genre of fiction that consists of discourses or works intended to be humorous or amusing by inducing laughter'),
(15, 'Romantic Comedy', 'Romantic comedy (also known as romcom or rom-com) is a subgenre of comedy and slice of life fiction, focusing on lighthearted, humorous plot lines centered on romantic ideas, such as how true love is able to surmount most obstacles.'),
(16, 'Comedy drama', 'Comedy drama, also known by the portmanteau dramedy, is a genre of dramatic works that combines elements of comedy and drama.'),
(17, 'Magical Realism', 'Magic realism or magical realism is a style of literary fiction and art. It paints a realistic view of the world while also adding magical elements, often blurring the lines between fantasy and reality. '),
(19, 'Thriller', 'Thriller is a genre of fiction with numerous, often overlapping, subgenres, including crime, horror and detective fiction. Thrillers are characterized and defined by the moods they elicit, giving their audiences heightened feelings of suspense, excitement, surprise, anticipation and anxiety.'),
(20, 'Science fiction', 'Science fiction is a genre of speculative fiction, which typically deals with imaginative and futuristic concepts such as advanced science and technology, space exploration, time travel, parallel universes, and extraterrestrial life. Science fiction can trace its roots to ancient mythology.'),
(21, 'Heist', 'The heist film or caper film is a subgenre of crime film focused on the planning, execution, and aftermath of a significant robbery. One of the early defining heist films was The Asphalt Jungle, which Film Genre 2000 wrote \"almost single-handedly popularized the genre for mainstream cinema\".'),
(22, 'Dark comedy', 'Black comedy, also known as dark comedy, morbid humor, gallows humor, or dark humor, is a style of comedy that makes light of subject matter that is generally considered taboo, particularly subjects that are normally considered serious or painful to discuss.'),
(23, 'Crime', 'As the name implies, the crime genre is largely classified by a story that is centered around the solving of a crime.'),
(24, 'Suspense', 'Suspense is a state of mental uncertainty, anxiety, being undecided, or being doubtful. In a dramatic work, suspense is the anticipation of the outcome of a plot or of the solution to an uncertainty, puzzle, or mystery, particularly as it affects a character for whom one has sympathy.'),
(25, 'Tragedy', 'Tragedy is a genre of drama based on human suffering and, mainly, the terrible or sorrowful events that befall a main character. Traditionally, the intention of tragedy is to invoke an accompanying catharsis, or a \"pain [that] awakens pleasure\", for the audience.');

-- --------------------------------------------------------

--
-- Table structure for table `genrecontent`
--

CREATE TABLE `genrecontent` (
  `genre_content_id` int(10) UNSIGNED NOT NULL,
  `genre_id` text NOT NULL,
  `content_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genrecontent`
--

INSERT INTO `genrecontent` (`genre_content_id`, `genre_id`, `content_id`) VALUES
(1, '1,2,3,4,10,11,12,13', 1),
(3, '1', 3),
(4, '2', 4),
(6, '1,2', 43),
(7, '2,1', 44),
(11, '1,3', 2),
(14, '2', 53),
(15, '14,3,15,16,12,17', 54),
(16, '2,19,20,4,21,12', 55),
(17, '2,19,22,23,12', 56),
(18, '12,23,24,22,19,25', 57),
(19, '2', 58),
(20, '12', 59),
(21, '14', 60),
(22, '14', 61),
(23, '2,4', 62),
(24, '3', 63),
(25, '4,2', 64),
(26, '14,12,23', 65),
(27, '12,10', 66),
(28, '12,14,10', 67),
(29, '12', 68);

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists` (
  `list_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(90) NOT NULL,
  `image` varchar(80) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content_id` varchar(100) NOT NULL,
  `list_type` int(11) NOT NULL,
  `list_state` int(11) NOT NULL,
  `list_public` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`list_id`, `title`, `image`, `user_id`, `content_id`, `list_type`, `list_state`, `list_public`) VALUES
(3, 'third', '', 1, '2', 5, 1, 0),
(28, '', '', 1, '2,4', 1, 2, 1),
(29, '', '', 1, '3', 1, 1, 1),
(30, '', '', 1, ',1', 1, 3, 1),
(31, '', '', 2, '1,2', 1, 3, 1),
(32, '', '', 1, '', 2, 2, 1),
(33, '', '', 1, '', 2, 3, 1),
(34, '', '', 1, '', 2, 4, 1),
(36, '', '', 1, '', 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `image` text NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `title`, `image`, `text`, `date`, `user_id`, `status`) VALUES
(3, 'Feedback', 'dghrt', 'Thanks for your recommendation on a new feature', '2023-03-26 18:23:24', 1, 1),
(4, 'Thanks', 'notif.jpg', 'Thank you for using the website', '2023-03-26 18:07:09', 1, 1),
(6, '', 'Notif_Image', '', '2023-04-19 21:32:18', 0, 1),
(7, '', 'Notif_Image', '', '2023-04-19 21:32:51', 0, 1),
(8, '', 'Notif_Image', '', '2023-04-19 21:32:58', 0, 1),
(9, '', 'Notif_Image', '', '2023-04-19 21:33:25', 0, 1),
(10, '', 'Notif_Image', '', '2023-04-19 21:34:09', 0, 1),
(11, '', 'Notif_Image', '', '2023-04-19 21:34:10', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `personalrating`
--

CREATE TABLE `personalrating` (
  `personal_rating_id` int(10) UNSIGNED NOT NULL,
  `content_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_rating` double(8,2) NOT NULL,
  `daterate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `userdescription` varchar(200) NOT NULL,
  `usertitle` varchar(100) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personalrating`
--

INSERT INTO `personalrating` (`personal_rating_id`, `content_id`, `user_id`, `user_rating`, `daterate`, `userdescription`, `usertitle`, `active`) VALUES
(1, 1, 8, 3.00, '2023-04-28 17:15:25', 'Kinda decent, cant give more than 3/5', 'Its okay I guess', 1),
(4, 1, 6, 3.50, '2023-04-28 17:15:21', '3.5, it was satisfactory', 'Mid', 1),
(21, 1, 10, 4.50, '2023-04-28 17:15:48', 'I loved it, I wish I had a mentor like that', 'Recommend it', 1),
(32, 1, 1, 2.50, '2023-04-28 18:11:35', 'new comment', 'title test', 1),
(36, 3, 1, 3.50, '2023-04-28 17:16:22', 'Enjoyable', 'Decent fun overall', 1),
(37, 44, 1, 2.50, '2023-04-28 17:16:46', 'Dont think I\'ll watch it again', 'not too bad', 1),
(43, 2, 1, 0.00, '2023-04-28 17:12:01', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `recommend`
--

CREATE TABLE `recommend` (
  `recommend_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content_id_chose` int(11) NOT NULL,
  `content_id_recommended` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recommend`
--

INSERT INTO `recommend` (`recommend_id`, `user_id`, `content_id_chose`, `content_id_recommended`, `description`, `date`) VALUES
(2, 1, 2, 4, 'fasfsaf', '2023-03-19 16:00:53'),
(3, 1, 1, 2, 'ta top primo', '2023-03-19 16:09:27'),
(4, 1, 4, 2, 'f', '2023-03-19 16:23:16');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(10) UNSIGNED NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `birthday` date NOT NULL,
  `pictures` text NOT NULL,
  `links` text NOT NULL,
  `description` text NOT NULL,
  `comment_id` text NOT NULL,
  `staff_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `first_name`, `last_name`, `birthday`, `pictures`, `links`, `description`, `comment_id`, `staff_type`) VALUES
(1, 'Christopher', 'Ready', '2023-01-09', 'pzd73vyin2ma17.jpg', 'a', 'a desc', '1', 1),
(2, 'b', 'b', '2023-01-18', 'b', 'b', 'b desc', '4', 2),
(3, 'c', 'c', '2023-01-08', 'c', 'c', 'c desc', '3', 3),
(6, 'a', 'a', '2023-04-04', 'default.jpg', 'a', '', '', 1),
(7, 'Baka', 'You', '2023-04-04', 'default.jpg', 'This is a testing form', '', '', 1),
(8, 'Tu', 'me', '2023-04-11', 'default.jpg', '2222', 'desc', '', 1),
(9, 'Robin', 'Wright', '1966-04-08', 'robinwrit.jpg', 'https://en.wikipedia.org/wiki/Robin_Wright', 'Robin Gayle Wright is an American actress and director. She has received various accolades, including a Golden Globe Award, and nominations for eight Primetime Emmy Awards. Wright first gained attention for her role as Kelly Capwell in the NBC Daytime soap opera Santa Barbara from 1984 to 1988.', '', 2),
(10, 'Tom', 'Hanks', '1956-07-09', 'tomh.jpg', 'https://en.wikipedia.org/wiki/Tom_Hanks', 'Thomas Jeffrey Hanks is an American actor and filmmaker. Known for both his comedic and dramatic roles, he is one of the most popular and recognizable film stars worldwide, and is regarded as an American cultural icon.', '', 2),
(11, 'Gary', 'Sinise', '1955-03-17', 'garysinise.jpg', 'https://en.wikipedia.org/wiki/Gary_Sinise', 'Gary Alan Sinise is an American actor. Among other awards, he has won a Primetime Emmy Award, a Golden Globe Award, a Tony Award, and four Screen Actors Guild Awards. He has also received a star on the Hollywood Walk of Fame, and was nominated for an Academy Award.', '', 2),
(12, 'Mykelti', 'Williamson', '1957-03-04', 'mikelti.jpg', 'https://en.wikipedia.org/wiki/Mykelti_Williamson', 'Mykelti Williamson is an American actor best known for his roles in the films Forrest Gump, 12 Angry Men, Con Air and Ali, and the television shows Boomtown, 24, and Justified.', '', 2),
(13, 'Bryan', 'Cranston', '1956-03-07', 'bryancranston.jpg', 'https://en.wikipedia.org/wiki/Bryan_Cranston', 'Bryan Lee Cranston is an American actor, director, and producer who is mainly known for portraying Walter White in the AMC crime drama series Breaking Bad and Hal in the Fox sitcom Malcolm in the Middle.', '', 2),
(14, 'Jared', 'Leto', '1971-12-26', 'jarredl.jpg', 'https://en.wikipedia.org/wiki/Jared_Leto', 'Jared Joseph Leto is an American actor and musician. Known for his method acting in a variety of roles, he has received numerous accolades over a career spanning three decades, including an Academy Award and a Golden Globe Award.', '', 2),
(15, 'Brad', 'Pitt', '1963-12-18', 'bradpitt.jpg', 'https://en.wikipedia.org/wiki/Brad_Pitt', 'William Bradley Pitt is an American actor and film producer. He is the recipient of various accolades, including two Academy Awards, two British Academy Film Awards, two Golden Globe Awards, and a Primetime Emmy Award.', '', 1),
(16, 'Helena', 'Carter', '1966-05-26', 'helenacarter.jpg', 'https://en.wikipedia.org/wiki/Helena_Bonham_Carter', 'Helena Bonham Carter CBE (born 26 May 1966) is an English actress. Known for her roles in blockbusters and independent films, particularly period dramas, she has received various awards and nominations, including a British Academy Film Award and an International Emmy Award, in addition to nominations for two Academy Awards, four British Academy Television Awards, five Primetime Emmy Awards, and nine Golden Globe Awards.', '', 2),
(17, 'Edward', 'Norton', '1969-08-18', 'ednort.jpg', 'https://en.wikipedia.org/wiki/Edward_Norton', 'Edward Harrison Norton is an American actor and filmmaker. Born in Boston and raised in Columbia, Maryland, Norton was drawn to theatrical productions at local venues as a child. After graduating from Yale College in 1991, he worked for a few months in Japan before moving to Manhattan to pursue an acting career', '', 1),
(18, 'Marion', 'Cotillard', '1975-09-30', 'marion.jpg', 'https://en.wikipedia.org/wiki/Marion_Cotillard', 'Marion Cotillard is a French actress. Known for her roles in independent films and blockbusters in both European and Hollywood productions, she has received various accolades, including an Academy Award, a British Academy Film Award, a Golden Globe Award, a European Film Award, a Lumières Award and two César Awards.', '', 2),
(19, 'Elliot', 'Page', '1987-02-21', 'elliotpage.jpg', 'https://en.wikipedia.org/wiki/Elliot_Page', 'Elliot Page is a Canadian actor. He has received various accolades, including an Academy Award nomination, two BAFTA Awards and Primetime Emmy Award nominations, and a Satellite Award. Page was assigned female at birth, and later publicly came out as a trans man in December 2020.', '', 2),
(20, 'Ken', 'Watanabe', '1959-10-21', 'kenwatanabe.jpg', 'https://en.wikipedia.org/wiki/Ken_Watanabe', 'Ken Watanabe is a Japanese actor. To English-speaking audiences, he is known for playing tragic hero characters, such as General Tadamichi Kuribayashi in Letters from Iwo Jima and Lord Katsumoto Moritsugu in The Last Samurai, for which he was nominated for the Academy Award for Best Supporting Actor.', '', 2),
(21, 'Leonardo', 'DiCaprio', '1974-11-11', 'leodic.jpg', 'https://en.wikipedia.org/wiki/Leonardo_DiCaprio', 'Leonardo Wilhelm DiCaprio is an American actor and film producer. Known for his work in biographical and period films, he is the recipient of numerous accolades, including an Academy Award, a British Academy Film Award and three Golden Globe Awards', '', 2),
(22, 'Bob', 'Odenkirk', '1962-10-22', 'bododer.jpg', 'https://en.wikipedia.org/wiki/Bob_Odenkirk', 'Robert John Odenkirk is an American actor, comedian, and filmmaker best known for his role as Saul Goodman on Breaking Bad and its spin-off Better Call Saul. For the latter, he has received five nominations for Primetime Emmy Award for Outstanding Lead Actor in a Drama Series.', '', 2),
(23, 'Esposito', 'Giancarlo', '1958-04-26', 'giancarlo.jpg', 'https://en.wikipedia.org/wiki/Giancarlo_Esposito', 'giancarloesposito.com Giancarlo Giuseppe Alessandro Esposito is an American actor. He is best known for portraying Gus Fring in the AMC crime drama series Breaking Bad, from 2009 to 2011, as well as in its prequel series Better Call Saul, from 2017 to 2022.', '', 1),
(24, 'Aaron', 'Paul', '1979-08-26', 'aaronpaul.jpg', 'https://en.wikipedia.org/wiki/Aaron_Paul', 'Aaron Paul (born Aaron Paul Sturtevant; August 27, 1979) is an American actor and producer. He is best known for portraying Jesse Pinkman in the AMC series Breaking Bad (2008–2013), for which he won several awards, including the Critics\' Choice Television Award for Best Supporting Actor in a Drama Series (2014), Satellite Award for Best Supporting Actor – Series, Miniseries, or Television Film (2013), and Primetime Emmy Award for Outstanding Supporting Actor in a Drama Series.', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staffcontent`
--

CREATE TABLE `staffcontent` (
  `staffcontent_id` int(10) UNSIGNED NOT NULL,
  `content_id` int(11) NOT NULL,
  `staff_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staffcontent`
--

INSERT INTO `staffcontent` (`staffcontent_id`, `content_id`, `staff_id`) VALUES
(1, 1, '1,2'),
(2, 2, '1'),
(3, 3, '2'),
(4, 4, '1'),
(5, 9, '3,1,2'),
(11, 53, '1'),
(12, 54, '9,10,11,12'),
(13, 55, '19,21,20,18'),
(14, 56, '15,16,17'),
(15, 57, '13,24,23,22'),
(16, 58, '1'),
(17, 59, '1'),
(18, 60, '1'),
(19, 61, '1'),
(20, 62, '1'),
(21, 63, ''),
(22, 64, ''),
(23, 65, '1'),
(24, 66, ''),
(25, 67, '1'),
(26, 68, '1');

-- --------------------------------------------------------

--
-- Table structure for table `staff_character`
--

CREATE TABLE `staff_character` (
  `staff_character_id` int(10) UNSIGNED NOT NULL,
  `staff_id` varchar(90) NOT NULL,
  `character_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_character`
--

INSERT INTO `staff_character` (`staff_character_id`, `staff_id`, `character_id`) VALUES
(1, '1,3,2', '3,1'),
(2, '2', '1'),
(3, '3,2', '3'),
(4, '1', '2'),
(6, '1', '1'),
(7, '9,10,11,12', '21,22,23,24'),
(8, '19,21,20,18', '17,18,19,20'),
(9, '15,16,17', '13,14,15'),
(10, '13,24,23,22', '9,10,11,12'),
(11, '1', '1'),
(12, '1', '1'),
(13, '1', '1'),
(14, '1', '1'),
(15, '1', '1'),
(16, '', ''),
(17, '', ''),
(18, '1', '1'),
(19, '', ''),
(20, '1', '1'),
(21, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `studio`
--

CREATE TABLE `studio` (
  `studio_id` int(10) UNSIGNED NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `date_created` date NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studio`
--

INSERT INTO `studio` (`studio_id`, `first_name`, `last_name`, `date_created`, `description`) VALUES
(1, 'Studio', 'First', '2022-11-08', 'Studio first is the first studio of this website, its really shit'),
(2, 'Studio', 'Second', '2023-01-09', 'Second isnt always the worst, think about sex'),
(3, 'Studio', 'Third', '2023-01-09', 'Third is always wrong, like think about it, third is alawys the worst, would you want a third person in the bedroom'),
(4, 'Studio', 'Fourth', '2023-01-09', 'after a third one, maybe you should stop going for a boy and be happy with 3 girls'),
(5, 'Studio', 'Fifth', '2023-01-02', 'Seriously, why five, you cant even count that high'),
(6, 'Studio', 'Sixth', '2023-01-09', 'C\'mon dude, the only six you need in life is a six pack of beer'),
(12, 'F', 'A', '2023-04-10', 'Desc'),
(13, 'Studio', 'Sever', '2023-04-04', 'We the best'),
(14, 'AMC', 'Entertainment', '1920-01-01', 'AMC Theatres was formed in 1920 by Maurice, Edward, and Barney Dubinsky, who had been traveling the Midwest performing melodramas and tent shows with actress Jeanne Eagels. They purchased the Regent Theatre on 12th Street between Walnut and Grand in downtown Kansas City, Missouri.'),
(15, '20th', 'Century', '1935-05-31', '20th Century Studios is an American film production company headquartered at the Fox Studio Lot in the Century City area of Los Angeles. Since 2019, it serves as a film production arm of Walt Disney Studios, a division of Disney Entertainment, which is owned by The Walt Disney Company. '),
(16, 'WarnerBros', 'Pictures', '1923-04-04', 'Warner Bros. Entertainment Inc. is an American film and entertainment studio headquartered at the Warner Bros. Studios complex in Burbank, California, and a subsidiary of Warner Bros. Discovery'),
(17, 'Paramount', 'Pictures', '1912-05-08', 'Paramount Pictures Corporation is an American film and television production and distribution company and the main namesake division of Paramount Global.');

-- --------------------------------------------------------

--
-- Table structure for table `supportform`
--

CREATE TABLE `supportform` (
  `support_id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `type` int(11) NOT NULL,
  `content_type` varchar(20) NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `link` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supportform`
--

INSERT INTO `supportform` (`support_id`, `user_id`, `type`, `content_type`, `title`, `text`, `link`, `date`, `status`) VALUES
(1, 1, 0, '', 'asfsaf', 'asfsafsaf', 'link 1', '2023-01-16 21:31:52', 1),
(2, 1, 0, '', 'fasdghbfds', 'rewafsghccbfds', 'link 2', '2023-01-31 21:31:52', 1),
(3, 6, 0, '', 'sfaxzc', 'fasfasf', 'link 3', '2023-01-29 21:32:09', 0),
(4, 6, 0, '', 'afssaf', 'asfas', 'link 4', '2023-01-11 21:32:09', 0),
(9, 1, 3, 'Offensive', 'fasf', 'he called me a meany weeny tiny handsy poopy head', 'http://localhost/CodeIgniter-3.1.10/index.php/profile/10', '2023-03-06 21:33:51', 1),
(10, 8, 2, 'Movie', 'pirata', 'das', 'nioasoigoi', '2023-03-19 01:12:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `thread_id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `public` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`thread_id`, `forum_id`, `title`, `description`, `date`, `public`) VALUES
(1, 1, 'Testing the thread 1', 'This is a description', '2023-04-28 20:17:30', 1),
(4, 1, 'new Title', 'aastic', '2023-04-28 20:17:26', 0),
(5, 3, 'New Features 05-2023', 'These are discussions for the new features added this month', '2023-05-22 10:27:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userpreferences`
--

CREATE TABLE `userpreferences` (
  `user_likes_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `content_like` text NOT NULL,
  `genre_like` text NOT NULL,
  `character_like` text NOT NULL,
  `studio_like` text NOT NULL,
  `producer_like` text NOT NULL,
  `writer_like` text NOT NULL,
  `actor_like` varchar(100) NOT NULL,
  `user_like` varchar(200) NOT NULL,
  `user_liked` varchar(200) NOT NULL,
  `like_state` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userpreferences`
--

INSERT INTO `userpreferences` (`user_likes_id`, `user_id`, `content_like`, `genre_like`, `character_like`, `studio_like`, `producer_like`, `writer_like`, `actor_like`, `user_like`, `user_liked`, `like_state`) VALUES
(1, 1, '4,2', '4', '3', '', '', '3', '2', '', '', 0),
(2, 6, '2', '2', '2', '2', '2', '2', '2', '6,10,8,1', '', 1),
(3, 10, '1', '1', '1', '1', '1', '2', '1', '', '', 1),
(48, 8, '', '', '', '', '', '', '', '', '1', 1),
(51, 1, '', '', '', '', '1', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `birthday` date NOT NULL,
  `gender` text NOT NULL,
  `bio` text NOT NULL,
  `avatar` text NOT NULL,
  `profile_banner` text NOT NULL,
  `following` text NOT NULL,
  `profile_state` int(11) NOT NULL,
  `permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `username`, `first_name`, `last_name`, `birthday`, `gender`, `bio`, `avatar`, `profile_banner`, `following`, `profile_state`, `permission`) VALUES
(1, 'a@a.com1', 'YQ==', 'YQ==', 'ca', 'cb', '2023-12-24', 'Male', 'bio example', '0zdfq5hqptz9114.jpg', '0zdfq5hqptz913.jpg', 'following', 1, 0),
(6, 'd@d.com', 'ZA==', 'ZA==', 'dad', 'ded', '0000-00-00', 'd', 'd', 'default.jpg', 'd', '', 1, 0),
(8, 'b@b.com', 'Yg==', 'Yg==', 'bb', 'cc', '2025-11-14', 'b', 'b', 'default.jpg', '0zdfq5hqptz915.jpg', '', 1, 0),
(10, 'c@c.com', 'Yw==', 'Yw==', 'ca', 'cb', '0000-00-00', 'gender', 'vio', '9s2xu9onunka1.jpg', '0zdfq5hqptz911.jpg', 'following', 1, 1),
(24, 'emai@fasfa.com', 'cGFzcw==', 'dXNlcg==', 'first', 'Last', '2023-04-11', 'stuff', 'a', 'default_avatar', 'default_banner', 'following', 1, 0),
(26, 'nax@gmail.com', 'bmFkYQ==', 'bmFkYQ==', 'he', 'fs', '2023-04-18', 'male', 'bio', 'default.jpg', 'default.jpg', 'following', 1, 1),
(27, 'isto@gmail.com', 'aXN0b2U=', 'aXN0b2U=', 'w', 'a', '2023-04-11', 'female', 'bio', 'default_avatar', 'default_banner', 'following', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `watchlist_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ep_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `watchlist`
--

INSERT INTO `watchlist` (`watchlist_id`, `content_id`, `user_id`, `ep_amount`) VALUES
(6, 1, 1, 10),
(8, 44, 1, 12),
(9, 4, 1, 1),
(10, 2, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`character_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comments_user_id_index` (`user_id`),
  ADD KEY `comments_comment_title_index` (`comment_title`(768));

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`contentId`);

--
-- Indexes for table `content_character`
--
ALTER TABLE `content_character`
  ADD PRIMARY KEY (`content_character_id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`forum_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `genrecontent`
--
ALTER TABLE `genrecontent`
  ADD PRIMARY KEY (`genre_content_id`),
  ADD KEY `genrecontent_genre_id_index` (`genre_id`(768)),
  ADD KEY `genrecontent_content_id_index` (`content_id`);

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`list_id`),
  ADD KEY `list_user_id_index` (`user_id`),
  ADD KEY `list_content_id_index` (`content_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `notification_user_id_index` (`user_id`);

--
-- Indexes for table `personalrating`
--
ALTER TABLE `personalrating`
  ADD PRIMARY KEY (`personal_rating_id`),
  ADD KEY `personalrating_user_id_index` (`user_id`);

--
-- Indexes for table `recommend`
--
ALTER TABLE `recommend`
  ADD PRIMARY KEY (`recommend_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `staffcontent`
--
ALTER TABLE `staffcontent`
  ADD PRIMARY KEY (`staffcontent_id`),
  ADD KEY `staffcontent_content_id_index` (`content_id`),
  ADD KEY `staffcontent_staff_id_index` (`staff_id`);

--
-- Indexes for table `staff_character`
--
ALTER TABLE `staff_character`
  ADD PRIMARY KEY (`staff_character_id`);

--
-- Indexes for table `studio`
--
ALTER TABLE `studio`
  ADD PRIMARY KEY (`studio_id`);

--
-- Indexes for table `supportform`
--
ALTER TABLE `supportform`
  ADD PRIMARY KEY (`support_id`),
  ADD KEY `supportform_user_id_index` (`user_id`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`thread_id`);

--
-- Indexes for table `userpreferences`
--
ALTER TABLE `userpreferences`
  ADD PRIMARY KEY (`user_likes_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`watchlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `characters`
--
ALTER TABLE `characters`
  MODIFY `character_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `contentId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `content_character`
--
ALTER TABLE `content_character`
  MODIFY `content_character_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `forum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `genrecontent`
--
ALTER TABLE `genrecontent`
  MODIFY `genre_content_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `list_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personalrating`
--
ALTER TABLE `personalrating`
  MODIFY `personal_rating_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `recommend`
--
ALTER TABLE `recommend`
  MODIFY `recommend_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `staffcontent`
--
ALTER TABLE `staffcontent`
  MODIFY `staffcontent_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `staff_character`
--
ALTER TABLE `staff_character`
  MODIFY `staff_character_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `studio`
--
ALTER TABLE `studio`
  MODIFY `studio_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `supportform`
--
ALTER TABLE `supportform`
  MODIFY `support_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `userpreferences`
--
ALTER TABLE `userpreferences`
  MODIFY `user_likes_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `watchlist`
--
ALTER TABLE `watchlist`
  MODIFY `watchlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
