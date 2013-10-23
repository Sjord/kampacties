<?php

class KampactiesController extends Controller {
    function actionAdd($kampactie_id) {
        $status = $_POST['status'];
        $naam = $_POST['name'];

        $explo = Explorer::model()->findByAttributes(array(
            'kampactie_id' => $kampactie_id,
            'naam' => $naam,
        ));

        if (is_null($explo)) {
            $explo = new Explorer();
            $explo->kampactie_id = $kampactie_id;
            $explo->naam = $naam;
        }
        $explo->status = $status;
        $explo->save();

        $this->redirect($this->createUrl('site/index'));
    }
}
