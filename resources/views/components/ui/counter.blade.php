@props([
    'title' => 'Quantity',
    'inputName' => 'quantity',
    'itemname' => 'item',
    'price' => 0,
    'initialCount' => 0,
])

<div x-data="counter({
    initialCount: {{ $initialCount }},
    price: {{ $price }}
})" class="flex items-center space-x-4 ">
    <h3 class="text-sm text-gray-800 uppercase">{{ $title }}</h3>
    <div class="flex border border-gray-300 text-gray-600 divide-x divide-gray-300 w-max">
        <button @click="decrease()" class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none"
            :class="{ 'text-gray-300 cursor-not-allowed': count === 0, 'hover:text-primary': count > 0 }"
            :disabled="count === 0" aria-label="Decrease quantity">
            -
        </button>
        <div class="h-8 w-8 text-base flex items-center justify-center" x-text="count"></div>
        <button @click="increase()"
            class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none hover:text-primary"
            aria-label="Increase quantity">
            +
        </button>
        <input type="hidden" name="{{ $inputName }}" x-model="count">
        <input type="hidden" name="{{ $itemname }}" :value="getTotal()">
    </div>
    <p class="text-sm text-primary font-semibold" x-text="'৳' + getTotal().toFixed(2)"></p>
</div>
