<h1>Editar nome: {{ $apps->name }}</h1>
<form method="POST" action="{{ route('app.update', $apps->id) }}">
    @csrf()
    @method('PUT')
    <label>Nome</label><br>
    <input type="text" name="name" value="{{ $apps->name }}">  </input>
    <br>
    <label>Idade</label><br>
    <input type="text" placeholder="Escreva a idade" name="age" value="{{ $apps->age }}"></input>
    <br>
    <button id="submit"type="submit">Atualizar</b7utton>
        
</form>