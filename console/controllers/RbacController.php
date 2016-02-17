<?php
/**
 * Created by PhpStorm.
 * User: qianyt
 * Date: 16-2-17
 * Time: 下午4:20
 */
namespace console\controllers;

class RbacController extends \yii\console\Controller
{
    public function actionInit()
    {
        $auth = new \yii\rbac\PhpManager;

        // add "createPost" permission
        // 添加”创建文章”许可
        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);

        // add "updatePost" permission
        // 添加”更新文章”许可
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Update post';
        $auth->add($updatePost);

        // add "author" role and give this role the "createPost" permission
        // 添加“作者”角色，接着赋予这个角色“创建文章”的许可
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $createPost);
        //$auth->addChild($author, $reader);

        // add "admin" role and give this role the "updatePost" permission
        // 添加“管理员”角色，接着赋予这个角色“更新文章”的许可
        // as well as the permissions of the "author" role
        // 与“作者角色的一样
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updatePost);
        $auth->addChild($admin, $author);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // 分配角色给用户。1和2是用户ID，用IdentityInterface::getId()获取到的
        // usually implemented in your User model.
    }
}