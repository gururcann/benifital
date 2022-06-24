<?php
require "src/database_connection.php";

//TÜM ÜRÜNLER
function _products(){
    $productsQuery_ = db_connect()->prepare("SELECT * FROM products");
    $productsQuery_->execute();
    foreach ($productsQuery_ as $productsQuery) {
        $result[] = $productsQuery;
    }
    return $result;
}

//ÜRÜN DETAYLARI
function _productsDetails($e){
        $productsDetails_ = db_connect()->prepare("SELECT * FROM products WHERE productsID = ?");
        $productsDetails_->execute(array($e));
        foreach ($productsDetails_ as $productsDetails);
        $result[] = $productsDetails;
        return $result;
}

?>