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

                <ul class="header-nav header-nav-profile" id="headerProfile">
                    <li id="signupButton">
                        <button type="button" class="btn ink-reaction btn-raised btn-default">SIGN UP</button>
                    </li>
                    <li id="hiringmanagerButton">
                        <button type="button" class="btn ink-reaction btn-raised btn-primary">FOR HIRING MANAGERS</button>
                    </li>
                </ul><!--end .header-nav-profile -->

                <ul class="header-nav header-nav-toggle" id="headerToggle">
                    <li id="signinButton">
                        <button type="button" class="btn btn-block ink-reaction btn-flat btn-primary">SIGN IN</button>
                    </li>
                </ul><!--end .header-nav-toggle -->
            </div><!--end #header-navbar-collapse -->
        </div>
    </header>
    <!-- END HEADER-->

    <!-- BEGIN HOME SEARCH-->
    <section id="home" class="no-padding">
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

    <!-- START MAIN FEATURE -->
    <section id="marketing" class="no-padding">
        <div class="marketing-inner">
            <div class="row row-centered no-margin">
                <div class="col-md-3 col-centered">
                    <div class="card">
                        <div class="card-head">
                            <header>Title here</header>
                        </div>
                        <div class="card-body no-padding">
                            <img src="img/avatar.jpg" class="img-circle border-gray border-xl">
                        </div>
                        <div class="card-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-centered">
                    <div class="card">
                        <div class="card-head">
                            <header>Title here</header>
                        </div>
                        <div class="card-body no-padding">
                            <img src="img/avatar.jpg" class="img-circle border-gray border-xl">
                        </div>
                        <div class="card-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-centered">
                    <div class="card">
                        <div class="card-head">
                            <header>Title here</header>
                        </div>
                        <div class="card-body no-padding">
                            <img src="img/avatar.jpg" class="img-circle border-gray border-xl">
                        </div>
                        <div class="card-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END MAIN FEATURE -->

    <!-- START EMAIL SUBCRIBE -->
    <section id="email-subscribe" class="no-padding style-primary">
        <div class="email-subscribe-inner">
            <div class="row no-margin">
                <div class="card col-sm-6 col-sm-offset-3">
                    <div class="card-body">
                        <div class="form-group has-primary">
                                <div class="input-group-content">
                                    <input type="text" class="form-control" id="emailgroup" placeholder="Enter your email address to subcribe to career news">
                                    <label for="emailgroup"></label>
                                </div>
                                <div class="input-group-btn">
                                    <button class="btn ink-reaction btn-primary" type="button"><i class="fa fa-envelope-o"></i></button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END EMAIL SUBCRIBE -->

    <!-- START POPULAR SEARCHES -->
    <section id="email-subscribe" class="no-padding">
        <div class="email-subscribe-inner">
            <div class="row row-centered no-margin">
                <div class="col-sm-9 col-centered left-align">
                    <h1>Popular job searches</h1>
                </div>
                <div class="col-sm-3 col-centered left-align">
                    <h2>By category</h2>
                    <div class="contain">
                        <a href="#" class="tag label label-default">something</a>
                        <a href="#" class="tag label label-default">something</a>
                        <a href="#" class="tag label label-default">something</a>
                        <a href="#" class="tag label label-default">something</a>
                        <a href="#" class="tag label label-default">something</a>
                        <a href="#" class="tag label label-default">something</a>
                        <a href="#" class="tag label label-default">something</a>
                        <a href="#" class="tag label label-default">something</a>
                        <a href="#" class="tag label label-default">something</a>
                    </div>
                    <button class="btn ink-reaction btn-block btn-raised btn-sm btn-primary">
                        <i class="fa fa-tags"></i> Browse all categories
                    </button>
                </div>
                <div class="col-sm-3 col-centered left-align">
                    <h2>By city</h2>
                    <div class="contain">
                        <a href="#" class="tag label label-default">something</a>
                        <a href="#" class="tag label label-default">something</a>
                        <a href="#" class="tag label label-default">something</a>
                        <a href="#" class="tag label label-default">something</a>
                        <a href="#" class="tag label label-default">something</a>
                        <a href="#" class="tag label label-default">something</a>
                        <a href="#" class="tag label label-default">something</a>
                        <a href="#" class="tag label label-default">something</a>
                        <a href="#" class="tag label label-default">something</a>
                    </div>
                    <button class="btn ink-reaction btn-block btn-raised btn-sm btn-primary">
                        <i class="fa fa-tags"></i> Browse all cities
                    </button>
                </div>
                <div class="col-sm-3 col-centered left-align">
                    <h2>By company</h2>
                    <div class="contain">
                        <a href="#" class="tag label label-default">something</a>
                        <a href="#" class="tag label label-default">something</a>
                        <a href="#" class="tag label label-default">something</a>
                        <a href="#" class="tag label label-default">something</a>
                        <a href="#" class="tag label label-default">something</a>
                        <a href="#" class="tag label label-default">something</a>
                        <a href="#" class="tag label label-default">something</a>
                        <a href="#" class="tag label label-default">something</a>
                        <a href="#" class="tag label label-default">something</a>
                    </div>
                    <div class=""></div>
                    <button class="btn ink-reaction btn-block btn-raised btn-sm btn-primary">
                        <i class="fa fa-tags"></i> Browse all companies
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!-- END POPULAR SEARCHES -->


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
