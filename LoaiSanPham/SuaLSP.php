<?php
$ma = 0;
if (isset($_GET['ma'])) {
    $ma = $_GET['ma'];
}
$json_url = "http://hinhnen.somee.com/api/LoaiSanPham/getOneLSP/$ma";
$content = file_get_contents($json_url);
$json = json_decode($content, true);
?>
<div class="row mt">
    <div class="col-lg-12">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i>Cập Nhật Loại Sản Phẩm</h4>
            <form class="form-horizontal style-form" method="post" enctype="multipart/form-data" action="LoaiSanPham/XuLyCapNhatLSP.php">
                <?php
                foreach ($json as $row) {
                    ?>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Tên Loại Sản Phẩm</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" name="maloai" value="<?php echo $row['maLSP']?>">
                            <input type="text" class="form-control" name="tenloai" value="<?php echo $row['tenLSP']?>">
                        </div>
                    </div>
                    <?php
                }
                ?>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Hình Lọai Sản Phẩm</label>
                    <div class="col-sm-10">
                        <input type="file" name="hinhlsp">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-success">Cập Nhật</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>