<div class="row">
    <div class="col-6">
        <h3>Student List</h3>
        <?php foreach ($data['students'] as $student) { ?>
        <ul>
            <li><?= $student['name'] ?></li>
            <li><?= $student['npm'] ?></li>
            <li><?= $student['major'] ?></li>
            <li><?= $student['email'] ?></li>
        </ul>
        <?php }?>
    </div>
</div>
