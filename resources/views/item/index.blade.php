@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>商品一覧</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">商品一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th scope="col">@sortablelink('id', 'ID')</th>
                                <th scope="col">@sortablelink('name', '名前')</th>
                                <th scope="col">@sortablelink('type', '種別')</th>
                                <th scope="col">@sortablelink('price', '単価')</th>
                                <th scope="col">@sortablelink('quantity', '数量')</th>
                                <th>合計金額</th>
                                <th>詳細</th>

                            </tr>
                            
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->price * $item->quantity }}</td>
                                    <td>{{ $item->detail }}</td>
                                    <td> <a href="{{url('/items/edit/'.$items->id)}}" class="btn"><input type="button" value="編集"></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
