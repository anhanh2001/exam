-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 11, 2021 at 03:07 PM
-- Server version: 8.0.26-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_05_033305_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(18, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 8),
(15, 'App\\Models\\User', 10),
(15, 'App\\Models\\User', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Thêm câu hỏi', 'web', NULL, NULL),
(2, 'Sửa câu hỏi', 'web', NULL, NULL),
(3, 'Xóa câu hỏi', 'web', NULL, NULL),
(4, 'Tạo bài thi', 'web', NULL, NULL),
(10, 'Thêm tài khoản', 'web', '2021-10-10 19:50:30', '2021-10-10 19:50:30'),
(11, 'Sửa tài khoản', 'web', '2021-10-10 19:50:42', '2021-10-10 19:50:42'),
(12, 'Xóa tài khoản', 'web', '2021-10-10 19:50:49', '2021-10-10 19:50:49'),
(13, 'Làm bài thi', 'web', '2021-10-10 20:09:54', '2021-10-10 20:09:54');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer_1` varchar(255) NOT NULL,
  `answer_2` varchar(255) NOT NULL,
  `answer_3` varchar(255) NOT NULL,
  `answer_4` varchar(255) NOT NULL,
  `correct_answer` int NOT NULL,
  `point_question` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `answer_1`, `answer_2`, `answer_3`, `answer_4`, `correct_answer`, `point_question`, `created_at`, `updated_at`) VALUES
(1, 'Est laudantium est ipsam eum. Et et quia amet occaecati. Incidunt illum tempora est.', 'Aliquid sit dolor impedit saepe non. Molestias cupiditate velit veritatis atque. Atque quo eum vero. Ipsum et neque qui deserunt eos repudiandae et.', 'Voluptas ratione illo cumque illo dolores sed est voluptatem. Omnis modi veniam totam ut numquam cumque architecto. Dolor porro dolores eos harum.', 'Dolorem deleniti expedita deleniti earum. Tempora aliquam eos quo sed aut omnis maxime est. Odit maxime libero eos repellendus neque. Accusamus autem ipsum eos ut porro aliquid in quia.', 'Veniam et totam dolores delectus dolorem. Corporis sint provident adipisci nam nesciunt aut praesentium. Eum eos dolore sint voluptatem et repudiandae. A quia sed ducimus officiis ipsum.', 2, 2, '2021-10-06 19:06:31', '2021-10-06 19:06:31'),
(2, 'Distinctio in voluptatum culpa eaque. Voluptas ex tempore qui natus occaecati repudiandae ut. Neque mollitia esse mollitia.', 'Minus rerum consequatur consequuntur nam architecto ut est. Eius quos quaerat omnis hic eius eius. Rerum quia voluptate corporis qui maiores voluptas qui harum.', 'Ut voluptatem dolore nulla. Voluptate minima et corrupti aut. Consectetur quo velit quia molestiae rerum alias quasi tempore.', 'Aut nobis in aliquid amet voluptatem et. Nobis quas et eaque sed quos voluptates. Aliquid rerum quod recusandae id velit. Soluta et non ut accusamus assumenda quibusdam.', 'Qui rerum reprehenderit architecto reiciendis ea inventore id. Sint aut atque at commodi atque dolores non velit. Voluptatem nemo sequi autem.', 4, 2, '2021-10-06 19:06:31', '2021-10-06 19:06:31'),
(3, 'Nemo exercitationem et aut eum. Consequatur at ut dignissimos eaque natus. Eaque et alias natus animi quibusdam libero.', 'Qui omnis quia temporibus itaque. Omnis animi veniam eligendi. Quam nostrum ab aut est est expedita qui. Qui repellendus ipsa maiores vero quia. Officia odit consequatur quis dolorem molestiae.', 'Nulla facere impedit id libero. Nobis quasi et repellat veritatis facere. Et hic omnis laborum dolorum voluptas. Molestias sit nihil magnam ipsum dolorem deleniti assumenda.', 'Voluptates dolor praesentium mollitia ea soluta. Voluptatem a laborum harum voluptatibus dolorem consequatur soluta suscipit. Doloribus quibusdam et minus distinctio deserunt velit.', 'Repellendus quis similique enim. Numquam ipsam pariatur eveniet perferendis enim beatae. Non maiores saepe beatae accusamus cum. Quos aut eaque beatae nisi aut.', 4, 2, '2021-10-06 19:06:31', '2021-10-06 19:06:31'),
(4, 'Quaerat veritatis modi quia sint nam maiores et consequuntur. Quia delectus necessitatibus qui ducimus deleniti et et. Ullam earum expedita sit ab laboriosam. Ratione voluptatem adipisci sint et.', 'Quaerat qui velit rerum optio id dolor quos. Molestias voluptatum qui eos voluptatem.', 'Minima placeat esse explicabo explicabo sint ut. Id aut voluptatem et. Deleniti repellat nam eaque eligendi id. Laudantium aut in consectetur facilis eligendi rem autem et.', 'Et ipsam voluptate fugiat. Earum eius praesentium ut atque. At cum earum cupiditate ut labore qui.', 'Et magnam illum tempora aperiam quis. Aliquam quasi dolore quia consequatur doloremque sequi. Enim aut ut non dolor rerum sit ea. Doloremque sit atque dolores est necessitatibus iure et dicta.', 2, 2, '2021-10-06 19:06:31', '2021-10-06 19:06:31'),
(5, 'Qui voluptas possimus reiciendis nihil sit totam. Dolores et facilis perferendis non tempora quaerat impedit. Tempora in qui eos ad recusandae. Modi eligendi atque et sit consequatur repellendus et.', 'Consequatur provident voluptatem maxime ut nemo. Aut non qui alias reiciendis sunt qui. Pariatur eum fuga ut.', 'Voluptatem omnis iusto veniam necessitatibus provident. Nulla ut corporis qui sint. Recusandae voluptas sit eius. Nulla cumque exercitationem praesentium quasi.', 'Dolores debitis qui et est. Et eveniet vel aut dolore. Qui voluptatem quasi ab iste. Omnis earum excepturi mollitia quos. Deleniti veniam odio et.', 'Sunt atque unde inventore est. Saepe voluptatem qui placeat consequatur rem. Earum occaecati deleniti porro qui laborum.', 4, 2, '2021-10-06 19:06:31', '2021-10-06 19:06:31'),
(6, 'Neque quis possimus vitae qui. Voluptatem facilis qui vel soluta. Nostrum suscipit consectetur nihil fuga.', 'Expedita est id est commodi. Ducimus dolor animi temporibus cum ut aut est. Nisi at et voluptatem magni sed et. Omnis dolorum iure nostrum et qui. Sed quibusdam dolor quae sunt fugit sequi aut.', 'Iusto officia et aspernatur facere quia. Et architecto quod ipsum perspiciatis ea. Possimus dolor tempore ducimus nostrum omnis sit.', 'Accusantium et ab ratione illum. Molestiae qui rem vero aut vero vitae mollitia magni. Esse id ut dignissimos et quibusdam aut laudantium.', 'Et tempora inventore omnis culpa. Sed neque ut quo nihil saepe omnis. Ducimus assumenda est sunt mollitia.', 4, 2, '2021-10-06 19:06:31', '2021-10-06 19:06:31'),
(7, 'Repudiandae qui voluptatem consequatur nam. Quos aperiam reiciendis distinctio voluptatum deserunt. Et perspiciatis totam placeat velit eius.', 'Harum placeat aut at tempora aut dignissimos aut. Repellat expedita expedita atque in. Autem maxime ut non sint. Qui aut magnam quae culpa.', 'Et laboriosam et et odio expedita vel doloribus. Et aliquid sunt nostrum officia adipisci animi sed. Iure aut amet velit.', 'Sit nesciunt reprehenderit quia magnam. Sit esse ut tempora ab at asperiores dolorem. Facere eius sunt ipsa voluptatem quidem illo distinctio. Vel nihil est quia eos.', 'Quas rerum id odit et non. Veniam ut expedita officia omnis cupiditate nulla eius. Vel debitis quia dignissimos voluptatibus aut ex molestiae. Facilis id id blanditiis non tempora cupiditate dolore.', 1, 2, '2021-10-06 19:06:31', '2021-10-06 19:06:31'),
(8, 'Ipsa et laboriosam neque ut praesentium pariatur. Ut accusamus quam provident voluptatem impedit similique. Qui enim similique inventore.', 'Ut qui ullam ipsam. Illo aliquid et nesciunt quia dolorem excepturi quas incidunt. Ipsa nobis qui modi quo perspiciatis eveniet.', 'Velit nihil expedita atque et labore. Non blanditiis veniam porro vel cum qui. Eum rerum occaecati exercitationem est. Voluptatum quia quia mollitia sed debitis dolorem.', 'Earum nobis rerum temporibus et quia. Veritatis rerum sed vitae. Earum doloribus aut molestiae ullam voluptates delectus rerum.', 'Commodi nam consequatur magni impedit. Omnis eveniet asperiores eaque officia temporibus fugit. Occaecati amet et exercitationem officiis.', 2, 2, '2021-10-06 19:06:31', '2021-10-06 19:06:31'),
(9, 'Eius temporibus incidunt quo incidunt explicabo voluptatem sit. Voluptatem saepe odit praesentium culpa suscipit.', 'Rerum alias est sit tenetur non. Dolores rem dolores sed. Facilis ipsa id et beatae neque nobis totam. Id ipsam veniam qui quo. Placeat voluptate repellat tempore.', 'Delectus accusantium nobis quia possimus doloribus qui. Dolorum doloribus quia provident sequi necessitatibus quibusdam in. Eaque sit ut neque sint laudantium aut dolor.', 'Ut quasi voluptas culpa excepturi enim. Qui perferendis velit repellat et quod. Dolorum non inventore in ex. Qui cumque omnis iure odit quis.', 'Corrupti eos impedit aliquam. Iste iusto possimus corporis molestiae. Esse asperiores a ex in ipsam quisquam est. Fugiat sit accusamus exercitationem qui. Est aut doloribus et vitae perferendis.', 3, 2, '2021-10-06 19:06:31', '2021-10-06 19:06:31'),
(10, 'Repudiandae impedit aperiam quia enim. Quidem nulla facilis nam. Corrupti doloribus sapiente ratione deleniti rerum eos cupiditate. Architecto vel et corporis aut.', 'Dolores animi laudantium voluptatem non quos. Voluptatem autem omnis earum itaque et doloribus consequatur.', 'Rem enim sit aut qui nihil cupiditate minima quibusdam. Quos consequuntur aut ullam nostrum. Iure aut quis voluptas aut soluta fuga. Et qui et quos saepe sit sit magni.', 'Harum unde non velit quae provident. Molestiae nemo culpa quas similique et fugiat molestiae. Eum qui non molestiae et et.', 'Quas at omnis in quos totam nam inventore. Officiis at sequi assumenda laboriosam cum labore et. Voluptatem minima tenetur tenetur eaque suscipit.', 2, 2, '2021-10-06 19:06:31', '2021-10-06 19:06:31'),
(11, 'Eum explicabo in commodi facilis fugit. At nulla corporis quo quis. Consequatur et accusamus quasi et voluptate ipsum sapiente sit. Qui nisi officiis excepturi consequuntur.', 'Qui nemo veniam qui asperiores ratione numquam voluptatem. Quia eius voluptatem sunt dignissimos. Eum quia pariatur amet consequuntur alias temporibus ut.', 'Quo quo in nihil magnam ipsam et perferendis. At consequatur voluptas qui. Et repellat quam voluptas aliquam distinctio.', 'Aut dolorem quae aut magni quod atque sapiente. Quas aut recusandae ipsam sunt est nostrum. Nulla non non necessitatibus aut. Qui nulla in architecto labore.', 'Voluptatibus aut laboriosam et ab. Maxime aliquam iste aliquid iure. Nobis repellat maxime aut recusandae.', 1, 2, '2021-10-06 19:06:31', '2021-10-06 19:06:31'),
(12, 'Fuga accusamus illum et est. Qui sed voluptatibus libero voluptatem dolorem corrupti et. Perferendis ea earum corporis tenetur nam fugit.', 'Rerum amet nulla repudiandae dolor optio tempore maxime. Deserunt quia veritatis quibusdam asperiores. Voluptas quisquam necessitatibus accusantium sunt asperiores.', 'Dicta unde dolores iusto nulla labore quas. Placeat qui possimus aut veniam. Sit ut qui enim consequatur.', 'Ipsam voluptatem eum voluptas at. Dolores quia qui quisquam pariatur dolorem cum. Sunt mollitia hic eum porro veritatis optio.', 'Omnis id ex fugit accusantium optio. Dolore eum laudantium expedita doloremque nostrum nihil debitis. Quia odit molestiae minus veritatis.', 3, 2, '2021-10-06 19:06:31', '2021-10-06 19:06:31'),
(13, 'Quia qui non debitis. Perferendis officia officiis aperiam sint. Nesciunt quis dolores quaerat ut veniam hic.', 'Quia aliquam hic voluptas magni reiciendis explicabo. Quo illo nihil occaecati officiis sunt voluptate. Non labore quia qui cum aut. Est tempore libero est quia eum.', 'Nemo voluptates magni exercitationem. Deleniti nostrum laborum velit qui veniam fuga. Aut iure molestiae excepturi aut ea id inventore.', 'In eligendi et corporis ut et. Blanditiis porro architecto dicta est non porro consequatur aut. A omnis quia nihil fugit id quia enim. Doloribus nisi sit dignissimos.', 'Ad voluptate quo deserunt facere facilis. Et et culpa error quia non voluptatem saepe.', 2, 2, '2021-10-06 19:06:31', '2021-10-06 19:06:31'),
(14, 'Sequi nisi magnam voluptates necessitatibus eos. Quia et earum natus sunt fugit ullam. Laboriosam qui beatae error quia.', 'Qui illum fuga qui omnis inventore. Aliquid voluptates vel repellat aliquid omnis porro. Dolorum vitae magnam et magni provident et eius.', 'Omnis facere ut dolorem totam sequi nisi dolore. Aperiam aut exercitationem quisquam similique. Praesentium eaque ut veritatis voluptatum quas.', 'Aliquid suscipit ex porro sint ad nulla. In in dignissimos atque distinctio vel natus numquam sed. Rerum est odit vel aut id aspernatur at commodi.', 'Ut ab et ea nemo. Ad nihil dolores nam aut omnis unde possimus. Quo optio quae ut.', 1, 2, '2021-10-06 19:06:31', '2021-10-06 19:06:31'),
(15, 'Reprehenderit vero ut sed officiis. Est quisquam pariatur soluta corporis dolores.', 'Vel consequuntur ex maxime esse in amet consequatur. Ipsum eius sapiente perspiciatis laudantium magni consectetur distinctio sint. Inventore ratione sint et et et.', 'Fugit maiores eos tempora vel tenetur est dicta. Facere sint earum iste aperiam. Omnis error eos atque ullam non odio molestiae.', 'Molestiae inventore veniam enim fuga. Provident a architecto et quia et velit.', 'Ut doloribus at et et ducimus. Voluptas est culpa ratione ea error et. Optio ipsum id quia est sit fugiat quibusdam eveniet. Dolorem illo cumque in quasi harum neque tempora.', 3, 2, '2021-10-06 19:06:31', '2021-10-06 19:06:31'),
(16, 'Saepe sapiente vel est iste eos. Consequatur et culpa quae alias temporibus quia ea. Id totam sint assumenda ab corporis illo.', 'Similique facilis est necessitatibus at consequuntur dolorem minus. Atque a sunt et ipsum et minus. Tempore in ratione voluptas quisquam deserunt. Ut dolores ad cum pariatur.', 'Quibusdam assumenda dolorem explicabo reprehenderit cumque. Est non reprehenderit inventore esse minus et est. Quos est aut voluptatum hic perferendis nihil quod voluptas.', 'Animi et blanditiis et id optio cum. Vel occaecati dolorem quis deserunt autem.', 'Voluptas iure vel ut dolor ut. Recusandae vitae ut consequatur corrupti similique non. Perspiciatis fuga eos perspiciatis illo.', 2, 2, '2021-10-06 19:06:31', '2021-10-06 19:06:31'),
(17, 'Dicta excepturi est sed et aut. Sit quasi incidunt ea esse iure. Quo est exercitationem asperiores quis pariatur et cupiditate. Voluptas nostrum pariatur sapiente quia deleniti cupiditate.', 'Laboriosam consequatur distinctio atque consequatur neque. Officia numquam non labore in sint.', 'Consequatur voluptatem qui ducimus maiores quisquam sunt saepe. Dolore cupiditate consequatur ut non. Officia sed nulla nostrum facilis tempora.', 'Est soluta voluptatibus consectetur qui quia nobis expedita. Recusandae officiis magnam ducimus eum eos vitae. Quidem sed error consequuntur similique omnis possimus. Consequatur harum sint eos fuga.', 'Maiores totam enim vel repellat ut. Minus et voluptates iure aperiam accusantium blanditiis tempora. Quia dolorem perferendis eaque eveniet.', 1, 2, '2021-10-06 19:06:31', '2021-10-06 19:06:31'),
(18, 'In consequuntur omnis sit corporis nostrum. Et eum amet deleniti dolores. Rerum sed magnam ea dolorem. Recusandae vero optio est sint dicta iste aliquam.', 'Quia maiores vel dolores aut. Possimus tempore consequatur adipisci asperiores. Facilis illo vitae quia rerum. Nobis consequatur minus aut deleniti totam voluptatem praesentium.', 'Non eos excepturi qui eos nihil quibusdam explicabo. Nobis facere doloribus sed natus. Hic voluptas ipsa et assumenda deserunt.', 'Id accusamus sequi sint perferendis. Qui quo non eum ipsa. Enim voluptatum sint est nobis. Magni dolorem est eos fugit. Aut recusandae labore ut et.', 'Ipsam accusamus repellat natus qui adipisci enim. Nihil mollitia perferendis corrupti molestiae. Consectetur quisquam enim laudantium nihil omnis.', 4, 2, '2021-10-06 19:06:31', '2021-10-06 19:06:31'),
(19, 'Et molestiae quo omnis voluptates sint quia velit. Et et molestiae veniam ut. Autem fuga voluptates rerum. Atque est commodi sed eveniet ipsam perferendis tenetur.', 'Ut et nihil hic reiciendis rerum itaque accusantium excepturi. Blanditiis dolore mollitia autem et.', 'Necessitatibus qui accusantium laudantium autem autem aut quidem ratione. Sit magnam inventore suscipit eius tenetur praesentium. Rem voluptatum velit quia ut aliquid.', 'Doloribus id quae at quod saepe animi sit harum. Illum quas cumque et quis ut. Quam non commodi velit qui earum et. Sunt tenetur nisi totam optio distinctio. Est aut aut perspiciatis atque quia.', 'Perspiciatis expedita culpa quaerat cum ipsam dolor voluptatem nam. Repellendus porro sapiente eos aut. Est repellendus veniam accusantium quia dolor aperiam sit voluptates.', 3, 2, '2021-10-06 19:06:31', '2021-10-06 19:06:31'),
(20, 'Voluptas deserunt ipsa consectetur inventore distinctio. Recusandae et vero adipisci delectus asperiores et sit. Enim reiciendis sit est quae. Harum autem qui voluptatum repellendus ratione quia.', 'Nam assumenda quis nemo sed voluptatem. Voluptatem quo exercitationem ut cum. Sint aut dolores soluta quas voluptate.', 'Dignissimos ea voluptates fugiat sequi sint corporis ut sed. Sint molestiae optio dolor nihil labore deserunt officia. Deserunt quaerat amet in placeat aut eos.', 'Qui quaerat qui magnam. Iure facere saepe illo mollitia consequatur. Assumenda aliquam quam et dolor et. Maiores aliquam ex qui provident natus est quia.', 'In provident et architecto amet quibusdam et laboriosam. Qui ipsam molestias consectetur sunt eum. Omnis laborum facere voluptas. Saepe est porro blanditiis ut corrupti hic.', 3, 2, '2021-10-06 19:06:31', '2021-10-06 19:06:31'),
(22, 'Dưa hấu có mấy hột ?', '2 hột', '4 hột', '6 hột', 'Vô số', 4, 2, '2021-10-06 19:33:08', '2021-10-06 19:33:29'),
(23, 'Con gà có mấy chân ?', '1 chân', '2 chân', '3 chân', '4 chân', 2, 4, '2021-10-10 19:39:08', '2021-10-10 19:41:18');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'manager', 'web', NULL, NULL),
(15, 'user', 'web', '2021-10-05 21:06:23', '2021-10-05 21:06:23'),
(18, 'super_admin', 'web', '2021-10-10 19:52:24', '2021-10-10 19:52:24');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(13, 15),
(1, 18),
(2, 18),
(3, 18),
(4, 18),
(10, 18),
(11, 18),
(12, 18);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hoàng Anh', 'hoang@gmail.com', NULL, '$2y$10$NcGtdU/uWJLPrExywwIHJOJi0oCKWgXHjKPyrRwQYX9vQf6IeuiSW', 'bm8Cs1ZTPPvRtFPlyVNP7LgQdJiMhJKwzDlkLEZwIjX0tUO7L7IAkAqe1Kcl', NULL, '2021-10-07 00:15:29'),
(8, 'Khánh Linh', 'ok@gmail.com', NULL, '$2y$10$2srV8mXE7zAsbyM17GOo2.wIoNtW8ZzY7dJ/5FDWe7JUdlYlxCMSq', 'qOtnsULJ3eOsRaUohb48coF25h6JhbQzpRli2rBK8MCQsUd2N0FTTzUpN3iU', '2021-10-05 02:45:47', '2021-10-07 00:48:03'),
(10, 'Nam', 'nam@gmail.com', NULL, '$2y$10$ugGX/65kwL/1dVn3LlxFiumhsjEVBIdHYeRfwbGThHZjrJTfnbmW2', 'ASz44SGp8Jmzc13jHepYVe0wYMcx3LhTOfeuKQMFDaB1aMkvEbNZ1IYTEAbA', '2021-10-07 01:34:14', '2021-10-07 01:34:14'),
(11, 'John', 'john@gmail.com', NULL, '$2y$10$o0U4cBkRWfEPKkjq.Ze46uKy7xa.piTab3sWQ8Pve8kHxx1lBGbUm', 'i2zIW37T1Fgk64GUlnugqVcPni3Lw5IU9YBf0PxPmw43y8ClcfauIMVIBCUa', '2021-10-07 18:54:25', '2021-10-07 18:54:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
