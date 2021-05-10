@foreach (session('flash_notification', collect())->toArray() as $message)
    <div class="cheapGoods" role="button" tabindex="0">
        @if($message['level'] == 'warning')
            <svg viewBox="0 0 26 24" class="icon">
                <defs>
                    <linearGradient id="icon_jsx_svg__a" x1="100%" x2="0%" y1="92.449%" y2="7.551%">
                        <stop offset="0%" stop-color="#FF7676"></stop>
                        <stop offset="100%" stop-color="#F5A54E"></stop>
                    </linearGradient>
                </defs>
                <path fill="url(#icon_jsx_svg__a)" d="M25.34 21.631a4.625 4.625 0 00.01-4.649L16.99 2.388a4.536 4.536 0 00-4-2.34 4.553 4.553 0 00-3.998 2.335L.62 16.993a4.662 4.662 0 00.016 4.676 4.562 4.562 0 003.988 2.309h16.7c1.67 0 3.17-.878 4.014-2.347z"></path><path fill="#FFF" d="M12.985 16.864c-.726 0-1.334.613-1.334 1.345s.608 1.345 1.334 1.345c.7 0 1.335-.613 1.303-1.313a1.309 1.309 0 00-1.303-1.377zm-.331-9.444c-.635.183-1.03.764-1.03 1.469.032.425.059.855.09 1.28l.273 4.827a.981.981 0 00.998.947c.545 0 .972-.425.999-.979 0-.334 0-.64.032-.98.058-1.038.123-2.076.181-3.115.032-.673.091-1.345.123-2.018 0-.242-.032-.457-.123-.673a1.335 1.335 0 00-1.543-.758z"></path>
            </svg>
        @endif
        <div class="message">
            {!! $message['message'] !!}
        </div>
    </div>
@endforeach
{{ session()->forget('flash_notification') }}