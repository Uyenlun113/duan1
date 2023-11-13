-- Cấu trúc bảng cho bảng `category` (loại phòng)
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name` text NOT NULL,
  `description` text,
  `status` int(11),
  `update_date` date,
  `create_date` date,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Cấu trúc bảng cho bảng `room_service` (dịch vụ trong phòng)
CREATE TABLE `room_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Cấu trúc bảng cho bảng `rooms` (phòng)
CREATE TABLE `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) NOT NULL,
  `name` text NOT NULL,
  `img` text NOT NULL,
  `price` float NOT NULL,
  `number_adult` int NOT NULL,
  `number_children` int NOT NULL,
  `id_service` int,
  `create_date` date,
  `update_date` date,
  `description` text,
  `status` int(11),
  PRIMARY KEY (`id`),
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Cấu trúc bảng cho bảng `accounts` (tài khoản)
CREATE TABLE `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `img` text DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Cấu trúc bảng cho bảng `bookings`
CREATE TABLE `bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_account` int(11) NOT NULL,
  `id_room` int(11) NOT NULL,
  `checkin` date NOT NULL,
  `check_out` date NOT NULL,
  `create_date` date,
  `payment` text,
  `total_price` float NOT NULL,
  PRIMARY KEY (`id`),
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Cấu trúc bảng cho bảng `bill` (chi tiết hóa đơn)
CREATE TABLE `bill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_booking` int(11) NOT NULL,
  `total_price` float,
  `status` int(11),
  PRIMARY KEY (`id`),
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Cấu trúc bảng cho bảng `bill_management` (quản lý hóa đơn)
CREATE TABLE `bill_management` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_booking` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `total_price` float NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
