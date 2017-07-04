$(function($) {
	/* 日历控件 */
	$('#dtBox').DateTimePicker({
		language: "zh-CN",
		addEventHandlers: function() {
		  var oDTP = this;
		  oDTP.settings.minDate = oDTP.getDateTimeStringInFormat("Date", "yyyy-MM-dd", new Date(1890,1,1));
		  oDTP.settings.maxDate = oDTP.getDateTimeStringInFormat("Date", "yyyy-MM-dd", new Date());
		}
	});
});