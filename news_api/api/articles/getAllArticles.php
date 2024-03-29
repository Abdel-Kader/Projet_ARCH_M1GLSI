<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/DBConnection.php';
    include_once '../../models/Article.php';

    $database = new DBConnection();
    $db = $database->dbConnect();

    $article = new Article($db);
    $begin = $_GET['begin'];
    $result = $article->getAllArticles($begin);

    $num_row = $result->rowCount();

    if($num_row > 0)
    {
        $article_arr = array();
        $article_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);

            $article_item = array(
                'idArticle' => $idArticle,
                'titre' => $titre,
                'description' => $description,
                'datePub' => $datePub,
                'image' => $image,
                'nom' => $nom
            );

            array_push($article_arr['data'], $article_item);
        }

        //echo json_encode($article_arr);
        echo json_encode($article_arr['data']);
    }
    else
    {
        echo json_encode(
            array('message' => 'Aucun article trouvé')
        );
    }

