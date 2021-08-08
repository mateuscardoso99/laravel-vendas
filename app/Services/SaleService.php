<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Http\Requests\SaleRequest;
use App\Repositories\SaleRepository;
use App\Interfaces\SaleInterface;

class SaleService implements SaleInterface
{
    protected $saleRepository;

    public function __construct(SaleRepository $saleRepository)
    {
        $this->saleRepository = $saleRepository;
    }

    public function show($id){
        return $this->saleRepository->show($id);
    }

    public function index(){
        $result = $this->saleRepository->index();
        return $result;
    }

    public function store(SaleRequest $request){
        $data = $request->validated();
        $result = $this->saleRepository->store($data);
        return $result;
    }

    public function edit($id){
        $result = $this->saleRepository->edit($id);
        return $result;
    }

    public function update(Request $request){
        $data = $request->validate([
            'id' => 'required|integer',
            'description'=>'required',
            'products'=>'required',
            'date'=>'required',
            'total'=>'required|numeric'
        ]);
        $result = $this->saleRepository->update($data);
        return $result;
    }

    public function delete($id){
        $result = $this->saleRepository->delete($id);
        return $result;
    }
}
