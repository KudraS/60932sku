@extends('layout')

@section('title', 'Редактирование блюда')

@section('content')
    <h1 class="h3 mb-3">Редактирование блюда</h1>

    <div class="card shadow-sm">
        <div class="card-body p-4">
            <form method="POST" action="{{ url('/dishes/' . $dish->id) }}" novalidate>
                @csrf
                @method('PUT')
                @include('dishes.form', ['submitLabel' => 'Сохранить изменения'])
            </form>
        </div>
    </div>
@endsection
