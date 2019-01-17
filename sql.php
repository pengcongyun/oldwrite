select sob.organization_brand_name,c.alias,date_format(op.created,"%Y-%m-%d"),(case o.order_status when 1 then "下单成功" when 2 then "仓库确认" when 3 then "分拣完成" when 4 then "开始配送" else "取消订单" end),op.product_name,concat(opd.product_capacity,(case when opd.product_capacity_unit=2 then "升" else "毫升" end)) as rj,op.number_per_box,op.default_price*op.number_per_box,op.settlement_price*op.number_per_box,op.product_number,op.default_price*op.product_number*op.number_per_box as dd_total,op.settlement_price*op.product_number*op.number_per_box as js_total from order_product op join order_product_description opd on op.order_product_id=opd.order_product_id join `order` o on op.order_id=o.order_id join shop c on o.shop_id=c.shop_id join shop_organization_brand sob on sob.shop_organization_brand_id=c.shop_organization_brand_id where op.created>="2018-10-22 14:00:00" and op.created<"2018-10-23 14:00:00" and op.order_product_id>1 and o.order_status!=5 order by o.shop_id desc,op.created desc,o.order_status asc into outfile 'D:\xx.xlsx';


select sob.organization_brand_name,c.alias,date_format(op.created,"%Y-%m-%d"),"配送完成",op.product_name,concat(opd.product_capacity,(case when opd.product_capacity_unit=2 then "升" else "毫升" end)) as rj,op.number_per_box,op.default_price*op.number_per_box,op.settlement_price*op.number_per_box,op.product_number,op.default_price*op.product_number*op.number_per_box as dd_total,op.settlement_price*op.product_number*op.number_per_box as js_total from order_product op join order_product_description opd on op.order_product_id=opd.order_product_id join `order` o on op.order_id=o.order_id join shop c on o.shop_id=c.shop_id join shop_organization_brand sob on sob.shop_organization_brand_id=c.shop_organization_brand_id where op.created>="2018-10-01 00:00:00" and op.created<"2018-10-22 14:00:00" and op.order_product_id>1 and o.order_status=5 order by o.shop_id desc,op.created desc into outfile 'D:\over.xlsx';


/*导当天的明细*/
select sob.organization_brand_name,c.alias,op.created,(case o.order_status when 1 then "下单成功" when 2 then "仓库确认" when 3 then "分拣完成" when 4 then "开始配送" else "配送完成" end),op.product_name,concat(opd.product_capacity,(case when opd.product_capacity_unit=2 then "升" else "毫升" end)) as rj,op.number_per_box,op.order_price,op.settlement_price,op.product_number,op.order_price*op.product_number as dd_total,op.settlement_price*op.product_number as js_total from order_product op join order_product_description opd on op.order_product_id=opd.order_product_id join `order` o on op.order_id=o.order_id join shop c on o.shop_id=c.shop_id join shop_organization_brand sob on sob.shop_organization_brand_id=c.shop_organization_brand_id where op.created>="2018-11-02 14:00:00" and op.created<"2018-11-05 09:30:00" and op.order_product_id>1 and o.order_status!=6 and o.shop_id=137 order by o.shop_id desc,op.created desc,o.order_status asc into outfile 'D:\xx.xls';


//总价
select shop_organization_brand_name,shop_alias,created,(case order_status when 1 then "下单成功" when 2 then "仓库确认" when 3 then "分拣完成" when 4 then "开始配送" else "配送完成" end),order_default_price,order_receivable_price from `order` where created>="2018-10-19 00:00:00" and created<"2018-10-23 00:00:00" and order_id>1 and order_status!=6 order by shop_id desc,created desc,order_status asc into outfile 'D:\1923.xlsx';

//导商铺
select sob.organization_brand_name,c.alias,c.username from shop c join shop_organization_brand sob on sob.shop_organization_brand_id=c.shop_organization_brand_id where c.shop_id>2 order by c.shop_organization_brand_id asc into outfile 'D:\shop.xls';

//导商品条形码
select p.product_id,p.product_name,(case when pb.type=1 then "整件" else "单瓶" end) as types,pb.number_per_box,pb.barcode,(case when pb.use_type=1 then "出库" else "进货" end) as use_type,pb.product_barcode_id from product_barcode pb join product p on pb.product_id=p.product_id where pb.product_barcode_id>1 order by pb.product_id asc into outfile 'D:\sarcode.xls';



select sob.organization_brand_name,c.alias,p.product_name,sp.order_price,sp.settlement_price,c.shop_id,c.shop_organization_brand_id,p.product_id from shop_product sp join shop c on sp.shop_id=c.shop_id join shop_organization_brand sob on sob.shop_organization_brand_id=c.shop_organization_brand_id join product p on sp.product_id=p.product_id where c.shop_id>2 and sp.product_id in(17,18) order by c.shop_organization_brand_id asc,c.shop_id asc into outfile 'D:\1111.xls';

<!--去重查询-->
SELECT shop_id,product_id FROM shop_product GROUP BY shop_id,product_id HAVING COUNT(1) > 1;
<!--更新字段值-->
UPDATE test SET user= CONCAT(user,'china')  WHERE id= '2';

select product_barcode_id from product_barcode group by barcode,product_price_id having(count(product_barcode_id))>1;

update back_empty set receiver_id=5,receiver='配送员A',verify_men_id=3,verify_men='cangku' where back_empty_id>1;

delete from back_empty where back_empty_id>=391 and back_empty_id<=449;

