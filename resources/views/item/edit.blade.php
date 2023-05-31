@extends('adminlte::page')

@section('title', '商品編集')

@section('content_header')
    <h1>商品編集</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-primary">
                <form method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">名前</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $items->name }}" placeholder="名前">
                        </div>

                        <div class="form-group">
                            <label for="type">種別</label>
                            <input type="number" class="form-control" id="type" name="type" value="{{ $items->type }}" placeholder="1, 2, 3, ...">
                        </div>

                        <div class="form-group">
                            <label for="price">単価</label>
                            <input type="number" class="form-control" id="price" name="price" value="{{ $items->price }}" placeholder="1, 2, 3, ...">
                        </div>

                        <div class="form-group">
                            <label for="quantity">数量</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $items->quantity }}" placeholder="1, 2, 3, ...">
                        </div>

                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <input type="text" class="form-control" id="detail" name="detail" placeholder="詳細説明">
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" id="edit">登録</button>
                    </form> 
                    <form action="{{url('/items/destroy/'.$items->id)}}" method="post" > 
                        @csrf   
                        <button type="submit" class="btn btn-danger" onclick='return confirm("本当に削除しますか？");' id="delete">削除</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
