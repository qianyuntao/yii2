<?php
/**
 * Created by PhpStorm.
 * User: qianyt
 * Date: 16-2-17
 * Time: 下午2:09
 */
namespace components;

use Yii;

class PhpManager extends \yii\rbac\PhpManager
{
    public function init()
    {
        parent::init();
        if (!Yii::$app->user->isGuest) {
            //我们假设用户的角色是存储在身份
            $this->assign(Yii::$app->user->identity->role, Yii::$app->user->identity->id);
        }
    }

}

?>