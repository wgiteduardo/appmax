@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                    <strong>Sucesso!</strong> O produto foi cadastrado/alterado com sucesso.
                </div>
            @endif
            @if(session()->has('deleted'))
                <div class="alert alert-success" role="alert">
                    <strong>Sucesso!</strong> O produto foi deletado com sucesso.
                </div>
            @endif
            <div class="card">
                <div class="card-header bg-dark text-white">Produtos cadastrados</div>

                <div class="card-body table-responsive">
                    <a href="{{ route('products.create') }}" class="btn btn-block btn-success mb-3">Adicionar novo produto</a>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">SKU</th>
                                <th scope="col">Nome do produto</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Estoque</th>
                                <th scope="col">Gerenciar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <th scope="row">{{ $product->sku }}</th>
                                <td>{{ $product->title }}</td>
                                <td>R${{ $product->price }}</td>
                                <td>{{ $product->stock }} un.</td>
                                <td>
                                    <form action="{{ route('products.destroy', $product->sku) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('products.show', $product->sku) }}" class="btn btn-success btn-sm">Estoque</a>
                                        <a href="{{ route('products.edit', $product->sku) }}" class="btn btn-primary btn-sm">Editar</a>
                                        <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
