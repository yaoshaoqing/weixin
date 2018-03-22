        <include file="./Apps/Admin/View/Weixin/left.tpl" />
	<div id="right"> 
            <form method="post">
                <div style="margin-left:55px;">
                   type <input type="text" name="type" style="margin-bottom:5px;">&nbsp;&nbsp;<br>
                   name <input type="text" name="name" style="margin-bottom:5px;">&nbsp;&nbsp;<br>
                    key  <input type="text" name="key" style="margin-bottom:20px;margin-left: 6px;">&nbsp;&nbsp;<br>
                    <input type="submit" value="提交" style="margin-left:160px;">
                </div>
            </form>
</div></div>
	<div id="bottomDiv"></div>
</div>
<script language="javascript">
$("#test1").toggle(function(){$("#test").slideDown()},function(){$("#test").slideUp()})
</script>
<div style="text-align:center;">
</div>
</body>
</html>