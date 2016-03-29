<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head style-primary">
                <header>List Categories</header>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table cellpadding="0" cellspacing="0" class="table table-condensed table-hover no-margin">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('category_name') ?></th>
                                <th><?= $this->Paginator->sort('parent_id') ?></th>
                                <th class="actions text-right"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($categories as $category): ?>
                            <tr>
                                <td><?= $this->Number->format($category->id) ?></td>
                                <td><?= h($category->category_name) ?></td>
                                <td><?= $category->has('parent_category') ? $this->Html->link($category->parent_category->category_name, ['controller' => 'Categories', 'action' => 'view', $category->parent_category->id]) : '' ?></td>
                                <td class="actions text-right">
                                <?= $this->Html->link(
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="View category"><i class="fa fa-info"></i></button>',
                                    ['action' => 'view', $category->id],
                                    ['escape' => false]) ?>
                                <?= $this->Html->link(
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Edit category"><i class="fa fa-pencil"></i></button>',
                                    ['action' => 'edit', $category->id],
                                    ['escape' => false]) ?>
                                <?= $this->Form->postLink(
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Delete category"><i class="fa fa-arrow-down"></i></button>',
                                    ['action' => 'moveDown', $category->id],
                                    ['confirm' => __('Are you sure you want to move down # {0}?', $category->id), 'escape' => false]) ?>
                                <?= $this->Form->postLink(
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Delete category"><i class="fa fa-arrow-up"></i></button>',
                                    ['action' => 'moveUp', $category->id],
                                    ['confirm' => __('Are you sure you want to move up # {0}?', $category->id), 'escape' => false]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->prev('<i class="fa fa-angle-left"></i> ',
                        ['escape' => false]) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next('<i class="fa fa-angle-right"></i>',
                        ['escape' => false]) ?>
                    </ul>
                    <p><?= $this->Paginator->counter() ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="fab_wrapper">
        <?= $this->Html->link(
            '<button class="btn btn_fab btn-primary"><i class="fa fa-plus"></i></button>',
            ['action' => 'add'],
            ['escape' => false]) ?>
    </div>

<!--     <div class="col-lg-4">
        <div class="card">
            <div class="card-head">
                <header><?= __('Actions') ?></header>
            </div>
            <div class="card-body no-padding">
                <ul class="list divider-full-bleed">
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">New Category</div>',
                        ['action' => 'add'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">List Posts</div>',
                        ['controller' => 'Posts', 'action' => 'index'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">New Post</div>',
                        ['controller' => 'Posts', 'action' => 'add'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]) ?>
                    </li>
                </ul>
            </div>
        </div>
    </div> -->
</div>