@props([
    'isRadius' => false,
    'width' => 50,
    'height' => 50,
])

<img 
    src="{{ asset('images/logo.png') }}"
    alt="LOGO"
    class="{{ $isRadius ? 'rounded-full' : '' }}"
    width="{{ $width }}"
    height="{{ $height }}"
>
