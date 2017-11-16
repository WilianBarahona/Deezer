-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2017 a las 14:58:42
-- Versión del servidor: 5.6.15-log
-- Versión de PHP: 5.6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `freezer_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_albumes`
--

CREATE TABLE IF NOT EXISTS `tbl_albumes` (
  `id_album` int(11) NOT NULL AUTO_INCREMENT,
  `id_artista` int(11) NOT NULL,
  `nombre_album` varchar(100) NOT NULL,
  `anio` date NOT NULL,
  `album_cover_url` varchar(1000) NOT NULL,
  PRIMARY KEY (`id_album`),
  KEY `fk_tbl_albumes_tbl_artistas1_idx` (`id_artista`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `tbl_albumes`
--

INSERT INTO `tbl_albumes` (`id_album`, `id_artista`, `nombre_album`, `anio`, `album_cover_url`) VALUES
(14, 29, 'Con Todo', '2010-07-28', 'img/folderConTodoHillsong.jpg'),
(15, 30, 'Global Proyect', '2012-09-18', 'img/d.jpg'),
(16, 32, 'Revolucion de amor', '2002-08-20', 'img/folderRevolucionDeAmorMana.jpg'),
(18, 35, 'Sesion Organica', '2017-02-01', 'img/folderSecionOrganicaEvanCraft.jpg'),
(19, 33, 'Santo Pecado', '2002-11-19', 'img/folderSantoPecadoRicardoArjona.jpg'),
(20, 34, 'Bleach', '1989-06-15', 'img/folderBleachNirvana.png'),
(21, 31, 'Como en el cielo', '2015-02-23', 'img/folderComoEnELCieloMielSanMarcos.jpg'),
(22, 30, 'En vivo Auditorio', '2009-11-13', 'img/folderAuditorioMarcosBarrientos.jpg'),
(23, 41, 'Programaton', '2013-01-01', 'img/268x0w.jpg'),
(25, 37, 'Strangers in the night', '2017-11-12', 'img/sitn.jpg'),
(26, 42, 'Dragon Ball Z', '1990-01-01', 'img/db.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_albumes_por_usuarios`
--

CREATE TABLE IF NOT EXISTS `tbl_albumes_por_usuarios` (
  `id_album` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_album`,`id_usuario`),
  KEY `fk_tbl_albumes_has_tbl_usuarios_tbl_usuarios1_idx` (`id_usuario`),
  KEY `fk_tbl_albumes_has_tbl_usuarios_tbl_albumes1_idx` (`id_album`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_artistas`
--

CREATE TABLE IF NOT EXISTS `tbl_artistas` (
  `id_artista` int(11) NOT NULL AUTO_INCREMENT,
  `id_pais` int(11) NOT NULL,
  `nombre_artista` varchar(100) NOT NULL,
  `biografia_artista` varchar(3000) DEFAULT NULL,
  `url_foto_artista` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id_artista`),
  KEY `fk_tbl_artistas_tbl_paises1_idx` (`id_pais`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Volcado de datos para la tabla `tbl_artistas`
--

INSERT INTO `tbl_artistas` (`id_artista`, `id_pais`, `nombre_artista`, `biografia_artista`, `url_foto_artista`) VALUES
(29, 15, 'Hillsong', 'El grupo Hillsong United es una banda australiana de pop rock, y es parte del ministerio de jóvenes de la Iglesia Hillsong, Hillsong United.', 'img/hillosng.jpg'),
(30, 141, 'Marcos Barrientos', 'Es un cantante de música cristiana, compositor, músico, conferencista, escritor y Pastor nacido en la capital de México, el 28 de junio de 1963. Está casado desde que tenía 25 años, con la mexicana Carla Tupín, con quien tiene dos hijos, Daniela y Marcos.', 'img/marcosBarrientos.jpg'),
(31, 82, 'Miel San Marcos', 'Miel San Marcos es el ministerio de músicos y cantantes, encargado de dirigir la alabanza y la adoración de la Iglesia Cristiana: Tabernáculo de Avivamiento Miel San Marcos, originario de San Marcos (Guatemala), fundado en el año 2000.', 'img/MielSanMarcos.jpg'),
(32, 141, 'Maná', 'Maná es una banda de Rock latino y Pop rock Mexicana.', 'img/mana.jpg'),
(33, 82, 'Ricardo Arjona', 'Édgar Ricardo Arjona Morales (Jocotenango, Guatemala, 19 de enero de 1964), conocido artísticamente como Ricardo Arjona, es un cantautor, compositor, arreglista, músico y productor musical guatemalteco. Su música varía desde baladas a pop latino, rock, pop rock, música cubana', 'img/RicardoArjona.jpg'),
(34, 185, 'Nirvana', 'El grupo británico Nirvana es una banda de rock progresivo creada en 1967, principalmente activa en los finales de la década de los años 1960 y principios de los años 1970 aunque aún activa en la actualidad.', 'img/nirvana.jpg'),
(35, 65, 'Evan Craft', 'Evan Craft (18 de abril de 1991, Conejo Valley, California) es un cantante y músico cristiano estadounidense, que apareció en las listas de Billboard en octubre de 2012, con su álbum Yo soy segundo', 'img/EvanCraft.jpg'),
(37, 65, 'Frank Sinatra', 'Apodado «La Voz»​ fue una de las principales figuras de la música popular del siglo XX y dejó, a través de sus discos y actuaciones en directo, un legado canónico en lo que respecta a la interpretación vocal masculina de esa música.', 'img/frank.jpg'),
(38, 39, 'Paul Anca', 'Paul Anka (Ottawa, Canadá, 30 de julio de 1941) es un cantante, compositor y actor canadiense, nacido en el seno de una familia de origen sirio-libanés. Como intérprete, su perfil es el de un crooner o cantante melódico anglosajón, en la línea de Frank Sinatra y de Tony Bennett.', 'img/paul_anka.jpg'),
(40, 65, 'Alabama', 'Alabama es una banda estadounidense de música country y rock sureño formada en Fort Payne, Alabama en 1969. Fue fundada por Randy Owen (voz, guitarra), Teddy Gentry (bajo, coros), Jeff Cook (guitarra, teclados).', 'img/alabama.jpg'),
(41, 141, 'Zoé', 'Zoé es una banda musical mexicana de rock alternativo formada en 1995 en Cuernavaca y oficializada en la Ciudad de México en 1997. La misma es liderada por León Larregui (voz) y conformada además por Sergio Acosta (guitarra), Jesús Báez (teclados), Ángel Mosqueda (bajo) y Rodrigo Guardiola (batería).\n\nZoé es conocida por su estilo único, el cuál incorpora elementos de rock psicodélico, rock progresivo y de música electrónica. La banda también ha estado influída por el músico Saul Hernández, quien le diera gran impulso en sus inicios, y por Gustavo Cerati. Temáticamente sus canciones, escritas en su mayoría por el cantante León Larregui, contienen tintes filosóficos que suelen hacer uso de alegorías del universo y del espacio.', 'img/zoe.jpg'),
(42, 141, 'Ricardo Silva', 'Famoso por interpretar Chala Head Chala.', 'img/db.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_artistas_por_usuarios`
--

CREATE TABLE IF NOT EXISTS `tbl_artistas_por_usuarios` (
  `id_artista` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_artista`,`id_usuario`),
  KEY `fk_tbl_artistas_has_tbl_usuarios_tbl_usuarios1_idx` (`id_usuario`),
  KEY `fk_tbl_artistas_has_tbl_usuarios_tbl_artistas1_idx` (`id_artista`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_canciones`
--

CREATE TABLE IF NOT EXISTS `tbl_canciones` (
  `id_cancion` int(11) NOT NULL AUTO_INCREMENT,
  `id_album` int(11) NOT NULL,
  `id_idioma` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `nombre_cancion` varchar(100) NOT NULL,
  `url_audio` varchar(500) NOT NULL,
  `reproducciones` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_cancion`),
  KEY `fk_tbl_canciones_tbl_albumes_idx` (`id_album`),
  KEY `fk_tbl_canciones_tbl_idioma1_idx` (`id_idioma`),
  KEY `fk_tbl_canciones_tbl_generos1_idx` (`id_genero`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=147 ;

--
-- Volcado de datos para la tabla `tbl_canciones`
--

INSERT INTO `tbl_canciones` (`id_cancion`, `id_album`, `id_idioma`, `id_genero`, `nombre_cancion`, `url_audio`, `reproducciones`) VALUES
(26, 14, 40, 67, 'Para Exaltarte', 'musica/0001-Cristiano-ParaExaltarte-ConTodoHillsong.mp3', 0),
(29, 14, 40, 67, 'Correre', 'musica/0002-Cristiano-Correre-ConTodoHilsong.mp3', 0),
(30, 14, 40, 67, 'Hosanna', 'musica/0003-Cristiano-Hosanna-ConTodoHillsong.mp3', 0),
(31, 14, 40, 67, 'Desde Mi Interior', 'musica/0004-Cristiano-DesdemiInterior-ConTodoHillsong.mp3', 0),
(32, 14, 40, 67, 'Cancion Del Desierto', 'musica/0005-Cristiano-Canciondeldesierto-ConTodoHillsong.mp3', 0),
(33, 14, 40, 67, 'En La Cruz', 'musica/0006-Cristiano-EnLaCruz-ConTodoHillsong.mp3', 0),
(34, 14, 40, 67, 'Rey Salvador', 'musica/0007-Cristiano-ReySalvador-ConTodoHillsong.mp3', 0),
(35, 14, 40, 67, 'Poderoso Para Salvar', 'musica/0008-Cristiano-PoderosoparaSalvar-ConTodoHillsong.mp3', 0),
(36, 14, 40, 67, 'Soy Libre', 'musica/0009-Cristiano-SoyLibre-ConTodoHillsong.mp3', 0),
(37, 14, 40, 67, 'Poderoso', 'musica/0010-Crisitano-Poderoso-ConTodoHillsong.mp3', 0),
(38, 14, 40, 67, 'Solo Cristo', 'musica/0011-Cristiano-SoloCristo-ConTodoHillsong.mp3', 0),
(39, 14, 40, 67, 'Es Nuestro Dios', 'musica/0012-Cristiano-EsNuestroDios-ConTodoHillsong.mp3', 0),
(40, 14, 40, 67, 'Eres Mi Fortaleza', 'musica/0013-Cristiano-EresmiFortaleza-ConTodoHillosng.mp3', 0),
(41, 14, 40, 67, 'Con Todo', 'musica/0014-Cristiano-Contodo-ConTodoHillsong.mp3', 0),
(42, 15, 40, 67, 'Tu Mereces', 'musica/0015-Cristiano-TuMereces-GlobalProyectHillsong.mp3', 0),
(43, 15, 40, 67, 'Gracias', 'musica/0016-Cristiano-Gracias-GlobalProyectHillsong.mp3', 0),
(44, 15, 40, 67, 'Dios Es Poderoso', 'musica/0017-Cristiano-DiosEsPoderoso-GlobalProyectHillsong.mp3', 0),
(45, 15, 40, 67, 'Tu Amor No Tiene Fin', 'musica/0018-Cristiano-TuAmorNoTieneFin-GlobalProyectHillsong.mp3', 0),
(46, 15, 40, 67, 'Abre Mis Ojos', 'musica/0019-Cristiano-AbreMisOjos-GlobalProyectHillsong.mp3', 0),
(47, 15, 40, 67, 'Dios Es Amor', 'musica/0020-Cristiano-DiosEsAmor-GlobalProyectHillsong.mp3', 0),
(48, 15, 40, 67, 'Por Mi Murio', 'musica/0020-Cristiano-PorMiMuro-GlobalProyectHillsong.mp3', 0),
(49, 15, 40, 67, 'Aqui Estoy', 'musica/0021-Cristiano-AquiEstoy-GlobalProyectHillsong.mp3', 0),
(50, 15, 40, 67, 'Es Tu Amor', 'musica/0022-Cristiano-EsTuAmor-GlobalProyectHillsong.mp3', 0),
(51, 15, 40, 67, 'Sobrenatural', 'musica/0023-Cristiano-Sobrenatural-GlobalProyectHillsong.mp3', 0),
(52, 15, 40, 67, 'Hosanna', 'musica/0024-Cristiano-Hosanna-GlobalProyectHillsong.mp3', 0),
(53, 15, 40, 67, 'Te Albare', 'musica/0025-Cristiano-TeAlabare-GlobalProyectHillsong.mp3', 0),
(54, 15, 40, 67, 'Eterno Amor', 'musica/0026-Cristiano-EternoAmor-GlobalProyectHillsong.mp3', 0),
(55, 15, 40, 67, 'Cantamos Aleluya', 'musica/0027-Cristiano-CantamosAleluya-GlobalProyectHillsong.mp3', 0),
(56, 15, 40, 67, 'Poderoso Para Salvar', 'musica/0028-Cristiano-PoderosoParaSalvar-GlobalProyectHillsong.mp3', 0),
(57, 22, 40, 67, 'El señor Esta En Este Lugar', 'musica/0029-Cristiano-ElSeniorEstaEnEsteLugar-AuditorioMarcosBarrientos.mp3', 0),
(58, 22, 40, 67, 'Cree Todo Es Posible', 'musica/0030-Cristiano-CreeTodoEs Posible-AuditorioMarcosBarrientos.mp3', 0),
(59, 22, 40, 67, 'Amado Salvador', 'musica/0031-Cristiano-AmadoSalvador-AuditorioMarcosBarrientos.mp3', 0),
(60, 22, 40, 67, 'Amor Sin Condicion', 'musica/0032-Cristiano-AmorSinCondición-AuditorioMarcosBarrientos.mp3', 0),
(61, 22, 40, 67, 'Hossana', 'musica/0033-Cristiano-Hossana-AuditorioMarcosBarrientos.mp3', 0),
(62, 22, 40, 67, 'Avivanos', 'musica/0034-Cristiano-Avivanos-AuditorioMarcosBarrientos.mp3', 0),
(63, 22, 40, 67, 'Levantate Y Resplandece', 'musica/0035-Cristiano-LevantateYResplandece-AuditorioMarcosBarrientos.mp3', 0),
(64, 22, 40, 67, 'Manda Lluvia', 'musica/0036-Cristiano-MandaLluvia-AuditorioMarcosBarrientos.mp3', 0),
(65, 22, 40, 67, 'Ven Espiritu Ven', 'musica/0037-Cristiano-VenEspirituVen-AuditorioMarcosBarrientos.mp3', 0),
(66, 22, 40, 67, 'Mas De Ti', 'musica/0038-Cristiano-MasDeTi-AuditorioMarcosBarrientos.mp3', 0),
(67, 22, 40, 67, 'No Hay Nadie Como Tu', 'musica/0039-Cristiano-NoHayNadieComoTu-AuditorioMarcosBarrientos.mp3', 0),
(68, 22, 40, 67, 'Amor SIn Condicion', 'musica/0040-Cristiano-AmorSinCondicion-AuditorioMarcosBarrientos.mp3', 0),
(69, 21, 40, 67, 'Intro', 'musica/0041-Cristiano-Intro-ComoEnElCieloMielSanMarcos.mp3', 0),
(70, 21, 40, 67, 'Desciende', 'musica/0042-Cristiano-Desciende-ComoEnElCieloMielSanMarcos.mp3', 0),
(71, 21, 40, 67, 'Como En El Cielo', 'musica/0043-Cristiano-ComoEnElCielo-ComoEnElCieloMielSanMarcos.mp3', 0),
(72, 21, 40, 67, 'Increible', 'musica/0044-Cristiano-Increible-ComoEnElCieloMielSanMarcos.mp3', 0),
(73, 21, 40, 67, 'Alegria', 'musica/0045-Cristiano-Alegria-ComoEnElCieloMielSanMarcos.mp3', 0),
(74, 21, 40, 67, 'Rey Vencedor', 'musica/0046-Cristiano-ReyVencedor-ComoEnElCieloMielSanMarcos.mp3', 0),
(75, 21, 40, 67, 'Fiesta', 'musica/0047-Cristiano-Fiesta-ComoEnElCieloMielSanMarcos.mp3', 0),
(76, 21, 40, 67, 'Viene Ya', 'musica/0048-Cristiano-VieneYa-ComoEnElCieloMielSanMarcos.mp3', 0),
(77, 21, 40, 67, 'Dios Esta Aqui', 'musica/0049-Cristiano-DiosEstaAqui-ComoEnElCieloMielSanMarcos.mp3', 0),
(78, 21, 40, 67, 'Mi Sanador', 'musica/0050-Cristiano-MiSanador-ComoEnElCieloMielSanMarcos.mp3', 0),
(79, 21, 40, 67, 'Espontaneo Mi Sanador', 'musica/0051-Cristiano-EspontaneoMiSanador-ComoEnElCieloMielSanMarcos.mp3', 0),
(80, 21, 40, 67, 'Todo Poderoso', 'musica/0052-Cristiano-TodoPoderoso-ComoEnElCieloMielSanMarcos.mp3', 0),
(81, 21, 40, 67, 'Espontaneo Todo Poderoso', 'musica/0053-Cristiano-EspontaneoTodoPoderoso-ComoEnElCieloMielSanMarcos.mp3', 0),
(82, 21, 40, 67, 'Exaltado Estas', 'musica/0054-CristianoExaltadoEstas-ComoEnElCieloMielSanMarcos.mp3', 0),
(83, 16, 40, 23, 'Justicia Tierra Y Libertad', 'musica/0055-Rock-Pop-JusticiaTierraYLibertad-RevolucionDeAmorMana.mp3', 0),
(84, 16, 40, 23, 'Ay Doctor', 'musica/0056-Rock-Pop-AyDoctor-RevolucionDeAmorMana.mp3', 0),
(85, 16, 40, 23, 'Fe', 'musica/0057-Rock-Pop-Fe-RevolucionDeAmorMana.mp3', 0),
(86, 16, 40, 23, 'Sabanas Frias', 'musica/0058-Rock-Pop-Sabanas Frias-RevolucionDeAmorMana.mp3', 0),
(87, 16, 40, 23, 'Probre Juan', 'musica/0059-Rock-Pop-PobreJuan-RevolucionDeAmorMana.mp3', 0),
(88, 16, 40, 23, 'Porque Te Vas', 'musica/0060-Rock-Pop-PorqueTeVas-RevolucionDeAmorMana.mp3', 0),
(89, 16, 40, 23, 'Mariposa Traicionera', 'musica/0061-Rock-Pop-MariposaTraicionera-RevolucionDeAmorMana.mp3', 0),
(90, 16, 40, 23, 'Sin Tu Cariño', 'musica/0062-Rock-Pop-SinTuCarino-RevolucionDeAmorMana.mp3', 0),
(91, 16, 40, 23, 'Eres Mi Religion', 'musica/0063-Rock-Pop-EresMiReligion-RevolucionDeAmorMana.mp3', 0),
(92, 16, 40, 23, 'No Voy A Ser Tu Esclavo', 'musica/0064-Rock-Pop-NoVoyASerTuEsclavo-RevolucionDeAmorMana.mp3', 0),
(93, 16, 40, 23, 'Angel De Amor', 'musica/0065-Rock-Pop-AngelDeAmor-RevolucionDeAmorMana.mp3', 0),
(94, 16, 40, 23, 'Nada Que Perder', 'musica/0066-Rock-Pop-NadaQuePerder-RevolucionDeAmorMana.mp3', 0),
(95, 16, 40, 23, 'Eres Mi Religion', 'musica/0067-Rock-Pop-EresMiReligion-RevolucionDeAmorMana.mp3', 0),
(97, 19, 40, 29, 'Amarte a ti', 'musica/0068-Rock-Pop-Amarteati-SantoPecadoRicardoArjona.mp3', 0),
(98, 19, 40, 29, 'Dame', 'musica/0069-Rock-Pop-Dame-SantoPecadoRicardoArjona.mp3', 0),
(99, 19, 40, 29, 'Duele Verte', 'musica/0070-Rock-Pop-Dueleverte-SantoPecadoRicardoArjona.mp3', 0),
(100, 19, 40, 29, 'El Problema', 'musica/0071-Rock-Pop-ElProblema-SantoPecadoRicardoArjona.mp3', 0),
(101, 19, 40, 29, 'La Nena', 'musica/0072-Rock-Pop-Lanena-SantoPecadoRicardoArjona.mp3', 0),
(102, 19, 40, 29, 'La Novia Que Nunca Tuve', 'musica/0073-Rock-Pop-Lanoviaquenuncatuve-SantoPecadoRicardoArjona.mp3', 0),
(103, 19, 40, 29, 'Me Dejaste', 'musica/0074-Rock-Pop-MeDejaste-SantoPecadoRicardoArjona.mp3', 0),
(104, 19, 40, 29, 'Minutos', 'musica/0075-Rock-Pop-Minutos-SantoPecadoRicardoArjona.mp3', 0),
(105, 19, 40, 29, 'Mujer De Lujo', 'musica/0076-Rock-Pop-Mujerdelujo-SantoPecadoRicardoArjona.mp3', 0),
(106, 19, 40, 29, 'No Sirve De Nada', 'musica/0077-Rock-Pop-Nosirvedenada-SantoPecadoRicardoArjona.mp3', 0),
(107, 19, 40, 29, 'Quesos, Cosas, Casas', 'musica/0078-Rock-Pop-Quesoscosascasas-SantoPecadoRicardoArjona.mp3', 0),
(108, 19, 40, 29, 'Santo Pecado', 'musica/0079-Rock-Pop-Santopecado-SantoPecadoRicardoArjona.mp3', 0),
(109, 19, 40, 29, 'Se Fue', 'musica/0080-Rock-Pop-Sefue-SantoPecadoRicardoArjona.mp3', 0),
(110, 19, 40, 29, 'Señor Juez', 'musica/0081-Rock-Pop-Señorjuez-SantoPecadoRicardoArjona.mp3', 0),
(111, 19, 40, 29, 'Vivir SIn Ti Es Posible', 'musica/0082-Rock-Pop-Vivirsintiesposible-SantoPecadoRicardoArjona.mp3', 0),
(112, 20, 38, 31, 'About a girl', 'musica/0083-Rock-And-Roll-AboutAGirl-BleachNirvana.mp3', 0),
(113, 20, 38, 31, 'Been a son', 'musica/0084-Rock-And-Roll-BeenASon-BleachNirvana.mp3', 0),
(114, 20, 38, 31, 'Big Cheese', 'musica/0085-Rock-And-Roll-BigCheese-BleachNirvana.mp3', 0),
(115, 20, 38, 31, 'Blew', 'musica/0086-Rock-And-Roll-Blew-BleachNirvana.mp3', 0),
(116, 20, 38, 31, 'Dive', 'musica/0087-Rock-And-Roll-Dive-BleachNirvana.mp3', 0),
(117, 20, 38, 31, 'Downer', 'musica/0088-Rock-And-Roll-Downer-BleachNirvana.mp3', 0),
(118, 20, 38, 31, 'Love Buzz', 'musica/0089-Rock-And-Roll-LoveBuzz-BleachNirvana.mp3', 0),
(119, 20, 38, 31, 'Molly''s Lips', 'musica/0090-Rock-And-Roll-MollysLips-BleachNirvana.mp3', 0),
(120, 20, 38, 31, 'Mr. Moustache', 'musica/0091-Rock-And-Roll-MrMoustache-BleachNirvana.mp3', 0),
(121, 20, 38, 31, 'Negative Creep', 'musica/0092-Rock-And-Roll-NegativeCreep-BleachNirvana.mp3', 0),
(122, 20, 38, 31, 'Paper Cuts', 'musica/0093-Rock-And-Roll-PaperCuts-BleachNirvana.mp3', 0),
(123, 20, 38, 31, 'Sappy', 'musica/0094-Rock-And-Roll-Sappy-BleachNirvana.mp3', 0),
(124, 20, 38, 31, 'Scoff', 'musica/0095-Rock-And-Roll-Scoff-BleachNirvana.mp3', 0),
(125, 20, 38, 31, 'The Barber', 'musica/0096-Rock-And-Roll-TheBarber-BleachNirvana.mp3', 0),
(126, 18, 40, 55, 'Principio Y Fin', 'musica/0097-Acustico-Cristiano-PrincipioYFin-SesionAcusticaEvanCraft.mp3', 0),
(127, 18, 40, 55, 'Vives En mi', 'musica/0098-Acustico-Cristiano-VivesEnMi-SesionAcusticaEvanCraft.mp3', 0),
(128, 18, 40, 55, 'Vivo Estas', 'musica/0099-Acustico-Cristiano-VivoEstas-SesionAcusticaEvanCraft.mp3', 0),
(129, 18, 40, 55, 'Resplandece', 'musica/0100-Acustico-Cristiano-Resplandece-SesionAcusticaEvanCraft.mp3', 0),
(130, 18, 40, 55, 'Tu Amor No Se Rinde', 'musica/0101-Acustico-Cristiano-TuAmorNoSeRinde-SesionAcusticaEvanCraft.mp3', 0),
(131, 18, 40, 55, 'Gracias Sublime', 'musica/0102-Acustico-Cristiano-GraciaSublimeEs-SesionAcusticaEvanCraft.mp3', 0),
(132, 18, 40, 55, 'Jovenes Somos', 'musica/0103-Acustico-Cristiano-JovenesSomos-SesionAcusticaEvanCraft.mp3', 0),
(133, 18, 40, 55, 'Cautivado', 'musica/0104-Acustico-Cristiano-Cautivado-SesionAcusticaEvanCraft.mp3', 0),
(134, 18, 40, 55, 'Gracia Sin Fin', 'musica/0105-Acustico-Cristiano-GraciaSinFin-SesionAcusticaEvanCraft.mp3', 0),
(135, 18, 40, 55, 'Por Siempre', 'musica/0106-Acustico-Cristiano-PorSiempre-SesionAcusticaEvanCraft.mp3', 0),
(136, 18, 40, 55, 'Tu Amor Me Inundo', 'musica/0107-Acustico-Cristiano-TuAmorMeInundo-SesionAcusticaEvanCraft.mp3', 0),
(137, 18, 40, 55, 'Oh Tu Fidelidad', 'musica/0108-Acustico-Cristiano-OhTuFidelidad-SesionAcusticaEvanCraft.mp3', 0),
(138, 18, 40, 55, 'Tu Gran Nombre', 'musica/0109-Acustico-Cristiano-TuGranNombre-SesionAcusticaEvanCraft.mp3', 0),
(139, 18, 40, 55, 'No hay otro nombre', 'musica/0110-Acustico-Cristiano-NoHayOtroNombre-SesionAcusticaEvanCraft.mp3', 0),
(140, 18, 40, 55, 'Cobrando Vida', 'musica/0111-Acustico-Cristiano-CobrandoVida-SesionAcusticaEvanCraft.mp3', 0),
(141, 18, 40, 55, 'Rey Glorioso', 'musica/0112-Acustico-Cristiano-ReyGlorioso-SesionAcusticaEvanCraft.mp3', 0),
(142, 18, 40, 55, 'Ruinas Gloriosas', 'musica/0113-Acustico-Cristiano-RuinasGloriosas-SesionAcusticaEvanCraft.mp3', 0),
(143, 18, 40, 55, 'Somos Tuyos', 'musica/0114-Acustico-Cristiano-SomosTuyos-SesionAcusticaEvanCraft.mp3', 0),
(144, 23, 40, 29, 'Arrullo de Estrellas', 'musica/Zoé-Arrullo-de-Estrellas.ogg', 0),
(145, 23, 40, 29, 'Andrómeda', 'musica/Zoé-Andromeda.mp3', 0),
(146, 26, 40, 29, 'Chala Head Chala', 'musica/db.mp3', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_canciones_por_playlist`
--

CREATE TABLE IF NOT EXISTS `tbl_canciones_por_playlist` (
  `id_cancion` int(11) NOT NULL,
  `id_playlist` int(11) NOT NULL,
  PRIMARY KEY (`id_cancion`,`id_playlist`),
  KEY `fk_tbl_canciones_has_tbl_playlists_tbl_playlists1_idx` (`id_playlist`),
  KEY `fk_tbl_canciones_has_tbl_playlists_tbl_canciones1_idx` (`id_cancion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_canciones_por_playlist`
--

INSERT INTO `tbl_canciones_por_playlist` (`id_cancion`, `id_playlist`) VALUES
(100, 23),
(144, 23),
(145, 23),
(146, 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_canciones_por_usuario`
--

CREATE TABLE IF NOT EXISTS `tbl_canciones_por_usuario` (
  `id_cancion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_cancion`,`id_usuario`),
  KEY `fk_tbl_canciones_has_tbl_usuarios_tbl_usuarios1_idx` (`id_usuario`),
  KEY `fk_tbl_canciones_has_tbl_usuarios_tbl_canciones1_idx` (`id_cancion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_canciones_por_usuario`
--

INSERT INTO `tbl_canciones_por_usuario` (`id_cancion`, `id_usuario`) VALUES
(83, 15),
(84, 15),
(85, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_codigos_regalo`
--

CREATE TABLE IF NOT EXISTS `tbl_codigos_regalo` (
  `id_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_regalo` varchar(32) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `validez_dias` int(11) NOT NULL,
  `ingresado` tinyint(4) NOT NULL DEFAULT '0',
  `fecha_ingreso` datetime DEFAULT NULL,
  `usuario_ingreso` int(11) DEFAULT NULL,
  `id_tipo_suscripcion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_codigo`),
  UNIQUE KEY `codigo_regalo_UNIQUE` (`codigo_regalo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `tbl_codigos_regalo`
--

INSERT INTO `tbl_codigos_regalo` (`id_codigo`, `codigo_regalo`, `fecha_creacion`, `validez_dias`, `ingresado`, `fecha_ingreso`, `usuario_ingreso`, `id_tipo_suscripcion`) VALUES
(1, 'HJDUTRXYIO', '2017-11-15 00:00:00', 30, 0, NULL, NULL, 3),
(2, 'OVPLKNAIJM', '2017-11-15 00:00:00', 30, 0, NULL, NULL, 3),
(3, 'MGYWBAXVOR', '2017-11-15 00:00:00', 30, 0, NULL, NULL, 3),
(4, 'SBQGHZNAPY', '2017-11-15 00:00:00', 30, 0, NULL, NULL, 3),
(5, 'EPCOARLFHJ', '2017-11-15 00:00:00', 30, 0, NULL, NULL, 3),
(6, 'PBYXNKCHQT', '2017-11-15 00:00:00', 30, 0, NULL, NULL, 3),
(7, 'IONKJAUCGL', '2017-11-15 00:00:00', 30, 0, NULL, NULL, 3),
(8, 'GZRNLDXBAU', '2017-11-15 00:00:00', 30, 0, NULL, NULL, 3),
(9, 'YSBKVTXPMR', '2017-11-15 00:00:00', 30, 0, NULL, NULL, 3),
(10, 'CXJGSZFLMW', '2017-11-15 00:00:00', 30, 0, NULL, NULL, 3),
(11, 'AUSENWTHLP', '2017-11-15 00:00:00', 60, 0, NULL, NULL, 2),
(12, 'WYTLVCJQAO', '2017-11-15 00:00:00', 60, 0, NULL, NULL, 2),
(13, 'VCQWJTKAZB', '2017-11-15 00:00:00', 60, 0, NULL, NULL, 2),
(14, 'MVUSLNFYOH', '2017-11-15 00:00:00', 60, 0, NULL, NULL, 2),
(15, 'NWBZFOGCJS', '2017-11-15 00:00:00', 60, 0, NULL, NULL, 2),
(16, 'YGVSFAZNIQ', '2017-11-15 00:00:00', 60, 0, NULL, NULL, 2),
(17, 'WKTCFZLXSR', '2017-11-15 00:00:00', 60, 0, NULL, NULL, 2),
(18, 'LBDVEXARKG', '2017-11-15 00:00:00', 60, 0, NULL, NULL, 2),
(19, 'UZKQCNHBLP', '2017-11-15 00:00:00', 60, 0, NULL, NULL, 2),
(20, 'PDWFNVKHYT', '2017-11-15 00:00:00', 60, 0, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_comentarios_por_album`
--

CREATE TABLE IF NOT EXISTS `tbl_comentarios_por_album` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `id_album` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `comentario` varchar(250) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id_comentario`,`id_album`,`id_usuario`),
  KEY `fk_tbl_albumes_has_tbl_usuarios_tbl_usuarios2_idx` (`id_usuario`),
  KEY `fk_tbl_albumes_has_tbl_usuarios_tbl_albumes2_idx` (`id_album`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_comentarios_por_artista`
--

CREATE TABLE IF NOT EXISTS `tbl_comentarios_por_artista` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `id_artista` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `comentario` varchar(250) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id_comentario`,`id_artista`,`id_usuario`),
  KEY `fk_tbl_artistas_has_tbl_usuarios_tbl_usuarios2_idx` (`id_usuario`),
  KEY `fk_tbl_artistas_has_tbl_usuarios_tbl_artistas2_idx` (`id_artista`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_comentarios_por_playlist`
--

CREATE TABLE IF NOT EXISTS `tbl_comentarios_por_playlist` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `id_playlist` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `comentario` varchar(250) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id_comentario`,`id_playlist`,`id_usuario`),
  KEY `fk_tbl_playlists_has_tbl_usuarios_tbl_usuarios2_idx` (`id_usuario`),
  KEY `fk_tbl_playlists_has_tbl_usuarios_tbl_playlists2_idx` (`id_playlist`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_generos`
--

CREATE TABLE IF NOT EXISTS `tbl_generos` (
  `id_genero` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_genero` varchar(50) NOT NULL,
  PRIMARY KEY (`id_genero`),
  UNIQUE KEY `nombre_genero_UNIQUE` (`nombre_genero`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=69 ;

--
-- Volcado de datos para la tabla `tbl_generos`
--

INSERT INTO `tbl_generos` (`id_genero`, `nombre_genero`) VALUES
(55, 'Acústico'),
(56, 'Alternativa'),
(3, 'Bachata'),
(4, 'Baladas'),
(47, 'Banda'),
(5, 'Bass'),
(6, 'Blues'),
(65, 'Bolero'),
(7, 'Bossanova'),
(8, 'Country'),
(67, 'Cristiano'),
(36, 'Cumbia'),
(9, 'Dance'),
(10, 'Disco'),
(11, 'Electrónica'),
(13, 'Funk'),
(14, 'Funk Metal'),
(15, 'Gospel'),
(16, 'Hip-Hop'),
(49, 'Instrumental'),
(17, 'Jazz'),
(19, 'Latino'),
(20, 'Merengue'),
(21, 'Metal'),
(22, 'Música Clásica'),
(23, 'Pop'),
(24, 'Punk'),
(25, 'Punta'),
(37, 'Ranchera'),
(57, 'Rap'),
(26, 'Reggae'),
(27, 'Reguetón'),
(28, 'Rhythm and Blues'),
(29, 'Rock'),
(31, 'Rock & Roll'),
(32, 'Rock-Pop'),
(33, 'Salsa'),
(58, 'Ska'),
(34, 'Soul'),
(39, 'Tango'),
(61, 'Trap'),
(40, 'Tribal'),
(35, 'Urban');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_historial_por_usuario`
--

CREATE TABLE IF NOT EXISTS `tbl_historial_por_usuario` (
  `id_cancion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `escuchada_en` datetime DEFAULT NULL,
  PRIMARY KEY (`id_cancion`,`id_usuario`),
  KEY `fk_tbl_canciones_has_tbl_usuarios_tbl_usuarios2_idx` (`id_usuario`),
  KEY `fk_tbl_canciones_has_tbl_usuarios_tbl_canciones2_idx` (`id_cancion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_historial_por_usuario`
--

INSERT INTO `tbl_historial_por_usuario` (`id_cancion`, `id_usuario`, `escuchada_en`) VALUES
(83, 15, '2017-11-16 14:29:48'),
(144, 17, '2017-11-16 07:58:03'),
(145, 17, '2017-11-16 07:58:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_idioma`
--

CREATE TABLE IF NOT EXISTS `tbl_idioma` (
  `id_idioma` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_idioma` varchar(100) NOT NULL,
  `abreviatura_idioma` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_idioma`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=231 ;

--
-- Volcado de datos para la tabla `tbl_idioma`
--

INSERT INTO `tbl_idioma` (`id_idioma`, `nombre_idioma`, `abreviatura_idioma`) VALUES
(1, 'Afara', 'AA'),
(3, 'Avéstico', 'AE'),
(4, 'Afrikáans', 'AF'),
(5, 'Akano', 'AK'),
(6, 'Amhárico', 'AM'),
(7, 'Aragonés', 'AN'),
(8, 'Árabe', 'AR'),
(9, 'Asamés', 'AS'),
(10, 'Avar', 'AV'),
(11, 'Aimara', 'AY'),
(12, 'Azerí', 'AZ'),
(13, 'Baskir', 'BA'),
(14, 'Bielorruso', 'BE'),
(15, 'Búlgaro', 'BG'),
(16, 'Bhoyapuri', 'BH'),
(17, 'Bislama', 'BI'),
(18, 'Bambara', 'BM'),
(19, 'Bengalí', 'BN'),
(20, 'Tibetano', 'BO'),
(21, 'Bretón', 'BR'),
(22, 'Bosnio', 'BS'),
(23, 'Catalán', 'CA'),
(24, 'Checheno', 'CE'),
(25, 'Chamorro', 'CH'),
(26, 'Corso', 'CO'),
(27, 'Cree', 'CR'),
(28, 'Checo', 'CS'),
(29, 'Eslavo Eclesiástico Antiguo', 'CU'),
(30, 'Chuvasio', 'CV'),
(31, 'Galés', 'CY'),
(32, 'Danés', 'DA'),
(33, 'Alemán', 'DE'),
(34, 'Maldivo', 'DV'),
(35, 'Dzongkha', 'DZ'),
(36, 'Ewé', 'EE'),
(37, 'Griego', 'EL'),
(38, 'Inglés', 'EN'),
(39, 'Esperanto', 'EO'),
(40, 'Español', 'ES'),
(41, 'Estonio', 'ET'),
(42, 'Euskera', 'EU'),
(43, 'Persa', 'FA'),
(44, 'Fula', 'FF'),
(45, 'Finés', 'FI'),
(46, 'Fiyiano', 'FJ'),
(47, 'Feroés', 'FO'),
(48, 'Francés', 'FR'),
(49, 'Frisón', 'FY'),
(50, 'Irlandés', 'GA'),
(51, 'Gaélico Escocés', 'GD'),
(52, 'Gallego', 'GL'),
(53, 'Guaraní', 'GN'),
(54, 'Guyaratí', 'GU'),
(55, 'Manés', 'GV'),
(56, 'Hausa', 'HA'),
(57, 'Hebreo', 'HE'),
(58, 'Hindi', 'HI'),
(59, 'HiriMotu', 'HO'),
(60, 'Croata', 'HR'),
(61, 'Haitiano', 'HT'),
(62, 'Húngaro', 'HU'),
(63, 'Armenio', 'HY'),
(64, 'Herero', 'HZ'),
(65, 'Interlingua', 'IA'),
(66, 'Indonesio', 'ID'),
(67, 'Occidental', 'IE'),
(68, 'Igbo', 'IG'),
(69, 'YiDeSichuán', 'II'),
(70, 'Iñupiaq', 'IK'),
(71, 'Ido', 'IO'),
(72, 'Islandés', 'IS'),
(73, 'Italiano', 'IT'),
(74, 'Inuktitut', 'IU'),
(75, 'Japonés', 'JA'),
(76, 'Javanés', 'JV'),
(77, 'Georgiano', 'KA'),
(78, 'Kongo', 'KG'),
(79, 'Kikuyu', 'KI'),
(80, 'Kuanyama', 'KJ'),
(81, 'Kazajo', 'KK'),
(82, 'Groenlandés', 'KL'),
(83, 'Camboyano', 'KM'),
(84, 'Canarés', 'KN'),
(85, 'Coreano', 'KO'),
(86, 'Kanuri', 'KR'),
(87, 'Cachemiro', 'KS'),
(88, 'Kurdo', 'KU'),
(89, 'Komi', 'KV'),
(90, 'Córnico', 'KW'),
(91, 'Kirguís', 'KY'),
(92, 'Latín', 'LA'),
(93, 'Luxemburgués', 'LB'),
(94, 'Luganda', 'LG'),
(95, 'Limburgués', 'LI'),
(96, 'Lingala', 'LN'),
(97, 'Lao', 'LO'),
(98, 'Lituano', 'LT'),
(99, 'Luba-katanga', 'LU'),
(100, 'Letón', 'LV'),
(101, 'Malgache', 'MG'),
(102, 'Marshalés', 'MH'),
(103, 'Maorí', 'MI'),
(104, 'Macedonio', 'MK'),
(105, 'Malayalam', 'ML'),
(106, 'Mongol', 'MN'),
(107, 'Maratí', 'MR'),
(108, 'Malayo', 'MS'),
(109, 'Maltés', 'MT'),
(110, 'Birmano', 'MY'),
(111, 'Nauruano', 'NA'),
(112, 'Noruego Bokmål', 'NB'),
(113, 'Ndebele Del Norte', 'ND'),
(114, 'Nepalí', 'NE'),
(115, 'Ndonga', 'NG'),
(116, 'Neerlandés', 'NL'),
(117, 'Nynorsk', 'NN'),
(118, 'Noruego', 'NO'),
(119, 'Ndebele Del Sur', 'NR'),
(120, 'Navajo', 'NV'),
(121, 'Chichewa', 'NY'),
(122, 'Occitano', 'OC'),
(123, 'Ojibwa', 'OJ'),
(124, 'Oromo', 'OM'),
(125, 'Oriya', 'OR'),
(126, 'Osético', 'OS'),
(127, 'Panyabí', 'PA'),
(128, 'Pali', 'PI'),
(129, 'Polaco', 'PL'),
(130, 'Pastú', 'PS'),
(131, 'Portugués', 'PT'),
(132, 'Quechua', 'QU'),
(133, 'Romanche', 'RM'),
(134, 'Kirundi', 'RN'),
(135, 'Rumano', 'RO'),
(136, 'Ruso', 'RU'),
(137, 'Ruandés', 'RW'),
(138, 'Sánscrito', 'SA'),
(139, 'Sardo', 'SC'),
(140, 'Sindhi', 'SD'),
(141, 'Sami Septentrional', 'SE'),
(142, 'Sango', 'SG'),
(143, 'Cingalés', 'SI'),
(144, 'Eslovaco', 'SK'),
(145, 'Esloveno', 'SL'),
(146, 'Samoano', 'SM'),
(147, 'Shona', 'SN'),
(148, 'Somalí', 'SO'),
(149, 'Albanés', 'SQ'),
(150, 'Serbio', 'SR'),
(151, 'Suazi', 'SS'),
(152, 'Sesotho', 'ST'),
(153, 'Sundanés', 'SU'),
(154, 'Sueco', 'SV'),
(155, 'Suajili', 'SW'),
(156, 'Tamil', 'TA'),
(157, 'Télugu', 'TE'),
(158, 'Tayiko', 'TG'),
(159, 'Tailandés', 'TH'),
(160, 'Tigriña', 'TI'),
(161, 'Turcomano', 'TK'),
(162, 'Tagalo', 'TL'),
(163, 'Setsuana', 'TN'),
(164, 'Tongano', 'TO'),
(165, 'Turco', 'TR'),
(166, 'Tsonga', 'TS'),
(167, 'Tártaro', 'TT'),
(168, 'Twi', 'TW'),
(169, 'Tahitiano', 'TY'),
(170, 'Uigur', 'UG'),
(171, 'Ucraniano', 'UK'),
(172, 'Urdu', 'UR'),
(173, 'Uzbeko', 'UZ'),
(174, 'Venda', 'VE'),
(175, 'Vietnamita', 'VI'),
(176, 'Volapük', 'VO'),
(177, 'Valón', 'WA'),
(178, 'Wolof', 'WO'),
(179, 'Xhosa', 'XH'),
(180, 'Yídish', 'YI'),
(181, 'Yoruba', 'YO'),
(182, 'Chuan', 'ZA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_paises`
--

CREATE TABLE IF NOT EXISTS `tbl_paises` (
  `id_pais` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_pais` varchar(100) NOT NULL,
  `abreviatura_pais` varchar(20) DEFAULT NULL,
  `codigo_telefono_pais` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_pais`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=263 ;

--
-- Volcado de datos para la tabla `tbl_paises`
--

INSERT INTO `tbl_paises` (`id_pais`, `nombre_pais`, `abreviatura_pais`, `codigo_telefono_pais`) VALUES
(1, 'Afganistán', 'AFG', '93'),
(2, 'Albania', 'ALB', '355'),
(3, 'Alemania', 'DEU', '49'),
(4, 'Algeria', 'DZA', '213'),
(5, 'Andorra', 'AND', '376'),
(6, 'Angola', 'AGO', '244'),
(7, 'Anguila', 'AIA', '1 264'),
(8, 'Antártida', 'ATA', '672'),
(9, 'Antigua y Barbuda', 'ATG', '1 268'),
(10, 'Antillas Neerlandesas', 'ANT', '599'),
(11, 'Arabia Saudita', 'SAU', '966'),
(12, 'Argentina', 'ARG', '54'),
(13, 'Armenia', 'ARM', '374'),
(14, 'Aruba', 'ABW', '297'),
(15, 'Australia', 'AUS', '61'),
(16, 'Austria', 'AUT', '43'),
(17, 'Azerbayán', 'AZE', '994'),
(18, 'Bélgica', 'BEL', '32'),
(19, 'Bahamas', 'BHS', '1 242'),
(20, 'Bahrein', 'BHR', '973'),
(21, 'Bangladesh', 'BGD', '880'),
(22, 'Barbados', 'BRB', '1 246'),
(23, 'Belice', 'BLZ', '501'),
(24, 'Benín', 'BEN', '229'),
(25, 'Bhután', 'BTN', '975'),
(26, 'Bielorrusia', 'BLR', '375'),
(27, 'Birmania', 'MMR', '95'),
(28, 'Bolivia', 'BOL', '591'),
(29, 'Bosnia y Herzegovina', 'BIH', '387'),
(30, 'Botsuana', 'BWA', '267'),
(31, 'Brasil', 'BRA', '55'),
(32, 'Brunéi', 'BRN', '673'),
(33, 'Bulgaria', 'BGR', '359'),
(34, 'Burkina Faso', 'BFA', '226'),
(35, 'Burundi', 'BDI', '257'),
(36, 'Cabo Verde', 'CPV', '238'),
(37, 'Camboya', 'KHM', '855'),
(38, 'Camerún', 'CMR', '237'),
(39, 'Canadá', 'CAN', '1'),
(40, 'Chad', 'TCD', '235'),
(41, 'Chile', 'CHL', '56'),
(42, 'China', 'CHN', '86'),
(43, 'Chipre', 'CYP', '357'),
(44, 'Ciudad del Vaticano', 'VAT', '39'),
(45, 'Colombia', 'COL', '57'),
(46, 'Comoras', 'COM', '269'),
(47, 'Congo', 'COG', '242'),
(48, 'Congo', 'COD', '243'),
(49, 'Corea del Norte', 'PRK', '850'),
(50, 'Corea del Sur', 'KOR', '82'),
(51, 'Costa de Marfil', 'CIV', '225'),
(52, 'Costa Rica', 'CRI', '506'),
(53, 'Croacia', 'HRV', '385'),
(54, 'Cuba', 'CUB', '53'),
(55, 'Dinamarca', 'DNK', '45'),
(56, 'Dominica', 'DMA', '1 767'),
(57, 'Ecuador', 'ECU', '593'),
(58, 'Egipto', 'EGY', '20'),
(59, 'El Salvador', 'SLV', '503'),
(60, 'Emiratos Árabes Unidos', 'ARE', '971'),
(61, 'Eritrea', 'ERI', '291'),
(62, 'Eslovaquia', 'SVK', '421'),
(63, 'Eslovenia', 'SVN', '386'),
(64, 'España', 'ESP', '34'),
(65, 'Estados Unidos de América', 'USA', '1'),
(66, 'Estonia', 'EST', '372'),
(67, 'Etiopía', 'ETH', '251'),
(68, 'Filipinas', 'PHL', '63'),
(69, 'Finlandia', 'FIN', '358'),
(70, 'Fiyi', 'FJI', '679'),
(71, 'Francia', 'FRA', '33'),
(72, 'Gabón', 'GAB', '241'),
(73, 'Gambia', 'GMB', '220'),
(74, 'Georgia', 'GEO', '995'),
(75, 'Ghana', 'GHA', '233'),
(76, 'Gibraltar', 'GIB', '350'),
(77, 'Granada', 'GRD', '1 473'),
(78, 'Grecia', 'GRC', '30'),
(79, 'Groenlandia', 'GRL', '299'),
(80, 'Guadalupe', 'GLP', ''),
(81, 'Guam', 'GUM', '1 671'),
(82, 'Guatemala', 'GTM', '502'),
(83, 'Guayana Francesa', 'GUF', ''),
(84, 'Guernsey', 'GGY', ''),
(85, 'Guinea', 'GIN', '224'),
(86, 'Guinea Ecuatorial', 'GNQ', '240'),
(87, 'Guinea-Bissau', 'GNB', '245'),
(88, 'Guyana', 'GUY', '592'),
(89, 'Haití', 'HTI', '509'),
(90, 'Honduras', 'HND', '504'),
(91, 'Hong kong', 'HKG', '852'),
(92, 'Hungría', 'HUN', '36'),
(93, 'India', 'IND', '91'),
(94, 'Indonesia', 'IDN', '62'),
(95, 'Irán', 'IRN', '98'),
(96, 'Irak', 'IRQ', '964'),
(97, 'Irlanda', 'IRL', '353'),
(98, 'Isla Bouvet', 'BVT', ''),
(99, 'Isla de Man', 'IMN', '44'),
(100, 'Isla de Navidad', 'CXR', '61'),
(101, 'Isla Norfolk', 'NFK', ''),
(102, 'Islandia', 'ISL', '354'),
(103, 'Islas Bermudas', 'BMU', '1 441'),
(104, 'Islas Caimán', 'CYM', '1 345'),
(105, 'Islas Cocos (Keeling)', 'CCK', '61'),
(106, 'Islas Cook', 'COK', '682'),
(107, 'Islas de Åland', 'ALA', ''),
(108, 'Islas Feroe', 'FRO', '298'),
(109, 'Islas Georgias del Sur y Sandwich del Sur', 'SGS', ''),
(110, 'Islas Heard y McDonald', 'HMD', ''),
(111, 'Islas Maldivas', 'MDV', '960'),
(112, 'Islas Malvinas', 'FLK', '500'),
(113, 'Islas Marianas del Norte', 'MNP', '1 670'),
(114, 'Islas Marshall', 'MHL', '692'),
(115, 'Islas Pitcairn', 'PCN', '870'),
(116, 'Islas Salomón', 'SLB', '677'),
(117, 'Islas Turcas y Caicos', 'TCA', '1 649'),
(118, 'Islas Ultramarinas Menores de Estados Unidos', 'UMI', ''),
(119, 'Islas Vírgenes Británicas', 'VG', '1 284'),
(120, 'Islas Vírgenes de los Estados Unidos', 'VIR', '1 340'),
(121, 'Israel', 'ISR', '972'),
(122, 'Italia', 'ITA', '39'),
(123, 'Jamaica', 'JAM', '1 876'),
(124, 'Japón', 'JPN', '81'),
(125, 'Jersey', 'JEY', ''),
(126, 'Jordania', 'JOR', '962'),
(127, 'Kazajistán', 'KAZ', '7'),
(128, 'Kenia', 'KEN', '254'),
(129, 'Kirgizstán', 'KGZ', '996'),
(130, 'Kiribati', 'KIR', '686'),
(131, 'Kuwait', 'KWT', '965'),
(132, 'Líbano', 'LBN', '961'),
(133, 'Laos', 'LAO', '856'),
(134, 'Lesoto', 'LSO', '266'),
(135, 'Letonia', 'LVA', '371'),
(136, 'Liberia', 'LBR', '231'),
(137, 'Libia', 'LBY', '218'),
(138, 'Liechtenstein', 'LIE', '423'),
(139, 'Lituania', 'LTU', '370'),
(140, 'Luxemburgo', 'LUX', '352'),
(141, 'México', 'MEX', '52'),
(142, 'Mónaco', 'MCO', '377'),
(143, 'Macao', 'MAC', '853'),
(144, 'Macedônia', 'MKD', '389'),
(145, 'Madagascar', 'MDG', '261'),
(146, 'Malasia', 'MYS', '60'),
(147, 'Malawi', 'MWI', '265'),
(148, 'Mali', 'MLI', '223'),
(149, 'Malta', 'MLT', '356'),
(150, 'Marruecos', 'MAR', '212'),
(151, 'Martinica', 'MTQ', ''),
(152, 'Mauricio', 'MUS', '230'),
(153, 'Mauritania', 'MRT', '222'),
(154, 'Mayotte', 'MYT', '262'),
(155, 'Micronesia', 'FSM', '691'),
(156, 'Moldavia', 'MDA', '373'),
(157, 'Mongolia', 'MNG', '976'),
(158, 'Montenegro', 'MNE', '382'),
(159, 'Montserrat', 'MSR', '1 664'),
(160, 'Mozambique', 'MOZ', '258'),
(161, 'Namibia', 'NAM', '264'),
(162, 'Nauru', 'NRU', '674'),
(163, 'Nepal', 'NPL', '977'),
(164, 'Nicaragua', 'NIC', '505'),
(165, 'Niger', 'NER', '227'),
(166, 'Nigeria', 'NGA', '234'),
(167, 'Niue', 'NIU', '683'),
(168, 'Noruega', 'NOR', '47'),
(169, 'Nueva Caledonia', 'NCL', '687'),
(170, 'Nueva Zelanda', 'NZL', '64'),
(171, 'Omán', 'OMN', '968'),
(172, 'Países Bajos', 'NLD', '31'),
(173, 'Pakistán', 'PAK', '92'),
(174, 'Palau', 'PLW', '680'),
(175, 'Palestina', 'PSE', ''),
(176, 'Panamá', 'PAN', '507'),
(177, 'Papúa Nueva Guinea', 'PNG', '675'),
(178, 'Paraguay', 'PRY', '595'),
(179, 'Perú', 'PER', '51'),
(180, 'Polinesia Francesa', 'PYF', '689'),
(181, 'Polonia', 'POL', '48'),
(182, 'Portugal', 'PRT', '351'),
(183, 'Puerto Rico', 'PRI', '1'),
(184, 'Qatar', 'QAT', '974'),
(185, 'Reino Unido', 'GBR', '44'),
(186, 'República Centroafricana', 'CAF', '236'),
(187, 'República Checa', 'CZE', '420'),
(188, 'República Dominicana', 'DOM', '1 809'),
(189, 'Reunión', 'REU', ''),
(190, 'Ruanda', 'RWA', '250'),
(191, 'Rumanía', 'ROU', '40'),
(192, 'Rusia', 'RUS', '7'),
(193, 'Sahara Occidental', 'ESH', ''),
(194, 'Samoa', 'WSM', '685'),
(195, 'Samoa Americana', 'ASM', '1 684'),
(196, 'San Bartolomé', 'BLM', '590'),
(197, 'San Cristóbal y Nieves', 'KNA', '1 869'),
(198, 'San Marino', 'SMR', '378'),
(199, 'San Martín (Francia)', 'MAF', '1 599'),
(200, 'San Pedro y Miquelón', 'SPM', '508'),
(201, 'San Vicente y las Granadinas', 'VCT', '1 784'),
(202, 'Santa Elena', 'SHN', '290'),
(203, 'Santa Lucía', 'LCA', '1 758'),
(204, 'Santo Tomé y Príncipe', 'STP', '239'),
(205, 'Senegal', 'SEN', '221'),
(206, 'Serbia', 'SRB', '381'),
(207, 'Seychelles', 'SYC', '248'),
(208, 'Sierra Leona', 'SLE', '232'),
(209, 'Singapur', 'SGP', '65'),
(210, 'Siria', 'SYR', '963'),
(211, 'Somalia', 'SOM', '252'),
(212, 'Sri lanka', 'LKA', '94'),
(213, 'Sudáfrica', 'ZAF', '27'),
(214, 'Sudán', 'SDN', '249'),
(215, 'Suecia', 'SWE', '46'),
(216, 'Suiza', 'CHE', '41'),
(217, 'Surinám', 'SUR', '597'),
(218, 'Svalbard y Jan Mayen', 'SJM', ''),
(219, 'Swazilandia', 'SWZ', '268'),
(220, 'Tadjikistán', 'TJK', '992'),
(221, 'Tailandia', 'THA', '66'),
(222, 'Taiwán', 'TWN', '886'),
(223, 'Tanzania', 'TZA', '255'),
(224, 'Territorio Británico del Océano Índico', 'IOT', ''),
(225, 'Territorios Australes y Antárticas Franceses', 'ATF', ''),
(226, 'Timor Oriental', 'TLS', '670'),
(227, 'Togo', 'TGO', '228'),
(228, 'Tokelau', 'TKL', '690'),
(229, 'Tonga', 'TON', '676'),
(230, 'Trinidad y Tobago', 'TTO', '1 868'),
(231, 'Tunez', 'TUN', '216'),
(232, 'Turkmenistán', 'TKM', '993'),
(233, 'Turquía', 'TUR', '90'),
(234, 'Tuvalu', 'TUV', '688'),
(235, 'Ucrania', 'UKR', '380'),
(236, 'Uganda', 'UGA', '256'),
(237, 'Uruguay', 'URY', '598'),
(238, 'Uzbekistán', 'UZB', '998'),
(239, 'Vanuatu', 'VUT', '678'),
(240, 'Venezuela', 'VEN', '58'),
(241, 'Vietnam', 'VNM', '84'),
(242, 'Wallis y Futuna', 'WLF', '681'),
(243, 'Yemen', 'YEM', '967'),
(244, 'Yibuti', 'DJI', '253'),
(245, 'Zambia', 'ZMB', '260'),
(246, 'Zimbabue', 'ZWE', '263');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_playlists`
--

CREATE TABLE IF NOT EXISTS `tbl_playlists` (
  `id_playlist` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_visibilidad` int(11) NOT NULL,
  `nombre_playlist` varchar(100) NOT NULL,
  `id_usuario` varchar(45) NOT NULL,
  `url_foto_playlist` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id_playlist`),
  KEY `fk_tbl_playlists_tbl_tipo_visibilidad1_idx` (`id_tipo_visibilidad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `tbl_playlists`
--

INSERT INTO `tbl_playlists` (`id_playlist`, `id_tipo_visibilidad`, `nombre_playlist`, `id_usuario`, `url_foto_playlist`) VALUES
(18, 1, 'Music', '14', 'img/b.jpg'),
(19, 1, 'Estudiar', '14', 'img/2.jpg'),
(23, 2, 'Bienvenida', '14', 'img/welcome.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_playlists_por_usuarios`
--

CREATE TABLE IF NOT EXISTS `tbl_playlists_por_usuarios` (
  `id_playlist` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_playlist`,`id_usuario`),
  KEY `fk_tbl_playlists_has_tbl_usuarios_tbl_usuarios1_idx` (`id_usuario`),
  KEY `fk_tbl_playlists_has_tbl_usuarios_tbl_playlists1_idx` (`id_playlist`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_playlists_por_usuarios`
--

INSERT INTO `tbl_playlists_por_usuarios` (`id_playlist`, `id_usuario`) VALUES
(18, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_seguidores`
--

CREATE TABLE IF NOT EXISTS `tbl_seguidores` (
  `id_usuario` int(11) NOT NULL,
  `id_sigue_a_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_sigue_a_usuario`),
  KEY `fk_tbl_usuarios_has_tbl_usuarios_tbl_usuarios2_idx` (`id_sigue_a_usuario`),
  KEY `fk_tbl_usuarios_has_tbl_usuarios_tbl_usuarios1_idx` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sesiones`
--

CREATE TABLE IF NOT EXISTS `tbl_sesiones` (
  `id_sesion` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_tipo_dispositivo` int(11) NOT NULL,
  `nombre_dispositivo` varchar(100) DEFAULT NULL,
  `fecha_incio_secion` datetime NOT NULL,
  `activa` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_sesion`),
  KEY `fk_tbl_sesiones_tbl_usuarios1_idx` (`id_usuario`),
  KEY `fk_tbl_sesiones_tbl_tipo_dispositivo1_idx` (`id_tipo_dispositivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_suscripciones`
--

CREATE TABLE IF NOT EXISTS `tbl_suscripciones` (
  `id_suscripcion` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_suscripcion` int(11) NOT NULL DEFAULT '1',
  `inicio_suscripcion` datetime NOT NULL,
  PRIMARY KEY (`id_suscripcion`),
  KEY `fk_tbl_suscripciones_tbl_tipo_suscripcion1_idx` (`id_tipo_suscripcion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Volcado de datos para la tabla `tbl_suscripciones`
--

INSERT INTO `tbl_suscripciones` (`id_suscripcion`, `id_tipo_suscripcion`, `inicio_suscripcion`) VALUES
(21, 1, '2017-11-16 03:26:02'),
(22, 1, '2017-11-16 03:28:33'),
(23, 1, '2017-11-16 03:32:29'),
(24, 1, '2017-11-16 03:32:44'),
(25, 1, '2017-11-16 03:33:03'),
(26, 1, '2017-11-16 03:33:34'),
(27, 1, '2017-11-16 03:34:10'),
(28, 1, '2017-11-16 03:36:21'),
(29, 1, '2017-11-16 03:37:06'),
(31, 1, '2017-11-16 05:11:35'),
(32, 1, '2017-11-16 05:11:58'),
(33, 1, '2017-11-16 05:13:01'),
(34, 1, '2017-11-16 05:13:29'),
(36, 1, '2017-11-16 06:27:30'),
(38, 1, '2017-11-16 14:34:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_dispositivo`
--

CREATE TABLE IF NOT EXISTS `tbl_tipo_dispositivo` (
  `id_tipo_dispositivo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_dispositivo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_dispositivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_suscripcion`
--

CREATE TABLE IF NOT EXISTS `tbl_tipo_suscripcion` (
  `id_tipo_suscripcion` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_suscripcion` varchar(45) NOT NULL,
  `dias_duracion` int(11) NOT NULL,
  PRIMARY KEY (`id_tipo_suscripcion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tbl_tipo_suscripcion`
--

INSERT INTO `tbl_tipo_suscripcion` (`id_tipo_suscripcion`, `tipo_suscripcion`, `dias_duracion`) VALUES
(1, 'Gratis', 30),
(2, 'Premium+', 30),
(3, 'Deezer Family', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `tbl_tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_usuario` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo_usuario`),
  UNIQUE KEY `id_tipo_usuario_UNIQUE` (`id_tipo_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tbl_tipo_usuario`
--

INSERT INTO `tbl_tipo_usuario` (`id_tipo_usuario`, `tipo_usuario`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_visibilidad`
--

CREATE TABLE IF NOT EXISTS `tbl_tipo_visibilidad` (
  `id_tipo_visibilidad` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_visibilidad` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipo_visibilidad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbl_tipo_visibilidad`
--

INSERT INTO `tbl_tipo_visibilidad` (`id_tipo_visibilidad`, `tipo_visibilidad`) VALUES
(1, 'Privada'),
(2, 'Pública');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE IF NOT EXISTS `tbl_usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_suscripcion` int(11) NOT NULL,
  `id_pais` int(11) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `sexo` char(1) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contrasenia` varchar(512) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `url_foto_perfil` varchar(1000) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_tipo_usuario`),
  UNIQUE KEY `id_suscripcion_UNIQUE` (`id_suscripcion`),
  KEY `fk_tbl_usuarios_tbl_paises1_idx` (`id_pais`),
  KEY `fk_tbl_usuarios_tbl_tipo_usuario1_idx` (`id_tipo_usuario`),
  KEY `fk_tbl_usuarios_tbl_suscripciones1_idx` (`id_suscripcion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id_usuario`, `id_suscripcion`, `id_pais`, `usuario`, `nombre`, `apellido`, `sexo`, `email`, `contrasenia`, `fecha_nacimiento`, `url_foto_perfil`, `id_tipo_usuario`) VALUES
(15, 36, 90, 'usuario', 'Usuario', 'Normal', 'M', 'usuario@gmail.com', '7be7d0265fa9f8a586f7979b03668e52f726878c453c11d14c05274a1e655ccb7df708c809a049edf778fa1f00df15d77886702a7f6c78500ff3db21895e4817', '1992-02-27', 'img/wN.png', 2),
(17, 38, 124, 'goku', 'Goku', 'Son', 'M', 'goku@gmail.com', '7be7d0265fa9f8a586f7979b03668e52f726878c453c11d14c05274a1e655ccb7df708c809a049edf778fa1f00df15d77886702a7f6c78500ff3db21895e4817', '1990-12-12', 'img/user.jpg', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_albumes`
--
ALTER TABLE `tbl_albumes`
  ADD CONSTRAINT `fk_tbl_albumes_tbl_artistas1` FOREIGN KEY (`id_artista`) REFERENCES `tbl_artistas` (`id_artista`);

--
-- Filtros para la tabla `tbl_albumes_por_usuarios`
--
ALTER TABLE `tbl_albumes_por_usuarios`
  ADD CONSTRAINT `fk_tbl_albumes_has_tbl_usuarios_tbl_albumes1` FOREIGN KEY (`id_album`) REFERENCES `tbl_albumes` (`id_album`),
  ADD CONSTRAINT `fk_tbl_albumes_has_tbl_usuarios_tbl_usuarios1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuarios` (`id_usuario`);

--
-- Filtros para la tabla `tbl_artistas_por_usuarios`
--
ALTER TABLE `tbl_artistas_por_usuarios`
  ADD CONSTRAINT `fk_tbl_artistas_has_tbl_usuarios_tbl_artistas1` FOREIGN KEY (`id_artista`) REFERENCES `tbl_artistas` (`id_artista`),
  ADD CONSTRAINT `fk_tbl_artistas_has_tbl_usuarios_tbl_usuarios1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuarios` (`id_usuario`);

--
-- Filtros para la tabla `tbl_canciones`
--
ALTER TABLE `tbl_canciones`
  ADD CONSTRAINT `fk_tbl_canciones_tbl_albumes` FOREIGN KEY (`id_album`) REFERENCES `tbl_albumes` (`id_album`),
  ADD CONSTRAINT `fk_tbl_canciones_tbl_generos1` FOREIGN KEY (`id_genero`) REFERENCES `tbl_generos` (`id_genero`),
  ADD CONSTRAINT `fk_tbl_canciones_tbl_idioma1` FOREIGN KEY (`id_idioma`) REFERENCES `tbl_idioma` (`id_idioma`);

--
-- Filtros para la tabla `tbl_canciones_por_playlist`
--
ALTER TABLE `tbl_canciones_por_playlist`
  ADD CONSTRAINT `fk_tbl_canciones_has_tbl_playlists_tbl_canciones1` FOREIGN KEY (`id_cancion`) REFERENCES `tbl_canciones` (`id_cancion`),
  ADD CONSTRAINT `fk_tbl_canciones_has_tbl_playlists_tbl_playlists1` FOREIGN KEY (`id_playlist`) REFERENCES `tbl_playlists` (`id_playlist`);

--
-- Filtros para la tabla `tbl_canciones_por_usuario`
--
ALTER TABLE `tbl_canciones_por_usuario`
  ADD CONSTRAINT `fk_tbl_canciones_has_tbl_usuarios_tbl_canciones1` FOREIGN KEY (`id_cancion`) REFERENCES `tbl_canciones` (`id_cancion`),
  ADD CONSTRAINT `fk_tbl_canciones_has_tbl_usuarios_tbl_usuarios1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuarios` (`id_usuario`);

--
-- Filtros para la tabla `tbl_comentarios_por_album`
--
ALTER TABLE `tbl_comentarios_por_album`
  ADD CONSTRAINT `fk_tbl_albumes_has_tbl_usuarios_tbl_albumes2` FOREIGN KEY (`id_album`) REFERENCES `tbl_albumes` (`id_album`),
  ADD CONSTRAINT `fk_tbl_albumes_has_tbl_usuarios_tbl_usuarios2` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuarios` (`id_usuario`);

--
-- Filtros para la tabla `tbl_comentarios_por_artista`
--
ALTER TABLE `tbl_comentarios_por_artista`
  ADD CONSTRAINT `fk_tbl_artistas_has_tbl_usuarios_tbl_artistas2` FOREIGN KEY (`id_artista`) REFERENCES `tbl_artistas` (`id_artista`),
  ADD CONSTRAINT `fk_tbl_artistas_has_tbl_usuarios_tbl_usuarios2` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuarios` (`id_usuario`);

--
-- Filtros para la tabla `tbl_comentarios_por_playlist`
--
ALTER TABLE `tbl_comentarios_por_playlist`
  ADD CONSTRAINT `fk_tbl_playlists_has_tbl_usuarios_tbl_playlists2` FOREIGN KEY (`id_playlist`) REFERENCES `tbl_playlists` (`id_playlist`),
  ADD CONSTRAINT `fk_tbl_playlists_has_tbl_usuarios_tbl_usuarios2` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuarios` (`id_usuario`);

--
-- Filtros para la tabla `tbl_historial_por_usuario`
--
ALTER TABLE `tbl_historial_por_usuario`
  ADD CONSTRAINT `fk_tbl_canciones_has_tbl_usuarios_tbl_canciones2` FOREIGN KEY (`id_cancion`) REFERENCES `tbl_canciones` (`id_cancion`),
  ADD CONSTRAINT `fk_tbl_canciones_has_tbl_usuarios_tbl_usuarios2` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuarios` (`id_usuario`);

--
-- Filtros para la tabla `tbl_playlists`
--
ALTER TABLE `tbl_playlists`
  ADD CONSTRAINT `fk_tbl_playlists_tbl_tipo_visibilidad1` FOREIGN KEY (`id_tipo_visibilidad`) REFERENCES `tbl_tipo_visibilidad` (`id_tipo_visibilidad`);

--
-- Filtros para la tabla `tbl_playlists_por_usuarios`
--
ALTER TABLE `tbl_playlists_por_usuarios`
  ADD CONSTRAINT `fk_tbl_playlists_has_tbl_usuarios_tbl_playlists1` FOREIGN KEY (`id_playlist`) REFERENCES `tbl_playlists` (`id_playlist`),
  ADD CONSTRAINT `fk_tbl_playlists_has_tbl_usuarios_tbl_usuarios1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuarios` (`id_usuario`);

--
-- Filtros para la tabla `tbl_seguidores`
--
ALTER TABLE `tbl_seguidores`
  ADD CONSTRAINT `fk_tbl_usuarios_has_tbl_usuarios_tbl_usuarios1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuarios` (`id_usuario`),
  ADD CONSTRAINT `fk_tbl_usuarios_has_tbl_usuarios_tbl_usuarios2` FOREIGN KEY (`id_sigue_a_usuario`) REFERENCES `tbl_usuarios` (`id_usuario`);

--
-- Filtros para la tabla `tbl_sesiones`
--
ALTER TABLE `tbl_sesiones`
  ADD CONSTRAINT `fk_tbl_sesiones_tbl_tipo_dispositivo1` FOREIGN KEY (`id_tipo_dispositivo`) REFERENCES `tbl_tipo_dispositivo` (`id_tipo_dispositivo`),
  ADD CONSTRAINT `fk_tbl_sesiones_tbl_usuarios1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuarios` (`id_usuario`);

--
-- Filtros para la tabla `tbl_suscripciones`
--
ALTER TABLE `tbl_suscripciones`
  ADD CONSTRAINT `fk_tbl_suscripciones_tbl_tipo_suscripcion1` FOREIGN KEY (`id_tipo_suscripcion`) REFERENCES `tbl_tipo_suscripcion` (`id_tipo_suscripcion`);

--
-- Filtros para la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD CONSTRAINT `fk_tbl_usuarios_tbl_suscripciones1` FOREIGN KEY (`id_suscripcion`) REFERENCES `tbl_suscripciones` (`id_suscripcion`),
  ADD CONSTRAINT `fk_tbl_usuarios_tbl_tipo_usuario1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tbl_tipo_usuario` (`id_tipo_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
