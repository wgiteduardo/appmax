@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-dark text-white">Editando o produto: {{ $product->title }}</div>
                    <div class="card-body">
                        <form action="{{ route('products.update', $product->sku) }}" method="POST" class="row">
                            @method('PUT')
                            @csrf
                            <div class="col-md-6">
                                <label for="inputSKU">Código SKU</label>
                                <input type="text" id="inputSKU" name="sku" class="form-control @error('sku') is-invalid @enderror" placeholder="Exemplo: NG29X1080" value="{{ $product->sku }}" required="" autofocus="">
                                @error('sku')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="inputTitle">Nome do produto</label>
                                <input type="title" id="inputTitle" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $product->title }}" placeholder="Exemplo: Nome do produto" required="">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputPrice">Preço do produto</label>
                                <input type="text" id="inputPrice" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ $product->price }}" placeholder="Exemplo: 110.00" required="" autofocus="">
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="inputStock">Quantidade em estoque</label>
                                <input type="stock" id="inputStock" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ $product->stock }}" placeholder="Exemplo: 3" required="">
                                @error('stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-success btn-block mt-3" type="submit">Salvar alterações</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
