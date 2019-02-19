<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\Request\Models\Request */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="request-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'applicant_id',
            'php',
            'sql',
            'css',
            'js',
            'php_framework',
            'js_framework',
            'experience',
            'study',
            'work',
            'income',
            'ability',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
