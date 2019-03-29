<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $maloai = $_POST['maloaisanpham'];
    $tensp = $_POST['tensanpham'];
    if (isset($_FILES["hinhsanpham"]) && $_FILES["hinhsanpham"]["error"] == 0) {
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["hinhsanpham"]["name"];
        $filetype = $_FILES["hinhsanpham"]["type"];
        $filesize = $_FILES["hinhsanpham"]["size"];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) die("Lỗi : Vui lòng chọn đúng định dang file.");
        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize) die("Lỗi : Kích thước file lớn hơn giới hạn cho phép");
        if (in_array($filetype, $allowed)) {
            if (file_exists("Hinh/" . $_FILES["hinhsanpham"]["name"])) {
                echo $_FILES["hinhsanpham"]["name"] . " đã tồn tại";
            } else { // Hàm move_uploaded_file sẽ tiến hành upload file lên thư mục upload
                move_uploaded_file($_FILES["hinhsanpham"]["tmp_name"], "../Hinh/" . $_FILES["hinhsanpham"]["name"]); // Thông báo thành công
                $path = "../Hinh/$filename";
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                //$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                $base64 = base64_encode($data);
                $json_url = "http://hinhnen.somee.com/api/LoaiSanPham/getOneLSP/$maloai";
                $content_maloai = file_get_contents($json_url);
                $json_maloai = json_decode($content_maloai, true);
                $dulieu = array(
                    "maLSP"=>$maloai,
                    "TenSP"=> $tensp,
                    "HinhSP"=> $base64,
                    "YeuThich"=> 0
                );
                $data_string = json_encode($dulieu);
                $curl = curl_init('http://hinhnen.somee.com/api/SanPham/themsanpham');
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($data_string))
                );
                $result = curl_exec($curl);
                curl_close($curl);
                echo '<script>alert("Tạo SP thành công")</script>';
                echo "<script>window.location.href='" . "../home.php?page=3" . "'</script>";
            }
        } else {
            echo "Lỗi : Có vấn đề xảy ra khi upload file";
        }
    } else {
        echo "Lỗi: " . $_FILES["photo"]["error"];
    }
}

?>