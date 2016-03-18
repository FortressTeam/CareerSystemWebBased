<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?> </li>
    </ul>
</nav> -->
<section>
    <div class="section-body contain-lg">
    <div class="row">
        <?php foreach ($posts as $post): ?>
        <div class="col-xs-12 animated fadeInRight">
            <div class="card card-underline">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-10">
                            <h2 class="text-primary">
                                <?= $this->Html->link(
                                    $post->post_title,
                                    ['controller' => 'posts', 'action' => 'view', $post->id])
                                ?>
                            </h2>
                            <p><?= h($post->post_content) ?></p>
                            <h4 class="row">
                                <p class=" col-sm-4"><i class="md md-place"></i> <?= h($post->post_location) ?></p>
                                <p class=" col-sm-4"><i class="md md-business"></i> <?= $post->has('hiring_manager') ? $post->hiring_manager->company_name : 'Undefine' ?></p>
                                <p class=" col-sm-4"><i class="md md-attach-money"></i> <?= $this->Number->currency($post->post_salary, '', ['before' => 'US']) ?></p>
                            </h4>
                        </div>
                        <div class="col-xs-2">
                            <?= $this->Html->image(
                                'company_img' . DS . $post->hiring_manager->company_logo,
                                ['class' => 'img-circle border-gray border-xl img-responsive'])
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    </div>
</section>
