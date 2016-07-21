<?php

class KampactiesController extends Controller {
    function actionAdd($kampactie_id) {
        $status = $_POST['status'];
        $naam = ucfirst(trim($_POST['name']));

        $explo = Explorer::model()->findByAttributes(array(
            'kampactie_id' => $kampactie_id,
            'naam' => $naam,
        ));

        if (is_null($explo)) {
            $explo = new Explorer();
            $explo->kampactie_id = $kampactie_id;
            $explo->naam = $naam;
            $explo->ip = $_SERVER['REMOTE_ADDR'];
        }
        $explo->status = $status;
        $explo->save();

        $cookie = new CHttpCookie('naam', $naam);
        $cookie->expire = strtotime('+1 year');
        $cookie->httpOnly = true;
        Yii::app()->request->cookies['naam'] = $cookie;

        $this->redirect($this->createUrl('site/index'));
    }
}
