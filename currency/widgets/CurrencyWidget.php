<?php
namespace app\modules\currency\widgets;

use yii\base\Widget;

class CurrencyWidget extends Widget{

    public function run(){
        return $this->render('currency-convertor');
    }
}
?>