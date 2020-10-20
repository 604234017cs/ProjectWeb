<?php 

    require_once('condb.php');

    if (isset($_REQUEST['btn_insert'])) {
        try {
            $regis_id = $_REQUEST['txt_ID'];
            $name = $_REQUEST['txt_name'];

            $image_file = $_FILES['txt_file']['name'];
            $type = $_FILES['txt_file']['type'];
            $size = $_FILES['txt_file']['size'];
            $temp = $_FILES['txt_file']['tmp_name'];

            $path = "img/" . $image_file; // set upload folder path

            if (empty($name)) {
                $errorMsg = "Please Enter name";
            } else if (empty($image_file)) {
                $errorMsg = "please Select Image";
            } else if ($type == "image/jpg" || $type == 'image/jpeg' || $type == "image/png" || $type == "image/gif") {
                if (!file_exists($path)) { // check file not exist in your upload folder path
                    if ($size < 5000000) { // check file size 5MB
                        move_uploaded_file($temp, 'img/'.$image_file); // move upload file temperory directory to your upload folder
                    } else {
                        $errorMsg = "Your file too large please upload 5MB size"; // error message file size larger than 5mb
                    }
                } else {
                    $errorMsg = "File already exists... Check upload filder"; // error message file not exists your upload folder path
                }
            } else {
                $errorMsg = "Upload JPG, JPEG, PNG & GIF file formate...";
            }

            if (!isset($errorMsg)) {
                $insert_stmt = $conn->prepare('INSERT INTO cer (name, image, regis_id) VALUES (:fname, :fimage, :fregis_id)');
                $insert_stmt->bindParam(':fregis_id', $regis_id);
                $insert_stmt->bindParam(':fname', $name);
                $insert_stmt->bindParam(':fimage', $image_file);

                if ($insert_stmt->execute()) {
                    $insertMsg = "อัปโหลดรูปภาพสำเร็จ";
                    // header('refresh:2;show.php');
                    header("Location: showtrain.php");
                }
            }

        } catch(PDOException $e) {
            $e->getMessage();
        }
    }


?>




