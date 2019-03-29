<?php
$id = 0;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$json_url = "http://hinhnen.somee.com/api/SanPham/getDanhMucSP/$id";
$content = file_get_contents($json_url);
$json = json_decode($content, true);
?>
<div class="content-panel">
    <h4 style="font-weight:bold;color:#2843ff"><i class="fa fa-angle-right"></i>Danh Mục Sản Phẩm
        <a href="home.php?page=4">
            <button class="btn btn-success" style="float: right;margin-right: 20px"><i class="fa fa-arrow-left"></i></button>
        </a>
    </h4>
    <hr>
    <table class="table table-striped table-advance table-hover">
        <thead>
        <tr>
            <th style="font-weight:bold;color:#ff3522">Mã Sản Phẩm</th>
            <th style="font-weight:bold;color:#ff3522">Mã LSP</th>
            <th style="font-weight:bold;color:#ff3522">Tên Sản Phẩm</th>
            <th style="font-weight:bold;color:#ff3522"> Ảnh</th>
            <th style="font-weight:bold;color:#ff3522">Yêu Thích</th>
            <th style="font-weight:bold;color:#ff3522">Trạng Thái</th>
        </tr>
        </thead>
        <tbody id="myTable">
        <tr>
            <?php
            foreach ($json

            as $i){
            ?>
        <tr>
            <th scope="row" style="padding-left: 40px"><?php echo $i['maSP'] ?></th>
            <td><a href="../home.php?page=4"><?php echo $i['maLSP'] ?></a></td>
            <td><?php echo $i['TenSP'] ?></td>
            <td><img src="http://hinhnen.somee.com/<?php echo $i['HinhSP'] ?>" width="70px" height="70px"></td>
            <td><?php echo $i['YeuThich'] ?></td>
            <td>
                <a href="home.php?page=20">
                    <button class="btn btn-primary btn-xs" type="submit"><i class="fa fa-pencil"></i></button>
                </a>
                <a href="home.php?page=21">
                    <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o "></i></button>
                </a>
            </td>
        </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
</div>