<div class="row">
    <div class="col-lg-6">
        <?php Flasher::flash(); ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">
            Insert Student Data
        </button>
        <h3 class="mt-4">Student List</h3>
        <ul class="list-group">
            <?php foreach ($data['students'] as $student) {?>
            <li class="list-group-item">
                <?= $student['name']?>
                <a href="<?= BASE_URL?>/student/destroy/<?= $student['id']?>" class="badge text-bg-danger float-end ms-1" onclick="return confirm('Are you sure?');">delete</a>
                <a href="<?= BASE_URL?>/student/detail/<?= $student['id']?>" class="badge text-bg-primary float-end ms-1">detail</a>
            </li>
            <?php }?>
        </ul>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalTitle">Insert Student Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= BASE_URL?>/student/store" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="npm">NPM</label>
                        <input type="number" class="form-control" id="npm" name="npm">
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="major">Major</label>
                        <select class="form-select" id="major" name="major">
                            <option value="Informatics">Informatics</option>
                            <option value="Information System">Information System</option>
                            <option value="Sports Education">Sports Education</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Insert Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
