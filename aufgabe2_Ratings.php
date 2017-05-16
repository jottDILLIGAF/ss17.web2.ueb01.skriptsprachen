<?php
/**
 * Created by PhpStorm.
 * User: jott
 * Date: 16.05.2017
 * Time: 20:13
 */

class Ratings {

    public $pdo;
    public $dbhost = 'localhost';                                          // Database Variables
    public $dbname = 'ratings';
    public $dbuser = 'root';
    public $dbpass = '';

    public function __construct($dbhost, $dbname, $dbuser, $dbpass) {

        $this->pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);                    // Create PDO Object related to Database Variables above
    }

    public function addRating($url, $rating, $comment) {

        $insertStatement = $this->pdo->prepare("INSERT INTO ratings (url, rating, comment) VALUES (:url, :rating, :comment)");
        $insertStatement->bindParam(':url', $url);
        $insertStatement->bindParam(':rating', $rating);
        $insertStatement->bindParam(':comment', $comment);
        $insertStatement->execute();
        echo "<b>addRating:</b><br>$url added! check.<br><br>";
    }

    public function getRating($url) {

        $selectStatement = $this->pdo->prepare('SELECT * FROM ratings WHERE url = :url');
        $selectStatement->execute(['url' => $url]);
        $result = $selectStatement->fetchAll(PDO::FETCH_ASSOC);              // PDO::FETCH_ASSOC -- sonst wird alles doppelt übertragen!
        echo "<br><br><b>getRating: </b><br>";
        foreach($result as $entry) {
            //echo serialize($entry)."<br>";
            echo "ID: ".$entry['ID'];
            echo " | url: ".$entry['url'];
            echo " | Rating: ".$entry['rating'];
            echo " | Comment: ".$entry['comment']."<br>";
        }
    }

    public function getAvgRating($url) {

        $selectStatement = $this->pdo->prepare('SELECT Avg(rating) FROM ratings WHERE url = :url');
        $selectStatement->execute(['url' => $url]);
        $result = $selectStatement->fetch(PDO::FETCH_ASSOC);              // PDO::FETCH_ASSOC -- sonst wird alles doppelt übertragen!
        echo "<b>getAvgRating for $url:</b><br>";
        return $result;
    }
}