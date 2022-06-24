<?php

//SEPETE EKLE SESSIONS VERSİYON
function _addtocartSession($a,$b,$c){
    session_start();

    $cartArray = array(
        "productID" => $a,
        "cartMembersID" => $b,
        "cartQuantity" => $c,
    );

    if(isset($_POST["quantity"])){
        if(!empty($_SESSION["cartSession"][$_GET['productID']]["cartQuantity"])){
            $sessionQuantity = $_SESSION["cartSession"][$_GET['productID']]["cartQuantity"];
            $sessionQuantity = $sessionQuantity+$c;
            $cartArray = array(
                "productID" => $a,
                "cartMembersID" => $b,
                "cartQuantity" => $c
            );
        }
    }

    $_SESSION["cartSession"][$_GET['productID']] = $cartArray;
}

//SEPETE EKLE VERİTABANINA YAZDIR
function _addtocart($a,$b,$c){
    $addtocart_ = db_connect()->prepare("
    INSERT INTO cart (cartMemberID, cartProductID, cartQuantity) 
    VALUES (?,?,?)");
    $addtocart_->execute(array($a,$b,$c));
}

?>