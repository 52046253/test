<?php
/**
 * Created by PhpStorm.
 * User: dengyun
 * Date: 2017/7/30
 * Time: 20:25
 */

namespace app\lib\exception;



use think\Exception;
use think\exception\Handle;
use think\Request;

class ExceptionHandler extends Handle
{
    private $code;
    private $mag;
    private $errorCode;
    // 还需要返回当前请求的URL

    public function render(Exception $e){
        if($e instanceof BaseException){
            $this->code = $e->code;
            $this->mag = $e->msg;
            $this->errorCode = $e->errorCode;

        } else {
            $this->code = 500;
            $this->mag = '服务器内部错误';
            $this->errorCode = '999';
        }
        $request = Request::instance();
        $result = [
            'msg' => $this->mag,
            'error_code' => $this->errorCode,
            'request_url' => $request->url()
        ];

        return json($result,$this->code);
    }
}