<div class="row">
    <div class="col-sm-3">
        <div class="row row-centered">
            <div class="col-xs-6 col-xs-offset-3 col-sm-offset-0 col-sm-12">
                <?= $this->Form->create($hiringManager, ['type' => 'file', 'class' => 'card']); ?>
                    <?= $this->Html->image(
                        'company_img' . DS . $hiringManager->company_logo,
                        ['class' => 'img-circle border-white border-xl img-responsive col-xs-12 no-padding', 'id' => 'companyImage']);
                    ?>
                    <div class="btn btn-icon-toggle" id="buttonCompanyImage"><i class="fa fa-camera"></i></div>
                    <div class="hidden">
                        <?= $this->Form->input('company_image', ['type' => 'file', 'id' => 'imputCompanyImage']) ?>
                    </div>
                <?= $this->Form->end() ?>

                <?= $this->Html->link(
                        'FOLLOW',
                        ['acction' => '#'],
                        ['class' => 'btn ink-reactio btn-block btn-raised btn-primary']
                    );
                ?>
                <br/>
            </div>
        </div>
    </div>
    <div class="col-sm-9">
        <div class="card editable">
            <div class="card-head">
                <header>Company infomation</header>
                <div class="tools">
                    <div class="btn-group">
                        <?= $this->Form->button('<i class="fa fa-pencil"></i>',
                            [
                                'type' => 'button',
                                'class' => 'btn btn-icon-toggle btn-OpenForm',
                                'data-form' => 'companyInfo'
                            ],
                            [ 'escape' => false ]
                        ) ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="companyInfoPanel" class="animated fadeIn row">
                    <div class="col-md-6">
                             <b>Name:</b> <i id="textName"><?= $hiringManager->company_name; ?></i>
                        <br/><b>Size:</b> <i id="textSize"><?= $hiringManager->company_size; ?> people</i>
                        <br/><b>Address:</b> <i id="textAddress"><?= $hiringManager->company_address; ?></i>
                    </div>
                    <div class="col-md-6">
                             <b>Hiring manager:</b> <i id="textManagerName"><?= $hiringManager->hiring_manager_name; ?></i>
                        <br/><b>Phone number:</b> <i id="textManagerPhone"><?= $hiringManager->hiring_manager_phone_number; ?></i>
                        <br/><b>Email:</b> <i id="textEmail"><?= $hiringManager->company_email; ?></i>
                    </div>
                </div>

                <div id="companyInfoForm" class="animated fadeIn" style="display: none">
                    <?= $this->Form->create($hiringManager, [
                            'class' => 'form',
                            'templates' => [
                                'formGroup' => '{{label}}{{input}}',
                                'inputContainer' => '<div class="form-group floating-label col-xs-6">{{content}}</div>'
                            ]
                        ])
                    ?>
                    <?php
                        echo $this->Form->input('company_name', ['class' => 'form-control', 'id' => 'inputName']);
                        echo $this->Form->input('hiring_manager_name', ['class' => 'form-control', 'id' => 'inputManagerName']);
                        echo $this->Form->input('company_size', ['class' => 'form-control', 'id' => 'inputSize']);
                        echo $this->Form->input('hiring_manager_phone_number', ['label' => 'Hiring Manager Phone','class' => 'form-control', 'id' => 'inputManagerPhone']);
                        echo $this->Form->input('company_address', ['class' => 'form-control', 'id' => 'inputAddress']);
                        echo $this->Form->input('company_email', ['type' => 'email', 'class' => 'form-control', 'id' => 'inputEmail']);
                    ?>
                    <?= $this->Form->button(__('Save'), [
                        'type' => 'button',
                        'class' => 'btn ink-reaction btn-raised btn-primary',
                        'id' => 'buttonEditCompanyInfo',
                        'data-form' => 'companyInfo',
                        'data-id' => $hiringManager->id,
                    ]) ?>
                    <?= $this->Form->button(__('Cancel'), [
                        'type' => 'button',
                        'class' => 'btn ink-reaction btn-flat btn-primary btn-CloseForm',
                        'data-form' => 'companyInfo',
                    ]) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
        <div class="card editable">
            <div class="card-head">
                <header>About company</header>
                <div class="tools">
                    <div class="btn-group">
                        <?= $this->Form->button('<i class="fa fa-pencil"></i>',
                            [
                                'type' => 'button',
                                'class' => 'btn btn-icon-toggle btn-OpenForm',
                                'data-form' => 'companyAbout'
                            ],
                            [ 'escape' => false ]
                        ) ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="companyAboutPanel" class="animated fadeIn">
                    <i id="textAbout"><?= $hiringManager->company_about; ?></i>
                </div>

                <div id="companyAboutForm" class="animated fadeIn" style="display: none">
                    <?= $this->Form->create($hiringManager, [
                            'class' => 'form',
                            'templates' => [
                                'formGroup' => '{{label}}{{input}}',
                                'inputContainer' => '<div class="form-group floating-label">{{content}}</div>'
                            ]
                        ])
                    ?>
                    <?php
                        echo $this->Form->input('company_about', ['class' => 'form-control', 'id' => 'inputAbout']);
                    ?>
                    <?= $this->Form->button(__('Save'), [
                        'type' => 'button',
                        'class' => 'btn ink-reaction btn-raised btn-primary',
                        'id' => 'buttonEditCompanyAbout',
                        'data-form' => 'companyAbout',
                        'data-id' => $hiringManager->id,
                    ]) ?>
                    <?= $this->Form->button(__('Cancel'), [
                        'type' => 'button',
                        'class' => 'btn ink-reaction btn-flat btn-primary btn-CloseForm',
                        'data-form' => 'companyAbout',
                    ]) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h2 class="text-primary">Posts</h2>
        <hr/>
        <?php foreach ($hiringManager->posts as $post): ?>
        <div class="col-sm-6 animated fadeInUp">
            <div class="card card-underline">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-5 row-centered">
                            <div class="col-xs-12">
                                <?= $this->Html->image(
                                    'company_img' . DS . $hiringManager->company_logo,
                                    ['class' => 'img-circle border-gray border-xl img-responsive'])
                                ?>
                            </div>
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
                            $hiringManager->hiring_manager_status ? 'ON' : 'OFF',
                            [
                                'type' => 'button',
                                'class' => ($hiringManager->hiring_manager_status ? 'btn-primary' : 'btn-default') . ' btn ink-reaction btn-block',
                                'id' => 'buttonChangeStatus',
                                'data-controller' => 'hiring_managers',
                                'data-id' => $hiringManager->id,
                                'data-field' => 'hiring_manager_status',
                                'data-value' => $hiringManager->hiring_manager_status ? '0' : '1',
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
                        <h4><b>Delete this hiring manager</b></h4>
                    </div>
                    <div class="col-xs-4">
                        <?= $this->Form->postLink(
                                'Delete',
                                ['action' => 'delete', $hiringManager->id],
                                ['class' => 'btn ink-reaction btn-flat btn-danger btn-block', 'escape' => false, 'confirm' => __('Once you delete a hiring manager, there is no going back. Please be certain. Are you sure you want to delete # {0}? ', $hiringManager->id)]
                            )
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="hiringManagers view large-9 medium-8 columns content">
<!--     <div class="related">
        <h4><?= __('Related Appointments') ?></h4>
        <?php if (!empty($hiringManager->appointments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Appointment Name') ?></th>
                <th><?= __('Appointment Description') ?></th>
                <th><?= __('Appointment Start') ?></th>
                <th><?= __('Appointment End') ?></th>
                <th><?= __('Appointment Address') ?></th>
                <th><?= __('Appointment SMS Alert') ?></th>
                <th><?= __('Hiring Manager Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($hiringManager->appointments as $appointments): ?>
            <tr>
                <td><?= h($appointments->id) ?></td>
                <td><?= h($appointments->appointment_name) ?></td>
                <td><?= h($appointments->appointment_description) ?></td>
                <td><?= h($appointments->appointment_start) ?></td>
                <td><?= h($appointments->appointment_end) ?></td>
                <td><?= h($appointments->appointment_address) ?></td>
                <td><?= h($appointments->appointment_SMS_alert) ?></td>
                <td><?= h($appointments->hiring_manager_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Appointments', 'action' => 'view', $appointments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Appointments', 'action' => 'edit', $appointments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Appointments', 'action' => 'delete', $appointments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appointments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Follow') ?></h4>
        <?php if (!empty($hiringManager->follow)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Hiring Manager Id') ?></th>
                <th><?= __('Applicant Id') ?></th>
                <th><?= __('Follow Hiring Manager') ?></th>
                <th><?= __('Follow Applicant') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($hiringManager->follow as $follow): ?>
            <tr>
                <td><?= h($follow->hiring_manager_id) ?></td>
                <td><?= h($follow->applicant_id) ?></td>
                <td><?= h($follow->follow_hiring_manager) ?></td>
                <td><?= h($follow->follow_applicant) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Follow', 'action' => 'view', $follow->hiring_manager_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Follow', 'action' => 'edit', $follow->hiring_manager_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Follow', 'action' => 'delete', $follow->hiring_manager_id], ['confirm' => __('Are you sure you want to delete # {0}?', $follow->hiring_manager_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div> -->
</div>
