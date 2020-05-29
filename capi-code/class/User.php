<?php

/**
 * Created by PhpStorm.
 * User: cxymds
 * Date: 2017/5/17
 * Time: 17:39
 */
require_once __DIR__ . '/Error.php';

class User
{
    /**
     * s数据库连接对象
     * @var PDO
     */
    private $_db;

    /**
     * User constructor.
     * @param PDO $_db
     */
    public function __construct(PDO $_db)
    {
        $this->_db = $_db;
    }

    /**
     * 用户注册
     * @param $username string 用户名
     * @param $password string 用户密码
     * @return array
     * @throws Exception
     */
    public function register($username, $password)
    {
        if (empty($username)) {
            throw new Exception("用户名不能为空", Error::USERNAME_CONNOT_NULL);
        }
        if (empty($password)) {
            throw new Exception("用户密码不能为空", Error::USERPASS_COMMOT_MULL);
        }
        if ($this->_isUsernameExists($username)) {
            throw new Exception("用户名已经存在", Error::USERNAME_EXISTS);
        }

        $sql = "insert into `user`(`name`,`password`,`creat_time`) values(:username,:password,:addtime)";
        $addtime = date("Y-m-d H:i:s", time());
        $sm = $this->_db->prepare($sql);
        $password = $this->_md5($password);
        $sm->bindParam(':username', $username);
        $sm->bindParam(':password', $password);
        $sm->bindParam(':addtime', $addtime);

        if (!$sm->execute()) {
            throw new Exception("注册失败", Error::REGIDTER_FAIL);
        }
        return [
            'username' => $username,
            'user_id' => $this->_db->lastInsertId(),
            'addtime' => $addtime
        ];
    }

    /**
     * 用户登录
     * @param $username string 用户名
     * @param $password string 用户密码
     * @return mixed
     * @throws Exception
     */
    public function login($username, $password)
    {
        if (empty($username)) {
            throw new Exception("用户名不能为空", Error::USERNAME_CONNOT_NULL);
        }
        if (empty($password)) {
            throw new Exception("用户密码不能为空", Error::USERPASS_COMMOT_MULL);
        }
        $sql = "select * from `user` where `name`=:username and `password`=:password";
        $password = $this->_md5($password);
        $sm = $this->_db->prepare($sql);
        $sm->bindParam(':username', $username);
        $sm->bindParam(':password', $password);

        if (!$sm->execute()) {
            throw new Exception("登陆失败", Error::LOGIN_FAIL);
        }
        $re = $sm->fetch(PDO::FETCH_ASSOC);
        if (!$re) {
            throw new Exception("用户名或者密码错误", Error::USERNAME_OR_PASSWORD_ERROR);
        }
        return $re;
    }

    /**
     * 判断用户名是否已经存在
     * @param $username
     * @return bool
     */
    private function _isUsernameExists($username)
    {
        $sql = "select * from `user` where `name`=:username";
        $sm = $this->_db->prepare($sql);
        $sm->bindParam(':username', $username);

        $sm->execute();
        $re = $sm->fetch(PDO::FETCH_ASSOC);
        return !empty($re);
    }

    private function _md5($pass)
    {
        return md5($pass . SALT);
    }
}