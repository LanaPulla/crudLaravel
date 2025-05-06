@if ($errors->any())
    <div id="error" role="alert">
        @foreach($errors->all() as $error)
            <p style="background: rgb(207, 62, 62); width:10%; padding: 5px">{{ $error }}</p>
        @endforeach
    </div>
@endif
