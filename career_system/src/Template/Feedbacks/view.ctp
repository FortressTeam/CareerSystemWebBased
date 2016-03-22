<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Feedback'), ['action' => 'edit', $feedback->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Feedback'), ['action' => 'delete', $feedback->id], ['confirm' => __('Are you sure you want to delete # {0}?', $feedback->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Feedbacks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Feedback'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Feedback Types'), ['controller' => 'FeedbackTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Feedback Type'), ['controller' => 'FeedbackTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="feedbacks view large-9 medium-8 columns content">
    <h3><?= h($feedback->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Feedback Title') ?></th>
            <td><?= h($feedback->feedback_title) ?></td>
        </tr>
        <tr>
            <th><?= __('Feedback Type') ?></th>
            <td><?= $feedback->has('feedback_type') ? $this->Html->link($feedback->feedback_type->id, ['controller' => 'FeedbackTypes', 'action' => 'view', $feedback->feedback_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $feedback->has('user') ? $this->Html->link($feedback->user->username, ['controller' => 'Users', 'action' => 'view', $feedback->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($feedback->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Feedback Date') ?></th>
            <td><?= h($feedback->feedback_date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Feedback Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($feedback->feedback_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Feedback Result') ?></h4>
        <?= $this->Text->autoParagraph(h($feedback->feedback_result)); ?>
    </div>
</div>
