<?php

namespace Api\Http\Controllers\Products;

use Api\Http\Controllers\Controller;
use Api\Products;
use Illuminate\http\Request;

class ProductsController extends Controller
{
    public function getProducts()
    {
        $products = Products::all();
        return $products;
    }

    public function addProducts(Request $request)
    {
        $products = Products::create($request->all());
        return $products;
    }

    public function getProduct($id)
    {
        if (is_numeric($id)) {
            $product = Products::findOrFail($id);
        } else {
            $column = 'name'; // This is the name of the column you wish to search
            $product = Products::where($column, '=', $id)->get();
            if (count($product)) {
                return $product;
            } else {
                return "The product doesn't exist.";
            }
        }

    }

    public function updateProduct($id, Request $request
    ) {
        $product = $this->getProduct($id);
        $product->fill($request->all())->save();

        return $product;
    }

    public function deleteProduct($id)
    {
        $product = $this->getProduct($id);

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
