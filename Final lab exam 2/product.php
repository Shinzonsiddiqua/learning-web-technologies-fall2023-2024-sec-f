<?php
session_start();

if (isset ($_REQUEST['add']))
{
    $productData = $_REQUEST['productData']
    $credentials = json_decode($productData);

    $productID = $credentials->productid;
    $productType = $credentials->productType;
    $productName = $credentials->productname;
    $productPrice = $credentials->productprice;
    $productQuantity = $credentials->productquantity;
    $productDescription = $credentials->productdescription;
    $imagenames = $credentials->Imagenames;

    #validation
    $found = find_product_by_product_name($productName);
    $if($productType==""|| $productName== ""|| $productPrice== ""|| $productQuantity== ""|| $productDescription=="")
    echo("Please fill up all the fields!");
elseif($found>0)

{
    echo("Similar product already exits!")
    else
    {
        echo("Unable to add product!")

    }
}

    

}