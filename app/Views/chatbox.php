    <?php foreach ($data as $key => $value) : ?>
        <?php if ($value['sender'] == session()->get('id')) : ?>
            <li class="receiver">
                <p><?= $value['message'] ?></p>
                <span class="time"><?= date('d/m/Y H.i', strtotime($value['timestamp'])) ?></span>
            </li>

        <?php else : ?>
            <li class="sender">
                <p><?= $value['message'] ?></p>
                <span class="time"><?= date('d/m/Y H.i', strtotime($value['timestamp'])) ?></span>
            </li>
        <?php endif ?>
    <?php endforeach ?>