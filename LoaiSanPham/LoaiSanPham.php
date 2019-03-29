<?php
$json_url = "http://hinhnen.somee.com/api/LoaiSanPham/getAllLSP";
$content = file_get_contents($json_url);
$json = json_decode($content, true);
?>
<div class="content-panel">
    <h4 style="font-weight:bold;color:#2843ff"><i class="fa fa-angle-right"></i>Danh Sách Loại Sản Phẩm
        <a href="home.php?page=5">
            <button class="btn btn-success" style="float: right;margin-right: 20px"><i class="fa fa-plus"></i></button>
        </a>
    </h4>
    <hr>
    <table class="table table-striped table-advance table-hover">
        <thead>
        <tr>
            <th style="font-weight:bold;color:#ff3522">Mã LSP</th>
            <th style="font-weight:bold;color:#ff3522">Tên LSP</th>
            <th style="font-weight:bold;color:#ff3522"> Ảnh</th>
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
            <th scope="row" style="padding-left: 40px"><?php echo $i['maLSP'] ?></th>
            <td><a href="home.php?page=24&id=<?php echo $i['maLSP'] ?>"><?php echo $i['tenLSP'] ?></a></td>
            <td><img src="http://hinhnen.somee.com/<?php echo $i['hinhSLP'] ?>" width="50px" height="50px"></td>
            <td>
                <a href="home.php?page=22&ma=<?php echo $i['maLSP'] ?>">
                    <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                </a>
                <a href="home.php?page=23">
                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                </a>
            </td>
        </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
</div>