<?php
/**
 * Created by PhpStorm.
 * User: dengyun
 * Date: 2017/7/30
 * Time: 0:04
 */

namespace app\api\controller\v1;

use app\api\validate\IDMustBePostiveInt;
use app\api\model\Banner as BannerModel;
use app\lib\exception\BannerMissException;
use think\Exception;

class Banner
{
    /*
     * 获取指定ID的Banner信息
     * @url /banner/:id
     * @http GET
     * @id banner 位置ID
     */

    public function getBanner($id = null)
    {
        (new IDMustBePostiveInt())->goCheck();

        $banner = BannerModel::getBannerByID($id);
        if(!$banner){
            throw new BannerMissException();
        }
    }
}