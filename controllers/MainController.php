<?php

include(__DIR__ . '/../models/Article.php');

 class MainController
 {
    public function create()
    {
        if (!isset($_POST['Name'], $_POST['Description'], $_POST['Created_at'])
            || !($_POST['Name'] && $_POST['Description'] && $_POST['Created_at']))
        {
            return $this->render(__DIR__ . '/../views/createForm.php');
        }

        $model = new Article();
        $model->create($_POST['Name'], $_POST['Description'], $_POST['Created_at']);
        header('Location:read.php');
    }

     public function read()
     {

         $model = new Article();
         $articles = $model->read();
         return $this->render(__DIR__ . '/../views/listForm.php', $articles);
     }

     public function update()
     {
         $model = new Article();
        if (isset($_GET['id'])) {
            $item = $model->readid($_GET['id']);
            return $this->render(__DIR__ . '/../views/updateForm.php', $item);
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

     private function render($template, $data = null)
     {
         ob_start();
         include($template);
         $template = ob_get_clean();
         return $template;
     }

 }