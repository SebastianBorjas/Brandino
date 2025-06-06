@extends('layouts.app')
@section('title', 'Cursos')
@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Cursos disponibles</h1>
    <div class="grid md:grid-cols-2 gap-6">
        @foreach($courses as $course)
            <div class="bg-white shadow p-6 rounded-lg">
                <h2 class="text-xl font-semibold mb-2">{{ $course['title'] }}</h2>
                <p class="mb-4">{{ $course['description'] }}</p>
                <p class="font-bold mb-4">$ {{ number_format($course['price'], 2) }}</p>
                <a href="{{ url('/cursos/'.$course['id']) }}" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800 transition-colors">Ver detalles</a>
            </div>
        @endforeach
    </div>
</div>
@endsection