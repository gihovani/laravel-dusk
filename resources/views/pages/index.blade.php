@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Páginas</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Título</th>
                                <th class="text-right">+ detalhes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($result as $page)
                            <tr>
                                <td>{{$page->id}}</td>
                                <td>{{$page->title}}</td>
                                <td class="text-right">
                                    <a href="/pages/{{$page->id}}" class="btn btn-sm btn-primary" id="btnView{{$page->id}}">
                                        ver
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="/pages/create" id="btnCreate" class="btn btn-success">novo</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
