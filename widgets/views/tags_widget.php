<div class="widget widget--tags">
    <h3 class="widget__heading"><?= $heading ?></h3>
    <div class="widget__body">
        <ul class="tag-list">
        <?php foreach ($tags as $t): ?>
            <li class="tag-list__item">
                <?= a($t, ['/ads', 'tag' => $t], [
                    'title' => $t,
                    'class' => 'tag-list__link'
                ]) ?>
            </li>
        <?php endforeach ?>
        </ul>
    </div>
</div>