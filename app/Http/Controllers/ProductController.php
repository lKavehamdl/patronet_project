<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Imports\ProductImport;
use App\Models\Product;
use App\Interfaces\ProductInterface;
use Excel;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $productInterface;
    public function __construct(ProductInterface $productInterface){
        $this->productInterface = $productInterface; 
    }
    
    public function index(Request $request)
    {
        // dd($request->input('paginate'));
        $response = [];
        if($request->input('paginate') == "true"){
            // echo "MADE IT!";
            $response = $this->productInterface->paginate("products", $request->input('perPage'), $request->input("currPage"));
        }
        else{
            $response = $this->productInterface->all();
        }
        return response()->json($response);
    }

    public function findByIds(Request $request){
        $array = $request->input('givenArray');
        $response = $this->productInterface->findByIds($array);
        return response()->json($response);
    }
    public function 
    store($brandId, $arrays)
    {
        // dd($arrays);
        foreach($arrays as $array){
            $str = implode($array);
            // dd([$brandId, $str]);
            $this->productInterface->create(['brand_id' => $brandId,'code' => $str]);
        }
    }

    public function show(Product $product)
    {
        $response = $this->productInterface->findById($product);
        return response()->json($response);
    }

    public function searchForProduct(Request $request){
        $code = $request->input('code');
        $data = $this->productInterface->findProduct($code);
        return $data;
    }
    public function destroy($brand_id)
    {
        $this->productInterface->destroy($brand_id);
    }

    public function generatePremutations($arrays){
        $ans = [[]];
        foreach($arrays as $array){
            $newRes = [];
            foreach($ans as $temp){
                foreach($array as $element){
                    $newRes[] = array_merge($temp, [$element]);
                }
            }
            $ans = $newRes;
        }
        return $ans;
    }

    public function import(){
        $inp = Excel::toArray(new ProductImport(), storage_path('app/Excels/create_products.xlsx'));
        $datas = $inp[0];
        // dd($datas);
        foreach($datas as $data){
            // dd($data);
            $arrays = json_decode($data[1], true);
            // dd($arrays);
            $ans = $this->generatePremutations($arrays);
            foreach($ans as $permutation){
                $prodcut = new Product();
                // dd($data[0]);
                $prodcut->brand_id = $data[0];
                // dd(implode($permutation));
                $prodcut->code = implode($permutation);
                $prodcut->save();
            }
        }
    }
}
