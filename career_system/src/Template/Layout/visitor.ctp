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
    <?= $this->Html->css('theme/bootstrap') ?>
    <?= $this->Html->css('theme/materialadmin') ?>
    <?= $this->Html->css('theme/font-awesome.min') ?><!--Font Awesome Icon Font-->
    <?= $this->Html->css('theme/animate') ?>
    
    <!-- Additional CSS includes -->
    <?= $this->Html->css('common') ?>
    <?= $this->Html->css('theme/libs/select2/select2') ?>
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
<body class="header-fixed non-side-bar">

    <!-- BEGIN HEADER-->
    <header id="header">
        <div class="headerbar">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="headerbar-left">
                <ul class="header-nav header-nav-options" id="headerControl">
                    <li class="header-nav-brand">
                        <div class="brand-holder">
                            <?= $this->Html->link(
                                $this->Html->image('logo-96.png') . 
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
                        <form class="navbar-search" action="<?= $this->Url->build(['controller' => 'Search', 'action' => 'index']); ?>">
                            <div class="form-group">
                                <input type="text" class="form-control" name="q" placeholder="Enter your keyword">
                            </div>
                            <button type="submit" class="btn btn-icon-toggle ink-reaction btn-sm"><i class="fa fa-search"></i></button>
                        </form>
                    </li>
                </ul><!--end .header-nav-options -->

                <ul class="header-nav header-nav-profile" id="headerProfile">
                    <li id="signupButton">
                        <?= $this->Html->link(
                            __('SIGN UP'),
                            ['controller' => 'Users', 'action' => 'signup'],
                            ['class' => 'btn ink-reaction btn-raised btn-sm btn-default']
                        ) ?>
                    </li>
                    <li id="hiringmanagerButton">
                        <button type="button" class="btn ink-reaction btn-raised btn-sm btn-primary">FOR HIRING MANAGERS</button>
                    </li>
                </ul><!--end .header-nav-profile -->

                <ul class="header-nav header-nav-toggle" id="headerToggle">
                    <li id="signinButton">
                        <?= $this->Html->link(
                            __('SIGN IN'),
                            ['controller' => 'Users', 'action' => 'signin'],
                            ['class' => 'btn btn-block ink-reaction btn-flat btn-sm btn-primary']
                        ) ?>
                    </li>
                </ul><!--end .header-nav-toggle -->
            </div><!--end #header-navbar-collapse -->
        </div>
    </header>
    <!-- END HEADER-->

    <!-- BEGIN BASE-->
    <div id="base" class="no-padding" style="min-height: 50%">

        <!-- BEGIN CONTENT-->
        <div id="content">

            <!-- BEGIN LIST SAMPLES -->
            <section>
                <div class="section-body contain-md">
                    <?= $this->Flash->render() ?>
                    <?= $this->fetch('content') ?>
                </div><!--end .section-body -->
            </section>
        </div><!--end #content-->
        <!-- END CONTENT -->


    </div><!--end #base-->
    <!-- END BASE -->

    <!-- START EMAIL SUBCRIBE -->
    <section id="email-subscribe" class="no-padding style-primary">
        <div class="email-subscribe-inner section-inner contain-lg ">
            <div class="row no-margin">
                <div class="card col-sm-6 col-sm-offset-3">
                    <div class="card-body">
                        <div class="form-group has-primary no-margin">
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
    <section id="popular-searches" class="no-padding">
        <div class="popular-searches-inner section-inner contain-lg">
            <div class="row row-centered no-margin">
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
                </div>
            </div>
            <div class="row row-centered no-margin">
                <div class="col-sm-3 col-centered left-align">
                    <button class="btn ink-reaction btn-flat btn-primary">
                        <i class="fa fa-tags"></i> All categories
                    </button>
                </div>
                <div class="col-sm-3 col-centered left-align">
                    <button class="btn ink-reaction btn-flat btn-primary">
                        <i class="fa fa-building"></i> All companies
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!-- END POPULAR SEARCHES -->

    <section id="help-center" class="no-padding style-primary">
        <div class="section-inner contain-lg ">
            <div class="row no-margin">
                <h2><a href="#"><b>SUPPORT CENTER</b></a></h2>
            </div>
        </div>
    </section>
    <footer id="footer" class="no-padding">
        <div class="footer-inner section-inner contain-lg ">
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
    <?= $this->Html->script('libs/select2/select2') ?>
    
    <!-- Put App.js last in your javascript imports -->
    <?= $this->Html->script('main') ?>
    <?= $this->Html->script('form') ?>
    <?= $this->Html->script('app.min') ?>
</body>
</html>
