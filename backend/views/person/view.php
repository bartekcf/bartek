<?php

use backend\models\Person;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Person $model */

$this->title = 'Osoba';
$this->params['breadcrumbs'][] = ['label' => 'People', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$age = Person::calculateAge($model->birthdate);
$this->registerJsVar('full_name',$model->full_name);
$this->registerJsVar('age',$age);
$this->registerJsFile('/js/display-name.min.js', ['depends' => [\yii\web\JqueryAsset::class]]);

$normal = "Osoba ma $age lat <br>";
$ano = 'Osoba zanonimizowana <br>';
$person_age = $model->full_name === 'anonim' ? $ano : $normal;

?>
<div class="person-view">

    <?php

    $age = Person::calculateAge($model->birthdate);
        if ($age < 18) {
        echo 'Osoba ma mniej niz 18 lat lub została zanonimizowana<br>';
        echo \yii\bootstrap5\Html::img('@web/img/od18lat.jpg', ['class' => 'img-fluid']);
    } else {
            echo '<p>'.  Html::a('Anonimizuj', ['person/anonymize', 'id' => $model->id], ['class' => 'btn btn-danger', 'data' => ['method' => 'post']])  . '</p>';
        echo DetailView::widget([
            'model' => $model,
            'attributes' => [
                'full_name',
                'email:email',
                'phone',
                'birthdate',
                [
                    'attribute' => 'gender',
                    'value' => $model->getTranslatedGenderName()
                ],
                'description:ntext',
            ],
        ]);
        echo $person_age;
        echo '<button id="display-data" class="btn btn-success">POKAZ DANE</button>';
    }
    ?>
</div>


