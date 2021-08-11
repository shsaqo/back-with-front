@extends('layouts.adminLayouts.admin-layout')

@section('admin-content')

@if (Session::has('ok'))
<div class="alert alert-info">{{ Session::get('ok') }}</div>
@endif
@if($errors->any())
@foreach ($errors->all() as $error)
<div style="color: red" class="error">{{ $error }}</div>
@endforeach
@endif
<div class="col-7 col-custom-padding">
    <div class="product-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-10">@include('layouts.adminLayouts.nav-name', ['name' => 'Կարգավիճակ'])</div>
            </div>
        </div>
    </div>

    <div class="card-body table-responsive p-0">
        <table class="table text-nowrap code-table">
            <thead>
                <tr>
                    <th>Կարգավիճակ</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <form id="statusBtn" action="{{ route('home.status') }}" method="post">
                            @csrf
                           <div class="row">
                                <div class="col-2">
                                    <label class="custom_radio" for="passive">
                                        <input @cannot('homeEdit') disabled @endcannot @if(!isset($item) || isset($item) && $item->status == 0) checked @endif name="status" type="radio" value="0" id="passive" class="statusBtn">
                                        <span class="checkmark"></span>
                                        Պասիվ
                                    </label>
                                </div>
                                <div class="col-2">
                                    <label class="custom_radio" for="active">
                                        <input @cannot('homeEdit') disabled @endcannot @if(isset($item) && $item->status) checked @endif name="status" type="radio" value="1" class="statusBtn">
                                        <span class="checkmark"></span>
                                        Ակտիվ
                                    </label>
                                </div>
                           </div>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
