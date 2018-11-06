<?php

/**闪送接口地址 http://open.ishansong.com/#/admin?_k=3idlbq   用户中心***/
class yun{
    //参数1：访问的URL，参数2：post数据(不填则为GET)
 function curl_request($url,$post=''){
             $curl = curl_init();
         curl_setopt($curl, CURLOPT_URL, $url);
         curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
         curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
         if($post) {
                     curl_setopt($curl, CURLOPT_POST, 1);
                     curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));
        }
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($curl);
        if (curl_errno($curl)) {
                    return curl_error($curl);
        }
        curl_close($curl);
     return $data;
 }
 function calc(){//计算费用
     $data=array();
     $data['orderNo']='2017083120170832';//订单号
     $data['addition']='0';//加价费
     $data['goods']='燕窝';//物品
     $data['weight']='1';//单位
     $data['appointTime']='';//预约时间
     $data['remark']='测试备注';//备注
     $data['id']='SS2899';//商户唯一ID（由闪送分配）
     $data['mobile']='18234129782';//商户手机号（闪送官网注册账号
     $data['name']='羽薇燕窝';//商户机构名称
     $data['token']='eE41wMHHt4peMxLM9nRgoiEPz4Ww8GNw9WLcHVU1qVk=';//商户凭据（在线支付用，由闪送分配）
     $data['addr']='湖北省武汉市中南路街街道武汉梅苑小区206';//地址收件部分
     $data['addrDetail']='湖北省武汉市中南路街街道武汉梅苑小区206';//地址详情
     $data['city']='武汉市';//城市名称
     $data['lat']='30.537984952266';//经度
     $data['lng']='114.33225313668';//纬度
     $data['mobile']='13397227730';//收件人手机
     $data['name']='测试';//姓名
     $data['addr']='湖北省武汉市武昌区中北路31号知音广场19楼';//地址//
     $data['addrDetail']='湖北省武汉市武昌区中北路31号知音广场19楼';//地址详情
     $data['city']='武汉市';//城市名称
     $data['lat']='30.563963';//经度（百度坐标）
     $data['lng']='114.34618';//纬度
     $data['mobile']='18971614101';//寄件人手机
     $data['name']='测试闪送(武汉)';//姓名
     $data['partnerNo']='2899';//合作伙伴编号
     $data['signature']='55qcopt0mw63';//签名加密
     $url='http://open.s.bingex.com/openapi/order/v3/calc';//计算费用接口
     //$url='http://open.ishansong.com/openapi/order/v3/calc';//正式接口
      return $this->curl_request($url,$data);

 }
    function save(){//下单
        $data=array();
        $data['orderNo']='2017083120170832';//订单号
        $data['addition']='0';//加价费
        $data['goods']='燕窝';//物品
        $data['weight']='1';//单位
        $data['appointTime']='';//预约时间
        $data['remark']='测试备注';//备注
        $data['id']='SS2899';//商户唯一ID（由闪送分配）
        $data['mobile']='18234129782';//商户手机号（闪送官网注册账号
        $data['name']='羽薇燕窝';//商户机构名称
        $data['token']='eE41wMHHt4peMxLM9nRgoiEPz4Ww8GNw9WLcHVU1qVk=';//商户凭据（在线支付用，由闪送分配）
        $data['addr']='湖北省武汉市中南路街街道武汉梅苑小区206';//地址收件部分
        $data['addrDetail']='湖北省武汉市中南路街街道武汉梅苑小区206';//地址详情
        $data['city']='武汉市';//城市名称
        $data['lat']='30.537984952266';//经度
        $data['lng']='114.33225313668';//纬度
        $data['mobile']='13397227730';//收件人手机
        $data['name']='测试';//姓名
        $data['addr']='湖北省武汉市武昌区中北路31号知音广场19楼';//地址//
        $data['addrDetail']='湖北省武汉市武昌区中北路31号知音广场19楼';//地址详情
        $data['city']='武汉市';//城市名称
        $data['lat']='30.563963';//经度（百度坐标）
        $data['lng']='114.34618';//纬度
        $data['mobile']='18971614101';//寄件人手机
        $data['name']='测试闪送(武汉)';//姓名
        $data['partnerNo']='2899';//合作伙伴编号
        $data['signature']='55qcopt0mw63';//签名加密
        $url='http://open.s.bingex.com/openapi/order/v3/save';//计算费用接口
        //$url='http://open.ishansong.com/openapi/order/v3/save';//正式接口
      return $this->curl_request($url,$data);

    }
    function info(){//查询订单
        $data=array();
        $data['partnerno']='1099';//闪送分配的平台号
        $data['orderno']='2017083120170832';//合作伙伴平台的订单号
        $data['mobile']='13301061589';//下单人手机
        $data['signature']='A79AE26C5043FC4D6B0DFC1AD96CA7BD';//签名加密
        $data['issorderno']='TDH2017083119524158';//闪送平台的订单号
        $url='http://open.s.bingex.com/openapi/order/v3/info';//计算费用接口
        //$url='http://open.ishansong.com/openapi/order/v3/info';//正式接口
        return    $message=$this->curl_request($url,$data);

    }
    function trail(){//查询订单轨迹
        $data=array();
        $data['partnerno']='1099';//闪送分配的平台号
        $data['orderno']='2017083120170832';//合作伙伴平台的订单号
        $data['mobile']='13301061589';//下单人手机
        $data['signature']='A79AE26C5043FC4D6B0DFC1AD96CA7BD';//签名加密
        $data['issorderno']='TDH2017083119524158';//闪送平台的订单号
        $url='http://open.s.bingex.com/openapi/order/v3/trail';//计算费用接口
        //$url='http://open.ishansong.com/openapi/order/v3/trail';//正式接口
        return $this->curl_request($url,$data);

    }
    function account(){//查询账户余额
        $data=array();
        $data['partnerno']='2899';//闪送分配的平台号
        $data['mobile']='18234129782';//下单人手机
        $url='http://open.s.bingex.com/openapi/order/v3/account';//计算费用接口
        //$url='http://open.ishansong.com/openapi/order/v3/account';//正式接口
        return  $this->curl_request($url,$data);

    }

}
$a=new  yun();
//$b=$a->calc();
//$b=$a->save();
//$b=$a->info();
//$b=$a->trail();
$b=$a->account();
print_r($b);

?>