<?php
    require_once ('db/dbconf.php');

    if (isset($_FILES['photo'])) {
        if (isset($_FILES['photo'])) {
            $uploadDir = "db/profilePic/";
            $fileTmpName = $_FILES['photo']['tmp_name'];
            $fileExtension = pathinfo($_FILES['photo']['name'])['extension'];
            $fileName = time().".$fileExtension";
            $target = $uploadDir.$fileName;
            $fileSize = filesize($fileTmpName);
            
            //if file is bigger than 5M, reject the file
            if ($fileSize <= 5242880) {
                if (in_array($fileExtension, ['jpg', 'png'])) {
                    if(move_uploaded_file($fileTmpName, $target)) {
                        $profilePic = $target;
                    }
                    else {
                        echo "File is fail to upload!";
                    }
                }
                else {
                    echo "Only pdf/jpg/png are allowed";
                }
            }
            else {
                echo "File is bigger thant 5M - file size is ".number_format($fileSize/1024/1024, 2)."MB";
            }
        }

        //Remove old file
        $id = $_POST['id'];

        $sql1 = "SELECT * FROM account WHERE id = $id";
        $result = $db->query($sql1);
        while ($row = $result->fetch_object()){
            if ($row->profilePic != null) {
                //Remove old profile photo
                unlink($row->profilePic);
            }
        }

        $sql2 = "UPDATE account set profilePic='$profilePic' where id=$id";
        $result = $db->query($sql2);
        if($result){
            header('location: index.php');
        }
    }