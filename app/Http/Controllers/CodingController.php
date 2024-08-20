<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCodingRequest;
use App\Http\Requests\UpdateCodingRequest;
use App\Imports\CodingImport;
use App\Interfaces\CodingInterface;
use App\Models\Coding;
use Excel;
use Illuminate\Http\Request;

class CodingController extends Controller
{
    protected $codingInterface;
    public function __construct(CodingInterface $codingInterface){
        $this->codingInterface = $codingInterface; 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $response = $this->codingInterface->all();
        return response()->json($response);

    }

    public function findByIds(Request $request){
        $array = $request->input('givenArray');
        $response = $this->codingInterface->findByIds($array);
        return response()->json($response);
    }
    
    public function store(StoreCodingRequest $request, ProductController $productController)
    {
        $data = [];
        $data['brand_id'] = $request->input('brand_id');
        $data['coding_len'] = $request->input('coding_len');
        $data['coding_instruction'] = $request->input('coding_instruction');
        $arrays = $request->input('arrays');
        $ans = $this->codingInterface->createPermuations($arrays);
        $this->codingInterface->create($data);   
        $productController->store($request->input('brand_id'), $ans);
    }

    public function show($id)
    {
        $response = $this->codingInterface->findById($id);
        return response()->json($response);
    }

   
    public function update(UpdateCodingRequest $request, Coding $coding, ProductController $productController)
    {
        $data = [];
        $brand_id = $request->input('brand_id');
        $coding_len = $request->input('coding_len');
        $coding_instruction = $request->input('coding_instruction');
        $data['brand_id'] = $brand_id;
        $data['coding_len'] = $coding_len;
        $data['coding_instruction'] = $coding_instruction;
        $this->codingInterface->update($coding, $data);
        $brand_id = $this->codingInterface->findBrandID($coding);
        $productController->destroy($brand_id);
        $arrays = $request->input('arrays');
        $ans = $this->codingInterface->createPermuations($arrays);   
        $productController->store($brand_id, $ans);

    }

    public function destroy(Coding $coding, ProductController $productController)
    {
        $brandID = $this->codingInterface->findBrandID($coding);
        $this->codingInterface->destroy($coding);
        $productController->destroy($brandID);
    }

    public function import(){
        Excel::import(new CodingImport, storage_path('app/Excels/create_codings.xlsx'));
    }
}
