<?php
$json_url = "http://hinhnen.somee.com/api/LoaiSanPham/getAllLSP";
$content = file_get_contents($json_url);
$json = json_decode($content, true);
?>
<div class="row mt">
    <div class="col-lg-12">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i>Tạo Sản Phẩm</h4>
            <form class="form-horizontal style-form" method="post" enctype="multipart/form-data" action="SanPham/UploadSP.php">
                <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label">Loại Sản Phẩm</label>
                    <div class="col-lg-10">
                        <select class="form-control" id="malsp" name="maloaisanpham">
                            <?php
                            foreach ($json as $i) {
                                ?>
                                <option value="<?php echo $i['maLSP'];?>"><?php echo $i['tenLSP'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Tên Sản Phẩm</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tensanpham">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Hình Sản Phẩm</label>
                    <div class="col-sm-10">
                        <input type="file" name="hinhsanpham">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                        <button type="submit" name="taosp" class="btn btn-success">Tạo</button>
                    </div>
                </div>

            </form>
        </div>
    </div><!-- col-lg-12-->
</div><!-- /row -->