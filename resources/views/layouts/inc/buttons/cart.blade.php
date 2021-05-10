<div class="link button" onclick="javascript:location.href='/cart';">
    <div class="button__inner" role="button" tabindex="0">
        <div class="headerButtonIcon">
            <svg width="26" height="26" viewBox="-3 -3 26 26"><path d="M12.752 12.5H4.759a2.058 2.058 0 01-1.89-1.212l-2.202-5c-.448-1.015.036-2.191 1.08-2.626.255-.107.53-.162.81-.162h12.33l.344-1.45C15.446 1.143 16.277.5 17.234.5h1.238c.568 0 1.028.448 1.028 1s-.46 1-1.028 1h-1.238l-2.669 11.25c1.09.462 1.851 1.52 1.851 2.75 0 1.657-1.38 3-3.084 3-1.703 0-3.083-1.343-3.083-3 0-.35.062-.687.175-1H8.017c.114.313.176.65.176 1 0 1.657-1.38 3-3.084 3-1.703 0-3.084-1.343-3.084-3s1.381-3 3.084-3h7.406l.237-1zm-10.196-7l2.203 5h8.467l1.186-5H2.556zm2.553 12c.568 0 1.028-.448 1.028-1s-.46-1-1.028-1c-.568 0-1.028.448-1.028 1s.46 1 1.028 1zm8.223 0c.568 0 1.028-.448 1.028-1s-.46-1-1.028-1c-.567 0-1.027.448-1.027 1s.46 1 1.027 1z" fill="#3D3F56"></path></svg>
            <span class="indicator" id="cartCount" @if(!Cart::count())style="display:none;"@endif>
                {{ Cart::count() }}
            </span>
        </div>
        <a href="{{ lurl(route('show_cart')) }}" class="text">{{ t('Cart') }}</a>
    </div>
</div>
