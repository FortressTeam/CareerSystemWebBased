<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h1><?= $post->post_title; ?></h1>
                <?php if(!isset($loggedUser['group_id'])): ?>
                <br>
                <?= $this->Html->link(
                        'SIGN IN TO APPLY',
                        ['controller' => 'users', 'action' => 'signin'],
                        ['class' => 'btn ink-reaction btn-raised btn-primary']
                    );
                ?>
                <?php endif; ?>
                <?php if((isset($loggedUser['group_id'])) && ($loggedUser['group_id'] == '3')): ?>
                <br>
                <?php 
                    $applied = isset($post->posts_has_curriculum_vitaes[0]->applied_cv_status);
                    if($applied){
                        $status = $post->posts_has_curriculum_vitaes[0]->applied_cv_status;
                        if($status == '0'){
                            echo '<span class="btn style-warning">PENDING</span>';
                        }
                        elseif($status == '1'){
                            echo '<span class="btn style-success">ACCEPTED</span>';
                        }
                        elseif($status == '2'){
                            echo '<span class="btn style-danger">REJECTED</span>';
                        }
                    }
                    else{
                        echo $this->Form->button(
                            'APPLY NOW',
                            [
                                'type' => 'button',
                                'class' => 'btn btn-primary btn-raised ink-reaction',
                                'id' => 'buttonFollowPost',
                                "data-toggle" => "modal",
                                "data-target" => "#loadMyCV"
                            ]
                        );
                    }
                ?>
                <?php $followed = (isset($post->applicants_follow_posts[0]->follow_status) && ($post->applicants_follow_posts[0]->follow_status == '1')); ?>
                <?= $this->Form->button(
                    $followed ? 'UNFOLLOW' : 'FOLLOW',
                    [
                        'type' => 'button',
                        'class' => ($followed ? 'btn-primary' : 'btn-default-light') . ' btn btn-raised ink-reaction',
                        'id' => 'buttonFollowPost',
                        'data-applicantid' => $loggedUser['id'],
                        'data-postid' => $post->id,
                        'data-value' => $followed ? '0' : '1',
                    ]
                ) ?>
                <?php endif; ?>
                <hr>
                <div class="row">
                    <div class="col-sm-6"><i><i class="fa fa-archive fa-fw"></i> <?= $post->has('category') ? h($post->category->category_name) : '' ?></i></div>
                    <div class="col-sm-6"><i><i class="fa fa-map-marker fa-fw"></i> <?= $post->has('post_location') ? h($post->post_location) : '' ?></i></div>
                    <div class="col-sm-6"><i><i class="fa fa-calendar fa-fw"></i> <?= h($post->post_date->format('d-M-Y')); ?></i></div>
                    <div class="col-sm-6"><i><i class="fa fa-usd fa-fw"></i> <?= $post->has('post_salary') ? $this->Number->currency($post->post_salary, 'VND', ['pattern' => 'VND #,###.00']) : '' ?></i></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-12 post-content">
                        <?= $post->post_content ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 row-centered">
                        <?= $this->Html->image(
                            'company_img' . DS . $post->hiring_manager->company_logo,
                            ['class' => 'img-circle border-gray border-xl img-responsive']);
                        ?>
                        <?= $this->Html->link(
                                '<h3>' . $post->hiring_manager->company_name . '</h3>',
                                ['controller' => 'HiringManagers', 'action' => 'view', 'slug' => Cake\Utility\Inflector::slug($post->hiring_manager->company_name), 'id' => $post->hiring_manager->id],
                                ['escape' => false, 'class' => 'text-primary']);
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sx-12">
                        <br/><b>Size:</b> <i><?= $post->has('hiring_manager') ? $post->hiring_manager->company_size : ''; ?></i>
                        <br/><b>Address:</b> <i><?= $post->has('hiring_manager') ? $post->hiring_manager->company_address : ''; ?></i>
                        <br/><b>Contact:</b> <i><?= $post->has('hiring_manager') ? $post->hiring_manager->hiring_manager_name : ''; ?></i>
                        <br/><b>Phone number:</b> <i><?= $post->has('hiring_manager') ? $post->hiring_manager->hiring_manager_phone_number : ''; ?></i>
                        <br/><b>About: </b><i><?= $post->has('hiring_manager') ? $post->hiring_manager->company_about : ''; ?></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if($editable): ?>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-head">
                <header>Curriculum Vitae</header>
            </div>
            <div class="card-body">
            <ul class="list divider-full-bleed">
                <?php foreach($post->curriculum_vitaes as $curriculum_vitae): ?>
                <li class="tile">
                    <?= $this->Html->link(
                        $curriculum_vitae->curriculum_vitae_name,
                        ['controller' => 'CurriculumVitaes', 'action' => 'view', $curriculum_vitae->id],
                        ['class' => 'tile-content ink-reaction', 'target' => '_blank']
                    ); ?>
                    <?php if($curriculum_vitae->_joinData->applied_cv_status == '0'): ?>
                        <a class="btn btn-flat ink-reaction btn-xs responseAppliedCV" cv-id=<?= $curriculum_vitae->id ?> post-id=<?= $post->id ?> data-status="1">
                            <i class="fa fa-check fa-fw text-success"></i>
                        </a>
                        <a class="btn btn-flat ink-reaction btn-xs responseAppliedCV" cv-id=<?= $curriculum_vitae->id ?> post-id=<?= $post->id ?> data-status="2">
                            <i class="fa fa-times fa-fw text-danger"></i>
                        </a>
                    <?php elseif ($curriculum_vitae->_joinData->applied_cv_status == '1'): ?>
                        <a class="btn btn-xs">
                            <i class="fa fa-check fa-fw style-success"></i>
                        </a>
                    <?php elseif ($curriculum_vitae->_joinData->applied_cv_status == '2'): ?>
                        <a class="btn btn-xs">
                            <i class="fa fa-times fa-fw style-danger"></i>
                        </a>
                    <?php endif; ?>
                </li>
                <?php endforeach; ?>
            </ul>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if((isset($loggedUser['group_id'])) && ($loggedUser['group_id'] == '1')): ?>
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-head style-primary">
                <header>Control</header>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-8">
                        <h4><b>Active</b></h4>
                    </div>
                    <div class="col-xs-4">
                        <?= $this->Form->button(
                            $post->post_status ? 'ON' : 'OFF',
                            [
                                'type' => 'button',
                                'class' => ($post->post_status ? 'btn-primary' : 'btn-default') . ' btn ink-reaction btn-block',
                                'id' => 'buttonChangeStatus',
                                'data-controller' => 'posts',
                                'data-id' => $post->id,
                                'data-field' => 'post_status',
                                'data-value' => $post->post_status ? '0' : '1',
                            ]
                        ) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-head style-danger">
                <header>Danger Zone</header>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-8">
                        <h4><b>Delete this post</b></h4>
                    </div>
                    <div class="col-xs-4">
                        <?= $this->Form->postLink(
                                'Delete',
                                ['action' => 'delete', $post->id],
                                ['class' => 'btn ink-reaction btn-flat btn-danger col-xs-12', 'escape' => false, 'confirm' => __('Once you delete a applicant, there is no going back. Are you sure you want to delete # {0}?', $post->id)]
                            )
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if((isset($loggedUser['group_id'])) && ($loggedUser['group_id'] == '3')): ?>
<div id="loadMyCV" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-primary">Choose a curriculum vitae to apply</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <?php foreach ($curriculumVitaes as $curriculumVitae): ?>
                        <div class="col-lg-4 col-md-6" data-dismiss="modal">
                            <?= $this->Html->image(
                                __('template_img/' . $curriculumVitae->curriculum_vitae_template->curriculum_vitae_template_image),
                                [
                                    'class' => 'border-gray img-responsive apply-cv',
                                    'cv-id' => $curriculumVitae->id,
                                    'post-id' => $post->id
                                ]
                            ); ?>
                            <h4 class="text-primary"><?= $curriculumVitae->curriculum_vitae_name ?></h4>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endif; ?>

