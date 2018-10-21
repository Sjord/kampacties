<?php

namespace app\models;

use yii\db\ActiveRecord;

class Explorer extends ActiveRecord
{
    public function rules()
    {
        return [
            [['naam', 'status', 'kampactie_id'], 'required'],
            ['naam', 'trim'],
            ['naam', 'string', 'min' => 2, 'max' => 50],
            ['status', 'in', 'range' => ['aanwezig', 'afwezig']],
            ['kampactie_id', 'integer'],
        ];
    }

    public function existsInDatabase() {
        return Explorer::find()->where([
            "kampactie_id" => $this->kampactie_id,
            "naam" => $this->naam,
        ])->exists();
    }
}
