@extends('app')
@section('title', 'Домашняя страница')

@section('content')

<h2>Система учёта игр в `Мафию`.</h2>
<p>
    Эта штука может вести учёт следующих данных:
    <ul class="list-group col-md-4">
        <li class="list-group-item"><a href="{{ route('day.show-list') }}">Игровые дни</a></li>
        <li class="list-group-item"><a href="{{ route('player.show-list') }}">Игроки</a></li>
        <li class="list-group-item">Турниры</li>
        <li class="list-group-item"><a href="{{ route('game.show-list') }}">Игры</a></li>
        <li class="list-group-item">Голосования</li>
        <li class="list-group-item">Ночи</li>
    </ul>
</p>

<h3>Игры</h3>
<p>
    Для игр можно хранить следующие данные: <span class="text-info">Игровой день, Ведущий, Лучшие красный и чёрный игроки, Результат, Заметки</span>.
    Игра может быть привязана к одному или нескольким турнирам. Голосования, игроки и ночи каждой игры имеют уникальный (или почти) номер внутри этой игры.
    Все игры привязаны к одному из игровых дней.
</p>

<h3>Голосования</h3>
<p>
    К каждому голосованию привязаны <span class="text-info">игроки, выставленные на это голосование и голоса, сделанные во время голосования</span>.
    Голоса разделяются на два типа: <span class="text-info">Первый голос и Голос после аварии</span>.
    Для каждого голоса хранятся <span class="text-info">голосовавший игрок и игрок, против которого голос</span>.
</p>

<h3>Ночи</h3>
<p>
    Для каждой ночи хранятся данные о том кого проверили дон и шериф и Кого убила мафия.
</p>

<h3>Игроки</h3>
<p>
    Система имеет две модели игроков: <span class="text-info">Глобальный игрок и Участник игры</span>.

    <h4>Глобальный игрок</h4>
    <p>
        По сути, это Учётная запись человека, которых играет в мафию. В этой модели хранятся: <span class="text-info">Имя, Ник и Год рождения</span>.
    </p>

    <h4>Участник игры</h4>
    <p>
        Эта модель привязывается к конкретной игре и глобальному игроку как многие к одному.
        Внутри игры используется именно эта модель. Также, к такому игроку может быть привязан второй глобальный игрок как помошник.
        Эта модель содержит в себе: <span class="text-info">Игру, Глобального игрока, Помошника, Внутриигровой номер, Роль, Кол-во фолов, Был ли игрок удалён и Счёт</span>.
    </p>
</p>

@endsection
