<h4>Global Statistics</h4>
<table class="striped">
    <thead>
        <tr>
            <th>Counter Name</th>
            <th>Quantity</th>
            <th>Unit of Measurement</th>
            <th>Last Updated</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($dashboardStats as $stats):?>
            <tr>
                <td><?php echo $stats['counter_name'];?></td>
                <td><?php echo $stats['quantity'];?></td>
                <td><?php echo $stats['unit_name'];?></td>
                <td><?php echo $stats['last_updated'];?></td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>
<div class="row">
    <div class="col offset-l4 l3">
        <a href = "/counters/add" class="waves-effect waves-light btn"><i class="material-icons right">add</i>Add Counter</a>
    </div>
</div>
