select sob.organization_brand_name,c.alias,date_format(op.created,"%Y-%m-%d"),op.product_name,concat(opd.product_capacity,(case when opd.product_capacity_unit=2 then "升" else "毫升" end)) as rj,op.number_per_box,op.default_price*op.number_per_box,op.settlement_price*op.number_per_box,op.product_number,op.default_price*op.product_number*op.number_per_box as dd_total,op.settlement_price*op.product_number*op.number_per_box as js_total from order_product op join order_product_description opd on op.order_product_id=opd.order_product_id join `order` o on op.order_id=o.order_id join shop c on o.shop_id=c.shop_id join shop_organization_brand sob on sob.shop_organization_brand_id=c.shop_organization_brand_id where op.created>"2018-10-15 00:00:00" and op.order_product_id>1 order by o.shop_id desc,op.created desc into outfile 'D:\xx.xls';


select o.order_code,o.shop_organization_brand_name,o.shop_alias,od.order_note from order_description od join `order` o on od.order_id=o.order_id where od.order_note!='' and o.created>"2018-10-12 00:00:00" and o.created<"2018-10-19 00:00:00" into outfile 'D:\xx.xls';



select back_empty_id from back_empty where shop_id in (25,26,27,28,29,30,31,45,93);
delete from back_empty_description where back_empty_id in (129,599,687,865,1054,1199);
delete from back_empty_product where back_empty_id in (129,599,687,865,1054,1199);


delete from back_empty_product where back_empty_id=1579;
delete from back_empty_description where back_empty_id=1579;
delete from back_empty where back_empty_id=1579;


delete from back_empty where back_empty_id in (129,599,687,865,1054,1199);


update activity_shop set deposit_price=2.4 where activity_id in (104,105) and deposit_price=14.4;
update activity_shop set deposit_price=2.4 where activity_id in (104,105) and deposit_price=10.8;
update activity_shop set deposit_price=3.5 where activity_id in (104,105) and deposit_price=9.48;
update activity_shop set deposit_price=3 where activity_id in (104,105) and deposit_price=9;
update activity_shop set deposit_price=2.4 where activity_id in (104,105) and deposit_price=8.4;




