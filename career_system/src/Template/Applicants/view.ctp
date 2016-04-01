<div class="row">
    <div class="col-md-3">
        <div class="row row-centered">
            <div class="col-xs-6 col-xs-offset-3 col-md-offset-0 col-md-12">
                <?= $this->Form->create($applicant, ['type' => 'file', 'class' => 'card']); ?>
                    <?= $this->Html->image(
                        'user_img' . DS . $applicant->user->user_avatar,
                        ['class' => 'border-white border-xl img-responsive', 'id' => 'companyImage']);
                    ?>
                    <div class="btn btn-icon-toggle" id="buttonCompanyImage"><i class="fa fa-camera"></i></div>
                    <div class="hidden">
                        <?= $this->Form->input('company_image', ['type' => 'file', 'id' => 'imputCompanyImage']) ?>
                    </div>
                <?= $this->Form->end() ?>
                <?= $this->Html->link( 'FOLLOW', [],
                        ['class' => 'btn ink-reactio btn-block btn-raised btn-primary']
                );?><br/>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-xs-12">
                <div class="card editable">
                    <div class="card-head">
                        <header>About me</header>
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
                    </div>
                    <div class="card-body">
                        <div id="aboutMePanel" class="animated fadeIn">
                            <span class="text-xl">I'm <b id="textName"><?= h($applicant->applicant_name) ?></b></span><br/>
                            <span class="text-lg" id="textCareerPath"><?= $applicant->career_path->career_path_name ?></span><hr class="hr-mini" />
                            <p id="textAbout"><?= h($applicant->applicant_about); ?></p>
                            <p id="textFutureGoals"><?= h($applicant->applicant_future_goals); ?></p>
                        </div>
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
                                echo $this->Form->input('applicant_name', ['class' => 'form-control', 'id' => 'inputName']);
                                echo $this->Form->input('career_path_id', ['class' => 'form-control', 'id' => 'inputCareerPath', 'options' => $careerPaths]);
                                echo $this->Form->input('applicant_about', ['class' => 'form-control', 'id' => 'inputAbout', 'style' => 'height: 90px; overflow: hidden; resize: none']);
                                echo $this->Form->input('applicant_future_goals', ['class' => 'form-control', 'id' => 'inputFutureGoals', 'style' => 'height: 90px; overflow: hidden; resize: none']);
                            ?>
                            <?= $this->Form->button(__('Save'), [
                                'type' => 'button',
                                'class' => 'btn ink-reaction btn-raised btn-primary',
                                'id' => 'buttonEditAboutMe',
                                'data-form' => 'aboutMe',
                                'data-id' => $applicant->id,
                            ]) ?>
                            <?= $this->Form->button(__('Cancel'), [
                                'type' => 'button',
                                'class' => 'btn ink-reaction btn-flat btn-primary btn-CloseForm',
                                'data-form' => 'aboutMe',
                            ]) ?>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="card editable">
                    <div class="card-head">
                        <header>Personal information</header>
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
                    </div>
                    <div class="card-body">
                        <div id="personalInfoPanel" class="animated fadeIn">
                            <div class="row">
                                <div class="col-md-6">
                                    <b>Age: </b><i class="textAge"><?= date_diff(date_create($applicant->applicant_date_of_birth), date_create('today'))->y, ' Years'; ?></i>
                                </div>
                                <div class="col-md-6">
                                    <b>Address: </b><i class="textAddress"><?= h($applicant->applicant_address) ?></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <b>Phone: </b><i class="textPhone"><?= h($applicant->applicant_phone_number) ?></i>
                                </div>
                                <div class="col-md-6">
                                    <b>Email: </b><i class="textEmail"><?= h($applicant->user->user_email) ?></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <b>Sex: </b><i class="textSex"><?= $applicant->applicant_sex ? __('Male') : __('Female'); ?></i>
                                </div>
                                <div class="col-md-6">
                                    <b>Marital: </b><i class="textMarital"><?= $applicant->applicant_marital_status ? __('Single') : __('Married') ?></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <b>Website: </b><i class="textWebsite"><?= h($applicant->applicant_website) ?></i>
                                </div>
                                <div class="col-md-6">
                                    <b>Register: </b><i class="textRegister"><?= h($applicant->user->user_registered->format('d-M-Y')) ?></i>
                                </div>
                            </div>
                        </div>
                        <div id="personalInfoForm" class="animated fadeIn padd-10" style="display: none">
                            <?= $this->Form->create($applicant, [
                                    'class' => 'form',
                                    'templates' => [
                                        'formGroup' => '{{label}}{{input}}',
                                        'nestingLabel' => '<div class="checkbox checkbox-styled"><label{{attrs}}>{{input}}<span>{{text}}</span></label></div>',
                                        'inputContainer' => '<div class="form-group floating-label col-md-6">{{content}}</div>'
                                    ]
                                ])
                            ?>
                            <?php 
                                echo $this->Form->input('applicant_date_of_birth', ['label' => 'Date of birth', 'class' => 'form-control', 'id' => 'inputBirthDay', 'data-inputmask' => '"\'alias\': \'date\'"']);
                                echo $this->Form->input('applicant_address', ['label' => 'Address', 'class' => 'form-control', 'id' => 'inputAddress']);
                                echo $this->Form->input('applicant_phone_number', ['label' => 'Phone Number', 'class' => 'form-control', 'id' => 'inputPhone']);
                                //echo $this->Form->input('applicant_email', ['class' => 'form-control', 'id' => 'inputFutureGoals']);
                                echo $this->Form->input('applicant_website', ['label' => 'Website', 'class' => 'form-control', 'id' => 'inputWebsite']);
                                echo $this->Form->input('applicant_sex', ['label' => 'Sex (Male)', 'class' => 'form-control', 'id' => 'inputSex']);
                                echo $this->Form->input('applicant_marital_status', ['label' => 'Marital Status', 'class' => 'form-control', 'id' => 'inputMarital']);
                            ?>
                            <?= $this->Form->button(__('Save'), [
                                'type' => 'button',
                                'class' => 'btn ink-reaction btn-raised btn-primary',
                                'id' => 'buttonEditPersonalInfo',
                                'data-form' => 'personalInfo',
                                'data-id' => $applicant->id,
                            ]) ?>
                            <?= $this->Form->button(__('Cancel'), [
                                'type' => 'button',
                                'class' => 'btn ink-reaction btn-flat btn-primary btn-CloseForm',
                                'data-form' => 'personalInfo',
                            ]) ?>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="card editable">
            <div class="card-head">
                <header>Skills</header>
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
            </div>
            <div class="card-body">
                <div class="animated fadeIn">
                    <ul id="skillSlider" class="skill-graph" data-id="<?= $applicant->id ?>"></ul><!-- Skill Here -->
                </div>
                <div  id="skillsForm" class="animated fadeIn" style="display: none">
                        <?= $this->Form->create($applicant, [
                                'class' => 'form',
                                'templates' => [
                                    'formGroup' => '{{label}}{{input}}',
                                    'inputContainer' => '<div class="form-group floating-label col-md-6">{{content}}</div>'
                                ]
                            ])
                        ?>

                        <?= $this->Form->input('skill_name', [
                            'class' => 'form-control findable',
                            'id' => 'inputSkillId',
                            'options' => $skills
                        ]) ?>
                        <?= $this->Form->input('skill_level', [
                            'class' => 'form-control',
                            'id' => 'inputSkillLevel',
                            'options' => [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5]
                        ]) ?>
                        <?= $this->Form->button(__('Add'), [
                            'type' => 'button',
                            'class' => 'btn ink-reaction btn-raised btn-success',
                            'id' => 'buttonAddSkills',
                            'data-form' => 'skills',
                            'data-id' => $applicant->id,
                        ]) ?>
                        <?= $this->Form->button(__('Save'), [
                            'type' => 'button',
                            'class' => 'btn ink-reaction btn-raised btn-primary',
                            'id' => 'buttonEditSkills',
                            'data-form' => 'skills',
                            'data-id' => $applicant->id,
                        ]) ?>
                        <?= $this->Form->button(__('Cancel'), [
                            'type' => 'button',
                            'class' => 'btn ink-reaction btn-flat btn-primary btn-CloseForm btn-CloseChangeChart',
                            'data-form' => 'skills',
                        ]) ?>
                        <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
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
                    <div class="col-xs-6">
                        <h4><b>Active</b></h4>
                    </div>
                    <div class="col-xs-6">
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
    <div class="col-lg-6">
        <div class="card">
            <div class="card-head style-danger">
                <header>Danger Zone</header>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <h4><b>Delete this applicant</b></h4>
                    </div>
                    <div class="col-md-4">
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
    </div>
</div>
<!-- <div class="applicants view large-9 medium-8 columns content">
    <div class="related">
        <h4><?= __('Related Applicants Follow Posts') ?></h4>
        <?php if (!empty($applicant->applicants_follow_posts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Applicant Id') ?></th>
                <th><?= __('Post Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($applicant->applicants_follow_posts as $applicantsFollowPosts): ?>
            <tr>
                <td><?= h($applicantsFollowPosts->applicant_id) ?></td>
                <td><?= h($applicantsFollowPosts->post_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ApplicantsFollowPosts', 'action' => 'view', $applicantsFollowPosts->applicant_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ApplicantsFollowPosts', 'action' => 'edit', $applicantsFollowPosts->applicant_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ApplicantsFollowPosts', 'action' => 'delete', $applicantsFollowPosts->applicant_id], ['confirm' => __('Are you sure you want to delete # {0}?', $applicantsFollowPosts->applicant_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Applicants Has Hobbies') ?></h4>
        <?php if (!empty($applicant->applicants_has_hobbies)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Applicant Id') ?></th>
                <th><?= __('Hobby Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($applicant->applicants_has_hobbies as $applicantsHasHobbies): ?>
            <tr>
                <td><?= h($applicantsHasHobbies->applicant_id) ?></td>
                <td><?= h($applicantsHasHobbies->hobby_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ApplicantsHasHobbies', 'action' => 'view', $applicantsHasHobbies->applicant_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ApplicantsHasHobbies', 'action' => 'edit', $applicantsHasHobbies->applicant_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ApplicantsHasHobbies', 'action' => 'delete', $applicantsHasHobbies->applicant_id], ['confirm' => __('Are you sure you want to delete # {0}?', $applicantsHasHobbies->applicant_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Appointments Has Applicants') ?></h4>
        <?php if (!empty($applicant->appointments_has_applicants)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Appointment Id') ?></th>
                <th><?= __('Applicant Id') ?></th>
                <th><?= __('User Rating') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($applicant->appointments_has_applicants as $appointmentsHasApplicants): ?>
            <tr>
                <td><?= h($appointmentsHasApplicants->appointment_id) ?></td>
                <td><?= h($appointmentsHasApplicants->applicant_id) ?></td>
                <td><?= h($appointmentsHasApplicants->user_rating) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AppointmentsHasApplicants', 'action' => 'view', $appointmentsHasApplicants->appointment_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AppointmentsHasApplicants', 'action' => 'edit', $appointmentsHasApplicants->appointment_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AppointmentsHasApplicants', 'action' => 'delete', $appointmentsHasApplicants->appointment_id], ['confirm' => __('Are you sure you want to delete # {0}?', $appointmentsHasApplicants->appointment_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Curriculum Vitaes') ?></h4>
        <?php if (!empty($applicant->curriculum_vitaes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Applicant Id') ?></th>
                <th><?= __('Curriculum Vitae Template Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($applicant->curriculum_vitaes as $curriculumVitaes): ?>
            <tr>
                <td><?= h($curriculumVitaes->id) ?></td>
                <td><?= h($curriculumVitaes->applicant_id) ?></td>
                <td><?= h($curriculumVitaes->curriculum_vitae_template_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CurriculumVitaes', 'action' => 'view', $curriculumVitaes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CurriculumVitaes', 'action' => 'edit', $curriculumVitaes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CurriculumVitaes', 'action' => 'delete', $curriculumVitaes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $curriculumVitaes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Follow') ?></h4>
        <?php if (!empty($applicant->follow)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Hiring Manager Id') ?></th>
                <th><?= __('Applicant Id') ?></th>
                <th><?= __('Follow Hiring Manager') ?></th>
                <th><?= __('Follow Applicant') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($applicant->follow as $follow): ?>
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
    </div>
    <div class="related">
        <h4><?= __('Related Personal History') ?></h4>
        <?php if (!empty($applicant->personal_history)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Personal History Title') ?></th>
                <th><?= __('Personal History Detail') ?></th>
                <th><?= __('Personal History Start') ?></th>
                <th><?= __('Personal History End') ?></th>
                <th><?= __('Personal History Type Id') ?></th>
                <th><?= __('Applicant Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($applicant->personal_history as $personalHistory): ?>
            <tr>
                <td><?= h($personalHistory->id) ?></td>
                <td><?= h($personalHistory->personal_history_title) ?></td>
                <td><?= h($personalHistory->personal_history_detail) ?></td>
                <td><?= h($personalHistory->personal_history_start) ?></td>
                <td><?= h($personalHistory->personal_history_end) ?></td>
                <td><?= h($personalHistory->personal_history_type_id) ?></td>
                <td><?= h($personalHistory->applicant_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PersonalHistory', 'action' => 'view', $personalHistory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PersonalHistory', 'action' => 'edit', $personalHistory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PersonalHistory', 'action' => 'delete', $personalHistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $personalHistory->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div> -->
