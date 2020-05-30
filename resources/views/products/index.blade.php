@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="alert alert-primary" role="alert">
                <strong>Atenção!</strong> Os seguintes produtos estão com menos de 100 unidades no estoque:
                <ul>
                    <li>Fone de Ouvido (SKU ABC-1234)</li>
                </ul>
            </div>
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
                                    <a href="{{ route('products.edit', $product->sku) }}" class="btn btn-primary btn-sm">Editar</a>
                                    <a href="{{ route('products.destroy', $product->sku) }}" class="btn btn-danger btn-sm">Deletar</a>
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
