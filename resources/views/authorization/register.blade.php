<div class="modal signUpContent fade" id="ModalSignup" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                <h3 class="modal-title-site text-center"> Регистрация </h3>
            </div>
            <div class="modal-body">


                <h5 class="text-center"> или </h5>
                <div class="alert alert-danger" id="register_errors" style="display: none;"></div>
                {!! Form::open(['data-remote','url' => '', 'class'  => 'form_register', 'name' => 'form_register']) !!}
                {{--<form name="form_register" method="post" action="" class="form_register">--}}
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="form-group reg-username">
                    <div>
                        <input name="name" class="form-control input" size="20" placeholder="Имя"
                               type="text" data-rule-required="true">
                    </div>
                </div>
                <div class="form-group reg-username">
                    <div>
                        <input name="last_name" class="form-control input" size="20" placeholder="Фамилия"
                               type="text" data-rule-required="true">
                    </div>
                </div>
                <div class="form-group reg-email">
                    <div>
                        <input name="login" class="form-control input" size="20" placeholder="Email" type="text" data-rule-required="true" data-rule-email="true">
                    </div>
                </div>
                <div class="form-group reg-password">
                    <div>
                        <input name="password" class="form-control input" size="20" placeholder="Пароль"
                               type="password"  data-rule-required="true">
                    </div>
                </div>
                <div>
                    <div>
                        <input name="submit" class="btn  btn-block btn-lg btn-primary" value="Зарегистрироваться" type="submit">
                    </div>
                </div>
                {!! Form::close() !!}

            </div>
            <div class="modal-footer">
                <p class="text-center"> Уже есть учетная запись? <a data-toggle="modal" data-dismiss="modal" href="#ModalLogin">
                        Войти </a></p>
            </div>
        </div>

    </div>

</div>