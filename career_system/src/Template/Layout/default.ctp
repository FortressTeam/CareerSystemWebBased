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
<body class="menubar-hoverable header-fixed">

    <!-- BEGIN HEADER-->
    <header id="header" class="header<?= $loggedUser['group_id'] == '1' ? '-inverse' : ''?>">
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
                                $this->Html->image(
                                   $loggedUser['group_id'] == '1' ? 'logo-96-inverse.png' : 'logo-96.png'
                                ) . 
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

                <ul class="header-nav header-nav-toggle" id="headerToggle">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown" aria-expanded="false" id="openNotificationButton">
                            <i class="fa fa-bell"></i><sup class="badge style-danger" id="notSeenNotifications">0</sup>
                        </a>
                        <ul class="dropdown-menu animation-expand">
                            <li class="dropdown-header">Your notifications</li>
                            <li id="notificationButton"><a href="#">View all notifications <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
                        </ul><!--end .dropdown-menu -->
                    </li><!--end .dropdown -->
                </ul><!--end .header-nav-toggle -->

                <?php if(!empty($loggedUser)): ?>
                <ul class="header-nav header-nav-profile" id="headerProfile">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                            <?= $this->Html->image(
                                __('user_img/' . $loggedUser['user_avatar']),
                                ['alt' => $loggedUser['username']]) ?>
                            <span class="profile-info">
                                <?php 
                                    if(!empty($loggedUser['applicant'])){
                                        echo $loggedUser['applicant']['applicant_name'];
                                    }
                                    else if(!empty($loggedUser['hiring_manager'])){
                                        echo $loggedUser['hiring_manager']['hiring_manager_name'];
                                    }
                                    else if(!empty($loggedUser['administrator'])){
                                        echo $loggedUser['administrator']['administrator_name'];
                                    }
                                ?>
                                <small><?= $loggedUser['group']['group_name'] ?></small>
                            </span>
                        </a>
                        <ul class="dropdown-menu animation-expand">
                            <li>
                                <?php
                                    if(!empty($loggedUser['applicant'])){
                                        echo $this->Html->link(
                                            __('My profile'),
                                            ['controller' => 'applicants', 'action' => 'view', $loggedUser['id']]
                                        );
                                    }
                                    else if(!empty($loggedUser['hiring_manager'])){
                                        echo $this->Html->link(
                                            __('My company'),
                                            ['controller' => 'hiring_managers', 'action' => 'view', $loggedUser['id']]
                                        );
                                    }
                                    else if(!empty($loggedUser['administrator'])){
                                        echo $this->Html->link(
                                            __('Setting'),
                                            ['controller' => '/']
                                        );
                                    }
                                ?>
                            </li>
                            <?php if(!empty($loggedUser['applicant']) || !empty($loggedUser['hiring_manager'])): ?>
                            <li>
                                <a href="#">My appointments</a>
                            </li>
                            <?php endif; ?>
                            <li class="divider"></li>
                            <li>
                                <?= $this->Html->link(
                                    __('<i class="fa fa-fw fa-power-off text-danger"></i> Logout'),
                                    ['controller' => 'Users', 'action' => 'signout'],
                                    ['escape' => false]
                                ); ?>
                            </li>
                        </ul>
                    </li>
                </ul>
                <?php endif; ?>
                <!--end .header-nav-profile -->
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
                <div class="section-body contain-md">
                    <?= $this->Flash->render() ?>
                    <?= $this->fetch('content') ?>
                </div><!--end .section-body -->
            </section>
        </div><!--end #content-->
        <!-- END CONTENT -->

        <!-- BEGIN MENU BAR -->
        <div id="menubar" class="menubar<?= $loggedUser['group_id'] != '3' ? '-inverse' : ''?> animate">
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
                            <?= $this->Html->image('home-bg.jpg', ['style' => 'width: 100%']) ?>                        
                        </li><!--end /menu-li -->
                        <li class="<?= $this->request->params['controller'] === 'Pages' ? 'active' : '' ?>" >
                            <?= $this->Html->link(
                                '<div class="gui-icon"><i class="fa fa-dashboard fa-fw"></i></div>
                                <span class="title">Dashboard</span>',
                                ['controller' => 'dashboard'],
                                ['escape' => false]
                                ) ?>
                        </li>
                        <li>
                            <?php
                                if(!empty($loggedUser['applicant'])){
                                    echo $this->Html->link(
                                        '<div class="gui-icon"><i class="fa fa-user fa-fw"></i></div>
                                        <span class="title">My profile</span>',
                                        ['controller' => 'applicants', 'action' => 'view', $loggedUser['id']],
                                          ['escape' => false]
                                    );
                                }
                                else if(!empty($loggedUser['hiring_manager'])){
                                    echo $this->Html->link(
                                        '<div class="gui-icon"><i class="fa fa-user fa-fw"></i></div>
                                        <span class="title">My company</span>',
                                        ['controller' => 'hiring_managers', 'action' => 'view', $loggedUser['id']],
                                        ['escape' => false]
                                    );
                                }
                            ?>
                        </li>
                        <?php if((isset($loggedUser['group_id'])) && ($loggedUser['group_id'] == '1' || $loggedUser['group_id'] == '2')): ?>
                        <li class="gui-folder <?= $this->request->params['controller'] === 'Posts' || $this->request->params['controller'] === 'Categories' ? 'active' : '' ?>">
                            <a>
                                <div class="gui-icon"><i class="fa fa-thumb-tack fa-fw"></i></div>
                                <span class="title">Posts</span>
                            </a>
                            <ul>
                                <li>
                                    <?= $this->Html->link(
                                        '<span class="title">All posts</span>',
                                        ['controller' => 'Posts', 'action' => 'index'],
                                        ['escape' => false]
                                        ) ?>
                                </li>
                                <?php if($loggedUser['group_id'] == '2'): ?>
                                <li>
                                    <?= $this->Html->link(
                                        '<span class="title">Add new</span>',
                                        ['controller' => 'Posts', 'action' => 'add'],
                                        ['escape' => false]
                                        ) ?>
                                </li>
                                <?php elseif($loggedUser['group_id'] == '1'): ?>
                                <li>
                                    <?= $this->Html->link(
                                        '<span class="title">Categories</span>',
                                        ['controller' => 'categories', 'action' => 'index'],
                                        ['escape' => false]
                                        ) ?>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </li><!--end /menu-li -->
                        <?php endif; ?>
                        <?php if((isset($loggedUser['group_id'])) && ($loggedUser['group_id'] == '1')): ?>
                        <li class="gui-folder <?= $this->request->params['controller'] === 'HiringManagers' ? 'active' : '' ?>">
                            <a>
                                <div class="gui-icon"><i class="fa fa-building-o fa-fw"></i></div>
                                <span class="title">Hiring Managers</span>
                            </a>
                            <ul>
                                <li>
                                    <?= $this->Html->link(
                                        '<span class="title">All hiring managers</span>',
                                        ['controller' => 'HiringManagers', 'action' => 'index'],
                                        ['escape' => false]
                                        ) ?>
                                </li>
                                <li>
                                    <?= $this->Html->link(
                                        '<span class="title">Add new</span>',
                                        ['controller' => 'HiringManagers', 'action' => 'add'],
                                        ['escape' => false]
                                        ) ?>
                                </li>
                            </ul>
                        </li><!--end /menu-li -->
                        <?php endif; ?>
                        <?php if(isset($loggedUser['group_id']) && ($loggedUser['group_id'] == '1')): ?>
                        <li class="<?= $this->request->params['controller'] === 'Applicants' ? 'active' : '' ?>">
                            <?= $this->Html->link(
                                '<div class="gui-icon"><i class="fa fa-male fa-fw"></i></div>
                                <span class="title">Applicants</span>',
                                ['controller' => 'Applicants', 'action' => 'index'],
                                ['escape' => false]
                                ) ?>
                        </li><!--end /menu-li -->
                        <?php endif; ?>
                        <?php if((isset($loggedUser['group_id'])) && ($loggedUser['group_id'] == '3')): ?>
                        <li class="gui-folder <?= $this->request->params['controller'] === 'CurriculumVitaes' ? 'active' : '' ?>">
                            <a>
                                <div class="gui-icon"><i class="fa fa-file fa-fw"></i></div>
                                <span class="title">CV</span>
                            </a>
                            <ul>
                                <li>
                                    <?= $this->Html->link(
                                        '<span class="title">My CV</span>',
                                        ['controller' => 'CurriculumVitaes', 'action' => 'index'],
                                        ['escape' => false]
                                        ) ?>
                                </li>
                                <li>
                                    <?= $this->Html->link(
                                        '<span class="title">Create new</span>',
                                        ['controller' => 'CurriculumVitaes', 'action' => 'add'],
                                        ['escape' => false]
                                        ) ?>
                                </li>
                            </ul>
                        </li><!--end /menu-li -->
                        <?php endif; ?>
                        <?php if(isset($loggedUser['group_id']) && ($loggedUser['group_id'] == '1')): ?>
                        <li class="<?= $this->request->params['controller'] === 'Skills' ? 'active' : '' ?>">
                            <?= $this->Html->link(
                                '<div class="gui-icon"><i class="fa fa-star fa-fw"></i></div>
                                <span class="title">Skills</span>',
                                ['controller' => 'Skills', 'action' => 'index'],
                                ['escape' => false]
                                ) ?>
                        </li><!--end /menu-li -->
                        <?php endif; ?>
                        <?php if((isset($loggedUser['group_id'])) && ($loggedUser['group_id'] == '1')): ?>
                        <li class="<?= $this->request->params['controller'] === 'Feedbacks' ? 'active' : '' ?>">
                            <?= $this->Html->link(
                                '<div class="gui-icon"><i class="fa fa-reply-all fa-fw"></i></div>
                                <span class="title">Feedbacks</span>',
                                ['controller' => 'Feedbacks', 'action' => 'index'],
                                ['escape' => false]
                                ) ?>
                        </li><!--end /menu-li -->
                        <?php endif; ?>
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
    <?= $this->Html->script('libs/select2/select2') ?>
    
    <!-- Put App.js last in your javascript imports -->
    <?= $this->Html->script('main') ?>
    <?= $this->Html->script('form') ?>
    <?= $this->Html->script('app.min') ?>

    <script type="text/javascript">
        <?php if(isset($loggedUser['id'])): ?>
        $(document).ready(function(){
            $.ajax({
                type: 'GET',
                url: $('#webInfo').data('url')
                        + '/api' 
                        + '/notifications'
                        + '/notSeen'
                        + '?user_id=' + <?= $loggedUser['id'] ?>,
                contentType: 'application/json',
                dataType: 'json',
                success: function(responce){
                    $('#notSeenNotifications').text(responce['count']['notifications']);
                },
                error: function(message){
                    console.log(message);
                }
            });
        });
        $('#openNotificationButton').click(function(){
            $.ajax({
                type: 'GET',
                url: $('#webInfo').data('url')
                        + '/api' 
                        + '/notifications'
                        + '?user_id=' + <?= $loggedUser['id'] ?>
                        + '&limit=3',
                contentType: 'application/json',
                dataType: 'json',
                success: function(responce){
                    if($('#notificationButton').parent().children().length <= 2) {
                        $.each(responce['notifications'], function(index, value) {
                                $('#notificationButton').addNotificationItem(value);
                        });
                    }
                },
                error: function(message){
                    console.log(message);
                }
            });
        });
        <?php endif; ?>
    </script>
</body>
</html>
