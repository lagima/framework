<?php

/* /index/index.html */
class __TwigTemplate_e1e96938198562143d64785c5e83072a3730d4dd4807014d01f59f6a457b6b8a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("template/admin-template.html", "/index/index.html", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "template/admin-template.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <!-- Content Header (Page header) -->
\t<section class=\"content-header\">
\t\t<h1>
\t\t\tDashboard
\t\t\t<small>Control panel</small>
\t\t</h1>
\t\t<ol class=\"breadcrumb\">
\t\t\t<li><a href=\"#\"><i class=\"fa fa-dashboard\"></i> Home</a></li>
\t\t\t<li class=\"active\">Dashboard</li>
\t\t</ol>
\t</section>

\t<!-- Main content -->
\t<section class=\"content\">
\t\t<!-- Small boxes (Stat box) -->
\t\t<div class=\"row\">
\t\t\t<div class=\"col-lg-3 col-xs-6\">
\t\t\t\t<!-- small box -->
\t\t\t\t<div class=\"small-box bg-aqua\">
\t\t\t\t\t<div class=\"inner\">
\t\t\t\t\t\t<h3>150</h3>
\t\t\t\t\t\t<p>New Orders</p>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"icon\">
\t\t\t\t\t\t<i class=\"ion ion-bag\"></i>
\t\t\t\t\t</div>
\t\t\t\t\t<a href=\"#\" class=\"small-box-footer\">More info <i class=\"fa fa-arrow-circle-right\"></i></a>
\t\t\t\t</div>
\t\t\t</div><!-- ./col -->
\t\t\t<div class=\"col-lg-3 col-xs-6\">
\t\t\t\t<!-- small box -->
\t\t\t\t<div class=\"small-box bg-green\">
\t\t\t\t\t<div class=\"inner\">
\t\t\t\t\t\t<h3>53<sup style=\"font-size: 20px\">%</sup></h3>
\t\t\t\t\t\t<p>Bounce Rate</p>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"icon\">
\t\t\t\t\t\t<i class=\"ion ion-stats-bars\"></i>
\t\t\t\t\t</div>
\t\t\t\t\t<a href=\"#\" class=\"small-box-footer\">More info <i class=\"fa fa-arrow-circle-right\"></i></a>
\t\t\t\t</div>
\t\t\t</div><!-- ./col -->
\t\t\t<div class=\"col-lg-3 col-xs-6\">
\t\t\t\t<!-- small box -->
\t\t\t\t<div class=\"small-box bg-yellow\">
\t\t\t\t\t<div class=\"inner\">
\t\t\t\t\t\t<h3>44</h3>
\t\t\t\t\t\t<p>User Registrations</p>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"icon\">
\t\t\t\t\t\t<i class=\"ion ion-person-add\"></i>
\t\t\t\t\t</div>
\t\t\t\t\t<a href=\"#\" class=\"small-box-footer\">More info <i class=\"fa fa-arrow-circle-right\"></i></a>
\t\t\t\t</div>
\t\t\t</div><!-- ./col -->
\t\t\t<div class=\"col-lg-3 col-xs-6\">
\t\t\t\t<!-- small box -->
\t\t\t\t<div class=\"small-box bg-red\">
\t\t\t\t\t<div class=\"inner\">
\t\t\t\t\t\t<h3>65</h3>
\t\t\t\t\t\t<p>Unique Visitors</p>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"icon\">
\t\t\t\t\t\t<i class=\"ion ion-pie-graph\"></i>
\t\t\t\t\t</div>
\t\t\t\t\t<a href=\"#\" class=\"small-box-footer\">More info <i class=\"fa fa-arrow-circle-right\"></i></a>
\t\t\t\t</div>
\t\t\t</div><!-- ./col -->
\t\t</div><!-- /.row -->
\t\t<!-- Main row -->
\t\t<div class=\"row\">
\t\t\t<!-- Left col -->
\t\t\t<section class=\"col-lg-7 connectedSortable\">
\t\t\t\t<!-- Custom tabs (Charts with tabs)-->
\t\t\t\t<div class=\"nav-tabs-custom\">
\t\t\t\t\t<!-- Tabs within a box -->
\t\t\t\t\t<ul class=\"nav nav-tabs pull-right\">
\t\t\t\t\t\t<li class=\"active\"><a href=\"#revenue-chart\" data-toggle=\"tab\">Area</a></li>
\t\t\t\t\t\t<li><a href=\"#sales-chart\" data-toggle=\"tab\">Donut</a></li>
\t\t\t\t\t\t<li class=\"pull-left header\"><i class=\"fa fa-inbox\"></i> Sales</li>
\t\t\t\t\t</ul>
\t\t\t\t\t<div class=\"tab-content no-padding\">
\t\t\t\t\t\t<!-- Morris chart - Sales -->
\t\t\t\t\t\t<div class=\"chart tab-pane active\" id=\"revenue-chart\" style=\"position: relative; height: 300px;\"></div>
\t\t\t\t\t\t<div class=\"chart tab-pane\" id=\"sales-chart\" style=\"position: relative; height: 300px;\"></div>
\t\t\t\t\t</div>
\t\t\t\t</div><!-- /.nav-tabs-custom -->

\t\t\t\t<!-- Chat box -->
\t\t\t\t<div class=\"box box-success\">
\t\t\t\t\t<div class=\"box-header\">
\t\t\t\t\t\t<i class=\"fa fa-comments-o\"></i>
\t\t\t\t\t\t<h3 class=\"box-title\">Chat</h3>
\t\t\t\t\t\t<div class=\"box-tools pull-right\" data-toggle=\"tooltip\" title=\"Status\">
\t\t\t\t\t\t\t<div class=\"btn-group\" data-toggle=\"btn-toggle\" >
\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-default btn-sm active\"><i class=\"fa fa-square text-green\"></i></button>
\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-default btn-sm\"><i class=\"fa fa-square text-red\"></i></button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"box-body chat\" id=\"chat-box\">
\t\t\t\t\t\t<!-- chat item -->
\t\t\t\t\t\t<div class=\"item\">
\t\t\t\t\t\t\t<img src=\"/mercury/assets/images/user4-128x128.jpg\" alt=\"user image\" class=\"online\">
\t\t\t\t\t\t\t<p class=\"message\">
\t\t\t\t\t\t\t\t<a href=\"#\" class=\"name\">
\t\t\t\t\t\t\t\t\t<small class=\"text-muted pull-right\"><i class=\"fa fa-clock-o\"></i> 2:15</small>
\t\t\t\t\t\t\t\t\tMike Doe
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\tI would like to meet you to discuss the latest news about
\t\t\t\t\t\t\t\tthe arrival of the new theme. They say it is going to be one the
\t\t\t\t\t\t\t\tbest themes on the market
\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t<div class=\"attachment\">
\t\t\t\t\t\t\t\t<h4>Attachments:</h4>
\t\t\t\t\t\t\t\t<p class=\"filename\">
\t\t\t\t\t\t\t\t\tTheme-thumbnail-image.jpg
\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t<div class=\"pull-right\">
\t\t\t\t\t\t\t\t\t<button class=\"btn btn-primary btn-sm btn-flat\">Open</button>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div><!-- /.attachment -->
\t\t\t\t\t\t</div><!-- /.item -->
\t\t\t\t\t\t<!-- chat item -->
\t\t\t\t\t\t<div class=\"item\">
\t\t\t\t\t\t\t<img src=\"/mercury/assets/images/user3-128x128.jpg\" alt=\"user image\" class=\"offline\">
\t\t\t\t\t\t\t<p class=\"message\">
\t\t\t\t\t\t\t\t<a href=\"#\" class=\"name\">
\t\t\t\t\t\t\t\t\t<small class=\"text-muted pull-right\"><i class=\"fa fa-clock-o\"></i> 5:15</small>
\t\t\t\t\t\t\t\t\tAlexander Pierce
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\tI would like to meet you to discuss the latest news about
\t\t\t\t\t\t\t\tthe arrival of the new theme. They say it is going to be one the
\t\t\t\t\t\t\t\tbest themes on the market
\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t</div><!-- /.item -->
\t\t\t\t\t\t<!-- chat item -->
\t\t\t\t\t\t<div class=\"item\">
\t\t\t\t\t\t\t<img src=\"/mercury/assets/images/user2-160x160.jpg\" alt=\"user image\" class=\"offline\">
\t\t\t\t\t\t\t<p class=\"message\">
\t\t\t\t\t\t\t\t<a href=\"#\" class=\"name\">
\t\t\t\t\t\t\t\t\t<small class=\"text-muted pull-right\"><i class=\"fa fa-clock-o\"></i> 5:30</small>
\t\t\t\t\t\t\t\t\tSusan Doe
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\tI would like to meet you to discuss the latest news about
\t\t\t\t\t\t\t\tthe arrival of the new theme. They say it is going to be one the
\t\t\t\t\t\t\t\tbest themes on the market
\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t</div><!-- /.item -->
\t\t\t\t\t</div><!-- /.chat -->
\t\t\t\t\t<div class=\"box-footer\">
\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t<input class=\"form-control\" placeholder=\"Type message...\">
\t\t\t\t\t\t\t<div class=\"input-group-btn\">
\t\t\t\t\t\t\t\t<button class=\"btn btn-success\"><i class=\"fa fa-plus\"></i></button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div><!-- /.box (chat box) -->

\t\t\t\t<!-- TO DO List -->
\t\t\t\t<div class=\"box box-primary\">
\t\t\t\t\t<div class=\"box-header\">
\t\t\t\t\t\t<i class=\"ion ion-clipboard\"></i>
\t\t\t\t\t\t<h3 class=\"box-title\">To Do List</h3>
\t\t\t\t\t\t<div class=\"box-tools pull-right\">
\t\t\t\t\t\t\t<ul class=\"pagination pagination-sm inline\">
\t\t\t\t\t\t\t\t<li><a href=\"#\">&laquo;</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"#\">1</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"#\">2</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"#\">3</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"#\">&raquo;</a></li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div><!-- /.box-header -->
\t\t\t\t\t<div class=\"box-body\">
\t\t\t\t\t\t<ul class=\"todo-list\">
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<!-- drag handle -->
\t\t\t\t\t\t\t\t<span class=\"handle\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-ellipsis-v\"></i>
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-ellipsis-v\"></i>
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t<!-- checkbox -->
\t\t\t\t\t\t\t\t<input type=\"checkbox\" value=\"\" name=\"\">
\t\t\t\t\t\t\t\t<!-- todo text -->
\t\t\t\t\t\t\t\t<span class=\"text\">Design a nice theme</span>
\t\t\t\t\t\t\t\t<!-- Emphasis label -->
\t\t\t\t\t\t\t\t<small class=\"label label-danger\"><i class=\"fa fa-clock-o\"></i> 2 mins</small>
\t\t\t\t\t\t\t\t<!-- General tools such as edit or delete-->
\t\t\t\t\t\t\t\t<div class=\"tools\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-edit\"></i>
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-trash-o\"></i>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<span class=\"handle\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-ellipsis-v\"></i>
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-ellipsis-v\"></i>
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t<input type=\"checkbox\" value=\"\" name=\"\">
\t\t\t\t\t\t\t\t<span class=\"text\">Make the theme responsive</span>
\t\t\t\t\t\t\t\t<small class=\"label label-info\"><i class=\"fa fa-clock-o\"></i> 4 hours</small>
\t\t\t\t\t\t\t\t<div class=\"tools\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-edit\"></i>
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-trash-o\"></i>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<span class=\"handle\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-ellipsis-v\"></i>
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-ellipsis-v\"></i>
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t<input type=\"checkbox\" value=\"\" name=\"\">
\t\t\t\t\t\t\t\t<span class=\"text\">Let theme shine like a star</span>
\t\t\t\t\t\t\t\t<small class=\"label label-warning\"><i class=\"fa fa-clock-o\"></i> 1 day</small>
\t\t\t\t\t\t\t\t<div class=\"tools\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-edit\"></i>
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-trash-o\"></i>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<span class=\"handle\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-ellipsis-v\"></i>
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-ellipsis-v\"></i>
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t<input type=\"checkbox\" value=\"\" name=\"\">
\t\t\t\t\t\t\t\t<span class=\"text\">Let theme shine like a star</span>
\t\t\t\t\t\t\t\t<small class=\"label label-success\"><i class=\"fa fa-clock-o\"></i> 3 days</small>
\t\t\t\t\t\t\t\t<div class=\"tools\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-edit\"></i>
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-trash-o\"></i>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<span class=\"handle\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-ellipsis-v\"></i>
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-ellipsis-v\"></i>
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t<input type=\"checkbox\" value=\"\" name=\"\">
\t\t\t\t\t\t\t\t<span class=\"text\">Check your messages and notifications</span>
\t\t\t\t\t\t\t\t<small class=\"label label-primary\"><i class=\"fa fa-clock-o\"></i> 1 week</small>
\t\t\t\t\t\t\t\t<div class=\"tools\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-edit\"></i>
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-trash-o\"></i>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<span class=\"handle\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-ellipsis-v\"></i>
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-ellipsis-v\"></i>
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t<input type=\"checkbox\" value=\"\" name=\"\">
\t\t\t\t\t\t\t\t<span class=\"text\">Let theme shine like a star</span>
\t\t\t\t\t\t\t\t<small class=\"label label-default\"><i class=\"fa fa-clock-o\"></i> 1 month</small>
\t\t\t\t\t\t\t\t<div class=\"tools\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-edit\"></i>
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-trash-o\"></i>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</div><!-- /.box-body -->
\t\t\t\t\t<div class=\"box-footer clearfix no-border\">
\t\t\t\t\t\t<button class=\"btn btn-default pull-right\"><i class=\"fa fa-plus\"></i> Add item</button>
\t\t\t\t\t</div>
\t\t\t\t</div><!-- /.box -->

\t\t\t\t<!-- quick email widget -->
\t\t\t\t<div class=\"box box-info\">
\t\t\t\t\t<div class=\"box-header\">
\t\t\t\t\t\t<i class=\"fa fa-envelope\"></i>
\t\t\t\t\t\t<h3 class=\"box-title\">Quick Email</h3>
\t\t\t\t\t\t<!-- tools box -->
\t\t\t\t\t\t<div class=\"pull-right box-tools\">
\t\t\t\t\t\t\t<button class=\"btn btn-info btn-sm\" data-widget=\"remove\" data-toggle=\"tooltip\" title=\"Remove\"><i class=\"fa fa-times\"></i></button>
\t\t\t\t\t\t</div><!-- /. tools -->
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"box-body\">
\t\t\t\t\t\t<form action=\"#\" method=\"post\">
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<input type=\"email\" class=\"form-control\" name=\"emailto\" placeholder=\"Email to:\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"subject\" placeholder=\"Subject\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t<textarea class=\"textarea\" placeholder=\"Message\" style=\"width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;\"></textarea>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</form>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"box-footer clearfix\">
\t\t\t\t\t\t<button class=\"pull-right btn btn-default\" id=\"sendEmail\">Send <i class=\"fa fa-arrow-circle-right\"></i></button>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t</section><!-- /.Left col -->
\t\t\t<!-- right col (We are only adding the ID to make the widgets sortable)-->
\t\t\t<section class=\"col-lg-5 connectedSortable\">

\t\t\t\t<!-- Map box -->
\t\t\t\t<div class=\"box box-solid bg-light-blue-gradient\">
\t\t\t\t\t<div class=\"box-header\">
\t\t\t\t\t\t<!-- tools box -->
\t\t\t\t\t\t<div class=\"pull-right box-tools\">
\t\t\t\t\t\t\t<button class=\"btn btn-primary btn-sm daterange pull-right\" data-toggle=\"tooltip\" title=\"Date range\"><i class=\"fa fa-calendar\"></i></button>
\t\t\t\t\t\t\t<button class=\"btn btn-primary btn-sm pull-right\" data-widget=\"collapse\" data-toggle=\"tooltip\" title=\"Collapse\" style=\"margin-right: 5px;\"><i class=\"fa fa-minus\"></i></button>
\t\t\t\t\t\t</div><!-- /. tools -->

\t\t\t\t\t\t<i class=\"fa fa-map-marker\"></i>
\t\t\t\t\t\t<h3 class=\"box-title\">
\t\t\t\t\t\t\tVisitors
\t\t\t\t\t\t</h3>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"box-body\">
\t\t\t\t\t\t<div id=\"world-map\" style=\"height: 250px; width: 100%;\"></div>
\t\t\t\t\t</div><!-- /.box-body-->
\t\t\t\t\t<div class=\"box-footer no-border\">
\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t<div class=\"col-xs-4 text-center\" style=\"border-right: 1px solid #f4f4f4\">
\t\t\t\t\t\t\t\t<div id=\"sparkline-1\"></div>
\t\t\t\t\t\t\t\t<div class=\"knob-label\">Visitors</div>
\t\t\t\t\t\t\t</div><!-- ./col -->
\t\t\t\t\t\t\t<div class=\"col-xs-4 text-center\" style=\"border-right: 1px solid #f4f4f4\">
\t\t\t\t\t\t\t\t<div id=\"sparkline-2\"></div>
\t\t\t\t\t\t\t\t<div class=\"knob-label\">Online</div>
\t\t\t\t\t\t\t</div><!-- ./col -->
\t\t\t\t\t\t\t<div class=\"col-xs-4 text-center\">
\t\t\t\t\t\t\t\t<div id=\"sparkline-3\"></div>
\t\t\t\t\t\t\t\t<div class=\"knob-label\">Exists</div>
\t\t\t\t\t\t\t</div><!-- ./col -->
\t\t\t\t\t\t</div><!-- /.row -->
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<!-- /.box -->

\t\t\t\t<!-- solid sales graph -->
\t\t\t\t<div class=\"box box-solid bg-teal-gradient\">
\t\t\t\t\t<div class=\"box-header\">
\t\t\t\t\t\t<i class=\"fa fa-th\"></i>
\t\t\t\t\t\t<h3 class=\"box-title\">Sales Graph</h3>
\t\t\t\t\t\t<div class=\"box-tools pull-right\">
\t\t\t\t\t\t\t<button class=\"btn bg-teal btn-sm\" data-widget=\"collapse\"><i class=\"fa fa-minus\"></i></button>
\t\t\t\t\t\t\t<button class=\"btn bg-teal btn-sm\" data-widget=\"remove\"><i class=\"fa fa-times\"></i></button>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"box-body border-radius-none\">
\t\t\t\t\t\t<div class=\"chart\" id=\"line-chart\" style=\"height: 250px;\"></div>
\t\t\t\t\t</div><!-- /.box-body -->
\t\t\t\t\t<div class=\"box-footer no-border\">
\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t<div class=\"col-xs-4 text-center\" style=\"border-right: 1px solid #f4f4f4\">
\t\t\t\t\t\t\t\t<input type=\"text\" class=\"knob\" data-readonly=\"true\" value=\"20\" data-width=\"60\" data-height=\"60\" data-fgColor=\"#39CCCC\">
\t\t\t\t\t\t\t\t<div class=\"knob-label\">Mail-Orders</div>
\t\t\t\t\t\t\t</div><!-- ./col -->
\t\t\t\t\t\t\t<div class=\"col-xs-4 text-center\" style=\"border-right: 1px solid #f4f4f4\">
\t\t\t\t\t\t\t\t<input type=\"text\" class=\"knob\" data-readonly=\"true\" value=\"50\" data-width=\"60\" data-height=\"60\" data-fgColor=\"#39CCCC\">
\t\t\t\t\t\t\t\t<div class=\"knob-label\">Online</div>
\t\t\t\t\t\t\t</div><!-- ./col -->
\t\t\t\t\t\t\t<div class=\"col-xs-4 text-center\">
\t\t\t\t\t\t\t\t<input type=\"text\" class=\"knob\" data-readonly=\"true\" value=\"30\" data-width=\"60\" data-height=\"60\" data-fgColor=\"#39CCCC\">
\t\t\t\t\t\t\t\t<div class=\"knob-label\">In-Store</div>
\t\t\t\t\t\t\t</div><!-- ./col -->
\t\t\t\t\t\t</div><!-- /.row -->
\t\t\t\t\t</div><!-- /.box-footer -->
\t\t\t\t</div><!-- /.box -->

\t\t\t\t<!-- Calendar -->
\t\t\t\t<div class=\"box box-solid bg-green-gradient\">
\t\t\t\t\t<div class=\"box-header\">
\t\t\t\t\t\t<i class=\"fa fa-calendar\"></i>
\t\t\t\t\t\t<h3 class=\"box-title\">Calendar</h3>
\t\t\t\t\t\t<!-- tools box -->
\t\t\t\t\t\t<div class=\"pull-right box-tools\">
\t\t\t\t\t\t\t<!-- button with a dropdown -->
\t\t\t\t\t\t\t<div class=\"btn-group\">
\t\t\t\t\t\t\t\t<button class=\"btn btn-success btn-sm dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"fa fa-bars\"></i></button>
\t\t\t\t\t\t\t\t<ul class=\"dropdown-menu pull-right\" role=\"menu\">
\t\t\t\t\t\t\t\t\t<li><a href=\"#\">Add new event</a></li>
\t\t\t\t\t\t\t\t\t<li><a href=\"#\">Clear events</a></li>
\t\t\t\t\t\t\t\t\t<li class=\"divider\"></li>
\t\t\t\t\t\t\t\t\t<li><a href=\"#\">View calendar</a></li>
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<button class=\"btn btn-success btn-sm\" data-widget=\"collapse\"><i class=\"fa fa-minus\"></i></button>
\t\t\t\t\t\t\t<button class=\"btn btn-success btn-sm\" data-widget=\"remove\"><i class=\"fa fa-times\"></i></button>
\t\t\t\t\t\t</div><!-- /. tools -->
\t\t\t\t\t</div><!-- /.box-header -->
\t\t\t\t\t<div class=\"box-body no-padding\">
\t\t\t\t\t\t<!--The calendar -->
\t\t\t\t\t\t<div id=\"calendar\" style=\"width: 100%\"></div>
\t\t\t\t\t</div><!-- /.box-body -->
\t\t\t\t\t<div class=\"box-footer text-black\">
\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t\t<!-- Progress bars -->
\t\t\t\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t\t\t\t<span class=\"pull-left\">Task #1</span>
\t\t\t\t\t\t\t\t\t<small class=\"pull-right\">90%</small>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"progress xs\">
\t\t\t\t\t\t\t\t\t<div class=\"progress-bar progress-bar-green\" style=\"width: 90%;\"></div>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t\t\t\t<span class=\"pull-left\">Task #2</span>
\t\t\t\t\t\t\t\t\t<small class=\"pull-right\">70%</small>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"progress xs\">
\t\t\t\t\t\t\t\t\t<div class=\"progress-bar progress-bar-green\" style=\"width: 70%;\"></div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div><!-- /.col -->
\t\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t\t\t\t<span class=\"pull-left\">Task #3</span>
\t\t\t\t\t\t\t\t\t<small class=\"pull-right\">60%</small>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"progress xs\">
\t\t\t\t\t\t\t\t\t<div class=\"progress-bar progress-bar-green\" style=\"width: 60%;\"></div>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t\t\t\t<span class=\"pull-left\">Task #4</span>
\t\t\t\t\t\t\t\t\t<small class=\"pull-right\">40%</small>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"progress xs\">
\t\t\t\t\t\t\t\t\t<div class=\"progress-bar progress-bar-green\" style=\"width: 40%;\"></div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div><!-- /.col -->
\t\t\t\t\t\t</div><!-- /.row -->
\t\t\t\t\t</div>
\t\t\t\t</div><!-- /.box -->

\t\t\t</section><!-- right col -->
\t\t</div><!-- /.row (main row) -->

\t</section><!-- /.content -->
";
    }

    public function getTemplateName()
    {
        return "/index/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "template/admin-template.html" %}*/
/* */
/* {% block content %}*/
/*     <!-- Content Header (Page header) -->*/
/* 	<section class="content-header">*/
/* 		<h1>*/
/* 			Dashboard*/
/* 			<small>Control panel</small>*/
/* 		</h1>*/
/* 		<ol class="breadcrumb">*/
/* 			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>*/
/* 			<li class="active">Dashboard</li>*/
/* 		</ol>*/
/* 	</section>*/
/* */
/* 	<!-- Main content -->*/
/* 	<section class="content">*/
/* 		<!-- Small boxes (Stat box) -->*/
/* 		<div class="row">*/
/* 			<div class="col-lg-3 col-xs-6">*/
/* 				<!-- small box -->*/
/* 				<div class="small-box bg-aqua">*/
/* 					<div class="inner">*/
/* 						<h3>150</h3>*/
/* 						<p>New Orders</p>*/
/* 					</div>*/
/* 					<div class="icon">*/
/* 						<i class="ion ion-bag"></i>*/
/* 					</div>*/
/* 					<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>*/
/* 				</div>*/
/* 			</div><!-- ./col -->*/
/* 			<div class="col-lg-3 col-xs-6">*/
/* 				<!-- small box -->*/
/* 				<div class="small-box bg-green">*/
/* 					<div class="inner">*/
/* 						<h3>53<sup style="font-size: 20px">%</sup></h3>*/
/* 						<p>Bounce Rate</p>*/
/* 					</div>*/
/* 					<div class="icon">*/
/* 						<i class="ion ion-stats-bars"></i>*/
/* 					</div>*/
/* 					<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>*/
/* 				</div>*/
/* 			</div><!-- ./col -->*/
/* 			<div class="col-lg-3 col-xs-6">*/
/* 				<!-- small box -->*/
/* 				<div class="small-box bg-yellow">*/
/* 					<div class="inner">*/
/* 						<h3>44</h3>*/
/* 						<p>User Registrations</p>*/
/* 					</div>*/
/* 					<div class="icon">*/
/* 						<i class="ion ion-person-add"></i>*/
/* 					</div>*/
/* 					<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>*/
/* 				</div>*/
/* 			</div><!-- ./col -->*/
/* 			<div class="col-lg-3 col-xs-6">*/
/* 				<!-- small box -->*/
/* 				<div class="small-box bg-red">*/
/* 					<div class="inner">*/
/* 						<h3>65</h3>*/
/* 						<p>Unique Visitors</p>*/
/* 					</div>*/
/* 					<div class="icon">*/
/* 						<i class="ion ion-pie-graph"></i>*/
/* 					</div>*/
/* 					<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>*/
/* 				</div>*/
/* 			</div><!-- ./col -->*/
/* 		</div><!-- /.row -->*/
/* 		<!-- Main row -->*/
/* 		<div class="row">*/
/* 			<!-- Left col -->*/
/* 			<section class="col-lg-7 connectedSortable">*/
/* 				<!-- Custom tabs (Charts with tabs)-->*/
/* 				<div class="nav-tabs-custom">*/
/* 					<!-- Tabs within a box -->*/
/* 					<ul class="nav nav-tabs pull-right">*/
/* 						<li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>*/
/* 						<li><a href="#sales-chart" data-toggle="tab">Donut</a></li>*/
/* 						<li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>*/
/* 					</ul>*/
/* 					<div class="tab-content no-padding">*/
/* 						<!-- Morris chart - Sales -->*/
/* 						<div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>*/
/* 						<div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>*/
/* 					</div>*/
/* 				</div><!-- /.nav-tabs-custom -->*/
/* */
/* 				<!-- Chat box -->*/
/* 				<div class="box box-success">*/
/* 					<div class="box-header">*/
/* 						<i class="fa fa-comments-o"></i>*/
/* 						<h3 class="box-title">Chat</h3>*/
/* 						<div class="box-tools pull-right" data-toggle="tooltip" title="Status">*/
/* 							<div class="btn-group" data-toggle="btn-toggle" >*/
/* 								<button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i></button>*/
/* 								<button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>*/
/* 							</div>*/
/* 						</div>*/
/* 					</div>*/
/* 					<div class="box-body chat" id="chat-box">*/
/* 						<!-- chat item -->*/
/* 						<div class="item">*/
/* 							<img src="/mercury/assets/images/user4-128x128.jpg" alt="user image" class="online">*/
/* 							<p class="message">*/
/* 								<a href="#" class="name">*/
/* 									<small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>*/
/* 									Mike Doe*/
/* 								</a>*/
/* 								I would like to meet you to discuss the latest news about*/
/* 								the arrival of the new theme. They say it is going to be one the*/
/* 								best themes on the market*/
/* 							</p>*/
/* 							<div class="attachment">*/
/* 								<h4>Attachments:</h4>*/
/* 								<p class="filename">*/
/* 									Theme-thumbnail-image.jpg*/
/* 								</p>*/
/* 								<div class="pull-right">*/
/* 									<button class="btn btn-primary btn-sm btn-flat">Open</button>*/
/* 								</div>*/
/* 							</div><!-- /.attachment -->*/
/* 						</div><!-- /.item -->*/
/* 						<!-- chat item -->*/
/* 						<div class="item">*/
/* 							<img src="/mercury/assets/images/user3-128x128.jpg" alt="user image" class="offline">*/
/* 							<p class="message">*/
/* 								<a href="#" class="name">*/
/* 									<small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>*/
/* 									Alexander Pierce*/
/* 								</a>*/
/* 								I would like to meet you to discuss the latest news about*/
/* 								the arrival of the new theme. They say it is going to be one the*/
/* 								best themes on the market*/
/* 							</p>*/
/* 						</div><!-- /.item -->*/
/* 						<!-- chat item -->*/
/* 						<div class="item">*/
/* 							<img src="/mercury/assets/images/user2-160x160.jpg" alt="user image" class="offline">*/
/* 							<p class="message">*/
/* 								<a href="#" class="name">*/
/* 									<small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>*/
/* 									Susan Doe*/
/* 								</a>*/
/* 								I would like to meet you to discuss the latest news about*/
/* 								the arrival of the new theme. They say it is going to be one the*/
/* 								best themes on the market*/
/* 							</p>*/
/* 						</div><!-- /.item -->*/
/* 					</div><!-- /.chat -->*/
/* 					<div class="box-footer">*/
/* 						<div class="input-group">*/
/* 							<input class="form-control" placeholder="Type message...">*/
/* 							<div class="input-group-btn">*/
/* 								<button class="btn btn-success"><i class="fa fa-plus"></i></button>*/
/* 							</div>*/
/* 						</div>*/
/* 					</div>*/
/* 				</div><!-- /.box (chat box) -->*/
/* */
/* 				<!-- TO DO List -->*/
/* 				<div class="box box-primary">*/
/* 					<div class="box-header">*/
/* 						<i class="ion ion-clipboard"></i>*/
/* 						<h3 class="box-title">To Do List</h3>*/
/* 						<div class="box-tools pull-right">*/
/* 							<ul class="pagination pagination-sm inline">*/
/* 								<li><a href="#">&laquo;</a></li>*/
/* 								<li><a href="#">1</a></li>*/
/* 								<li><a href="#">2</a></li>*/
/* 								<li><a href="#">3</a></li>*/
/* 								<li><a href="#">&raquo;</a></li>*/
/* 							</ul>*/
/* 						</div>*/
/* 					</div><!-- /.box-header -->*/
/* 					<div class="box-body">*/
/* 						<ul class="todo-list">*/
/* 							<li>*/
/* 								<!-- drag handle -->*/
/* 								<span class="handle">*/
/* 									<i class="fa fa-ellipsis-v"></i>*/
/* 									<i class="fa fa-ellipsis-v"></i>*/
/* 								</span>*/
/* 								<!-- checkbox -->*/
/* 								<input type="checkbox" value="" name="">*/
/* 								<!-- todo text -->*/
/* 								<span class="text">Design a nice theme</span>*/
/* 								<!-- Emphasis label -->*/
/* 								<small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>*/
/* 								<!-- General tools such as edit or delete-->*/
/* 								<div class="tools">*/
/* 									<i class="fa fa-edit"></i>*/
/* 									<i class="fa fa-trash-o"></i>*/
/* 								</div>*/
/* 							</li>*/
/* 							<li>*/
/* 								<span class="handle">*/
/* 									<i class="fa fa-ellipsis-v"></i>*/
/* 									<i class="fa fa-ellipsis-v"></i>*/
/* 								</span>*/
/* 								<input type="checkbox" value="" name="">*/
/* 								<span class="text">Make the theme responsive</span>*/
/* 								<small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>*/
/* 								<div class="tools">*/
/* 									<i class="fa fa-edit"></i>*/
/* 									<i class="fa fa-trash-o"></i>*/
/* 								</div>*/
/* 							</li>*/
/* 							<li>*/
/* 								<span class="handle">*/
/* 									<i class="fa fa-ellipsis-v"></i>*/
/* 									<i class="fa fa-ellipsis-v"></i>*/
/* 								</span>*/
/* 								<input type="checkbox" value="" name="">*/
/* 								<span class="text">Let theme shine like a star</span>*/
/* 								<small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>*/
/* 								<div class="tools">*/
/* 									<i class="fa fa-edit"></i>*/
/* 									<i class="fa fa-trash-o"></i>*/
/* 								</div>*/
/* 							</li>*/
/* 							<li>*/
/* 								<span class="handle">*/
/* 									<i class="fa fa-ellipsis-v"></i>*/
/* 									<i class="fa fa-ellipsis-v"></i>*/
/* 								</span>*/
/* 								<input type="checkbox" value="" name="">*/
/* 								<span class="text">Let theme shine like a star</span>*/
/* 								<small class="label label-success"><i class="fa fa-clock-o"></i> 3 days</small>*/
/* 								<div class="tools">*/
/* 									<i class="fa fa-edit"></i>*/
/* 									<i class="fa fa-trash-o"></i>*/
/* 								</div>*/
/* 							</li>*/
/* 							<li>*/
/* 								<span class="handle">*/
/* 									<i class="fa fa-ellipsis-v"></i>*/
/* 									<i class="fa fa-ellipsis-v"></i>*/
/* 								</span>*/
/* 								<input type="checkbox" value="" name="">*/
/* 								<span class="text">Check your messages and notifications</span>*/
/* 								<small class="label label-primary"><i class="fa fa-clock-o"></i> 1 week</small>*/
/* 								<div class="tools">*/
/* 									<i class="fa fa-edit"></i>*/
/* 									<i class="fa fa-trash-o"></i>*/
/* 								</div>*/
/* 							</li>*/
/* 							<li>*/
/* 								<span class="handle">*/
/* 									<i class="fa fa-ellipsis-v"></i>*/
/* 									<i class="fa fa-ellipsis-v"></i>*/
/* 								</span>*/
/* 								<input type="checkbox" value="" name="">*/
/* 								<span class="text">Let theme shine like a star</span>*/
/* 								<small class="label label-default"><i class="fa fa-clock-o"></i> 1 month</small>*/
/* 								<div class="tools">*/
/* 									<i class="fa fa-edit"></i>*/
/* 									<i class="fa fa-trash-o"></i>*/
/* 								</div>*/
/* 							</li>*/
/* 						</ul>*/
/* 					</div><!-- /.box-body -->*/
/* 					<div class="box-footer clearfix no-border">*/
/* 						<button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>*/
/* 					</div>*/
/* 				</div><!-- /.box -->*/
/* */
/* 				<!-- quick email widget -->*/
/* 				<div class="box box-info">*/
/* 					<div class="box-header">*/
/* 						<i class="fa fa-envelope"></i>*/
/* 						<h3 class="box-title">Quick Email</h3>*/
/* 						<!-- tools box -->*/
/* 						<div class="pull-right box-tools">*/
/* 							<button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>*/
/* 						</div><!-- /. tools -->*/
/* 					</div>*/
/* 					<div class="box-body">*/
/* 						<form action="#" method="post">*/
/* 							<div class="form-group">*/
/* 								<input type="email" class="form-control" name="emailto" placeholder="Email to:">*/
/* 							</div>*/
/* 							<div class="form-group">*/
/* 								<input type="text" class="form-control" name="subject" placeholder="Subject">*/
/* 							</div>*/
/* 							<div>*/
/* 								<textarea class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>*/
/* 							</div>*/
/* 						</form>*/
/* 					</div>*/
/* 					<div class="box-footer clearfix">*/
/* 						<button class="pull-right btn btn-default" id="sendEmail">Send <i class="fa fa-arrow-circle-right"></i></button>*/
/* 					</div>*/
/* 				</div>*/
/* */
/* 			</section><!-- /.Left col -->*/
/* 			<!-- right col (We are only adding the ID to make the widgets sortable)-->*/
/* 			<section class="col-lg-5 connectedSortable">*/
/* */
/* 				<!-- Map box -->*/
/* 				<div class="box box-solid bg-light-blue-gradient">*/
/* 					<div class="box-header">*/
/* 						<!-- tools box -->*/
/* 						<div class="pull-right box-tools">*/
/* 							<button class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="Date range"><i class="fa fa-calendar"></i></button>*/
/* 							<button class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>*/
/* 						</div><!-- /. tools -->*/
/* */
/* 						<i class="fa fa-map-marker"></i>*/
/* 						<h3 class="box-title">*/
/* 							Visitors*/
/* 						</h3>*/
/* 					</div>*/
/* 					<div class="box-body">*/
/* 						<div id="world-map" style="height: 250px; width: 100%;"></div>*/
/* 					</div><!-- /.box-body-->*/
/* 					<div class="box-footer no-border">*/
/* 						<div class="row">*/
/* 							<div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">*/
/* 								<div id="sparkline-1"></div>*/
/* 								<div class="knob-label">Visitors</div>*/
/* 							</div><!-- ./col -->*/
/* 							<div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">*/
/* 								<div id="sparkline-2"></div>*/
/* 								<div class="knob-label">Online</div>*/
/* 							</div><!-- ./col -->*/
/* 							<div class="col-xs-4 text-center">*/
/* 								<div id="sparkline-3"></div>*/
/* 								<div class="knob-label">Exists</div>*/
/* 							</div><!-- ./col -->*/
/* 						</div><!-- /.row -->*/
/* 					</div>*/
/* 				</div>*/
/* 				<!-- /.box -->*/
/* */
/* 				<!-- solid sales graph -->*/
/* 				<div class="box box-solid bg-teal-gradient">*/
/* 					<div class="box-header">*/
/* 						<i class="fa fa-th"></i>*/
/* 						<h3 class="box-title">Sales Graph</h3>*/
/* 						<div class="box-tools pull-right">*/
/* 							<button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>*/
/* 							<button class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>*/
/* 						</div>*/
/* 					</div>*/
/* 					<div class="box-body border-radius-none">*/
/* 						<div class="chart" id="line-chart" style="height: 250px;"></div>*/
/* 					</div><!-- /.box-body -->*/
/* 					<div class="box-footer no-border">*/
/* 						<div class="row">*/
/* 							<div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">*/
/* 								<input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgColor="#39CCCC">*/
/* 								<div class="knob-label">Mail-Orders</div>*/
/* 							</div><!-- ./col -->*/
/* 							<div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">*/
/* 								<input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgColor="#39CCCC">*/
/* 								<div class="knob-label">Online</div>*/
/* 							</div><!-- ./col -->*/
/* 							<div class="col-xs-4 text-center">*/
/* 								<input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgColor="#39CCCC">*/
/* 								<div class="knob-label">In-Store</div>*/
/* 							</div><!-- ./col -->*/
/* 						</div><!-- /.row -->*/
/* 					</div><!-- /.box-footer -->*/
/* 				</div><!-- /.box -->*/
/* */
/* 				<!-- Calendar -->*/
/* 				<div class="box box-solid bg-green-gradient">*/
/* 					<div class="box-header">*/
/* 						<i class="fa fa-calendar"></i>*/
/* 						<h3 class="box-title">Calendar</h3>*/
/* 						<!-- tools box -->*/
/* 						<div class="pull-right box-tools">*/
/* 							<!-- button with a dropdown -->*/
/* 							<div class="btn-group">*/
/* 								<button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>*/
/* 								<ul class="dropdown-menu pull-right" role="menu">*/
/* 									<li><a href="#">Add new event</a></li>*/
/* 									<li><a href="#">Clear events</a></li>*/
/* 									<li class="divider"></li>*/
/* 									<li><a href="#">View calendar</a></li>*/
/* 								</ul>*/
/* 							</div>*/
/* 							<button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>*/
/* 							<button class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>*/
/* 						</div><!-- /. tools -->*/
/* 					</div><!-- /.box-header -->*/
/* 					<div class="box-body no-padding">*/
/* 						<!--The calendar -->*/
/* 						<div id="calendar" style="width: 100%"></div>*/
/* 					</div><!-- /.box-body -->*/
/* 					<div class="box-footer text-black">*/
/* 						<div class="row">*/
/* 							<div class="col-sm-6">*/
/* 								<!-- Progress bars -->*/
/* 								<div class="clearfix">*/
/* 									<span class="pull-left">Task #1</span>*/
/* 									<small class="pull-right">90%</small>*/
/* 								</div>*/
/* 								<div class="progress xs">*/
/* 									<div class="progress-bar progress-bar-green" style="width: 90%;"></div>*/
/* 								</div>*/
/* */
/* 								<div class="clearfix">*/
/* 									<span class="pull-left">Task #2</span>*/
/* 									<small class="pull-right">70%</small>*/
/* 								</div>*/
/* 								<div class="progress xs">*/
/* 									<div class="progress-bar progress-bar-green" style="width: 70%;"></div>*/
/* 								</div>*/
/* 							</div><!-- /.col -->*/
/* 							<div class="col-sm-6">*/
/* 								<div class="clearfix">*/
/* 									<span class="pull-left">Task #3</span>*/
/* 									<small class="pull-right">60%</small>*/
/* 								</div>*/
/* 								<div class="progress xs">*/
/* 									<div class="progress-bar progress-bar-green" style="width: 60%;"></div>*/
/* 								</div>*/
/* */
/* 								<div class="clearfix">*/
/* 									<span class="pull-left">Task #4</span>*/
/* 									<small class="pull-right">40%</small>*/
/* 								</div>*/
/* 								<div class="progress xs">*/
/* 									<div class="progress-bar progress-bar-green" style="width: 40%;"></div>*/
/* 								</div>*/
/* 							</div><!-- /.col -->*/
/* 						</div><!-- /.row -->*/
/* 					</div>*/
/* 				</div><!-- /.box -->*/
/* */
/* 			</section><!-- right col -->*/
/* 		</div><!-- /.row (main row) -->*/
/* */
/* 	</section><!-- /.content -->*/
/* {% endblock %}*/
/* */
/* */
