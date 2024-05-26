<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <!-- ZUI 标准版压缩后的 CSS 文件 -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/zui/1.10.0/css/zui.min.css">

    <!-- ZUI Javascript 依赖 jQuery -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/zui/1.10.0/lib/jquery/jquery.js"></script>
    <!-- ZUI 标准版压缩后的 JavaScript 文件 -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/zui/1.10.0/js/zui.min.js"></script>

</head>
<body>
<div class="example">

    <h1 class="text-center">销售日志</h1>
    <div class="panel">
        <div class="panel-heading">
           门店:{{$sale->store->name}}
        </div>

        <div class="panel-body">
            <div class="abstract">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail3">型号：{{$sale->model}}</label>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputInviteCode3">提成:{{$sale->amount}}</label>
                    </div>
            </div>
        </div>
    </div>
    <!-- 文章正文部分 -->
    <section class="content">
{{--        <img src="{{$sale->img}}">--}}
    </section>
    <!-- 文章底部 -->
    <footer>
        {{--            <ul class="pager pager-justify">--}}
        {{--                <li class="previous"><a href="#"><i class="icon-arrow-left"></i> 上一篇</a></li>--}}
        {{--                <li><a href="#"><i class="icon-list-ul"></i> 目录</a></li>--}}
        {{--                <li class="next disabled"><a href="#">没有下一篇 <i class="icon-arrow-right"></i></a></li>--}}
        {{--            </ul>--}}
    </footer>
</div>
<script>
    // var sites = $('#str').val();
{{--    {!! app('js.transformer')->setNamespace('sites')->put(['username' => $username]); !!}--}}
    var sites = ["Q7H2F","Q8H2F","U28E2G","E8225","E8625","E955H","E1555","E155C","E155K","S935","S135","EG92T","EG93T","EG12T","EG12N","EG13K","SD139","P1D","P1DL","P1","SD128","EG128","E9025","E8S2C","E9L2N","H8470","G8480","S8055","S9355","EG13N","Q7130","E10GS","V75GS","QA6331","V9059","VD9059","E9028","V63GS","EG925","E1255","E8325","HA6141","Q780U","EA6021","QA6131","MA6152","E7132","E7150","EA7131","E1028","EA7121","EA8122","EG92N","Q6331","E7225","T8160","Q7322","P200W","A3022","Q9H2F","A3021","U8359","E1L2N","X8155","E1558","V8055","E8122","F641U","T745U","M5021","QA6141","EG125","T7521","LD16Y","LD16R","LD165","LD169","LD168","LD16V","L165","L16V","L169","L16R","P1DM","P1DT","E8626","P300","V65GW","H8T3R","TGDBJ","E955V","E80SL","E155","EG155","EG13D","EG15H","EG158","EG1D8","EG156","EG157","E158","E1D8","E156","E157","LD1NY","EGASU","L166","E10SL","U8321","E15V","EGASL","EG93D","TQVTS","H57321","U862H","Q29H2F","SD935","EG15V","U7421","NHEBL","E10SU","ESV91","ESV81","SD108","Q1621","E106","EG106","9058S","EH900S","P2D","EG13X","U8B3M","9098P","9095V","EG13T","LD1E8","9095P","P310","LD257","EG10G","LD255","U8422","U1232","LD256","SD168","SD16V","A312D","A312E","Y1Z","LD1N8","E15SN"];
    // alert(sites);

    // var sites = model.replace("&quot;","'");
    function autocomplete(inp, arr) {
        /*自动填充函数有两个参数，input 输入框元素和自动填充的数组*/
        var currentFocus;
        /* 监听 input 输入框，当在 input 输入框元素中时执行以下函数*/
        inp.addEventListener("input", function (e) {
            var a, b, i, val = this.value;
            /*关闭已打开的自动填充列表*/
            closeAllLists();
            if (!val) {
                return false;
            }
            currentFocus = -1;
            /*创建 DIV 元素用于放置自动填充列表的值*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            /*DIV 作为自动填充容器的子元素*/
            this.parentNode.appendChild(a);
            /*循环数组*/
            for (i = 0; i < arr.length; i++) {
                /*检查填充项是否有与文本字段值相同的内容，不区分大小写*/
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                    /*为每个匹配元素创建一个 DIV 元素 */
                    b = document.createElement("DIV");
                    /*匹配项加粗*/
                    b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                    b.innerHTML += arr[i].substr(val.length);
                    /*选中的填充项插入到隐藏 input 输入字段，用于保存当前选中值*/
                    b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                    /*当有人点击填充项（DIV 元素）时执行函数*/
                    b.addEventListener("click", function (e) {
                        /*选中的填充项插入到隐藏 input 搜索字段*/
                        inp.value = this.getElementsByTagName("input")[0].value;
                        /*关闭自动填充列表*/
                        closeAllLists();
                    });
                    a.appendChild(b);
                }
            }
        });
        /*按下键盘上的一个键时执行函数*/
        inp.addEventListener("keydown", function (e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
                /*如果按下箭头向下键，currentFocus 变量加 1，即向下移动一位*/
                currentFocus++;
                /*使当前选中项更醒目*/
                addActive(x);
            } else if (e.keyCode == 38) { //up
                /*按下箭头向上键，选中列表项向上移动一位*/
                currentFocus--;
                /*使当前选中项更醒目*/
                addActive(x);
            } else if (e.keyCode == 13) {
                /*如果按下 ENTER 键，阻止提交，你也可以设置 submit 提交*/
                e.preventDefault();
                if (currentFocus > -1) {
                    /*模拟点击选中项*/
                    if (x) x[currentFocus].click();
                }
            }
        });

        function addActive(x) {
            /*设置选中的选项函数*/
            if (!x) return false;
            /*移动选项设置不同选中选项的背景颜色*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*添加 "autocomplete-active" 类*/
            x[currentFocus].classList.add("autocomplete-active");
        }

        function removeActive(x) {
            /*移除没有选中选项的 "autocomplete-active" 类*/
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
            }
        }

        function closeAllLists(elmnt) {
            /*关闭自动添加列表*/
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }

        /*点击 HTML 文档任意位置关闭填充列表*/
        document.addEventListener("click", function (e) {
            closeAllLists(e.target);
        });
    }

    autocomplete(document.getElementById("myInput"), sites);
</script>
</body>
</html>
