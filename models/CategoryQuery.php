<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Category]].
 *
 * @see Category
 */
class CategoryQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        return $this->andWhere('is_active=1');
    }

    /**
     * @inheritdoc
     * @return Category[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Category|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function forHomePage()
    {
        return $this->where("parent_id IS NULL")->all();
    }
}
