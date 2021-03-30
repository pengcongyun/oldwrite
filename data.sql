delete from apply_order_product_image where apply_order_product_image_id>0;
delete from apply_order_product where apply_order_product_id>1;
delete from apply_order where apply_order_id>1;

delete from user_channel_permission where channel_permission_id in (251,249,250,245,248,246,247);
delete from channel_permission where channel_permission_id in (251,249,250,245,248,246,247);
delete from user_channel where channel_id=14;
delete from channel where channel_id=14;
delete from activity_normal_shop where activity_normal_shop_id>1;
delete from activity_normal where activity_normal_id>1;
delete from activity_contract where activity_contract_id>1;
delete from activity_free_product where activity_free_product_id>1;
delete from activity_component where activity_component_id>1;
delete from provider_bill_return_exchange where provider_bill_id>1;
delete from provider_bill_product_storage where provider_bill_id>1;
delete from provider_bill_payment_record where provider_bill_id>1;
delete from provider_bill_money_record where provider_bill_id>1;
delete from provider_bill_description where provider_bill_id>1;
delete from provider_bill_back_exchange where provider_bill_id>1;
delete from provider_bill where provider_bill_id>1;
delete from return_exchange_product where return_exchange_product_id>1;
delete from return_exchange_out_storage_product where return_exchange_out_storage_product_id>1;
delete from return_exchange_out_storage where return_exchange_out_storage_id>1;
delete from return_exchange_internal_note where return_exchange_internal_note_id>1;
delete from return_exchange where return_exchange_id>1;
delete from back_exchange_product where back_exchange_product_id>1;
delete from back_exchange_out_storage_product where back_exchange_out_storage_product_id>1;
delete from back_exchange_money_record where back_exchange_money_record_id>1;
delete from back_exchange_internal_note where back_exchange_id>1;
delete from back_exchange where back_exchange_id>1;
delete from back_exchange_out_storage where back_exchange_out_storage_id>1;
delete from back_empty_product where back_empty_product_id>1;
delete from back_empty_loss where back_empty_loss_id>1;
delete from back_empty_into_storage_product where back_empty_into_storage_product_id>1;
delete from back_empty_internal_note where back_empty_id>1;
delete from back_empty_description where back_empty_id>1;
delete from back_empty_check_system_number where back_empty_check_system_number_id>1;
delete from back_empty_check_record where back_empty_check_record_id>1;
delete from back_empty_check where back_empty_check_id>1;
delete from back_empty_basic where back_empty_basic_id>1;
delete from shop_bill_back_empty where back_empty_id>1;
delete from back_empty where back_empty_id>1;
delete from back_empty_plan where back_empty_plan_id>1;
delete from back_empty_into_storage where back_empty_into_storage_id>1;
delete from shop_bill_breakage where breakage_id>1;
delete from breakage_product where breakage_id>1;
delete from breakage_description where breakage_id>1;
delete from breakage where breakage_id>1;
delete from data_export where data_export_id>0;
delete from dispatch_product where dispatch_id>1;
delete from dispatch_out_storage_product where dispatch_out_storage_product_id>1;
delete from dispatch_into_storage_product where dispatch_into_storage_product_id>1;
delete from dispatch_internal_note where dispatch_id>1;
delete from dispatch where dispatch_id>1;
delete from dispatch_into_storage where dispatch_into_storage_id>1;
delete from dispatch_out_storage where dispatch_out_storage_id>1;

delete from order_product where order_id>1;
delete from order_porter where order_id>1;
delete from order_internal_note where order_id>1;
delete from order_description where order_id>1;
delete from `shop_bill_order` where order_id>1;
delete from pre_order_product where pre_order_id>1;
delete from pre_order where pre_order_id>1;
delete from return_goods_product where return_goods_id>1;
delete from return_goods_description where return_goods_id>1;
delete from return_goods_internal_note where return_goods_id>1;
delete from return_goods_into_storage_product where return_goods_into_storage_id>1;
delete from shop_bill_return_goods where return_goods_id>1;
delete from return_goods where return_goods_id>1;
delete from return_goods_into_storage where return_goods_into_storage_id>1;
delete from `order` where order_id>1;
delete from order_out_storage_product where order_out_storage_id>1;
delete from order_out_storage where order_out_storage_id>1;
delete from print_record_order where print_record_id>1;
delete from print_record where print_record_id>1;
delete from shop_bill_description where shop_bill_id>1;
delete from shop_bill_money_record where shop_bill_id>1;
delete from shop_bill_payment_record where shop_bill_id>1;
delete from shop_bill where shop_bill_id>1;
delete from shop_suggestion_solution_process where shop_suggestion_id>1;
delete from shop_suggestion where shop_suggestion_id>1;
delete from shop_visit_review where shop_visit_id>1;
delete from shop_visit_image where shop_visit_id>1;
delete from shop_visit where shop_visit_id>1;
delete from transport_locus where transport_locus_id>1;
delete from transport_locus_error where transport_locus_error_id>1;

delete from shop_product_back_empty where shop_id>2;
delete from shop_product where shop_id>2;
delete from shop_login_history where shop_login_history_id>0;
delete from shop where shop_id>2;
delete from shop_organization_brand where shop_organization_brand_id>1;

delete from product_three_party where product_three_party_id>0;
delete from product_storage_internal_note where product_storage_internal_note_id>0;
delete from product_storage where product_storage_id>1;
delete from product_loss where product_loss_id>1;
delete from product_check_system_number where product_check_system_number_id>1;
delete from product_check_record where product_check_record_id>1;
delete from product_check where product_check_id>1;
delete from product_basic where product_basic_id>1;
delete from product_barcode where product_barcode_id>1;
delete from product_price where product_price_id>1;
delete from product where product_id>1;
delete from product_brand where product_brand_id>1;

delete from warehouse where warehouse_id>2;
delete from provider where provider_id>2;
delete from enterprise_account where enterprise_account_id>1;
delete from user_login_history where user_login_history_id>0;
delete from user_channel_permission where user_id>2;
delete from user_channel where user_id>2;
delete from user_update_history where user_update_history_id>0;
delete from user_channel_person_limit where user_channel_person_limit_id>0;
delete from configuration where configuration_id>1;
delete from `user` where user_id>2;


update user_channel set channel_status=1 where user_id=3;
update user_channel_permission set channel_permission_status=1 where user_id=3;







