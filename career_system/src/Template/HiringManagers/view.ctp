<div class="row">
    <div class="col-sm-3">
        <div class="row row-centered">
            <div class="col-xs-6 col-xs-offset-3 col-sm-offset-0 col-sm-12">
                <?= $this->Form->create($hiringManager, ['type' => 'file', 'class' => 'card']); ?>
                    <?= $this->Html->image(
                        'company_img/' . $hiringManager->company_logo,
                        ['class' => 'img-circle border-white border-xl img-responsive col-xs-12 no-padding', 'id' => 'companyImage']);
                    ?>
                    <?php if($editable): ?>
                    <div class="btn btn-icon-toggle" id="buttonCompanyImage"><i class="fa fa-camera"></i></div>
                    <div class="hidden">
                        <?= $this->Form->input('company_image', ['type' => 'file', 'id' => 'imputCompanyImage']) ?>
                    </div>
                    <?php endif; ?>
                <?= $this->Form->end() ?>

                <?php if((isset($loggedUser['group_id'])) && ($loggedUser['group_id'] == '3')): ?>
                <?php $followed = (isset($hiringManager->follow[0]->follow_hiring_manager) && ($hiringManager->follow[0]->follow_hiring_manager == '1')); ?>
                <?= $this->Form->button(
                    $followed ? 'UNFOLLOW' : 'FOLLOW',
                    [
                        'type' => 'button',
                        'class' => ($followed ? 'btn-primary' : 'btn-default-light') . ' btn btn-raised ink-reaction btn-block',
                        'id' => 'buttonFollowHiringManager',
                        'data-applicantid' => $loggedUser['id'],
                        'data-hiringManagerid' => $hiringManager->id,
                        'data-value' => $followed ? '0' : '1',
                    ]
                ) ?><br/>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-sm-9">
        <div class="card editable">
            <div class="card-head">
                <header>Company infomation</header>
                <?php if($editable): ?>
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
                <?php endif; ?>
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
                <?php if($editable): ?>
                <div id="companyInfoForm" class="animated fadeIn" style="display: none">
                    <?= $this->Form->create($hiringManager, [
                            'id' => 'form-companyInfo',
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
                        'class' => 'btn ink-reaction btn-raised btn-primary',
                        'id' => 'buttonEditCompanyInfo',
                        'data-form' => 'companyInfo',
                        'data-id' => $hiringManager->id,
                    ]) ?>
                    <?= $this->Form->button(__('Cancel'), [
                        'class' => 'btn ink-reaction btn-flat btn-primary btn-CloseForm',
                        'data-form' => 'companyInfo',
                        'formnovalidate'
                    ]) ?>
                    <?= $this->Form->end() ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="card editable">
            <div class="card-head">
                <header>About company</header>
                <?php if($editable): ?>
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
                <?php endif; ?>
            </div>
            <div class="card-body">
                <div id="companyAboutPanel" class="animated fadeIn">
                    <i id="textAbout"><?= $hiringManager->company_about; ?></i>
                </div>
                <?php if($editable): ?>
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
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-primary">Posts</h2>
                <div class="row">
                    <?php foreach ($hiringManager->posts as $post): ?>
                    <div class="col-lg-6 animated zoomIn">
                        <div class="card card-underline">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xs-4 row-centered">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <?= $this->Html->image(
                                                    'company_img/' . $hiringManager->company_logo,
                                                    ['class' => 'img-circle border-gray border-xl img-responsive'])
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-8">
                                        <h4 class="text-primary title-post">
                                            <?= $this->Html->link(
                                                $post->post_title,
                                                ['controller' => 'posts', 'action' => 'view', 'slug' => Cake\Utility\Inflector::slug($post->post_title), 'id' => $post->id])
                                            ?>
                                        </h4>
                                        <h5 class="text-primary title-post">
                                            <?= $this->Html->link(
                                                $hiringManager->company_name,
                                                ['controller' => 'HiringManagers', 'action' => 'view', 'slug' => Cake\Utility\Inflector::slug($hiringManager->company_name), 'id' => $hiringManager->id],
                                                ['escape' => false, 'class' => 'text-primary']);
                                            ?>
                                        </h5>
                                        <div class="row no-margin">
                                            <div class="col-sx-12 text-default-light"> 
                                                <?php
                                                    $start = date_create($post->post_date->format('Y-m-d'));
                                                    $end = date_create(date("Y-m-d"));
                                                    $date = date_diff($start, $end)->format('%a');
                                                    if($date < 1)
                                                        echo 'Today';
                                                    else if($date < 2)
                                                        echo 'Yesterday';
                                                    else if($date < 30)
                                                        echo $date, ' days ago';
                                                    else
                                                        echo $post->post_date->format('d-M-Y');
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body no-padding style-default-light">
                                <div class="row no-margin text-default-light">
                                    <div class="col-xs-6 item-post">
                                        <i class="fa fa-map-marker fa-fw" aria-hidden="true"></i> <?= $post->has('post_location') ? h($post->post_location) : '' ?><br/>
                                    </div>
                                    <div class="col-xs-6 item-post">
                                        <i class="fa fa-usd fa-fw" aria-hidden="true"></i> <?= $post->has('post_salary') ? $this->Number->currency($post->post_salary, 'VND', ['pattern' => 'VND #,###.00']) : '' ?><br/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
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
                <header>Change hiring manager's status</header>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-8">
                        <h4><b>Active/Inactive</b></h4>
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
<!--     <div class="col-lg-6">
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
    </div> -->
</div>
<?php endif; ?>

<?= $this->Html->script('jquery.validate.min') ?>
<script type="text/javascript">
/* ------------------------------------------- */
/* 1. Hiring manager
 --------------------------------------------- */
$('#buttonFollowHiringManager').click(function(){
    var applicantId = $(this).data('applicantid');
    var hiringManagerID = $(this).data('hiringmanagerid');
    var value = $(this).data('value');
    var data = {
        "applicant_id": applicantId,
        "hiring_manager_id": hiringManagerID,
        "follow_hiring_manager": value
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
                if(data['follow']['follow_hiring_manager']){
                    $('#buttonFollowHiringManager')
                        .html('UNFOLLOW')
                        .data('value', '0')
                        .removeClass('btn-default-light')
                        .addClass('btn-primary');
                }
                else{
                    $('#buttonFollowHiringManager')
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
/* 1.1. Hiring manager: Company Infomation
 --------------------------------------------- */

$('.editable').find('#form-companyInfo').validate({
    errorElement: "span",
    errorLabelContainer: "form-group",
    success: function(label) {
        $('#' + label.attr('id')).parent().removeClass('has-error');
        $('#' + label.attr('id')).remove();
    },
    errorPlacement: function(error, element) {
        error.addClass('help-block');
        error.insertAfter(element);
        element.parent().addClass('has-error');
    },
    submitHandler: function(form) {
        if(this.valid()) {
            editCompanyInfo($(form).find('#buttonEditCompanyInfo'));
        }
    },
    rules: {
        company_name: {
            required: true
        },
        hiring_manager_name: {
            required: true
        },
        company_size: {
            required: true,
            digits: true
        },
        hiring_manager_phone_number: {
            required: true,
            rangelength: [9, 12],
            digits: true
        },
        company_address: {
            required: true
        },
        company_email: {
            required: true,
            email: true
        }
    },
    messages: {
        company_name: {
            required: 'Please enter compant\'s name!'
        },
        hiring_manager_name: {
            required: 'Please enter your name!'
        },
        company_size: {
            required: 'Please enter size of company!',
            digits: 'Please enter a number!'
        },
        hiring_manager_phone_number: {
            required: 'Please enter your phone number!',
            rangelength: 'Please enter a valid phone number!',
            digits: 'Please enter a valid phone number!'
        },
        company_address: {
            required: 'Please enter company\'s address!'
        },
        company_email: {
            required: 'Please enter company\'s email!',
            email: 'Please enter a valid email'
        }
    }
});

var editCompanyInfo = function(element){
    var data = {
        "hiring_manager_name": $('#inputManagerName').val(),
        "hiring_manager_phone_number": $('#inputManagerPhone').val(),
        "company_name": $('#inputName').val(),
        "company_size": $('#inputSize').val(),
        "company_address": $('#inputAddress').val(),
        "company_email": $('#inputEmail').val()
    };
    var hiringManagerId = $(element).data('id');
    var formName = $(element).data('form');
    var dataJSON = JSON.stringify(data);
    $.ajax({
        type: 'PUT',
        url: $('#webInfo').data('url') + '/api' + '/hiring_managers' + '/' + hiringManagerId,
        contentType: 'application/json',
        dataType: 'json',
        data: dataJSON,
        success: function(response){
            if(response['message'] == 'Saved'){
                $('#textManagerName').text(response['hiringManager']['hiring_manager_name']);
                $('#textManagerPhone').text(response['hiringManager']['hiring_manager_phone_number']);
                $('#textName').text(response['hiringManager']['company_name']);
                $('#textSize').text(response['hiringManager']['company_size'] + ' people');
                $('#textAddress').text(response['hiringManager']['company_address']);
                $('#textEmail').text(response['hiringManager']['company_email']);
                closeForm(formName);
            }
        } 
    });
};

/* ------------------------------------------- */
/* 1.2. Hiring manager: Company About
 --------------------------------------------- */
$('.editable').find('#buttonEditCompanyAbout').click(function(){
    var data ={
        "company_about": $('#inputAbout').val()
    };
    var hiringManagerId = $(this).data('id');
    var formName = $(this).data('form');
    var dataJSON = JSON.stringify(data);
    $.ajax({
        type: 'PUT',
        url: $('#webInfo').data('url') + '/api' + '/hiring_managers' + '/' + hiringManagerId,
        contentType: 'application/json',
        dataType: 'json',
        data: dataJSON,
        success: function(response){
            if(response['message'] == 'Saved'){
                $('#textAbout').text(response['hiringManager']['company_about']);
                closeForm(formName);
            }
        }
    });
});
/* ------------------------------------------- */
/* 1.3. Hiring manager: Company Image
 --------------------------------------------- */
$('#buttonCompanyImage').click(function(){
    $('#imputCompanyImage').click();
});
$('#imputCompanyImage').change(function(){
    if (this.files && this.files[0]){
        var reader = new FileReader();
        reader.onload = function (e){
            $('#companyImage').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    }
})
</script>