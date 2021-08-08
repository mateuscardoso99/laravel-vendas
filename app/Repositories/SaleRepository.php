<?php

namespace App\Repositories;

use App\Models\Sales;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SaleRepository
{
    protected $user_id;
    protected $sale;

    public function __construct(Sales $sale)
    {
        $this->sale = $sale;
    }

    public function show($id){
        $sale = $this->sale
                    ->where('user_id',$this->user_id)
                    ->where('id',$id)->first();
        return $sale;
    }

    public function index(){
        $sales = $this->sale->where('user_id',Auth::id())->get();
        return $sales;
    }

    public function store($data){
    	$sale = $this->sale->create([
	    	'description' => $data['description'],
		    'products' => $data['products'],
		    'date' => Carbon::parse($data['date'])->format('d/m/Y'),
		    'total' => $data['total'],
		    'user_id' => Auth::id(),
    	]);
    	return $sale;
    }

    public function edit($id){
        $sale = $this->sale->findOrFail($id);
        return $sale;
    }

    public function update($data){
        $sale = $this->sale->findOrFail($data['id']);
        $sale->description = $data['description'];
        $sale->products = $data['products'];
        $sale->date = $data['date'];
        $sale->total = $data['total'];
        $sale->user_id = Auth::id();
        $sale->save();
        return $sale;
    }

    public function delete($id){
        $sale = $this->sale->findOrFail($id);
        $sale->delete();
        return $sale;
    }
}
