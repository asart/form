<?php

namespace app\controllers;

use app\Request\Repositories\RequestRepository;
use app\Request\Models\Request;
use yii\base\Module;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

/**
 * RequestController class.
 */
class RequestController extends Controller
{
    /** @var RequestRepository */
    private $requestRepository;

    /**
     * RequestController constructor.
     * @param string $id
     * @param Module $module
     * @param RequestRepository $requestRepository
     * @param array $config
     */
    public function __construct(
        $id,
        Module $module,
        RequestRepository $requestRepository,
        array $config = []
    )
    {
        parent::__construct($id, $module, $config);
        $this->requestRepository = $requestRepository;
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Request::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @param $id
     * @return string
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->requestRepository->get($id),
        ]);
    }
}
