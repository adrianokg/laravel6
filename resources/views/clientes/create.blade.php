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
                    Cadastrar cliente
                </h2>
            </div>
            <form action="{{ route('clientes.store') }}" method="POST" autocomplete="off">
                @csrf
                @method('POST')
                <div class="uk-column-1-2">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Nome</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" type="text" name="nome" required>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Data de nascimento</label>
                        <div class="uk-form-controls">
                            <input class="uk-input mask-data" type="text" name="data_nascimento" required>
                        </div>
                    </div>
                </div>
                <div class="uk-column-1-2">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Sexo</label>
                        <div class="uk-form-controls">
                            <select name="sexo" class="uk-input" required>
                                <option value="feminino">feminino</option>
                                <option value="masculino">masculino</option>
                            </select>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">CEP</label>
                        <div class="uk-form-controls">
                            <input class="uk-input mask-cep" type="text" name="cep" id="cep">
                        </div>
                    </div>
                </div>
                <div class="uk-column-1-2">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Endereço</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" type="text" name="endereco" id="endereco">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Número</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" type="text" name="numero">
                        </div>
                    </div>
                </div>
                <div class="uk-column-1-2">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Complemento</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" type="text" name="complemento" id="complemento">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Bairro</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" type="text" name="bairro" id="bairro">
                        </div>
                    </div>
                </div>
                <div class="uk-column-1-2">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Estado</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" type="text" name="estado" id="estado">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Cidade</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" type="text" name="cidade" id="cidade">
                        </div>
                    </div>
                </div>
                <div class="align-right">
                    <input class="uk-button uk-button-primary" type="submit" value="Enviar">
                </div>
            </form>
        </div>
    </div>

    @if($errors->any())

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