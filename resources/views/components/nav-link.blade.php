{{-- From Attributes to Props  --}}
@props(['active' => false])

<a {{ $attributes }} class="hover:text-gray-300 {{ $active ? 'underline' : 'no-underline' }}" aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>