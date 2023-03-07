<?php
class doctor
{
    function connect()
    {
        $con = mysqli_connect("localhost","root","","doan2");
        if(!$con)
        {
            echo'Không kết nối cơ sở liệu!';
            exit();
        }
        else
        {
           mysqli_set_charset($con,"utf8");
           return $con;
        }
    }
    function loadlichkham($sql)
    {
        $link = $this->connect();
        $ketqua = mysqli_query($link,$sql);
        @mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
        if($i>0)
        {
            echo'  <table class="table table-bordered">
                <tr style="text-align: center;font-weight: bold">
                <th >STT</th>
                <th scope="col">BỆNH NHÂN</th>
                <th>TRIỆU CHỨNG</th>
                <th>NGÀY HẸN KHÁM</th>
                <th>GIỜ KHÁM</th>
                </tr>
            ';
            $dem = 1;
            while($row = mysqli_fetch_array($ketqua))
            {
                $id_phieudkkham = $row['id_phieudkkham'];
                session_start();
                $id_benhnhan = $_SESSION['tenbenhnhan'];
                echo 
                $trieuchung = $row['trieuchung'];
                $ngayhen = $row['ngayhen'];
                $giohen = $row['giohen'];
                ' 
           
                    <tr>
                        <td style="text-align: center;">'.$dem.'</td>
                        <td>'.$id_benhnhan.'</td>
                        <td>'.$trieuchung.'</td>
                        <td>'.$ngayhen.'</td>
                        <td>'.$giohen.'</td>
                ';
                $dem++;
            }
            echo'</table>';
        }
    }
    function laycot($sql)
    {
        $link = $this->connect();
        $ketqua = mysqli_query($link,$sql);
        mysqli_close($link);
        $i=mysqli_num_rows($ketqua);
        $giatri ='';
        if($i>0)
        {
            while($row = mysqli_fetch_array($ketqua))
            {
                $id = $row['0'];
                $giatri = $id;
            }
        }
        return $giatri;
    }

    function loaddsbndki($sql)
    {
        $link = $this->connect();
        $ketqua = mysqli_query($link,$sql);
        @mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
        if($i>0)
        {
            echo'  <table class="table table-bordered">
                <tr style="text-align: center;font-weight: bold">
                    <th>STT</th>
                    <th scope="col">BỆNH NHÂN</th>
                    <th>TRIỆU CHỨNG</th>
                    <th>NGÀY HẸN KHÁM</th>
                    <th>BÁC SĨ</th>
                </tr>
            ';
            $dem = 1;
            while($row = mysqli_fetch_array($ketqua))
            {
                $id_phieudkkham = $row['id_phieudkkham'];
                session_start();
                $id_benhnhan = $_SESSION['tenbenhnhan'];
                echo 
                $trieuchung = $row['trieuchung'];
                $ngayhen = $row['ngayhen'];
                session_start();
                $id_bacsi = $_SESSION['tenbacsi'];
                echo 
                ' 
           
                    <tr>
                        <td style="text-align: center;">'.$dem.'</td>
                        <td>'.$id_benhnhan.'</td>
                        <td>'.$trieuchung.'</td>
                        <td>'.$ngayhen.'</td>
                        <td>'.$id_bacsi.'</td>
                ';
                $dem++;
            }
            echo'</table>';
        }
    }
    function themxoasua($sql)
    {
        $link = $this->connect();
        if(mysqli_query($link,$sql))
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public function myupfile($name,$tmp_name,$folder)
	{
		if($name!=' '&& $tmp_name!=' ' && $folder!=' ')
		{
			$newname=$folder."/".$name;
			if(move_uploaded_file($tmp_name,$newname))
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
		else
		{
			return 0;
		}
	}
    function showlichnghi($sql)
    {
        $link = $this->connect();
        $ketqua = mysqli_query($link,$sql);
        $i = mysqli_num_rows($ketqua);
        if($i>0)
        {
            echo'<table class="table table-bordered" style="height:50px" >
            <tr style="background-color: blue; color: white;">
              <td align="center" >STT</td>
              <td align="center">Thời gian nghỉ</td>
            </tr>';
          $dem = 1;
            while($row = mysqli_fetch_array($ketqua))
            {
                $ngaynghi = $row['ngaynghi'];
                echo'
                    <tr>
                        <td align="center" >'.$dem.'</td>
                        <td align="center">'.$ngaynghi.'</td>
                    </tr>
                    ';
                    $dem++;
            }
            echo'</table>';
        }
    }
}

?>