@extends('template')
@section('content')
    <section class="login_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>New to our Shop?</h2>
                            <p>There are advances being made in science and technology
                                everyday, and a good example of this is the</p>
                            <a href="#" class="btn_3">Create an Account</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Регистрация на сайте</h3>
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="row contact_form" method="POST" action="{{ route('register') }}" novalidate="novalidate">
                                @csrf
                                <div class="col-md-12 form-group p_star">
                                    <input autofocus required type="text" class="form-control" name="name" placeholder="Имя">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input required type="email" class="form-control" name="email" placeholder="Адрес электронной почты">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input required type="password" class="form-control" name="password" placeholder="Пароль">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input required type="password" class="form-control"  name="password_confirmation" placeholder="Подтверждение пароля">
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="submit" class="btn_3" value="Зарегистрироваться">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
