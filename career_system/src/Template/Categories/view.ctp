<section>
    <div class="section-body contain-lg">
    <div class="row">
        <?php foreach ($posts as $post): ?>
<<<<<<< HEAD
        <div class="col-md-6 col-lg-4 animated fadeInUp">
=======
        <div class="col-sm-6 col-lg-4 animated zoomIn">
>>>>>>> 0b6456c3fa0c48f5e5285b76f13852d8271705fb
            <div class="card card-underline">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-4 row-centered">
                            <div class="row">
                                <div class="col-xs-12">
                                    <?= $this->Html->image(
                                        'company_img' . DS . $post->hiring_manager->company_logo,
                                        ['class' => 'img-circle border-gray border-xl img-responsive'])
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-8">
                            <h4 class="text-primary title_post">
                                <?= $this->Html->link(
                                    $post->post_title,
                                    ['controller' => 'posts', 'action' => 'view', $post->id])
                                ?>
                            </h4>
                            <h5 class="text-primary title_post">
                                <?= $this->Html->link(
                                    $post->hiring_manager->company_name,
                                    ['controller' => 'HiringManagers', 'action' => 'view', $post->hiring_manager->id],
                                    ['escape' => false, 'class' => 'text-primary']);
                                ?>
                            </h5>
                            <div class="row no-margin">
                                <div class="col-sx-12 text-default-light"> 
                                    <?php
                                        $start = date_create($post->post_date->format('Y-m-d'));
                                        $end = date_create(date("Y-m-d"));
                                        $date = date_diff($start, $end)->format('%d');
                                        if($date < 1)
                                            echo 'Today';
                                        else if($date < 2)
                                            echo 'Yesterday';
                                        else if($date < 30)
                                            echo $date, ' days ago';
                                        else
                                            echo $post->post_date->format('d-M-Y');
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body no-padding style-default-light">
                    <div class="row no-margin text-default-light">
                        <div class="col-xs-6">
                            <i class="fa fa-archive"></i> <?= $post->has('category') ? h($post->category->category_name) : '' ?><br/>
                            <i class="fa fa-phone"></i> <?= $post->has('hiring_manager') ? h($post->hiring_manager->hiring_manager_phone_number) : '' ?>
                        </div>
                        <div class="col-xs-6">
                            <i class="fa fa-map-marker"></i> <?= $post->has('post_location') ? h($post->post_location) : '' ?><br/>
                            <i class="fa fa-usd"></i> <?= $post->has('post_salary') ? $this->Number->currency($post->post_salary, 'VND', ['pattern' => 'VND #,###.00']) : '' ?><br/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    </div>
</section>
