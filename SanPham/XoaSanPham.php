<?php
$ma = $_GET['ma'];
if (isset($_GET['ma'])) {
    $ma = $_GET['ma'];
//    $json_url = "http://hinhnen.somee.com/api/SanPham/getMotSP/$ma";
//    $content_maloai = file_get_contents($json_url);
//    $json_maloai = json_decode($content_maloai, true);
    $dulieu = array(
        "maSP" => $ma
    );
    $data_string = json_encode($dulieu);
    $curl = curl_init('http://hinhnen.somee.com/api/SanPham/xoaSP/');
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
    );
    $result = curl_exec($curl);
    curl_close($curl);
    echo '<script>alert("Xóa thành công")</script>';
    echo "<script>window.location.href='" . "home.php?page=2" . "'</script>";
}
?>