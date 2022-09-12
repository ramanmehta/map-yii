<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\MapPoi $model */
/** @var ActiveForm $form */
?>
<div class="map-create_location">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name') ?>
        <!-- <?= $form->field($model, 'latitude') ?>
        <?= $form->field($model, 'longitude') ?> -->
        <br>
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- map-create_location -->
