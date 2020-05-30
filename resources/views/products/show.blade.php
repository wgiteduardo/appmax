@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        <strong>Sucesso!</strong> O estoque foi adicionado com sucesso ao produto.
                    </div>
                @endif
                @if(session()->has('removed'))
                    <div class="alert alert-danger" role="alert">
                        <strong>Sucesso!</strong> O estoque foi removido com sucesso do produto.
                    </div>
                @endif
                <div class="card">
                    <div class="card-header bg-dark text-white">Estoque do produto: {{ $product->title }}</div>
                    <div class="col-md-12 text-center mt-3">
                        <h3>Quantidade em estoque: {{ $product->stock }}</h3>
                    </div>
                    <div class="card-body row">
                        <div class="col-md-6">
                            <form action="{{ route('products.stock.add', $product->sku) }}" method="POST">
                                @method('PATCH')
                                @csrf
                                <label for="inputStock">Digite a quantidade</label>
                                <input type="text" id="inputStock" name="stock" class="form-control @error('stock') is-invalid @enderror" placeholder="Exemplo: 30" value="" required="" autofocus="">
                                @error('stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <button type="submit" class="btn btn-success btn-block mt-2"> Adicionar ao estoque</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form action="{{ route('products.stock.remove', $product->sku) }}" method="POST">
                                @method('PATCH')
                                @csrf
                                <label for="inputStock">Digite a quantidade</label>
                                <input type="text" id="inputStock" name="stock" class="form-control @error('stock') is-invalid @enderror" placeholder="Exemplo: 30" value="" required="" autofocus="">
                                @error('stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <button type="submit" class="btn btn-danger btn-block mt-2"> Remover do estoque</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
