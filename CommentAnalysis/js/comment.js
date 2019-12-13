$(document).ready(function() {
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
  
  
  $('#pro0').on("click",function(){
	   $('#t1').html("111111");
  });
  
  
});
