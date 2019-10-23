/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100408
 Source Host           : localhost:3306
 Source Schema         : db_real_state

 Target Server Type    : MySQL
 Target Server Version : 100408
 File Encoding         : 65001

 Date: 23/10/2019 12:44:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ai_categories
-- ----------------------------
DROP TABLE IF EXISTS `ai_categories`;
CREATE TABLE `ai_categories`  (
  `categoryId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`categoryId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ai_categories
-- ----------------------------
INSERT INTO `ai_categories` VALUES (1, 'Casa');
INSERT INTO `ai_categories` VALUES (2, 'Villa');
INSERT INTO `ai_categories` VALUES (3, 'Solar');
INSERT INTO `ai_categories` VALUES (4, 'Finca');
INSERT INTO `ai_categories` VALUES (5, 'Nave');
INSERT INTO `ai_categories` VALUES (6, 'Local Comercial');
INSERT INTO `ai_categories` VALUES (7, 'Edificio');
INSERT INTO `ai_categories` VALUES (8, 'Apartamento ');
INSERT INTO `ai_categories` VALUES (9, 'Penthouse');
INSERT INTO `ai_categories` VALUES (10, 'Local de oficina');

-- ----------------------------
-- Table structure for ai_docs
-- ----------------------------
DROP TABLE IF EXISTS `ai_docs`;
CREATE TABLE `ai_docs`  (
  `docId` int(11) NOT NULL AUTO_INCREMENT,
  `clientId` int(11) NOT NULL DEFAULT 0,
  `original_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`docId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ai_docs
-- ----------------------------
INSERT INTO `ai_docs` VALUES (1, 3, '375682_223919_1.jpg', 'XE4lI20190324091151.jpg', '107077', 1);
INSERT INTO `ai_docs` VALUES (2, 3, '375682_223919_1.jpg', 't3MPn20190324092151.jpg', '107077', 0);

-- ----------------------------
-- Table structure for ai_properties
-- ----------------------------
DROP TABLE IF EXISTS `ai_properties`;
CREATE TABLE `ai_properties`  (
  `propiertyId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT 0,
  `property_size` decimal(10, 2) NULL DEFAULT 0.00,
  `property_big` decimal(10, 2) NULL DEFAULT 0.00,
  `property_small` decimal(10, 2) NULL DEFAULT 0.00,
  `price` decimal(10, 2) NULL DEFAULT 0.00,
  `rooms` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bedrooms` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bathrooms` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dowing_room` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `garages` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `garage_size` double NULL DEFAULT NULL,
  `basement` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `available_from` date NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `video` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`propiertyId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ai_services
-- ----------------------------
DROP TABLE IF EXISTS `ai_services`;
CREATE TABLE `ai_services`  (
  `serviceId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`serviceId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ai_settings
-- ----------------------------
DROP TABLE IF EXISTS `ai_settings`;
CREATE TABLE `ai_settings`  (
  `settingId` int(11) NOT NULL AUTO_INCREMENT,
  `companyId` int(11) NULL DEFAULT 0,
  `company` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mobil` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `politics` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`settingId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ai_settings
-- ----------------------------
INSERT INTO `ai_settings` VALUES (1, 1, 'PRESTAME DINERO', 'franklinpaulino04@gmail.com', '809-564-6545', '829-456-4564', NULL, 'LE INFORMAMOS QUE LE HEMOS DESEMBOLSADO SU  PRÉSTAMO DE EMERGENCIA  A LA CUENTA SUMINISTRADA POR USTED, DE MANERA SATISFACTORIA.\r\nRECORDANDO LE QUE EN ESTOS PRESTAMOS DE EMERGENCIA NO ACEPTAMOS ATRASOS, NI TAMPOCO ACEPTAMOS QUE USTED NOS CANCELE EL  INTERNET BANKING, SEA EL ACCESO, TARJETA DE CÓDIGOS, TOKEN O PREGUNTAS DE SEGURIDAD, YA QUE  ESA ES NUESTRA GARANTÍA PARA REALIZAR EL COBRO.\r\nDESPUÉS DE LOS 30 DÍAS USTED PODRÁ SALDAR SU PRÉSTAMO CUANDO QUIERA, AUNQUE  LE DAREMOS HASTA 5 MESES PARA PAGARLO. USTED PAGARA EL 45% DE INTERÉS MENSUAL  PUDIENDO ABONARLE AL CAPITAL O SALDAR CUANDO QUIERA.\r\nINFORMÁNDOLE QUE NOSOTROS SOMOS UNA OFICINA INTERMEDIARIA ENTRE PRESTAMISTAS PELIGROSOS  DE LA CALLE Y USTED, DONDE NOSOTROS SOMOS LOS ENCARGADOS DE HACERLE LOS COBROS POR INTERNET BANKING.\r\nINFORMÁNDOLE QUE SI USTED NO PAGA POR INTERNET BANKING, UN EQUIPO DE COBROS COMPULSIVO CON ALTO GRADO DE PREPARACIÓN  Y BIEN EQUIPADOS PROCEDERÁ INMEDIATAMENTE A  BUSCARLO, LOCALIZARLO Y HACERLE EL COBRO DE MANERA PERSONAL, EN SU CASA, TRABAJO O DONDE USTED SE ENCUENTRE.\r\nRECOMENDANDO LE PAGAR SIEMPRE POR INTERNET BANKING PARA EVITARSE SITUACIONES FUTURAS CON ESAS PERSONAS QUE TIENEN TODOS LOS DATOS SUYOS, DIRECCIONES Y FAMILIARES.\r\nRECORDANDO LE  QUE USTED FIRMO UN PAGARE NOTARIAL EN DONDE PONE EN GARANTÍA, SU CASA, VEHÍCULO Y  AHORROS EN MANOS PROPIAS O DE TERCEROS SEGÚN EL CÓDIGO PROCESAL CIVIL EN SU ARTICULO 541. INFORMÁNDOLE QUE SI NOS QUEDA MAL  PODEMOS SOMETERLO ANTE LA FISCALIA  POR ESTAFA Y ABUSO DE CONFIANZA  Y EN OTROS CASOS COBRARNOS LA DEUDA CON SUS PRESTACIONES LABORALES. \r\nINFORMÁNDOLE QUE TENERMOS MAS DE 20 AÑOS DE EXPERIENCIA EN EL ÁREA DE COBROS, YA QUE SOMOS UNA OFICINA DE COBROS COMPULSIVOS, DEBIDO HA QUE HAY MUCHOS ESTAFADORES Y DELINCUENTES QUE SE PONEN A TOMAR MUCHOS PRESTAMOS POR INTERNET PARA NO PAGAR Y LIQUIDARSE CON EL CAPITAL PRESTADO.\r\nNOSOTROS HEMOS HECHO  UN NEGOCIO DE BUENA FE CON USTED PARA SACARLO DE UNA SITUACIÓN DE EMERGENCIA POR ESO CONFIAMOS EN USTED Y ESPERAMOS  QUE CUMPLA PARA QUE NO SE EXPONGA A LAS SITUACIONES EXPLICADAS ANTERIORMENTE.\r\nESTAMOS PARA SERVIRLE  Y RESOLVERLE SUS SITUACIONES DE EMERGENCIA.\r\n\r\nLicenciada Alfonsina Silva/Gerente Regional\r\nPRÉSTAME-DINERO/Oficina 809-263-8272/ Móvil (829) 432-7109', 0);

-- ----------------------------
-- Table structure for ai_users
-- ----------------------------
DROP TABLE IF EXISTS `ai_users`;
CREATE TABLE `ai_users`  (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `statusId` int(11) NULL DEFAULT 0,
  `typeId` int(11) NULL DEFAULT 0,
  `first_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `image` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `hash` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hidden` tinyint(1) NULL DEFAULT 0,
  `owers` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`userId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ai_users
-- ----------------------------
INSERT INTO `ai_users` VALUES (1, 1, 1, 'Jesus Enmanuel', 'De La Cruz', 'edelacruz9713@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'undraw_posting_photo.svg', NULL, 0, 1);
INSERT INTO `ai_users` VALUES (2, 1, 1, 'Jose Miguel', 'Rojas Guzman', 'jose@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '6aqh620190304015940.jpg', NULL, 0, 1);

-- ----------------------------
-- Table structure for ai_users_status
-- ----------------------------
DROP TABLE IF EXISTS `ai_users_status`;
CREATE TABLE `ai_users_status`  (
  `statusId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `class` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`statusId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ai_users_status
-- ----------------------------
INSERT INTO `ai_users_status` VALUES (1, 'Activo', 'btn-success', 0);
INSERT INTO `ai_users_status` VALUES (2, 'Inactivo', 'btn-danger', 0);
INSERT INTO `ai_users_status` VALUES (3, 'Bloqueado', 'btn-warning', 0);

-- ----------------------------
-- View structure for ai_user_views
-- ----------------------------
DROP VIEW IF EXISTS `ai_user_views`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `ai_user_views` AS SELECT
	a.userId,
	a.email,
	a.image,
	a.first_name,
	a.last_name,
	a.statusId,
	b.`name` AS `status`,
	b.`class` AS `class`,
	a.owers,
	a.hidden
FROM
	ai_users AS a
	LEFT JOIN ai_users_status AS b ON b.statusId = a.statusId 
WHERE
 a.hidden = 0 ;

SET FOREIGN_KEY_CHECKS = 1;
