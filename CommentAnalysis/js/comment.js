$(document).ready(function() {

  $(".score").each(function(){
	 $(this).hide(); 
  });
	
  $(".score").click(function(e) {
	    $(this).siblings().removeClass("active");
	    $(this).addClass("active");
	    switch($(this).html()) {
		    case "優":
		    	$('#SCORE').html(1);
		    	break;
		    case "中":
		    	$('#SCORE').html(2);
		    	break;
		    case "劣":
		    	$('#SCORE').html(3);
		    	break;
	    }
	    getData(1);
  });
		
  $('.progress').on("click",function() {
	  $(".score").each(function(){
			 $(this).show(); 
	  });
	  
	  categroyName = $(this).prev().html();
	  switch(categroyName) 
	  {
		  case "員工素質":
			  $('#CATEGROYID').html(1);
			  break;
		  case "餐點品質":
			  $('#CATEGROYID').html(2);
			  break;
		  case "清潔程度":
			  $('#CATEGROYID').html(3);
			  break;
		  case "舒適程度":
			  $('#CATEGROYID').html(4);
			  break;
		  case "住宿地點":
			  $('#CATEGROYID').html(5);
			  break;
		  case "設施":
			  $('#CATEGROYID').html(6);
			  break;
		  case "房間景觀":
			  $('#CATEGROYID').html(7);
			  break;
	  }
	  $('#SCORE').html(1);
	  getData(1);
  });

  
  $('.tag').on('click',function(){
	  $keyword =  $(this).html().substr(0,2);
	  $('#CATEGROYID').html(0);
	  $('#SCORE').html(0);
	  $(".score").each(function(){
			 $(this).hide(); 
	  });
	  getData(1,$keyword);
  });
  
  $('#btnSearch').on('click',function(){
	  $keyword = $('#txtSearch').val();
	  $('#CATEGROYID').html(0);
	  $('#SCORE').html(0);
	  $(".score").each(function(){
			 $(this).hide(); 
	  });
	  getData(1,$keyword);
  });
  
  getData(1);

  //$('[data-toggle="tooltip"]').tooltip(); 
});

function gotopage(npage) {
	 getData(npage);
}

function getData(npage,keyword = "%") {
	var jsobj = {UID:parseInt($('#UID').html()),
		         NPAGE:npage,
		         CategroyId:parseInt($('#CATEGROYID').html()),
		         Score:parseInt($('#SCORE').html()),
		         Keyword:keyword};
	$.ajax({
		  type:'post',
		  url:'commentdata.php',
		  data:{'formData':JSON.stringify(jsobj)},
		  datatype:'json',
		  success:function(data) {
			  var htmlstr ="";
			  jsondata = JSON.parse(data);
			  if (jsondata.length > 0) {
				  for(index in jsondata) {
					  htmlstr += '<div class="card mb-3 mb-4">' +
				              '<div class="card-header media position-relative">' +
				              '<div class="btn-group position-absolute" style="top:10px;right:10px;text-black-50;background-color:transparent">' +
				              '<button type="button" class="reset-Button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
				              '<i class="fas fa-ellipsis-v"></i></button>'+
				              '<div class="dropdown-menu">' +
				              '<a class="dropdown-item" href="#">Action</a>' +
				              '</div></div>' +
				              '<img src="' + jsondata[index].ComImg + '" class="mr-3 rounded-circle" style="width:64px">' +
				              '<div class="media-body">' +
				              '<h5 class="mt-0 d-inline-block float-left mr-2 mt-1">'+ jsondata[index].ComName +'</h5>' +
				              '<p class="text-black-50 d-inline-block mb-0" style="font-size:15px;margin-top:6px;">發表了一則評論　' + jsondata[index].ComPublish + '</p>' +
				              '<div class="clearfix"></div></div></div>' +
				              '<div class="card-body">' +
				              '<h5 class="card-title">' + jsondata[index].ComTitle + '</h5>' +
				              '<p class="card-text" >' + jsondata[index].ComText +
				              '</div></div>';
				  }
				  $('#TOTPAGE').html(jsondata[0].TOT_PAGE);
				  $('.card-wrap').html(htmlstr);
			  }
			  else {
				  $('#TOTPAGE').html(0);
				  $('.card-wrap').html("");		 
			  }
			  CreateNav(npage,parseInt($('#TOTPAGE').html()));
		  }
	  });
}

function CreateNav(nowpage,totpage) {
    var str = new Array();

    var firstpage = (Math.floor(nowpage / 5)) * 5;
    if (nowpage % 5 != 0) {
        firstpage++;
    }
    else {
        firstpage -= 4;
    }

    str.push('<ul class="pagination">');
    //上一頁
    if (nowpage == 1) {
        str.push('<li class="prev disabled"><a href="#"><span class="fa fa-angle-left"></span>&nbsp;上一頁</a></li >')
    } else {
        str.push('<li class="prev"><a href="#" onclick="gotopage(' + (parseInt(nowpage, 10) - 1) + ');"><span class="fa fa-angle-left"></span>&nbsp;上一頁</a></li >')
    }
    
    for (var i = firstpage; i <= firstpage + 4 && i <= totpage; i++) {
        if (nowpage == i) {
            str.push('<li class="active"><a href="#">' + i + '</a></li>')
        }
        else {
            str.push('<li><a href="#" onclick="gotopage('+ i +')">' + i + '</a></li>')
        }
    }
    
    //下一頁
    if (nowpage == totpage) {
        str.push('<li class="next disabled"><a href="#"> Next &nbsp;<span class="fa fa-angle-right"></span></a></li>');
    } else {
        str.push('<li class="next"><a href="#" onclick="gotopage(' + (parseInt(nowpage, 10) + 1) + ');"> 下一頁 &nbsp;<span class="fa fa-angle-right"></span></a></li>');
    }

    str.push("</ul>")

    $('#nav').html(str.join(""));
}$(document).ready(function() {
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
	   $.ajax({
		  type:'post',
		  url:'ajax.php',
		  datatype:'json',
		  success:function(data) {
			  console.log(JSON.stringify(data));
			  var t = JSON.parse(data);
			  var s = t[0].ComText;
			  $('#t1').html(s);
			  
		  }
	   });
  });
  
  
});
