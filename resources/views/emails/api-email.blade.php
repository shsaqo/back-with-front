@foreach ($request as $key => $req)
    <b>{{ $key }}: </b> <span>{{ $req }}</span><br>
@endforeach

