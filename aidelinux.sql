-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 27 Mars 2017 à 13:06
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `aidelinux`
--

-- --------------------------------------------------------

--
-- Structure de la table `action`
--

DROP TABLE IF EXISTS `action`;
CREATE TABLE IF NOT EXISTS `action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action_mene` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `description` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `action`
--

INSERT INTO `action` (`id`, `action_mene`, `description`) VALUES
(1, 'cd usr/shares/themes et placer le theme', 'changer thème manuellement'),
(2, 'sudo dpkg -l|grep kernel (liste des versions) sudo apt-get remove --purge', 'Vider le boot quand il plein'),
(3, 'sudo ufw status (voir status) sudo ufw enable / disable', 'activer le firewall'),
(4, 'allez dans paramètres systeme / logiciel mise a jour/ pilote additionel', 'pilote graphique'),
(5, 'cd etc/ nano hostame  Redemarrer pour le prendre en charge', 'change le nom de la machine'),
(6, 'télécharger compiz (doc unbuntu) https://doc.ubuntu-fr.org/compizconfig-settings-manager', 'mettre les animations(fenetre, cube)'),
(7, 'installer unity tweak', 'paramètres (bureau, themes, icones etc...)'),
(8, 'https://doc.ubuntu-fr.org/securite', 'Bien sécurisé son ubuntu'),
(9, 'Installer logiciel', 'Soit en commande, soit par le logiciel logithèque ubuntu'),
(10, 'Installation de Lamp (mon de passe obligatoire pour phpmyadmin)', 'sudo apt-get install apache2 php5 mysql-server libapache2-mod-php5 php5-mysql'),
(11, 'Installation Eclipse', 'telecharger le jdk sur le site d oracle et le demarrer en commande puis de telecharger eclipse et enfin l installer. le demarrage en commande est obligatoire pour l ouvrir'),
(12, '1)vérifier que le système est sur 21 minimum 2)dépot rpm fusion 3)akmod-nvidia 4)kernel-devel 5)kmod-nvidia (NE PAS REDEMARRER OU ETEINDRE LE SYSTEME AVANT LA FIN DE TOUTELES ETAPES', 'installer pilote graphique fedora');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commande` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `description` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id`, `commande`, `description`) VALUES
(1, 'sudo apt-get install', 'installer en root'),
(2, 'java -jar __jar', 'démarré un jar en commande'),
(3, 'autoremove', 'désintaller un programme'),
(4, 'sh ./______', 'démarrer bash'),
(5, 'chmod 777 nomfichier', 'mettre tous les droits au fichier'),
(6, 'ls -ll', 'liste fichier avec les droits'),
(7, 'nano / mkdir', 'Éditer des fichiers manuellement'),
(8, 'ifconfig', 'Voir ip de du pc'),
(9, 'rm', 'suppression de fichier'),
(10, 'strings', 'voir le contenu d un fichier'),
(11, 'route -n', 'voir la table de routage'),
(12, 'kill nom_processus', 'tuer un processus'),
(13, 'service nom_service start /stop/restart', 'démarrer redémarrer ou stop un service'),
(14, 'chown ___', 'changer le propriétaire d un fichier'),
(15, 'php -f page.php', 'Démarrer Page PHP'),
(16, 'lsusb', 'voir périphérique'),
(17, 'lspci', 'voir composant reconnu');

-- --------------------------------------------------------

--
-- Structure de la table `probleme`
--

DROP TABLE IF EXISTS `probleme`;
CREATE TABLE IF NOT EXISTS `probleme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `probleme` varchar(255) CHARACTER SET latin1 NOT NULL,
  `solution` varchar(2555) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `probleme`
--

INSERT INTO `probleme` (`id`, `probleme`, `solution`) VALUES
(1, 'problème jdk installer de base (open jdk)', 'faut le virer et le remplacer par celui de oracle'),
(2, 'Icones', 'Crée un script OU au moment du lancement le mettre dans le lanceur mais accessible dans la recherche'),
(3, 'Problème de la librairie swing en java', 'Avec la verrsion d oracle les effets sont limité'),
(4, 'Mise a Jour Impossible', 'sudo mv /var/lib/apt/lists /var/lib/apt/lists.old    sudo mkdir /var/lib/apt/lists   sudo apt-get update'),
(5, 'Message PHP ne s affiche pas', 'aller dans cd/etc/php5/apache2/ ouvrir php.ini et modifier display_errors et le mettre a On'),
(6, 'Ecran Noir', 'sudo apt-get purge nvidia* sudo apt-get purge xserver-xorg-video-nouveau   sudo apt-get install nvidia-common sudo apt-get install xserver-xorg-video-nouveau sudo apt-get install --reinstall libgl1-mesa-glx libgl1-mesa-dri xserver-xorg-core  sudo dpkg-reconfigure xserver-xorg PUIS redemarrer');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
