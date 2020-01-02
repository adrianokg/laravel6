@extends('welcome') @section('content')

    <div class="wrapper container">

        <div class="align-right">
            <div class="btn-novo-cliente">
                <a href="{{ url('/clientes/create') }}" class="uk-button uk-button-primary">
                    cadastrar cliente
                </a>
            </div>
        </div>

        <div class="page-title">
            <h2>
                Clientes cadastrados - @if(count($clientes) != 1) {{ count($clientes) }} resultados @else 1 resultado @endif
            </h2>
        </div>

        <div class="tabela">
            <table class="uk-table uk-table-striped">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Data de nascimento</th>
                    <th>Sexo</th>
                    <th>CEP</th>
                    <th>Endereço</th>
                    <th>Número</th>
                    <th>Complemento</th>
                    <th>Bairro</th>
                    <th>Estado</th>
                    <th>Cidade</th>
                    <th>Criado em</th>
                    <th>Editado em</th>
                    <th>Editar</th>
                    <th>Remover</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clientes as $cliente)
                    <tr>
                        <td style="min-width: 150px">{{ $cliente->nome }}</td>
                        <td>{{ $cliente->data_nascimento->format('d/m/Y') }}</td>
                        <td>{{ $cliente->sexo }}</td>
                        <td>{{ $cliente->cep }}</td>
                        <td style="min-width: 150px">{{ $cliente->endereco }}</td>
                        <td>{{ $cliente->numero }}</td>
                        <td>{{ $cliente->complemento }}</td>
                        <td>{{ $cliente->bairro }}</td>
                        <td>{{ $cliente->estado }}</td>
                        <td>{{ $cliente->cidade }}</td>
                        <td>{{ $cliente->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $cliente->updated_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href='{{ url("/clientes/$cliente->id/edit") }}' class="uk-button uk-button-default">Editar</a>
                        </td>
                        <td>
                            <button uk-toggle="target: #modal-remove-{{ $cliente->id }}" type="button" class="uk-button uk-button-danger">Remover</button>
                            <div id="modal-remove-{{ $cliente->id }}" uk-modal>
                                <div class="uk-modal-dialog uk-modal-body">
                                    <h2 class="uk-modal-title">Remover</h2>
                                    <p>
                                        Confirmar remoção?
                                    </p>
                                    <p class="uk-text-right">
                                        <button class="uk-button uk-button-default uk-modal-close" type="button">Cancelar</button>
                                    </p>
                                    <form action="{{route('clientes.destroy', ['cliente' => $cliente->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="uk-button uk-button-danger" type="submit">
                                            Remover
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        @if (Session::has('message'))

            <div class="alert-message">
                <div class="alert-message">
                    <div class="uk-alert-success" uk-alert>
                        <a class="uk-alert-close" uk-close></a>
                        {{ Session::get('message') }}
                    </div>
                </div>
            </div>
        @endif @endsection

    </div>
