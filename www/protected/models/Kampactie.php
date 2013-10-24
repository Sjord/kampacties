<?php

/**
 * This is the model class for table "kampactie".
 *
 * The followings are the available columns in table 'kampactie':
 * @property string $naam
 * @property string $datum
 * @property string $omschrijving
 * @property integer $id
 *
 * The followings are the available model relations:
 * @property Explorer[] $explorers
 */
class Kampactie extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'kampactie';
	}

    public function scopes()
    {
        return array(
            'aankomende' => array(
                'order' => 'datum'
            )
        );
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('naam, datum, omschrijving', 'required'),
			array('naam', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('naam, datum, omschrijving, id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'explorers' => array(self::HAS_MANY, 'Explorer', 'kampactie_id'),
			'aanwezig' => array(self::HAS_MANY, 'Explorer', 'kampactie_id', 'on' => "aanwezig.status='aanwezig'"),
			'afwezig' => array(self::HAS_MANY, 'Explorer', 'kampactie_id', 'on' => "afwezig.status='afwezig'"),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'naam' => 'Naam',
			'datum' => 'Datum',
			'omschrijving' => 'Omschrijving',
			'id' => 'ID',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('naam',$this->naam,true);
		$criteria->compare('datum',$this->datum,true);
		$criteria->compare('omschrijving',$this->omschrijving,true);
		$criteria->compare('id',$this->id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Kampactie the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function datumFormatted()
    {
        $locale = CLocale::getInstance('nl');
        $formatter = $locale->getDateFormatter();
        return $formatter->format('EEEE d MMMM yyyy', $this->datum);
    }
}
