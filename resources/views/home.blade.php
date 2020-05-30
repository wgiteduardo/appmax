@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="alert alert-danger" role="alert">
                <strong>Atenção!</strong> Os seguintes produtos estão com menos de 100 unidades no estoque:
                <ul>
                    <li>Fone de Ouvido (SKU ABC-1234)</li>
                </ul>
            </div>
            <div class="card">
                <div class="card-header bg-dark text-white">Relatório</div>

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
                            <tr>
                                <th scope="row">ABC-1234</th>
                                <td>Fone de Ouvido</td>
                                <td>Adição</td>
                                <td>10 un.</td>
                                <td>API</td>
                                <td>30/05/2020</td>
                            </tr>
                            <tr>
                                <th scope="row">ABC-1234</th>
                                <td>Fone de Ouvido</td>
                                <td>Adição</td>
                                <td>10 un.</td>
                                <td>API</td>
                                <td>30/05/2020</td>
                            </tr>
                            <tr>
                                <th scope="row">ABC-1234</th>
                                <td>Fone de Ouvido</td>
                                <td>Adição</td>
                                <td>10 un.</td>
                                <td>API</td>
                                <td>30/05/2020</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
