<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-head">
                <header>Add a new category</header>
            </div>
            <div class="card-body">
                <?= $this->Form->create($category, [
                        'url' => ['action' => 'add'],
                        'class' => 'form',
                        'templates' => [
                            'formGroup' => '{{input}}{{label}}',
                            'nestingLabel' => '<div class="checkbox checkbox-styled"><label{{attrs}}>{{input}}<span>{{text}}</span></label></div>',
                            'inputContainer' => '<div class="form-group floating-label">{{content}}</div>'
                        ]
                    ])
                ?>
                <?php
                    echo $this->Form->input('category_name', ['class' => 'form-control']);
                    echo $this->Form->input('category_description', ['class' => 'form-control']);
                    echo $this->Form->input('parent_id', ['class' => 'form-control', 'options' => $parentCategories]);
                ?>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn ink-reaction btn-raised btn-primary btn-block']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-head">
                <header>Categories</header>
                <div class="tools">
                <?php
                    echo $this->Form->create('', [
                        'class' => 'form',
                        'templates' => [
                            'formGroup' => '{{input}}{{label}}',
                            'inputContainer' => '<div class="form-group floating-label  padd-0 marg-0 col-xs-10">{{content}}</div>'
                        ]
                    ]);
                    echo $this->Form->input('q', ['label' => '', 'class' => 'form-control', 'placeholder' => 'Search']);
                    echo $this->Form->button(
                        '<i class="fa fa-search"></i>',
                        ['type' => 'submit','class' => 'btn ink-reaction btn-flat btn-md'],
                        ['escape' => false]);
                    echo $this->Form->end();
                ?>
                </div>
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
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="View posts"><i class="fa fa-thumb-tack"></i></button>',
                                    ['action' => 'view', 'id' => $category->id, 'slug' => $category->category_name],
                                    ['escape' => false]) ?>
                                <?= $this->Html->link(
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Edit category"><i class="fa fa-pencil"></i></button>',
                                    ['action' => 'edit', $category->id],
                                    ['escape' => false]) ?>
                                <?= $this->Form->postLink(
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Move down"><i class="fa fa-arrow-down"></i></button>',
                                    ['action' => 'moveDown', $category->id],
                                    ['confirm' => __('Are you sure you want to move down # {0}?', $category->id), 'escape' => false]) ?>
                                <?= $this->Form->postLink(
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Move up"><i class="fa fa-arrow-up"></i></button>',
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
                </div>
            </div>
        </div>
    </div>
</div>