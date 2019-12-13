<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"/>
<link type="text/css" rel="stylesheet" href="css/comment.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.8.0/pikaday.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"></script>
<script type="text/javascript" src="js/comment.js"></script>
</head>
<body>
	<div class="wrap">
	  <div class="main-image"></div>
	  <div class="content">
	    <div class="content-wrap pt-0 px-3 mb-2">
	      <div class="row">
			<?php 
			  include_once ('all.php');
    	      $sql = "SELECT * FROM fn_getAnalysisScore(".$_REQUEST['UID'].")";
    	      $rows = fetchDBData($sql);

	          $i = 0;
	          $bgcolor = ['','bg-success','bg-info','bg-warning','bg-danger','bg-success',''];
	          $totalScore = 0;
	          foreach ($rows as $row) {
	              if ($i % 2 == 0) {
	                  echo '<div class="col-md-3 pt-0 px-4 pb-3">';
	              }
	              $counts = $row['avgScore'] == 0 ? 0 : $row['counts']; 
	              echo '<div class="m-2 item-title">' . $row['categroyName'] .'</div>'.
    	              '<div class="progress mb-2 cursor-pointer">'.
    	              '<div id="pro'. $i . '" class="progress-bar progress-bar-striped ' . $bgcolor[$i] .'" role="progressbar" '.
    	              'style="width:'. $row['avgScore'] .'%;" aria-valuenow="'.$row['avgScore'].
    	              '" aria-valuemin="0" aria-valuemax="100">' . $row['avgScore'] . '分 / ' . $counts . '則</div>'.
    	              '</div>';
	              
	              if ($i % 2 == 1) {
	                  echo '</div>';
	              }
	              $totalScore += $row['avgScore'];
	              $i++;      
             }
             echo    '<div class="m-2 item-title">綜合評價</div>'.
    	             '<div class="star-area">';
             for($j=0; $j < 10 ; $j++) {
                 if ($j < floor($totalScore / 70))
                     echo '<span class="fa fa-star checked"></span>';
                 else 
                     echo '<span class="fa fa-star"></span>';
             }
             echo    '</div>'. '</div>';
    	      
	      
	      ?>
		  </div>
	    </div>
	    <div class="content-wrap pt-0 px-3 mb-4">
	      <div class="row">
	        <div class="col-md-6">
	          <a href=""><span class="tag badge badge-secondary m-2 p-2">浴室<i class="ml-2 fas fa-plus-square"></i></span></a>
	          <a href=""><span class="tag badge badge-success m-2 p-2">熱水<i class="ml-2 fas fa-plus-square"></i></span></a>
	          <a href=""><span class="tag badge badge-info m-2 p-2">兒童<i class="ml-2 fas fa-plus-square"></i></span></a>
	          <a href=""><span class="tag badge badge-danger m-2 p-2">捷運<i class="ml-2 fas fa-plus-square"></i></span></a>
	        </div>
	        <div class="col-md-4 form-inline my-2 my-lg-0">
	          <button type="button" class="btn btn-primary ml-auto">優</button>
			  <button type="button" class="btn btn-secondary ml-2">中</button>
			  <button type="button" class="btn btn-success ml-2">劣</button>
	          <input class="form-control mr-sm-2 ml-auto" type="search" placeholder="Search" aria-label="Search">
	          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	        </div>
	        <div class="col-md-2 form-inline my-2 my-lg-0">
	          <ol class="breadcrumb mb-0 py-2 ml-auto">
	            <li class="breadcrumb-item"><a href="#">Home</a></li>
	            <li class="breadcrumb-item active" aria-current="page">Library</li>
	          </ol>
	        </div>
	      </div>
	    </div>
	    <div class="card-wrap">
	      <div class="card mb-3 mb-4">
	        <div class="card-header media position-relative">
	          <div class="btn-group position-absolute" style="top:10px;right:10px;text-black-50;background-color:transparent">
	            <button type="button" class="reset-Button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    <i class="fas fa-ellipsis-v"></i>
	  </button>
	            <div class="dropdown-menu">
	              <a class="dropdown-item" href="#">Action</a>
	              <a class="dropdown-item" href="#">Another action</a>
	              <a class="dropdown-item" href="#">Something else here</a>
	              <div class="dropdown-divider"></div>
	              <a class="dropdown-item" href="#">Separated link</a>
	            </div>
	          </div>
	          <img src="https://truth.bahamut.com.tw/s01/201912/9b4717bc135c34727d4951c2db9133cb.JPG" class="mr-3 rounded-circle" style="width:64px">
	          <div class="media-body">
	            <h5 class="mt-0 d-inline-block float-left mr-2 mt-1">Jia Huei</h5>
	            <p class="text-black-50 d-inline-block mb-0" style="font-size:15px;margin-top:6px;">發表了一則評論　2019/12/12 09:25 am</p>
	            <div class="clearfix"></div>
	            <p class="text-black-50 d-inline-block float-left mb-0 mr-2">12篇投稿</p>
	            <p class="text-black-50 d-inline-block float-left mb-0 mr-2">•</p>
	            <p class="text-black-50 d-inline-block float-left mb-0">2人推薦</p>
	          </div>
	        </div>
	        <div class="card-body">
	          <h5 class="card-title">Special title treatment</h5>
	          <p class="card-text" id="t1">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu,
	            pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.
	            Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut
	            metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.</p>
	        </div>
	        <div class="card-footer text-muted">
	          <a href="">
	            <!--  <p class="d-inline-block mb-0 mr-4"><i class="fas fa-thumbs-up mr-2"></i>推薦</p>-->
	          </a>
	          <a href="">
	            <!--<p class="d-inline-block mb-0"><i class="fas fa-share mr-2"></i>分享</p>-->
	          </a>
	        </div>
	      </div>
	      
	      
	      
	    </div>
	  </div>
	</div>
</body>
</html>