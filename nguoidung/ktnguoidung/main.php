<?php include("../view/top.php"); ?>
<div>
<div class="container">
        
		<div class="row">			
			<div class="col-md-10">
				<?php
    foreach($baiviet as $bv):
    ?>

	

	<div class="card" style="width: 80%; padding: 10px;">
  
  <h5><img src="../../images/<?php echo $bv["anhdaidien"]; ?>" class="card-img-top" alt="..."><?php echo $bv["ten"]; ?>
    <h6 class="card-text">Ngày đăng: <?php echo $bv["ngaydang"]; ?></h6>
</h5>
  <div class="card-body">
    <h5 class="card-title">Tin <?php echo $bv["tieude"]; ?></h5>
    <img class="img-fluid" src="../../images/<?php echo $bv["hinhanh"]; ?>" alt="">
    <p class="card-text"><?php echo $bv["noidung"]; ?></p>
    
    <button class="col-md-3 button"  href="?action=likebaiviet&id=<?php echo $bv["id"];?>"><i class="fa fa-heart"></i><?php echo $bv["luotlike"]; ?></button>
	  <button class="col-md-4 button" type="button" data-toggle="collapse" data-target="#collapsebinhluan" aria-expanded="false" aria-controls="collapsebinhluan" href="?action=binhluanbaiviet&id=<?php echo $bv["id"];?>"><i class="fa fa-comment"></i> <?php echo $bv["luotbinhluan"]; ?></button>

<div class="collapse" id="collapsebinhluan">
  <div class="card card-body">
    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
  </div>
</div>
  
  <button class="col-md-3 button" id="show"><i class="fa fa-share"></i><?php echo $bv["luotchiase"]; ?></button>
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
<br>
<br>
<br>
    <?php endforeach; ?>
			</div>
            <div class="thongtinnguoidung col-md-2 bg-light p-3">
				<p>Thông tin người dùng</p>
                <p><?php if(isset($_SESSION["nguoidung"])) echo $_SESSION["nguoidung"]["hoten"]; ?></p>
			</div>
            <script type="text/JavaScript">
      (function() { var dialog = document.getElementById('DialogChiase');
		 document.getElementById('show').onclick = function() { dialog.show();
		 };
		  document.getElementById('hide').onclick = function() { dialog.close();
		 };
		 })();
    </script>

</div>
<?php include("../view/bottom.php"); ?>
