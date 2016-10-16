<div class="widget widget--tags">
    <h3 class="widget__heading"><?= $heading ?></h3>
    <div class="widget__content">
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

<?php /*

<div class="box">
    <div class="box_title"><?=Yii::t('common', 'Latest Tags');?></div>
    <div class="box_content" style="padding-top:10px;">
        <?
        foreach ($tagsArray as $k){
            $tag = stripslashes($k->tag_text);
            echo CHtml::link($tag, array('ad/index', 'search_string' => stripslashes($k->tag_text)), array('title' => $tag, 'class' => 'tag_link'));
        }
        ?>
        <div class="clear"></div>
    </div>
</div>

*/ ?>