<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Administrator'), ['action' => 'edit', $administrator->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Administrator'), ['action' => 'delete', $administrator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $administrator->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Administrators'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Administrator'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Logs'), ['controller' => 'Logs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Log'), ['controller' => 'Logs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="administrators view large-9 medium-8 columns content">
    <h3><?= h($administrator->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Administrator Name') ?></th>
            <td><?= h($administrator->administrator_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Administrator Phone Number') ?></th>
            <td><?= h($administrator->administrator_phone_number) ?></td>
        </tr>
        <tr>
            <th><?= __('Administrator Address') ?></th>
            <td><?= h($administrator->administrator_address) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($administrator->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Administrator Date Of Birth') ?></th>
            <td><?= h($administrator->administrator_date_of_birth) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Logs') ?></h4>
        <?php if (!empty($administrator->logs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Log Activity') ?></th>
                <th><?= __('Log Date') ?></th>
                <th><?= __('Administrator Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($administrator->logs as $logs): ?>
            <tr>
                <td><?= h($logs->id) ?></td>
                <td><?= h($logs->log_activity) ?></td>
                <td><?= h($logs->log_date) ?></td>
                <td><?= h($logs->administrator_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Logs', 'action' => 'view', $logs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Logs', 'action' => 'edit', $logs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Logs', 'action' => 'delete', $logs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $logs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
