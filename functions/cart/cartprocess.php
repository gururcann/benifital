<?php
//SEPETE EKLE SESSIONS VERSİYON
function _addtocartSession($a,$b,$c,$d){
    $cartArray = array(
        "productID" => $b,
        "cartMembersID" => $a,
        "cartQuantity" => $c,
        "cartID" => $d
);
    //SEPETTE VARSA ÜRÜNE EKLEME YAP
    if(!empty($_SESSION["cartSession"][$b]["cartQuantity"])){
        $sessionQuantity = $_SESSION["cartSession"][$b]["cartQuantity"];
        $sessionQuantity = $sessionQuantity+$c;
        $cartArray = array(
            "productID" => $b,
            "cartMembersID" => $a,
            "cartQuantity" => $sessionQuantity,
            "cartID" => $d
        );
    }
    //ARRAY'I SESSIONA ATA
    $_SESSION["cartSession"][$b] = $cartArray;
}

function _cartUpdate($a,$b,$c,$d){
    $cartArray = array(
        "productID" => $b,
        "cartMembersID" => $a,
        "cartQuantity" => $c,
        "cartID" => $d
    );
    $_SESSION["cartSession"][$b] = $cartArray;

}

//SEPETE EKLE VERİTABANINA YAZDIR
//function _addtocart($a,$b,$c){
//    $addtocart_ = db_connect()->prepare("
//    INSERT INTO cart (cartMemberID, cartProductID, cartQuantity)
//    VALUES (?,?,?)");
//    $addtocart_->execute(array($a,$b,$c));
//}

?>