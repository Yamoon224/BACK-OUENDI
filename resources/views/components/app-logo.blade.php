@props([
    'isRadius' => false,
    'width' => 50,
    'height' => 50,
])

<img 
    src="{{ asset('images/logo.png') }}"
    alt="LOGO"
    style="{{ $isRadius ? 'border-radius: 50%' : '' }}"
    width="{{ $width }}"
    height="{{ $height }}"
>
