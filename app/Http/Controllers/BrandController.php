<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Imports\BrandImport;
use App\Interfaces\BrandInterface;
use App\Models\Brand;
use Excel;
use Illuminate\Http\Request;


class BrandController extends Controller
{
    protected $brandInterface;
    public function __construct(BrandInterface $brandInterface){
        $this->brandInterface = $brandInterface; 
    }
    public function findByIds(Request $request){
        $array = $request->input('givenArray');
        // dd($array);
        $response = $this->brandInterface->findByIds($array);
        return response()->json($response);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $response = [];
        if($request->input('paginate') == "true"){
            $response = $this->brandInterface->paginate("brands", $request->input('perPage'), $request->input("currPage"));
        }
        else{
            $response = $this->brandInterface->all();
        }
        return response()->json($response);
    }

    
    public function store(StoreBrandRequest $request)
    {
        $data = $request->all();
        return $this->brandInterface->create($data);   
    }
    
    public function show($id)
    {
        // $id = $request->input('id');
        // dd($id);
        $response = $this->brandInterface->findById($id);
        return response()->json($response);
    }


    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $data = [];
        $brand_name = $request->input("brand_name");
        $data['brand_name'] = $brand_name;
        // dd($brand[0]);
        $this->brandInterface->update($brand, $data);
    }

    public function destroy(Brand $brand)
    {
        // dd($brand);
        $this->brandInterface->destroy($brand);
    }

    public function import(){
        Excel::import(new BrandImport, storage_path('app/Excels/create_brands.xlsx'));
    }
}