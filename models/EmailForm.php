<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\validators\EmailValidator;
use yii\widgets\ActiveForm;

class EmailForm extends Model
{

    /* @var $input string */
    public $input = '';

    /* @var $emails array */
    protected $emails = [];

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['input', 'required'],
            ['input', 'trim'],
            ['input', 'validateEmailItem'],
        ];
    }

    public function validateEmailItem($attribute)
    {
        $this->emails = explode(',', $this->$attribute);

        foreach ($this->emails as $email){
            if (!(new EmailValidator())->validate(trim($email))){
                $this->addError('input', 'An error present in your emails list, check the "' . $email . '" value');
                return false;
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'input' => 'email'
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeNotes()
    {
        return [
            'input' => 'May be multiply, separated by coma'
        ];
    }

    /**
     * Returns the text note for the specified attribute.
     * @param string $attribute the attribute name
     * @return string the attribute label
     * @see generateAttributeLabel()
     * @see attributeLabels()
     */
    public function getAttributeNote($attribute)
    {
        $labels = $this->attributeNotes();
        return isset($labels[$attribute]) ? $labels[$attribute] : '';
    }

    /**
     * Saver for all emails
     *
     * @return mixed
     */
    public function save()
    {
        $this->emails = explode(',', $this->input);
        $__errors = false;

        foreach ($this->emails as $key => $email) {
            $__model = new Email(['email' => $email]);
            $__model->validate() ? $__model->save() : $__errors = true;
        }

        return !$__errors ? true : false;
    }

}