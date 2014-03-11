<?php

/**
 * This is the model class for table "explorer".
 *
 * The followings are the available columns in table 'explorer':
 * @property integer $id
 * @property string $naam
 * @property string $status
 * @property integer $kampactie_id
 * @property string $ip
 *
 * The followings are the available model relations:
 * @property Kampactie $kampactie
 */
class Explorer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'explorer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('naam, status, kampactie_id', 'required'),
			array('kampactie_id', 'numerical', 'integerOnly'=>true),
			array('naam', 'length', 'max'=>50),
			array('status', 'length', 'max'=>12),
			array('ip', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, naam, status, kampactie_id', 'safe', 'on'=>'search'),
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
			'kampactie' => array(self::BELONGS_TO, 'Kampactie', 'kampactie_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'naam' => 'Naam',
			'status' => 'Status',
			'kampactie_id' => 'Kampactie',
			'ip' => 'IP adres',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('naam',$this->naam,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('kampactie_id',$this->kampactie_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Explorer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
