$(function(){
	var oreturnTop = document.getElementById('returnTop');
		//获取页面可视区域的高度
		var clientHeight = document.documentElement.clientHeight;
		var timer = null;
		var isTop = true;

		//滚动条滚动时触发
		window.onscroll = function(){
			var osTop = document.documentElement.scrollTop || document.body.scrollTop;
			if (osTop >= clientHeight) {
				oreturnTop.style.display = 'block';
			}else{
				oreturnTop.style.display = 'none';
			}

			if (!isTop) {
				clearInterval(timer);
			}
			isTop = false;
		}

		oreturnTop.onclick = function(){
			//设置定时器
			timer = setInterval(function(){
				//获取滚动条距离顶部的高度
				var osTop = document.documentElement.scrollTop || document.body.scrollTop;
				var ispeed = Math.floor(-osTop / 6);
				document.documentElement.scrollTop = document.body.scrollTop = osTop + ispeed;

				isTop = true;
				if (osTop == 0) {
					clearInterval(timer);
				}
			},30);
		}
})