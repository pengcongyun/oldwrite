<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"   content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="screen-orientation" content="portrait">
    <meta name="x5-orientation" content="portrait">
    <title>物料申请审核</title>
    <script type="text/javascript" src="./jquery.js"></script>
    <style>
        input{ margin:0; padding:0; border:none; outline:none;}
        body{
            padding-bottom: 0.2rem;
            background-color: #f5f5f5;
            margin: 0;
            position: relative;
        }
        .ff{
            width: 100%;height: 0.4rem;line-height: 0.4rem;
            padding-left: 0.2rem;box-sizing:border-box;
        }
        .ff span{
            font-size: 0.14rem;
            font-family: 微软雅黑;
            color: #333333;
        }
        .ff_a{
            width: calc(100% - 0.4rem);
            height: 1rem;
            background-color: #ffffff;
            border-radius: 5px;
            box-sizing:border-box;
            padding: 0.2rem 0.2rem 0 0.2rem;
            margin-left: 0.2rem;
        }
        .ff_a .xl_a{
            width: 100%;
            height: auto;
            border-bottom: 1px solid #cccccc;
            overflow: hidden;
            box-sizing:border-box;

        }
        .ff_a .xl_a span:nth-child(1){
            display: block;
            width: auto;
            height: auto;
            float: left;
            font-size: 0.12rem;
            color: #333333;
            font-family: 微软雅黑;
        }
        .ff_a .xl_a span:nth-child(2){
            display: block;
            width: auto;
            height: auto;
            float: right;
            font-size: 0.12rem;
            color: #333333;
            font-family: 微软雅黑;
        }
        .ff_a .xl_b{
            width: 100%;
            height: auto;
            border-bottom: 1px solid #cccccc;
            overflow: hidden;
            margin-top: 0.2rem;
        }
        .ff_a .xl_b span{
            display: block;
            width: auto;
            height: auto;
            float: left;
            font-size: 0.12rem;
            color: #333333;
            font-family: 微软雅黑;
        }
        .ff_b{
            width: calc(100% - 0.4rem);
            margin-left: 0.2rem;
            box-sizing:border-box;
            height: 1rem;
            background-color: #ffffff;
            border: none;
            outline: 0;
        }
        .cont{
            width: calc(100% - 0.4rem);
            margin-left: 0.2rem;
            box-sizing:border-box;
            height: auto;
            box-sizing:border-box;
        }
        .list{
            width: 100%;
            height: 1.07rem;
            background-color: #ffffff;
            box-sizing:border-box;
            padding: 0.09rem;
            margin-bottom: 0.2rem;
        }
        .list .list_left{
            width: 0.88rem;
            height: 0.88rem; box-sizing:border-box;
            background:#f5f5f5;
            padding: 0.07rem;
            float: left;
        }
        .list .list_left img{
            width: 100%;
            height: 100%;
        }
        .list_right{
            width:calc(100% - 0.88rem);
            height:100%;
            float:left;
            padding-left:0.08rem;
            box-sizing:border-box;
        }
        .list_right .title{
            width:100%;
            height:0.17rem;
            overflow:hidden;
            float:left;
            font-size:0.14rem;
            line-height:0.17rem;
            margin-top:0.05rem;
        }
        .list_right .icon_a{
            width:100%;
            height:0.14rem;
            margin-top:0.12rem;
            float:left;
        }
        .list_right .icon_a span{
            width:auto;
            height:auto;
            padding:0.035rem 0.04rem;
            float:left;
            margin-right:0.1rem;
            font-size:0.1rem;
            color:#f9aa35;
            background:#fef6eb;
            border-radius:2px;
        }
        .bo{
            width:100%;
            height:0.25rem;
            margin-top:0.13rem;
            float:left;
        }
        .bo .bo_a{
            overflow: hidden;
        }
        .bo .bo_a:nth-child(1){
            width: 33%;
            height: 0.25rem;
            float: left;
            display:flex;
            flex-direction:row;
            align-items: flex-end;
        }
        .bo .bo_a:nth-child(2){
            width: 33%;
            height: 0.25rem;
            float: left;
            display:flex;
            flex-direction:row;
            align-items: flex-end;
            justify-content: center;
        }
        .bo .bo_a:nth-child(3){
            width: 33%;
            height: 0.25rem;
            float: left;
            display:flex;
            flex-direction:row;
            align-items: flex-end;
            justify-content: flex-end;
        }
        .bo .bo_a:nth-child(2){
            width: 34%;
        }
        .bo .bo_a span:nth-child(1){
            font-size: 0.14rem;
            color: #333333;
        }
        .bo .bo_a span:nth-child(2){

            font-size: 0.065rem;
            color: #7e7e7e;
        }
        .buttton{
            width: 100%;
            height: 0.4rem;
            position: fixed;
            left: 0;
            bottom: 0;
            z-index: 90;
        }
        .buttton .qu{
            width: 100%;
            height: 0.4rem;
            background: -webkit-linear-gradient(45deg, rgba(239, 82, 79, 1) 0%, rgba(239, 82, 79, 1) 0%, rgba(236, 75, 72, 1) 34%, rgba(234, 68, 65, 1) 66%, rgba(229, 58, 54, 1) 100%, rgba(229, 58, 54, 1) 100%);
            background: -moz-linear-gradient(45deg, rgba(239, 82, 79, 1) 0%, rgba(239, 82, 79, 1) 0%, rgba(236, 75, 72, 1) 34%, rgba(234, 68, 65, 1) 66%, rgba(229, 58, 54, 1) 100%, rgba(229, 58, 54, 1) 100%);
            background: linear-gradient(45deg, rgba(239, 82, 79, 1) 0%, rgba(239, 82, 79, 1) 0%, rgba(236, 75, 72, 1) 34%, rgba(234, 68, 65, 1) 66%, rgba(229, 58, 54, 1) 100%, rgba(229, 58, 54, 1) 100%);
            color: #ffffff;
            text-align: center;
            font-size: 14px;
            line-height: 0.4rem;
        }
        .bohui{
            width: 50%;
            height: 0.4rem;
            background:#ffffff;
            color: #EF524F;
            text-align: center;
            font-size: 14px;
            display: block;
            line-height: 0.4rem;
            float: left;
        }
        .buttton .tongguo{
            width: 50%;
            height: 0.4rem;
            background: -webkit-linear-gradient(45deg, rgba(100, 186, 104, 1) 0%, rgba(100, 186, 104, 1) 0%, rgba(92, 179, 96, 1) 34%, rgba(79, 170, 83, 1) 66%, rgba(69, 162, 73, 1) 100%, rgba(69, 162, 73, 1) 100%);
            background: -moz-linear-gradient(45deg, rgba(100, 186, 104, 1) 0%, rgba(100, 186, 104, 1) 0%, rgba(92, 179, 96, 1) 34%, rgba(79, 170, 83, 1) 66%, rgba(69, 162, 73, 1) 100%, rgba(69, 162, 73, 1) 100%);
            background: linear-gradient(45deg, rgba(100, 186, 104, 1) 0%, rgba(100, 186, 104, 1) 0%, rgba(92, 179, 96, 1) 34%, rgba(79, 170, 83, 1) 66%, rgba(69, 162, 73, 1) 100%, rgba(69, 162, 73, 1) 100%);
            color: #ffffff;
            text-align: center;
            font-size: 14px;
            display: block;
            line-height: 0.4rem;
            float: left;
        }
        .scrren{
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            right: 0;
            background-color:rgba(33, 33, 33, 0.45);
            z-index: 99;
            display: none;
        }
        .scrren .sur{
            width: 2rem;
            height: 1.2rem;
            position: absolute;
            left:50%;
            top: 50%;
            margin-left: -1rem;
            margin-top: -0.6rem;
            overflow: hidden;
            border-radius: 5px;
            display: none;
        }
        .scrren .sur .sur_a{
            width: 2rem;
            height: 0.8rem;
            text-align: center;
            line-height: 0.8rem;
            color: red;
            font-size: 0.16rem;
            background-color: #FFFFfF;
        }
        .scrren .sur .sur_b{
            width: 2rem;
            height: 0.4rem;
            text-align: center;
        }
        .scrren .sur .sur_b span{
            float: left;
            width: 50%;
            height: 0.4rem;
            line-height: 0.4rem;
            font-size: 0.14rem;
            text-align: center;
        }
        .scrren .sur .sur_b span:nth-child(1){
            color: #7e7e7e;
            background-color: #ffffff;
            box-sizing:border-box;
            border-top: 1px solid #f5f5f5;
        }
        .scrren .sur .sur_b span:nth-child(2){
            background: #f8aa34;
            color: #ffffff;
        }


        .scrren .din{
            width: 3rem;
            height: 1.6rem;
            position: absolute;
            left:50%;
            top: 50%;
            margin-left: -1.5rem;
            margin-top: -0.6rem;
            overflow: hidden;
            border-radius: 5px;
            display: none;
            background-color: #FFFFfF;
        }
        .scrren .din .din_a{
            background-color: #FFFFfF;
            width: 3rem;
            height: 1.2rem;
        }
        .scrren .din textarea{
            width: 3rem;
            height: 1.2rem;
            padding: 0.15rem;
            color: #333333;
            font-size: 0.16rem;
            background-color: #FFFFfF;
            box-sizing:border-box;
            border: none;
            outline: 0;
        }
        .scrren .din .din_b{
            width: 3rem;
            height: 0.4rem;
            text-align: center;
        }
        .scrren .din .din_b span{
            float: left;
            width: 50%;
            height: 0.4rem;
            line-height: 0.4rem;
            font-size: 0.14rem;
            text-align: center;
        }
        .scrren .din .din_b span:nth-child(1){
            color: #7e7e7e;
            background-color: #ffffff;
            box-sizing:border-box;
            border-top: 1px solid #f5f5f5;
        }
        .scrren .din .din_b span:nth-child(2){
            background: #f8aa34;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class='ff'><span>基本信息</span></div>
    <div class="ff_a">
        <div class="xl_a"><span>申请人员：</span><span></span></div>
        <div class="xl_b"><span>终端名称：</span></div>
    </div>
    <div class='ff'><span>申请理由</span></div>
    <textarea readonly class="ff_b" ></textarea>

    <div class='ff'><span>订单备注</span></div>
    <textarea readonly class="ff_b"></textarea>
    <div class='ff'><span>商品信息</span></div>
    <div class="cont">
            <div class="list">
                <div class="list_left"><img src=""></div>
                <div class="list_right">
                    <span class="title"></span>
                    <div class="icon_a">
                        <span></span><span></span><span>

                        </span>
                    </div>
                    <div class="bo">
                        <div class="bo_a"><span>元</span><span>单价</span></div>
                        <div class="bo_a"><span>

                            </span><span>申请</span></div>
                        <div class="bo_a"><span>元</span><span>金额</span></div>
                    </div>
                </div>
            </div>
    </div>
    <div class="buttton">
            <span class="qu">申请已取消</span>
    </div>
        <div class="scrren">
            <div class="sur">
                <div class="sur_a"><span>确定通过申请</span></div>
                <div class="sur_b"><span class="sur_qu_bt">取消</span><span class="sur_sa_bt">确认</span></div>
            </div>
            <div class="din">
                <div class="din_a"><textarea placeholder="请输入驳回理由" id="reject_value"></textarea></div>
                <div class="din_b"><span class="din_qu_bt">取消</span><span class="din_sa_bt">确认</span></div>
            </div>
        </div>



<script>
    /*弹窗专用*/
    window.onresize=function () {
        f();
    };
    f();
    function f(){
        var a = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
        var b = document.documentElement.getBoundingClientRect().width;
        var c=a/(b*100/750);
    }
    $('.tongguo').click(function () {
        $('.scrren,.scrren .sur').show();
    });
    $('.sur_qu_bt').click(function () {
        $('.scrren,.scrren .sur').hide();
    });
    $('.sur_sa_bt').click(function () {
        $('.scrren,.scrren .sur').hide();
    });
    $('.bohui').click(function () {
        $('.scrren,.scrren .din').show();
    });
    $('.din_qu_bt').click(function () {
        $('.scrren,.scrren .din').hide();
    });
    $('.din_sa_bt').click(function () {
        $('.scrren,.scrren .din').hide();
    });
    ;(function (designWidth, maxWidth) {
        var doc = document,
            win = window;
        var docEl = doc.documentElement;
        var tid;
        var rootItem, rootStyle;

        function refreshRem() {
            var width = docEl.getBoundingClientRect().width;
            if (!maxWidth) {
                maxWidth = 540;
            }
            ;
            if (width > maxWidth) {
                width = maxWidth;
            }
            //与淘宝做法不同，直接采用简单的rem换算方法1rem=100px
            var rem = width * 100 / designWidth;
            //兼容UC开始
            rootStyle = "html{font-size:" + rem + 'px !important}';
            rootItem = document.getElementById('rootsize') || document.createElement("style");
            if (!document.getElementById('rootsize')) {
                document.getElementsByTagName("head")[0].appendChild(rootItem);
                rootItem.id = 'rootsize';
            }
            if (rootItem.styleSheet) {
                rootItem.styleSheet.disabled || (rootItem.styleSheet.cssText = rootStyle)
            } else {
                try {
                    rootItem.innerHTML = rootStyle
                } catch (f) {
                    rootItem.innerText = rootStyle
                }
            }
            //兼容UC结束
            docEl.style.fontSize = rem + "px";
        };
        refreshRem();

        win.addEventListener("resize", function () {
            clearTimeout(tid); //防止执行两次
            tid = setTimeout(refreshRem, 300);
        }, false);

        win.addEventListener("pageshow", function (e) {
            if (e.persisted) { // 浏览器后退的时候重新计算
                clearTimeout(tid);
                tid = setTimeout(refreshRem, 300);
            }
        }, false);

        if (doc.readyState === "complete") {
            doc.body.style.fontSize = "16px";
        } else {
            doc.addEventListener("DOMContentLoaded", function (e) {
                doc.body.style.fontSize = "16px";
            }, false);
        }
    })(375, 1200);

    $('.sur_sa_bt').click(function () {
        handle(<?php echo $data['apply_order_id']?>,2);
    });
    $('.din_sa_bt').click(function () {
        handle(<?php echo $data['apply_order_id']?>,3);
    });
    function handle(kid,status) {
        var reject_value=$('#reject_value').val();
        $.ajax({
            type: "get",
            url: "<?php echo  Yii::$app->urlManager->createUrl('admin/order/applyOrderHandle')?>",
            data: {kid:kid,order_status:status,audit_note:reject_value},
            success: function(msg) {
                //刷新当前页面
                if(msg['status']==true){
                    window.location.reload();
                }else {
                    alert(msg['msg']);
                }
            }
        });
    }



</script>
</body>
</html>


