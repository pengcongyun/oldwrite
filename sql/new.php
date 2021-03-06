<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/11/6
 * Time: 16:46
 */
//每个店铺商品 导出
?>
select sob.organization_brand_name,s.alias,c.category_name,pb.product_brand_name,p.product_name,concat(pde.capacity,(case when pde.capacity_unit=2 then "升" else "毫升" end)) as rj,(case when sp.order_method=2 then "单瓶" else "整件" end) as order_method,p.default_price,sp.settlement_price from shop_product sp join shop s on sp.shop_id=s.shop_id join shop_organization_brand sob on s.shop_organization_brand_id=sob.shop_organization_brand_id join product p on sp.product_id=p.product_id join category c on c.category_id=p.category_id join product_brand pb on p.product_brand_id=pb.product_brand_id join product_description pde on p.product_id=pde.product_id where sp.shop_product_id>1 and sp.shop_id=3;



select sob.organization_brand_name,s.alias,count(*) from shop_product sp join shop s on s.shop_id=sp.shop_id join shop_organization_brand sob on s.shop_organization_brand_id=sob.shop_organization_brand_id where sp.shop_product_id>1 group by sp.shop_id order by sob.shop_organization_brand_id desc into outfile 'D:\1119.xls';


select * from order_product where shop_id=77 and created>'2018-12-31' and created<'2019-01-25' into outfile 'D:\11111.xls';

SELECT sp.shop_id,sp.product_id,COUNT(*) FROM shop_product sp join product p on sp.product_id=p.product_id where sp.shop_product_id>1 GROUP BY p.product_id HAVING COUNT(*)>1;



SELECT sp.shop_id,sp.product_id,COUNT(*) FROM shop_product sp join product p on sp.product_id=p.product_id where sp.shop_product_id>1 GROUP BY p.product_id, HAVING COUNT(*)>1;

select shop_id,product_id,count(*) from shop_product where product_id=10 group by shop_id order by shop_id;
select * from shop_product where shop_id=3 and product_id=94;
select count(*) from shop_product where product_id=6;
SELECT shop_id,product_id FROM shop_product GROUP BY shop_id,product_id HAVING COUNT(1) > 1


SELECT shop_id,product_id FROM shop_product GROUP BY shop_id,product_id HAVING COUNT(1) > 1;

update shop_product set order_price=112,settlement_price=112 where shop_id not in (65,66,67,68,69,70,115,116,214,247,268,37) and product_id=54;

update shop_product set order_price=99,settlement_price=99 where shop_id>1 and product_id=139;


shop_id  in (25,26,27,28,29,30,31,45,93)

SELECT c.category_id,pb.product_brand_id,p.product_id,pp.product_price_id,c.category_name,pb.product_brand_name,p.product_name,
case p.product_package when 1 then '玻璃瓶装' when 2 then '塑料瓶装' when 3 then '陶瓷瓶装' when 4 then '易拉罐装' when 5 then '铝瓶装' when 6 then '纸盒装' when 7 then '桶装' when 8 then '礼盒装' end as product_package,
CONCAT(p.capacity, case p.capacity_unit when 1 then 'ml' when 2 then 'L' end, ' * ', pp.number_per_box) capacity, pp.number_per_box
FROM `product_price` pp, `product` p LEFT JOIN product_brand pb ON pb.product_brand_id=p.product_brand_id LEFT JOIN category c ON c.category_id=p.category_id
WHERE pp.product_price_id>1 AND p.product_id=pp.product_id
ORDER BY pb.product_brand_name,p.product_name into outfile 'D:\product.xls';

select order_code,shop_organization_brand_name,shop_alias from `order`  where length(order_code)<=12 order by shop_organization_brand_name,shop_id into outfile 'D:\216.xls';
select order_code,shop_organization_brand_name,shop_alias from `order`  where length(order_code)<=12 and shop_organization_brand_name='钢管厂五区小郡肝串串香' group by shop_id;


select sob.organization_brand_name,s.alias,p.product_name,case p.product_package when 1 then '玻璃瓶装' when 2 then '塑料瓶装' when 3 then '陶瓷瓶装' when 4 then '易拉罐装' when 5 then '铝瓶装' when 6 then '纸盒装' when 7 then '桶装' when 8 then '礼盒装' end as product_package,CONCAT(p.capacity, case p.capacity_unit when 1 then 'ml' when 2 then 'L' end, ' * ', sp.number_per_box) capacity,sp.shop_product_id,sp.order_price,sp.settlement_price from shop_product sp join shop s on sp.shop_id=s.shop_id join product p on sp.product_id=p.product_id join shop_organization_brand sob on s.shop_organization_brand_id=sob.shop_organization_brand_id where sp.product_price_id in (22,28,24,13,25,11,94,75,90,91,92,81,79,80,78) and s.shop_organization_brand_id in (21,15) order by s.shop_organization_brand_id desc into outfile "D:\shopProduct.xls";

select sob.organization_brand_name,s.alias,p.product_name,case p.product_package when 1 then '玻璃瓶装' when 2 then '塑料瓶装' when 3 then '陶瓷瓶装' when 4 then '易拉罐装' when 5 then '铝瓶装' when 6 then '纸盒装' when 7 then '桶装' when 8 then '礼盒装' end as product_package,CONCAT(p.capacity, case p.capacity_unit when 1 then 'ml' when 2 then 'L' end, ' * ', sp.number_per_box) capacity,sp.shop_product_id,sp.order_price,sp.settlement_price from shop_product sp join shop s on sp.shop_id=s.shop_id join product p on sp.product_id=p.product_id join shop_organization_brand sob on s.shop_organization_brand_id=sob.shop_organization_brand_id where sp.product_price_id in (22,28,24,13,25,11,94,75,90,91,92,81,79,80,78) and s.shop_organization_brand_id in (18,33) order by s.shop_organization_brand_id desc into outfile "D:\shopProduct.xls";

select back_empty_id,back_empty_code,shop_organization_brand_name,shop_alias,created from back_empty where payment_price=0.00 and back_empty_id>1 into outfile 'D:\222.xls';

select sob.organization_brand_name,s.alias,p.product_name,case p.product_package when 1 then '玻璃瓶装' when 2 then '塑料瓶装' when 3 then '陶瓷瓶装' when 4 then '易拉罐装' when 5 then '铝瓶装' when 6 then '纸盒装' when 7 then '桶装' when 8 then '礼盒装' end as product_package,CONCAT(p.capacity, case p.capacity_unit when 1 then 'ml' when 2 then 'L' end, ' * ', sp.number_per_box) capacity,sp.shop_product_id,sp.order_price,sp.settlement_price from shop_product sp join shop s on sp.shop_id=s.shop_id join product p on sp.product_id=p.product_id join shop_organization_brand sob on s.shop_organization_brand_id=sob.shop_organization_brand_id where sp.product_price_id in (22,28,24,13,25,11,94,75,90,91,92,81,79,80,78) and (s.shop_organization_brand_id in (7,130,132,34) or s.shop_id=298) order by s.shop_organization_brand_id desc into outfile "D:\shopProduct2.xls";

select order_code from `order` where length(order_code)<13 into outfile 'D:\99.xls';



<<<<<<< HEAD
select s.alias,p.product_name,case p.product_package when 1 then '玻璃瓶装' when 2 then '塑料瓶装' when 3 then '陶瓷瓶装' when 4 then '易拉罐装' when 5 then '铝瓶装' when 6 then '纸盒装' when 7 then '桶装' when 8 then '礼盒装' end as product_package,CONCAT(p.capacity, case p.capacity_unit when 1 then 'ml' when 2 then 'L' end, ' * ', sp.number_per_box) capacity,sp.shop_product_id,sp.order_price,sp.settlement_price from shop_product sp join shop s on sp.shop_id=s.shop_id join product p on sp.product_id=p.product_id where sp.product_price_id in (22,28,24,13,25,11,94,75,90,91,92,81,79,80,78) and s.shop_organization_brand_id in (18,33,37,4,12,64) order by s.shop_organization_brand_id desc into outfile "D:\shopProduct.xls";
=======
>>>>>>> 2e65b7259fc90107a7bef0bcf61fba615ec4df39
10---3
update shop set transport_line=3 where transport_line=10;

