-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 16, 2023 at 07:31 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `news_cat`
--

CREATE TABLE `news_cat` (
  `news_cat_id` int(11) NOT NULL,
  `news_cat_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `post` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_cat`
--

INSERT INTO `news_cat` (`news_cat_id`, `news_cat_name`, `post`) VALUES
(43, 'Education technology', 1),
(42, 'SCIENCE', 0),
(41, 'Technology', 4);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(55, 'LinkedIn Releases New AI Tool to Help Create Your Profile', '                    LinkedIn is using generative AI to simplify the process of writing job listings, filling out resumes, and updating your profile, the company announced on Wednesday. The new feature will be similar to ChatGPT and the company said in a press release that it will “unlock opportunities” and “elevate your career.”\r\nThe AI option will provide suggestions in the “About” section and the “Headline” section on each profile, taking over for the user who would otherwise likely spend ample time trying to best describe their accomplishments. Although the new AI tool is meant to streamline the writing process, the company still recommends reading through the generated information and fact-checking it to ensure it reflects the intended theme and style.\r\nLinkedIn is testing the AI tool with premium subscribers, consisting of “some of LinkedIn’s most active members,” a LinkedIn spokesperson said in an email to Gizmodo. She added the members “can provide feedback as we continue to iterate and evolve the tool” and will continue to roll out to the remaining premium user base over the next several months.\r\nFor premium subscribers who are listing job postings, the company will also make it easier to write and upload the job description. The process is marketed as a fairly simple one, requiring the user to provide basic information about the position, including the job title and the name of the company. The AI tool will then generate a job description based on the prompts provided and will allow the user to review and edit before posting the job listing.\r\nTomer Cohen, the Chief Product Officer at LinkedIn, said in the release, “I am excited to introduce new AI-powered experiences, leveraging the most advanced OpenAI GPT models, as we continue to look for ways to create more value for our members and customers.”\r\nCohen said the company is introducing a surprising addition to the company’s AI-themed news, saying the site will now offer more than 100 AI classes. The classes will be available to all LinkedIn users, free of charge, until June 15, 2023, and will include “What is Generative AI,” “Introduction to Prompt Engineering for Generative AI,” “Introduction to Conversational AI,” and Cohen’s course, “Generative AI for Business Leaders.”\r\nThe LinkedIn spokesperson said the courses will remain “available and free to all, regardless of if you subscribe to LinkedIn Learning or even have a LinkedIn profile.” However, after the period ends, the classes will continue to be available to LinkedIn Learning subscribers and will be included in the Premium subscription.\r\nCohen confirmed in the press release that the company will also roll out an additional 20 Generative AI courses to help users “stay ahead of the curve and acquire the skills needed to succeed in today’s job market,” and said LinkedIn will continue to learn, grow, and leverage AI and other technologies based on the user’s needs.                ', '41', '16 Mar, 2023', 8, '1678943639-t2.png'),
(54, 'Microsoft Is Signing Deals to Bring Activision Games to Even More Services', 'As part of Microsoft\'s ongoing efforts to convince regulatory agencies that its planned acquisition of Activision Blizzard is a good idea, it has now announced 10-year partnerships with a couple of streaming platforms you might not have encountered before: Boosteroid and Ubitus.\r\nA quick recap: Sony is not thrilled with the idea of Microsoft owning Activision Blizzard, largely because of worries that it will make the Call of Duty series exclusive to Xbox consoles. To counter those concerns, Microsoft offered Sony a 10-year deal(opens in new tab) to keep the series on PlayStation, a proposal that Sony rejected. To demonstrate its seriousness, Microsoft then went about setting up 10-year Call of Duty agreements with various other big-time players in the business, including Steam(opens in new tab), Nintendo, and Nvidia(opens in new tab).\r\n\r\nThat is reportedly having a positive effect(opens in new tab) with EU regulators, but Microsoft isn\'t easing off the gas just yet. But with the major platforms (minus Sony) now accounted for, it\'s now taking aim at smaller-scale operators, like streaming platform Boosteroid(opens in new tab), which on March 14 announced an agreement to bring Xbox PC games to its platform—including Activision-Blizzard games once the acquisition is complete—and Ubitus(opens in new tab), which unveiled a similar deal today.\r\n\r\nBoth companies are well established: Ubitus, which is based in Japan, was founded in 2013, while the Ukrainian Boosteroid has been around since 2016. But it\'s fair to say that, in terms of reach and awareness, they\'re not in the same league as GeForce Now or Xbox Live. Even so, they\'re getting the big time treatment from Microsoft executives including Xbox boss Phil Spencer and Microsoft president Brad Smith.', '41', '16 Mar, 2023', 8, '1678943368-e1.png'),
(56, 'FTC lawyers want more info on Microsoft’s 10 year deals with Nintendo and Nvidia', 'The Federal Trade Commission (FTC) wants more information regarding Microsoft‘s recent agreements with Nintendo and Nvidia, as well as its exclusivity plans for content from both Zenimax and Activision Blizzard.\r\nThat’s according to new documents filed yesterday, which outlined issues the FTC has with some of the information Microsoft has presented to the governing body amid Microsoft’s proposed acquisition of Activision/Blizzard.\r\nThe FTC has requested that Microsoft produce details of the several agreements that it’s recently touted and has alleged that Microsoft intends to use these deals as a means to justify the acquisition to regulatory bodies.\r\n“Despite clearly intending to use these agreements in its defense, Microsoft has refused to produce underlying internal documents related to these agreements, or communications with third parties other than Nvidia, Nintendo and Sony,” it wrote. “Microsoft should be not permitted to introduce or rely on these agreements without producing the requested underlying discovery.”\r\nOn Wednesday, the Xbox owner announced it had signed yet another ten-year agreement to stream Xbox PC Games, as well as Activision Blizzard titles after the acquisition closes, with Japanese cloud gaming company Ubitus.\r\nThis follows a “binding 10-year legal agreement” to bring Call of Duty to Nintendo platforms, which the companies committed to last month, as well as Microsoft’s announcement that it plans to 10-year partnership with Nvidia to bring its Xbox PC games to GeForce Now.', '41', '16 Mar, 2023', 8, '1678943621-t3.png'),
(57, 'Mediterranean Diet Linked With 23% Lower Risk of Dementia', 'According to a study by Newcastle University, consuming a traditional Mediterranean diet consisting of foods such as seafood, fruit, and nuts may decrease the risk of developing dementia by up to 23%. This is one of the largest studies conducted on the topic, with previous studies being limited in sample size and dementia cases.\r\nEating a traditional Mediterranean-type diet – rich in foods such as seafood, fruit, and nuts – may help reduce the risk of dementia by almost a quarter, a new study has revealed.\r\nExperts at Newcastle University found that individuals who ate a Mediterranean-like diet had up to 23% lower risk for dementia than those who did not. \r\nThis research, published on March 14, 2023, in the journal BMC Medicine, is one of the biggest studies of its kind as previous studies have typically been limited to small sample sizes and low numbers of dementia cases.\r\nPriority for researchers\r\nScientists analyzed data from 60,298 individuals from the UK Biobank, a large cohort including individuals from across the UK, who had completed a dietary assessment.\r\nThe authors scored individuals based on how closely their diet matched the key features of a Mediterranean one. The participants were followed for almost a decade, during which time there were 882 cases of dementia.\r\nThe authors considered each individual’s genetic risk for dementia by estimating what is known as their polygenic risk – a measure of all the different genes that are related to the risk of dementia.\r\nDr. Oliver Shannon, Lecturer in Human Nutrition and Ageing, Newcastle University, led the study with Professor Emma Stevenson and joint senior author Professor David Llewellyn.\r\nThe research also involved experts from the universities of Edinburgh, UEA and Exeter and was part of the Medical Research Council-funded NuBrain consortium.\r\nDr. Shannon said: “Dementia impacts the lives of millions of individuals throughout the world, and there are currently limited options for treating this condition.', '41', '16 Mar, 2023', 8, '1678943853-s2.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_yourname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_username` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `user_email` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `user_pass` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_yourname`, `user_username`, `user_email`, `user_pass`, `user_role`) VALUES
(8, 'kayes Mohammad abdullah', 'kayes', 'agenceywork@gmail.com', '7be56ad8e8825b319fb6a7881edf3901', 1),
(17, 'Fatema', 'Fatema', 'fatema@gmail.com', '7265322e57f8c9ca7e80fc9f77c4f4d7', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news_cat`
--
ALTER TABLE `news_cat`
  ADD PRIMARY KEY (`news_cat_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news_cat`
--
ALTER TABLE `news_cat`
  MODIFY `news_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
