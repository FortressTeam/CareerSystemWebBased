<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Career System: Something';
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- BEGIN META -->
    <?= $this->Html->charset() ?>
    <title>
        <?= $this->fetch('title') ?> - 
        <?= $cakeDescription ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">

    <!-- BEGIN STYLESHEETS -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,300,400,600,700,800' rel='stylesheet' type='text/css'/>
    <?= $this->Html->css('theme/bootstrap') ?>
    <?= $this->Html->css('theme/materialadmin') ?>
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css') ?>
    <?= $this->Html->css('theme/font-awesome.min') ?><!--Font Awesome Icon Font-->
    <?= $this->Html->css('theme/material-design-iconic-font.min') ?><!--Material Design Iconic Font-->
    <?= $this->Html->css('theme/animate') ?>
    
    <!-- Additional CSS includes -->
    <?= $this->Html->css('common') ?>
    <?= $this->Html->script('libs/jquery/jquery-1.11.2.min') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="assets/js/libs/utils/html5shiv.js"></script>
    <script type="text/javascript" src="assets/js/libs/utils/respond.min.js"></script>
    <![endif]-->
</head>
<body class="menubar-hoverable header-fixed menubar-pin menubar-visible">

    <!-- BEGIN HEADER-->
    <header id="header">
        <div class="headerbar">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="headerbar-left">
                <ul class="header-nav header-nav-options" id="headerControl">
                    <li class="hidden-lg" id="menubarToggleButton">
                        <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>
                    <li class="header-nav-brand">
                        <div class="brand-holder">
                            <?= $this->Html->link(
                                $this->Html->image('logo_website.png') . 
                                '<span class="text-lg text-bold text-primary website_name">CAREER SYSTEM</span>',
                                ['controller' => '/'],
                                ['escape' => false])
                            ?>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="headerbar-right">
                <ul class="header-nav header-nav-options">
                    <li>
                        <!-- Search form -->
                        <form class="navbar-search" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" name="headerSearch" placeholder="Enter your keyword">
                            </div>
                            <button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
                        </form>
                    </li>
                </ul><!--end .header-nav-options -->

                <ul class="header-nav header-nav-toggle" id="headerToggle">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-bell"></i><sup class="badge style-danger">4</sup>
                        </a>
                        <ul class="dropdown-menu animation-expand">
                            <li class="dropdown-header">Today's messages</li>
                            <li>
                                <a class="alert alert-callout alert-info" href="javascript:void(0);">
                                    <?= $this->Html->image('company_img/1.jpg', ['alt' => 'Vic', 'class' => 'pull-right img-circle dropdown-avatar']) ?>
                                    <strong>Alicia Adell</strong><br>
                                    <small>Reviewing last changes...</small>
                                </a>
                            </li>
                            <li><a href="#">Mark as read <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
                        </ul><!--end .dropdown-menu -->
                    </li><!--end .dropdown -->
                </ul><!--end .header-nav-toggle -->

                <ul class="header-nav header-nav-profile" id="headerProfile">
                    <li class="dropdown animated fadeInRight">
                        <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                            <?= $this->Html->image('avatar.jpg', ['alt' => 'Vic']) ?>
                            <span class="profile-info">Vien<small>Developer</small></span>
                        </a>
                        <ul class="dropdown-menu animation-dock">
                            <li>
                                <a href="#">My profile</a>
                            </li>
                            <li>
                                <a href="#">My appointments</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-power-off text-danger"></i>Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul><!--end .header-nav-profile -->
            </div><!--end #header-navbar-collapse -->
        </div>
    </header>
    <!-- END HEADER-->

    <!-- BEGIN BASE-->
    <div id="base">

        <!-- BEGIN CONTENT-->
        <div id="content">

            <!-- BEGIN LIST SAMPLES -->
            <section>
                <div class="section-body contain-lg">
                    <?= $this->Flash->render() ?>
                    <?= $this->fetch('content') ?>
                </div><!--end .section-body -->
            </section>
        </div><!--end #content-->
        <!-- END CONTENT -->

        <!-- BEGIN MENU BAR -->
        <div id="menubar" class="menubar-inverse animate">
            <div class="menubar-fixed-panel">
                <div>
                    <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
                <div class="expanded">
                    <a href="html/dashboards/dashboard.html">
                        <span class="text-lg text-bold text-primary ">CAREER SYSTEM</span>
                    </a>
                </div>
            </div>
            <div class="menubar-scroll-panel">
                    <ul id="main-menu" class="gui-controls">
                        <li>
                            <div class="row">
                                <div class="col-xs-6 col-xs-offset-3">
                                    <?= $this->Html->image('avatar.jpg', ['alt' => 'Vic', 'class' => 'img-circle border-white border-xl img-responsive']) ?>
                                    <!-- <img class="img-circle border-white border-xl img-responsive" src="img/avatar.jpg" alt=""> -->
                                </div>
                            </div>
                        </li><!--end /menu-li -->
                        <li>
                            <div class="row">
                                <button class="btn ink-reaction btn-raised btn-primary col-xs-12">Jobs</button>
                            </div>
                        </li><!--end /menu-li -->
                        <li>
                            <a href="#">
                                <div class="gui-icon"><i class="fa fa-search"></i></div>
                                <span class="title">Search company</span>
                            </a>
                        </li><!--end /menu-li -->
                        <li>
                            <a href="#">
                                <div class="gui-icon"><i class="fa fa-line-chart"></i></div>
                                <span class="title">Activity</span>
                            </a>
                        </li><!--end /menu-li -->
                        <li>
                            <a href="#">
                                <div class="gui-icon"><i class="fa fa-rss"></i></div>
                                <span class="title">News feed</span>
                            </a>
                        </li><!--end /menu-li -->
                        <li>
                            <a href="#">
                                <div class="gui-icon"><i class="fa fa-file"></i></div>
                                <span class="title">My CVs</span>
                            </a>
                        </li><!--end /menu-li -->
                        <li>
                            <a href="#">
                                <div class="gui-icon"><i class="fa fa-bell"></i></div>
                                <span class="title">Notifications</span>
                                <span class="badge style-danger pull-right">6</span>
                            </a>
                        </li><!--end /menu-li -->
                    </ul><!--end .main-menu -->
                </div>
        </div><!-- end #menubar -->
        <!-- END MENU BAR -->


    </div><!--end #base-->
    <!-- END BASE -->

    <a class="usabilla-feedback-bar" href="#"  data-toggle="modal" data-target="#simpleModal" data-url="<?= $this->Url->build(["controller" => "feedbacks","action" => "add"]); ?>" id="usabilla-feedback-bar">Feedback</a>
    <div class="modal fade" id="simpleModal" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="simpleModalLabel">Feedback</h4>
                    <p>Please tell us what do you think, any kind of feedback is highly appreciated.</p>
                </div>
                <div class="modal-body" id="contentFeedback">
                    
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <span id="webInfo" data-url="<?= $this->Url->build(["controller" => "/"]); ?>"></span>


    <!-- BEGIN JAVASCRIPT -->
    <?= $this->Html->script('libs/jquery/jquery-migrate-1.2.1.min') ?>
    <?= $this->Html->script('libs/bootstrap/bootstrap.min') ?>
    <?= $this->Html->script('libs/nanoscroller/jquery.nanoscroller.min') ?>
    
    <!-- Put App.js last in your javascript imports -->
    <?= $this->Html->script('main') ?>
    <?= $this->Html->script('form') ?>
    <?= $this->Html->script('app.min') ?>
</body>
</html>
