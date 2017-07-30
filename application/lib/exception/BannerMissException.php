<?php
/**
 * Created by PhpStorm.
 * User: dengyun
 * Date: 2017/7/30
 * Time: 20:39
 */

namespace app\lib\exception;


class BannerMissException extends BaseException
{
    public $code = 404;
    public $msg = '请求Banner不存在';
    public $errorCode = 40000;

}