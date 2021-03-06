@extends('admin')

@section('titleLeft')
	Gerenciamento de Clientes
@endsection

@section('titlePainel')
	Listagem de Clientes
@endsection

@section('optionsPainel')
    <li>
        <a href="{{ route('admin.client.create') }}" data-toggle="tooltip"
           data-placement="right" title=""
           data-original-title="Adicionar Novo Cliente">
            <i class="fa fa-plus-circle fa-2x"></i>
        </a>
    </li>
@endsection

@section('content')

    <div class="content">
        <table class="table table-striped projects">
        	<thead>
        		<tr>
        			<th>Nome</th>
        			<th>E-mail</th>
        			<th>Tipo</th>
        			<th>Dt Criação</th>
        			<th>Dt Atualização</th>
        			<th>Ações</th>
        		</tr>
        	</thead>
        	<tbody>
        		@foreach($client as $clientes)
	    			<tr>
	        			<td>{{ $clientes->user->name }}</td>
	        			<td>{{ $clientes->user->email }}</td>
	        			<td>{{ $clientes->user->role }}</td>
	        			<td>{{ $clientes->created_at }}</td>
	        			<td>{{ $clientes->updated_at }}</td>
	        			<td>
                            <a href="{{ route('admin.client.edit',
                            				 ['client_id' => $clientes->id]) }}"
							   class="btn btn-info btn-xs"
                            	data-toggle="tooltip" 
                            	data-placement="top" title="" 
                            	data-original-title="Editar Cliente">
                            	<i class="fa fa-pencil"></i>  
                            </a>
                            <a href="{{ route('admin.client.destroy',
                            				 ['client_id' => $clientes->id]) }}"
							   class="btn btn-danger btn-xs"
                            	data-toggle="tooltip" 
                            	data-placement="top" title="" 
                            	data-original-title="Excluir Cliente">
                            	<i class="fa fa-trash-o"></i>  
                            </a>
                        </td>
	        		</tr>
	        		<tr>
					    <td colspan="6">
					    	<strong>Address:</strong> {{ $clientes->address }}<br>
					    	<strong>Phone:</strong> {{ $clientes->phone }}<br>
					    	<strong>City:</strong> {{ $clientes->city }}<br>
					    	<strong>State:</strong> {{ $clientes->state }}<br>
					    	<strong>Zipcode:</strong> {{ $clientes->zipcode }}
					    </td>
					</tr>
        		@endforeach
        	</tbody>
        </table>

		{!! $client->render() !!}
    </div>

@endsection