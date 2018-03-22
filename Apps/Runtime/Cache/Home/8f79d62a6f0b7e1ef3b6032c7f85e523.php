<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
    <head>
        <title>12306网站接口测试</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="/Public/css/lyz.calendar.css" rel="stylesheet" />
<script type="text/javascript" src="/Public/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="/Public/js/lyz.calendar.min.js" ></script>
<script type="text/javascript">
$(function () {
    var u=$("#upperLimit").val();
    var l=$("#date").val();
        $("#train_date").calendar({
            controlId: "divDate",                                 // 弹出的日期控件ID，默认: $(this).attr("id") + "Calendar"
            speed: 200,                                           // 三种预定速度之一的字符串("slow", "normal", or "fast")或表示动画时长的毫秒数值(如：1000),默认：200
            complement: false,                                     // 是否显示日期或年空白处的前后月的补充,默认：true
            readonly: true,                                       // 目标对象是否设为只读，默认：true
            upperLimit: new Date(u),                               // 日期上限，默认：NaN(不限制)
            lowerLimit: new Date(l),                   // 日期下限，默认：NaN(不限制)
           
        });
    });
</script>
<link href="https://kyfw.12306.cn/otn/resources/css/validation.css" rel="stylesheet" />
<link href="https://kyfw.12306.cn/otn/resources/merged/common_css.css" rel="stylesheet" />
<link rel="icon" href="https://kyfw.12306.cn/otn/resources/images/ots/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="https://kyfw.12306.cn/otn/resources/images/ots/favicon.ico" type="image/x-icon" />
<script src="https://kyfw.12306.cn/otn/resources/js/framework/data.jcokies.js" type="text/javascript" xml:space="preserve"></script>
<script src="https://kyfw.12306.cn/otn/resources/merged/queryLeftTicket_js.js?scriptVersion=1.8997" type="text/javascript" xml:space="preserve"></script>
<link href="https://kyfw.12306.cn/otn/resources/merged/queryLeftTicket_css.css?cssVersion=1.8968" rel="stylesheet" />
<script src="https://kyfw.12306.cn/otn/resources/js/framework/jquery.bgiframe.mi.js" type="text/javascript" xml:space="preserve"></script>

    </head>
    <body>
        <input type="hidden" id="upperLimit" value="<?php echo ($upperLimit); ?>"><input type="hidden" id="date" value="<?php echo ($date); ?>">
        <form method="get" action="https://kyfw.12306.cn/otn/login/userLogin">
    用户名：<input type="text" name="">&nbsp;&nbsp;&nbsp;密码：<input type="password" name="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <img class="touclick-image" alt="" src="https://kyfw.12306.cn/otn/passcodeNew/getPassCodeNew?module=login&rand=sjrand&0.19204335513351234" style="display: block; visibility: visible;">
    <input type="submit" value="登录">
    </form>
    <span id="txtBeginDate">出行时间：<input type="text" id="train_date" name="train_date" placeholder="请输入出发日期"></span>

     <table><tdead><tr class="th" id="float">
<td width="90" colspan="1" rowspan="1">车次</td>
<td width="100" colspan="1" rowspan="1">出发站<br clear="none" >
到达站</td>
<td width="82" colspan="1" rowspan="1" id="startendtime"><span class="b1" id="s_time" style="cursor: pointer;">出发时间</span><br><span class="b2" id="r_time" style="cursor: pointer;">到达时间</span></td>
<td width="82" colspan="1" rowspan="1"><span class="b3" id="l_s" style="cursor: pointer;">历时</span>
</td>
<td width="49" colspan="1" rowspan="1">商务座</td>
<td width="49" colspan="1" rowspan="1">特等座</td>
<td width="49" colspan="1" rowspan="1">一等座</td>
<td width="49" colspan="1" rowspan="1">二等座</td>
<td width="49" colspan="1" rowspan="1">高级<br clear="none">
软卧</td>
<td width="49" colspan="1" rowspan="1">软卧</td>
<td width="49" colspan="1" rowspan="1">硬卧</td>
<td width="49" colspan="1" rowspan="1">软座</td>
<td width="49" colspan="1" rowspan="1">硬座</td>
<td width="49" colspan="1" rowspan="1">无座</td>
<td width="49" colspan="1" rowspan="1">其他</td>
<td width="49" colspan="1" rowspan="1" >备注</td>
</tr>
</tdead>
<?php if(is_array($info)): foreach($info as $key=>$rs): ?><tr>
    <td><?php echo ($rs["station_train_code"]); ?></td><!--车次-->
    <td><?php echo ($rs["start_station_name"]); ?><br><?php echo ($rs["end_station_name"]); ?></td><!--发站站名 and 到站站名-->
    <td><?php echo ($rs["start_time"]); ?><br><?php echo ($rs["arrive_time"]); ?></td><!--出发时间到站时间-->
    <td><?php echo ($rs["lishi"]); ?></td><!--历时-->
    <td><?php echo ($rs["swz_num"]); ?></td><!--商务座-->
    <td><?php echo ($rs["tz_num"]); ?></td><!--特等座-->
    <td><?php echo ($rs["zy_num"]); ?></td><!--一等座-->
    <td><?php echo ($rs["ze_num"]); ?></td><!--二等座-->
    <td><?php echo ($rs["gr_num"]); ?></td><!--高级软卧-->
    <td><?php echo ($rs["rw_num"]); ?></td><!--软卧-->
    <td><?php echo ($rs["yw_num"]); ?></td><!--硬卧-->
    <td><?php echo ($rs["rz_num"]); ?></td><!--软座-->
    <td><?php echo ($rs["yz_num"]); ?></td><!--硬座-->
    <td><?php echo ($rs["wz_num"]); ?></td><!--无座-->
    <td><?php echo ($rs["qt_num"]); ?></td><!--其他-->
    <td><a href="javascript:;" onclick="checkG1234('<?php echo ($rs["secretStr"]); ?>','<?php echo ($rs["start_time"]); ?>','<?php echo ($rs["train_no"]); ?>','<?php echo ($rs["start_station_telecode"]); ?>'),'<?php echo ($rs["end_station_telecode"]); ?>'"><?php echo ($rs["buttonTextInfo"]); ?></a></td><!--备注-->
    
    
</tr><?php endforeach; endif; ?>
<tbody id="queryLeftTable"></tbody>
</table>
    </body>
</html>