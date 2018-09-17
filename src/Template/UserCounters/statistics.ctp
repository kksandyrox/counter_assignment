<div class="row">
	<div class="col offset-l3 l6">
		<h4 class="center-align">Use Below Filters To Generate Statistics.</h4>
	</div>
</div>

<?php
	$startDateValue = !empty($startDate) ? $startDate : '';
	$endDateValue = !empty($endDate) ? $endDate : '';
	$counterNameValue = !empty($counterName) ? $counterName : '';
	$unitNameValue = !empty($unitName) ? $unitName : '';
?>
<div class="row">
	<?php echo $this->Form->create(null, array('url' => array('controller' => 'usercounters', 'action' => 'statistics'))) ;?>
 	<div class="col l3">
        <div class="input-field col s12">
 			<p>Counter</p>
            <input name="name" id="counter-name" type="text" class="autocomplete"  required="required" placeholder="Select Counter *" value="<?php echo $counterNameValue;?>">
        </div>
 	</div>
 	<div class="col l3">
		<div class="input-field col s12">
 			<p>Units</p>
			<input name="unit_name" type="text" id="unit-name" class="autocomplete" required="required" placeholder="Select Unit *" value="<?php echo $unitNameValue;?>">
		</div>
 	</div>
 	<div class="col l3">
 		<div class="input-field col s12">
 			<p>Start Date</p>
 			<input id="start-date" name="start_date" placeholder="Select Start Date *" required="required" type="text" class="datepicker" value="<?php echo $startDateValue;?>">
 		</div>
 	</div>
 	<div class="col l3">
 		<div class="input-field col s12">
 			<p>End Date</p>
 			<input id="end-date" name="end_date"  placeholder="Select End Date *" required="required" type="text" class="datepicker" value="<?php echo $endDateValue;?>">
 		</div>
 	</div>
 	<div class="row">
 		<div class="col offset-l5 l3">
 			<?php echo $this->Form->submit('Generate', array('class' => 'btn'));?>
 		</div>
 	</div>
 	<?php echo $this->Form->end();?>
</div>

<?php if(!empty($chartValue) || !empty($labels) || !empty($zzz)) :?>
	<div class="row">
		 <canvas id="myChart"></canvas>
	</div>
	<input type="hidden" name="" id = "stat-values" data-values='<?php echo $chartValue;?>'>
	<input type="hidden" name="" id = "labels" data-values='<?php echo $labels;?>'>
	<input type="hidden" name="" id = "zzz" data-values='<?php echo $zzz;?>'>
<?php endif;?>
