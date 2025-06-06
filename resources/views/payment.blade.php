@extends('layouts.app')
@section('title', 'Pagar curso')
@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4">Pagar {{ $course['title'] }}</h1>
    <form id="payment-form" action="{{ url('/procesar-pago') }}" method="POST">
        @csrf
        <input type="hidden" name="course_id" value="{{ $course['id'] }}">
        <div class="mb-4">
            <label class="block text-gray-700">Nombre</label>
            <input type="text" name="name" required class="w-full border rounded p-2">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email" required class="w-full border rounded p-2">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Tarjeta</label>
            <div id="card-element" class="border p-2 rounded"></div>
            <div id="card-errors" class="text-red-600 mt-2"></div>
        </div>
        <button id="submit-button" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">Pagar</button>
    </form>
</div>
<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{ config('services.stripe.key') }}');
    const elements = stripe.elements();
    const cardElement = elements.create('card');
    cardElement.mount('#card-element');

    const form = document.getElementById('payment-form');
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const {paymentMethod, error} = await stripe.createPaymentMethod({type: 'card', card: cardElement, billing_details: {name: form.name.value, email: form.email.value}});
        if (error) {
            document.getElementById('card-errors').textContent = error.message;
        } else {
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'payment_method';
            hiddenInput.value = paymentMethod.id;
            form.appendChild(hiddenInput);
            form.submit();
        }
    });
</script>
@endsection