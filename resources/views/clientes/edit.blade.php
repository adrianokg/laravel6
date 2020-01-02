@extends('welcome') @section('content')

    <div class="voltar">
        <div class="wrapper container">
            <a href="{{ url('/clientes') }}">
                Voltar
            </a>
        </div>
    </div>

    <div class="wrapper container">
        <div class="container-formulario">
            <div class="page-title">
                <h2>
                    Editar cliente
                </h2>
            </div>
            <form action="{{route('clientes.update', ['cliente' => $cliente->id])}}" method="POST" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="uk-column-1-2">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Nome</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" type="text" name="nome" required value="{{ $cliente->nome }}">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Data de nascimento</label>
                        <div class="uk-form-controls">
                            <input class="uk-input mask-data" type="text" name="data_nascimento" required value="{{ $cliente->data_nascimento->format('d/m/Y') }}">
                        </div>
                    </div>
                </div>
                <div class="uk-column-1-2">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Sexo</label>
                        <div class="uk-form-controls">
                            <select name="sexo" class="uk-input" required>
                                <option value="feminino" @if($cliente->sexo == "feminino") selected @endif>feminino</option>
                                <option value="masculino" @if($cliente->sexo == "masculino") selected @endif>masculino</option>
                            </select>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">CEP</label>
                        <div class="uk-form-controls">
                            <input class="uk-input mask-cep" type="text" name="cep" id="cep" value="{{ $cliente->cep }}">
                        </div>
                    </div>
                </div>
                <div class="uk-column-1-2">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Endereço</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" type="text" name="endereco" id="endereco" value="{{ $cliente->endereco }}">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Número</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" type="text" name="numero" value="{{ $cliente->numero }}">
                        </div>
                    </div>
                </div>
                <div class="uk-column-1-2">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Complemento</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" type="text" name="complemento" id="complemento" value="{{ $cliente->complemento }}">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Bairro</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" type="text" name="bairro" id="bairro" value="{{ $cliente->bairro }}">
                        </div>
                    </div>
                </div>
                <div class="uk-column-1-2">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Estado</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" type="text" name="estado" id="estado" value="{{ $cliente->estado }}">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Cidade</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" type="text" name="cidade" id="cidade" value="{{ $cliente->cidade }}">
                        </div>
                    </div>
                </div>
                <div class="align-right">
                    <input class="uk-button uk-button-primary" type="submit" value="Enviar">
                </div>
            </form>
        </div>
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

    @endif @if($errors->any())

        <div class="alert-message">
            <div class="uk-alert-danger" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

    @endif @endsection