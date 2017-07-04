$(function($) {

  // $(".course-type").mouseover(function(){
  //   $(".description").animate({
  //     height:'100%',
  //     backgroundColor:'red'
  //   });
  // });
	$("#activi-ing").click(function(){
	  $(".filter-time-child").fadeToggle();
	});


	/* 监测页面宽度 */
	$(window).resize(function() {
		$('.window-indi').html($('body').innerWidth());
	}).trigger('resize');

	/* 手机端导航条显示与隐藏 */
	$('.g-navbar-icon a').click(function(e) {
		e.preventDefault();
		$('.nav-top').addClass('show-nav');
		$('body').addClass('no-overflow');
	});

	$('.close-navbar a').click(function(e) {
		e.preventDefault();
		$('.nav-top').removeClass('show-nav');
		$('body').removeClass('no-overflow');
	});


	/* 导航条搜素框显示与隐藏 */
	$('.g-navbar-search a').click(function(e) {
		e.preventDefault();
		$('.g-navbar-searchbox').addClass('show-box');

		$(document).one('click', function() {
			$('.g-navbar-searchbox').removeClass('show-box');
		});
		e.stopPropagation();
	});
	$('.g-navbar-searchbox').click(function(e) {
		e.stopPropagation();
	});


	/* 分享，点赞，收藏 */
	// var $hidden_image_container = $('.hidden-image-container');
	// if ($hidden_image_container) {
	// 	var show_share = $hidden_image_container.find('.show-share').attr('src');
	// 	var hide_share = $hidden_image_container.find('.hide-share').attr('src');
	// 	var hide_praise = $hidden_image_container.find('.hide-praise').attr('src');
	// 	var show_praise = $hidden_image_container.find('.show-praise').attr('src');
	// 	var show_like = $hidden_image_container.find('.show-like').attr('src');
	// 	var hide_like = $hidden_image_container.find('.hide-like').attr('src');
	// 	$('.knowlg-detail-share').click(function(e) {
	// 		e.preventDefault();
	// 		if ($(this).hasClass('active')) {
	// 			$(this).removeClass('active');
	// 			$(this).find('img').attr('src', hide_share);
	// 		} else {
	// 			$(this).addClass('active');
	// 			$(this).find('img').attr('src', show_share);
	// 		}
	// 	});
	// 	$('.knowlg-detail-praise').click(function(e) {
	// 		e.preventDefault();
	// 		if ($(this).hasClass('active')) {
	// 			$(this).removeClass('active');
	// 			$(this).find('img').attr('src', hide_praise);
	// 		} else {
	// 			$(this).addClass('active');
	// 			$(this).find('img').attr('src', show_praise);
	// 		}
	// 	});
	// 	$('.knowlg-detail-like').click(function(e) {
	// 		e.preventDefault();
	// 		if ($(this).hasClass('active')) {
	// 			$(this).removeClass('active');
	// 			$(this).find('img').attr('src', hide_like);
	// 		} else {
	// 			$(this).addClass('active');
	// 			$(this).find('img').attr('src', show_like);
	// 		}
	// 	});
	// }


	/* 课程页筛选 */
	$('.course-filter-btn a').click(function(e) {
		e.preventDefault();
		$(this).closest('.course-filter-btn').find('a').removeClass('active');
		$(this).addClass('active');
	});

	/* 一键回到顶部 */
	$(window).on('scroll', function(e) {
		if ($(window).scrollTop() > 150) {
			$('.backto-top').show();
		}
		else {
			$('.backto-top').hide();
		}
	});

	$('.backto-top').click(function(e) {
		e.preventDefault();
		$('html, body').animate({scrollTop: 0}, '10', 'swing', function() {

		})
	});

	$('.already').click(function(e) {
		if ($('#already1').is(':checked')) {
			$('#course_type').prop('disabled', false);
		}
		else if ($('#already2').is(':checked')) {
			$('#course_type').prop('disabled', true);
			$('#course_type').val('');
		}
	});

	$('.health').click(function(e) {
		if ($('#health1').is(':checked')) {
			$('.health-wrapper').show();
		}
		else if ($('#health2').is(':checked')) {
			$('.health-wrapper').hide();
		}
	});


});