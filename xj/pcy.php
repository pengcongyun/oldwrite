<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640">
    <title>调查问卷</title>
    <style>
        div{
            box-sizing:border-box;
        }
        body,input,i,a{
            padding:0;
            margin:0;
            text-decoration: none;
            outline:none;
            font-size: 26px;
        }
        body{
            width: 100%;
            height: 100%;
        }
        .main{
            padding:0;
            margin:0;
            position: relative;
            background: url("33.jpg") center center no-repeat;
            height: 4160px;
            width: 640px;
        }
        .form{
            position: absolute;
            margin-top: 900px;
            margin-left: 80px;
        }
        .first{
            margin-top: 30px;
            position: relative;
        }
        .first .title{
            width: 510px;
            display: block;
            font-size:32px;
            font-family:粗体;
        }
        .first .answer{
            margin-top: 24px;
            position: relative;
            width: 400px;
        }

        .first .answer .re_inp{
            width: 100px;
            height: 50px;
            text-align: center;
            float: left;
            color: #333333;
            position: relative;
        }
        .first .answer .re_inp input{
            width: 50px;
            height: 50px;
            margin-top: 18px;
            opacity: 0;
            cursor: pointer;
            border-radius: 40px;
        }
        .first .answer .re_inp label{
            position: absolute;
            left: 0px;
            top: -3px;
            width: 40px;
            height: 40px;
            border: 1px solid #c57b35;
            cursor: pointer;
            border-radius: 40px;
        }
        .first .answer .re_inp input:checked+label:after{
            opacity: 1;
            content: url('1.png');
            position: absolute;
            background: #c5812a;
            left: 0px;
            top: 0px;
            border-top: none;
            border-right: none;
            width: 40px;
            height: 40px;
            border-radius: 40px;
        }
        .first .answer .type{
            margin-top: 18px;
            font-size: 26px;
            color: #333333;
            width: 400px;
            margin-left: 50px;
            height: 40px;
            line-height: 40px;
            display: block;
        }
    </style>
</head>
<body>
<div class="main">
    <div class="form">
        <form action="pcy_post.php" method="post">
            <input type="radio" name="a" value="无" autocomplete="off" checked style="display: none">
            <input type="radio" name="b" value="无" autocomplete="off" checked style="display: none">
            <input type="radio" name="c" value="无" autocomplete="off" checked style="display: none">
            <input type="radio" name="d" value="无" autocomplete="off" checked style="display: none">
            <input type="radio" name="e" value="无" autocomplete="off" checked style="display: none">
            <input type="radio" name="f" value="无" autocomplete="off" checked style="display: none">
            <input type="radio" name="g" value="无" autocomplete="off" checked style="display: none">
            <input type="radio" name="h" value="无" autocomplete="off" checked style="display: none">
            <div class="first">
                <span class="title">1.您的班级</span><br>
                <div class="answer">
                    <div class="re_inp">
                        <input type="radio" name="a" id="a1" value="18酒店管理一班" autocomplete="off">
                        <label for="a1"></label>
                    </div>
                    <span class="type">18酒店管理一班</span>
                </div>
                <div class="answer">
                    <div class="re_inp">
                        <input type="radio" name="a" id="a2" value="18酒店管理二班" autocomplete="off">
                        <label for="a2"></label>
                    </div>
                    <span class="type">18酒店管理二班</span>
                </div>
            </div>
            <div class="first">
                <span class="title">2.您的性别</span><br>
                <div class="answer">
                    <div class="re_inp">
                        <input type="radio" name="b" id="b1" value="男" autocomplete="off">
                        <label for="b1"></label>
                    </div>
                    <span class="type">男</span>
                </div>
                <div class="answer">
                    <div class="re_inp">
                        <input type="radio" name="b" id="b2" value="女" autocomplete="off">
                        <label for="b2"></label>
                    </div>
                    <span class="type">女</span>
                </div>
            </div>
            <div class="first">
                <span class="title">3.您使用过拼多多吗？</span><br>
                <div style="width: 480px;">(如使用过，继续第4题，如果没有，请跳至第九题)</div>
                <div class="answer">
                    <div class="re_inp">
                        <input type="radio" name="c" id="c1" value="使用过" autocomplete="off">
                        <label for="c1"></label>
                    </div>
                    <span class="type">使用过</span>
                </div>
                <div class="answer">
                    <div class="re_inp">
                        <input type="radio" name="c" id="c2" value="没使用过" autocomplete="off">
                        <label for="c2"></label>
                    </div>
                    <span class="type">没使用过</span>
                </div>
            </div>
            <div class="first">
                <span class="title">4.您认为拼多多的客源市场定位为？</span><br>
                <div class="answer">
                    <div class="re_inp">
                        <input type="radio" name="d" id="d1" value="低档" autocomplete="off">
                        <label for="d1"></label>
                    </div>
                    <span class="type">低档</span>
                </div>
                <div class="answer">
                    <div class="re_inp">
                        <input type="radio" name="d" id="d2" value="中档" autocomplete="off">
                        <label for="d2"></label>
                    </div>
                    <span class="type">中档</span>
                </div>
                <div class="answer">
                    <div class="re_inp">
                        <input type="radio" name="d" id="d3" value="高档" autocomplete="off">
                        <label for="d3"></label>
                    </div>
                    <span class="type">高档</span>
                </div>
            </div>
            <div class="first">
                <span class="title">5.您觉得拼多多的产品？</span><br>
                <div class="answer">
                    <div class="re_inp">
                        <input type="radio" name="e" id="e1" value="太差" autocomplete="off">
                        <label for="e1"></label>
                    </div>
                    <span class="type">太差</span>
                </div>
                <div class="answer">
                    <div class="re_inp">
                        <input type="radio" name="e" id="e2" value="差" autocomplete="off">
                        <label for="e2"></label>
                    </div>
                    <span class="type">差</span>
                </div>
                <div class="answer">
                    <div class="re_inp">
                        <input type="radio" name="e" id="e3" value="一般" autocomplete="off">
                        <label for="e3"></label>
                    </div>
                    <span class="type">一般</span>
                </div>
                <div class="answer">
                    <div class="re_inp">
                        <input type="radio" name="e" id="e4" value="好" autocomplete="off">
                        <label for="e4"></label>
                    </div>
                    <span class="type">好</span>
                </div>
                <div class="answer">
                    <div class="re_inp">
                        <input type="radio" name="e" id="e5" value="很好" autocomplete="off">
                        <label for="e5"></label>
                    </div>
                    <span class="type">很好</span>
                </div>
            </div>
            <div class="first">
                <span class="title">6.您觉得拼多多的价格？</span><br>
                <div class="answer">
                    <div class="re_inp">
                        <input type="radio" name="f" id="f1" value="低" autocomplete="off">
                        <label for="f1"></label>
                    </div>
                    <span class="type">低</span>
                </div>
                <div class="answer">
                    <div class="re_inp">
                        <input type="radio" name="f" id="f2" value="中" autocomplete="off">
                        <label for="f2"></label>
                    </div>
                    <span class="type">中</span>
                </div>
                <div class="answer">
                    <div class="re_inp">
                        <input type="radio" name="f" id="f3" value="高" autocomplete="off">
                        <label for="f3"></label>
                    </div>
                    <span class="type">高</span>
                </div>
            </div>
            <div class="first">
                <span class="title">7.您觉得拼多多的营销渠道？</span><br>
                <div class="answer">
                    <div class="re_inp">
                        <input type="radio" name="g" id="g1" value="单一" autocomplete="off">
                        <label for="g1"></label>
                    </div>
                    <span class="type">单一</span>
                </div>
                <div class="answer">
                    <div class="re_inp">
                        <input type="radio" name="g" id="g2" value="一般" autocomplete="off">
                        <label for="g2"></label>
                    </div>
                    <span class="type">一般</span>
                </div>
                <div class="answer">
                    <div class="re_inp">
                        <input type="radio" name="g" id="g3" value="多样" autocomplete="off">
                        <label for="g3"></label>
                    </div>
                    <span class="type">多样</span>
                </div>
            </div>
            <div class="first">
                <span class="title">8.您觉得拼多多的促销方式？</span><br>
                <div class="answer">
                    <div class="re_inp">
                        <input type="radio" name="h" id="h1" value="不好" autocomplete="off">
                        <label for="h1"></label>
                    </div>
                    <span class="type">不好</span>
                </div>
                <div class="answer">
                    <div class="re_inp">
                        <input type="radio" name="h" id="h2" value="一般" autocomplete="off">
                        <label for="h2"></label>
                    </div>
                    <span class="type">一般</span>
                </div>
                <div class="answer">
                    <div class="re_inp">
                        <input type="radio" name="h" id="h3" value="不错" autocomplete="off">
                        <label for="h3"></label>
                    </div>
                    <span class="type">不错</span>
                </div>
            </div>
            <div class="first">
                <span class="title" style="">9.请简述您使用或不愿使用拼多多的原因</span><br>
                <textarea name="i" style="margin-top: 10px;width: 480px;height: 300px;border: 1px solid #e6e5e5;font-size: 26px;border-radius:8px;"></textarea>
            </div>
            <div style="margin-top: 40px;position: relative;text-align: center;width: 480px;">
                <input type="submit" style="text-align:center;background: url('2.png');width: 480px;height: 85px;border-radius: 85px;border: none;" value="">
            </div>
        </form>
    </div>
</div>
<script>
    autoSize();
    window.onresize = function(){
        autoSize();
    };
    function autoSize(){
// 获取当前浏览器的视窗宽度，放在w中
        var w = document.documentElement.clientWidth;
// 计算实际html font-size大小
        var size = w * 100 / 375 ;
// 获取当前页面中的html标签
        var html = document.querySelector('html');
// 设置字体大小样式
        html.style.fontSize = size + 'px';
    }
</script>
</body>
</html>