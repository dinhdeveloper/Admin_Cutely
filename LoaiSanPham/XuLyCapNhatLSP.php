<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $maloai = $_POST['maloai'];
    $tenloai = $_POST['tenloai'];
    if (isset($_FILES["hinhlsp"]) && $_FILES["hinhlsp"]["error"] == 0) {
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["hinhlsp"]["name"];
        $filetype = $_FILES["hinhlsp"]["type"];
        $filesize = $_FILES["hinhlsp"]["size"];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) die("Lỗi : Vui lòng chọn đúng định dang file.");
        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize) die("Lỗi : Kích thước file lớn hơn giới hạn cho phép");
        if (in_array($filetype, $allowed)) {
            if (file_exists("../Hinh/" . $_FILES["hinhlsp"]["name"])) {
                echo $_FILES["hinhlsp"]["name"] . " đã tồn tại";
            } else { // Hàm move_uploaded_file sẽ tiến hành upload file lên thư mục upload
                move_uploaded_file($_FILES["hinhlsp"]["tmp_name"], "../Hinh/" . $_FILES["hinhlsp"]["name"]); // Thông báo thành công
                $path = "../Hinh/$filename";
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                //$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                $base64 = base64_encode($data);
                $dulieu = array(
                    "maLSP" => $maloai,
                    "tenLSP" => $tenloai,
                    "hinhSLP" => $base64
                );
                $data_string = json_encode($dulieu);
                $curl = curl_init('http://hinhnen.somee.com/api/LoaiSanPham/sualoaisanpham');
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($data_string))
                );
                $result = curl_exec($curl);
                curl_close($curl);
                echo '<script>alert("Cập nhật thành công")</script>';
                echo "<script>window.location.href='" . "../home.php?page=4" . "'</script>";
            }
        } else {
            echo "Lỗi : Có vấn đề xảy ra khi upload file";
        }
    } else {
        //            $json_url = "http://hinhnen.somee.com/api/LoaiSanPham/getOneLSP/$ma";
//            $content = file_get_contents($json_url);
//            $json = json_decode($content, true);
        $dulieu = array(
            "maLSP" => $maloai,
            "tenLSP" => $tenloai
        );
        $data_string = json_encode($dulieu);
        $curl = curl_init('http://hinhnen.somee.com/api/LoaiSanPham/sualoaisanpham');
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
        );
        $result = curl_exec($curl);
        curl_close($curl);
        echo '<script>alert("Cập nhật thành công")</script>';
        echo "<script>window.location.href='" . "../home.php?page=4" . "'</script>";
    }
}

?>