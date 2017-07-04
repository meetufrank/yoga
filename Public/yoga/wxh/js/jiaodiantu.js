var parentShoujiUl = document.getElementById('parentShoujiUl');
var list = document.getElementById('list');
var buttons = document.getElementById('buttons').getElementsByTagName('span');
var index = 1;
var animated = false;
var timer;

function showButton(){
		for (var i = 0; i < buttons.length; i++){
			if(buttons[i].className == 'on'){
					buttons[i].className = '';
					break;
				}	
			}
		buttons[index - 1].className = 'on';
	}

function animate(offset){
		animated = true;
		var newleft = parseInt(list.style.left) + offset;
		var time = 300;  //位移总时间内
		var interval = 10;  //位移间隔时间
		var speed = offset/(time/interval);  //每次位移量
		
		function go(){
				if(speed < 0 && parseInt(list.style.left) > newleft){
					list.style.left = parseInt(list.style.left) + speed + 'px';
					setTimeout(go,interval);
				}else{
					animated = false;
					list.style.left = newleft + 'px';
					
					if (newleft < -($('.shoujiUl').width()*2)){
						list.style.left = -$('.shoujiUl').width() + 'px';
					}
				}
			}
		
		go();
	}
	function play(){
			timer = setInterval(function(){
					if(index == 2){
						index = 1;
					}else{
						index +=1;
					}
					showButton();
					if (!animated){
						animate(-$('.shoujiUl').width());
					}
				},3000);
		}
	function stop(){
			clearInterval(timer);
		}
	
	for(var i = 0; i < buttons.length; i++){
			buttons[i].onclick = function(){
					if (this.className == 'on'){
						return;
					}
					var myIndex = parseInt(this.getAttribute('index'));
					var offset = -$('.shoujiUl').width() * (myIndex - index);
					if(!animated){
						animate(offset);
					}
					index = myIndex;
					showButton();
				}
		}
	parentShoujiUl.onmouseover = stop;
	parentShoujiUl.onmouseout = play;

	play();
	window.onresize = function(){
		clearInterval(timer);
		play();
	};