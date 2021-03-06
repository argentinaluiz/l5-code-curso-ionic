@extends('admin')

@section('titleLeft')
	Cadastro de Categorias
@endsection

@section('titlePainel')
	Adicionar Nova Categoria
@endsection

@section('optionsPainel')
    <li>
        
    </li>
@endsection

@section('content')
    @if( $errors->any() )
        <ul class="alert">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="content">
        
        {!! Form::model($category,['route' => ['admin.category.update', $category->id], 'class' => 'form-horizontal form-label-left']) !!}

        @include('admin.category._form')

        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success">Atualizar</button>
            </div>
        </div>

        {!! Form::close() !!}

    </div>

@endsection