<?php

namespace app\controllers;

use Yii;
use app\Request\Forms\RequestForm;
use yii\base\Module;
use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * SiteController constructor.
     * @param string $id
     * @param Module $module
     * @param array $config
     */
    public function __construct(
        $id,
        Module $module,
        array $config = []
    )
    {
        parent::__construct($id, $module, $config);
    }

    /**
     * @return mixed
     */
    public function actionIndex()
    {
        $form = new RequestForm();

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
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
