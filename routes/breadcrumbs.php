<?php

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Домашняя страница', route('home'));
});

Breadcrumbs::for('players', function ($trail) {
    $trail->parent('home');
    $trail->push('Игроки', route('player.show-list'));
});

Breadcrumbs::for('player.create', function ($trail) {
    $trail->parent('players');
    $trail->push('Создание', route('player.create-form'));
});

Breadcrumbs::for('player', function ($trail, $player) {
    $trail->parent('players');
    $trail->push($player->nickname, route('player.show', $player));
});

Breadcrumbs::for('player.edit', function ($trail, $player) {
    $trail->parent('player', $player);
    $trail->push('Редактирование', route('player.edit-form', $player));
});


Breadcrumbs::for('days', function ($trail) {
    $trail->parent('home');
    $trail->push('Игровые дни', route('day.show-list'));
});

Breadcrumbs::for('day.create', function ($trail) {
    $trail->parent('days');
    $trail->push('Создание', route('day.create-form'));
});

Breadcrumbs::for('day', function ($trail, $day) {
    $trail->parent('days');
    $trail->push($day->day_date, route('day.show', $day));
});

Breadcrumbs::for('day.edit', function ($trail, $day) {
    $trail->parent('day', $day);
    $trail->push('Редактирование', route('day.edit-form', $day));
});


Breadcrumbs::for('games', function ($trail) {
    $trail->parent('home');
    $trail->push('Игры', route('game.show-list'));
});

Breadcrumbs::for('game.create', function ($trail) {
    $trail->parent('games');
    $trail->push('Создание', route('game.create-form'));
});

Breadcrumbs::for('game', function ($trail, $game) {
    $trail->parent('games');
    $trail->push('#'.$game->id, route('game.show', $game));
});

Breadcrumbs::for('game.edit', function ($trail, $game) {
    $trail->parent('game', $game);
    $trail->push('Редактирование', route('game.edit-form', $game));
});


Breadcrumbs::for('tournaments', function ($trail) {
    $trail->parent('home');
    $trail->push('Игры', route('tournament.show-list'));
});

Breadcrumbs::for('tournament.create', function ($trail) {
    $trail->parent('tournaments');
    $trail->push('Создание', route('tournament.create-form'));
});

Breadcrumbs::for('tournament', function ($trail, $tournament) {
    $trail->parent('tournaments');
    $trail->push('#'.$tournament->id, route('tournament.show', $tournament));
});

Breadcrumbs::for('tournament.edit', function ($trail, $tournament) {
    $trail->parent('tournament', $tournament);
    $trail->push('Редактирование', route('tournament.edit-form', $tournament));
});
