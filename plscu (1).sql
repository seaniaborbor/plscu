-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2024 at 08:16 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plscu`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(225) NOT NULL,
  `title` varchar(225) NOT NULL,
  `featureImg` varchar(225) NOT NULL,
  `postbody` longtext NOT NULL,
  `category` varchar(50) NOT NULL,
  `createdBy` varchar(100) NOT NULL,
  `createdAt` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `featureImg`, `postbody`, `category`, `createdBy`, `createdAt`) VALUES
(1, 'A Guide to Smart Saving and Investment Strategies', '1704034452_05c4052d865f9c3fc11f.jpg', '<p>In today&#39;s dynamic financial landscape, achieving true financial wellness requires a strategic and informed approach. In this insightful blog post, we delve into the key principles of smart saving and investment strategies to guide you on the path to financial prosperity.</p>\r\n\r\n<p><strong>1. The Art of Smart Saving:</strong> Discover effective saving techniques that go beyond the traditional piggy bank. From creating a budget to identifying areas for expense reduction, learn how to optimize your savings and build a stable financial foundation.</p>\r\n\r\n<p><strong>2. Investment Demystified:</strong> Venture into the world of investments with a breakdown of investment types, risk profiles, and potential returns. Whether you&#39;re a novice or seasoned investor, gain valuable insights into crafting an investment portfolio aligned with your financial goals.</p>\r\n\r\n<p><strong>3. Navigating Market Trends:</strong> Stay informed about the latest market trends and how they impact your financial decisions. Explore strategies to capitalize on opportunities, mitigate risks, and adapt your financial plan to the ever-changing economic landscape.</p>\r\n\r\n<p><strong>4. The Role of PLSCU in Your Financial Journey:</strong> Learn how Possible Loan Service Credit Union plays a pivotal role in supporting your financial wellness. From competitive rates to personalized guidance, discover the unique advantages of being a member of our community-focused credit union.</p>\r\n\r\n<p>Embark on a journey toward financial well-being as we unravel the intricacies of smart saving and investment strategies. Equip yourself with the knowledge needed to make informed financial decisions and pave the way for a more secure and prosperous future.</p>\r\n', 'Financial Motivation', 'marie@gmail.com', '2023-12-31'),
(2, 'A Step-by-Step Guide to Mastering Money Matters', '1704034957_949644b818765e0673a5.jpg', '<p>In today&#39;s dynamic financial landscape, achieving true financial wellness requires a strategic and informed approach. In this insightful blog post, we delve into the key principles of smart saving and investment strategies to guide you on the path to financial prosperity.</p>\r\n\r\n<p><strong>1. The Art of Smart Saving:</strong> Discover effective saving techniques that go beyond the traditional piggy bank. From creating a budget to identifying areas for expense reduction, learn how to optimize your savings and build a stable financial foundation.</p>\r\n\r\n<p><strong>2. Investment Demystified:</strong> Venture into the world of investments with a breakdown of investment types, risk profiles, and potential returns. Whether you&#39;re a novice or seasoned investor, gain valuable insights into crafting an investment portfolio aligned with your financial goals.</p>\r\n\r\n<p><strong>3. Navigating Market Trends:</strong> Stay informed about the latest market trends and how they impact your financial decisions. Explore strategies to capitalize on opportunities, mitigate risks, and adapt your financial plan to the ever-changing economic landscape.</p>\r\n\r\n<p><strong>4. The Role of PLSCU in Your Financial Journey:</strong> Learn how Possible Loan Service Credit Union plays a pivotal role in supporting your financial wellness. From competitive rates to personalized guidance, discover the unique advantages of being a member of our community-focused credit union.</p>\r\n\r\n<p>Embark on a journey toward financial well-being as we unravel the intricacies of smart saving and investment strategies. Equip yourself with the knowledge needed to make informed financial decisions and pave the way for a more secure and prosperous future.</p>\r\n', 'Financial Motivation', 'tpb@gmail.com', '2023-12-31'),
(3, ' \"The ABCs of Credit Unions: .. the Advantages\"', '1704035422_752dbbb81427c6de2fde.jpg', '<p>Curious about the unique world of credit unions and how they stand out in the financial realm? In this comprehensive blog post, we unpack the ABCs of credit unions, exploring their distinctive advantages and a wide array of member-focused services.</p>\r\n\r\n<p><strong>1. Community-Centric Philosophy:</strong> Delve into the core principles of credit unions, where community and collaboration take center stage. Discover how credit unions, like PLSCU, prioritize the well-being of their members and the communities they serve.</p>\r\n\r\n<p><strong>2. Competitive Rates and Financial Products:</strong> Uncover the competitive rates and diverse financial products offered by credit unions. From savings accounts to loans, explore the variety of services designed to meet the unique needs of members while maintaining a member-first approach.</p>\r\n\r\n<p><strong>3. Personalized Member Services:</strong> Experience the personalized touch of credit unions as we highlight the member-centric services that set them apart. From tailored financial guidance to accessible customer support, understand how credit unions prioritize the well-being of every individual.</p>\r\n\r\n<p><strong>4. Social Responsibility and Community Impact:</strong> Explore the social responsibility initiatives undertaken by credit unions. Learn how these financial institutions actively contribute to community development, supporting local causes and creating a positive impact beyond traditional banking services.</p>\r\n\r\n<p>Embark on a journey of discovery as we unravel the distinctive features and benefits that credit unions bring to the financial landscape. Gain a deeper understanding of why credit unions, particularly PLSCU, continue to be a preferred choice for individuals seeking a more personalized and community-driven banking experience.</p>\r\n', 'Financial Motivation', 'marie@gmail.com', '2023-12-31'),
(4, ' How Wealthy Individuals Approach Success', '1704037759_7fc30af3e3ac563153b0.jpg', '<p>&nbsp;</p>\r\n\r\n<p><strong>Introduction:</strong> Achieving financial success is often attributed to more than just luck or circumstance. The mindset of the rich plays a pivotal role in shaping their journey to prosperity. In this article, we&#39;ll explore the key traits and perspectives that distinguish the wealthy, offering insights into how their thinking contributes to their financial achievements.</p>\r\n\r\n<p>**1. <strong>Visionary Goal Setting:</strong> Wealthy individuals are known for setting ambitious, clear, and long-term goals. They have a vision for their future and meticulously plan the steps required to turn that vision into reality. Whether in business, investments, or personal development, rich individuals approach goal setting with strategic intent.</p>\r\n\r\n<p>**2. <strong>Embracing Risk and Innovation:</strong> The wealthy understand that calculated risks are often necessary for significant rewards. They embrace innovation and are willing to explore new ventures, recognizing that success often lies outside of comfort zones. This mindset fosters a culture of continuous learning and adaptability.</p>\r\n\r\n<p>**3. <strong>Focus on Assets and Investments:</strong> Unlike a spending-centric mindset, the wealthy prioritize accumulating assets and making strategic investments. They understand the value of growing their wealth over time, leveraging assets to generate passive income, and making informed investment decisions.</p>\r\n\r\n<p>**4. <strong>Continuous Learning and Self-Improvement:</strong> The rich are avid learners, investing time and resources into expanding their knowledge. They read books, attend seminars, and seek advice from experts in various fields. This commitment to continuous learning enhances their decision-making abilities and keeps them at the forefront of industry trends.</p>\r\n\r\n<p>**5. <strong>Building Multiple Income Streams:</strong> Wealthy individuals understand the importance of diversifying their income streams. They create multiple avenues for generating wealth, whether through business ventures, investments, or passive income sources. This approach provides financial stability and resilience.</p>\r\n\r\n<p>**6. <strong>Strategic Networking:</strong> The rich value strategic relationships and networking. They understand the power of connecting with like-minded individuals, mentors, and experts in their industry. Networking opens doors to opportunities, insights, and collaborations that contribute to their overall success.</p>\r\n\r\n<p><strong>Conclusion:</strong> The mindset of the rich is characterized by a combination of visionary thinking, calculated risk-taking, and a commitment to continuous improvement. Adopting some of these key principles can pave the way for individuals to cultivate their own path to financial success. While wealth is certainly multifaceted, understanding the mindset of the rich offers valuable insights for those aspiring to achieve their financial goals.</p>\r\n', 'Financial Motivation', 'fake@gmail.com', '2023-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment` longtext NOT NULL,
  `postId` int(225) NOT NULL,
  `posted_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `name`, `email`, `comment`, `postId`, `posted_at`) VALUES
(1, 'Tarnue', 'admin@gmail.com', 'This is amazing to see my self commenting on my own application like hell', 2, '2023-12-25'),
(3, 'Prince Bunah', 'admin@gmail.com', 'it is so amazing and very much good. What a nice application to use in this kindo of eara. You\'re doing well&lt;script&gt;alert(\'ok\')&lt;/script&gt;', 2, '2023-12-25'),
(4, 'Tarnue', 'mathematics104@gmail.com', 'Thank you for the comments and I lookforward to hearing from you', 2, '2023-12-25'),
(5, 'Tarnue', 'mathematics104@gmail.com', 'Thank you for the comments and I lookforward to hearing from you', 2, '2023-12-25'),
(6, 'Tarnue', 'garmai@gmail.com', 'it is so amazing and very much good. What a nice application to use in this kindo of eara. You\'re doing well&lt;script&gt;alert(\'ok\')&lt;/script&gt;', 2, '2023-12-25'),
(7, 'Tarnue', 'admin@gmail.com', 'This Article is very helpful and I look forward to getting more content like this. ', 4, '2024-01-06');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(225) NOT NULL,
  `post_category` varchar(20) NOT NULL,
  `description` varchar(225) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `post_category`, `description`, `createdAt`) VALUES
(1, 'Financial Motivation', 'Posts related to financial mind set', '2023-12-31 13:40:32'),
(2, 'Growth', 'A posts related to financial growth', '2023-12-31 13:41:30'),
(3, 'PLSCU Updates', 'Posts related to PLSCU', '2023-12-31 13:42:18');

-- --------------------------------------------------------

--
-- Table structure for table `due_pmt_log`
--

CREATE TABLE `due_pmt_log` (
  `id` int(11) NOT NULL,
  `mem_serial_no` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `due_amount` decimal(10,2) DEFAULT NULL,
  `due_currency` text NOT NULL,
  `recordedBy` int(10) NOT NULL,
  `recordedDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_edited_date` datetime NOT NULL,
  `last_edited_by` text NOT NULL,
  `approved_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` varchar(225) NOT NULL,
  `answer` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`) VALUES
(1, 'How do I become a member of PLSCU?', ' Becoming a member is easy! Simply visit our website, click on the \'Join Now\' button, and follow the straightforward registration process. If you prefer a personal touch, visit our nearest branch, and our friendly staff will assist you in becoming a part of the PLSCU community.'),
(2, 'What benefits come with PLSCU membership?', ' PLSCU membership comes with a range of benefits, including competitive interest rates, personalized financial guidance, access to exclusive services, and participation in community-building initiatives. We are dedicated to ensuring our members experience financial empowerment and success.'),
(3, 'How does PLSCU prioritize data security?', 'At PLSCU, safeguarding your data is a top priority. We employ state-of-the-art security measures, including encryption and secure protocols, to protect your personal and financial information. Rest assured, your data privacy is at the forefront of our commitment.'),
(4, 'Can I access my PLSCU account online?', 'Absolutely! Our online banking platform allows you to conveniently access your PLSCU account from anywhere, anytime. Enjoy features such as checking balances, transferring funds, and managing transactions securely through our user-friendly online portal or mobile app. Your financial control is just a click away!');

-- --------------------------------------------------------

--
-- Table structure for table `loan_application`
--

CREATE TABLE `loan_application` (
  `id` int(225) NOT NULL,
  `fullName` varchar(225) NOT NULL,
  `gender` text NOT NULL,
  `applicantImg` varchar(225) NOT NULL,
  `phone` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(225) NOT NULL,
  `loanAmount` decimal(10,2) DEFAULT NULL,
  `currency` text NOT NULL,
  `loanStartDate` date NOT NULL,
  `loanEndDate` date NOT NULL,
  `interestRate` int(3) NOT NULL,
  `serial_no` varchar(8) NOT NULL,
  `loanCategory` text NOT NULL,
  `loan_aggrement_form` varchar(225) NOT NULL,
  `regBy` varchar(50) NOT NULL,
  `lstEdited` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pmtStatus` text NOT NULL,
  `approv_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_application`
--

INSERT INTO `loan_application` (`id`, `fullName`, `gender`, `applicantImg`, `phone`, `email`, `address`, `loanAmount`, `currency`, `loanStartDate`, `loanEndDate`, `interestRate`, `serial_no`, `loanCategory`, `loan_aggrement_form`, `regBy`, `lstEdited`, `pmtStatus`, `approv_status`) VALUES
(6, 'James Kollie', 'Male', '1704666931_69a75a94705b8878abf6.png', '08886102312', 'admin@gmail.com', 'new georgia gulf', '5555.00', 'LRD', '2024-01-09', '2024-01-18', 6, 'kFUH4s', 'Agricultural', '1704666931_b824ff80ac2f886a27e0.pdf', '1', '2024-01-07 22:36:23', 'In-Progress', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `loan_pmt_log`
--

CREATE TABLE `loan_pmt_log` (
  `id` int(11) NOT NULL,
  `serial_no` varchar(10) NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `pmtCurrency` text NOT NULL,
  `loggedBy` int(10) NOT NULL,
  `isApproved` text NOT NULL,
  `loggedDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_pmt_log`
--

INSERT INTO `loan_pmt_log` (`id`, `serial_no`, `amount`, `pmtCurrency`, `loggedBy`, `isApproved`, `loggedDate`) VALUES
(3, 'kFUH4s', '44.00', 'LRD', 1, 'Approved', '2024-01-08 00:21:39'),
(4, 'kFUH4s', '55.00', 'LRD', 1, 'Approved', '2024-01-08 00:28:07');

-- --------------------------------------------------------

--
-- Table structure for table `membership_applicants`
--

CREATE TABLE `membership_applicants` (
  `id` int(5) UNSIGNED NOT NULL,
  `fullName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `membership_category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `memberSerialNo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profileImg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposite_unit` decimal(10,2) DEFAULT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regFees` decimal(10,2) DEFAULT NULL,
  `regFeesStatus` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountStatus` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saving_year` date DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `registeredBy` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pmt_log`
--

CREATE TABLE `pmt_log` (
  `id` int(11) NOT NULL,
  `due_acc_no` varchar(10) NOT NULL,
  `due_amount` decimal(10,0) NOT NULL,
  `due_pmtCurrency` text NOT NULL,
  `due_loggedBy` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(225) NOT NULL,
  `title` varchar(225) NOT NULL,
  `shceenshoti` varchar(225) NOT NULL,
  `shceenshotii` varchar(225) NOT NULL,
  `shceenshotiii` varchar(225) NOT NULL,
  `snippet` varchar(225) NOT NULL,
  `postbody` longtext NOT NULL,
  `category` varchar(50) NOT NULL,
  `client` text NOT NULL,
  `url` varchar(225) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `title`, `shceenshoti`, `shceenshotii`, `shceenshotiii`, `snippet`, `postbody`, `category`, `client`, `url`, `createdAt`) VALUES
(1, 'PLSCU Launches Daily Saving Services', '1704031149_7b5f3dfac194f491e083.jpg', '1704031149_34ccfd4da66d4ebd52ba.jpg', '1704031149_5a19610009c1488ccc85.jpg', 'PLSCU launches its groundbreaking Daily Saving Services, empowering members to effortlessly build wealth every day', '<p><strong>Details:</strong> We are thrilled to introduce PLSCU&#39;s Daily Saving Services, a revolutionary offering designed to make wealth-building a daily habit. Here&#39;s what you can expect:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Effortless Wealth Building:</strong> Our Daily Saving Services simplify the process of wealth accumulation. Members can seamlessly integrate daily savings into their routine, turning small efforts into significant financial gains.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>User-Friendly Platform:</strong> Experience convenience at your fingertips. Our user-friendly platform allows you to set, track, and manage your daily savings goals with ease. Navigate effortlessly through the app or website to stay in control of your financial journey.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Flexible Options:</strong> Tailor your daily savings experience to suit your unique financial goals. Whether you&#39;re saving for a specific target or building a general financial cushion, our flexible options cater to your needs.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Embark on a transformative financial journey with PLSCU&#39;s Daily Saving Services. It&#39;s time to redefine the way you save and witness the impact of daily contributions on your long-term financial success.</p>\r\n', 'PLSCU Updates', 'PLSCU', 'http://www.test.com', '2023-12-31 13:59:09'),
(2, 'PLSCU disburses over 2,000,000 LD among members, fueling business empowerment', '1704031532_6f3c264c796d96872ffd.jpg', '1704031532_78b6da557506b285ead2.jpg', '1704031532_dc322a1f854ac1c5d906.jpg', 'Witness the impact as we invest in your dreams and contribute to the growth of our vibrant community.', '<p>In a remarkable move towards community empowerment, PLSCU proudly announces the disbursement of over 2,000,000 Liberian Dollars among our members. This significant investment aims to boost business empowerment and contribute to the economic prosperity of our community. Here&#39;s what makes this initiative noteworthy:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Direct Impact on Businesses:</strong> The disbursed funds are specifically allocated to support members&#39; businesses, fostering growth and sustainability.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Community Prosperity:</strong> As we invest in the dreams of our members, we collectively contribute to the overall economic well-being of our community.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Transparent and Inclusive:</strong> PLSCU&#39;s commitment to transparency ensures that every member understands how these funds are utilized, fostering trust and accountability.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Celebrate with us as we witness the positive ripple effect of this disbursement, marking a pivotal moment in the journey towards financial empowerment and community development.</p>\r\n', 'PLSCU Updates', 'PLSCU', 'http://www.test.com', '2023-12-31 14:05:32'),
(3, ' PLSCU launches Financial Management Training for youths', '1704032152_b2876621f990bc1661f8.jpg', '1704032152_fdc8c5e881bf443640ef.jpg', '1704032152_1030e322ba5bafbd0afc.png', 'Unleash the potential of informed financial decision-making, setting the stage for a future of financial literacy and prosperity', '<p>In a dedicated effort to equip the youth with essential life skills, PLSCU is proud to announce the launch of Financial Management Training. Here&#39;s what this initiative entails:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Youth Empowerment:</strong> The training program is tailored to empower young minds with the knowledge and skills needed to make informed financial decisions, fostering a sense of independence and responsibility.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Holistic Learning:</strong> Covering key aspects of financial management, the program goes beyond traditional education, providing practical insights and real-world applications.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Interactive Workshops:</strong> Engaging workshops and interactive sessions create an environment where youths can actively participate, share experiences, and gain practical insights into managing their finances.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Join us in shaping a future where financial literacy is a cornerstone of success. The launch of Financial Management Training signifies our commitment to nurturing a generation of financially savvy and empowered individuals.</p>\r\n', 'Growth', 'PLSCU', 'http://www.test.com', '2023-12-31 14:15:52'),
(4, 'Own a piece of your financial future! ', '1704033715_9fa5ee3174667fbae522.jpg', '1704033715_55907e5bd1cd105bf1f0.jpg', '1704033715_424c7dfce26b42367d7d.jpg', 'PLSCU proudly launches Share Holding, providing members with an opportunity to invest in their own success.', '<p>PLSCU is excited to introduce Share Holding, a groundbreaking initiative that allows our members to become stakeholders in their financial journey. Here&#39;s what you need to know:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Invest in Your Success:</strong> Share Holding enables members to become shareholders, fostering a sense of ownership and aligning individual success with the collective prosperity of the credit union.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Flexible Investment Options:</strong> Choose the investment plan that suits your financial goals. Share Holding offers flexible options to accommodate various preferences and investment horizons.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Member-Centric Approach:</strong> This initiative reflects our commitment to putting members first, offering them an active role in the credit union&#39;s success and future endeavors.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Embark on a journey of financial empowerment with PLSCU Share Holding. Seize the opportunity to invest in your success and contribute to the sustained growth of our thriving financial community.</p>\r\n', 'Growth', 'PLSCU', 'http://www.test.com', '2023-12-31 14:41:55');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `service_summary` varchar(225) NOT NULL,
  `service_detail` longtext NOT NULL,
  `service_icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_summary`, `service_detail`, `service_icon`) VALUES
(1, 'Saving with interest', 'Watch your savings multiply effortlessly with our \'Saving with Interest\' service. Earn competitive rates, turning financial goals into reality. ', 'Interest Rates: Enjoy competitive interest rates that maximize your savings. Flexible Options: Choose from a range of flexible saving plans tailored to meet your unique needs. Automatic Growth: Your savings work for you as interest accrues, providing a passive income stream. Easy Access: Access your savings when you need them, ensuring both growth and liquidity. Security: Your savings are secure with us, backed by our commitment to financial stability.', 'bi-currency-dollar'),
(2, 'Daily Saving (Susu)', 'This personalized savings solution empowers you to set aside a small amount daily, fostering a habit of consistent saving for a secure future.', 'How it Works: Easily deposit a small, affordable amount daily into your Susu account. Financial Discipline: Cultivate a habit of regular saving to build a robust financial foundation. Flexible and Accessible: Our Daily Saving (Susu) service is designed to accommodate various income levels, ensuring financial inclusion for all. Secure and Transparent: Benefit from a secure platform with transparent transactions, providing peace of mind.', 'bi-wallet2'),
(3, 'Marketing', 'Fuel your brand\'s success with our dynamic Marketing services. From strategic campaigns to compelling content, we specialize in elevating your brand presence.', 'Our Marketing services encompass a comprehensive range of strategies designed to enhance brand visibility and drive results. Whether you\'re launching a new product, rebranding, or seeking to boost your online presence, our expert team is dedicated to delivering tailored solutions. We specialize in:  Strategic Campaigns: Craft impactful marketing campaigns aligned with your business objectives. From conceptualization to execution, we ensure each campaign maximizes reach and resonates with your target audience.  Content Creation: Elevate your brand narrative with compelling content. Our team develops engaging and relevant content across various platforms, including social media, blogs, and newsletters, to establish a strong connection with your audience.  Digital Marketing: Leverage the digital landscape with our expertise in online marketing. From SEO and SEM to social media management, we employ data-driven strategies to enhance your online visibility and drive organic growth.  Branding: Establish a distinctive brand identity that leaves a lasting impression. Our branding services include logo design, brand messaging, and visual elements that reflect the essence of your business.  Analytics and Optimization: Measure the impact of your marketing efforts with detailed analytics. We provide insights into campaign performance, allowing you to refine strategies for continuous improvement.', 'bi-bullseye');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(225) NOT NULL,
  `fullName` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `passwd` varchar(225) NOT NULL,
  `userRole` varchar(10) NOT NULL,
  `profession` varchar(30) NOT NULL,
  `fbHandle` varchar(225) NOT NULL,
  `xHandle` varchar(225) NOT NULL,
  `linkinHandle` varchar(225) NOT NULL,
  `profileImg` varchar(225) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `fullName`, `email`, `passwd`, `userRole`, `profession`, `fbHandle`, `xHandle`, `linkinHandle`, `profileImg`, `createdAt`) VALUES
(1, 'Tamba Bundor', 'admin@gmail.com', '$2y$10$hHnWv2QTGSFLkhTCvGfIduhsmyT30egxSeLZF6YfCPMi1D8lTZ7Vu', 'SUDO', 'Chairman, Board of Director', 'http://facebook.com/tarnuea', '', '', '1703992888_372fcc6a5ec5c481edac.png', '2023-12-24 15:36:34'),
(2, 'Kebbeh Sakui ', 'jane@gmail.com', '$2y$10$I9Zx2/lxqWjLeRTVcSNXjuC50uDcPOQA1YiuZzR8qamQXDpkV/4ru', 'USER', 'Vice Chair, Board of Directors', 'http://facebook.com/tarnuevv', '', '', '1703993013_d555799c4bd17a67e887.png', '2023-12-24 15:38:34'),
(3, 'Fayiah A. Korkor Sr', 'tpb@gmail.com', '$2y$10$UwmKcL.VWxisRTH.cFswFOIJGaEY5HeazG60bsoPepiFwmx0iFmmW', 'USER', 'Secretary, Board of Directors', 'http://facebook.com/tarnueg', '', '', '1703993104_0f84e69f743b9cb588b6.png', '2023-12-24 15:40:21'),
(4, 'Deddeh H. Kollie ', 'fake@gmail.com', '$2y$10$w6gXy41pYWIpiurglirfpebCtR86ahAUPPFvzwXrYLmUj2rlEfAYe', 'USER', 'Member, Board of Directors', 'http://facebook.com/tarnuevvefd', '', '', '1703993164_6a5e0959fbb2d83ca446.png', '2023-12-24 15:45:49');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `customer_title` varchar(30) NOT NULL,
  `customer_testimoney` varchar(225) NOT NULL,
  `customer_pic` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `customer_name`, `customer_title`, `customer_testimoney`, `customer_pic`) VALUES
(1, 'John D.', 'Homeowner', '\"Possible Loan Service Credit Union is a game-changer for my business. Seamless loans and personalized advice fueled our growth. Their dedicated team truly cares about our success.\"', '1703409327_de6492a3402cff61be9b.jpg'),
(2, 'Sarah M', 'Business Owner', '\"Possible Loan Service Credit Union made my dream of homeownership a reality. Competitive rates and a supportive staff ensured a smooth and stress-free homebuying process. I\'m now a proud homeowner.\"', '1703409545_7a88251d0e0cbefdd796.jpg'),
(3, 'David F', 'Environment Enthusiast:', '\"Being part of Possible Loan Service Credit Union transformed my financial approach. From educational workshops to practical savings plans, they\'ve equipped me for a secure future. PLSCU\'s sense of community sets them apart. ', '1703411725_35010d3d35849ccb8c35.jpg'),
(4, 'Lisa H', 'Landscape Lover', '\"The professionalism and reliability of Possible Loan Service Credit Union have exceeded my expectations. Their commitment to financial education and diversified investment options make them the perfect choice for anyone look', '1703411814_5157883bbbfba9a5b19d.jpg'),
(5, 'Frances S', 'Pavement Perfectionist', '\"Choosing Possible Loan Service Credit Union for my home financing was a wise decision. Their personalized approach and transparent processes made the entire experience positive. PLSCU truly understands and caters to the indi', '1703411867_41bfcdf39ae2a596f22d.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `due_pmt_log`
--
ALTER TABLE `due_pmt_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_application`
--
ALTER TABLE `loan_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_pmt_log`
--
ALTER TABLE `loan_pmt_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership_applicants`
--
ALTER TABLE `membership_applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pmt_log`
--
ALTER TABLE `pmt_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `due_pmt_log`
--
ALTER TABLE `due_pmt_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `loan_application`
--
ALTER TABLE `loan_application`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `loan_pmt_log`
--
ALTER TABLE `loan_pmt_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `membership_applicants`
--
ALTER TABLE `membership_applicants`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pmt_log`
--
ALTER TABLE `pmt_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
