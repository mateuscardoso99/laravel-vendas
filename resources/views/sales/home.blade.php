@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#ModalCreateVenda">
                Adicionar venda
            </button>

            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th scope="col">Data da venda</th>
                        <th scope="col">Total R$</th>
                        <th scope="col">Opções</th>
                    </tr>
                </thead>
                @foreach($sales as $sale)
                <tbody>
                    <tr>
                        <td>{{$sale->date}}</td>
                        <td>R$ {{$sale->total}}</td>
                        <td>
                       <!--  <button class="btn btn-primary" type="button">Detalhes</button> -->

                        <!-- Botão para acionar modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ExemploModalCentralizado{{$sale->id}}">
                          Detalhes
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="ExemploModalCentralizado{{$sale->id}}" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">

                              <div class="modal-header">
                                <h3 class="modal-title" id="TituloModalCentralizado">Venda do dia: {{$sale->date}}</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>

                              <div class="modal-body" style="overflow-wrap: break-word;">
                                <h3>Descrição: {{$sale->description}}</h3>
                                <h3>Lista de produtos:</h3> 
                                <p>{{$sale->products}}</p>
                                <h3>Total: R${{$sale->total}}</h3>
                              </div>

                              <div class="modal-footer m-auto">
                                <form action="{{route('sales.delete',$sale->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit">Apagar</button>
                                </form>
                                <a class="btn btn-success" href="{{route('sales.edit',$sale->id)}}">Atualizar</a>
                              </div>
                            </div>
                          </div>
                        </div>



                       <!--  <form action="{{route('sales.delete',$sale->id)}}" method="post">
                        @method('DELETE')
                        @csrf
                            <button class="btn btn-danger" type="submit">Apagar</button>
                        </form>
                            <a class="btn btn-success" href="{{route('sales.edit',$sale->id)}}">Atualizar</a> -->
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>

            @foreach($errors->all() as $message)
                <div class="alert alert-danger text-center" role="alert">
                    <strong>{{$message}}</strong>
                </div>
            @endforeach
            
        </div>
    </div>
</div>

@endsection


<div class="modal fade" id="ModalCreateVenda" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalCentralizado">Registrar nova venda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('sales.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="description">Descrição</label>
                        <input type="text" class="form-control" name="description" id="description">
                    </div>

                    <div class="form-group">
                        <label for="products">Produtos</label>
                        <textarea class="form-control" id="products" rows="5" name="products" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="date">Data da venda</label>
                        <input type="date" class="form-control" name="date" id="date" required>
                    </div>

                    <div class="form-group">
                        <label for="date">Total R$</label>
                        <input type="number" class="form-control" name="total" id="total" step="0.01" required>
                    </div>

                    <button class="btn btn-primary" type="submit">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>