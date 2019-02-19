<?php

namespace app\controllers;

use app\Request\Repositories\ApplicantRepository;
use app\Request\Repositories\RequestRepository;
use app\Request\Services\RequestService;
use Yii;
use app\Request\Forms\RequestForm;
use yii\base\Module;
use yii\web\Controller;

class SiteController extends Controller
{
    /** @var RequestService */
    private $requestService;

    /** @var ApplicantRepository */
    private $applicantRepository;

    /** @var RequestRepository */
    private $requestRepository;

    /**
     * SiteController constructor.
     * @param string $id
     * @param Module $module
     * @param RequestService $requestService
     * @param ApplicantRepository $applicantRepository
     * @param RequestRepository $requestRepository
     * @param array $config
     */
    public function __construct(
        $id,
        Module $module,
        RequestService $requestService,
        ApplicantRepository $applicantRepository,
        RequestRepository $requestRepository,
        array $config = []
    )
    {
        parent::__construct($id, $module, $config);
        $this->requestService = $requestService;
        $this->applicantRepository = $applicantRepository;
        $this->requestRepository = $requestRepository;
    }

    /**
     * @return mixed
     */
    public function actionIndex()
    {
        $form = new RequestForm();

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {

            if ( $this->applicantRepository->checkByEmail($form->email) )
                $applicant = $this->applicantRepository->getByEmail($form->email);
            else
                $applicant = $this->requestService->createApplicant($form);
                $this->applicantRepository->save($applicant);

            try {
                $request = $this->requestService->create($form, $applicant);
                $this->requestRepository->save($request);
                Yii::$app->session->setFlash('success', 'Success send!');

                return $this->redirect(['index']);
            } catch (\DomainException $e) {
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        return $this->render('index', [
            'model' => $form,
        ]);
    }
}
