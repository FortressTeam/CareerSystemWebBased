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
    <div class="col-lg-12">
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
                <?= $this->Form->button(__('Submit'), ['class' => 'btn ink-reaction btn-raised btn-primary btn-block']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
<% if (strpos($action, 'add') === false): %>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head style-danger">
                <header>Danger Zone</header>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <h4><b>Delete this <%= $singularVar %></b></h4>
                        Once you delete a <%= $singularVar %>, there is no going back. Please be certain.
                    </div>
                    <div class="col-md-4">
                        <?= $this->Form->postLink(
                                'Delete',
                                ['action' => 'delete', $<%= $singularVar %>-><%= $primaryKey[0] %>],
                                ['class' => 'btn ink-reaction btn-flat btn-danger col-xs-12', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $<%= $singularVar %>-><%= $primaryKey[0] %>)]
                            )
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<% endif; %>
</div>
