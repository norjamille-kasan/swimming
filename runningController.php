<?php 
    include('./db.php') ;
  
   if ($_POST['opt']=="createRunning") {
       $title = $_POST['title'];
        $date =date("Y/m/d H:m:s");
        
                    $sql = "INSERT INTO  tbl_running (title, created_at) VALUES ('$title','$date'); " ;
                    if($conn->query($sql)){
                        $sql = "SELECT * FROM tbl_running ORDER BY r_id DESC limit 1" ;
                            if($singleData = $conn->query($sql)){
                                while($row = $singleData->fetch(PDO::FETCH_ASSOC)){
                                    $latest_id = $row['r_id'];
                                }

                                for($i = 1; $i<=8; $i++){
                                    $sql = "INSERT INTO tbl_runpart (lane_number,r_id) VALUES ('$i','$latest_id');";
                                    $res = $conn->query($sql);
                                };
                                if ($res) {
                                        echo "Success";
                                }
                            };

                    }else{
                        echo "error";
                    }

   }

   if ($_POST['opt']=="updateName") {
        $id = $_POST['id'];
        $name = $_POST['name'];

        $sql = "UPDATE tbl_runpart SET part_name='$name' WHERE rp_id = '$id'";
        if($conn->query($sql)){
            echo "Success";
        }else{
            echo "Failed";
        }
   }

   if ($_POST['opt']=="updateTime") {
        $id = $_POST['id'];
        $time = $_POST['time'];

        $sql = "UPDATE tbl_runpart SET run_time='$time' WHERE rp_id = '$id'";
        if($conn->query($sql)){
            echo "Success";
        }else{
            echo "Failed";
        }

   }

      if ($_POST['opt']=="deleteRunning") {
        $id = $_POST['id'];

        $sql = "DELETE FROM tbl_running WHERE r_id = '$id'";
        if($conn->query($sql)){
            echo "Success";
        }else{
            echo "Failed";
        }

   }



     if ($_POST['opt']=="updateTitle") {
        $id = $_POST['id'];
        $title = $_POST['title'];

        $sql = "UPDATE tbl_running SET title='$title' WHERE r_id = '$id'";
        if($conn->query($sql)){
            echo "Success";
        }else{
            echo "Failed";
        }
   }


?>