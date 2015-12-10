<?php

/* template/admin-template.html */
class __TwigTemplate_abafac1e08e641e50fe3565496a6ae5acca8a55d3c08249b19c826d19f7f9193 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
\t<head>
\t\t<meta charset=\"utf-8\">
\t\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
\t\t<title>AdminLTE 2 | Dashboard</title>
\t\t<!-- Tell the browser to be responsive to screen width -->
\t\t<meta content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">
\t\t<!-- Bootstrap 3.3.5 -->
\t\t<link rel=\"stylesheet\" href=\"/mercury/assets/bootstrap/css/bootstrap.min.css\">
\t\t<!-- Font Awesome -->
\t\t<link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css\">
\t\t<!-- Ionicons -->
\t\t<link rel=\"stylesheet\" href=\"http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css\">
\t\t<!-- Theme style -->
\t\t<link rel=\"stylesheet\" href=\"/mercury/assets/css/AdminLTE.min.css\">
\t\t<!-- AdminLTE Skins. Choose a skin from the css/skins
\t\t\t\t folder instead of downloading all of them to reduce the load. -->
\t\t<link rel=\"stylesheet\" href=\"/mercury/assets/css/skins/_all-skins.min.css\">
\t\t<!-- iCheck -->
\t\t<link rel=\"stylesheet\" href=\"/mercury/assets/plugins/iCheck/flat/blue.css\">
\t\t<!-- Morris chart -->
\t\t<link rel=\"stylesheet\" href=\"/mercury/assets/plugins/morris/morris.css\">
\t\t<!-- jvectormap -->
\t\t<link rel=\"stylesheet\" href=\"/mercury/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css\">
\t\t<!-- Date Picker -->
\t\t<link rel=\"stylesheet\" href=\"/mercury/assets/plugins/datepicker/datepicker3.css\">
\t\t<!-- Daterange picker -->
\t\t<link rel=\"stylesheet\" href=\"/mercury/assets/plugins/daterangepicker/daterangepicker-bs3.css\">
\t\t<!-- bootstrap wysihtml5 - text editor -->
\t\t<link rel=\"stylesheet\" href=\"/mercury/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css\">

\t\t<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
\t\t<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
\t\t<!--[if lt IE 9]>
\t\t\t\t<script src=\"http://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js\"></script>
\t\t\t\t<script src=\"http://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
\t\t<![endif]-->
\t</head>
\t<body class=\"hold-transition skin-blue sidebar-mini\">
\t\t<div class=\"wrapper\">

\t\t\t<header class=\"main-header\">
\t\t\t\t<!-- Logo -->
\t\t\t\t<a href=\"index2.html\" class=\"logo\">
\t\t\t\t\t<!-- mini logo for sidebar mini 50x50 pixels -->
\t\t\t\t\t<span class=\"logo-mini\"><b>A</b>LT</span>
\t\t\t\t\t<!-- logo for regular state and mobile devices -->
\t\t\t\t\t<span class=\"logo-lg\"><b>Admin</b>LTE</span>
\t\t\t\t</a>
\t\t\t\t<!-- Header Navbar: style can be found in header.less -->
\t\t\t\t<nav class=\"navbar navbar-static-top\" role=\"navigation\">
\t\t\t\t\t<!-- Sidebar toggle button-->
\t\t\t\t\t<a href=\"#\" class=\"sidebar-toggle\" data-toggle=\"offcanvas\" role=\"button\">
\t\t\t\t\t\t<span class=\"sr-only\">Toggle navigation</span>
\t\t\t\t\t</a>
\t\t\t\t\t<div class=\"navbar-custom-menu\">
\t\t\t\t\t\t<ul class=\"nav navbar-nav\">
\t\t\t\t\t\t\t<!-- Messages: style can be found in dropdown.less-->
\t\t\t\t\t\t\t<li class=\"dropdown messages-menu\">
\t\t\t\t\t\t\t\t<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-envelope-o\"></i>
\t\t\t\t\t\t\t\t\t<span class=\"label label-success\">4</span>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t<ul class=\"dropdown-menu\">
\t\t\t\t\t\t\t\t\t<li class=\"header\">You have 4 messages</li>
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<!-- inner menu: contains the actual data -->
\t\t\t\t\t\t\t\t\t\t<ul class=\"menu\">
\t\t\t\t\t\t\t\t\t\t\t<li><!-- start message -->
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"pull-left\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"/mercury/assets/images/user2-160x160.jpg\" class=\"img-circle\" alt=\"User Image\">
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<h4>
\t\t\t\t\t\t\t\t\t\t\t\t\t\tSupport Team
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<small><i class=\"fa fa-clock-o\"></i> 5 mins</small>
\t\t\t\t\t\t\t\t\t\t\t\t\t</h4>
\t\t\t\t\t\t\t\t\t\t\t\t\t<p>Why not buy a new awesome theme?</p>
\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t</li><!-- end message -->
\t\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"pull-left\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"/mercury/assets/images/user3-128x128.jpg\" class=\"img-circle\" alt=\"User Image\">
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<h4>
\t\t\t\t\t\t\t\t\t\t\t\t\t\tAdminLTE Design Team
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<small><i class=\"fa fa-clock-o\"></i> 2 hours</small>
\t\t\t\t\t\t\t\t\t\t\t\t\t</h4>
\t\t\t\t\t\t\t\t\t\t\t\t\t<p>Why not buy a new awesome theme?</p>
\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"pull-left\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"/mercury/assets/images/user4-128x128.jpg\" class=\"img-circle\" alt=\"User Image\">
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<h4>
\t\t\t\t\t\t\t\t\t\t\t\t\t\tDevelopers
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<small><i class=\"fa fa-clock-o\"></i> Today</small>
\t\t\t\t\t\t\t\t\t\t\t\t\t</h4>
\t\t\t\t\t\t\t\t\t\t\t\t\t<p>Why not buy a new awesome theme?</p>
\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"pull-left\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"/mercury/assets/images/user3-128x128.jpg\" class=\"img-circle\" alt=\"User Image\">
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<h4>
\t\t\t\t\t\t\t\t\t\t\t\t\t\tSales Department
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<small><i class=\"fa fa-clock-o\"></i> Yesterday</small>
\t\t\t\t\t\t\t\t\t\t\t\t\t</h4>
\t\t\t\t\t\t\t\t\t\t\t\t\t<p>Why not buy a new awesome theme?</p>
\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"pull-left\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"/mercury/assets/images/user4-128x128.jpg\" class=\"img-circle\" alt=\"User Image\">
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<h4>
\t\t\t\t\t\t\t\t\t\t\t\t\t\tReviewers
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<small><i class=\"fa fa-clock-o\"></i> 2 days</small>
\t\t\t\t\t\t\t\t\t\t\t\t\t</h4>
\t\t\t\t\t\t\t\t\t\t\t\t\t<p>Why not buy a new awesome theme?</p>
\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li class=\"footer\"><a href=\"#\">See All Messages</a></li>
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<!-- Notifications: style can be found in dropdown.less -->
\t\t\t\t\t\t\t<li class=\"dropdown notifications-menu\">
\t\t\t\t\t\t\t\t<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-bell-o\"></i>
\t\t\t\t\t\t\t\t\t<span class=\"label label-warning\">10</span>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t<ul class=\"dropdown-menu\">
\t\t\t\t\t\t\t\t\t<li class=\"header\">You have 10 notifications</li>
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<!-- inner menu: contains the actual data -->
\t\t\t\t\t\t\t\t\t\t<ul class=\"menu\">
\t\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-users text-aqua\"></i> 5 new members joined today
\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-warning text-yellow\"></i> Very long description here that may not fit into the page and may cause design problems
\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-users text-red\"></i> 5 new members joined
\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-shopping-cart text-green\"></i> 25 sales made
\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-user text-red\"></i> You changed your username
\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li class=\"footer\"><a href=\"#\">View all</a></li>
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<!-- Tasks: style can be found in dropdown.less -->
\t\t\t\t\t\t\t<li class=\"dropdown tasks-menu\">
\t\t\t\t\t\t\t\t<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-flag-o\"></i>
\t\t\t\t\t\t\t\t\t<span class=\"label label-danger\">9</span>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t<ul class=\"dropdown-menu\">
\t\t\t\t\t\t\t\t\t<li class=\"header\">You have 9 tasks</li>
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<!-- inner menu: contains the actual data -->
\t\t\t\t\t\t\t\t\t\t<ul class=\"menu\">
\t\t\t\t\t\t\t\t\t\t\t<li><!-- Task item -->
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<h3>
\t\t\t\t\t\t\t\t\t\t\t\t\t\tDesign some buttons
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<small class=\"pull-right\">20%</small>
\t\t\t\t\t\t\t\t\t\t\t\t\t</h3>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"progress xs\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"progress-bar progress-bar-aqua\" style=\"width: 20%\" role=\"progressbar\" aria-valuenow=\"20\" aria-valuemin=\"0\" aria-valuemax=\"100\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"sr-only\">20% Complete</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t</li><!-- end task item -->
\t\t\t\t\t\t\t\t\t\t\t<li><!-- Task item -->
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<h3>
\t\t\t\t\t\t\t\t\t\t\t\t\t\tCreate a nice theme
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<small class=\"pull-right\">40%</small>
\t\t\t\t\t\t\t\t\t\t\t\t\t</h3>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"progress xs\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"progress-bar progress-bar-green\" style=\"width: 40%\" role=\"progressbar\" aria-valuenow=\"20\" aria-valuemin=\"0\" aria-valuemax=\"100\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"sr-only\">40% Complete</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t</li><!-- end task item -->
\t\t\t\t\t\t\t\t\t\t\t<li><!-- Task item -->
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<h3>
\t\t\t\t\t\t\t\t\t\t\t\t\t\tSome task I need to do
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<small class=\"pull-right\">60%</small>
\t\t\t\t\t\t\t\t\t\t\t\t\t</h3>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"progress xs\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"progress-bar progress-bar-red\" style=\"width: 60%\" role=\"progressbar\" aria-valuenow=\"20\" aria-valuemin=\"0\" aria-valuemax=\"100\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"sr-only\">60% Complete</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t</li><!-- end task item -->
\t\t\t\t\t\t\t\t\t\t\t<li><!-- Task item -->
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<h3>
\t\t\t\t\t\t\t\t\t\t\t\t\t\tMake beautiful transitions
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<small class=\"pull-right\">80%</small>
\t\t\t\t\t\t\t\t\t\t\t\t\t</h3>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"progress xs\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"progress-bar progress-bar-yellow\" style=\"width: 80%\" role=\"progressbar\" aria-valuenow=\"20\" aria-valuemin=\"0\" aria-valuemax=\"100\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"sr-only\">80% Complete</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t</li><!-- end task item -->
\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li class=\"footer\">
\t\t\t\t\t\t\t\t\t\t<a href=\"#\">View all tasks</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<!-- User Account: style can be found in dropdown.less -->
\t\t\t\t\t\t\t<li class=\"dropdown user user-menu\">
\t\t\t\t\t\t\t\t<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
\t\t\t\t\t\t\t\t\t<img src=\"/mercury/assets/images/user2-160x160.jpg\" class=\"user-image\" alt=\"User Image\">
\t\t\t\t\t\t\t\t\t<span class=\"hidden-xs\">Alexander Pierce</span>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t<ul class=\"dropdown-menu\">
\t\t\t\t\t\t\t\t\t<!-- User image -->
\t\t\t\t\t\t\t\t\t<li class=\"user-header\">
\t\t\t\t\t\t\t\t\t\t<img src=\"/mercury/assets/images/user2-160x160.jpg\" class=\"img-circle\" alt=\"User Image\">
\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\tAlexander Pierce - Web Developer
\t\t\t\t\t\t\t\t\t\t\t<small>Member since Nov. 2012</small>
\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<!-- Menu Body -->
\t\t\t\t\t\t\t\t\t<li class=\"user-body\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-xs-4 text-center\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">Followers</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-xs-4 text-center\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">Sales</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-xs-4 text-center\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">Friends</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<!-- Menu Footer-->
\t\t\t\t\t\t\t\t\t<li class=\"user-footer\">
\t\t\t\t\t\t\t\t\t\t<div class=\"pull-left\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\" class=\"btn btn-default btn-flat\">Profile</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"pull-right\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\" class=\"btn btn-default btn-flat\">Sign out</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<!-- Control Sidebar Toggle Button -->
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"#\" data-toggle=\"control-sidebar\"><i class=\"fa fa-gears\"></i></a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t</nav>
\t\t\t</header>
\t\t\t<!-- Left side column. contains the logo and sidebar -->
\t\t\t<aside class=\"main-sidebar\">
\t\t\t\t<!-- sidebar: style can be found in sidebar.less -->
\t\t\t\t<section class=\"sidebar\">
\t\t\t\t\t<!-- Sidebar user panel -->
\t\t\t\t\t<div class=\"user-panel\">
\t\t\t\t\t\t<div class=\"pull-left image\">
\t\t\t\t\t\t\t<img src=\"/mercury/assets/images/user2-160x160.jpg\" class=\"img-circle\" alt=\"User Image\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"pull-left info\">
\t\t\t\t\t\t\t<p>Alexander Pierce</p>
\t\t\t\t\t\t\t<a href=\"#\"><i class=\"fa fa-circle text-success\"></i> Online</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<!-- search form -->
\t\t\t\t\t<form action=\"#\" method=\"get\" class=\"sidebar-form\">
\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"q\" class=\"form-control\" placeholder=\"Search...\">
\t\t\t\t\t\t\t<span class=\"input-group-btn\">
\t\t\t\t\t\t\t\t<button type=\"submit\" name=\"search\" id=\"search-btn\" class=\"btn btn-flat\"><i class=\"fa fa-search\"></i></button>
\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t</div>
\t\t\t\t\t</form>
\t\t\t\t\t<!-- /.search form -->
\t\t\t\t\t<!-- sidebar menu: : style can be found in sidebar.less -->
\t\t\t\t\t<ul class=\"sidebar-menu\">
\t\t\t\t\t\t<li class=\"header\">MAIN NAVIGATION</li>
\t\t\t\t\t\t<li class=\"active treeview\">
\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t<i class=\"fa fa-dashboard\"></i> <span>Dashboard</span> <i class=\"fa fa-angle-left pull-right\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<ul class=\"treeview-menu\">
\t\t\t\t\t\t\t\t<li class=\"active\"><a href=\"index.html\"><i class=\"fa fa-circle-o\"></i> Dashboard v1</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"index2.html\"><i class=\"fa fa-circle-o\"></i> Dashboard v2</a></li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"treeview\">
\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t<i class=\"fa fa-files-o\"></i>
\t\t\t\t\t\t\t\t<span>Layout Options</span>
\t\t\t\t\t\t\t\t<span class=\"label label-primary pull-right\">4</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<ul class=\"treeview-menu\">
\t\t\t\t\t\t\t\t<li><a href=\"pages/layout/top-nav.html\"><i class=\"fa fa-circle-o\"></i> Top Navigation</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"pages/layout/boxed.html\"><i class=\"fa fa-circle-o\"></i> Boxed</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"pages/layout/fixed.html\"><i class=\"fa fa-circle-o\"></i> Fixed</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"pages/layout/collapsed-sidebar.html\"><i class=\"fa fa-circle-o\"></i> Collapsed Sidebar</a></li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"pages/widgets.html\">
\t\t\t\t\t\t\t\t<i class=\"fa fa-th\"></i> <span>Widgets</span> <small class=\"label pull-right bg-green\">new</small>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"treeview\">
\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t<i class=\"fa fa-pie-chart\"></i>
\t\t\t\t\t\t\t\t<span>Charts</span>
\t\t\t\t\t\t\t\t<i class=\"fa fa-angle-left pull-right\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<ul class=\"treeview-menu\">
\t\t\t\t\t\t\t\t<li><a href=\"pages/charts/chartjs.html\"><i class=\"fa fa-circle-o\"></i> ChartJS</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"pages/charts/morris.html\"><i class=\"fa fa-circle-o\"></i> Morris</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"pages/charts/flot.html\"><i class=\"fa fa-circle-o\"></i> Flot</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"pages/charts/inline.html\"><i class=\"fa fa-circle-o\"></i> Inline charts</a></li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"treeview\">
\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t<i class=\"fa fa-laptop\"></i>
\t\t\t\t\t\t\t\t<span>UI Elements</span>
\t\t\t\t\t\t\t\t<i class=\"fa fa-angle-left pull-right\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<ul class=\"treeview-menu\">
\t\t\t\t\t\t\t\t<li><a href=\"pages/UI/general.html\"><i class=\"fa fa-circle-o\"></i> General</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"pages/UI/icons.html\"><i class=\"fa fa-circle-o\"></i> Icons</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"pages/UI/buttons.html\"><i class=\"fa fa-circle-o\"></i> Buttons</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"pages/UI/sliders.html\"><i class=\"fa fa-circle-o\"></i> Sliders</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"pages/UI/timeline.html\"><i class=\"fa fa-circle-o\"></i> Timeline</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"pages/UI/modals.html\"><i class=\"fa fa-circle-o\"></i> Modals</a></li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"treeview\">
\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t<i class=\"fa fa-edit\"></i> <span>Forms</span>
\t\t\t\t\t\t\t\t<i class=\"fa fa-angle-left pull-right\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<ul class=\"treeview-menu\">
\t\t\t\t\t\t\t\t<li><a href=\"pages/forms/general.html\"><i class=\"fa fa-circle-o\"></i> General Elements</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"pages/forms/advanced.html\"><i class=\"fa fa-circle-o\"></i> Advanced Elements</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"pages/forms/editors.html\"><i class=\"fa fa-circle-o\"></i> Editors</a></li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"treeview\">
\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t<i class=\"fa fa-table\"></i> <span>Tables</span>
\t\t\t\t\t\t\t\t<i class=\"fa fa-angle-left pull-right\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<ul class=\"treeview-menu\">
\t\t\t\t\t\t\t\t<li><a href=\"pages/tables/simple.html\"><i class=\"fa fa-circle-o\"></i> Simple tables</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"pages/tables/data.html\"><i class=\"fa fa-circle-o\"></i> Data tables</a></li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"pages/calendar.html\">
\t\t\t\t\t\t\t\t<i class=\"fa fa-calendar\"></i> <span>Calendar</span>
\t\t\t\t\t\t\t\t<small class=\"label pull-right bg-red\">3</small>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"pages/mailbox/mailbox.html\">
\t\t\t\t\t\t\t\t<i class=\"fa fa-envelope\"></i> <span>Mailbox</span>
\t\t\t\t\t\t\t\t<small class=\"label pull-right bg-yellow\">12</small>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"treeview\">
\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t<i class=\"fa fa-folder\"></i> <span>Examples</span>
\t\t\t\t\t\t\t\t<i class=\"fa fa-angle-left pull-right\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<ul class=\"treeview-menu\">
\t\t\t\t\t\t\t\t<li><a href=\"pages/examples/invoice.html\"><i class=\"fa fa-circle-o\"></i> Invoice</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"pages/examples/profile.html\"><i class=\"fa fa-circle-o\"></i> Profile</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"pages/examples/login.html\"><i class=\"fa fa-circle-o\"></i> Login</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"pages/examples/register.html\"><i class=\"fa fa-circle-o\"></i> Register</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"pages/examples/lockscreen.html\"><i class=\"fa fa-circle-o\"></i> Lockscreen</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"pages/examples/404.html\"><i class=\"fa fa-circle-o\"></i> 404 Error</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"pages/examples/500.html\"><i class=\"fa fa-circle-o\"></i> 500 Error</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"pages/examples/blank.html\"><i class=\"fa fa-circle-o\"></i> Blank Page</a></li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"treeview\">
\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t<i class=\"fa fa-share\"></i> <span>Multilevel</span>
\t\t\t\t\t\t\t\t<i class=\"fa fa-angle-left pull-right\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<ul class=\"treeview-menu\">
\t\t\t\t\t\t\t\t<li><a href=\"#\"><i class=\"fa fa-circle-o\"></i> Level One</a></li>
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"#\"><i class=\"fa fa-circle-o\"></i> Level One <i class=\"fa fa-angle-left pull-right\"></i></a>
\t\t\t\t\t\t\t\t\t<ul class=\"treeview-menu\">
\t\t\t\t\t\t\t\t\t\t<li><a href=\"#\"><i class=\"fa fa-circle-o\"></i> Level Two</a></li>
\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\"><i class=\"fa fa-circle-o\"></i> Level Two <i class=\"fa fa-angle-left pull-right\"></i></a>
\t\t\t\t\t\t\t\t\t\t\t<ul class=\"treeview-menu\">
\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"#\"><i class=\"fa fa-circle-o\"></i> Level Three</a></li>
\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"#\"><i class=\"fa fa-circle-o\"></i> Level Three</a></li>
\t\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li><a href=\"#\"><i class=\"fa fa-circle-o\"></i> Level One</a></li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li><a href=\"documentation/index.html\"><i class=\"fa fa-book\"></i> <span>Documentation</span></a></li>
\t\t\t\t\t\t<li class=\"header\">LABELS</li>
\t\t\t\t\t\t<li><a href=\"#\"><i class=\"fa fa-circle-o text-red\"></i> <span>Important</span></a></li>
\t\t\t\t\t\t<li><a href=\"#\"><i class=\"fa fa-circle-o text-yellow\"></i> <span>Warning</span></a></li>
\t\t\t\t\t\t<li><a href=\"#\"><i class=\"fa fa-circle-o text-aqua\"></i> <span>Information</span></a></li>
\t\t\t\t\t</ul>
\t\t\t\t</section>
\t\t\t\t<!-- /.sidebar -->
\t\t\t</aside>

\t\t\t<!-- Content Wrapper. Contains page content -->
\t\t\t<div class=\"content-wrapper\">
\t\t\t\t";
        // line 458
        $this->displayBlock('content', $context, $blocks);
        // line 459
        echo "\t\t\t</div><!-- /.content-wrapper -->
\t\t\t<footer class=\"main-footer\">
\t\t\t\t<div class=\"pull-right hidden-xs\">
\t\t\t\t\t<b>Version</b> 2.3.0
\t\t\t\t</div>
\t\t\t\t<strong>Copyright &copy; 2014-2015 <a href=\"http://almsaeedstudio.com\">Almsaeed Studio</a>.</strong> All rights reserved.
\t\t\t</footer>

\t\t\t<!-- Control Sidebar -->
\t\t\t<aside class=\"control-sidebar control-sidebar-dark\">
\t\t\t\t<!-- Create the tabs -->
\t\t\t\t<ul class=\"nav nav-tabs nav-justified control-sidebar-tabs\">
\t\t\t\t\t<li><a href=\"#control-sidebar-home-tab\" data-toggle=\"tab\"><i class=\"fa fa-home\"></i></a></li>
\t\t\t\t\t<li><a href=\"#control-sidebar-settings-tab\" data-toggle=\"tab\"><i class=\"fa fa-gears\"></i></a></li>
\t\t\t\t</ul>
\t\t\t\t<!-- Tab panes -->
\t\t\t\t<div class=\"tab-content\">
\t\t\t\t\t<!-- Home tab content -->
\t\t\t\t\t<div class=\"tab-pane\" id=\"control-sidebar-home-tab\">
\t\t\t\t\t\t<h3 class=\"control-sidebar-heading\">Recent Activity</h3>
\t\t\t\t\t\t<ul class=\"control-sidebar-menu\">
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"javascript::;\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-birthday-cake bg-red\"></i>
\t\t\t\t\t\t\t\t\t<div class=\"menu-info\">
\t\t\t\t\t\t\t\t\t\t<h4 class=\"control-sidebar-subheading\">Langdon's Birthday</h4>
\t\t\t\t\t\t\t\t\t\t<p>Will be 23 on April 24th</p>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"javascript::;\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-user bg-yellow\"></i>
\t\t\t\t\t\t\t\t\t<div class=\"menu-info\">
\t\t\t\t\t\t\t\t\t\t<h4 class=\"control-sidebar-subheading\">Frodo Updated His Profile</h4>
\t\t\t\t\t\t\t\t\t\t<p>New phone +1(800)555-1234</p>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"javascript::;\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-envelope-o bg-light-blue\"></i>
\t\t\t\t\t\t\t\t\t<div class=\"menu-info\">
\t\t\t\t\t\t\t\t\t\t<h4 class=\"control-sidebar-subheading\">Nora Joined Mailing List</h4>
\t\t\t\t\t\t\t\t\t\t<p>nora@example.com</p>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"javascript::;\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-file-code-o bg-green\"></i>
\t\t\t\t\t\t\t\t\t<div class=\"menu-info\">
\t\t\t\t\t\t\t\t\t\t<h4 class=\"control-sidebar-subheading\">Cron Job 254 Executed</h4>
\t\t\t\t\t\t\t\t\t\t<p>Execution time 5 seconds</p>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t</ul><!-- /.control-sidebar-menu -->

\t\t\t\t\t\t<h3 class=\"control-sidebar-heading\">Tasks Progress</h3>
\t\t\t\t\t\t<ul class=\"control-sidebar-menu\">
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"javascript::;\">
\t\t\t\t\t\t\t\t\t<h4 class=\"control-sidebar-subheading\">
\t\t\t\t\t\t\t\t\t\tCustom Template Design
\t\t\t\t\t\t\t\t\t\t<span class=\"label label-danger pull-right\">70%</span>
\t\t\t\t\t\t\t\t\t</h4>
\t\t\t\t\t\t\t\t\t<div class=\"progress progress-xxs\">
\t\t\t\t\t\t\t\t\t\t<div class=\"progress-bar progress-bar-danger\" style=\"width: 70%\"></div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"javascript::;\">
\t\t\t\t\t\t\t\t\t<h4 class=\"control-sidebar-subheading\">
\t\t\t\t\t\t\t\t\t\tUpdate Resume
\t\t\t\t\t\t\t\t\t\t<span class=\"label label-success pull-right\">95%</span>
\t\t\t\t\t\t\t\t\t</h4>
\t\t\t\t\t\t\t\t\t<div class=\"progress progress-xxs\">
\t\t\t\t\t\t\t\t\t\t<div class=\"progress-bar progress-bar-success\" style=\"width: 95%\"></div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"javascript::;\">
\t\t\t\t\t\t\t\t\t<h4 class=\"control-sidebar-subheading\">
\t\t\t\t\t\t\t\t\t\tLaravel Integration
\t\t\t\t\t\t\t\t\t\t<span class=\"label label-warning pull-right\">50%</span>
\t\t\t\t\t\t\t\t\t</h4>
\t\t\t\t\t\t\t\t\t<div class=\"progress progress-xxs\">
\t\t\t\t\t\t\t\t\t\t<div class=\"progress-bar progress-bar-warning\" style=\"width: 50%\"></div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"javascript::;\">
\t\t\t\t\t\t\t\t\t<h4 class=\"control-sidebar-subheading\">
\t\t\t\t\t\t\t\t\t\tBack End Framework
\t\t\t\t\t\t\t\t\t\t<span class=\"label label-primary pull-right\">68%</span>
\t\t\t\t\t\t\t\t\t</h4>
\t\t\t\t\t\t\t\t\t<div class=\"progress progress-xxs\">
\t\t\t\t\t\t\t\t\t\t<div class=\"progress-bar progress-bar-primary\" style=\"width: 68%\"></div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t</ul><!-- /.control-sidebar-menu -->

\t\t\t\t\t</div><!-- /.tab-pane -->
\t\t\t\t\t<!-- Stats tab content -->
\t\t\t\t\t<div class=\"tab-pane\" id=\"control-sidebar-stats-tab\">Stats Tab Content</div><!-- /.tab-pane -->
\t\t\t\t\t<!-- Settings tab content -->
\t\t\t\t\t<div class=\"tab-pane\" id=\"control-sidebar-settings-tab\">
\t\t\t\t\t\t<form method=\"post\">
\t\t\t\t\t\t\t<h3 class=\"control-sidebar-heading\">General Settings</h3>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"control-sidebar-subheading\">
\t\t\t\t\t\t\t\t\tReport panel usage
\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"pull-right\" checked>
\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\tSome information about this general settings option
\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t</div><!-- /.form-group -->

\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"control-sidebar-subheading\">
\t\t\t\t\t\t\t\t\tAllow mail redirect
\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"pull-right\" checked>
\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\tOther sets of options are available
\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t</div><!-- /.form-group -->

\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"control-sidebar-subheading\">
\t\t\t\t\t\t\t\t\tExpose author name in posts
\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"pull-right\" checked>
\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\tAllow the user to show his name in blog posts
\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t</div><!-- /.form-group -->

\t\t\t\t\t\t\t<h3 class=\"control-sidebar-heading\">Chat Settings</h3>

\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"control-sidebar-subheading\">
\t\t\t\t\t\t\t\t\tShow me as online
\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"pull-right\" checked>
\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t</div><!-- /.form-group -->

\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"control-sidebar-subheading\">
\t\t\t\t\t\t\t\t\tTurn off notifications
\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"pull-right\">
\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t</div><!-- /.form-group -->

\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"control-sidebar-subheading\">
\t\t\t\t\t\t\t\t\tDelete chat history
\t\t\t\t\t\t\t\t\t<a href=\"javascript::;\" class=\"text-red pull-right\"><i class=\"fa fa-trash-o\"></i></a>
\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t</div><!-- /.form-group -->
\t\t\t\t\t\t</form>
\t\t\t\t\t</div><!-- /.tab-pane -->
\t\t\t\t</div>
\t\t\t</aside><!-- /.control-sidebar -->
\t\t\t<!-- Add the sidebar's background. This div must be placed
\t\t\t\t\t immediately after the control sidebar -->
\t\t\t<div class=\"control-sidebar-bg\"></div>
\t\t</div><!-- ./wrapper -->

\t\t<!-- jQuery 2.1.4 -->
\t\t<script src=\"/mercury/assets/plugins/jQuery/jQuery-2.1.4.min.js\"></script>
\t\t<!-- jQuery UI 1.11.4 -->
\t\t<script src=\"http://code.jquery.com/ui/1.11.4/jquery-ui.min.js\"></script>
\t\t<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
\t\t<script>
\t\t\t\$.widget.bridge('uibutton', \$.ui.button);
\t\t</script>
\t\t<!-- Bootstrap 3.3.5 -->
\t\t<script src=\"/mercury/assets/bootstrap/js/bootstrap.min.js\"></script>
\t\t<!-- Morris.js charts -->
\t\t<script src=\"http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js\"></script>
\t\t<script src=\"/mercury/assets/plugins/morris/morris.min.js\"></script>
\t\t<!-- Sparkline -->
\t\t<script src=\"/mercury/assets/plugins/sparkline/jquery.sparkline.min.js\"></script>
\t\t<!-- jvectormap -->
\t\t<script src=\"/mercury/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js\"></script>
\t\t<script src=\"/mercury/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js\"></script>
\t\t<!-- jQuery Knob Chart -->
\t\t<script src=\"/mercury/assets/plugins/knob/jquery.knob.js\"></script>
\t\t<!-- daterangepicker -->
\t\t<script src=\"http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js\"></script>
\t\t<script src=\"/mercury/assets/plugins/daterangepicker/daterangepicker.js\"></script>
\t\t<!-- datepicker -->
\t\t<script src=\"/mercury/assets/plugins/datepicker/bootstrap-datepicker.js\"></script>
\t\t<!-- Bootstrap WYSIHTML5 -->
\t\t<script src=\"/mercury/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js\"></script>
\t\t<!-- Slimscroll -->
\t\t<script src=\"/mercury/assets/plugins/slimScroll/jquery.slimscroll.min.js\"></script>
\t\t<!-- FastClick -->
\t\t<script src=\"/mercury/assets/plugins/fastclick/fastclick.min.js\"></script>
\t\t<!-- AdminLTE App -->
\t\t<script src=\"/mercury/assets/js/app.min.js\"></script>
\t\t<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
\t\t<script src=\"/mercury/assets/js/pages/dashboard.js\"></script>
\t\t<!-- AdminLTE for demo purposes -->
\t\t<script src=\"/mercury/assets/js/demo.js\"></script>
\t</body>
</html>
";
    }

    // line 458
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "template/admin-template.html";
    }

    public function getDebugInfo()
    {
        return array (  699 => 458,  481 => 459,  479 => 458,  20 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/* 	<head>*/
/* 		<meta charset="utf-8">*/
/* 		<meta http-equiv="X-UA-Compatible" content="IE=edge">*/
/* 		<title>AdminLTE 2 | Dashboard</title>*/
/* 		<!-- Tell the browser to be responsive to screen width -->*/
/* 		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">*/
/* 		<!-- Bootstrap 3.3.5 -->*/
/* 		<link rel="stylesheet" href="/mercury/assets/bootstrap/css/bootstrap.min.css">*/
/* 		<!-- Font Awesome -->*/
/* 		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">*/
/* 		<!-- Ionicons -->*/
/* 		<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">*/
/* 		<!-- Theme style -->*/
/* 		<link rel="stylesheet" href="/mercury/assets/css/AdminLTE.min.css">*/
/* 		<!-- AdminLTE Skins. Choose a skin from the css/skins*/
/* 				 folder instead of downloading all of them to reduce the load. -->*/
/* 		<link rel="stylesheet" href="/mercury/assets/css/skins/_all-skins.min.css">*/
/* 		<!-- iCheck -->*/
/* 		<link rel="stylesheet" href="/mercury/assets/plugins/iCheck/flat/blue.css">*/
/* 		<!-- Morris chart -->*/
/* 		<link rel="stylesheet" href="/mercury/assets/plugins/morris/morris.css">*/
/* 		<!-- jvectormap -->*/
/* 		<link rel="stylesheet" href="/mercury/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">*/
/* 		<!-- Date Picker -->*/
/* 		<link rel="stylesheet" href="/mercury/assets/plugins/datepicker/datepicker3.css">*/
/* 		<!-- Daterange picker -->*/
/* 		<link rel="stylesheet" href="/mercury/assets/plugins/daterangepicker/daterangepicker-bs3.css">*/
/* 		<!-- bootstrap wysihtml5 - text editor -->*/
/* 		<link rel="stylesheet" href="/mercury/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">*/
/* */
/* 		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->*/
/* 		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->*/
/* 		<!--[if lt IE 9]>*/
/* 				<script src="http://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>*/
/* 				<script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>*/
/* 		<![endif]-->*/
/* 	</head>*/
/* 	<body class="hold-transition skin-blue sidebar-mini">*/
/* 		<div class="wrapper">*/
/* */
/* 			<header class="main-header">*/
/* 				<!-- Logo -->*/
/* 				<a href="index2.html" class="logo">*/
/* 					<!-- mini logo for sidebar mini 50x50 pixels -->*/
/* 					<span class="logo-mini"><b>A</b>LT</span>*/
/* 					<!-- logo for regular state and mobile devices -->*/
/* 					<span class="logo-lg"><b>Admin</b>LTE</span>*/
/* 				</a>*/
/* 				<!-- Header Navbar: style can be found in header.less -->*/
/* 				<nav class="navbar navbar-static-top" role="navigation">*/
/* 					<!-- Sidebar toggle button-->*/
/* 					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">*/
/* 						<span class="sr-only">Toggle navigation</span>*/
/* 					</a>*/
/* 					<div class="navbar-custom-menu">*/
/* 						<ul class="nav navbar-nav">*/
/* 							<!-- Messages: style can be found in dropdown.less-->*/
/* 							<li class="dropdown messages-menu">*/
/* 								<a href="#" class="dropdown-toggle" data-toggle="dropdown">*/
/* 									<i class="fa fa-envelope-o"></i>*/
/* 									<span class="label label-success">4</span>*/
/* 								</a>*/
/* 								<ul class="dropdown-menu">*/
/* 									<li class="header">You have 4 messages</li>*/
/* 									<li>*/
/* 										<!-- inner menu: contains the actual data -->*/
/* 										<ul class="menu">*/
/* 											<li><!-- start message -->*/
/* 												<a href="#">*/
/* 													<div class="pull-left">*/
/* 														<img src="/mercury/assets/images/user2-160x160.jpg" class="img-circle" alt="User Image">*/
/* 													</div>*/
/* 													<h4>*/
/* 														Support Team*/
/* 														<small><i class="fa fa-clock-o"></i> 5 mins</small>*/
/* 													</h4>*/
/* 													<p>Why not buy a new awesome theme?</p>*/
/* 												</a>*/
/* 											</li><!-- end message -->*/
/* 											<li>*/
/* 												<a href="#">*/
/* 													<div class="pull-left">*/
/* 														<img src="/mercury/assets/images/user3-128x128.jpg" class="img-circle" alt="User Image">*/
/* 													</div>*/
/* 													<h4>*/
/* 														AdminLTE Design Team*/
/* 														<small><i class="fa fa-clock-o"></i> 2 hours</small>*/
/* 													</h4>*/
/* 													<p>Why not buy a new awesome theme?</p>*/
/* 												</a>*/
/* 											</li>*/
/* 											<li>*/
/* 												<a href="#">*/
/* 													<div class="pull-left">*/
/* 														<img src="/mercury/assets/images/user4-128x128.jpg" class="img-circle" alt="User Image">*/
/* 													</div>*/
/* 													<h4>*/
/* 														Developers*/
/* 														<small><i class="fa fa-clock-o"></i> Today</small>*/
/* 													</h4>*/
/* 													<p>Why not buy a new awesome theme?</p>*/
/* 												</a>*/
/* 											</li>*/
/* 											<li>*/
/* 												<a href="#">*/
/* 													<div class="pull-left">*/
/* 														<img src="/mercury/assets/images/user3-128x128.jpg" class="img-circle" alt="User Image">*/
/* 													</div>*/
/* 													<h4>*/
/* 														Sales Department*/
/* 														<small><i class="fa fa-clock-o"></i> Yesterday</small>*/
/* 													</h4>*/
/* 													<p>Why not buy a new awesome theme?</p>*/
/* 												</a>*/
/* 											</li>*/
/* 											<li>*/
/* 												<a href="#">*/
/* 													<div class="pull-left">*/
/* 														<img src="/mercury/assets/images/user4-128x128.jpg" class="img-circle" alt="User Image">*/
/* 													</div>*/
/* 													<h4>*/
/* 														Reviewers*/
/* 														<small><i class="fa fa-clock-o"></i> 2 days</small>*/
/* 													</h4>*/
/* 													<p>Why not buy a new awesome theme?</p>*/
/* 												</a>*/
/* 											</li>*/
/* 										</ul>*/
/* 									</li>*/
/* 									<li class="footer"><a href="#">See All Messages</a></li>*/
/* 								</ul>*/
/* 							</li>*/
/* 							<!-- Notifications: style can be found in dropdown.less -->*/
/* 							<li class="dropdown notifications-menu">*/
/* 								<a href="#" class="dropdown-toggle" data-toggle="dropdown">*/
/* 									<i class="fa fa-bell-o"></i>*/
/* 									<span class="label label-warning">10</span>*/
/* 								</a>*/
/* 								<ul class="dropdown-menu">*/
/* 									<li class="header">You have 10 notifications</li>*/
/* 									<li>*/
/* 										<!-- inner menu: contains the actual data -->*/
/* 										<ul class="menu">*/
/* 											<li>*/
/* 												<a href="#">*/
/* 													<i class="fa fa-users text-aqua"></i> 5 new members joined today*/
/* 												</a>*/
/* 											</li>*/
/* 											<li>*/
/* 												<a href="#">*/
/* 													<i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems*/
/* 												</a>*/
/* 											</li>*/
/* 											<li>*/
/* 												<a href="#">*/
/* 													<i class="fa fa-users text-red"></i> 5 new members joined*/
/* 												</a>*/
/* 											</li>*/
/* 											<li>*/
/* 												<a href="#">*/
/* 													<i class="fa fa-shopping-cart text-green"></i> 25 sales made*/
/* 												</a>*/
/* 											</li>*/
/* 											<li>*/
/* 												<a href="#">*/
/* 													<i class="fa fa-user text-red"></i> You changed your username*/
/* 												</a>*/
/* 											</li>*/
/* 										</ul>*/
/* 									</li>*/
/* 									<li class="footer"><a href="#">View all</a></li>*/
/* 								</ul>*/
/* 							</li>*/
/* 							<!-- Tasks: style can be found in dropdown.less -->*/
/* 							<li class="dropdown tasks-menu">*/
/* 								<a href="#" class="dropdown-toggle" data-toggle="dropdown">*/
/* 									<i class="fa fa-flag-o"></i>*/
/* 									<span class="label label-danger">9</span>*/
/* 								</a>*/
/* 								<ul class="dropdown-menu">*/
/* 									<li class="header">You have 9 tasks</li>*/
/* 									<li>*/
/* 										<!-- inner menu: contains the actual data -->*/
/* 										<ul class="menu">*/
/* 											<li><!-- Task item -->*/
/* 												<a href="#">*/
/* 													<h3>*/
/* 														Design some buttons*/
/* 														<small class="pull-right">20%</small>*/
/* 													</h3>*/
/* 													<div class="progress xs">*/
/* 														<div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">*/
/* 															<span class="sr-only">20% Complete</span>*/
/* 														</div>*/
/* 													</div>*/
/* 												</a>*/
/* 											</li><!-- end task item -->*/
/* 											<li><!-- Task item -->*/
/* 												<a href="#">*/
/* 													<h3>*/
/* 														Create a nice theme*/
/* 														<small class="pull-right">40%</small>*/
/* 													</h3>*/
/* 													<div class="progress xs">*/
/* 														<div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">*/
/* 															<span class="sr-only">40% Complete</span>*/
/* 														</div>*/
/* 													</div>*/
/* 												</a>*/
/* 											</li><!-- end task item -->*/
/* 											<li><!-- Task item -->*/
/* 												<a href="#">*/
/* 													<h3>*/
/* 														Some task I need to do*/
/* 														<small class="pull-right">60%</small>*/
/* 													</h3>*/
/* 													<div class="progress xs">*/
/* 														<div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">*/
/* 															<span class="sr-only">60% Complete</span>*/
/* 														</div>*/
/* 													</div>*/
/* 												</a>*/
/* 											</li><!-- end task item -->*/
/* 											<li><!-- Task item -->*/
/* 												<a href="#">*/
/* 													<h3>*/
/* 														Make beautiful transitions*/
/* 														<small class="pull-right">80%</small>*/
/* 													</h3>*/
/* 													<div class="progress xs">*/
/* 														<div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">*/
/* 															<span class="sr-only">80% Complete</span>*/
/* 														</div>*/
/* 													</div>*/
/* 												</a>*/
/* 											</li><!-- end task item -->*/
/* 										</ul>*/
/* 									</li>*/
/* 									<li class="footer">*/
/* 										<a href="#">View all tasks</a>*/
/* 									</li>*/
/* 								</ul>*/
/* 							</li>*/
/* 							<!-- User Account: style can be found in dropdown.less -->*/
/* 							<li class="dropdown user user-menu">*/
/* 								<a href="#" class="dropdown-toggle" data-toggle="dropdown">*/
/* 									<img src="/mercury/assets/images/user2-160x160.jpg" class="user-image" alt="User Image">*/
/* 									<span class="hidden-xs">Alexander Pierce</span>*/
/* 								</a>*/
/* 								<ul class="dropdown-menu">*/
/* 									<!-- User image -->*/
/* 									<li class="user-header">*/
/* 										<img src="/mercury/assets/images/user2-160x160.jpg" class="img-circle" alt="User Image">*/
/* 										<p>*/
/* 											Alexander Pierce - Web Developer*/
/* 											<small>Member since Nov. 2012</small>*/
/* 										</p>*/
/* 									</li>*/
/* 									<!-- Menu Body -->*/
/* 									<li class="user-body">*/
/* 										<div class="col-xs-4 text-center">*/
/* 											<a href="#">Followers</a>*/
/* 										</div>*/
/* 										<div class="col-xs-4 text-center">*/
/* 											<a href="#">Sales</a>*/
/* 										</div>*/
/* 										<div class="col-xs-4 text-center">*/
/* 											<a href="#">Friends</a>*/
/* 										</div>*/
/* 									</li>*/
/* 									<!-- Menu Footer-->*/
/* 									<li class="user-footer">*/
/* 										<div class="pull-left">*/
/* 											<a href="#" class="btn btn-default btn-flat">Profile</a>*/
/* 										</div>*/
/* 										<div class="pull-right">*/
/* 											<a href="#" class="btn btn-default btn-flat">Sign out</a>*/
/* 										</div>*/
/* 									</li>*/
/* 								</ul>*/
/* 							</li>*/
/* 							<!-- Control Sidebar Toggle Button -->*/
/* 							<li>*/
/* 								<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>*/
/* 							</li>*/
/* 						</ul>*/
/* 					</div>*/
/* 				</nav>*/
/* 			</header>*/
/* 			<!-- Left side column. contains the logo and sidebar -->*/
/* 			<aside class="main-sidebar">*/
/* 				<!-- sidebar: style can be found in sidebar.less -->*/
/* 				<section class="sidebar">*/
/* 					<!-- Sidebar user panel -->*/
/* 					<div class="user-panel">*/
/* 						<div class="pull-left image">*/
/* 							<img src="/mercury/assets/images/user2-160x160.jpg" class="img-circle" alt="User Image">*/
/* 						</div>*/
/* 						<div class="pull-left info">*/
/* 							<p>Alexander Pierce</p>*/
/* 							<a href="#"><i class="fa fa-circle text-success"></i> Online</a>*/
/* 						</div>*/
/* 					</div>*/
/* 					<!-- search form -->*/
/* 					<form action="#" method="get" class="sidebar-form">*/
/* 						<div class="input-group">*/
/* 							<input type="text" name="q" class="form-control" placeholder="Search...">*/
/* 							<span class="input-group-btn">*/
/* 								<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>*/
/* 							</span>*/
/* 						</div>*/
/* 					</form>*/
/* 					<!-- /.search form -->*/
/* 					<!-- sidebar menu: : style can be found in sidebar.less -->*/
/* 					<ul class="sidebar-menu">*/
/* 						<li class="header">MAIN NAVIGATION</li>*/
/* 						<li class="active treeview">*/
/* 							<a href="#">*/
/* 								<i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>*/
/* 							</a>*/
/* 							<ul class="treeview-menu">*/
/* 								<li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>*/
/* 								<li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>*/
/* 							</ul>*/
/* 						</li>*/
/* 						<li class="treeview">*/
/* 							<a href="#">*/
/* 								<i class="fa fa-files-o"></i>*/
/* 								<span>Layout Options</span>*/
/* 								<span class="label label-primary pull-right">4</span>*/
/* 							</a>*/
/* 							<ul class="treeview-menu">*/
/* 								<li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>*/
/* 								<li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>*/
/* 								<li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>*/
/* 								<li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>*/
/* 							</ul>*/
/* 						</li>*/
/* 						<li>*/
/* 							<a href="pages/widgets.html">*/
/* 								<i class="fa fa-th"></i> <span>Widgets</span> <small class="label pull-right bg-green">new</small>*/
/* 							</a>*/
/* 						</li>*/
/* 						<li class="treeview">*/
/* 							<a href="#">*/
/* 								<i class="fa fa-pie-chart"></i>*/
/* 								<span>Charts</span>*/
/* 								<i class="fa fa-angle-left pull-right"></i>*/
/* 							</a>*/
/* 							<ul class="treeview-menu">*/
/* 								<li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>*/
/* 								<li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>*/
/* 								<li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>*/
/* 								<li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>*/
/* 							</ul>*/
/* 						</li>*/
/* 						<li class="treeview">*/
/* 							<a href="#">*/
/* 								<i class="fa fa-laptop"></i>*/
/* 								<span>UI Elements</span>*/
/* 								<i class="fa fa-angle-left pull-right"></i>*/
/* 							</a>*/
/* 							<ul class="treeview-menu">*/
/* 								<li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>*/
/* 								<li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>*/
/* 								<li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>*/
/* 								<li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>*/
/* 								<li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>*/
/* 								<li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>*/
/* 							</ul>*/
/* 						</li>*/
/* 						<li class="treeview">*/
/* 							<a href="#">*/
/* 								<i class="fa fa-edit"></i> <span>Forms</span>*/
/* 								<i class="fa fa-angle-left pull-right"></i>*/
/* 							</a>*/
/* 							<ul class="treeview-menu">*/
/* 								<li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>*/
/* 								<li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>*/
/* 								<li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>*/
/* 							</ul>*/
/* 						</li>*/
/* 						<li class="treeview">*/
/* 							<a href="#">*/
/* 								<i class="fa fa-table"></i> <span>Tables</span>*/
/* 								<i class="fa fa-angle-left pull-right"></i>*/
/* 							</a>*/
/* 							<ul class="treeview-menu">*/
/* 								<li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>*/
/* 								<li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>*/
/* 							</ul>*/
/* 						</li>*/
/* 						<li>*/
/* 							<a href="pages/calendar.html">*/
/* 								<i class="fa fa-calendar"></i> <span>Calendar</span>*/
/* 								<small class="label pull-right bg-red">3</small>*/
/* 							</a>*/
/* 						</li>*/
/* 						<li>*/
/* 							<a href="pages/mailbox/mailbox.html">*/
/* 								<i class="fa fa-envelope"></i> <span>Mailbox</span>*/
/* 								<small class="label pull-right bg-yellow">12</small>*/
/* 							</a>*/
/* 						</li>*/
/* 						<li class="treeview">*/
/* 							<a href="#">*/
/* 								<i class="fa fa-folder"></i> <span>Examples</span>*/
/* 								<i class="fa fa-angle-left pull-right"></i>*/
/* 							</a>*/
/* 							<ul class="treeview-menu">*/
/* 								<li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>*/
/* 								<li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>*/
/* 								<li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>*/
/* 								<li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>*/
/* 								<li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>*/
/* 								<li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>*/
/* 								<li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>*/
/* 								<li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>*/
/* 							</ul>*/
/* 						</li>*/
/* 						<li class="treeview">*/
/* 							<a href="#">*/
/* 								<i class="fa fa-share"></i> <span>Multilevel</span>*/
/* 								<i class="fa fa-angle-left pull-right"></i>*/
/* 							</a>*/
/* 							<ul class="treeview-menu">*/
/* 								<li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>*/
/* 								<li>*/
/* 									<a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>*/
/* 									<ul class="treeview-menu">*/
/* 										<li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>*/
/* 										<li>*/
/* 											<a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>*/
/* 											<ul class="treeview-menu">*/
/* 												<li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>*/
/* 												<li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>*/
/* 											</ul>*/
/* 										</li>*/
/* 									</ul>*/
/* 								</li>*/
/* 								<li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>*/
/* 							</ul>*/
/* 						</li>*/
/* 						<li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>*/
/* 						<li class="header">LABELS</li>*/
/* 						<li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>*/
/* 						<li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>*/
/* 						<li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>*/
/* 					</ul>*/
/* 				</section>*/
/* 				<!-- /.sidebar -->*/
/* 			</aside>*/
/* */
/* 			<!-- Content Wrapper. Contains page content -->*/
/* 			<div class="content-wrapper">*/
/* 				{% block content %}{% endblock %}*/
/* 			</div><!-- /.content-wrapper -->*/
/* 			<footer class="main-footer">*/
/* 				<div class="pull-right hidden-xs">*/
/* 					<b>Version</b> 2.3.0*/
/* 				</div>*/
/* 				<strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.*/
/* 			</footer>*/
/* */
/* 			<!-- Control Sidebar -->*/
/* 			<aside class="control-sidebar control-sidebar-dark">*/
/* 				<!-- Create the tabs -->*/
/* 				<ul class="nav nav-tabs nav-justified control-sidebar-tabs">*/
/* 					<li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>*/
/* 					<li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>*/
/* 				</ul>*/
/* 				<!-- Tab panes -->*/
/* 				<div class="tab-content">*/
/* 					<!-- Home tab content -->*/
/* 					<div class="tab-pane" id="control-sidebar-home-tab">*/
/* 						<h3 class="control-sidebar-heading">Recent Activity</h3>*/
/* 						<ul class="control-sidebar-menu">*/
/* 							<li>*/
/* 								<a href="javascript::;">*/
/* 									<i class="menu-icon fa fa-birthday-cake bg-red"></i>*/
/* 									<div class="menu-info">*/
/* 										<h4 class="control-sidebar-subheading">Langdon's Birthday</h4>*/
/* 										<p>Will be 23 on April 24th</p>*/
/* 									</div>*/
/* 								</a>*/
/* 							</li>*/
/* 							<li>*/
/* 								<a href="javascript::;">*/
/* 									<i class="menu-icon fa fa-user bg-yellow"></i>*/
/* 									<div class="menu-info">*/
/* 										<h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>*/
/* 										<p>New phone +1(800)555-1234</p>*/
/* 									</div>*/
/* 								</a>*/
/* 							</li>*/
/* 							<li>*/
/* 								<a href="javascript::;">*/
/* 									<i class="menu-icon fa fa-envelope-o bg-light-blue"></i>*/
/* 									<div class="menu-info">*/
/* 										<h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>*/
/* 										<p>nora@example.com</p>*/
/* 									</div>*/
/* 								</a>*/
/* 							</li>*/
/* 							<li>*/
/* 								<a href="javascript::;">*/
/* 									<i class="menu-icon fa fa-file-code-o bg-green"></i>*/
/* 									<div class="menu-info">*/
/* 										<h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>*/
/* 										<p>Execution time 5 seconds</p>*/
/* 									</div>*/
/* 								</a>*/
/* 							</li>*/
/* 						</ul><!-- /.control-sidebar-menu -->*/
/* */
/* 						<h3 class="control-sidebar-heading">Tasks Progress</h3>*/
/* 						<ul class="control-sidebar-menu">*/
/* 							<li>*/
/* 								<a href="javascript::;">*/
/* 									<h4 class="control-sidebar-subheading">*/
/* 										Custom Template Design*/
/* 										<span class="label label-danger pull-right">70%</span>*/
/* 									</h4>*/
/* 									<div class="progress progress-xxs">*/
/* 										<div class="progress-bar progress-bar-danger" style="width: 70%"></div>*/
/* 									</div>*/
/* 								</a>*/
/* 							</li>*/
/* 							<li>*/
/* 								<a href="javascript::;">*/
/* 									<h4 class="control-sidebar-subheading">*/
/* 										Update Resume*/
/* 										<span class="label label-success pull-right">95%</span>*/
/* 									</h4>*/
/* 									<div class="progress progress-xxs">*/
/* 										<div class="progress-bar progress-bar-success" style="width: 95%"></div>*/
/* 									</div>*/
/* 								</a>*/
/* 							</li>*/
/* 							<li>*/
/* 								<a href="javascript::;">*/
/* 									<h4 class="control-sidebar-subheading">*/
/* 										Laravel Integration*/
/* 										<span class="label label-warning pull-right">50%</span>*/
/* 									</h4>*/
/* 									<div class="progress progress-xxs">*/
/* 										<div class="progress-bar progress-bar-warning" style="width: 50%"></div>*/
/* 									</div>*/
/* 								</a>*/
/* 							</li>*/
/* 							<li>*/
/* 								<a href="javascript::;">*/
/* 									<h4 class="control-sidebar-subheading">*/
/* 										Back End Framework*/
/* 										<span class="label label-primary pull-right">68%</span>*/
/* 									</h4>*/
/* 									<div class="progress progress-xxs">*/
/* 										<div class="progress-bar progress-bar-primary" style="width: 68%"></div>*/
/* 									</div>*/
/* 								</a>*/
/* 							</li>*/
/* 						</ul><!-- /.control-sidebar-menu -->*/
/* */
/* 					</div><!-- /.tab-pane -->*/
/* 					<!-- Stats tab content -->*/
/* 					<div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->*/
/* 					<!-- Settings tab content -->*/
/* 					<div class="tab-pane" id="control-sidebar-settings-tab">*/
/* 						<form method="post">*/
/* 							<h3 class="control-sidebar-heading">General Settings</h3>*/
/* 							<div class="form-group">*/
/* 								<label class="control-sidebar-subheading">*/
/* 									Report panel usage*/
/* 									<input type="checkbox" class="pull-right" checked>*/
/* 								</label>*/
/* 								<p>*/
/* 									Some information about this general settings option*/
/* 								</p>*/
/* 							</div><!-- /.form-group -->*/
/* */
/* 							<div class="form-group">*/
/* 								<label class="control-sidebar-subheading">*/
/* 									Allow mail redirect*/
/* 									<input type="checkbox" class="pull-right" checked>*/
/* 								</label>*/
/* 								<p>*/
/* 									Other sets of options are available*/
/* 								</p>*/
/* 							</div><!-- /.form-group -->*/
/* */
/* 							<div class="form-group">*/
/* 								<label class="control-sidebar-subheading">*/
/* 									Expose author name in posts*/
/* 									<input type="checkbox" class="pull-right" checked>*/
/* 								</label>*/
/* 								<p>*/
/* 									Allow the user to show his name in blog posts*/
/* 								</p>*/
/* 							</div><!-- /.form-group -->*/
/* */
/* 							<h3 class="control-sidebar-heading">Chat Settings</h3>*/
/* */
/* 							<div class="form-group">*/
/* 								<label class="control-sidebar-subheading">*/
/* 									Show me as online*/
/* 									<input type="checkbox" class="pull-right" checked>*/
/* 								</label>*/
/* 							</div><!-- /.form-group -->*/
/* */
/* 							<div class="form-group">*/
/* 								<label class="control-sidebar-subheading">*/
/* 									Turn off notifications*/
/* 									<input type="checkbox" class="pull-right">*/
/* 								</label>*/
/* 							</div><!-- /.form-group -->*/
/* */
/* 							<div class="form-group">*/
/* 								<label class="control-sidebar-subheading">*/
/* 									Delete chat history*/
/* 									<a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>*/
/* 								</label>*/
/* 							</div><!-- /.form-group -->*/
/* 						</form>*/
/* 					</div><!-- /.tab-pane -->*/
/* 				</div>*/
/* 			</aside><!-- /.control-sidebar -->*/
/* 			<!-- Add the sidebar's background. This div must be placed*/
/* 					 immediately after the control sidebar -->*/
/* 			<div class="control-sidebar-bg"></div>*/
/* 		</div><!-- ./wrapper -->*/
/* */
/* 		<!-- jQuery 2.1.4 -->*/
/* 		<script src="/mercury/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>*/
/* 		<!-- jQuery UI 1.11.4 -->*/
/* 		<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>*/
/* 		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->*/
/* 		<script>*/
/* 			$.widget.bridge('uibutton', $.ui.button);*/
/* 		</script>*/
/* 		<!-- Bootstrap 3.3.5 -->*/
/* 		<script src="/mercury/assets/bootstrap/js/bootstrap.min.js"></script>*/
/* 		<!-- Morris.js charts -->*/
/* 		<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>*/
/* 		<script src="/mercury/assets/plugins/morris/morris.min.js"></script>*/
/* 		<!-- Sparkline -->*/
/* 		<script src="/mercury/assets/plugins/sparkline/jquery.sparkline.min.js"></script>*/
/* 		<!-- jvectormap -->*/
/* 		<script src="/mercury/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>*/
/* 		<script src="/mercury/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>*/
/* 		<!-- jQuery Knob Chart -->*/
/* 		<script src="/mercury/assets/plugins/knob/jquery.knob.js"></script>*/
/* 		<!-- daterangepicker -->*/
/* 		<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>*/
/* 		<script src="/mercury/assets/plugins/daterangepicker/daterangepicker.js"></script>*/
/* 		<!-- datepicker -->*/
/* 		<script src="/mercury/assets/plugins/datepicker/bootstrap-datepicker.js"></script>*/
/* 		<!-- Bootstrap WYSIHTML5 -->*/
/* 		<script src="/mercury/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>*/
/* 		<!-- Slimscroll -->*/
/* 		<script src="/mercury/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>*/
/* 		<!-- FastClick -->*/
/* 		<script src="/mercury/assets/plugins/fastclick/fastclick.min.js"></script>*/
/* 		<!-- AdminLTE App -->*/
/* 		<script src="/mercury/assets/js/app.min.js"></script>*/
/* 		<!-- AdminLTE dashboard demo (This is only for demo purposes) -->*/
/* 		<script src="/mercury/assets/js/pages/dashboard.js"></script>*/
/* 		<!-- AdminLTE for demo purposes -->*/
/* 		<script src="/mercury/assets/js/demo.js"></script>*/
/* 	</body>*/
/* </html>*/
/* */
