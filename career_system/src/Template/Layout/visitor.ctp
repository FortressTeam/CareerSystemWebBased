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
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
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
    <?= $this->Html->css('theme/font-awesome.min') ?><!--Font Awesome Icon Font-->
    <?= $this->Html->css('theme/material-design-iconic-font.min') ?><!--Material Design Iconic Font-->
    <?= $this->Html->css('theme/animate') ?>
    
    <!-- Additional CSS includes -->
    <?= $this->Html->css('common') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="assets/js/libs/utils/html5shiv.js"></script>
    <script type="text/javascript" src="assets/js/libs/utils/respond.min.js"></script>
    <![endif]-->
</head>
<body class="header-fixed header-moveable">

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
                            <a href="#">
                                <span class="text-lg text-bold text-primary">CAREER SYSTEM</span>
                            </a>
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
                                    <?= $this->Html->image('company.jpg', ['alt' => 'Vic', 'class' => 'pull-right img-circle dropdown-avatar']) ?>
                                    <strong>Alicia Adell</strong><br>
                                    <small>Reviewing last changes...</small>
                                </a>
                            </li>
                            <li><a href="#">Mark as read <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
                        </ul><!--end .dropdown-menu -->
                    </li><!--end .dropdown -->
                </ul><!--end .header-nav-toggle -->

                <ul class="header-nav header-nav-profile" id="headerProfile">
                    <li id="signupButton">
                        <button type="button" class="btn ink-reaction btn-raised btn-default">SIGN UP</button>
                    </li>
                    <li id="hiringmanagerButton">
                        <button type="button" class="btn ink-reaction btn-raised btn-primary">FOR HIRING MANAGERS</button>
                    </li>
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

    <!-- BEGIN HOME SEARCH-->
    <section id="home" class="padd-0">
        <div class="sec-overlay">
            <div class="container home-inner">
                <div class="card col-sm-6 col-sm-offset-3" id="searchCard">
                    <div class="card-body">
                        <h1>Something here</h1>
                        <h4>Something here</h4>
                        <div class="form-group has-primary">
                            <input type="text" class="form-control" id="inputSearch" placeholder="Enter keyword to search">
                            <label for="regular"></label>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <div class="btn-group">
                                    <button type="button" class="btn ink-reaction btn-raised btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        Category <i class="fa fa-caret-down"></i>
                                    </button>
                                    <ul class="dropdown-menu animation-expand" role="menu">
                                        <li><a href="#">Add</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#"><i class="fa fa-fw fa-times text-danger"></i> Remove item</a></li>
                                    </ul>
                                </div>
                            </div> 
                            <!-- Category Button -->
                            <div class="col-xs-6">
                                <div class="btn-group">
                                    <button type="button" class="btn ink-reaction btn-raised btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        Location <i class="fa fa-caret-down"></i>
                                    </button>
                                    <ul class="dropdown-menu animation-expand" role="menu">
                                        <li><a href="#">Add</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#"><i class="fa fa-fw fa-times text-danger"></i> Remove item</a></li>
                                    </ul>
                                </div>
                            </div> 
                            <!-- Location Button -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- .container end -->
        </div>
    </section>
    <!-- END HOME SEARCH-->

    <!-- BEGIN BASE-->
    <div id="base">

        <!-- BEGIN CONTENT-->
        <div id="content">

            <!-- BEGIN LIST SAMPLES -->
            <section>
                <div class="section-body contain-lg">
                    <div class="card">
                        <div class="card-head">
                            <header><?= $this->fetch('title') ?></header>
                        </div>
                    </div>
                    <?= $this->Flash->render() ?>
                    <?= $this->fetch('content') ?>
                </div><!--end .section-body -->
            </section>
        </div><!--end #content-->
        <!-- END CONTENT -->


    </div><!--end #base-->
    <!-- END BASE -->



    <!-- BEGIN JAVASCRIPT -->
    <?= $this->Html->script('libs/jquery/jquery-1.11.2.min') ?>
    <?= $this->Html->script('libs/jquery/jquery-migrate-1.2.1.min') ?>
    <?= $this->Html->script('libs/bootstrap/bootstrap.min') ?>
    <?= $this->Html->script('libs/nanoscroller/jquery.nanoscroller.min') ?>
    
    <!-- Put App.js last in your javascript imports -->
    <?= $this->Html->script('main') ?>
    <?= $this->Html->script('app.min') ?>
</body>
</html>
