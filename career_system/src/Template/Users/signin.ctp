<div class="row">
	<div class="col-sm-4">
		<?= $this->Form->create('', [
			'id' => 'form-signin',
			'class' => 'form',
			'templates' => [
				'formGroup' => '{{input}}{{label}}',
				'inputContainer' => '<div class="form-group floating-label">{{content}}</div>'
			]
		]) ?>
			<div class="card">
				<div class="card-body">
						 <div class="row">
	                    	<div class="col-xs-12">
		                        <a class="text-xxl text-primary text-xxl col-xs-4 row-centered"><i class="fa fa-facebook"> </i></a>
		                        <a class="text-xxl text-danger text-xxl col-xs-4 row-centered"><i class="fa fa-google-plus"> </i></a>  
		                        <a class="text-xxl text-primary text-xxl col-xs-4 row-centered"><i class="fa fa-twitter"> </i></a>         
	                    	</div>
	                    </div>
	                    <div class="row">
	                    	<div class="col-xs-12">
								<?= $this->Form->input('username', ['class' => 'form-control', 'autofocus']) ?>
								<?= $this->Form->input('password', ['class' => 'form-control']) ?>
								<div class="form-group floating-label">
									<div class="checkbox checkbox-styled">
										<label for="inputMarital">
											<input type="checkbox" name="applicant_marital_status" value="1" class="form-control static dirty" id="inputMarital">
											<span>Remenber me</span>
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row row-centered">
							<div class="col-xs-12">
								<?= $this->Html->link(
									__('Forgot your password?'),
									['controller' => 'Users', 'action' => 'lostpassword'],
									['class' => 'text-primary text-lg']
								)?>
							</div>
						</div>
						<?= $this->Form->button(__('SIGN IN'), ['class' => 'btn btn-raise btn-primary btn-block']); ?>
				</div>
			</div>
		<?= $this->Form->end() ?>		
	</div>
	<div class="col-sm-8">
		<div class="card">
			<div class="card-body"></div>
		</div>
	</div>
</div>
<?= $this->Html->script('jquery.validate.min') ?>
<script type="text/javascript">
$(document).ready(function(){
	$('#form-signin').validate({
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
			username: {
				required: true
			},
			password: {
				required: true
			}
		},
		messages: {
			username: {
				required: 'Please enter your username!'
			},
			password: {
				required: 'Please enter your password!',
			}
		}
	});
});
</script>