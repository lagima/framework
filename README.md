# Mercury framework
This is another Micro MVC framework. This is unique in a way that configuration is done via a web interface and stored in the database. All you have to do is just write code that matters to your application.

# Installation
You can always download the files and mess with it but good luck with that. I recommend using the composer. Install composer in your system and copy paste the following in your `composer.json` file

```
{
    "minimum-stability": "dev",
    "require": {
        "mercury/framework": "dev-master"
    },
    "autoload": {
        "psr-4": {
            "Mercury\\App\\": "application"
        }
    },
    "extra": {
        "assets-dir" : "assets/vendors/"
    }
}
```
Then run the composer
`composer install -o`

The framework uses database for its operation so create a DB with the following

```
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table m_blueprint
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_blueprint`;

CREATE TABLE `m_blueprint` (
  `blueprintid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(10) DEFAULT NULL,
  `content` longtext,
  PRIMARY KEY (`blueprintid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `m_blueprint` WRITE;
/*!40000 ALTER TABLE `m_blueprint` DISABLE KEYS */;

INSERT INTO `m_blueprint` (`blueprintid`, `type`, `content`)
VALUES
	(1,'CONTROLLER','<?\nnamespace Mercury\\App\\ModuleName\\Controllers;\n\nclass SampleController extends Controller {\n\n\n	public function initcontroller() {\n\n		/**\n		 * Avoid defining a constructor use this method instead\n		 */\n	}\n\n	public function indexAction() {\n\n		echo \"Sample file\";\n	}\n\n}'),
	(2,'VIEW','<?php $this->layout($gs_template, $ga_templatedata) ?>'),
	(3,'MODEL','<?\nnamespace Mercury\\App\\ModuleName\\Model;\n\nclass SampleModel extends Model {\n\n\n	protected function initmodel() {\n\n		// Set this because the table name is not in standard format\n		$this->settable(\'some_table\');\n\n	}\n\n}');

/*!40000 ALTER TABLE `m_blueprint` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_module
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_module`;

CREATE TABLE `m_module` (
  `moduleid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `core` tinyint(1) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`moduleid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `m_module` WRITE;
/*!40000 ALTER TABLE `m_module` DISABLE KEYS */;

INSERT INTO `m_module` (`moduleid`, `name`, `core`)
VALUES
	(2,'Frontend',NULL);

/*!40000 ALTER TABLE `m_module` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_page
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_page`;

CREATE TABLE `m_page` (
  `pageid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `content` longtext,
  `type` varchar(20) DEFAULT NULL,
  `moduleid` int(11) DEFAULT NULL,
  `controllerid` int(11) DEFAULT NULL,
  `templateid` int(11) DEFAULT NULL,
  `core` tinyint(1) unsigned zerofill DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `deleted` tinyint(1) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`pageid`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `m_page` WRITE;
/*!40000 ALTER TABLE `m_page` DISABLE KEYS */;

INSERT INTO `m_page` (`pageid`, `label`, `name`, `content`, `type`, `moduleid`, `controllerid`, `templateid`, `core`, `created`, `deleted`)
VALUES
	(1,'Login Controller','Login',NULL,'CONTROLLER',2,NULL,NULL,0,'2016-01-06 12:36:47',NULL),
	(3,'Login Template','Login',NULL,'TEMPLATE',2,NULL,NULL,0,'2016-01-06 12:37:55',NULL),
	(4,'Login View','Login',NULL,'VIEW',2,1,3,0,'2016-01-08 13:23:59',NULL);

/*!40000 ALTER TABLE `m_page` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_route
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_route`;

CREATE TABLE `m_route` (
  `routeid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `requesturi` varchar(100) DEFAULT NULL,
  `moduleid` int(11) DEFAULT NULL,
  `controllerid` int(11) DEFAULT NULL,
  `action` varchar(50) DEFAULT NULL,
  `method` varchar(50) DEFAULT NULL,
  `core` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`routeid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `m_route` WRITE;
/*!40000 ALTER TABLE `m_route` DISABLE KEYS */;

INSERT INTO `m_route` (`routeid`, `requesturi`, `moduleid`, `controllerid`, `action`, `method`, `core`, `created`)
VALUES
	(1,'/',2,1,'login','GET',0,'2016-01-06 12:45:19');

/*!40000 ALTER TABLE `m_route` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

```

Thats it! you have just installed an awesome framework ;)

# Usage

Not much documentation at this stage, might do it later when I get some time but use the following content in your `index.php` to start with

```
<?
use Mercury\Helper\Application;
use Mercury\Helper\Profiler;

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('DS', '/'); // Directory separator (Unix-Style works on all OS)

// Autoload
require('vendor/autoload.php');

// Init the profiler
$go_profiler = new Profiler();

// Create the application
$go_app = new Application();

// Set the db config
$lo_config = new \stdClass;
$lo_config->host = 'localhost';
$lo_config->dbuser = 'user';
$lo_config->dbpassword = 'password';
$lo_config->dbname = 'dbname';
$go_app->setconfig('database', $lo_config);

// Set the git config
$lo_config = new \stdClass;
$lo_config->localrepopath = '/path/to/your/repo';
$lo_config->remoterepopath = 'github.com/remote/repo.git';
$lo_config->author = 'gitauthorusername';
$lo_config->username = 'gitusername';
$lo_config->password = 'gitpassword';
$lo_config->branch = 'master';
$go_app->setconfig('git', $lo_config);

// Run the application
$go_app->runapp();

// Show the profiling result
$go_profiler->showresult();
?>
```