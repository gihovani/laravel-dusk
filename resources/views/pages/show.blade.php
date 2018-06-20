@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$result->title}}</div>

                <div class="card-body">
                    {{$result->body}}
                </div>
                <div class="card-footer">
                    <a href="/pages" id="btnCreate" class="btn btn-secondary">voltar</a>
                    <a href="/pages/{{$result->id}}/edit" id="btnCreate" class="btn btn-primary">alterar</a>
                    <form action="/pages/{{$result->id}}" method="post" class="d-inline-block">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" id="btnCreate" class="btn btn-danger">apagar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
