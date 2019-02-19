<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\Request\Models\Request */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Form';
?>

<div class="request-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true])
        ->label('Адрес электронной почты *') ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])
        ->label('ФИО *') ?>

    <?= $form->field($model, 'php')->textInput(['maxlength' => true])
        ->label('Как вы оцениваете свой уровень знаний и навыков разработки на PHP? 
        Что знаете, чего не знаете, что вам нужно подтянуть, по вашей оценке, где добавить практики?') ?>

    <?= $form->field($model, 'sql')->textInput(['maxlength' => true])
        ->label('Тот же вопрос (см. выше), но про SQL') ?>

    <?= $form->field($model, 'css')->textInput(['maxlength' => true])
        ->label('Тот же вопрос, но про CSS') ?>

    <?= $form->field($model, 'js')->textInput(['maxlength' => true])
        ->label('Тот же вопрос, но про Javascript') ?>

    <?= $form->field($model, 'php_framework')->textInput(['maxlength' => true])
        ->label('Знакомы ли с PHP фреймворками? Изучали ли, имеете ли какой-либо опыт? Какой опыт, с какими фреймворками?') ?>

    <?= $form->field($model, 'js_framework')->textInput(['maxlength' => true])
        ->label('Адрес электронной почты *') ?>

    <?= $form->field($model, 'experience')->textInput(['maxlength' => true])
        ->label('Есть ли у вас опыт разработки/программирования? Какой? 
        Учавствовали ли в командной разработке? Делали ли свои проекты? Вообще, любой релевантный опыт') ?>

    <?= $form->field($model, 'study')->textInput(['maxlength' => true])
        ->label('Где вы изучали программирование и языки программирования? Самостоятельно или на курсах?') ?>

    <?= $form->field($model, 'age')->textInput(['maxlength' => true])
        ->label('Ваш возраст') ?>

    <?= $form->field($model, 'work')->textInput(['maxlength' => true])
        ->label('Работаете ли сейчас, учитесь? Кем/Где?') ?>

    <?= $form->field($model, 'income')->textInput(['maxlength' => true])
        ->label('Из каких источников планируете оплачивать долевое участие на протяжении года (200 долл. в месяц)?') ?>

    <?= $form->field($model, 'ability')->textInput(['maxlength' => true])
        ->label('Сможете ли вы, вообще, по вашим оценкам, год заниматься этим проектом?') ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true])
        ->label('Телефон') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>