<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/19
 * Time: 16:44  154
 * www.pa.com/xx.php
 * 318,319,320,321,322,323,324,325,326,327,328,329,330,331,332,333,334,335,336,337,338,339,340,341,342,343,344,345,356
 * delete from shop_product where shop_id in (318,319,320,321,322,323,324,325,326,327,328,329,330,331,332,333,334,335,336,337,338,339,340,341,342,343,344,345,356) and product_price_id=31;
 */
//$conn=mysqli_connect("127.0.0.1",'root','root','yii2_niuniu')or die('error');
$conn=mysqli_connect("39.104.156.225",'root','WpFwf4LP','yii_niuniu')or die('error');
mysqli_query($conn,'set names utf8');
$sql="select shop_product_id from shop_product where shop_id=437";
$stmt=mysqli_query($conn,$sql);//执行sql查询语句
$ids=[];
foreach ($stmt as $k){
    $ids[]=$k['shop_product_id'];
}
//$now=[];
//for ($i=3;$i<=432;$i++){
//    if(!in_array($i,$ids)){
//        $now[]=$i;
//    }
//}
$sqls="delete from shop_product_component where shop_product_id in (".implode(',',$ids).")";
$res=mysqli_query($conn,$sqls);//执行sql查询语句
var_dump($res);exit;
// www.old.com/xx.php
// delete from shop_product where shop_id=437;
// delete from shop_product_back_empty where shop_id=437;

$sqls="select op.shop_id,o.shop_organization_brand_name,o.shop_alias,case s.business_account when 1 then '金源' when 2 then '众鸿远' when 3 then '夜场' when 4 then '扎啤' when 5 then '其他' end as business_account,s.business_contract,op.product_id,op.product_category,op.product_brand_name,case op.product_package when 1 then '玻璃瓶装' when 2 then '塑料瓶装' when 3 then '陶瓷瓶装' when 4 then '易拉罐装' when 5 then '铝瓶装' when 6 then '纸盒装' when 7 then '桶装' when 8 then '礼盒装' when 9 then '其他' end as product_package, CONCAT(op.product_capacity, case op.product_capacity_unit when 1 then 'ml' when 2 then 'L' when 3 then 'g' when 4 then 'kg' when 5 then '支' when 6 then '台' when 7 then '个' when 8 then '把' when 9 then '本' when 10 then '根' when 11 then '包' when 12 then '罐' when 13 then '盒' when 14 then '桶' when 15 then '瓶' when 16 then '条' when 17 then '顶' end,'*', op.number_per_box) capacity,sp.business_commission,sum(op.receive_number) as receive_number from order_product op 
left join `order` o on op.order_id=o.order_id 
left join  shop s on s.shop_id=op.shop_id 
left join  shop_product sp on op.product_price_id=sp.product_price_id 

where o.created>'2019-06-01 00:00:00' and o.created<'2019-06-28 18:00:00' and op.order_product_id>2 group by op.shop_id,op.product_price_id;


left join (select sum(op2.receive_number*op2.number_per_box) as receive_numbers from order_product op2 left join  group by op2.product_price_id)

";

$sql="select sb.reconciliation_status,
IFNULL(table_return.settlement_single_price ,0) as return_money,
IFNULL(table_back.back_empty_price ,0) as back_money,
IFNULL(table_order.order_price ,0) as order_money,
IFNULL(table_order.settlement_price ,0) as settlement_money,
sb.created,sb.shop_bill_id,sb.start_time,sb.end_time,sb.paid_amount,sb.shop_organization_brand_name,sb.shop_alias,
IFNULL(table_deduct.deduct_amount ,0) as deduct_amount
 from shop_bill sb 
left join (select SUM(sbdh.deduct_amount) as deduct_amount,sbdh.shop_bill_id as shop_bill_id from shop_bill sb2 left join shop_bill_deduct_history sbdh on sb2.shop_bill_id=sbdh.shop_bill_id group by sb2.shop_bill_id) table_deduct on table_deduct.shop_bill_id=sb.shop_bill_id 
left join (select sbo.shop_bill_id,sum(op.receive_number*op.order_price) as order_price,sum(op.receive_number*op.settlement_price) as settlement_price from shop_bill_order sbo left join order_product op on sbo.order_id=op.order_id group by sbo.shop_bill_id) table_order on table_order.shop_bill_id=sb.shop_bill_id 
left join (select sbba.shop_bill_id,sum(beo.back_empty_finance_number*beo.back_empty_price) as back_empty_price from shop_bill_back_empty sbba left join back_empty_product beo on sbba.back_empty_id=beo.back_empty_id group by sbba.shop_bill_id) table_back on sb.shop_bill_id=table_back.shop_bill_id 
left join (select sbrg.shop_bill_id,sum(rp.return_goods_verify_number*rp.settlement_single_price) as settlement_single_price from shop_bill_return_goods sbrg left join return_goods_product rp on rp.return_goods_id=sbrg.return_goods_id group by sbrg.shop_bill_id) table_return on sb.shop_bill_id=table_return.shop_bill_id 
left join shop_bill_order sbo2 on sbo2.shop_bill_id=sb.shop_bill_id 
left join `order` o on o.order_id=sbo2.order_id 
left join shop_bill_back_empty sbbe2 on sbbe2.shop_bill_id=sb.shop_bill_id 
left join `back_empty` be on be.back_empty_id=sbbe2.back_empty_id 
left join shop_bill_return_goods sbrg2 on sbrg2.shop_bill_id=sb.shop_bill_id 
left join `return_goods` rg2 on rg2.return_goods_id=sbrg2.return_goods_id 
where sb.shop_bill_id>2 ";

