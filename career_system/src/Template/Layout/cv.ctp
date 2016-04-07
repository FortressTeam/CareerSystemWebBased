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

    <!-- BEGIN STYLESHEETS -->
    <?= $this->Html->css('theme/bootstrap') ?>
    <?= $this->Html->css('theme/materialadmin') ?>
    <?= $this->Html->css('theme/font-awesome.min') ?><!--Font Awesome Icon Font-->
    
    <!-- Additional CSS includes -->
    <?= $this->Html->css('cv') ?>
    <style type="text/css">
    #content{
        padding: 0;
    }
    .cv{
        margin: auto;
        width: 793px;
    }
    .cv hr{
        margin-top: 12px;
        margin-bottom: 12px;
        border: 1px dashed #E2E2E2;
    }
    .cv .cv-date{
        font-size: 12px;
    }
    .cv .cv-title{
        /*text-transform: uppercase;*/
    }
    .cv .cv-block{
        border-left: 3px solid #E2E2E2;
        padding-left: 5px;
    }
    .cv .cv-skills>ul>li, .cv .cv-hobbies>ul>li{
        padding: 5px 0;
    }
    .cv .cv-skills>ul {
        list-style: none;
        padding-left: 0;
    }
    .cv .cv-skills .level{
        background-color: #727272;
        height: 15px
    }
    </style>
</head>
<body>

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


    </div><!--end #base-->
    <!-- END BASE -->
    <?= $this->Html->script('libs/bootstrap/bootstrap.min') ?>
</body>
</html>
