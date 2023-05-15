@extends('template')
@section('content')
    <div class="container">
        <div class="col-sm-8 mx-auto">
            <h3 class="text-center">Добавление товара</h3>
            <form class="contact_form" action="/addItem" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <p>Название товара: </p>
                    <input name="name" type="text" placeholder="Название товара" class="form-control">
                </div>
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <p>Изображение товара: </p>
                        <input name="img" type="file" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <p>Цена: </p>
                        <input name="cost" type="number" placeholder="Цена" class="form-control">
                    </div>
                </div>
                <div class="mb-3">
                    <textarea name="description" class="form-control" placeholder="Описание товара"></textarea>
                </div>
                <div class="mb-3 form-group">
                    <input type="submit" class="form-control btn btn-primary" value="Добавить товар">
                </div>
            </form>
        </div>
    </div>
@endsection
