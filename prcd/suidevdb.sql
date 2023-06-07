-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2023 at 10:33 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suidevdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `datos_generales`
--

CREATE TABLE `datos_generales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido_p` varchar(50) NOT NULL,
  `apellido_m` varchar(50) NOT NULL,
  `genero` int(11) NOT NULL,
  `edad` int(11) NOT NULL,
  `edo_civil` int(11) NOT NULL,
  `f_nacimiento` date NOT NULL,
  `lugar_nacimiento` varchar(200) NOT NULL COMMENT 'Estados',
  `domicilio` varchar(100) NOT NULL,
  `no_int` varchar(10) NOT NULL,
  `no_ext` varchar(10) NOT NULL,
  `colonia` varchar(100) NOT NULL,
  `entre_vialidades` varchar(100) NOT NULL,
  `descr_referencias` varchar(200) NOT NULL,
  `localidad` int(11) NOT NULL,
  `municipio` int(11) NOT NULL,
  `cp` int(11) NOT NULL,
  `telefono_part` varchar(20) NOT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `telefono_cel` varchar(20) NOT NULL,
  `escolaridad` int(11) NOT NULL,
  `profesión` varchar(50) NOT NULL,
  `curp` varchar(30) NOT NULL,
  `rfc` varchar(30) NOT NULL,
  `estudia` int(11) NOT NULL,
  `estudia_donde` varchar(100) NOT NULL,
  `estudia_habilidad` varchar(100) NOT NULL,
  `trabaja` varchar(100) NOT NULL,
  `trabaja_donde` varchar(100) NOT NULL,
  `trabaja_ingresos` varchar(10) NOT NULL,
  `asoc_civ` int(11) NOT NULL,
  `asoc_cual` varchar(100) NOT NULL,
  `pensionado` int(11) NOT NULL,
  `pensionado_donde` varchar(100) NOT NULL,
  `pension_monto` int(11) NOT NULL,
  `pension_temporalidad` varchar(20) NOT NULL,
  `sindicato` int(11) NOT NULL,
  `sindicato_cual` varchar(100) NOT NULL,
  `seguridad_social` int(11) NOT NULL,
  `seguridad_social_donde` varchar(100) NOT NULL,
  `seguridad_social_otro` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `datos_generales`
--

INSERT INTO `datos_generales` (`id`, `nombre`, `apellido_p`, `apellido_m`, `genero`, `edad`, `edo_civil`, `f_nacimiento`, `lugar_nacimiento`, `domicilio`, `no_int`, `no_ext`, `colonia`, `entre_vialidades`, `descr_referencias`, `localidad`, `municipio`, `cp`, `telefono_part`, `correo`, `telefono_cel`, `escolaridad`, `profesión`, `curp`, `rfc`, `estudia`, `estudia_donde`, `estudia_habilidad`, `trabaja`, `trabaja_donde`, `trabaja_ingresos`, `asoc_civ`, `asoc_cual`, `pensionado`, `pensionado_donde`, `pension_monto`, `pension_temporalidad`, `sindicato`, `sindicato_cual`, `seguridad_social`, `seguridad_social_donde`, `seguridad_social_otro`) VALUES
(26, 'Ana Elisa', 'Barba', 'Pinedo', 1, 40, 2, '1982-12-12', 'Guadalajara Jalisco', 'de la Colina', 'A', '218', 'Loma Bonita', 'Ninguna', 'Reja blanca', 1, 1, 98160, '4921586748', 'aebarbap@gmail.com', '4921001418', 5, 'Ingeniero', 'BAPA821212MJCRNN04', 'BAPA821212N84', 1, 'UAZ', 'Programador', '1', 'INCLUSION', '18000', 1, 'AC', 1, 'SEGOB', 2500, 'Bimestral', 1, 'SUTSEMOP', 1, '', NULL),
(27, 'dsatguew', 'gteqyg', 'ghuisa', 1, 45, 1, '1111-11-11', 'gs<aa', 'bfdzs', '6', '498', 'sfdsate', 'gosa89', 'gdsagdis', 1, 1, 456, '456', 'gdages@etsaw.com', '4567', 1, 'yghrtsd1', 'difusoap', 'vgfia', 1, 'hfds|', 'gfdagyw|', '1', 'bhtrjwirt|', '752', 1, 'bhfdshdfx', 1, 'hrfdshn', 454, 'Bimestral', 1, 'hgrdfsahjd', 5, 'gfdsaye', NULL),
(28, 'dsatguew', 'gteqyg', 'ghuisa', 1, 45, 1, '1111-11-11', 'gs<aa', 'bfdzs', '6', '498', 'sfdsate', 'gosa89', 'gdsagdis', 1, 1, 456, '456', 'gdages@etsaw.com', '4567', 1, 'yghrtsd1', 'difusoap', 'vgfia', 1, 'hfds|', 'gfdagyw|', '1', 'bhtrjwirt|', '752', 1, 'bhfdshdfx', 1, 'hrfdshn', 454, 'Bimestral', 1, 'hgrdfsahjd', 5, 'gfdsaye', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `datos_medicos`
--

CREATE TABLE `datos_medicos` (
  `id` int(11) NOT NULL,
  `curp` varchar(20) NOT NULL,
  `discapacidad` varchar(50) NOT NULL,
  `grado_discapacidad` int(11) NOT NULL,
  `tipo_discapacidad` int(11) NOT NULL,
  `causa` int(11) NOT NULL,
  `causa_otro` varchar(100) NOT NULL,
  `temporalidad` int(11) NOT NULL,
  `valoracion` int(11) NOT NULL,
  `fuente_valoracion` int(11) NOT NULL,
  `rehabilitacion` int(11) NOT NULL,
  `rehabilitacion_donde` varchar(50) NOT NULL,
  `rehabilitacion_inicio` date NOT NULL,
  `rehabilitacion_duracion` varchar(50) NOT NULL,
  `tipo_sangre` int(11) NOT NULL,
  `cirugias` int(11) NOT NULL,
  `tipo_cirugias` varchar(100) NOT NULL,
  `protesis` int(11) NOT NULL,
  `protesis_tipo` varchar(50) NOT NULL,
  `alergias` int(11) NOT NULL,
  `alergias_cual` varchar(500) NOT NULL,
  `enfermedades` int(11) NOT NULL,
  `enfermedades_cual` varchar(500) NOT NULL,
  `medicamentos` int(11) NOT NULL,
  `medicamentos_cual` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `datos_medicos`
--

INSERT INTO `datos_medicos` (`id`, `curp`, `discapacidad`, `grado_discapacidad`, `tipo_discapacidad`, `causa`, `causa_otro`, `temporalidad`, `valoracion`, `fuente_valoracion`, `rehabilitacion`, `rehabilitacion_donde`, `rehabilitacion_inicio`, `rehabilitacion_duracion`, `tipo_sangre`, `cirugias`, `tipo_cirugias`, `protesis`, `protesis_tipo`, `alergias`, `alergias_cual`, `enfermedades`, `enfermedades_cual`, `medicamentos`, `medicamentos_cual`) VALUES
(1, '', '', 0, 0, 0, '', 0, 0, 0, 0, '', '0000-00-00', '', 0, 0, '', 0, '', 0, '', 0, '', 0, ''),
(2, '', '', 0, 0, 0, '', 0, 0, 0, 0, '', '0000-00-00', '', 0, 0, '', 0, '', 0, '', 0, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `documentos`
--

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL,
  `id_ext` varchar(50) NOT NULL,
  `concatenado_id` varchar(50) NOT NULL,
  `qr_cred` varchar(100) NOT NULL,
  `qr_tarjeton` varchar(100) NOT NULL,
  `entregado_c` int(10) NOT NULL,
  `fecha_c` date DEFAULT NULL,
  `entregado_t` int(10) DEFAULT NULL,
  `fecha_t` date DEFAULT NULL,
  `vigencia_cred` date DEFAULT NULL,
  `vigencia_tarjeton` date DEFAULT NULL,
  `id_users` int(15) NOT NULL,
  `recibe` varchar(50) NOT NULL,
  `folio_cred` int(10) DEFAULT NULL,
  `folio_tarj` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documentos_list`
--

CREATE TABLE `documentos_list` (
  `id` int(11) NOT NULL,
  `id_ext` int(11) NOT NULL,
  `doc_medico` varchar(50) NOT NULL,
  `doc_acta_nac` varchar(50) NOT NULL,
  `doc_curp` varchar(50) NOT NULL,
  `doc_ine` varchar(50) NOT NULL,
  `doc_comp_dom` varchar(50) NOT NULL,
  `doc_tarjeta` varchar(50) NOT NULL,
  `doc_foto1` varchar(50) NOT NULL,
  `doc_foto2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `integracion`
--

CREATE TABLE `integracion` (
  `id` int(11) NOT NULL,
  `id_ext` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `parentesco` int(11) NOT NULL,
  `edad` int(11) NOT NULL,
  `escolaridad` int(11) NOT NULL,
  `profesion_oficio` int(11) NOT NULL,
  `discapacidad` int(11) NOT NULL,
  `discapacidad_tipo` varchar(50) NOT NULL,
  `ingreso` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_entregas`
--

CREATE TABLE `log_entregas` (
  `id` int(11) NOT NULL,
  `fecha_entrega` date NOT NULL,
  `tipo_doc` int(10) NOT NULL,
  `id_users` int(10) NOT NULL,
  `id_documentos` varchar(10) NOT NULL,
  `tipo_entrega` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_usrlogin`
--

CREATE TABLE `log_usrlogin` (
  `id` int(11) NOT NULL,
  `id_usr` int(11) NOT NULL,
  `fecha_iniciosesion` datetime DEFAULT NULL,
  `fecha_cierresesion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_usrlogin`
--

INSERT INTO `log_usrlogin` (`id`, `id_usr`, `fecha_iniciosesion`, `fecha_cierresesion`) VALUES
(1, 1, '2022-09-20 22:27:24', '2022-09-20 22:27:24'),
(2, 2, '2022-09-21 21:27:57', '2022-09-21 21:27:57'),
(3, 3, '2022-09-27 09:58:40', NULL),
(4, 7, '2022-09-27 10:01:24', NULL),
(5, 7, NULL, '2022-09-27 10:12:27'),
(6, 1, '2022-09-27 10:12:41', NULL),
(7, 1, NULL, '2022-09-27 10:18:14'),
(8, 1, '2022-09-27 10:18:25', NULL),
(9, 1, NULL, '2022-09-27 10:18:30'),
(10, 0, '2022-09-27 10:18:55', NULL),
(11, 0, '2022-09-27 10:21:38', NULL),
(12, 4, '2022-09-27 10:21:53', NULL),
(13, 4, NULL, '2022-09-27 10:21:55'),
(14, 0, '2022-09-27 10:22:36', NULL),
(15, 0, '2022-09-27 10:23:55', NULL),
(16, 4, '2022-09-27 10:29:57', NULL),
(17, 4, NULL, '2022-09-27 10:30:01'),
(18, 1, '2022-09-27 12:11:54', NULL),
(19, 1, '2022-09-27 17:03:40', NULL),
(20, 1, '2022-11-29 15:43:37', NULL),
(21, 1, NULL, '2022-11-29 16:30:08'),
(22, 1, '2022-12-08 14:22:19', NULL),
(23, 1, '2022-12-09 16:05:41', NULL),
(24, 2, '2022-12-13 15:53:56', NULL),
(25, 2, NULL, '2022-12-13 16:22:08'),
(26, 1, '2023-05-12 09:20:17', NULL),
(27, 1, NULL, '2023-05-12 09:20:43'),
(28, 1, '2023-05-12 09:20:47', NULL),
(29, 0, NULL, '2023-05-12 13:40:01'),
(30, 1, '2023-05-12 13:40:05', NULL),
(31, 0, NULL, '2023-05-12 14:11:08'),
(32, 1, '2023-05-12 14:11:13', NULL),
(33, 0, NULL, '2023-05-12 14:18:52'),
(34, 0, NULL, '2023-05-12 14:18:54'),
(35, 1, '2023-05-12 14:19:08', NULL),
(36, 0, NULL, '2023-05-17 12:53:24'),
(37, 1, '2023-05-17 12:53:51', NULL),
(38, 1, '2023-05-18 11:26:08', NULL),
(39, 1, '2023-05-19 08:38:17', NULL),
(40, 1, '2023-05-22 11:58:31', NULL),
(41, 1, '2023-05-23 10:01:52', NULL),
(42, 1, '2023-05-24 12:35:11', NULL),
(43, 1, '2023-05-25 10:51:06', NULL),
(44, 1, '2023-05-26 08:14:18', NULL),
(45, 1, '2023-05-30 08:39:13', NULL),
(46, 1, '2023-05-31 09:29:15', NULL),
(47, 0, NULL, '2023-05-31 13:11:59'),
(48, 1, '2023-06-01 12:51:46', NULL),
(49, 1, '2023-06-02 08:33:51', NULL),
(50, 0, NULL, '2023-06-02 10:45:59'),
(51, 1, '2023-06-06 10:33:13', NULL),
(52, 0, NULL, '2023-06-06 13:04:23'),
(53, 1, '2023-06-07 09:09:02', NULL),
(54, 1, '2023-06-07 09:54:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `perfiles_usr`
--

CREATE TABLE `perfiles_usr` (
  `id` int(11) NOT NULL,
  `perfil` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perfiles_usr`
--

INSERT INTO `perfiles_usr` (`id`, `perfil`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Table structure for table `prestamo`
--

CREATE TABLE `prestamo` (
  `id` int(11) NOT NULL,
  `apellido_p` varchar(15) NOT NULL,
  `apellido_m` varchar(15) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `curp` varchar(18) NOT NULL,
  `calle_num` varchar(35) NOT NULL,
  `colonia` varchar(20) NOT NULL,
  `ciudad` varchar(20) NOT NULL,
  `municipio` varchar(20) NOT NULL,
  `codigo_postal` varchar(30) NOT NULL,
  `telefono` int(10) NOT NULL,
  `contacto` int(10) DEFAULT NULL,
  `folio_tarj` int(10) NOT NULL,
  `fecha_entrega` datetime NOT NULL,
  `vigencia` datetime NOT NULL,
  `id_users` int(11) NOT NULL,
  `qr_prestamo` varchar(100) NOT NULL,
  `entregado` int(1) NOT NULL COMMENT '1 Beneficiario\r\n2 Familiar\r\n3 Enlace Municipal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referencias`
--

CREATE TABLE `referencias` (
  `id` int(11) NOT NULL,
  `id_ext` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `parentesco` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `profesion_oficio` int(11) NOT NULL,
  `celular` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `id_ext` int(11) NOT NULL,
  `solicitud` int(11) NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `estatus_s` int(11) NOT NULL,
  `fecha_entrega` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  `perfil` int(2) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pwd`, `perfil`, `nombre`, `fecha_creacion`, `estatus`) VALUES
(1, 'annaeliza', '12345', 1, 'Ana Elisa Barba Pinedo', '0000-00-00 00:00:00', 1),
(2, 'jrodolfo', '12345678', 1, 'Jesús Rodolfo Leaños Villegas', '2022-09-21 14:23:40', 1),
(4, 'juanjo', '12345678', 2, 'Juan José Quiroz Nava', '2022-09-21 14:34:03', 1),
(5, 'grisgalvan', '789456123', 1, 'Griselda Galván Galván', '2022-09-21 15:08:58', 1),
(6, 'amparoi', '654213', 2, 'Amparo Iturriaga Araiza', '2022-09-22 12:56:45', 1),
(7, 'hecmendoza', '123456789', 2, 'Héctor Mario Mendoza Bañuelos', '2022-09-22 14:04:40', 2);

-- --------------------------------------------------------

--
-- Table structure for table `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL,
  `id_prestamo` int(10) DEFAULT NULL,
  `id_documentos` int(11) DEFAULT NULL,
  `modelo` varchar(50) NOT NULL,
  `marca` varchar(15) NOT NULL,
  `annio` int(4) NOT NULL,
  `no_placas` varchar(10) NOT NULL,
  `chofer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vivienda`
--

CREATE TABLE `vivienda` (
  `id` int(11) NOT NULL,
  `id_ext` int(11) NOT NULL,
  `vivienda` int(11) NOT NULL,
  `vivienda_renta` int(11) NOT NULL,
  `vivienda_pagando` int(11) NOT NULL,
  `caracteristicas` int(11) NOT NULL,
  `caracteristicas_otro` varchar(50) NOT NULL,
  `num_habitaciones` int(11) NOT NULL,
  `vivienda_cocia` int(11) NOT NULL,
  `vivienda_sala` int(11) NOT NULL,
  `vivienda_banio` int(11) NOT NULL,
  `vivienda_otros` varchar(100) NOT NULL,
  `techo` int(11) NOT NULL,
  `techo_otro` varchar(100) NOT NULL,
  `serv_basicos_agua` int(11) NOT NULL,
  `serv_basicos_luz` int(11) NOT NULL,
  `serv_basicos_drenaje` int(11) NOT NULL,
  `serv_basicos_cable` int(11) NOT NULL,
  `serv_basicos_internet` int(11) NOT NULL,
  `serv_basicos_celular` int(11) NOT NULL,
  `serv_basicos_carro` int(11) NOT NULL,
  `serv_basicos_gas` int(11) NOT NULL,
  `serv_basicos_telefono` int(11) NOT NULL,
  `electrodomesticos_tv` int(11) NOT NULL,
  `electrodomesticos_lavadora` int(11) NOT NULL,
  `electrodomesticos_estereo` int(11) NOT NULL,
  `electrodomesticos_microondas` int(11) NOT NULL,
  `electrodomesticos_computadora` int(11) NOT NULL,
  `electrodomesticos_licuadora` int(11) NOT NULL,
  `electrodomesticos_dvd` int(11) NOT NULL,
  `electrodomesticos_estufa` int(11) NOT NULL,
  `personas_dependen` int(11) NOT NULL,
  `deudas` int(11) NOT NULL,
  `deudas_cuanto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datos_generales`
--
ALTER TABLE `datos_generales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datos_medicos`
--
ALTER TABLE `datos_medicos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documentos_list`
--
ALTER TABLE `documentos_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `integracion`
--
ALTER TABLE `integracion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_entregas`
--
ALTER TABLE `log_entregas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_usrlogin`
--
ALTER TABLE `log_usrlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perfiles_usr`
--
ALTER TABLE `perfiles_usr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referencias`
--
ALTER TABLE `referencias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vivienda`
--
ALTER TABLE `vivienda`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datos_generales`
--
ALTER TABLE `datos_generales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `datos_medicos`
--
ALTER TABLE `datos_medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `documentos_list`
--
ALTER TABLE `documentos_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `integracion`
--
ALTER TABLE `integracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_entregas`
--
ALTER TABLE `log_entregas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_usrlogin`
--
ALTER TABLE `log_usrlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `perfiles_usr`
--
ALTER TABLE `perfiles_usr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referencias`
--
ALTER TABLE `referencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vivienda`
--
ALTER TABLE `vivienda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
