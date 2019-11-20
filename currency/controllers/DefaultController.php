<?php

namespace app\modules\currency\controllers;

use yii\web\Controller;

/**
 * Default controller for the `currency` module
 */
class DefaultController extends Controller
{

    public function actionConvertCurrency()
    {
        $data = [];
        $post = Yii::$app->request->post();
        $url = "https://www.google.com/search?q=".$post['from_currency']."+to+".$post['to_currency'];
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        $data = preg_split('/\D\s(.*?)\s=\s/', $result);
        $exhangeRate = (float) substr($data[1], 0, 7);
        $data['value'] = $post['amount'] * $exhangeRate;
        return json_encode($data);
    }
}
