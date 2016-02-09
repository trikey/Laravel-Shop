<div class="modal signUpContent fade" id="ModalLogin" tabindex="-1" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                <h3 class="modal-title-site text-center"> Войти </h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" id="auth_errors" style="display: none;"></div>
                 {!! Form::open(['data-remote','url' => '', 'class'  => 'form_auth', 'name' => 'form_auth', 'target' => '_top']) !!}
                {{--<form name="form_auth" method="post" target="_top" action="" class="form_auth">--}}
                    <input type="hidden" name="AUTH_FORM" value="Y" />
                    <input type="hidden" name="TYPE" value="AUTH" />
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="form-group login-username">
                    <div>
                        <input name="USER_LOGIN" maxlength="255" value="" id="login-user" class="form-control input"
                               placeholder="Email" type="text" required>
                    </div>
                </div>
                <div class="form-group login-password">
                    <div>
                        <input name="USER_PASSWORD" maxlength="255" autocomplete="off" id="login-password" class="form-control input"
                               placeholder="Пароль" type="password" required>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <div class="checkbox login-remember">
                            <label>
                                <input name="rememberme" value="Y" checked="checked" type="checkbox">
                                Запомнить меня </label>
                            <input type="hidden" name="USER_REMEMBER" value="Y"/>
                        </div>
                    </div>
                </div>
                <div>
                    <div>
                        <input name="Login" class="btn  btn-block btn-lg btn-primary" value="Войти" type="submit">
                    </div>
                </div>
                 {!! Form::close() !!}


            </div>
            <div class="modal-footer">
                <p class="text-center"> Нет учетной записи? <a data-toggle="modal" data-dismiss="modal"
                                                            href="#ModalSignup"> Регистрация </a> <br>
                                                            {{--<a href="/auth/?forgot_password=yes"> Забыли пароль? </a>--}}
                    </p>
            </div>
        </div>

    </div>

</div>