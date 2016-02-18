<?php
/**
 * Created by PhpStorm.
 * User: qianyt
 * Date: 16-2-18
 * Time: 下午3:53
 */
namespace console\Controllers;

use yii;

class CommondController extends yii\console\Controller
{
    public function actionIndex(){
        echo "test";
    }
}