<div class="row">
    <div class="col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
        <div class="card">
            <div class="card-head">
                <header>Sign up as an Applicant</header>
            </div>
            <div class="card-body">
                <?= $this->Form->create('', [
                        'class' => 'form',
                        'id' => 'form-signup',
                        'templates' => [
                            'formGroup' => '{{input}}{{label}}',
                            'nestingLabel' => '<div class="checkbox checkbox-styled"><label{{attrs}}>{{input}}<span>{{text}}</span></label></div>',
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ]
                    ])
                ?>
                <?php
                    echo $this->Form->input('username', ['class' => 'form-control', 'type' => 'text']);
                    echo $this->Form->input('password', ['class' => 'form-control']);
                    echo $this->Form->input('reenter_password', ['class' => 'form-control', 'type' => 'password']);
                    echo $this->Form->input('user_email', ['class' => 'form-control', 'type' => 'email']);
                    echo $this->Form->input('user_avatar', ['type' => 'hidden', 'value' => 'default.png']);
                    echo $this->Form->input('group_id', ['type' => 'hidden', 'value' => '3']);
                ?>
				<div class="form-group floating-label no-padding">
					<div class="checkbox checkbox-styled">
						<label for="newsletter">
							<input type="checkbox" name="newsletter" value="1" class="form-control static dirty" id="newsletter" checked="checked">
							<span>Send me newsletters and promotions.</span>
						</label>
					</div>
				</div>
				<div class="form-group floating-label no-padding">
					<div class="checkbox checkbox-styled">
						<label for="agreement">
							<input type="checkbox" name="agreement" value="1" class="form-control static dirty" id="agreement">
							<span>I agree to the <a href="#" class="text-primary">Membership Agreement</a>.</span>
						</label>
					</div>
				</div>
                <?= $this->Form->button(__('Sign me up!'), ['class' => 'btn ink-reaction btn-raised btn-primary', 'id' => 'button-signiup']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
<?= $this->Html->script('jquery.validate.min') ?>
<script type="text/javascript">
	$('#form-signup').validate({
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
		rules: {
			username: {
				required: true
			},
			password: {
				required: true,
				rangelength: [6, 16]
			},
			reenter_password: {
				required: true,
				equalTo: "#password"
			},
			user_email: {
				required: true,
      			email: true
			}
		},
		messages: {
			username: {
				required: 'Please enter your username! '
			},
			password: {
				required: 'Please enter your password!',
				rangelength: 'Your password must be between {0} and {1} characters!'
			},
			reenter_password: {
				required: 'Please re-enter your password!',
				equalTo: 'Your new password and password confirmation must match!'
			},
			user_email: {
				required: 'Please enter your email!',
				email: 'Please enter a valid email!'
			}
		}
	});
</script>