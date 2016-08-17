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

DROP TABLE IF EXISTS `m_blueprint`;

CREATE TABLE `m_blueprint` (
  `blueprintid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(10) DEFAULT NULL,
  `content` longtext,
  PRIMARY KEY (`blueprintid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `m_blueprint` (`blueprintid`, `type`, `content`)
VALUES
  (1, 'CONTROLLER', '<?\nnamespace Mercury\\App\\{ModuleName}\\Controllers;\n\nuse Mercury\\Helper\\Controller;\n\nclass SampleController extends Controller {\n\n\n  public function initcontroller() {\n\n    /**\n    * Avoid defining a constructor use this method instead\n    */\n }\n\n public function indexAction() {\n\n   echo \"Sample file\";\n }\n\n}'),
  (2, 'VIEW', '<?php $this->layout($gs_template, $ga_templatedata) ?>'),
  (3, 'MODEL', '<?\nnamespace Mercury\\App\\{ModuleName}\\Models;\n\nuse Mercury\\Helper\\Model;\n\nclass SampleModel extends Model {\n\n\n protected function initmodel() {\n\n    // Set this because the table name is not in standard format\n    $this->settable(\'some_table\');\n\n  }\n\n}'),
  (4, 'HELPER', '<?\nnamespace Mercury\\App\\Helpers;\n\nuse Mercury\\Helper\\Core;\n\nclass [HelperName] extends Core {\n\n}');


DROP TABLE IF EXISTS `m_module`;

CREATE TABLE `m_module` (
  `moduleid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `core` tinyint(1) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`moduleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


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