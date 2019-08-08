<?php
    header('Access-Control-Allow-Origin: *');

    include_once '../../config/DBConnection.php';
    include_once '../../models/Article.php';

    $database = new DBConnection();
    $db = $database->dbConnect();

    $article = new Article($db);

    $id = $article->idArticle = isset($_GET['idArticle']) ? $_GET['idArticle'] : die();

    $result =  $article->getArticle($id);

    $num_row = $result->rowCount();

    if($num_row > 0)
    {
        $row = $result->fetch(PDO::FETCH_ASSOC);

        extract($row);

        $article_item = array(
            'idArticle' => $idArticle,
            'titre' => $titre,
            'description' => $description,
            'datePub' => $datePub,
            'image' => $image,
            'nom' => $nom
        );

        //array_push($article_arr['data'], $article_item);
        echo json_encode($article_item);
    }

    else
    {
        echo json_encode(
            array('message' => 'Aucun article trouvé')
        );
    }

