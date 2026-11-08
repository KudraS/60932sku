@extends('layout')

@section('title', 'Добавление блюда')

@section('content')
    <h1 class="h3 mb-3">Добавление блюда</h1>

    <div class="card shadow-sm">
        <div class="card-body p-4">
            <form method="POST" action="{{ url('/dishes') }}" novalidate>
                @csrf
                @include('dishes.form', ['submitLabel' => 'Добавить блюдо'])
            </form>
        </div>
    </div>
@endsection
