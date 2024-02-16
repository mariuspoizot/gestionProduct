<?php

interface IProductDAO {
    function getAllProduct() : array;
    function saveProduct (string $noprod , string $name , float $price , string $descr) ;
    function updateProduct (int $id , string $noprod , string $name , float $price , string $descr) ;
    function deleteProduct (int $id) : bool ;
    function getProductById($id) :array ;
    function getProductByName(string $name) : array ;
    // function getProductByPriceIn( flot $price1 , float $price2 ) : array ;
}