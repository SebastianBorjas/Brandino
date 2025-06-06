@extends('layouts.app')
@section('title', $course['title'])
@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4">{{ $course['title'] }}</h1>
    <p class="mb-4">{{ $course['description'] }}</p>
    <p class="font-bold mb-4">$ {{ number_format($course['price'], 2) }}</p>
    <a href="{{ url('/cursos/'.$course['id'].'/comprar') }}" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800 transition-colors">Comprar</a>
</div>
@endsection