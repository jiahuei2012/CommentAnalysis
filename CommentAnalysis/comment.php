<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Travelute</title>
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
    	              'data-toggle="tooltip" title="點選後篩選條件[' . $row['categroyName'] . ']" style="width:'. $row['avgScore'] .'%;" aria-valuenow="'.$row['avgScore'].
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
	    <div id="UID" style="display: none;"><?php echo $_REQUEST['UID'] ?> </div>
	    <div id="TOTPAGE" style="display: none;"></div>
	    <div id="CATEGROYID" style="display: none;">0</div>
	    <div id="SCORE" style="display: none;">0</div>
	    <div class="content-wrap pt-0 px-3 mb-4">
	      <div class="row">
	        <div class="col-md-6">
	          <a href="#"><span class="tag badge badge-secondary m-2 p-2">浴室<i class="ml-2 fas fa-plus-square"></i></span></a>
	          <a href="#"><span class="tag badge badge-success m-2 p-2">熱水<i class="ml-2 fas fa-plus-square"></i></span></a>
	          <a href="#"><span class="tag badge badge-info m-2 p-2">兒童<i class="ml-2 fas fa-plus-square"></i></span></a>
	          <a href="#"><span class="tag badge badge-danger m-2 p-2">捷運<i class="ml-2 fas fa-plus-square"></i></span></a>
	        </div>
	        <div class="col-md-6 form-inline my-lg-0"">
	          <button type="button" class="score btn btn-outline-primary ml-auto active">優</button>
			  <button type="button" class="score btn btn-outline-secondary ml-2">中</button>
			  <button type="button" class="score btn btn-outline-success ml-2">劣</button>
	          <input id="txtSearch" class="form-control mr-sm-2 ml-4" type="search" placeholder="Search" aria-label="Search">
	          <button id="btnSearch" class="btn btn-outline-success my-2 my-sm-0" type="button">Search</button>
	          <ol class="breadcrumb mb-0 py-2 ml-4">
                  <li class="breadcrumb-item"><a href="#">首頁</a></li>
                  <li class="breadcrumb-item active" aria-current="page">評論頁</li>
              </ol>
	        </div>
  
	      </div>
	    </div>
	    <div class="card-wrap">

	    </div>
	    <div id="nav"></div>
	  </div>
	</div>
</body>
</html>