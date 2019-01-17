<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport">
    <title>牛牛到店-账单总览</title>
    <link rel="stylesheet" href="/css/finance/public.css">
    <link rel="stylesheet" href="/css/finance/terminalManagement/preview.css">
    <script src="/js/jquery.js"></script>
</head>
<body>
<div class="preview">
    <div class="pinting_cont">
        <div class="p_c">
            <div class="p_c_title"><span>四川正禾印象商贸有限公司终端兑账单</span>
                <!--                <a class="print">打  印</a></div>-->
                <a href="<?php echo \yii\helpers\Url::toRoute(['shop/prePrintBill','shop_bill_id'=>$shop_bill_id]);?>" class="print">打  印</a></div>
            <div class="p_c_data">
                <table>
                    <tr>
                        <td class="width_a"><span>渠道名称：<?php echo $shopBill['shop_organization_brand_name'].'  '.$shopBill['shop_alias'];?></span></td>
                        <td class="width_b"><span>渠道地址：<?php echo $shopBill['address'];?></span></td>
                    </tr>
                    <tr>
                        <td class="width_a"><span>出账日期：<?php echo explode(' ',str_replace('-','.',$shopBill['created']))[0];?></span></td>
                        <td class="width_c"><span>兑账周期：<?php echo explode(' ',str_replace('-','.',$shopBill['start_time']))[0];?> - <?php echo explode(' ',str_replace('-','.',$shopBill['end_time']))[0];?></span></td>
                        <td class="width_c" style="text-align: right"><span>应付金额：￥<?php echo number_format($shopBill['payable_amount'],2,'.',',');?></span></td>
                    </tr>
                </table>
            </div>
            <div class="p_c_table" style="height: auto;overflow: hidden;border-bottom: none">
                <div class="p_c_ti" style="width: 600px;height: 50px;line-height: 50px;padding-left: 10px">
                    <span style="font-weight: 700;color: #333333">订购商品</span>
                </div>
                <table class="table_a">
                    <tr>
                        <td class="width_a"><span>商品名称</span></td><td><span>商品规格</span></td><td><span>订购单位</span></td>
                        <td><span>送达数量</span></td><td><span>订购单价</span></td><td><span>结算单价</span></td><td class="width_b"><span>结算金额</span></td>
                    </tr>
                    <?php foreach ($order_data as $k=>$v):?>
                        <tr>
                            <td class="width_a"><span><?php echo $v['product_name']?></span></td>
                            <td><span><?php echo floatval($v['product_capacity']).\common\models\Product::CAPACITY_UNIT[$v['product_capacity_unit']]?></span></td>
                            <td><span><?php echo $v['order_method']==1?'件':\common\models\Product::SINGLE_UNIT[$v['single_unit']];?></span></td>
                            <td><span><?php echo $v['counts'];?></span></td>
                            <td><span>￥<?php echo number_format($v['order_price'],2,'.',',');?></span></td>
                            <td><span>￥<?php echo number_format($v['settlement_price'],2,'.',',');?></span></td>
                            <td class="width_b"><span>￥<?php echo number_format($v['settlement_price']*$v['counts'],2,'.',',');?></span></td>
                        </tr>
                    <?php endforeach;?>
                    <tr>
                        <td class="width_a"><span>合计</span></td>
                        <td><span>-</span></td>
                        <td><span>-</span></td>
                        <td><span>-</span></td>
                        <td><span>-</span></td>
                        <td><span>-</span></td>
                        <td class="width_b"><span>￥<?php echo number_format($all_order_money,2,'.',',');?></span></td>
                    </tr>
                </table>
                <div class="p_c_ti" style="width: 600px;height: 50px;line-height: 50px;padding-left: 10px">
                    <span style="font-weight: 700;color: #333333">返空部件</span>
                </div>
                <table class="table_b">
                    <tr>
                        <td class="width_a"><span>商品名称</span></td><td><span>部件名称</span></td><td><span>返空单位</span></td>
                        <td><span>返空数量</span></td><td class="width_b"><span>返空单价</span></td><td class="width_b"><span>返空金额</span></td>
                    </tr>
                    <?php foreach ($back_data as $k=>$v):?>
                        <tr>
                            <td class="width_a"><span><?php echo $v['product_name'];?></span></td>
                            <td><span><?php echo \common\models\BackEmpty::BACK_EMPTY_NAME[$v['back_empty_name']]?><?php if($v['back_empty_name']==3){echo "/".$v['number_per_box'];}?></span></td>
                            <td><span>个</span></td>
                            <td><span><?php echo $v['counts'];?></span></td>
                            <td class="width_b"><span>￥<?php echo number_format($v['back_empty_price'],2,'.',',');?></span></td>
                            <td class="width_b"><span>￥<?php echo number_format($v['back_empty_price']*$v['counts'],2,'.',',');?></span></td>
                        </tr>
                    <?php endforeach;?>
                    <tr>
                        <td class="width_a"><span>合计</span></td>
                        <td><span>-</span></td>
                        <td><span>-</span></td>
                        <td><span>-</span></td>
                        <td class="width_b"><span>-</span></td>
                        <td class="width_b"><span>￥<?php echo number_format($all_back_money,2,'.',',');?></span></td>
                    </tr>
                </table>
                <div class="p_c_ti" style="width: 600px;height: 50px;line-height: 50px;padding-left: 10px">
                    <span style="font-weight: 700;color: #333333">退货商品</span>
                </div>
                <table class="table_b">
                    <tr>
                        <td class="width_a"><span>商品名称</span></td><td><span>商品规格</span></td><td><span>退货单位</span></td>
                        <td><span>退货数量</span></td><td class="width_b"><span>退货单价</span></td><td class="width_b"><span>退货金额</span></td>
                    </tr>
                    <?php foreach ($return_data as $k=>$v):?>
                        <tr>
                            <td class="width_a"><span><?php echo $v['product_name'];?></span></td>
                            <td><span><?php echo floatval($v['product_capacity']).\common\models\Product::CAPACITY_UNIT[$v['product_capacity_unit']];?></span></td>
                            <td><span>个</span></td>
                            <td><span><?php echo $v['counts'];?></span></td>
                            <td class="width_b"><span>-</span></td>
                            <td class="width_b"><span>￥<?php echo number_format($v['settlement_price'],2,'.',',');?></span></td>
                        </tr>
                    <?php endforeach;?>
                    <tr>
                        <td class="width_a"><span>合计</span></td>
                        <td><span>-</span></td>
                        <td><span>-</span></td>
                        <td><span>-</span></td>
                        <td class="width_b"><span>-</span></td>
                        <td class="width_b"><span>￥<?php echo number_format($all_return_money,2,'.',',');?></span></td>
                    </tr>
                </table>
            </div>
            <div class="p_c_message">
                <table>
                    <tr>
                        <td colspan="3">终端结算转款信息</td>
                    </tr>
                    <tr>
                        <td>开户银行</td>
                        <td>收款人账号</td>
                        <td>收款人姓名</td>
                    </tr>
                    <tr>
                        <td>中国建设银行 蓝天支行</td>
                        <td>4340 6138 1098 8346</td>
                        <td>郑海英</td>
                    </tr>
                    <tr>
                        <td>中国农业银行 欧城分理处</td>
                        <td>62284 8046 83477 03877</td>
                        <td>郑海英</td>
                    </tr>
                    <tr>
                        <td>中国工商银行 双流支行营业室</td>
                        <td>9558 8844 0200 0830015</td>
                        <td>郑海英</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<script>

    function doPrint() {
        var shop_bill_id='<?php echo $shop_bill_id;?>';
        var html='';
        var url="<?php echo Yii::$app->urlManager->createUrl('finance/shop/getPrintData')?>";

        $.post(url,{shop_bill_id:shop_bill_id},function (e) {
            $('body').html('');
            var shopBill=e['shopBill'];
            var orders=e['orders'];
            var backs=e['backs'];
            var returns=e['returns'];
            html+='<div class="pinting">\n' +
                '    <div class="pinting_cont">\n' +
                '        <div class="p_c">\n' +
                '            <div class="p_c_title"><span>四川正禾印象商贸有限公司终端兑账单</span></div>\n' +
                '            <div class="p_c_data">\n' +
                '                <table>\n' +
                '                    <tr>\n' +
                '                        <td class="sty_a"><span>渠道名称：'+shopBill.source_name+' </span></td>\n' +
                '                    </tr>\n' +
                '                    <tr>\n' +
                '                        <td class="sty_c"><span>渠道地址：'+shopBill.address+'</span></td>\n' +
                '                    </tr>\n' +
                '                    <tr>\n' +
                '                        <td class="sty_d"><span>兑账周期：'+shopBill.change_time+'</span></td>\n' +
                '                        <td class="sty_b"><span>出账日期：'+shopBill.created+'</span></td>\n' +
                '                        <td class="sty_b" style="text-align: right"><span>应付金额：￥'+shopBill.payable_amount+'</span></td>\n' +
                '                    </tr>\n' +
                '                </table>\n' +
                '            </div>\n'+
                '            <div class="p_c_table" style="height: auto;overflow: hidden;border-bottom: none">\n' ;
            if(orders!=undefined){
                html+='                <div class="p_c_ti" style="width: 600px;height: 40px;line-height: 40px;padding-left: 10px">\n' +
                    '                    <span style="font-weight: 700;color: #333333">订购商品</span>\n' +
                    '                </div>\n' +
                    '                <table class="table_a">\n' +
                    '                    <tr>\n' +
                    '                        <td class="width_a"><span>商品名称</span></td><td><span>商品规格</span></td><td><span>订购单位</span></td>\n' +
                    '                        <td><span>订购数量</span></td><td><span>订购单价</span></td><td><span>结算单价</span></td><td class="width_b"><span>结算金额</span></td>\n' +
                    '                    </tr>\n' ;
                for(var i=0;i<orders.length;i++) {
                    html+='             <tr>\n' +
                        '                        <td class="width_a"><span>'+orders[i].product_name+'</span></td>\n' +
                        '                        <td><span>'+orders[i].product_capacity+'</span></td>\n' +
                        '                        <td><span>'+orders[i].order_method+'</span></td>\n' +
                        '                        <td><span>'+orders[i].counts+'</span></td>\n' +
                        '                        <td><span>￥'+orders[i].order_price+'</span></td>\n' +
                        '                        <td><span>￥'+orders[i].settlement_price+'</span></td>\n' +
                        '                        <td class="width_b"><span>￥'+orders[i].one_money+'</span></td>\n' +
                        '                    </tr>\n' ;
                }
                html+='                                        <tr>\n' +
                    '                        <td class="width_a"><span>合计</span></td>\n' +
                    '                        <td><span>-</span></td>\n' +
                    '                        <td><span>-</span></td>\n' +
                    '                        <td><span>-</span></td>\n' +
                    '                        <td><span>-</span></td>\n' +
                    '                        <td><span>-</span></td>\n' +
                    '                        <td   class="width_b"><span>￥'+e['all_order_money']+'</span></td>\n' +
                    '                    </tr>\n' +
                    '                </table>\n' ;
            }
            if(backs!=undefined){
                html+='                <div class="p_c_ti" style="width: 600px;height: 40px;line-height: 40px;padding-left: 10px">\n' +
                    '                    <span style="font-weight: 700;color: #333333">返空部件</span>\n' +
                    '                </div>\n' +
                    '                <table class="table_b">\n' +
                    '                    <tr>\n' +
                    '                        <td class="width_a"><span>商品名称</span></td><td><span>部件名称</span></td><td><span>返空单位</span></td>\n' +
                    '                        <td><span>返空数量</span></td><td class="width_b"><span>返空单价</span></td><td class="width_b"><span>返空金额</span></td>\n' +
                    '                    </tr>\n' ;
                for (var j=0;j<backs.length;j++){
                    html+='                                        <tr>\n' +
                        '                        <td class="width_a"><span>'+backs[j].product_name+'</span></td>\n' +
                        '                        <td><span>'+backs[j].back_empty_name+'</span></td>\n' +
                        '                        <td><span>个</span></td>\n' +
                        '                        <td><span>'+backs[j].counts+'</span></td>\n' +
                        '                        <td class="width_b"><span>￥'+backs[j].back_empty_price+'</span></td>\n' +
                        '                        <td class="width_b"><span>￥'+backs[j].one_money+'</span></td>\n' +
                        '                    </tr>\n' ;
                }
                html+='                                        <tr>\n' +
                    '                        <td class="width_a"><span>合计</span></td>\n' +
                    '                        <td><span>-</span></td>\n' +
                    '                        <td><span>-</span></td>\n' +
                    '                        <td><span>-</span></td>\n' +
                    '                        <td class="width_b"><span>-</span></td>\n' +
                    '                        <td class="width_b"><span>￥'+e['all_back_money']+'</span></td>\n' +
                    '                    </tr>\n' +
                    '                </table>\n' ;
            }
            if(returns!=undefined){
                html+='                <div class="p_c_ti" style="width: 600px;height: 40px;line-height: 40px;padding-left: 10px">\n' +
                    '                    <span style="font-weight: 700;color: #333333">退货商品</span>\n' +
                    '                </div>\n' +
                    '                <table class="table_b">\n' +
                    '                    <tr>\n' +
                    '                        <td class="width_a"><span>商品名称</span></td><td><span>商品规格</span></td><td><span>退货单位</span></td>\n' +
                    '                        <td><span>退货数量</span></td><td class="width_b"><span>退货单价</span></td><td class="width_b"><span>退货金额</span></td>\n' ;
                for (var j=0;j<returns.length;j++) {
                    html += '                    </tr>\n' +
                        '                                        <tr>\n' +
                        '                        <td class="width_a"><span>'+returns[j].product_name+'</span></td>\n' +
                        '                        <td><span>'+returns[j].product_capacity+'</span></td>\n' +
                        '                        <td><span>个</span></td>\n' +
                        '                        <td><span>'+returns[j].counts+'</span></td>\n' +
                        '                        <td class="width_b"><span>-</span></td>\n' +
                        '                        <td class="width_b"><span>￥'+returns[j].settlement_price+'</span></td>\n' +
                        '                    </tr>\n';
                }
                html+='                                        <tr>\n' +
                    '                        <td class="width_a"><span>合计</span></td>\n' +
                    '                        <td><span>-</span></td>\n' +
                    '                        <td><span>-</span></td>\n' +
                    '                        <td><span>-</span></td>\n' +
                    '                        <td class="width_b"><span>-</span></td>\n' +
                    '                        <td class="width_b"><span>￥'+e['all_return_money']+'</span></td>\n' +
                    '                    </tr>\n' +
                    '                </table>\n' ;
            }

            html+='            </div>\n' +
                '            <div class="pc_message">\n' +
                '                <div class="title"><span>终端结算转款信息</span></div>\n' +
                '                <table>\n' +
                '                    <tr style="font-weight: 700">\n' +
                '                        <td>开户银行</td>\n' +
                '                        <td>收款人账号</td>\n' +
                '                        <td>收款人姓名</td>\n' +
                '                    </tr>\n' +
                '                    <tr>\n' +
                '                        <td>中国建设银行 蓝天支行</td>\n' +
                '                        <td>4340 6138 1098 8346</td>\n' +
                '                        <td>郑海英</td>\n' +
                '                    </tr>\n' +
                '                    <tr>\n' +
                '                        <td>中国农业银行 欧城分理处</td>\n' +
                '                        <td>62284 8046 83477 03877</td>\n' +
                '                        <td>郑海英</td>\n' +
                '                    </tr>\n' +
                '                    <tr>\n' +
                '                        <td>中国工商银行 双流支行营业室</td>\n' +
                '                        <td>9558 8844 0200 0830015</td>\n' +
                '                        <td>郑海英</td>\n' +
                '                    </tr>\n' +
                '                </table>\n' +
                '            </div>\n' +
                '        </div>\n' +
                '    </div>\n' +
                '</div>\n';
            // $('body').html(html);
            window.print(html);
        });
    }
    // $('.print').click(function () {
    //     doPrint();
    // });
</script>
</body>
</html>