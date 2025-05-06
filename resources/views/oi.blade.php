<h1> Nomes </h1>
<x-alert/>
<form method="POST" action="{{ route('app.store') }}">
    @csrf()
    <label>Nome</label><br>
    <input type="text" placeholder="Escreva o nome" name="name" value="{{ old('name') }}"></input>
    <br>
    <label>Data de Nascimento</label><br>
    <input type="date" placeholder="Escreva a idade" name="birthdate" value="{{ old('birthdate') }}"></input>
    <br>
    <input id="submit"type="submit"></input>
</form>

<form method="GET" action="{{ route('app.index') }}">
    <label>Filtro nome</label><br>
    <input type="text" name="name" value="{{ request('name') }}">
    <br>
    <label>Filtro idade</label><br>
    <input type="text" name="age" value="{{ request('age') }}">
    <br>
    <button id="submit" type="submit">Buscar</button>
</form>

<table style="border:solid 1px">
    <thead>
            <tr > 
                <th style="border:solid 1px"> Nomes </th>
                <th style="border:solid 1px">Idade</th>
                <th style="border:solid 1px">Açoes</th>
            </tr>
        </thead>

        <tbody>
            @isset($apps)
            @foreach ($apps as $app)
            
            <tr>
                <td style="border:solid 1px">{{ $app->name }}</td>
                <td style="border:solid 1px">{{ $app->age_format }}</td>
                <td style="border:solid 1px">
                   <form action="{{ route('app.delete', $app->id) }}" method="post" > 
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="margin:2px;"> Excluir </button>
                   </form>
                        <a href="{{ route('app.edit', $app->id) }}">
                            <button> Atualizar </button>
                        </a>
                </td>
               
            </tr>
            
            @endforeach
            
            @endisset
    
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $apps->appends(request()->query())->links() }}
</div>
<style>
    #submit{
        margin:5px;
    }
    .pagination {
        display:flex;
        list-style-type: none;
        text-decoration: none;
    }
    .pagination .page-item .page-link {
        padding:5px;
        text-decoration: none; /* Remove o estilo padrão de link */
    }


</style>
