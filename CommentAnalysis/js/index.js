$(function() {
	  $(".search-area").click(function(e) {
	    $("body").addClass("search-area-active");
	  });

	  $(document).mouseup(function(e) {
	    var _con = $(".search-area");
	    if (!_con.is(e.target) && _con.has(e.target).length === 0) {
	      $("body").removeClass("search-area-active");
	    }
	  });
	  
	  var pickerStart = new Pikaday({
	    field: document.getElementById("datepicker-start"),
	    firstDay: 1,
	    minDate: new Date(),
	    maxDate: new Date(2020, 12, 31),
	    yearRange: [2000, 2020]
	  });
	  var pickerEnd = new Pikaday({
	    field: document.getElementById("datepicker-end"),
	    firstDay: 1,
	    minDate: new Date(),
	    maxDate: new Date(2020, 12, 31),
	    yearRange: [2000, 2020]
	  });
	  
	  
	  $("#main").submit(function(){
			if ($('#url').val() == "") {
				$('#myModal').modal('show');
				return false;
			}
	  });
				  
	  $("#myModal").on("hidden.bs.modal",function(e){
		  $("body").addClass("search-area-active");
	  });
		  
	  $('.list-item').click(function(e) {
		  e.preventDefault();
		  if ($(this).find('a').attr('href') != undefined) {
			  $('#url').val($(this).find('a').attr('href'));
			  $('#main').submit();
		  }
	  });
	  
	  $('#url').keypress(function(e){
		  if (e.keycode = 13) {
			  $('#main').submit();
		  }
	  });

});

