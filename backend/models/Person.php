<?php

namespace backend\models;

use DateTime;
use Exception;
use Yii;
use yii\bootstrap5\Html;

/**
 * This is the model class for table "person".
 *
 * @property int $id
 * @property string $full_name
 * @property string $email
 * @property string $phone
 * @property string $birthdate
 * @property int $gender
 * @property string|null $description
 */
class Person extends \yii\db\ActiveRecord
{
    public const GENDER = [
        '0' => 'Mężczyzna',
        '1' => 'Kobieta',
        '10' => 'anonim'
    ];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'email', 'phone', 'birthdate', 'gender'], 'required'],
            [['birthdate'], 'safe'],
            [['gender'], 'integer'],
            [['email'],'email', 'message' => 'Email nie poprawny'],
            [['description'], 'string'],
            [['full_name', 'email', 'phone'], 'string', 'max' => 255],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Imie i nazwisko',
            'email' => 'Email',
            'phone' => 'Numer telefonu',
            'birthdate' => 'Data urodzenia',
            'gender' => 'Plec',
            'description' => 'Opis',
        ];
    }

    /**
     * @param $birthdate
     * @return string
     * @throws Exception
     */
    public static function calculateAge($birthdate): string
    {
        if(!$birthdate ){
            return 0;
        }
        $currentDate = new DateTime();
        $birthdateDate = new DateTime($birthdate);
        return $birthdateDate->diff($currentDate)->y;
    }

    /**
     * Returns setting names in pl.
     *
     * @return string|null
     */
    public function getTranslatedGenderName(): ?string
    {
        return self::GENDER[$this->gender] ?? null;
    }

    public function anonymize(): void
    {
        $this->full_name = 'anonim';
        $this->email = 'anonim' . $this->id . '@anonim.pl';
        $this->phone = 0;
        $this->birthdate = 0;
        $this->gender = 10;
        $this->description = 'anonim';
        $this->save(false);
    }

}
