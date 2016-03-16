<%
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Utility\Inflector;

$fields = collection($fields)
    ->filter(function($field) use ($schema) {
        return $schema->columnType($field) !== 'binary';
    });

if (isset($modelObject) && $modelObject->behaviors()->has('Tree')) {
    $fields = $fields->reject(function ($field) {
        return $field === 'lft' || $field === 'rght';
    });
}
%>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-head style-primary">
                <header>Create a <%= $pluralVar %></header>
            </div>
            <div class="card-body">
                <?= $this->Form->create($<%= $singularVar %>, [
                        'class' => 'form',
                        'templates' => [
                            'formGroup' => '{{input}}{{label}}',
                            'nestingLabel' => '<div class="checkbox checkbox-styled"><label{{attrs}}>{{input}}<span>{{text}}</span></label></div>',
                            'inputContainer' => '<div class="form-group floating-label">{{content}}</div>'
                        ]
                    ])
                ?>
                <?php
<%
        foreach ($fields as $field) {
            if (in_array($field, $primaryKey)) {
                continue;
            }
            if (isset($keyFields[$field])) {
                $fieldData = $schema->column($field);
                if (!empty($fieldData['null'])) {
%>
                    echo $this->Form->input('<%= $field %>', ['class' => 'form-control', 'options' => $<%= $keyFields[$field] %>, 'empty' => true]);
<%
                } else {
%>
                    echo $this->Form->input('<%= $field %>', ['class' => 'form-control', 'options' => $<%= $keyFields[$field] %>]);
<%
                }
                continue;
            }
            if (!in_array($field, ['created', 'modified', 'updated'])) {
                $fieldData = $schema->column($field);
                if (in_array($fieldData['type'], ['date', 'datetime', 'time']) && (!empty($fieldData['null']))) {
%>
                    echo $this->Form->input('<%= $field %>', ['class' => 'form-control', 'empty' => true]);
<%
                } else {
%>
                    echo $this->Form->input('<%= $field %>', ['class' => 'form-control']);
<%
                }
            }
        }
        if (!empty($associations['BelongsToMany'])) {
            foreach ($associations['BelongsToMany'] as $assocName => $assocData) {
%>
                    echo $this->Form->input('<%= $assocData['property'] %>._ids', ['class' => 'form-control', 'options' => $<%= $assocData['variable'] %>]);
<%
            }
        }
%>
                ?>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn ink-reaction btn-raised btn-primary col-xs-12']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-head">
                <header><?= __('Actions') ?></header>
            </div>
            <div class="card-body no-padding">
                <ul class="list divider-full-bleed">
<% if (strpos($action, 'add') === false): %>
                    <li class="tile"><?= $this->Form->postLink(
                            '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                            <div class="tile-text">Delete</div>',
                            ['action' => 'delete', $<%= $singularVar %>-><%= $primaryKey[0] %>],
                            ['class' => 'tile-content ink-reaction', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $<%= $singularVar %>-><%= $primaryKey[0] %>)]
                        )
                    ?>
                    </li>
<% endif; %>
                    <li class="tile"><?= $this->Html->link(
                            '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                            <div class="tile-text">List <%= $pluralHumanName %></div>',
                            ['action' => 'index'],
                            ['class' => 'tile-content ink-reaction', 'escape' => false]) ?>
                    </li>
<%
        $done = [];
        foreach ($associations as $type => $data) {
            foreach ($data as $alias => $details) {
                if ($details['controller'] !== $this->name && !in_array($details['controller'], $done)) {
%>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">List <%= $this->_pluralHumanName($alias) %></div>',
                        ['controller' => '<%= $details['controller'] %>', 'action' => 'index'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]
                        ) ?>
                    </li>
                    <li class="tile"><?= $this->Html->link(
                        '<div class="tile-icon"><i class="fa fa-dot-circle-o"></i></div>
                        <div class="tile-text">New <%= $this->_singularHumanName($alias) %></div>',
                        ['controller' => '<%= $details['controller'] %>', 'action' => 'add'],
                        ['class' => 'tile-content ink-reaction', 'escape' => false]
                        ) ?>
                    </li>
<%
                    $done[] = $details['controller'];
                }
            }
        }
%>              </ul>
            </div>
        </div>
    </div>
</div>
