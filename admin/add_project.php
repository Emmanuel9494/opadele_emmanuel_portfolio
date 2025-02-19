<?php
require_once('../includes/connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $random = rand(10000, 99999);
    $newname = 'image' . $random;
    $filetype = strtolower(pathinfo($_FILES['main_images']['name'], PATHINFO_EXTENSION));

    if ($filetype == 'jpeg') {
        $filetype = 'jpg';
    }

    if ($filetype == 'exe') {
        exit('nice try'); // Block executable files
    }

    $newname .= '.' . $filetype;
    $target_file = '../images/' . $newname;

    if (move_uploaded_file($_FILES['main_images']['tmp_name'], $target_file)) {
        $query = "INSERT INTO projects (project_title, main_images, client_name, collaboration, problem_info, solution_info, project_info_text, year, month) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $connect->prepare($query);
        $stmt->bindParam(1, $_POST['project_title'], PDO::PARAM_STR);
        $stmt->bindParam(2, $newname, PDO::PARAM_STR);
        $stmt->bindParam(3, $_POST['client_name'], PDO::PARAM_STR);
        $stmt->bindParam(4, $_POST['collaboration'], PDO::PARAM_STR);
        $stmt->bindParam(5, $_POST['problem_info'], PDO::PARAM_STR);
        $stmt->bindParam(6, $_POST['solution_info'], PDO::PARAM_STR);
        $stmt->bindParam(7, $_POST['project_info_text'], PDO::PARAM_STR);
        $stmt->bindParam(8, $_POST['year'], PDO::PARAM_INT);
        $stmt->bindParam(9, $_POST['month'], PDO::PARAM_STR);
        $stmt->execute();
        $last_id = $connect->lastInsertId();
        $stmt = null;


         // Insert selected technologies
         if (!empty($_POST['tech_ids'])) {
          $query_tech = "INSERT INTO projects_techs (project_id, tech_id) VALUES (?, ?)";
          $stmt_tech = $connect->prepare($query_tech);

          foreach ($_POST['tech_ids'] as $tech_id) {
              $stmt_tech->execute([$last_id, $tech_id]);
          }
          $stmt_tech = null;
          }

        // Handle multimedia image uploads
        if (!empty($_FILES['images']['name'][0])) {
            $query2 = "INSERT INTO multimedia (project_id, media_name) VALUES (?, ?)";
            $stmt2 = $connect->prepare($query2);

            foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                $file_name = $_FILES['images']['name'][$key];
                $filetype = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

                if ($filetype == 'jpeg') {
                    $filetype = 'jpg';
                }

                if ($filetype == 'exe') {
                    continue; // Skip invalid files
                }

                $media_newname = 'media' . rand(10000, 99999) . '.' . $filetype;
                $media_target = '../images/' . $media_newname;

                if (move_uploaded_file($tmp_name, $media_target)) {
                    $stmt2->execute([$last_id, $media_newname]);
                }
            }
            $stmt2 = null;
        }

        header('Location: project_list.php');
    }
}
?>
