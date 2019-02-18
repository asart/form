<?php

namespace app\Request\Models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
/**
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $sex
 * @property integer $age
 * @property string $phone
 * @property integer $created_at
 * @property integer $update_at
 *
 * @property Request[] $requests
 */
class Applicant extends ActiveRecord
{
    /**
     * @param string $name
     * @param string $email
     * @param $sex
     * @param $age
     * @param $phone
     * @return Applicant
     */
    public static function create(
        string $name,
        string $email,
        $sex,
        $age,
        $phone
    ) : self
    {
        $model = new static();
        $model->name = $name;
        $model->email = $email;
        $model->sex = $sex;
        $model->age = $age;
        $model->phone = $phone;
        return $model;
    }

    public static function tableName() : string
    {
        return '{{%applicant}}';
    }
    public function behaviors() : array
    {
        return [
            TimestampBehavior::class
        ];
    }

    public function getRequests(): ActiveQuery
    {
        return $this->hasMany(Request::class, ['applicant_id' => 'id']);
    }
}
