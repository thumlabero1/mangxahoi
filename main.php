

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="public/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="public/js/main.js"></script>
    <title>homepage</title>
</head>
<body>

    <header>
        <nav class="navbar navbar-expand-sm bg-info navbar-light">
		  <div class="container">
			<ul class="navbar-nav">			  
			 <li class="nav-item">
				<a class=" btn btn-success" href="nguoidung">Đăng nhập</a>
			  </li>
			  <li class="nav-item">
				<a class="btn btn-warning" href="#">Đăng ký</a>
			  </li>			  
			</ul>
		  </div>
		</nav>
    </header>
	
    <div class="container">
	<br>        
		<div class="row">			
			<div class="col-md-9">
				<?php
    foreach($baiviet as $bv):
    ?>

	

	<div class="card" style="width: 80%;">
  
  <h5><img src="images/<?php echo $bv["anhdaidien"]; ?>" class="card-img-top" alt="..."><?php echo $bv["ten"]; ?>
    <h6 class="card-text">Ngày đăng: <?php echo $bv["ngaydang"]; ?></h6>
</h5>
<img class="img-fluid" src="images/<?php echo $bv["hinhanh"]; ?>" alt="">
  <div class="card-body">
    <h5 class="card-title">Tin <?php echo $bv["tieude"]; ?></h5>
    <p class="card-text"><?php echo $bv["noidung"]; ?></p>
    <a href="?action=likebaiviet&id=<?php echo $bv["id"];?>"><i class="fa fa-heart"></i><?php echo $bv["luotlike"]; ?></a>
	<a href="?action=binhluanbaiviet&id=<?php echo $bv["id"];?>"><i class="fa fa-comment"></i> <?php echo $bv["luotbinhluan"]; ?></a>
	<button id="show"><i class="fa fa-share"></i><?php echo $bv["luotchiase"]; ?></button>
	<div>
      <dialog id="DialogChiase">
        <p>
          Chia sẻ bài viết này
        </p>
        <a class="btn btn-primary" href="?action=chiasebaiviet&id=<?php echo $bv["id"];?>">Chia sẻ ngay</a>
      </dialog>
    </div>
  </div>
  
</div>

    <?php endforeach; ?>
			</div>
			<div class="col-md-3 bg-primary p-3">
				<h3 class="banchuadangnhap" >Bạn chưa đăng nhập</h3>
			</div>
					
		</div>
		<br>
    </div>
	<script type="text/JavaScript">
      (function() { var dialog = document.getElementById('DialogChiase');
		 document.getElementById('show').onclick = function() { dialog.show();
		 };
		  document.getElementById('hide').onclick = function() { dialog.close();
		 };
		 })();
    </script>
</body>
</html>
