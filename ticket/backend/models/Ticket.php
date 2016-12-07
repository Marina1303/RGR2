<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ticket".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $date_birth
 * @property integer $flight_id
 * @property integer $status_ticket
 *
 * @property Flight $flight
 */
class Ticket extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ticket';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'date_birth', 'flight_id'], 'required',
			'message'=>'Поле обязателное для заполнения'],
			[['date_birth'], 'date', 'format' => 'y-m-d',
			'message'=>'Неверный формат даты'],
            [['date_birth'], 'safe'],
            [['flight_id', 'status_ticket'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 200],
            [['flight_id'], 'exist', 'skipOnError' => true, 'targetClass' => Flight::className(), 'targetAttribute' => ['flight_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'Фамилия',
            'last_name' => 'Имя',
            'date_birth' => 'Дата рождения (ГГГГ-ММ-ЧЧ)',
			'phone_number' => 'Номер телефона:',
            'flight_id' => 'Flight ID',
            'status_ticket' => 'Статус',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlight()
    {
        return $this->hasOne(Flight::className(), ['id' => 'flight_id']);
    }
}
