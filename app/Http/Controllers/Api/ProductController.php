<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Product;
use \App\API\ApiError;

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

        try {
            $productData = $request->all();
            $this->product->create($productData);
            return response()->json(['msg' => 'Produto criado com sucesso!'], 201);
        } catch (\Exception $e) {
            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($e->getMessage(), 1010));
            }
            return reponse()->json(ApiError::errorMessage('Houve um erro ao realizar operação', 1010));
        }

    }

    public function update(Request $request, $id){
        try {
            $productData = $request->all();
            $product = $this->product->find($id);
            $product->update($productData);
            return response()->json(['msg' => 'Produto atualizado com sucesso!'], 201);
        } catch (\Exception $e) {
            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($e->getMessage(), 1010));
            }
            return reponse()->json(ApiError::errorMessage('Houve um erro ao realizar operação', 1010));
        }

    }
}
