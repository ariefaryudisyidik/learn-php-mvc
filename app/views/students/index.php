<div class="row">
    <div class="col-6">
        <h3>Student List</h3>
        <ul class="list-group">
            <?php foreach ($data['students'] as $student) { ?>
            <li class="list-group-item d-flex justify-content-between alignt-items-center">
                <?= $student['name']?>
                <a href="<?= BASE_URL?>/student/detail/<?= $student['id']?>" class="badge text-bg-primary">detail</a>
            </li>
            <?php }?>
        </ul>
    </div>
</div>
