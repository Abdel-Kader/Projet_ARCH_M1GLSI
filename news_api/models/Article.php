<?php


class Article extends DBConnection
{
    private $conn;
    private $table = 'article';

    public $idArticle;
    public $titre;
    public $description;
    public $image;
    public $idCat;
    public $iduser;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAllArticles($begin)
    {
        $query = "SELECT idArticle, titre, LEFT(description,250) as description, DATE_FORMAT(datePub, '%d %M, %Y') as datePub, image, nom FROM article, categorie WHERE article.idCat = categorie.idCat ORDER BY idArticle DESC LIMIT ".$begin.", 5";
       
        return $this->createQuery($query);
    }

    public function getArticlesByCategory($idCategory)
    {
        $sql = "SELECT idArticle, titre, description, DATE_FORMAT(datePub, '%d %M, %Y') as datePub, image, nom FROM article, categorie WHERE article.idCat = categorie.idCat AND categorie.idCat = ?";
        return $this->createQuery($sql, [$idCategory]);

    }

    public function getArticle($idArticle)
    {
        $query = "SELECT idArticle, titre, description, DATE_FORMAT(datePub, '%d %M, %Y') as datePub, image, nom FROM article, categorie WHERE article.idCat = categorie.idCat AND idArticle = ?";

        return $this->createQuery($query,[$idArticle]);
    }

    public function addArticle($titre, $description, $idCat, $idUser)
    {
        $sql = 'INSERT INTO article (titre, description, idCat, idUser) VALUES (?, ?, ?, ?)';
        return $this->createQuery($sql, [$titre, $description, $idCat, $idUser]);
    }

}