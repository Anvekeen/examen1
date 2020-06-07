<?php
include './classes/Building.php';
include './classes/ProductDAO.php';
include './classes/User.php';
include './classes/UserDAO.php';

$product_manager = new ProductDAO();
$user_manager = new UserDAO();

if (isset($_POST) && isset($_POST['productid'])) {
    $prod = $product_manager->fetch($_POST['productid']);
    $produit = [
        'id' => $prod->__get('id'),
        'name' => $prod->__get('name'),
        'price' => $prod->__get('price'),
        'vat' => $prod->__get('vat'),
        'quantity' => $prod->__get('quantity')
    ];
    echo json_encode($produit);
}

if (isset($_POST) && isset($_POST['userid'])) {
    $u = $user_manager->fetchUser($_POST['userid']);
    $user = [
        'id' => $u->__get('id'),
        'username' => $u->__get('username'),
        'password' => $u->__get('password')
    ];
    echo json_encode($user);
}