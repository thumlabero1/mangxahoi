<?php
class BINHLUAN{
    // khai báo các thuộc tính - SV tự bổ sung
    
    // Đếm tổng số mặt hàng
    public function dembinhluan(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT COUNT(*) FROM binhluan";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $ketqua = $cmd->fetchColumn();
            return $ketqua;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            include("view/error.php");
            exit();
        }
    }
    // Lấy mặt hàng nổi bật
    public function laymathangnoibat(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT m.*, d.tendanhmuc FROM mathang m, danhmuc d WHERE d.id=m.danhmuc_id ORDER BY luotxem DESC LIMIT 0, 4";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $ketqua = $cmd->fetchAll();
            return $ketqua;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Lấy một số $n mặt hàng bắt đầu từ $m - dùng cho phân trang
    public function laymathangphantrang($m, $n){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT m.*, d.tendanhmuc FROM mathang m, danhmuc d WHERE d.id=m.danhmuc_id ORDER BY m.id DESC LIMIT $m, $n";
            $cmd = $dbcon->prepare($sql);               
            $cmd->execute();
            $ketqua = $cmd->fetchAll();
            return $ketqua;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }


    // Lấy danh sách
    public function laybinhluan(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM binhluan";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            rsort($result); // sắp xếp giảm thay cho order by desc
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
	    // Lấy danh sách mặt hàng thuộc 1 danh mục
    public function laybinhluantheoid($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM binhluan WHERE id=:id" ;
            $cmd = $dbcon->prepare($sql);
			$cmd->bindValue(":id",$id);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Lấy mặt hàng theo id
    public function laybinhluantheoemail($email){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM binhluan WHERE email=:email";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":email", $email);
            $cmd->execute();
            $result = $cmd->fetch();             
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật lượt xem
    public function tangluotxem($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE mathang SET luotxem=luotxem+1 WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
	
	// Cập nhật số lượng tồn
    public function capnhatsoluong($id, $soluong){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE mathang SET soluongton=soluongton - :soluong WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":soluong", $soluong);
			$cmd->bindValue(":id", $id);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
	// Thêm mới
    public function thembinhluan($email,$ngaydang,$noidung){
        $dbcon = DATABASE::connect();
        try{
            $sql = "INSERT INTO binhluan(email,ngaydang,noidung) 
				VALUES(:email,:ngaydang,:noidung) WHERE baivietid=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":email", $email);
			$cmd->bindValue(":ngaydang", $ngaydang);
			$cmd->bindValue(":noidung", $noidung);
			$cmd->bindValue(":baivietid", $baivietid);

            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Xóa 
    public function xoabaiviet($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "DELETE FROM baiviet WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Cập nhật 
    public function suabaiviet($id, $tieude,$ngaydang,$noidung,$hinhanh,$email){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE baiviet SET tieude=:tieude,
										ngaydang=:ngaydang,
										noidung=:noidung,
										hinhanh=:hinhanh,
										email=:email,
										WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tieude", $tieude);
			$cmd->bindValue(":ngaydang", $ngaydang);
			$cmd->bindValue(":noidung", $noidung);
			$cmd->bindValue(":hinhanh", $hinhanh);
			$cmd->bindValue(":email", $email);
            $cmd->bindValue(":id", $id);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

}
?>
