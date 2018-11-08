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