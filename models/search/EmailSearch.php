<?php

namespace app\models\search;

use Yii;
use app\models\Email;
use yii\data\ArrayDataProvider;
use yii\helpers\Url;

class EmailSearch extends Email
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email'], 'safe'],
        ];
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ArrayDataProvider
     */
    public function search($params)
    {
        $__content = file_get_contents(Url::to(sprintf('%s%s', Yii::getAlias('@web'), 'emails.txt')));
        $emails = preg_split("/\\r\\n|\\r|\\n/",  $__content);

        foreach ($emails as $key => $email){
            if(empty($email)){
                unset($emails[$key]);
            } else {
                $emails[$key] = [
                    'email' => $email
                ];
            }
        }

        $provider = new ArrayDataProvider([
            'allModels' => $emails,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => ['email'],
            ],
        ]);

        return $provider;
    }

}