<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="card">
            <div class="card-head style-danger">
                <header>Please update your information</header>
            </div>
            <div class="card-body">
                <?= $this->Form->create($applicant, [
                        'id' => 'form-update',
                        'class' => 'form',
                        'templates' => [
                            'formGroup' => '{{input}}{{label}}',
                            'nestingLabel' => '<div class="checkbox checkbox-styled"><label{{attrs}}>{{input}}<span>{{text}}</span></label></div>',
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ]
                    ])
                ?>
                <?php
                    echo $this->Form->input('applicant_name', ['class' => 'form-control', 'label' => 'Full Name']);
                    echo $this->Form->input('major_id', ['class' => 'form-control findable', 'options' => $majors]);
                    echo '<div class="form-group floating-label">
                            <label for="inputBirthDay">Date of birth</label>
                            <input type="date" name="applicant_date_of_birth" class="form-control dirty" id="inputBirthDay" required="required">
                        </div>';
                    echo $this->Form->input('applicant_address', ['class' => 'form-control', 'label' => 'Address']);
                    echo $this->Form->input('applicant_phone_number', ['class' => 'form-control', 'label' => 'Phone Number']);
                    echo $this->Form->input('applicant_website', ['class' => 'form-control', 'label' => 'Website', 'placeHolder' => 'http://']);
                    echo $this->Form->input('applicant_sex', ['class' => 'form-control', 'label' => 'Sex (Male)']);
                    echo $this->Form->input('applicant_marital_status', ['class' => 'form-control', 'label' => 'Marital Status']);
                    echo $this->Form->input('applicant_about', ['class' => 'form-control', 'label' => 'About']);
                    echo $this->Form->input('applicant_objective', ['class' => 'form-control', 'label' => 'Objective']);
                ?>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn ink-reaction btn-raised btn-primary btn-block']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
<?= $this->Html->script('jquery.validate.min') ?>
<script type="text/javascript">
$(document).ready(function(){
    $('#form-update').validate({
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
                this.submit();
            }
        },
        rules: {
            applicant_name: {
                required: true,
                minlength: 5
            },
            applicant_date_of_birth: {
                required: true,
            },
            applicant_address: {
                required: true,
            },
            applicant_phone_number: {
                required: true,
                rangelength: [9, 12],
                digits: true
            },
            applicant_website: {
                url: true
            },
            applicant_about: {
                required: true,
            },
            applicant_objective: {
                required: true,
            }
        },
        messages: {
            applicant_name: {
                required: 'Please enter your username!',
                minlength: 'Please enter a valid name!'
            },
            applicant_date_of_birth: {
                required: 'Please enter your date of birth!',
            },
            applicant_address: {
                required: 'Please enter your address!',
            },
            applicant_phone_number: {
                required: 'Please enter your phone number!',
                rangelength: 'Please enter a valid phone number!',
                digits: 'Please enter a valid phone number!'
            },
            applicant_website: {
                url: 'Please enter a valid url!'
            },
            applicant_about: {
                required: 'Please enter some description about yourself!',
            },
            applicant_objective: {
                required: 'Please enter your objective!',
            }
        }
    });
});
</script>
