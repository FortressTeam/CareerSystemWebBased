<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <h2><?= $post->post_title; ?></h2>
                        <div class="row">
                            <div class="col-sm-6"><i><i class="fa fa-calendar"></i> <?= h($post->post_date->format('d-M-Y')); ?></i></div>
                            <div class="col-sm-6"><i><i class="fa fa-map-marker"></i> <?= $post->has('post_location') ? h($post->post_location) : '' ?></i></div>
                            <div class="col-sm-6"><i><i class="fa fa-archive"></i> <?= $post->has('category') ? h($post->category->category_name) : '' ?></i></div>
                            <div class="col-sm-6"><i><i class="fa fa-usd"></i> <?= $post->has('post_salary') ? $this->Number->currency($post->post_salary, 'VND', ['pattern' => 'VND #,###.00']) : '' ?></i></div>
                        </div>
                        <br>
                        <?= $this->Html->link(
                                'APPLY NOW',
                                ['acction' => '#', $post->id],
                                ['class' => 'btn ink-reaction btn-raised btn-primary']
                            );
                        ?>
                        <?= $this->Html->link(
                                'FOLLOW',
                                ['acction' => '#', $post->id],
                                ['class' => 'btn ink-reaction btn-raised btn-default']
                            );
                        ?>
                        <hr>
                        <div class="row">
                            <div class="col-xs-12 post_content">
                                <?= $post->post_content ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 padd-2">
                        <div class="col-xs-12 row-centered">
                            <?= $this->Html->image(
                                'company_img' . DS . $post->hiring_manager->company_logo,
                                ['class' => 'img-circle border-gray border-xl img-responsive']);
                            ?>
                            <?= $this->Html->link(
                                    '<h3>' . $post->hiring_manager->company_name . '</h3>',
                                    ['controller' => 'HiringManagers', 'action' => 'view', $post->hiring_manager->id],
                                    ['escape' => false, 'class' => 'text-primary']);
                            ?>
                        </div>
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
</div>
