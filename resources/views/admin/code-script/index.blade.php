@extends('layouts.adminLayouts.admin-layout')

@section('admin-content')

    @if (Session::has('ok'))
        <div class="alert alert-info">{{ Session::get('ok') }}</div>
    @endif
    <div class="col-7 col-custom-padding">
    <div class="product-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-10">@include('layouts.adminLayouts.nav-name', ['name' => 'Կոդ'])</div>
           <div class="col-md-2 text-right pr-0"> 
               <a href="{{ route('code-script.create') }}" type="submit"
           class="btn btn-primary w-100 d-flex text-center justify-content-center  py-2 px-5">Ավելացնել</a>
            </div>
        </div>
    </div>
</div>
    
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap code-table">
            <thead>
            <tr>
                <th>Կոդի Անուն</th>
                <th>Կոդ</th>
                <th>Տեսակ</th>
                <th>Գործողություն</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td class="item-code">{{ $item->code }}</td>
                    <td>{{ $item->type == 1 ? 'Head' : 'Body' }}</td>
                    <td>
                        <div class="row">
                            <a class="btn col-md-3" href="{{ route('code-script.edit', $item) }}"><img src="{{asset('images/icons/edit-icon.svg')}}" alt=""></a>
                            <form class="col-md-3" action="{{ route('code-script.destroy', $item) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn delete-custom-btn" value="Delete"><img src="{{asset('images/icons/trash-icon.svg')}}" alt=""></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection
