<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "flight".
 *
 * @property integer $id
 * @property string $number_flight
 * @property string $date_departure
 * @property integer $status
 * @property integer $departure_city_id
 * @property integer $arrival_city_id
 *
 * @property City $departureCity
 * @property City $arrivalCity
 * @property Ticket[] $tickets
 */
class Flight extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'flight';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['number_flight', 'date_departure', 'departure_city_id', 'arrival_city_id'], 'required',
			'message'=>'Поле обязателное для заполнения'],
			[['date_departure'], 'date', 'format' => 'y-m-d H:i:s',
			'message'=>'Неверный формат даты'],
            [['date_departure'], 'safe'],
            [['status', 'departure_city_id', 'arrival_city_id'], 'integer'],
            [['number_flight'], 'string', 'max' => 11],
            [['departure_city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['departure_city_id' => 'id']],
            [['arrival_city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['arrival_city_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number_flight' => 'Номер рейса',
            'date_departure' => 'Дата вылета (ГГГГ-ММ-ЧЧ чч:мм:сс)',
            'status' => 'Статус',
            'departure_city_id' => 'Город отправления',
            'arrival_city_id' => 'Город прибытия',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartureCity()
    {
        return $this->hasOne(City::className(), ['id' => 'departure_city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArrivalCity()
    {
        return $this->hasOne(City::className(), ['id' => 'arrival_city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Ticket::className(), ['flight_id' => 'id']);
    }
}
