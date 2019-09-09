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
        return response()->json($this->product->paginate(10));
    }

    public function show(Product $id){
        $data = ['data' => $id];
        return response()->json($data);
    }

    public function store(Request $request){
        dd($request->all());
    }
}
