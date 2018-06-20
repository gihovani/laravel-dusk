@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Nova Página</div>

                <div class="card-body">
                    <form action="/pages" class="form-horizontal" method="post">
                        <legend>Nova Página</legend>
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="col-sm-2" for="page-title">Título</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" id="page-title" placeholder="Título..." class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2" for="page-body">Conteúdo</label>
                            <div class="col-sm-10">
                                <textarea name="body" id="page-body" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success">Salvar</button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="card-footer">
                    <a href="/pages" id="btnCreate" class="btn btn-secondary">voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
