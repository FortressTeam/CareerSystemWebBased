<section>
    <div class="section-body contain-lg">
    <div class="row">
        <?php foreach ($posts as $post): ?>
        <div class="col-md-6 col-lg-4 animated fadeInUp">
            <div class="card card-underline">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-5 row-centered">
                            <div class="col-xs-12">
                                <?= $this->Html->image(
                                    'company_img' . DS . $post->hiring_manager->company_logo,
                                    ['class' => 'img-circle border-gray border-xl img-responsive'])
                                ?>
                            </div>
                            <h4 class="text-primary">
                                <?= $this->Html->link(
                                    $post->hiring_manager->company_name,
                                    ['controller' => 'HiringManagers', 'action' => 'view', $post->hiring_manager->id],
                                    ['escape' => false, 'class' => 'text-primary']);
                                ?>
                            </h4>
                        </div>
                        <div class="col-xs-7 ">
                            <h4 class="text-primary title_post">
                                <?= $this->Html->link(
                                    $post->post_title,
                                    ['controller' => 'posts', 'action' => 'view', $post->id])
                                ?>
                            </h4>
                            <div class="row">
                                <div class="col-sx-12"> 
                                    <i class="fa fa-calendar"></i> <?= h($post->post_date->format('d-M-Y')) ?><br/>
                                    <i class="fa fa-map-marker"></i> <?= $post->has('post_location') ? h($post->post_location) : '' ?><br/>
                                    <i class="fa fa-phone"></i> <?= $post->has('hiring_manager') ? h($post->hiring_manager->hiring_manager_phone_number) : '' ?><br/>
                                    <i class="fa fa-archive"></i> <?= $post->has('category') ? h($post->category->category_name) : '' ?><br/>
                                    <i class="fa fa-usd"></i> <?= $post->has('post_salary') ? $this->Number->currency($post->post_salary, 'VND', ['pattern' => 'VND #,###.00']) : '' ?><br/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    </div>
</section>
