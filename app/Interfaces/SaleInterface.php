<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use App\Http\Requests\SaleRequest;
use App\Interfaces\ServiceInterface;

interface SaleInterface extends ServiceInterface
{
    public function show($id);

    public function index();

    public function store(SaleRequest $attributes);

    public function edit(Request $attributes);

    public function update(Request $attributes);

    public function delete($id);
}