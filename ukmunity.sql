# MySQL-Front 5.0  (Build 1.0)

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40101 SET SQL_MODE='' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;
/*!40103 SET SQL_NOTES='ON' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;


# Host: localhost    Database: ukmunity
# ------------------------------------------------------
# Server version 5.5.25a

#
# Table structure for table artikel
#

DROP TABLE IF EXISTS `artikel`;
CREATE TABLE `artikel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namaArtikel` varchar(255) DEFAULT NULL,
  `deskripsiArtikel` varchar(255) DEFAULT NULL,
  `isiArtikel` text,
  `gambarArtikel` varchar(255) DEFAULT NULL,
  `tagArtikel` varchar(255) DEFAULT NULL,
  `tglInput` datetime DEFAULT NULL,
  `tglUpdate` datetime DEFAULT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `inputBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
INSERT INTO `artikel` VALUES (9,'Presiden SBY Disadap, Apa Kata BlackBerry?','Presiden SBY Disadap, Apa Kata BlackBerry?','Jakarta&nbsp;- Presiden Susilo Bambang Yudhoyono beserta sejumlah menterinya dilaporkan telah disadap Australia. Dari sepuluh pejabat nomor satu di Indonesia ini, dua di antaranya saat disadap ternyata menggunakan ponsel BlackBerry.<br><br>Wakil Presiden Boediono dan Dino Patti Djalal yang saat itu masih menjadi juru bicara presiden urusan luar negeri, dalam dokumen intelijen Australia yang bocor, disebut menggunakan handset 3G BlackBerry seri Bold 9000 saat disadap.<br><br>Lantas, apa kata BlackBerry mengenai hal ini? Saat ditemui usai peluncuran BlackBerry Z30, di Ritz Carlton, Pacific Place, Jakarta, Selasa (19/11/2013), para petinggi BlackBerry Indonesia pun langsung dicecar dengan pertanyaan tentang kabar penyadapan.<br><br>\"Kami tak bisa memberikan komentar lebih jauh karena kami harus jelas terlebih dahulu metode penyadapannya. Kalau voice yang disadap, itu pakai network operator. Tapi kalau email atau BBM, itu baru pakai server BlackBerry,\" kata Maspiono Handoyo, Managing Director BlackBerry Indonesia.<br><br>Jika melihat dari dokumen Departemen Pertahanan Australia dan juga Direktorat Sandi Pertahanan (DSD) yang bocor itu, waktu penyadapannya disebut-sebut sekitar tahun 2009. Jadi kemungkinannya, ponsel BlackBerry Wapres yang disadap menggunakan layanan Blackberry Internet Service (BIS).&nbsp;<br><br>BlackBerry sendiri mengklaim layanannya sejak awal dikenal dengan keamanan datanya. Apalagi menurut Senior Product Manager BlackBerry South East Asia, Ardo Fadhola, keamanan data menjadi keunggulan utama BlackBerry dibanding kompetitornya.<br><br>\"Security jadi salah satu concern kami. Dari awal, BlackBerry dibangun untuk enterprise. Jadi, keamanan sudah jadi DNA kami,\" kata Ardo','75d7bc816e95b89b20bd07ca6d3c856f.jpg','featured','2013-11-19 14:13:38','2013-11-21 12:05:51',12,12);
INSERT INTO `artikel` VALUES (10,'Ponsel Mewah BlackBerry Porsche','Ponsel Mewah BlackBerry Porsche','BlackBerry Porsche kembali hadir dengan berbagai penyegaran. Ponsel premium ini dibalut dengan material kulit dan mengusung desain elegan.','952234c7655103c6ab82897044c031e8.png','featured','2013-11-19 14:14:54','2013-11-21 12:06:04',12,12);
INSERT INTO `artikel` VALUES (11,'Pangeran William Kepincut PlayStation 4','Pangeran William Kepincut PlayStation 4','Jakarta&nbsp;- Tak sabar menjajal PlayStation 4 (PS4)? Bukan Anda saja rupanya yang penasaran dengan konsol terbaru dari Sony ini, Pangeran William dari Inggris pun ngebet ingin memilikinya.&nbsp;<br><br>Suami dari Kate Middleton ini berkenalan dengan PS4 untuk pertama kalinya pada sebuah event film, TV dan gaming. Di ajang itu, dia mengaku sebagai penggemar game, meski tidak terlalu jago.<br><br>\"Ini bisa bikin kecanduan,\" kata The Duke of Cambridge ini dengan antusias, saat diperlihatkan PS4 di hadapannya. Namun dia punya banyak pertimbangan untuk memilikinya, salah satunya karena kini dia semakin sibuk setelah kelahiran si kecil Pangeran George.&nbsp;<br><br>Selain itu, seperti dilaporkan&nbsp;Telegraph, Selasa (19/11/2013), dia juga khawatir sang istri kurang menyetujuinya. \"Saya sangat ingin memilikinya, tapi saya tidak yakin bagaimana reaksi istri saya nanti,\" ujarnya berkelakar.&nbsp;<br><br>Pada kesempatan itu, Pangeran William juga menilai industri konsol game bisa bangkit seperti di era 80-90an. Karir di bidang game pun sangat menarik dan membuka peluang besar bagi para developer.&nbsp;<br><br>\"Developer kita kini lebih banyak dari yang ada sebelumnya. Saya harap anak-anak muda bisa terinspirasi dari workshop di acara ini, dan mendapatkan gambaran seperti apa karir di ranah game nantinya,\" ujarnya.&nbsp;<br><br>PS4 sendiri tampaknya memulai hari pertama penjualannya dengan cukup baik. Konsol yang diidamkan banyak gamer ini terjual sebanyak 1 juta unit hanya dalam waktu 24 jam. PS4 sudah mulai dipasarkan di Amerika Utara dengan harga USD 399, lebih murah dan lebih cepat dirilis dibanding pesaingnya Xbox One.','08295325e61d7503541a22b95feb98bc.png','featured','2013-11-19 14:16:58','2013-11-21 12:06:14',12,12);
INSERT INTO `artikel` VALUES (12,'Walkman Jadi Koleksi Museum','Walkman Jadi Koleksi Museum','London&nbsp;- Pemutar kaset Walkman besutan Sony memang legendaris. Karena itulah, museum Design Museum di London baru-baru ini menambahkan model pertama pemutar kaset stereo Walkman TPS-L2 sebagai koleksinya.<br><br>Walkman TPS-L2 menjadi salah satu dari 14 koleksi baru museum tersebut, di antaranya senapan Kalashnikov AK-47. Di samping menjadi pionir pemutar musik portabel, desain Walkman juga dipuji dan dianggap klasik.<br><br>\"Walkman telah menjadi bagian kebudayaan dan bahkan bagian dari fashion,\" demikian pernyataan Design Museum, seperti&nbsp;detikINET&nbsp;kutip dari DailyMail, Minggu (4/12/2011).<br><br>Walkman model tersebut dijual pertama kalinya pada tahun 1979. Perangkat ini amat populer dan dalam waktu 10 tahun kemudian, 50 juta orang menjadi pemiliknya.&nbsp;<br><br>Saat ini, ketenaran Walkman memang mulai meredup meski berbagai versi barunya punya kemampuan canggih. Sony kurang bisa menandingi Apple iPod yang mendominasi segmen pemutar musik dalam satu dekade terakhir.<br><br>Meski demikian, Walkman tetaplah pelopor perangkat musik portabel. Kata Walkman bahkan masuk ke kamus Oxford English Dictionary untuk mendeskripsikan pemutar kaset.','6333d5831a03e732087a538233a2550f.jpg','Teknologi','2013-11-19 14:46:40','2013-11-21 12:05:38',12,12);
/*!40000 ALTER TABLE `artikel` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table message
#

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `subjek` varchar(255) DEFAULT NULL,
  `pesan` text,
  `status` char(1) DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
INSERT INTO `message` VALUES (1,'sdafasdf','asdfadsfs@gmail.com','asdfasdf','asdfasdf','afdadsfdaf','0');
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table msg
#

DROP TABLE IF EXISTS `msg`;
CREATE TABLE `msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40000 ALTER TABLE `msg` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table produk
#

DROP TABLE IF EXISTS `produk`;
CREATE TABLE `produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUkm` int(11) DEFAULT NULL,
  `namaProduk` varchar(255) DEFAULT NULL,
  `hargaProduk` decimal(19,4) DEFAULT NULL,
  `deskripsiProduk` text,
  `gambarProduk` varchar(255) DEFAULT NULL,
  `tglInput` date DEFAULT NULL,
  `tglUpdate` date DEFAULT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `inputBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_kategoriUKM_produk` (`idUkm`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
INSERT INTO `produk` VALUES (7,10,'Komputer',5000000,'Ini komputer siapa?','3c114e9778a435840513cba17a42a5a5.jpg','2013-11-25','2013-11-25',19,19);
INSERT INTO `produk` VALUES (8,10,'Komputer 1',54000000,'ini komputer 1 siapa?','0457a2f8b34de92dc46bde7e9a848c13.jpg','2013-11-25','2013-11-25',19,19);
INSERT INTO `produk` VALUES (9,10,'Komputer 2',7000000,'ini komputer 2','8fc661a233aa06a953eb471a96a4f5a1.jpg','2013-11-25','2013-11-25',19,19);
INSERT INTO `produk` VALUES (10,10,'Komputer 3',9000000,'ini komputer 3','ff1f7174a0150268d6f6d3e8a3e883df.jpg','2013-11-25',NULL,NULL,19);
/*!40000 ALTER TABLE `produk` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table produk_user
#

DROP TABLE IF EXISTS `produk_user`;
CREATE TABLE `produk_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idProduk` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produk_produk_user` (`idProduk`),
  KEY `user_produk_user` (`idUser`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40000 ALTER TABLE `produk_user` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table typemsg
#

DROP TABLE IF EXISTS `typemsg`;
CREATE TABLE `typemsg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40000 ALTER TABLE `typemsg` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table ukm
#

DROP TABLE IF EXISTS `ukm`;
CREATE TABLE `ukm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUkmProfile` int(11) DEFAULT NULL,
  `idKategoriUkm` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `UkmProfile_user_kategoriUKM` (`idUkmProfile`),
  KEY `kategoriUKM_user_kategoriUKM` (`idKategoriUkm`),
  KEY `user_user_kategoriUKM` (`idUser`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
INSERT INTO `ukm` VALUES (9,9,5,18);
INSERT INTO `ukm` VALUES (10,10,5,19);
/*!40000 ALTER TABLE `ukm` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table ukmkategori
#

DROP TABLE IF EXISTS `ukmkategori`;
CREATE TABLE `ukmkategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namaKategoriUkm` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
INSERT INTO `ukmkategori` VALUES (5,'IT Consultant');
INSERT INTO `ukmkategori` VALUES (6,'Kuliner Indonesia');
/*!40000 ALTER TABLE `ukmkategori` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table ukmprofile
#

DROP TABLE IF EXISTS `ukmprofile`;
CREATE TABLE `ukmprofile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namaUKM` varchar(255) DEFAULT NULL,
  `alamatUKM` text,
  `teleponUKM` varchar(40) DEFAULT NULL,
  `hpUKM` varchar(40) DEFAULT NULL,
  `profilUKM` text,
  `gambarUKM` varchar(255) DEFAULT NULL,
  `namaPemilik` varchar(255) DEFAULT NULL,
  `alamatPemilik` varchar(255) DEFAULT NULL,
  `kelaminPemilik` varchar(255) DEFAULT NULL,
  `kotaPemilik` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
INSERT INTO `ukmprofile` VALUES (9,'asdfasfsadfsaasdfasdfas','fsafdsdafasfasdf','123123123','12312123213','aafsdadsf f safs df sdf sdf ssdfsdf sdf sadf afasdf asfsadf','438b3057b1c58a14b714d8f47f9981a3.png','sadfsadfsa','adfasdfas','M','dfasfasf');
INSERT INTO `ukmprofile` VALUES (10,'Serba Bahagia Banget','dasfasf asdfasdf asdfasfdsafd asdfsafsaf ','123123123','13123123123','safasdfsd asdfasdf sdfsadfsaf asdfsadf asdfsdfsdfsdfsdf','561d88b44f61045db42ed1f928f4564d.jpg','Jimmy Samanda','sadfsadfasfd sadfdsaf','M','sadf asdfsadf asfasf');
/*!40000 ALTER TABLE `ukmprofile` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table user
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `email` text,
  `hash` varchar(32) DEFAULT NULL,
  `isActive` int(11) DEFAULT NULL,
  `tipeUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
INSERT INTO `user` VALUES (12,'samandajimmy','202cb962ac59075b964b07152d234b70','samandajimmy@gmail.com',NULL,1,1);
INSERT INTO `user` VALUES (18,'jimmy','6a204bd89f3c8348afd5c77c717a097a','asdf@gmail.com','',1,2);
INSERT INTO `user` VALUES (19,'jimmy1','4297f44b13955235245b2497399d7a93','jimmy@gmail.com','',1,2);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table user_artikel
#

DROP TABLE IF EXISTS `user_artikel`;
CREATE TABLE `user_artikel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) DEFAULT NULL,
  `idArtikel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_user_artikel` (`idUser`),
  KEY `artikel_user_artikel` (`idArtikel`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40000 ALTER TABLE `user_artikel` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table user_msg
#

DROP TABLE IF EXISTS `user_msg`;
CREATE TABLE `user_msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) DEFAULT NULL,
  `idMsg` int(11) DEFAULT NULL,
  `idTypeMsg` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_user_msg` (`idUser`),
  KEY `msg_user_msg` (`idMsg`),
  KEY `typeMsg_user_msg` (`idTypeMsg`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40000 ALTER TABLE `user_msg` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table user_msg_user
#

DROP TABLE IF EXISTS `user_msg_user`;
CREATE TABLE `user_msg_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser_msg` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_msg_user_msg_user` (`idUser_msg`),
  KEY `user_user_msg_user` (`idUser`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40000 ALTER TABLE `user_msg_user` ENABLE KEYS */;
UNLOCK TABLES;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
