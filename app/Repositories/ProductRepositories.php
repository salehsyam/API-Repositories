<?php


namespace App\Repositories;


use App\Models\Product;
use http\Env\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use MongoDB\Driver\Exception\AuthenticationException;


class ProductRepositories implements ProductInterface
{

    public function getAllProduct()
    {
        $product = Product::get();
        return $this->sendResponse($product);
    }

    /**
     * @param $id
     */
    public function ShowProductWithId($id)
    {
        $product = Product::findOrFail($id);
        return $this->sendResponse($product);
    }


    /**
     * @param Request $request
     */
    public function getinsertProduct(Request $request)
    {
        $product = new Product();
        $product->name = $request->get('name');
        $product->salary = $request->get('salary');
        $product->description = $request->get('description');
        $product->save();
        return $this->sendResponse($product);
    }


    /**
     * @param Request $request
     * @param $id
     */
    public function productEdit(Request $request, $id)
    {
        $update = Product::select('id', 'name', 'description', 'salary')->findOrFail($id);
        $update->update([
            'name' => $request->get('name'),
            'salary' => $request->get('salary'),
            'description' => $request->get('description'),
        ]);
        return $this->sendResponse($update, 'success update Product');
    }


    /**
     * @param $id
     */

    public function productDelete($id)
    {
        $Product = Product::find($id);
        $Product->delete();
        return $Product;
    }


}
