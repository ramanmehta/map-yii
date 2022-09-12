<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\MapPoi $model */

$this->title = 'Create Map Poi';
$this->params['breadcrumbs'][] = ['label' => 'Map Pois', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="map-poi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
