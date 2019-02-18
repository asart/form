<?php

namespace app\Request\Models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * @property integer $id
 * @property integer $applicant_id
 * @property string $php
 * @property string $sql
 * @property string $css
 * @property string $js
 * @property string $php_framework
 * @property string $js_framework
 * @property string $experience
 * @property string $study
 * @property string $work
 * @property string $income
 * @property string $ability
 * @property integer $created_at
 * @property integer $update_at
 *
 * @property Applicant $applicant
 */
class Request extends ActiveRecord
{
    /**
     * @param integer $applicant_id
     * @param string $php
     * @param string $sql
     * @param string $css
     * @param string $js
     * @param string $php_framework
     * @param string $js_framework
     * @param string $experience
     * @param string $study
     * @param string $work
     * @param string $income
     * @param string $ability
     * @return Request
     */
    public static function create(
        int $applicant_id,
        $php,
        $sql,
        $css,
        $js,
        $php_framework,
        $js_framework,
        $experience,
        $study,
        $work,
        $income,
        $ability
    ) : self
    {
        $model = new static();
        $model->applicant_id = $applicant_id;
        $model->php = $php;
        $model->sql = $sql;
        $model->css = $css;
        $model->js = $js;
        $model->php_framework = $php_framework;
        $model->js_framework = $js_framework;
        $model->experience = $experience;
        $model->study = $study;
        $model->work = $work;
        $model->income = $income;
        $model->ability = $ability;

        return $model;
    }

    public static function tableName() : string
    {
        return '{{%request}}';
    }

    public function behaviors() : array
    {
        return [
            TimestampBehavior::class
        ];
    }

    public function getApplicant(): ActiveQuery
    {
        return $this->hasOne(Applicant::class, ['id' => 'applicant_id']);
    }
}