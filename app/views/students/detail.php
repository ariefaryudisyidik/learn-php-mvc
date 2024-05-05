<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?= $data['student']['name']?></h5>
        <h6 class="card-subtitle mb-2 text-body-secondary"><?= $data['student']['npm']?></h6>
        <p class="card-text"><?= $data['student']['major']?></p>
        <p class="card-text"><?= $data['student']['email']?></p>
        <a href="<?= BASE_URL?>/student" class="btn btn-primary">Back</a>
    </div>
</div>
