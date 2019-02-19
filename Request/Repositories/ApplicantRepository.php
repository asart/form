<?php

namespace app\Request\Repositories;

use app\Request\Models\Applicant;
use yii\db\ActiveRecord;

class ApplicantRepository
{
    public function get($id) : Applicant
    {
        if (!($applicant = Applicant::findOne($id))) {
            throw new NotFoundException('Applicant is not found');
        }

        return $applicant;
    }

    /**
     * @param $value
     * @return Applicant|ActiveRecord
     */
    public function getByEmail($value): Applicant
    {
        if (!$applicant = Applicant::find()->where(['email' => $value])->one()) {
            throw new NotFoundException('Email not found.');
        }

        return $applicant;
    }

    public function checkByEmail($value): bool
    {
        return Applicant::find()->where(['email' => $value])->exists();
    }

    public function getAll() : array
    {
        return Applicant::find()->all();
    }

    public function save(Applicant $applicant)
    {
        if (!$applicant->save()) {
            throw new \RuntimeException('Applicant saving error');
        }
    }

    public function remove(Applicant $applicant)
    {
        if (!$applicant->delete()) {
            throw new \RuntimeException('Applicant removing error');
        }
    }

    public function query()
    {
        return Applicant::find()->orderBy(['id' => SORT_DESC]);
    }
}
