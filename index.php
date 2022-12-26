<?php 
require("model/database.php");
require("model/baiviet.php");
require("model/binhluan.php");



$bv = new BAIVIET();
$bl = new BINHLUAN();

$baiviet = $bv->laybaiviet();

if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="macdinh"; 
}


switch($action){
    case "macdinh": 
        include("main.php");
        break;
    case "xemchitiet": 
        if(isset($_GET["mahang"])){
            $mahang = $_GET["mahang"];
            // tăng lượt xem lên 1
            $mh->tangluotxem($mahang);
            // lấy thông tin chi tiết mặt hàng
            $mhct = $mh->laymathangtheoid($mahang);
            // lấy các mặt hàng cùng danh mục
            $madm = $mhct["baiviet_id"];
            $mathang = $mh->laymathangtheobaiviet($madm);
            include("detail.php");
        }
        break;
	case "dangnhap":
		include("loginform.php");
		break;
	case "xldangnhap":
		$email = $_POST["txtemail"];
        $matkhau = $_POST["txtmatkhau"];
        if($kh->kiemtrakhachhanghople($email,$matkhau)==TRUE){
            $_SESSION["khachhang"] = $kh->laythongtinkhachhang($email);
            // đọc thông tin (đơn hàng) của kh
			include("info.php");
        }
        else{
            $tb = "Đăng nhập không thành công!";
            include("loginform.php");
        }
        break;
	case "xemthongtin":
		// đọc thông tin
		include("info.php"); // trang info.php hiển thị các đơn đã đặt
		break;
    case "likebaiviet":  
            $id = $_GET["id"];
                // tăng lượt like lên 1
                $bv->tangluotlike($id);
                include("main.php");
            break;
    case "binhluanbaiviet":  
            $id = $_GET["id"];
                // tăng lượt like lên 1
                $bv->tangluotbinhluan($id);
                include("main.php");
            break;
    case "chiasebaiviet":  
            $id = $_GET["id"];
                // tăng lượt like lên 1
                $bv->tangluotchiase($id);
                include("main.php");
            break;
	case "dangxuat":
		unset($_SESSION["khachhang"]);
		// chuyển về trang chủ
		// xử lý phân trang
        $tongmh = $mh->demtongsomathang();   // tổng số mặt hàng
        $soluong = 4;                           // số lượng mh hiển thị trên trang 
        $tongsotrang = ceil($tongmh/$soluong);  // tổng số trang
        if(!isset($_REQUEST["trang"]))          // trang hiện hành: mặc định là trang đầu
            $tranghh = 1;   
        else                                    // hoặc hiển thị trang do người dùng chọn
            $tranghh = $_REQUEST["trang"];
        if($tranghh > $tongsotrang)
            $tranghh = $tongsotrang;
        else if($tranghh < 1)
            $tranghh = 1;
        $batdau = ($tranghh-1)*$soluong;          // mặt hàng bắt đầu sẽ lấy
        $mathang = $mh->laymathangphantrang($batdau, $soluong);
        include("main.php");
		break;
    default:
        break;
}
?>
