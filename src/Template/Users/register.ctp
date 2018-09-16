<?php 
	$myTemplates = [
	    'inputContainer' => '{{content}}',
	];
	$this->Form->setTemplates($myTemplates);
?>
<div class="row">
	<div class="col s6 offset-s3">
		<h3>Sign Up</h3>
		<?php 
			echo $this->Form->create($user, array('url' => array('controller' => 'users', 'action' => 'register')))
		;?>
		<div class="row">
			<div class="input-field col s6">
				<?php 
					echo $this->Form->control('first_name', array(
						'class' => 'form-control validate'
						)
					);
				?>
			</div>
			<div class="input-field col s6">
				<?php 
					echo $this->Form->control('last_name', array(
						'class' => 'form-control validate'
						)
					);
				?>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<?php 
					echo $this->Form->control('email', array(
						'class' => 'form-control validate'
						)
					);
				?>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<?php 
					echo $this->Form->control('password', array(
						'class' => 'form-control validate',
						'minLength' => 8
						)
					);
				?>
			</div>
		</div>
		<div class="row">
			<div class="col l6">
				<?php 
					echo $this->Form->submit('Sign Up', array('class' => 'btn'));
				?>
			</div>
			<div class="col l6">
				<p>Already a member? <a href="/users/login">Sign In</a></p>
			</div>
		</div>
		<?php echo $this->Form->end();?>
	</div>
</div>