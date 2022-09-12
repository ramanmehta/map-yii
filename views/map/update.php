<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\MapPoi $model */

$this->title = 'Update Map Poi: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Map Pois', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="map-poi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
