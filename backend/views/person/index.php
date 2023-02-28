<?php

use yii\grid\SerialColumn;
use backend\models\Person;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\PersonSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Osoby';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="person-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Dodaj osobę', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],

            'id',
            'full_name',
            'email:email',
            'phone',
            'birthdate',
            //'gender',
            //'description:ntext',
            [
                'class' => ActionColumn::class,
                'template' => '{view}',
                'urlCreator' => static function ($action, Person $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>


