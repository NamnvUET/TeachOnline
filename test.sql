-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 14, 2017 lúc 04:48 PM
-- Phiên bản máy phục vụ: 10.1.25-MariaDB
-- Phiên bản PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `test`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_without_sign` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `name_without_sign`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Lập trình Web', 'lap-trinh-web', 'Danh mục Lập trình Web chứa các môn học liên quan đến việc xây dựng các website', '2017-09-14 07:18:12', '2017-09-14 07:18:12'),
(2, 'Lập trình Android', 'lap-trinh-android', 'Danh mục lập trình Android chứa các khóa học liên quan đến việc lập trình các ứng dụng trên mobile', '2017-09-14 07:18:57', '2017-09-14 07:18:57'),
(3, 'Các khóa học khác', 'cac-khoa-hoc-khac', 'Là danh mục chứa các khóa học chưa phân loại nằm trong danh mục cụ thể nào', '2017-09-14 07:19:37', '2017-09-14 07:19:37'),
(4, 'Các khóa học tự chọn', 'cac-khoa-hoc-tu-chon', 'Là danh mục chứa những khóa học liên quan đến những môn học tự chọn trong trường', '2017-09-14 07:20:28', '2017-09-14 07:20:28'),
(5, 'Các môn học bắt buộc', 'cac-mon-hoc-bat-buoc', 'Là danh mục chứa các khóa học liên quan đến các môn bắt buộc', '2017-09-14 07:21:15', '2017-09-14 07:21:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `classes`
--

CREATE TABLE `classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_without_sign` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `goal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` int(11) NOT NULL,
  `student_number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `classes`
--

INSERT INTO `classes` (`id`, `user_id`, `name`, `name_without_sign`, `image`, `description`, `goal`, `view`, `student_number`, `created_at`, `updated_at`) VALUES
(1, 2, 'Lập trình hướng đối tượng', 'lap-trinh-huong-doi-tuong', '[teach-online]fDgEHMDmG3-tong-quan-lap-trinh-huong-doi-tuong-java.jpg', 'Cung cấp các kiến thức cơ bản và quan trọng về lập trình hướng đối tượng', '- Hiểu về các khái niệm của hướng đối tượng\r\n- Nắm vững các đặc trưng cơ bản của lập trình hướng đối tượng\r\n- Demo 1 sản phẩm nhỏ bằng ngôn ngữ JAVA', 0, 0, '2017-09-14 07:24:09', '2017-09-14 07:24:09'),
(2, 1, 'Requirement Engineering', 'thu-thap-va-phan-tich-yeu-cau', '[teach-online]HJzZh87Tx5-Capture.PNG', 'Cung cấp các kiến thức về quá trình thu thập, phân tích các yêu cầu về sản phẩm', '- Hiểu các khái niệm về yêu cầu\r\n- Phân tích được các yêu cầu, mục tiêu, rủi ro, ...\r\n- Hoàn thành được cái bài tập, báo cáo theo từng phần', 2, 0, '2017-09-14 07:26:32', '2017-09-14 07:45:59'),
(3, 1, 'Đồ họa máy tính', 'do-hoa-may-tinh', '[teach-online]y96wAXoApQ-28inkscape400.jpg', 'Môn học nói về các thuật toán đồ họa trong máy tính', '- Hiểu được các thuật toán trong đồ họa như: Tô phủ, cắt xén hình, tweening ....\r\n- Thực hành các thuật toán trên ngôn ngữ C++ và thư viện OpenGL\r\n- Hoàn thành 1 bài tập lớn về mô hình và chuyển động bằng công cụ đồ họa: 3DSMAX - Blender', 2, 0, '2017-09-14 07:29:54', '2017-09-14 07:45:15'),
(4, 1, 'Xác suất thống kê', 'xac-suat-thong-ke', '[teach-online]PPHAFsXxor-xac-su-t-th-ng-ke-ba-xucxac.jpg', 'Môn học bắt buộc, cung cấp các kiến thức cần thiết về xác suất thống kê', '- Hiểu và vận dụng được các công thức: xác suất, xác suất có điều kiện, thống kê, độ tin cậy, ....', 2, 0, '2017-09-14 07:31:55', '2017-09-14 07:45:19'),
(5, 1, 'Phát triển ứng dụng web', 'phat-trien-ung-dung-web', '[teach-online]8XuWDAGRhq-logo-new.png', 'Môn học cơ bản của lập trình web', '- HTML, CSS, Javascrip, PHP\r\n- Hoàn thành một bài tập lớn\r\n- Hoàn thành các bài thực hành hàng tuần', 0, 0, '2017-09-14 07:34:20', '2017-09-14 07:34:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class_category`
--

CREATE TABLE `class_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `class_category`
--

INSERT INTO `class_category` (`id`, `class_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 4, 5, '2017-09-14 07:32:09', '2017-09-14 07:32:09'),
(2, 1, 5, '2017-09-14 07:32:14', '2017-09-14 07:32:14'),
(3, 2, 4, '2017-09-14 07:32:19', '2017-09-14 07:32:19'),
(4, 3, 4, '2017-09-14 07:32:27', '2017-09-14 07:32:27'),
(5, 5, 1, '2017-09-14 07:34:35', '2017-09-14 07:34:35'),
(6, 3, 3, '2017-09-14 07:34:45', '2017-09-14 07:34:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `is_checked` tinyint(1) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `documents`
--

CREATE TABLE `documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lessons`
--

CREATE TABLE `lessons` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_without_sign` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `want_check_comment` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lessons`
--

INSERT INTO `lessons` (`id`, `class_id`, `user_id`, `title`, `title_without_sign`, `path`, `want_check_comment`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Bài 1: Giới thiệu', 'bai-1-gioi-thieu', '[teach-online]RdxMaGUtKC-lect1[0]_GioiThieu.pdf', 1, '2017-09-14 07:35:40', '2017-09-14 07:35:40'),
(2, 3, 1, 'Bài 2: Các khái niệm cơ bản', 'bai-2-cac-khai-niem-co-ban', '[teach-online]irTOcS8dSm-lect2[0]_CacKhaiNiemCoBan.pdf', 0, '2017-09-14 07:36:11', '2017-09-14 07:36:11'),
(3, 3, 1, 'Bài 3: Các thuật toán mành hóa', 'bai-3-cac-thuat-toan-manh-hoa', '[teach-online]pGc0YIoFp0-lect3[0]_CacThuatToanManhHoa.pdf', 1, '2017-09-14 07:36:27', '2017-09-14 07:36:27'),
(4, 3, 1, 'Bài 4: Các thuật toán mành hóa 2', 'bai-4-cac-thuat-toan-manh-hoa-2', '[teach-online]dbOjvZALhL-lect4[0]_CacThuatToanManhHoa2.pdf', 1, '2017-09-14 07:36:41', '2017-09-14 07:36:41'),
(5, 4, 1, 'Bài 1: Biến cố và xác suất của biến cố', 'bai-1-bien-co-va-xac-suat-cua-bien-co', '[teach-online]8rPTqkmM21-Lec01_BienCoVaXSCuaBienCo_1.pdf', 1, '2017-09-14 07:37:59', '2017-09-14 07:37:59'),
(6, 4, 1, 'Bài 2: Đại lượng ngẫu nhiên rời rạc', 'bai-2-dai-luong-ngau-nhien-roi-rac', '[teach-online]uoThIO3fYj-Lec05_DLNNRoiRac.pdf', 1, '2017-09-14 07:38:26', '2017-09-14 07:38:26'),
(7, 4, 1, 'Bài 3: Đại lượng ngẫu nhiên liên tục', 'bai-3-dai-luong-ngau-nhien-lien-tuc', '[teach-online]mXijSJgxmm-Lec07_DLNNLienTuc.pdf', 1, '2017-09-14 07:38:46', '2017-09-14 07:38:46'),
(8, 2, 1, 'Bài 1: Tổng quan về RE', 'bai-1-tong-quan-ve-re', '[teach-online]jO0SF6hFJV-slide01_OverviewOfRE.pdf', 1, '2017-09-14 07:40:19', '2017-09-14 07:40:19'),
(9, 2, 1, 'Bài 2: Phân tích miền', 'bai-2-phan-tich-mien', '[teach-online]g0KiUpLyT2-slide04_domainAnalysis.pdf', 1, '2017-09-14 07:41:02', '2017-09-14 07:41:02'),
(10, 2, 1, 'Bài 3: Thiếu sót và rủi ro', 'bai-3-thieu-sot-va-rui-ro', '[teach-online]NslqMUwRHS-slide06_reqSpecDoc.pdf', 1, '2017-09-14 07:42:46', '2017-09-14 07:42:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(70, '2014_10_12_000000_create_users_table', 1),
(71, '2014_10_12_100000_create_password_resets_table', 1),
(72, '2017_08_14_153702_create_videos_table', 1),
(73, '2017_08_14_154117_create_classes_table', 1),
(74, '2017_08_14_172310_create_lessons_table', 1),
(75, '2017_08_15_042551_create_comments_table', 1),
(76, '2017_08_15_095813_create_student_of_class_table', 1),
(77, '2017_08_15_100122_create_class_category_table', 1),
(78, '2017_08_15_100315_create_categories_table', 1),
(79, '2017_08_27_022435_create_documents_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student_of_class`
--

CREATE TABLE `student_of_class` (
  `class_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `password`, `phone_number`, `job`, `is_admin`, `code`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'namnguyenvan', 'nguyenvannamk59@gmail.com', NULL, '$2y$10$enevAhW6aMiuz7eaeMijO.khWpgFGafgbY9BRvAJmlY7CR4NZyXQ2', '0968422979', 'student', 1, 'h2xzKq05b5JeZuzl4BV3kkUqmSnmFr', 1, 'gsY3UgCNK4Rz0HFuhHsyhXLs2DetqSsSIflSkiAwguqdYQH1u9qTvtIfVqQ9', '2017-09-14 07:06:11', '2017-09-14 07:06:25'),
(2, 'Normal_User1', 'normal_user1@gmail.com', '[teach-online]8Z4DDK6Wod-14484986_748572701950098_7376815884708209819_n.jpg', '$2y$10$WDVvVr2cHnOFdIx2UQb/cuZGAU3isQMxUaJGo7XzNsiG7ttbZmyyK', '0968422979', 'student', 0, 'gg', 1, NULL, '2017-09-14 07:14:07', '2017-09-14 07:14:07'),
(3, 'normal_user2', 'normal_user2@gmail.com', '[teach-online]3tkcFHkhj6-10672236_448287208645317_3670340715851977570_n.jpg', '$2y$10$y8DDQN0m70/26agnFzRSC.H83SfNC73iaH7/w8zCGENudeMtCMZmq', '0968422979', 'student', 0, 'gg', 1, NULL, '2017-09-14 07:15:44', '2017-09-14 07:15:44'),
(4, 'normal_user3', 'normal_user3@gmail.com', '[teach-online]7FDBzEFa9j-14484986_748572701950098_7376815884708209819_n.jpg', '$2y$10$wgR.69svLRplf6PY9wkz8.0az1JwyC8RUx/9akHsJeFxfIwpXURlG', '09231908', 'student', 0, 'gg', 1, NULL, '2017-09-14 07:17:07', '2017-09-14 07:17:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `class_category`
--
ALTER TABLE `class_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `student_of_class`
--
ALTER TABLE `student_of_class`
  ADD PRIMARY KEY (`class_id`,`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `class_category`
--
ALTER TABLE `class_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
