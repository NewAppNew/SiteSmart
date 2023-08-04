<?php
require '../database.php';

$files = $_FILES["file"]["name"];
//$linksForFile = $_REQUEST['linkforfile'];
$project_id = trim($_REQUEST['project_id']);
 $task_id = trim($_REQUEST['task_id']);
$uniqueid = uniqid();

foreach ($_FILES['file']['name'] as $key => $val) {
    $upload_dir = "C:/xampp/htdocs/images/";
    $upload_file = $upload_dir. $uniqueid . $_FILES['file']['name'][$key];
    $filename = "C:/xampp/htdocs/images/" . $uniqueid.$_FILES['file']['name'][$key];
  


    if (move_uploaded_file($_FILES['file']['tmp_name'][$key], $upload_file)) {

        // if($linksForFile != ''){
        //     $insert_emp = "INSERT INTO `project_attachments`(`id`,`project_id`, `attchments`,`linksForFile`,`task_id`)
        //     VALUES (null,'$project_id','$filename','$linksForFile','$task_id')";
        // }else{
          echo  $insert_emp = "INSERT INTO `project_attachments`(`id`,`project_id`, `attchments`,`task_id`)
            VALUES (null,'$project_id','$filename','$task_id')";

       // }

      

        if (mysqli_query($conn, $insert_emp)) {
            echo "File Inserted";
        } else {
            http_response_code(422);
        }
    }
}
