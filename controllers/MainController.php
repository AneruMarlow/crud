<?php

include(__DIR__ . '/../models/Article.php');

 class MainController
 {
    public function create()
    {
        if (!isset($_POST['Name'], $_POST['Description'], $_POST['Created_at'])
            || !($_POST['Name'] && $_POST['Description'] && $_POST['Created_at'])) {
            ob_start();
            include(__DIR__ . '/../views/createForm.php');
            $result = ob_get_clean();
            return $result;
        }

        $model = new Article();
        $model->create($_POST['Name'], $_POST['Description'], $_POST['Created_at']);
        header('Location:read.php');
    }

     public function read()
     {

         $model = new Article();
         $articles = $model->read();
         ob_start();
         include(__DIR__ . '/../views/listForm.php');
         $result = ob_get_clean();
         return $result;

     }

     public function update()
     {
         $model = new Article();
        if (isset($_GET['id'])) {
            $item = $model->readid($_GET['id']);
            ob_start();
            include(__DIR__ . '/../views/updateForm.php');
            $result = ob_get_clean();
            return $result;
        }

        $model->upd($_POST['Name'], $_POST['Description'], $_POST['Created_at'], $_POST['id']);
        header('Location:read.php');

     }

     public function delete()
     {
         $model = new Article();
         $model->del($_GET['id']);
         header('Location:read.php');
     }

 }