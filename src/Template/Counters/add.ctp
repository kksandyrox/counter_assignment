<div class="row">
    <div class="col s12 l6 offset-l3">
        <?php
        echo $this->Form->create(false, array('url' => array('controller' => 'counters', 'action' => 'add')))
        ;?>
        <div class="row">
            <div class="col l12 s12 center-align">
              <h4>Add Counter</h4>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input name="name" id="counter-name" type="text" class="autocomplete"  required="required">
                <label for="counter-name">Counter Name *</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
              <input name="unit_name" type="text" id="unit-name" class="autocomplete" required="required">
              <label for="unit-name">Unit Of Measurement *</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input name = "quantity" id="quantity" type="number" required="required" min="1">
                <label for="quantity">Quantity *</label>
            </div>
        </div>
        <div class="row">
            <div class="col l6">
                <?php echo $this->Form->submit('Add', array('class' => 'btn'));?>
            </div>
            <div class="col l6 push-l3">
                <a href = "/users/dashboard" class="waves-effect waves-light btn">Cancel</a>
            </div>
        </div>
        <?php
            echo $this->Form->end();
        ?>
    </div>
</div>
<hr />
<div class="row">
    <h4>My Counters</h4>
    <table class="striped">
        <thead>
            <tr>
                <th>Counter Name</th>
                <th>Quantity</th>
                <th>Unit of Measurement</th>
                <th>Last Updated</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($myCounters as $counter):?>
                <tr>
                    <td><?php echo $counter['counter']['name'];?></td>
                    <td><?php echo $counter['quantity'];?></td>
                    <td><?php echo $counter['unit']['name'];?></td>
                    <td><?php echo $counter['modified'];?></td>
                    <td>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', 'controller' => 'userCounters', $counter['id']], ['confirm' => __('Are you sure you want to delete this counter?'), 'class' => 'waves-effect waves-light btn ']) ?>
                        <a class="waves-effect waves-light btn modal-trigger" href="#modal1" data-userCounterId = "<?php echo $counter['id'];?>">Update</a>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>


<div id="modal1" class="modal">
    <div class="modal-content">
        <div class="row">
            <div class="col s12 l6 offset-l3">
                <h4>Update Quantity</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12 l6 offset-l3">
            <?php
            echo $this->Form->create(false, array('url' => array('controller' => 'usercounters', 'action' => 'edit'), 'id' => 'user-counter-edit-form'))
            ;?>
            <input type="hidden" id="user-counter-id-modal" name="user_counter_id">
            <div class="row">
                <div class="input-field col s12">
                    <input name = "quantity" id="quantity-modal" type="number" placeholder ="Quantity *" required="required" min="1">
                    <label for="quantity-modal">Quantity *</label>
                </div>
            </div>
            <div class="row">
                <div class="col l6">
                    <?php echo $this->Form->submit('Update', array('class' => 'btn'));?>
                </div>
                <div class="col l6 push-l3">
                    <a href = "/counters/add" class="waves-effect waves-light btn">Cancel</a>
                </div>
            </div>
            <?php
            echo $this->Form->end();
            ?>
        </div>
    </div>
</div>
