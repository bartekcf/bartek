<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Person $model */

$this->title = 'Utwórz osobę';
$this->params['breadcrumbs'][] = ['label' => 'Osoby', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
