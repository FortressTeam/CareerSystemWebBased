<div class="row">
    <div class="col-md-3">
        <div class="row row-centered">
            <div class="col-xs-6 col-xs-offset-3 col-md-offset-0 col-md-12">
                <?= $this->Form->create($applicant, ['type' => 'file', 'class' => 'card']); ?>
                    <?= $this->Html->image(
                        'user_img' . DS . $applicant->user->user_avatar,
                        ['class' => 'border-white border-xl img-responsive col-xs-12 no-padding', 'id' => 'companyImage']);
                    ?>
                    <?php if($editable): ?>
                    <div class="btn btn-icon-toggle" id="buttonCompanyImage"><i class="fa fa-camera"></i></div>
                    <div class="hidden">
                        <?= $this->Form->input('user_img', ['type' => 'file', 'id' => 'imputCompanyImage']) ?>
                    </div>
                    <?php endif; ?>
                <?= $this->Form->end() ?>
                <?php if((isset($loggedUser['group_id'])) && ($loggedUser['group_id'] == '2')): ?>
                <?php $followed = (isset($applicant->follow[0]->follow_applicant) && ($applicant->follow[0]->follow_applicant == '1')); ?>
                <?= $this->Form->button(
                    $followed ? 'UNFOLLOW' : 'FOLLOW',
                    [
                        'type' => 'button',
                        'class' => ($followed ? 'btn-primary' : 'btn-default-light') . ' btn btn-raised ink-reaction btn-block',
                        'id' => 'buttonFollowApplicant',
                        'data-applicantid' => $applicant->id,
                        'data-hiringManagerid' => $loggedUser['id'],
                        'data-value' => $followed ? '0' : '1',
                    ]
                ) ?><br/>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-xs-12">
                <div class="card editable">
                    <div class="card-head">
                        <header>About me</header>
                        <?php if($editable): ?>
                        <div class="tools">
                            <div class="btn-group">
                                <?= $this->Form->button('<i class="fa fa-pencil"></i>',
                                    [
                                        'type' => 'button',
                                        'class' => 'btn btn-icon-toggle btn-OpenForm',
                                        'data-form' => 'aboutMe'
                                    ],
                                    [ 'escape' => false ]
                                ) ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <div id="aboutMePanel" class="animated fadeIn">
                            <span class="text-xl">I'm <b id="textName"><?= h($applicant->applicant_name) ?></b></span><br/>
                            <span class="text-lg" id="textMajor"><?= $applicant->major->major_name ?></span><hr class="hr-mini" />
                            <p id="textAbout"><?= h($applicant->applicant_about); ?></p>
                            <p id="textObjective"><?= h($applicant->applicant_objective); ?></p>
                        </div>
                        <?php if($editable): ?>
                        <div id="aboutMeForm" class="animated fadeIn" style="display: none">
                            <?= $this->Form->create($applicant, [
                                    'class' => 'form',
                                    'templates' => [
                                        'formGroup' => '{{label}}{{input}}',
                                        'inputContainer' => '<div class="form-group floating-label col-md-6">{{content}}</div>'
                                    ]
                                ])
                            ?>
                            <?php 
                                echo $this->Form->input('applicant_name', [
                                    'class' => 'form-control',
                                    'id' => 'inputName'
                                ]);
                                echo $this->Form->input('major_id', [
                                    'class' => 'form-control',
                                    'id' => 'inputMajor',
                                    'options' => $majors
                                ]);
                                echo $this->Form->input('applicant_about', [
                                    'class' => 'form-control',
                                    'id' => 'inputAbout',
                                    'style' => 'height: 90px; overflow: hidden; resize: none'
                                ]);
                                echo $this->Form->input('applicant_objective', [
                                    'class' => 'form-control',
                                    'id' => 'inputObjective',
                                    'style' => 'height: 90px; overflow: hidden; resize: none'
                                ]);
                                echo $this->Form->button(__('Save'), [
                                    'type' => 'button',
                                    'class' => 'btn ink-reaction btn-raised btn-primary',
                                    'id' => 'buttonEditAboutMe',
                                    'data-form' => 'aboutMe',
                                    'data-id' => $applicant->id,
                                ]);
                                echo $this->Form->button(__('Cancel'), [
                                    'type' => 'button',
                                    'class' => 'btn ink-reaction btn-flat btn-primary btn-CloseForm',
                                    'data-form' => 'aboutMe',
                                ]); 
                                echo $this->Form->end();
                            ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="card editable">
                    <div class="card-head">
                        <header>Personal information</header>
                        <?php if($editable): ?>
                        <div class="tools">
                            <div class="btn-group">
                                <?= $this->Form->button('<i class="fa fa-pencil"></i>',
                                    [
                                        'type' => 'button',
                                        'class' => 'btn btn-icon-toggle btn-OpenForm',
                                        'data-form' => 'personalInfo'
                                    ],
                                    [ 'escape' => false ]
                                ) ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <div id="personalInfoPanel" class="animated fadeIn">
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Age: </b><i id="textAge"><?= intval(date('Y')) - intval($applicant->applicant_date_of_birth->format('Y')), ' Years'; ?></i>
                                </div>
                                <div class="col-sm-6">
                                    <b>Address: </b><i id="textAddress"><?= h($applicant->applicant_address) ?></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Phone: </b><i id="textPhone"><?= h($applicant->applicant_phone_number) ?></i>
                                </div>
                                <div class="col-sm-6">
                                    <b>Website: </b><i id="textWebsite"><?= h($applicant->applicant_website) ?></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Sex: </b><i id="textSex"><?= $applicant->applicant_sex ? __('Male') : __('Female'); ?></i>
                                </div>
                                <div class="col-sm-6">
                                    <b>Marital: </b><i id="textMarital"><?= $applicant->applicant_marital_status ?  __('Married') : __('Single') ?></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Email: </b><i id="textEmail"><?= h($applicant->user->user_email) ?></i>
                                </div>
                                <div class="col-sm-6">
                                    <b>Register: </b><i id="textRegister"><?= h($applicant->user->user_registered->format('d-M-Y')) ?></i>
                                </div>
                            </div>
                        </div>
                        <?php if($editable): ?>
                        <div id="personalInfoForm" class="animated fadeIn padd-10" style="display: none">
                            <?= $this->Form->create($applicant, [
                                    'class' => 'form',
                                    'templates' => [
                                        'formGroup' => '{{label}}{{input}}',
                                        'nestingLabel' => '<div class="checkbox checkbox-styled"><label{{attrs}}>{{input}}<span>{{text}}</span></label></div>',
                                        'inputContainer' => '<div class="form-group floating-label col-sm-6">{{content}}</div>'
                                    ]
                                ])
                            ?>
                            <?php
                                echo '<div class="form-group floating-label col-sm-6"><label for="inputBirthDay">Date of birth</label><input type="date" name="applicant_date_of_birth" class="form-control dirty" id="inputBirthDay" required="required" value="' , $applicant->applicant_date_of_birth->format('Y-m-d'), '"></div>';
                                echo $this->Form->input('applicant_address', [
                                    'label' => 'Address',
                                    'class' => 'form-control',
                                    'id' => 'inputAddress'
                                ]);
                                echo $this->Form->input('applicant_phone_number', [
                                    'label' => 'Phone Number',
                                    'class' => 'form-control',
                                    'id' => 'inputPhone'
                                ]);
                                echo $this->Form->input('applicant_website', [
                                    'label' => 'Website',
                                    'class' => 'form-control',
                                    'id' => 'inputWebsite'
                                ]);
                                echo $this->Form->input('applicant_sex', [
                                    'label' => 'Sex (Male)',
                                    'class' => 'form-control',
                                    'id' => 'inputSex'
                                ]);
                                echo $this->Form->input('applicant_marital_status', [
                                    'label' => 'Marital Status',
                                    'class' => 'form-control',
                                    'id' => 'inputMarital'
                                ]);
                                echo $this->Form->button(__('Save'), [
                                    'type' => 'button',
                                    'class' => 'btn ink-reaction btn-raised btn-primary',
                                    'id' => 'buttonEditPersonalInfo',
                                    'data-form' => 'personalInfo',
                                    'data-id' => $applicant->id,
                                ]);
                                echo $this->Form->button(__('Cancel'), [
                                    'type' => 'button',
                                    'class' => 'btn ink-reaction btn-flat btn-primary btn-CloseForm',
                                    'data-form' => 'personalInfo',
                                ]);
                                echo $this->Form->end()
                            ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-head">
                        <header>Education</header>
                    </div>
                    <div class="card-body no-padding">
                        <div class="row">
                            <div class="col-xs-12">
                                <ul class="list divider-full-bleed">
                                    <li class="divider-full-bleed"></li>
                                    <?php foreach ($applicant->personal_history as $personalHistory): ?>
                                    <?php if(h($personalHistory->personal_history_type_id) === '1'): ?>
                                    <li class="tile">
                                        <a class="tile-content ink-reaction">
                                            <div class="tile-text">
                                                <span class="text-medium text-upcase"><?= h($personalHistory->personal_history_title) ?></span>
                                                <span class="text-default-light pull-right">
                                                    <?= $personalHistory->has('personal_history_start') ? h($personalHistory->personal_history_start->format('M Y')) : '' ?> 
                                                    - <?= $personalHistory->has('personal_history_end') ? h($personalHistory->personal_history_end->format('M Y')) : 'Now' ?>
                                                </span>
                                                <small class="text-default-dark">
                                                    <?= h($personalHistory->personal_history_detail) ?>
                                                </small>
                                            </div>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card no-margin">
                            <div class="card-head">
                                <header>Experience</header>
                            </div>
                        </div>
                        <div class="tab-pane" id="activity">
                            <ul class="timeline collapse-lg timeline-hairline">
                                <?php foreach ($applicant->personal_history as $personalHistory): ?>
                                <?php if(h($personalHistory->personal_history_type_id) === '2'): ?>
                                <li>
                                    <div class="timeline-circ circ-xl style-primary"><i class="fa fa-briefcase"></i></div>
                                    <div class="timeline-entry">
                                        <div class="card">
                                            <div class="card-body small-padding">
                                                <p>
                                                    <span class="text-medium text-upcase"><?= h($personalHistory->personal_history_title) ?></span><br>
                                                    <span class="text-default-light">
                                                        <?= $personalHistory->has('personal_history_start') ? h($personalHistory->personal_history_start->format('M Y')) : '' ?> 
                                                        - <?= $personalHistory->has('personal_history_end') ? h($personalHistory->personal_history_end->format('M Y')) : 'Now' ?>
                                                    </span>
                                                </p>
                                                <?= h($personalHistory->personal_history_detail) ?>
                                            </div>
                                        </div>
                                    </div><!--end .timeline-entry -->
                                </li>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card no-margin">
                            <div class="card-head">
                                <header>Activities</header>
                            </div>
                        </div>
                        <div class="tab-pane" id="activity">
                            <ul class="timeline collapse-lg timeline-hairline">
                                <?php foreach ($applicant->personal_history as $personalHistory): ?>
                                <?php if(h($personalHistory->personal_history_type_id) === '3'): ?>
                                <li>
                                    <div class="timeline-circ circ-xl style-primary"><i class="fa fa-users"></i></div>
                                    <div class="timeline-entry">
                                        <div class="card">
                                            <div class="card-body small-padding">
                                                <p>
                                                    <span class="text-medium text-upcase"><?= h($personalHistory->personal_history_title) ?></span><br>
                                                    <span class="text-default-light">
                                                        <?= $personalHistory->has('personal_history_start') ? h($personalHistory->personal_history_start->format('M Y')) : '' ?> 
                                                        - <?= $personalHistory->has('personal_history_end') ? h($personalHistory->personal_history_end->format('M Y')) : 'Now' ?>
                                                    </span>
                                                </p>
                                                <?= h($personalHistory->personal_history_detail) ?>
                                            </div>
                                        </div>
                                    </div><!--end .timeline-entry -->
                                </li>
                                <?php endif; ?>
                                <?php if(h($personalHistory->personal_history_type_id) === '4'): ?>
                                <li>
                                    <div class="timeline-circ circ-xl style-primary"><i class="fa fa-certificate"></i></div>
                                    <div class="timeline-entry">
                                        <div class="card">
                                            <div class="card-body small-padding">
                                                <p>
                                                    <span class="text-medium text-upcase"><?= h($personalHistory->personal_history_title) ?></span><br>
                                                    <span class="text-default-light">
                                                        Date: <?= $personalHistory->has('personal_history_start') ? h($personalHistory->personal_history_start->format('M Y')) : '' ?>
                                                    </span>
                                                </p>
                                                <?= h($personalHistory->personal_history_detail) ?>
                                            </div>
                                        </div>
                                    </div><!--end .timeline-entry -->
                                </li>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="card editable">
                    <div class="card-head">
                        <header>Skills</header>
                        <?php if($editable): ?>
                        <div class="tools">
                            <div class="btn-group">
                                <?= $this->Form->button('<i class="fa fa-pencil"></i>',
                                    [
                                        'type' => 'button',
                                        'class' => 'btn btn-icon-toggle btn-OpenForm btn-OpenChangeChart',
                                        'data-form' => 'skills'
                                    ],
                                    [ 'escape' => false ]
                                ) ?>
                            </div>
                        </div> 
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <div class="animated fadeIn">
                            <ul id="skillSlider" class="skill-graph" data-id="<?= $applicant->id ?>"></ul>
                        </div>
                        <?php if($editable): ?>
                        <div  id="skillsForm" class="animated fadeIn" style="display: none">
                            <?= $this->Form->create($applicant, [
                                    'class' => 'form',
                                    'templates' => [
                                        'formGroup' => '{{label}}{{input}}',
                                        'inputContainer' => '<div class="form-group floating-label col-md-6">{{content}}</div>'
                                    ]
                                ])
                            ?>
                            <?php
                                echo $this->Form->input('skill_name', [
                                    'class' => 'form-control findable',
                                    'id' => 'inputSkillId',
                                    'options' => $skills
                                ]);
                                echo $this->Form->input('skill_level', [
                                    'class' => 'form-control',
                                    'id' => 'inputSkillLevel',
                                    'options' => [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5]
                                ]);
                                    echo $this->Form->button(__('Add'), [
                                    'type' => 'button',
                                    'class' => 'btn ink-reaction btn-raised btn-success',
                                    'id' => 'buttonAddSkills',
                                    'data-form' => 'skills',
                                    'data-id' => $applicant->id,
                                ]);
                                echo $this->Form->button(__('Cancel'), [
                                    'type' => 'button',
                                    'class' => 'btn ink-reaction btn-flat btn-primary btn-CloseForm btn-CloseChangeChart',
                                    'data-form' => 'skills',
                                ]);
                                echo $this->Form->end();
                            ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="card editable">
                    <div class="card-head">
                        <header>Hobbies</header>
                        <?php if($editable): ?>
                        <div class="tools">
                            <div class="btn-group">
                                <?= $this->Form->button('<i class="fa fa-pencil"></i>',
                                    [
                                        'type' => 'button',
                                        'class' => 'btn btn-icon-toggle btn-OpenForm btn-OpenLabel',
                                        'data-form' => 'hobbies'
                                    ],
                                    [ 'escape' => false ]
                                ) ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <div class="animated fadeIn">
                            <div id="listHobbies" class="animated fadeIn" data-id="<?= $applicant->id ?>"></div>
                        </div>
                        <?php if($editable): ?>
                        <div id="hobbiesForm" class="animated fadeIn" style="display: none">
                            <?= $this->Form->create($applicant, [
                                    'class' => 'form',
                                    'templates' => [
                                        'formGroup' => '{{label}}{{input}}',
                                        'inputContainer' => '<div class="form-group floating-label col-md-12">{{content}}</div>'
                                    ]
                                ])
                            ?>
                            <?php
                                echo $this->Form->input('hobby_name', [
                                    'class' => 'form-control findable',
                                    'id' => 'inputHobbyId',
                                    'options' => $hobbies
                                ]);
                                    echo $this->Form->button(__('Add'), [
                                    'type' => 'button',
                                    'class' => 'btn ink-reaction btn-raised btn-success',
                                    'id' => 'buttonAddHobbies',
                                    'data-form' => 'hobbies',
                                    'data-id' => $applicant->id,
                                ]);
                                echo $this->Form->button(__('Cancel'), [
                                    'type' => 'button',
                                    'class' => 'btn ink-reaction btn-flat btn-primary btn-CloseForm btn- btn-CloseLabel',
                                    'data-form' => 'hobbies',
                                ]);
                                echo $this->Form->end();
                            ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>        

<?php if((isset($loggedUser['group_id'])) && ($loggedUser['group_id'] == '1')): ?>
<div class="row">
    <div class="col-md-9 col-md-offset-3">
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
                            $applicant->applicant_status ? 'ON' : 'OFF',
                            [
                                'type' => 'button',
                                'class' => ($applicant->applicant_status ? 'btn-primary' : 'btn-default') . ' btn ink-reaction btn-block',
                                'id' => 'buttonChangeStatus',
                                'data-controller' => 'applicants',
                                'data-id' => $applicant->id,
                                'data-field' => 'applicant_status',
                                'data-value' => $applicant->applicant_status ? '0' : '1',
                            ]
                        ) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--     <div class="col-sm-6">
        <div class="card">
            <div class="card-head style-danger">
                <header>Danger Zone</header>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-8">
                        <h4><b>Delete this applicant</b></h4>
                    </div>
                    <div class="col-xs-4">
                        <?= $this->Form->postLink(
                                'Delete',
                                ['action' => 'delete', $applicant->id],
                                ['class' => 'btn ink-reaction btn-flat btn-danger col-xs-12', 'escape' => false, 'confirm' => __('Once you delete a applicant, there is no going back. Please be certain. Are you sure you want to delete # {0}?', $applicant->id)]
                            )
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>
<?php endif; ?>
<script type="text/javascript">
/* ------------------------------------------- */
/* 2. Applicant
 --------------------------------------------- */
$('#buttonFollowApplicant').click(function(){
    var applicantId = $(this).data('applicantid');
    var hiringManagerID = $(this).data('hiringmanagerid');
    var value = $(this).data('value');
    var data = {
        "applicant_id": applicantId,
        "hiring_manager_id": hiringManagerID,
        "follow_applicant": value
    };
    var dataJSON = JSON.stringify(data);
    $.ajax({
        type: 'POST',
        url: $('#webInfo').data('url') + '/api/follow' ,
        contentType: 'application/json',
        dataType: 'json',
        data: dataJSON,
        success: function(data){
            if(data['message'] == 'Saved'){
                if(data['follow']['follow_applicant']){
                    $('#buttonFollowApplicant')
                        .html('UNFOLLOW')
                        .data('value', '0')
                        .removeClass('btn-default-light')
                        .addClass('btn-primary');
                }
                else{
                    $('#buttonFollowApplicant')
                        .html('FOLLOW')
                        .data('value', '1')
                        .removeClass('btn-primary')
                        .addClass('btn-default-light');
                }
            }
        },
        error: function(message){
            console.log(message);
        }
    });
});
/* ------------------------------------------- */
/* 2.1. Applicant: About Me
 --------------------------------------------- */
$('.editable').find('#buttonEditAboutMe').click(function(){
    var data ={
        "applicant_name": $('#inputName').val(),
        "applicant_about": $('#inputAbout').val(),
        "applicant_objective": $('#inputObjective').val(),
        "major_id": $('#inputMajor').val(),
    };
    var applicantId = $(this).data('id');
    var formName = $(this).data('form');
    var dataJSON = JSON.stringify(data);
    $.ajax({
        type: 'PUT',
        url: $('#webInfo').data('url') + '/api' + '/applicants' + '/' + applicantId,
        contentType: 'application/json',
        dataType: 'json',
        data: dataJSON,
        success: function(response){
            if(response['message'] == 'Saved'){
                $('#textName').text(response['applicant']['applicant_name']);
                $('#textMajor').text(response['applicant']['major']['major_name']);
                $('#textAbout').text(response['applicant']['applicant_about']);
                $('#textObjective').text(response['applicant']['applicant_objective']);
                closeForm(formName);
            }
        }
    });
});

/* ------------------------------------------- */
/* 2.2. Applicant: Personal information
 --------------------------------------------- */
$('.editable').find('#buttonEditPersonalInfo').click(function(){
    var data ={
        "applicant_date_of_birth":  $('#inputBirthDay').val(),
        "applicant_address":        $('#inputAddress').val(),
        "applicant_phone_number":   $('#inputPhone').val(),
        "applicant_website":        $('#inputWebsite').val(),
        "applicant_sex":            $('#inputSex').is(':checked'),
        "applicant_marital_status": $('#inputMarital').is(':checked'),
    };
    var applicantId = $(this).data('id');
    var formName = $(this).data('form');
    var dataJSON = JSON.stringify(data);
    $.ajax({
        type: 'PUT',
        url: $('#webInfo').data('url') + '/api' + '/applicants' + '/' + applicantId,
        contentType: 'application/json',
        dataType: 'json',
        data: dataJSON,
        success: function(response){
            if(response['message'] == 'Saved'){
                var d = new Date(response['applicant']['applicant_date_of_birth']).getYear();
                var c = new Date().getYear();
                $('#textAge').text((c - d) + ' Years');
                $('#textAddress').text(response['applicant']['applicant_address']);
                $('#textPhone').text(response['applicant']['applicant_phone_number']);
                $('#textWebsite').text(response['applicant']['applicant_website']);
                $('#textSex').text(response['applicant']['applicant_sex'] ? 'Male' : 'Female');
                $('#textMarital').text(response['applicant']['applicant_marital_status'] ? 'Married' : 'Single');
                closeForm(formName);
            }
        }
    });
});


/* ------------------------------------------- */
/* 2.3. Applicant: Skills
 --------------------------------------------- */
$(document).ready(function(){
    loadSkills($('#skillSlider'));
    $(window).scroll(function(event){
        if(($('#skillSlider').length) && ($(this).scrollTop() > $('#skillSlider').offset().top - 400)){
            $('#skillSlider').find('.skill-inner').height(function(){
                return $(this).data('level') * 200 / 5;
            });
        }
    });
});
function loadSkills(parent){
    $.ajax({
        type: 'GET',
        url: $('#webInfo').data('url')
                    + '/api'
                    + '/applicants_has_skills' 
                    + '?applicant_id='
                    + parent.data('id'),
        dataType: 'json',
        success: function(response){
            $.each(response.applicantsHasSkills, function(index, value){
                $(parent).addSkillColumn({
                    id: value.skill.id,
                    name: value.skill.skill_name,
                    level: value.skill_level,
                    applicant: parent.data('id')
                });
            });
        },
        error: function(message){
            console.log(message);
        }
    });
}
$('.btn-OpenChangeChart').click(function(){
    $('#skillSlider>.single-skill>.skill-inner').addClass('heightEditable');
    $('#skillSlider>.single-skill>.skill-inner>.btn-remove').show();
    $('#skillSlider').find('.skill-inner').each(function(){
        $('.editable').find('#inputSkillId>option[value="' + $(this).data('id') + '"]').remove();
    });
});
$('.btn-CloseChangeChart').click(function(){
    $('#skillSlider>.single-skill>.skill-inner').removeClass('heightEditable');
    $('#skillSlider>.single-skill>.skill-inner>.btn-remove').hide();
});
$('.editable').find('#buttonAddSkills').click(function(){
    $('#skillSlider').addSkillColumn({
        id: $('#inputSkillId').val(),
        name: $('#inputSkillId>option[value="' + $('#inputSkillId').val() + '"]').text(),
        level: $('#inputSkillLevel').val(),
        edit: 'heightEditable',
        applicant: $(this).data('id')
    });
    
    var data = {
        "applicant_id": $(this).data('id'),
        "skill_id": $('#inputSkillId').val(),
        "skill_level": $('#inputSkillLevel').val()
    };
    var dataJSON = JSON.stringify(data);
    $.ajax({
        type: 'POST',
        url: $('#webInfo').data('url')
                + '/api' 
                + '/applicants_has_skills',
        contentType: 'application/json',
        dataType: 'json',
        data: dataJSON,
        error: function(error){
            alert('Error when change skill level. Please try again!')
        }
    });

    $('.editable').find('#inputSkillId>option[value="' + $('#inputSkillId').val() + '"]').remove();
    $('#skillSlider').find('.skill-inner').height(function(){
        return $(this).data('level') * 200 / 5;
    });
});

/* ------------------------------------------- */
/* 2.4. Applicant: Hobbies
 --------------------------------------------- */
$(document).ready(function(){
    loadHobbies($('#listHobbies'));
});
function loadHobbies(parent){
    $.ajax({
        type: 'GET',
        url: $('#webInfo').data('url')
                    + '/api'
                    + '/applicants_has_hobbies' 
                    + '?applicant_id='
                    + parent.data('id'),
        dataType: 'json',
        success: function(response){
            $.each(response.applicantsHasHobbies, function(index, value){
                $(parent).addHobbiesLabel({
                    id: value.hobby.id,
                    name: value.hobby.hobby_name,
                    applicant: parent.data('id')
                });
            });
        },
        error: function(message){
            console.log(message);
        }
    });
};
$('.btn-OpenLabel').click(function(){
    $('#listHobbies>span>i').css('display', 'inherit');
});
$('.btn-CloseLabel').click(function(){
    $('#listHobbies>span>i').css('display', 'none');
});
$('.editable').find('#buttonAddHobbies').click(function(){
    $('#listHobbies').addHobbiesLabel({
        id: $('#inputHobbyId').val(),
        name: $('#inputHobbyId>option[value="' + $('#inputHobbyId').val() + '"]').text(),
        applicant: $(this).data('id'),
        edit: true
    });
    
    var data = {
        "applicant_id": $(this).data('id'),
        "hobby_id": $('#inputHobbyId').val()
    };
    var dataJSON = JSON.stringify(data);
    $.ajax({
        type: 'POST',
        url: $('#webInfo').data('url')
                + '/api' 
                + '/applicants_has_hobbies',
        contentType: 'application/json',
        dataType: 'json',
        data: dataJSON,
        error: function(error){
            alert('Error when change skill level. Please try again!')
        }
    });
});

</script>