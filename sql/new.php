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


SELECT sp.shop_id,sp.product_id,COUNT(*) FROM shop_product sp join product p on sp.product_id=p.product_id where sp.shop_product_id>1 GROUP BY p.product_id HAVING COUNT(*)>1;



SELECT sp.shop_id,sp.product_id,COUNT(*) FROM shop_product sp join product p on sp.product_id=p.product_id where sp.shop_product_id>1 GROUP BY p.product_id, HAVING COUNT(*)>1;

select shop_id,product_id,count(*) from shop_product where product_id=10 group by shop_id order by shop_id;
select * from shop_product where shop_id=3 and product_id=94;
select count(*) from shop_product where product_id=6;
SELECT shop_id,product_id FROM shop_product GROUP BY shop_id,product_id HAVING COUNT(1) > 1


SELECT shop_id,product_id FROM shop_product GROUP BY shop_id,product_id HAVING COUNT(1) > 1;

update shop_product set order_price=112,settlement_price=112 where shop_id not in (65,66,67,68,69,70,115,116,214,247,268,37) and product_id=54;

update shop_product set order_price=146,settlement_price=146 where shop_id>1 and product_id=64;

