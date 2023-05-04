<table class="table table-striped ">
    <thead>
        <tr>
        <th>#</th>
        <th>Emp Name</th>
        <th>Department</th>
        <th>Designation</th>
        <th>Joining Date</th>
        <th>Salary</th>
        </tr>
    </thead>
    <tbody>
    <?php for ($i = 0; $i < count($results); ++$i) { ?>
    <tr>
        <td><?php echo ($page+$i+1); ?></td>
        
    </tr>
    <?php } ?>
    </tbody>
</table>
<div id="ajax_links" class="text-center">
    <?php echo($links); ?>
</div>