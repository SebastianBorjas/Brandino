@extends('layouts.app')
@section('title', 'Resultado de pago')
@section('content')
<div class="container mx-auto px-4 py-8">
    @if($success)
        <h1 class="text-3xl font-bold mb-4">Pago exitoso</h1>
        <p class="mb-4">Gracias por comprar {{ $course['title'] }}.</p>
    @else
        <h1 class="text-3xl font-bold mb-4 text-red-700">Pago fallido</h1>
        <p class="mb-4 text-red-600">{{ $message }}</p>
    @endif
    <a href="{{ url('/cursos') }}" class="text-blue-900 underline">Volver a cursos</a>
</div>
@endsection