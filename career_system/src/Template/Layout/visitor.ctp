<!DOCTYPE html>
<html lang="en">
<head>

    <!-- BEGIN META -->
    <?= $this->Html->charset() ?>
    <title> Career System </title>
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

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="assets/js/libs/utils/html5shiv.js"></script>
    <script type="text/javascript" src="assets/js/libs/utils/respond.min.js"></script>
    <![endif]-->
</head>
<body class="header-fixed non-side-bar">

    <!-- BEGIN HEADER-->
    <header id="header">
        <div class="headerbar">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="headerbar-left">
                <ul class="header-nav header-nav-options" id="headerControl">
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
                            <button type="submit" class="btn btn-icon-toggle ink-reaction btn-sm"><i class="fa fa-search"></i></button>
                        </form>
                    </li>
                </ul><!--end .header-nav-options -->

                <ul class="header-nav header-nav-profile" id="headerProfile">
                    <li id="signupButton">
                        <button type="button" class="btn ink-reaction btn-raised btn-sm btn-default">SIGN UP</button>
                    </li>
                    <li id="hiringmanagerButton">
                        <button type="button" class="btn ink-reaction btn-raised btn-sm btn-primary">FOR HIRING MANAGERS</button>
                    </li>
                </ul><!--end .header-nav-profile -->

                <ul class="header-nav header-nav-toggle" id="headerToggle">
                    <li id="signinButton">
                        <button type="button" class="btn btn-block ink-reaction btn-flat btn-sm btn-primary">SIGN IN</button>
                    </li>
                </ul><!--end .header-nav-toggle -->
            </div><!--end #header-navbar-collapse -->
        </div>
    </header>
    <!-- END HEADER-->

    <!-- BEGIN BASE-->
    <div id="   ">

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


    </div><!--end #base-->
    <!-- END BASE -->

    <!-- START POPULAR SEARCHES -->
    <section id="popular-searches" class="no-padding">
        <div class="popular-searches-inner section-inner">
            <div class="row row-centered no-margin">
                <div class="col-sm-9 col-centered left-align">
                    <h1>Popular job searches</h1>
                </div>
                <div class="col-sm-3 col-centered left-align top-vertical-align">
                    <h2>By category</h2>
                    <div class="contain">
                        <a href="#" class="tag label label-primary">something</a>
                        <a href="#" class="tag label label-primary">something</a>
                        <a href="#" class="tag label label-primary">something</a>
                        <a href="#" class="tag label label-primary">something</a>
                        <a href="#" class="tag label label-primary">something</a>
                        <a href="#" class="tag label label-primary">something</a>
                        <a href="#" class="tag label label-primary">something</a>
                    </div>
                </div>
                <div class="col-sm-3 col-centered left-align top-vertical-align">
                    <h2>By city</h2>
                    <div class="contain">
                        <a href="#" class="tag label label-primary">something</a>
                        <a href="#" class="tag label label-primary">something</a>
                        <a href="#" class="tag label label-primary">something</a>
                        <a href="#" class="tag label label-primary">something</a>
                        <a href="#" class="tag label label-primary">something</a>
                        <a href="#" class="tag label label-primary">something</a>
                        <a href="#" class="tag label label-primary">something</a>
                        <a href="#" class="tag label label-primary">something</a>
                        <a href="#" class="tag label label-primary">something</a>
                        <a href="#" class="tag label label-primary">something</a>
                        <a href="#" class="tag label label-primary">something</a>
                        <a href="#" class="tag label label-primary">something</a>
                        <a href="#" class="tag label label-primary">something</a>
                    </div>
                </div>
                <div class="col-sm-3 col-centered left-align top-vertical-align">
                    <h2>By company</h2>
                    <div class="contain">
                        <a href="#" class="tag label label-primary">something</a>
                        <a href="#" class="tag label label-primary">something</a>
                        <a href="#" class="tag label label-primary">something</a>
                        <a href="#" class="tag label label-primary">something</a>
                        <a href="#" class="tag label label-primary">something</a>
                        <a href="#" class="tag label label-primary">something</a>
                        <a href="#" class="tag label label-primary">something</a>
                        <a href="#" class="tag label label-primary">something</a>
                        <a href="#" class="tag label label-primary">something</a>
                    </div>
                    <div class=""></div>
                </div>
            </div>
            <div class="row row-centered no-margin">
                <div class="col-sm-3 col-centered left-align">
                    <button class="btn ink-reaction btn-flat btn-primary">
                        <i class="fa fa-tags"></i> Browse all categories
                    </button>
                </div>
                <div class="col-sm-3 col-centered left-align">
                    <button class="btn ink-reaction btn-flat btn-primary">
                        <i class="fa fa-map-marker"></i> Browse all cities
                    </button>
                </div>
                <div class="col-sm-3 col-centered left-align">
                    <button class="btn ink-reaction btn-flat btn-primary">
                        <i class="fa fa-building"></i> Browse all companies
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!-- END POPULAR SEARCHES -->

    <section id="help-center" class="no-padding style-primary">
        <div class="section-inner">
            <div class="row no-margin">
                <h2>Need Help? <a href="#"><b>HELP CENTER</b></a></h2>
            </div>
        </div>
    </section>
    <footer id="footer" class="no-padding">
        <div class="footer-inner section-inner">
            <div class="row row-centered no-margin">
                <div class="col-xs-12 col-sm-12 col-md-3 col-centered left-align top-vertical-align">
                    <h3>CAREER SYSTEM</h3>
                    <ul>
                        <li>About us</li>
                        <li>Our company</li>
                        <li>Social</li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 col-centered left-align top-vertical-align">
                    <h3>APPLICANTS</h3>
                    <ul>
                        <li>Find Jobs</li>
                        <li>Top Categories</li>
                        <li>Top Locations</li>
                        <li>Top Companys</li>
                        <li>International Jobs</li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 col-centered left-align top-vertical-align">
                    <h3>HIRING MANAGERS</h3>
                    <ul>
                        <li>Search Applicants</li>
                        <li>Post Jobs</li>
                        <li>Talent Networks</li>
                        <li>Advertising</li>
                    </ul>
                </div>
            </div>
            <small>Copyright © 2016 CareerSystem.com</small>
        </div>
    </footer>


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
