    <?php foreach ($data as $key => $value) : ?>
        <?php if ($value['sender'] != session()->get('id')) : ?>
            <div class="mb-2 row pe-2 ">
                <p class="from-them"><?= $value['message'] ?></p>
                <span class="text-secondary"><?= date('d/m/Y H.i', strtotime($value['timestamp'])) ?></span>
            </div>
        <?php else : ?>
            <div class="mb-2 row pe-2  d-flex justify-content-end flex-column">
                <p class="from-me"><?= $value['message'] ?></p>
                <span class="text-secondary text-end"><?= date('d/m/Y H.i', strtotime($value['timestamp'])) ?></span>
            </div>
        <?php endif ?>
    <?php endforeach ?>