<?php

use kartik\datetime\DateTimePicker;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Person $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="person-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birthdate')->widget(DateTimePicker::class, [
        'pluginOptions' => [
            'containerCssClass' => 'form-select form-select-solid',
            'fontAwesome' => false,
            'format' => 'yyyy-mm-dd',
            'icons' => [
                'leftArrow' => 'fa fa-chevron-left',
                'rightArrow' => 'fa fa-chevron-right',
            ],
        ],
        'options' => [
            'id' => 'event-update-customer-end',
            'language' => 'pl'
        ]
    ]) ?>

    <?= $form->field($model, 'gender')->radioList( [0=>'Mężczyzna', 1 => 'Kobieta'] ) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Dodaj', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
