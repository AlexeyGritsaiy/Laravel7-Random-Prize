@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
{{--                    <div class="card-header">{{ __('Dashboard') }}</div>--}}
                        <h3>Личный кабинет</h3>
                    <h1><?php echo $getPrizeName['name'];?></h1>
                    <a href="/deliveryForm"> Перейти к форме для запонения данных для отправки</a>
{{--                    <a href="/approve">получить</a>--}}
{{--                    <h2>Вы можете отказаться от подарка <a href="/refuse"> отказаться</a></h2>--}}
                    </div>
                <div class="card">
                <h1>Баланс - бонусосов : <?php echo $bonusBalans ?> </h1> <h2>Вы можете обменять балы <a href="/updateBalans"> вывод в баланс</a></h2><br>
                </div>
                    <div class="card">
                <h1>Баланс : <?php echo $balans ?>  UAH</h1><br>
                        <h3>вывести деньги на банковский<a href="/withdrawalOfMoney"> счет</a></h3>
                    </div>
            </div>
            </div>
        </div>
    </div>
@endsection
