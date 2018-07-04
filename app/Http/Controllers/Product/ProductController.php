<?php

namespace Api\Http\Controllers\Product;

use Api\Http\Controllers\Controller;
use Api\Product;
use Illuminate\http\Request;

class ProductController extends Controller
{
    public function getProducts()
    {
        $products = Product::all();
        return $products;
    }

    public function addProduct(Request $request)
    {
        $product = Product::create($request->all());
        return $product;
    }

    public function getProduct($name)
    {

        $column = 'name'; // This is the name of the column you wish to search
        $product = Product::where($column, '=', $name)->get();
        if (count($product)) {
            return $product;
        } else {
            return "The product doesn't exist.";
        }

    }

    public function updateProduct($name, Request $request
    ) {
        $product = $this->getProduct($name);

        if ($product === "The product doesn't exist.") {
            return "The product doesn't exist.";
        } else {

            foreach ($product as $item) {
                $item->fill($request->all())->save();
            }

            return $product;
        }
    }

    public function deleteProduct($name)
    {
        $product = $this->getProduct($name);

        if ($product === "The product doesn't exist.") {
            return "The product doesn't exist.";
        } else {

            foreach ($product as $item) {
                $item->delete();
            }

            return $product;
        }

    }

}
