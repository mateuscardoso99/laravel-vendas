@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('sales.update') }}" method="post">
                @method('PUT')
                @csrf

                <input class="form-control" type="hidden" name="id" value="{{$sale->id}}">

                <div class="form-group">
                    <label for="description">Descrição</label>
                    <input type="text" class="form-control" name="description" id="description" value="{{$sale->description}}" required>
                </div>

                <div class="form-group">
                    <label for="products">Produtos</label>
                    <textarea class="form-control" id="products" rows="5" name="products" required>{{$sale->products}}
                    </textarea>
                </div>

                <div class="form-group">
                    <label for="date">Data da venda</label>
                    <input type="text" class="form-control" name="date" id="date" value="{{$sale->date}}" required>
                </div>

                <div class="form-group">
                    <label for="date">Total da venda</label>
                    <input type="number" class="form-control" name="total" id="total" value="{{$sale->total}}" step="0.01" required>
                </div>

                <button class="btn btn-primary" type="submit">Salvar</button>

            </form>
        </div>
    </div>
</div>
@endsection