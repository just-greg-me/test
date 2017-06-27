<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Url;

/**
 * ContactForm is the model for one email item.
 */
class Email extends Model
{

    /**
     * @var $email string
     */
    public $email;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email'], 'required'],
            [['email'], 'trim'],
            ['email', 'email', 'message' => 'is not in valid format'],
            ['email', 'match', 'pattern' => '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/', 'message' => 'is not in valid format'],
        ];
    }

    /**
     * Saves new record to the file
     *
     * @return boolean
     */
    public function save()
    {
        return file_put_contents(Url::to(sprintf('%s%s', Yii::getAlias('@webroot'), '/emails.txt')), $this->email . "\n", FILE_APPEND);
    }

}