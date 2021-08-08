<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaleRequest;
use App\Services\SaleService;

class SalesController extends Controller
{
    protected $saleService;

    public function __construct(SaleService $saleService)
    {
        $this->middleware('auth');
        $this->saleService = $saleService;
    }

    public function show($id){
        $sale = $this->saleService->show($id);
        return json_encode($sale);
    }

    public function index(){
        $sales = $this->saleService->index();
        return view('sales.home',['sales'=>$sales]);
    }

    /*public function create(){
    	return view('sales.create');
    }*/

    public function store(SaleRequest $request){
    	$sale = $this->saleService->store($request);
    	return redirect()->route('sales.home');
    }

    public function edit($id){
        $sale = $this->saleService->edit($id);
        return view('sales.update',['sale'=>$sale]);
    }

    public function update(Request $request){
        $this->saleService->update($request);
        return redirect()->route('sales.home');
    }

    public function delete($id){
        $this->saleService->delete($id);
        return redirect()->route('sales.home');
    }
}
