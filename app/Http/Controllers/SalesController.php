<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Requests\SaleRequest;

class SalesController extends Controller
{
    protected $user_id;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function($req, $next){
            $this->user_id = Auth::id();
            return $next($req);
        });
    }

    public function show(){
        //
    }

    public function index(){
        $sales = Sales::where('user_id',$this->user_id)->get();
        return view('sales.home',['sales'=>$sales]);
    }

    /*public function create(){
    	return view('sales.create');
    }*/

    public function store(SaleRequest $req){
        $data = $req->validated();
    	$sale = Sales::create([
	    	'description' => $data['description'],
		    'products' => $data['products'],
		    'date' => Carbon::parse($data['date'])->format('d/m/Y'),
		    'total' => $data['total'],
		    'user_id' => $this->user_id,
    	]);
    	if ($sale) {
    		return redirect()->route('sales.home');
    	}
    	return redirect()->back();
    }

    public function edit(Sales $sale){
        return view('sales.update',['sale'=>$sale]);
    }

    public function update(Sales $sale, SaleRequest $req){
        $sale = Sales::find($req->id);
        $sale->description = $req->description;
        $sale->products = $req->products;
        $sale->date = $req->date;
        $sale->total = $req->total;
        $sale->user_id = $this->user_id;
        $sale->save();
        return redirect()->route('sales.home');
    }

    public function delete($id){
        $sale = Sales::find($id);
        if($sale){
            $sale->delete();
        }
        return redirect()->route('sales.home');
    }
}
