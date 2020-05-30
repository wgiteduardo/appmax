@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="alert alert-danger" role="alert">
                <strong>Atenção!</strong> Os seguintes produtos estão com menos de 100 unidades no estoque:
                <ul>
                    @foreach($belowProducts as $product)
                        <li>{{ $product->title }} (SKU <strong>{{ $product->sku }}</strong>)</li>
                    @endforeach
                </ul>
            </div>
            <div class="card">
                <div class="card-header bg-dark text-white">Relatório do dia</div>

                <div class="card-body table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">SKU</th>
                                <th scope="col">Nome do produto</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Método</th>
                                <th scope="col">Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reports as $report)
                            <tr>
                                <th scope="row">{{ $report->product->sku }}</th>
                                <td>{{ $report->product->title }}</td>
                                <td>{{ ($report->type == 1 ? 'Adição' : 'Remoção') }}</td>
                                <td>{{ $report->quantity }} un.</td>
                                <td>{{ $report->method }}</td>
                                <td>{{ $report->created_at->diffForHumans() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $reports->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
