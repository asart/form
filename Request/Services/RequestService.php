<?php

namespace app\Request\Services;

use app\Request\Models\Applicant;
use app\Request\Models\Request;
use app\Request\Forms\RequestForm;
use app\Request\Repositories\RequestRepository;

class RequestService
{
    private $requestRepository;

    public function __construct
    (
        RequestRepository $requestRepository
    )
    {
        $this->requestRepository = $requestRepository;
    }

    public function create(RequestForm $form, Applicant $applicant): Request
    {
        $request = Request::create(
            $applicant->id,
            $form->php,
            $form->sql,
            $form->css,
            $form->js,
            $form->php_framework,
            $form->js_framework,
            $form->experience,
            $form->study,
            $form->work,
            $form->income,
            $form->ability
        );

        return $request;
    }

    public function createApplicant(RequestForm $form): Applicant
    {
        $applicant = Applicant::create(
            $form->name,
            $form->email,
            $form->sex,
            $form->age,
            $form->phone
        );

        return $applicant;
    }
}
