<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Feedback Type'), ['action' => 'edit', $feedbackType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Feedback Type'), ['action' => 'delete', $feedbackType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $feedbackType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Feedback Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Feedback Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Feedbacks'), ['controller' => 'Feedbacks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Feedback'), ['controller' => 'Feedbacks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="feedbackTypes view large-9 medium-8 columns content">
    <h3><?= h($feedbackType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Feedback Type Name') ?></th>
            <td><?= h($feedbackType->feedback_type_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($feedbackType->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Feedbacks') ?></h4>
        <?php if (!empty($feedbackType->feedbacks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Feedback Title') ?></th>
                <th><?= __('Feedback Comment') ?></th>
                <th><?= __('Feedback Date') ?></th>
                <th><?= __('Feedback Result') ?></th>
                <th><?= __('Feedback Type Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($feedbackType->feedbacks as $feedbacks): ?>
            <tr>
                <td><?= h($feedbacks->id) ?></td>
                <td><?= h($feedbacks->feedback_title) ?></td>
                <td><?= h($feedbacks->feedback_comment) ?></td>
                <td><?= h($feedbacks->feedback_date) ?></td>
                <td><?= h($feedbacks->feedback_result) ?></td>
                <td><?= h($feedbacks->feedback_type_id) ?></td>
                <td><?= h($feedbacks->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Feedbacks', 'action' => 'view', $feedbacks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Feedbacks', 'action' => 'edit', $feedbacks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Feedbacks', 'action' => 'delete', $feedbacks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $feedbacks->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
