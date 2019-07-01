<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/18
 * Time: 10:17
 */

namespace JdMediaSdk\Api;


use JdMediaSdk\Tools\JdGateWay;

class Tods extends JdGateWay
{
    protected $is_auth = true;

    /**
     * @api 优惠券领取情况查询接口【申请】
     * @line https://union.jd.com/openplatform/api/627
     * @param $url
     * @return bool|string
     * @throws \Exception
     */
    public function getCouponsInfo($url)
    {
        if (is_string($url)) {
            $params['couponUrls'] = $url;
        } else {
            $params['couponUrls'] = implode(',', $url);
        }
        return $this->send('getcouponsinfo', $params, true);

    }

    /**
     * @api (新版)获取商品推广链接
     * @line https://open.21ds.cn/index/index/openapi/id/56.shtml?ptype=2
     * @param string $materialId
     * @param string $couponUrl
     * @return bool|string
     * @throws \Exception
     */
    public function getItemCpsUrl($materialId, $couponUrl = '')
    {
     
        $params['materialId'] = $materialId;


        $params['unionId'] =  $this->unionId;
        $params['positionId'] = $this->positionId;

        return $this->send('getitemcpsurl', $params, true);

    }

    /**
     * @api (新版)获取商品推广链接
     * @line https://open.21ds.cn/index/index/openapi/id/56.shtml?ptype=2
     * @param string $url
     * @return bool|string
     * @throws \Exception
     */
    public function getSinaShortUrl($url)
    {

        $params['url'] =  $url;

        return $this->send('getsinashorturl', $params, true);

    }

}