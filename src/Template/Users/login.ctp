<?php
	$myTemplates = [
	    'inputContainer' => '{{content}}',
	];
	$this->Form->setTemplates($myTemplates);
?>
<div class="row">
	<div class="col l6 offset-l3 s12">
        <div class="row">
            <div class="col l6 offset-l3 s6 offset-s3">
		      <h3>Sign In</h3>
            </div>
        </div>
		<?php
			echo $this->Form->create(null, array('url' => array('controller' => 'users', 'action' => 'login')))
		;?>
		<div class="row">
			<div class="input-field col s12">
				<?php
					echo $this->Form->control('email', array(
						'class' => 'form-control validate',
                        'required',
                        'label' => 'Email *'
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
                        'required',
                        'label' => 'Password *'
						)
					);
				?>
			</div>
		</div>
		<div class="row">
			<div class="input-field col l6">
				<?php
					echo $this->Form->submit('Sign In', array('class' => 'btn'));
				?>
			</div>
			<div class="input-field col l6">
				<p>Not a member? <a href="/users/register">Sign Up</a></p>
			</div>
		</div>

		<?php echo $this->Form->end();?>
	</div>
</div>
