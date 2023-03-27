<?php
    function uploadimage()
    {
        //B1: tạo ra đường dẫn chứa hình
        $target_dir="Content/imagetourdien/";
        //b2: lấy tên hình về
        // Content/imagetourdien/giaycongso.jpg
        $target_file=$target_dir.basename($_FILES['image']['name']);
        //b3:lấy phần mở rộng và chuyển về cùng 1 định dạng hoa hoặc thường
        $targetFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        //b4: kiểm tra xem hình đó có thật sự upload lên server hay chưa, getimagesize
        $uploadhinh=1;
        if(isset($_POST['submit']))
        {
            $check=getimagesize($_FILES['image']['tmp_name']);
            if($check!==false)
            {
                $uploadhinh=1;
            }
            else
            {
                $uploadhinh=0;
                echo '<script> alert("hình ko tồn tại")</script>';
            }
        }
        // kiểm tra nếu hình có trong thư mục rồi thì ko đc up
        if(file_exists($target_file))
        {
            $uploadhinh=0;
            echo '<script> alert("hình đã tồn tại")</script>';
        }
        // kiểm tra dung lượng file, size > 500kb
        if($_FILES['image']['size']>500000)
        {
            $uploadhinh=0;
            echo '<script> alert("hình vượt quá dung lượng")</script>';
        }
        // kiểm tra có phải là hình hay không
        if($targetFileType!="jpg" && $targetFileType!=="jepg" && $targetFileType!=="png" && $targetFileType!=="gif")
        {
            $uploadhinh=0;
            echo '<script> alert("ko phải là hình")</script>';
        }
        // b5: upload
        if($uploadhinh==1)
        {
            if(move_uploaded_file($_FILES['image']['tmp_name'],$target_file))
            {
                echo '<script> alert("upload hình thành công")</script>';
            }
            else
            {
                echo '<script> alert("upload hình ko thành công")</script>';
            }
        }

    }
?>