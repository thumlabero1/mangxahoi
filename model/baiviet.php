<?php
class BAIVIET{
    // khai báo các thuộc tính - SV tự bổ sung
    
    // Đếm tổng số mặt hàng
    public function dembaiviet(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT COUNT(*) FROM baiviet";
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
    public function laybaiviet(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM baiviet";
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
    public function laybaiviettheoid($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM baiviet WHERE id=:id" ;
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
    public function laybaiviettheoemail($email){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM baiviet WHERE email=:email";
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
    public function thembaiviet($tieude,$ngaydang,$noidung,$hinhanh,$email){
        $dbcon = DATABASE::connect();
        try{
            $sql = "INSERT INTO mathang(tieude,ngaydang,noidung,hinhanh,email) 
				VALUES(:tieude,:ngaydang,:noidung,:hinhanh,:email)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tieude", $tenmatieudethang);
			$cmd->bindValue(":ngaydang", $ngaydang);
			$cmd->bindValue(":noidung", $noidung);
			$cmd->bindValue(":giaban", $giaban);
			$cmd->bindValue(":hinhanh", $hinhanh);
			$cmd->bindValue(":email", $email);
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
    public function tangluotlike($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE baiviet SET luotlike=luotlike+1 WHERE id=:id";
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
    public function tangluotbinhluan($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE baiviet SET luotbinhluan=luotbinhluan+1 WHERE id=:id";
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
    public function tangluotchiase($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE baiviet SET luotchiase=luotchiase+1 WHERE id=:id";
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


}
?>
