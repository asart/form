<?php

namespace app\Request\Forms;

use yii\base\Model;

class RequestForm extends Model
{
    public $applicant_id;
    public $php;
    public $sql;
    public $css;
    public $js;
    public $php_framework;
    public $js_framework;
    public $experience;
    public $study;
    public $work;
    public $income;
    public $ability;

    public $name;
    public $email;
    public $sex;
    public $age;
    public $phone;

    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            [['age'], 'integer'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            [['name', 'email'], 'trim'],
            [
                [
                    'php', 'sql', 'css', 'js', 'php_framework', 'js_framework', 'experience', 'study', 'work', 'income',
                    'ability', 'name', 'sex', 'phone'
                ],
                'string'
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'applicant_id' => 'applicant_id',
            'php' => 'php',
            'sql' => 'sql',
            'css' => 'css',
            'js' => 'js',
            'php_framework' => 'php_framework',
            'js_framework' => 'js_framework',
            'experience' => 'experience',
            'study' => 'study',
            'work' => 'work',
            'income' => 'income',
            'ability' => 'ability'
        ];
    }
}
