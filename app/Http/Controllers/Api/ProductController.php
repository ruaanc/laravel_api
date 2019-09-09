<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Product;

class ProductController extends Controller
{

    /**
     * @var Product
     */
    
    private $product;

    public function __construct(Product $product) {

        $this->product = $product;

    }

    public function index() {
        reponse();
        return $this->product->all();
    }

    public function show(Product $id){
        return $id;
    }
}
