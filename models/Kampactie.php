<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Kampactie extends ActiveRecord
{
    public function rules()
    {
        return [
            [['naam', 'datum'], 'required'],
            [['datum'], 'safe'],
            [['omschrijving'], 'string'],
            [['geld'], 'number'],
            [['naam'], 'string', 'max' => 255],
        ];
    }
        
    public function datumFormatted()
    {
        return Yii::$app->formatter->asDate($this->datum, 'EEEE d MMMM yyyy');
    }

    public function getPresent() {
        return $this->hasMany(Explorer::className(), [
            "kampactie_id" => "id",
        ])->where(["=", "status", "aanwezig"]);
    }

    public function getAbsent() {
        return $this->hasMany(Explorer::className(), [
            "kampactie_id" => "id",
        ])->where(["=", "status", "afwezig"]);
    }
}
