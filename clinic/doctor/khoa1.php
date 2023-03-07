

<option value="">Chọn chuyên khoa</option>
<?php
   include("../class/clsbenhnhan.php");
   $p = new benhnhan();
    $sql = "SELECT * FROM khoa WHERE id_chinhanh = ".$_POST['noilamviecid']."";
    $ketqua = mysqli_query($p->connect(),$sql);
    $i=mysqli_num_rows($ketqua);
    if($i>0)
    {
        while( $row = mysqli_fetch_array($ketqua))
        {
            echo '<option value="'.$row['id_khoa'].'">'.$row['tenkhoa'].'</option>';
        }
    }
?>