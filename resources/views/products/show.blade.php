@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
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
                @if(session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        <strong>Opsssss!</strong> Parece que você não pode remover essa quantidade do estoque.
                    </div>
                @endif
                <div class="card">
                    <div class="card-header bg-dark text-white">Estoque</div>
                    <div class="col-md-12 mt-3">
                        <p>Produto: <strong>{{ $product->title }}</strong><br/>
                        Quantidade em estoque: <strong>{{ $product->stock }}</strong></p>
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
                                <input type="text" id="inputStock" name="stock" class="form-control @error('stock') is-invalid @enderror" placeholder="Exemplo: 15" value="" required="" autofocus="">
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
