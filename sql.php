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

SELECT c.category_id,pb.product_brand_id,p.product_id,pp.product_price_id, pp.number_per_box,c.category_name,pb.product_brand_name,p.product_name,
case p.product_package when 1 then '玻璃瓶装' when 2 then '塑料瓶装' when 3 then '陶瓷瓶装' when 4 then '易拉罐装' when 5 then '铝瓶装' when 6 then '纸盒装' when 7 then '桶装' when 8 then '礼盒装' end as product_package,
CONCAT(p.capacity, case p.capacity_unit when 1 then 'ml' when 2 then 'L' when 3 then 'g' end, ' * ', pp.number_per_box) capacity,
p.inventory_number FROM `product_price` pp, `product` p LEFT JOIN product_brand pb ON pb.product_brand_id=p.product_brand_id LEFT JOIN category c ON c.category_id=p.category_id
WHERE pp.product_price_id>1 AND p.product_id=pp.product_id
ORDER BY p.product_name into outfile 'D:\kucuns.xls';

select sob.organization_brand_name,c.alias,p.product_name,sp.order_price,sp.settlement_price,c.shop_id,c.shop_organization_brand_id,p.product_id from shop_product sp join shop c on sp.shop_id=c.shop_id join shop_organization_brand sob on sob.shop_organization_brand_id=c.shop_organization_brand_id join product p on sp.product_id=p.product_id where c.shop_id>2 and sp.product_id in(17,18) order by c.shop_organization_brand_id asc,c.shop_id asc into outfile 'D:\1111.xls';

<!--去重查询-->
SELECT shop_id,product_id FROM shop_product GROUP BY shop_id,product_id HAVING COUNT(1) > 1;
<!--更新字段值-->
UPDATE test SET user= CONCAT(user,'china')  WHERE id= '2';

select product_barcode_id from product_barcode group by barcode,product_price_id having(count(product_barcode_id))>1;

update back_empty set receiver_id=5,receiver='配送员A',verify_men_id=3,verify_men='cangku' where back_empty_id>1;

delete from back_empty where back_empty_id>=391 and back_empty_id<=449;

delete from back_empty where shop_id not in (174,85,102,93,45,31,30,29,28,27,26,25,126,87,88,77,133,210);

update product set inventory_number=0;

update `order` set settlement_status=1 where settlement_status=2 and created>'2019-01-01 00:00:00' and shop_id=67;

update return_goods set created='2019-01-09 00:00:00' where return_goods_id=326;
update return_goods_product set created='2019-01-09 00:00:00' where return_goods_id=326;

update back_empty set created='2019-01-25 00:00:00' where back_empty_id=4361;
update back_empty_product set created='2019-01-25 00:00:00' where back_empty_id=4361;

update `order` set created='2018-12-31 00:00:00',distribution_time='2018-12-31 00:00:00',sorting_time='2018-12-31 00:00:00',delivery_time='2018-12-31 00:00:00',finish_time='2018-12-31 00:00:00',last_updated='2018-12-31 00:00:00' where order_id=13585;
update `order_product` set created='2018-12-31 00:00:00' where order_id=13585;


delete from back_empty_product where back_empty_id=6613;
delete from back_empty_description where back_empty_id=6613;
delete from back_empty where back_empty_id=6613;

delete from return_goods_product where return_goods_id in (442,332,331,330,329,328,327);
delete from return_goods_description where return_goods_id in (442,332,331,330,329,328,327);
delete from return_goods where return_goods_id in (442,332,331,330,329,328,327);


<!--update order_product set order_price=79 where order_product_id=65106;-->
<!--update `order` set order_order_price=1189 where order_id=12983;-->

update order_product set order_price=79 where order_product_id=63442;
update `order` set order_order_price=1864 where order_id=12983;

update `order` set order_code=20181231296,created='2018-12-31 00:00:00' where order_id=13593;


delete from order_product_update_history where order_product_id=63566;
delete from order_product_barcode where order_product_id=63566;
delete from order_product where order_product_id=63566;

delete from order_product_update_history where order_product_id=69061;
delete from `order_product` where order_product_id=69061;

update `order` set  settlement_status=1 where order_id in (12857,12955);

update `order` set settlement_status=1 where order_id>=13181 and shop_id=189;

update back_empty set settlement_status=1 where back_empty_id>=4213  and shop_id=133;

<!--库存去重，取大规格number_per_box-->
SELECT c.category_name,pb.product_brand_name,p.product_name,
case p.product_package when 1 then '玻璃瓶装' when 2 then '塑料瓶装' when 3 then '陶瓷瓶装' when 4 then '易拉罐装' when 5 then '铝瓶装' when 6 then '纸盒装' when 7 then '桶装' when 8 then '礼盒装' end as product_package,
CONCAT(p.capacity, case p.capacity_unit when 1 then 'ml' when 2 then 'L' when 3 then 'g' end,'*',max(pp.number_per_box)) capacitys,
p.inventory_number FROM `product` p LEFT JOIN product_brand pb ON pb.product_brand_id=p.product_brand_id LEFT JOIN category c ON c.category_id=p.category_id left join product_price pp on p.product_id=pp.product_id
WHERE  p.product_id>1 group by p.product_name,p.product_package,p.capacity,p.product_package
ORDER BY p.product_name,p.product_id into outfile 'D:\kucuns.xls';

update `order` set  shop_organization_brand_name='钢管厂五区小郡肝串串香',shop_alias='华阳店',shop_id=398 where order_id=13467 or order_id=13948;update `order_product` set shop_id=398 where order_id=13467 or order_id=13948;


update `order` set settlement_status=1 where created>'2019-02-16 00:00:00' and created<'2019-03-15 00:00:00' and shop_id=149;
update `return_goods` set settlement_status=1 where created>'2019-02-16 00:00:00' and created<'2019-03-15 00:00:00' and shop_id=149;
update `back_empty` set settlement_status=1 where created>'2019-02-16 00:00:00' and created<'2019-03-15 00:00:00' and shop_id=149;