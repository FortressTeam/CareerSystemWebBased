<div class="row">
    <div class="col-md-4 col-md-push-4">
        <div class="row row-centered">
            <div class="col-xs-6 col-xs-offset-3 col-md-offset-0 col-md-12">
                <?= $this->Form->create($applicant, ['type' => 'file', 'class' => 'card']); ?>
                    <div class="btn btn-icon-toggle" id="buttonCompanyImage"><i class="fa fa-camera"></i></div>
                    <?= $this->Html->image(
                        'user_img' . DS . $applicant->user->user_avatar,
                        ['class' => 'border-white border-xl img-responsive', 'id' => 'companyImage']);
                    ?>
                    <div class="hidden">
                        <?= $this->Form->input('company_image', ['type' => 'file', 'id' => 'imputCompanyImage']) ?>
                    </div>
                <?= $this->Form->end() ?>
                <?= $this->Html->link(
                        '<h3 id="textName">' . h($applicant->company_name) . '</h3>',
                        ['controller' => 'HiringManagers', 'action' => 'view', $applicant->id],
                        ['escape' => false, 'class' => 'text-primary']);
                ?>
                <?= $this->Html->link(
                        'FOLLOW',
                        [],
                        ['class' => 'btn ink-reactio btn-block btn-raised btn-primary']
                    );
                ?><br/>
                <?= $this->Html->link(
                        'FACEBOOK',
                        [],
                        ['class' => 'btn ink-reactio btn-flat btn-primary col-xs-4']
                    );
                ?>
                <?= $this->Html->link(
                        'GOOGLE+',
                        [],
                        ['class' => 'btn ink-reactio btn-flat btn-danger col-xs-4']
                    );
                ?>
                <?= $this->Html->link(
                        'TWITTER',
                        [],
                        ['class' => 'btn ink-reactio btn-flat btn-info col-xs-4']
                    );
                ?>
                <br/>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-md-pull-4">
        <h2 class="text-primary">HELLO</h2>
        <h3>I'm <b><?= h($applicant->applicant_name) ?></b></h3>
        <h4><?= $applicant->career_path->career_path_name ?></h4><hr/>
        <?= $this->Text->autoParagraph(h($applicant->applicant_about)); ?>
        <h2 class="text-primary">FUTURE GOALS</h2>
        <?= $this->Text->autoParagraph(h($applicant->applicant_future_goals)); ?>
    </div>
    <div class="col-md-4">
        <h2 class="text-primary">PERSONAL INFORMATION</h2>
        <ul class="list divider-full-bleed">
            <li class="tile">
                <a class="tile-content ink-reaction">
                    <div class="tile-icon">Age:</div>
                    <div class="tile-text"><?= date_diff(date_create($applicant->applicant_date_of_birth), date_create('today'))->y, ' Years'; ?></div>
                </a>
            </li>
            <li class="tile">
                <a class="tile-content ink-reaction">
                    <div class="tile-icon">Phone:</div>
                    <div class="tile-text"><?= h($applicant->applicant_phone_number) ?></div>
                </a>
            </li>
            <li class="tile">
                <a class="tile-content ink-reaction">
                    <div class="tile-icon">Email:</div>
                    <div class="tile-text"><?= h($applicant->user->user_email) ?></div>
                </a>
            </li>
            <li class="tile">
                <a class="tile-content ink-reaction">
                    <div class="tile-icon">Add:</div>
                    <div class="tile-text"><?= h($applicant->applicant_address) ?></div>
                </a>
            </li>
            <li class="tile">
                <a class="tile-content ink-reaction">
                    <div class="tile-icon">Sex:</div>
                    <div class="tile-text"><?= $applicant->applicant_sex ? __('Male') : __('Female'); ?></div>
                </a>
            </li>
            <li class="tile">
                <a class="tile-content ink-reaction">
                    <div class="tile-icon">Marital:</div>
                    <div class="tile-text"><?= $applicant->applicant_marital_status ? __('Single') : __('Married') ?></div>
                </a>
            </li>
            <li class="tile">
                <a class="tile-content ink-reaction">
                    <div class="tile-icon">Website:</div>
                    <div class="tile-text"><?= h($applicant->applicant_website) ?></div>
                </a>
            </li>
            <li class="tile">
                <a class="tile-content ink-reaction">
                    <div class="tile-icon">Register:</div>
                    <div class="tile-text"><?= h($applicant->user->user_registered->format('d-M-Y')) ?></div>
                </a>
            </li>
        </ul>
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
        <h4><?= __('Related Applicants Has Skills') ?></h4>
        <?php if (!empty($applicant->applicants_has_skills)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Applicant Id') ?></th>
                <th><?= __('Skill Id') ?></th>
                <th><?= __('Skill Level') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($applicant->applicants_has_skills as $applicantsHasSkills): ?>
            <tr>
                <td><?= h($applicantsHasSkills->applicant_id) ?></td>
                <td><?= h($applicantsHasSkills->skill_id) ?></td>
                <td><?= h($applicantsHasSkills->skill_level) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ApplicantsHasSkills', 'action' => 'view', $applicantsHasSkills->applicant_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ApplicantsHasSkills', 'action' => 'edit', $applicantsHasSkills->applicant_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ApplicantsHasSkills', 'action' => 'delete', $applicantsHasSkills->applicant_id], ['confirm' => __('Are you sure you want to delete # {0}?', $applicantsHasSkills->applicant_id)]) ?>
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
