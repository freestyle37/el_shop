<?php

declare(strict_types=1);
require_once './db_connect/connection.php';
require 'exam_txt/exam.php';
/*
class ShopProduct {
    public string $title;

    function __construct(
        $title
    ) {
        $this->title = $title;
    }

    function getSummaryLine() {
        $base = $this->title;
        return $base;
    }
}

class BookProduct extends ShopProduct {
    public int $numPages;

    public function __construct(
        $title,
        $numPages
    ) {
        parent::__construct(
            $title
        );
        $this->numPages = $numPages;
    }

    public function getSummaryLine() {
        $base = parent::getSummaryLine();
        $base .= ": {$this->numPages} стр.";
        return $base;
    }
}

class CdProduct extends ShopProduct {
    public float $playLength;

    public function __construct(
        $title,
        $playLength
    ) {
        parent::__construct(
            $title
        );
        $this->playLength = $playLength;
    }

    public function getSummaryLine() {
        $base = parent::getSummaryLine();
        $base .= ": $this->playLength мин.";
        return $base;
    }
}

$shProd1 = new ShopProduct('some shop product');
$bkProd1 = new BookProduct("sdfh", 2);
$cdProd1 = new CdProduct('some book product', 2.03);

echo '<pre>';
var_dump($cdProd1, $cdProd1->getSummaryLine());
echo '</pre>';

*/
//echo 'tuy';

try {
    $dbh = new PDO(DB_CONNECTION_INFO);
}
catch (PDOException $e) {
    //echo "net";
    die($e->getMessage());
}

//$query = "SELECT * FROM superheroes";

//$res = $pdo->query($query);


$sth = $dbh->prepare($query);
$sth->execute();

//$array = $sth->fetch(PDO::FETCH_ASSOC);
//print_r($array);

echo '<table>';
$i = 0;
while($cur_ar = $sth->fetch(PDO::FETCH_ASSOC)) {
    //echo $cur_ar['name']."<br />";
    if($i === 0) {
        echo '<tr>';
        foreach($cur_ar as $key => $item) {
            echo '<td>'.$key.'</td>';
        }
        echo '</tr>';
    }

    echo '<tr>';
    foreach($cur_ar as $item) {
        echo '<td>'.$item.'</td>';
    }
    echo '</tr>';
    $i++;
}
echo '</table>';
/*
foreach($array as $item) {
    echo $item.'<br>';
}
*/
/*
echo '<pre>';
var_dump($res);
echo '</pre>';
*/