<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_faq".
 *
 * @property int $faq_id
 * @property string $question
 * @property string $answer
 */
class Faq extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_faq';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['question', 'answer'], 'required'],
            [['answer'], 'string'],
            [['question'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'faq_id' => 'Faq ID',
            'question' => 'Question',
            'answer' => 'Answer',
        ];
    }
}
