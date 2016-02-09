@extends('baus')

@section('content')
<div class="bx_page">
	<p>В личном кабинете Вы можете проверить текущее состояние корзины, ход выполнения Ваших заказов, просмотреть или изменить личную информацию, а также подписаться на новости и другие информационные рассылки. </p>
	<div>
		<h2>Личная информация</h2>
		<a href="/personal/profile/">Изменить регистрационные данные</a><br>
		<a href="/personal/subscribe/">Подписка</a>
	</div>
    <br>
	<div>
		<h2>Заказы</h2>
		<a href="/personal/order/">Ознакомиться с состоянием заказов</a><br>
		<a href="/personal/cart/">Посмотреть содержимое корзины</a><br>
		<a href="/personal/order/?filter_history=Y">Посмотреть историю заказов</a><br>
	</div>
    <br>
</div>
@endsection