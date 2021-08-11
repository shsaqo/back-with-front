@extends('layouts.adminLayouts.admin-layout')

@section('admin-content')
<div class="col-7 mt-5 col-custom-padding">
    <form action="{{ route('code-script.update', $item) }}" method="post" >
        @csrf
        @method('put')
        <div class="card-body bg-white">
            <div class="form-group">
                <label for="name">Կոդի Անուն</label>
                <input value="{{ $item->name }}" name="name" type="text" class="form-control" id="name"
                        required>
            </div>
            <div class="form-group">
                <label for="code">Կոդ</label>
                <input value="{{ $item->code }}" name="code" type="text" class="form-control" id="code"
                       required>
            </div>

            <div class="form-group">
                <label for="type">Կոդի Տեսակ</label>
                <select id="type" name="type" class="form-control">
                    <option @if($item->type == 1) selected @endif value="1">Head</option>
                    <option @if($item->type == 2) selected @endif value="2">Body</option>
                </select>
            </div>
            
            <div class="row justify-content-end">
                <div class="col-2 text-right">
                <button type="submit" class="btn btn-primary w-100 d-flex text-center justify-content-center py-2 px-5">Ավելացնել</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
