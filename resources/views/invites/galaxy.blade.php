@extends('layouts.invite-phone')

@section('before_styles')
    <link href="{{ url('invite-phone/css/style.min.css') . getPictureVersion() }}" rel="stylesheet">
@endsection

@section('content')
    <div class="app--wrapper">

        <div class="app--scroller-animation" x-show="!scrolledWindow" x-transition:leave="fadeOut" style="display: none;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 60"><defs><style>.scroll-down{fill:#fff;}</style></defs><path class="scroll-down" d="M10.49,14.26,19.39.92a.59.59,0,0,0-.5-.92H1.11a.59.59,0,0,0-.5.92l8.9,13.34A.59.59,0,0,0,10.49,14.26Z" style="opacity: 0.199992; transform: translateY(-8.00008px);"></path><path class="scroll-down" d="M10.49,29.26l8.9-13.34a.59.59,0,0,0-.5-.92H1.11a.59.59,0,0,0-.5.92l8.9,13.34A.59.59,0,0,0,10.49,29.26Z" style="opacity: 0; transform: translateY(-10px);"></path><path class="scroll-down" d="M10.49,44.26l8.9-13.34a.59.59,0,0,0-.5-.92H1.11a.59.59,0,0,0-.5.92l8.9,13.34A.59.59,0,0,0,10.49,44.26Z" style="opacity: 0; transform: translateY(-10px);"></path><path class="scroll-down" d="M10.49,59.26l8.9-13.34a.59.59,0,0,0-.5-.92H1.11a.59.59,0,0,0-.5.92l8.9,13.34A.59.59,0,0,0,10.49,59.26Z" style="opacity: 0; transform: translateY(-10px);"></path></svg>
        </div>

        <header>
            <div class="logo-badge"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 214.45 88.86"><defs><radialGradient id="coin-grad" cx="43.53" cy="29.82" r="68.67" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#ffeba7"></stop><stop offset="1" stop-color="#ffd647"></stop></radialGradient><style>.fp-logo-1{fill:#fcc505;}.fp-logo-2{fill:url(#coin-grad);}.fp-logo-3{fill:#5cab31;}</style></defs><g><g><circle class="fp-logo-1" cx="36.64" cy="44.18" r="36.64"></circle><circle class="fp-logo-2" cx="36.64" cy="44.18" r="31.79"></circle><path class="fp-logo-3" d="M38.18 41.47c-2.83 7.2-14.84 28.88-11.56 46.05 0 0-2.37 3.83-6-1.49S39 39.33 38.18 41.47z"></path><path class="fp-logo-3" d="M60.47 43.62c2.85 2.46 5.77 5.66 5.4 9.41a6.8 6.8 0 01-4.43 5.58 7.68 7.68 0 01-7.12-1.17 26.35 26.35 0 01-4.65 4.37 8.77 8.77 0 01-6 1.66c-3.39-.47-6-3.61-6.69-6.95s0-6.83 1-10.1c1.2-3.9 3.28-11.42 3.28-11.42a90.64 90.64 0 01-9.95 14c-2.46 2.85-5.66 5.77-9.41 5.4a6.83 6.83 0 01-5.58-4.4 7.69 7.69 0 011.18-7.12 26.41 26.41 0 01-4.38-4.65 8.88 8.88 0 01-1.66-6c.47-3.39 3.62-6 7-6.69s6.83 0 10.1 1c3.9 1.21 11.38 3.29 11.38 3.29a90.64 90.64 0 01-14-9.95c-2.85-2.46-5.77-5.66-5.41-9.4a6.86 6.86 0 014.37-5.56A7.67 7.67 0 0132 6.1a26.41 26.41 0 014.65-4.38 8.89 8.89 0 016-1.66c3.39.47 5.94 3.62 6.68 7s0 6.83-1 10.1c-1.21 3.9-3.3 11.38-3.3 11.38a91.32 91.32 0 0110-14c2.46-2.85 5.66-5.77 9.41-5.41A6.83 6.83 0 0170 13.5a7.67 7.67 0 01-1.17 7.11 26.35 26.35 0 014.37 4.65 8.79 8.79 0 011.66 6c-.47 3.39-3.61 5.94-7 6.68s-6.84 0-10.1-1a59.68 59.68 0 01-11.25-4.8s9.61 7.73 13.96 11.48z"></path><path class="fp-logo-1" d="M99.7 72.86H83.29v-.54h1l1.38-.19a1.63 1.63 0 001.06-.5 2.61 2.61 0 00.48-1.5l.07-1.54V52.65l-.07-1.55a2.52 2.52 0 00-.5-1.51 1.86 1.86 0 00-1.13-.54 11.17 11.17 0 00-1.31-.12h-1.06v-.54h15.71q5.48 0 7.28 1.21a7.28 7.28 0 012.5 2.61 6.57 6.57 0 01.71 3A9 9 0 01109 58a5.45 5.45 0 01-1.45 2.27 6.24 6.24 0 01-2.42 1.33 13.31 13.31 0 01-3.73.43h-3.53l-2.26.05v6.46l.07 1.54a2.6 2.6 0 00.49 1.5 1.81 1.81 0 001.12.52 12.32 12.32 0 001.45.12h1zm1.3-17.79a14.1 14.1 0 00-.5-3.73q-.5-1.81-1.5-2.1a8 8 0 00-2-.31h-1.41v12.56l1.41-.07a13.31 13.31 0 001.87-.25c.77-.14 1.33-.82 1.68-2a14.66 14.66 0 00.45-4.1zM122.16 60.62v7.87l.07 1.54a2.63 2.63 0 00.54 1.55 2.34 2.34 0 001.48.6l1.71.14v.54h-16.14v-.54h1.05l1.41-.19a1.63 1.63 0 001.06-.5 2.61 2.61 0 00.48-1.5l.07-1.54V52.65l-.07-1.55a2.52 2.52 0 00-.5-1.51 1.86 1.86 0 00-1.14-.54 11.73 11.73 0 00-1.28-.12h-1v-.54h15a38.44 38.44 0 015.08.27 7.64 7.64 0 013.18 1.08 6.31 6.31 0 011.95 2 5.25 5.25 0 01.72 2.77 6.9 6.9 0 01-.42 2.35 5.07 5.07 0 01-1.3 2 6 6 0 01-2.11 1.25 12.94 12.94 0 01-4.12.47v.24c1.14.25 2.1.48 2.87.71a7.22 7.22 0 012.1 1 5.84 5.84 0 011.7 1.91 12.79 12.79 0 011.23 2.76 10.79 10.79 0 00.84 2.13 1.16 1.16 0 001 .62c.58 0 1-.37 1.16-1.12a10.59 10.59 0 00.29-2.58h.54a13.06 13.06 0 01-.21 2.63 5.07 5.07 0 01-1 2 5.6 5.6 0 01-2.3 1.72 8.12 8.12 0 01-3.24.65 6 6 0 01-4.36-1.57 6.93 6.93 0 01-2-4.11l-.62-4.3c-.16-1.17-.57-2.06-1-2.27a3 3 0 00-1.31-.36zm2.69-.71a2.58 2.58 0 001.94-1.85 10 10 0 00.65-3.66 8.3 8.3 0 00-.67-3.25c-.45-1.06-1-1.68-1.61-1.86a7.92 7.92 0 00-1.69-.31l-1.31-.06V60h1.15a9.35 9.35 0 001.54-.09zM156.34 72.86H140.5v-.54h.64c.27 0 .71 0 1.33-.13a2 2 0 001.31-.56 2.61 2.61 0 00.49-1.48l.06-1.54v-16l-.06-1.54a2.78 2.78 0 00-.46-1.5 2.15 2.15 0 00-1.39-.55l-1.82-.14v-.54h15.74v.54l-1.82.1a2.17 2.17 0 00-1.39.49 2.72 2.72 0 00-.46 1.53l-.07 1.55v16.1l.07 1.55a1.77 1.77 0 001.92 2l1.75.1zM168.57 72.18l2.37-.05h2.47c1.61 0 3.45-1.22 5.5-3.66a35.64 35.64 0 004.82-7.23h.54v11.62h-25.79v-.37l16.44-23.34V49l-3.87.1c-1.7 0-3.57 1.16-5.59 3.47a34.17 34.17 0 00-4.86 7h-.54V48.34h25v.37L168.57 72zM199.73 72.18l2.9-.05a24.81 24.81 0 003.12-.23q1.65-.23 4.07-3.33a22.4 22.4 0 003.57-6.41h.54v10.7H187.5v-.54h1c.38 0 .82-.08 1.3-.14a1.7 1.7 0 001.11-.5 2.6 2.6 0 00.49-1.5l.06-1.54V52.65l-.06-1.55a2.59 2.59 0 00-.51-1.51 1.83 1.83 0 00-1.13-.54 11.17 11.17 0 00-1.31-.12h-1.06v-.54h25.86v10h-.54a22.71 22.71 0 00-4.16-6.39q-2.46-2.58-4.12-2.74a40.4 40.4 0 00-2.81-.2h-1.82l-.07 11 1.42-.06a3.72 3.72 0 002.94-1.84 7.26 7.26 0 001-3.85h.64V66.5h-.64a7.6 7.6 0 00-1-3.93 3.7 3.7 0 00-2.94-1.89l-1.42-.06zM88 38.59V16.81a4.1 4.1 0 00-.17-1.53 1.06 1.06 0 00-.57-.34 10.93 10.93 0 00-1.91-.34 27.18 27.18 0 00-3.12-.17v-.38h26.2v10.6h-.55a12.74 12.74 0 00-1.65-6.26q-2.19-4-6.21-4c-1.83 0-3.12 0-3.87.08a10.71 10.71 0 00-2.26.43l-.38.17a2.89 2.89 0 00-.3 1.71v10q4.52 0 5.61-.89c1.18-1 1.94-3.4 2.28-7.3h.51v16.7h-.51q0-5.73-1.94-7.17-1.23-.93-6-.93v11.4a4.49 4.49 0 00.17 1.57 1.22 1.22 0 00.6.36 8.86 8.86 0 002 .32c1 .08 2.29.13 4 .13v.42h-17.7V41c1.22 0 2.27 0 3.16-.13a8.09 8.09 0 001.83-.32 1.16 1.16 0 00.63-.47 4.06 4.06 0 00.15-1.49zM124.76 32.49a9 9 0 01-2.84 6.82 8.24 8.24 0 01-11.57.17 9.09 9.09 0 01-2.88-7 8.88 8.88 0 012.84-6.78 8.28 8.28 0 0111.57-.13 8.9 8.9 0 012.88 6.92zm-4.41 0a19 19 0 00-.8-6.61 3.43 3.43 0 00-3.44-2.21 3.35 3.35 0 00-3.26 2.12 17 17 0 00-1 6.7 19.22 19.22 0 00.87 6.78 3.32 3.32 0 003.37 2.12 3.35 3.35 0 003.27-2.16 17.4 17.4 0 00.99-6.74z"></path><path class="fp-logo-1" d="M128.76 26.1a2.11 2.11 0 00-.17-1.07 1.32 1.32 0 00-.55-.51 17.2 17.2 0 00-3.48-.21v-.39l8.18-.63v5.38a7 7 0 011.19-3.26 4.12 4.12 0 013.52-2.12 3.64 3.64 0 011.74.53 2.75 2.75 0 011.25 1.33 4.06 4.06 0 01.32 1.45 2.34 2.34 0 01-1.42 2.33 2.09 2.09 0 01-.9.17 2 2 0 01-1.45-.6 2.39 2.39 0 01-.6-1.78 2.48 2.48 0 01.61-1.52 1.27 1.27 0 011.34-.6c-.16-.59-.67-.89-1.51-.89s-1.64.6-2.45 1.79a10.14 10.14 0 00-1.61 5.92v7.93a3.11 3.11 0 00.13 1.11.88.88 0 00.38.25 14.16 14.16 0 003.69.3v.38h-12.41V41c.82 0 1.56 0 2.23-.09a6.63 6.63 0 001.71-.34c.17-.14.26-.55.26-1.24zM153.81 32.36v3.87a8.53 8.53 0 01-.67 4.07c-.63 1-1.83 1.52-3.61 1.52a5 5 0 01-3.73-1.23 4.86 4.86 0 01-1.14-3.59V25h-3.4v-.4a7.87 7.87 0 005.24-4 11.59 11.59 0 001.42-5.75h.72v9h4.87V25h-4.87v11.5a15.79 15.79 0 00.17 2.95 1.83 1.83 0 001.87 1.61 2.22 2.22 0 002.25-1.85 20.19 20.19 0 00.37-4.81v-2zM168.64 25.93a2.47 2.47 0 00-.23-1.3 1.11 1.11 0 00-.77-.41c-.35 0-1.5-.08-3.45-.08v-.38l8.44-.47V38.8a1.51 1.51 0 00.19.81l.25.42a8.86 8.86 0 003.22.3v.38l-7.67.68V36a7.54 7.54 0 01-1.27 3.22 4.5 4.5 0 01-3.22 2.11 2.92 2.92 0 01-.51 0h-.51a4.93 4.93 0 01-3.9-1.57 4.61 4.61 0 01-1.21-3.13V25.54a1.94 1.94 0 00-.19-1 .75.75 0 00-.57-.32h-3v-.38l7.72-.47v14a5.53 5.53 0 00.53 2.93 1.76 1.76 0 001.54.77c1.28 0 2.35-.77 3.23-2.3a10 10 0 001.31-5zM185.07 31v8.35a3.19 3.19 0 00.12 1.11.9.9 0 00.41.25 4.26 4.26 0 001.14.21 13.69 13.69 0 001.46.09v.38h-10.85V41c.62 0 1.24 0 1.84-.09a6.51 6.51 0 001.64-.34c.17-.14.25-.55.25-1.23v-12.9-.77a1 1 0 00-.19-.6l-.25-.42a8.93 8.93 0 00-3.23-.3V24l7.68-.68v5.38a8.26 8.26 0 011.1-3.21c.79-1.3 1.62-2 2.5-2.1s1.44-.14 1.7-.14a5.63 5.63 0 014.23 1.61 4.48 4.48 0 011.32 3.23v11.26a2.89 2.89 0 00.13 1.11.84.84 0 00.42.25 5 5 0 001.23.21 16.83 16.83 0 001.69.09v.38h-10.87V41c.45 0 1 0 1.57-.09a5.87 5.87 0 001.57-.34c.17-.14.25-.55.25-1.23V28.57a10.72 10.72 0 00-.34-3.11 2.09 2.09 0 00-2-1.75q-2 0-3.18 2.43a14.89 14.89 0 00-1.34 4.86zM203.47 32.66q0 4.56 1.08 6.6a3.52 3.52 0 003.29 2.05 6 6 0 004.16-1.58 6.62 6.62 0 002.16-5.21h.34a7.1 7.1 0 01-2 5.22 7.75 7.75 0 01-10.6-.13 8.62 8.62 0 01-2.84-6.61 10 10 0 012.72-7.25 7.28 7.28 0 015.34-2.42 6.69 6.69 0 014.58 1.61q2.67 2.37 2.67 7.76zm7.29-.51a20.53 20.53 0 00-.73-6.27c-.49-1.45-1.28-2.17-2.37-2.17a3.3 3.3 0 00-3.24 2.06 16.13 16.13 0 00-.95 6.38z"></path></g></g></svg></div>
        </header>

        <main>

            <figure class="phone--container">
                <div class="phone--badge animation__pulse">
                    <div class="spinner" x-ref="stockCheck" style="opacity: 0; display: none;"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                    <div class="result" x-ref="stockCheckResult" style="opacity: 1;">
                        <div class="checkmark">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 30"><defs><style>.checkmark-line{fill:none;stroke:#fff;stroke-linecap:round;stroke-linejoin:round;stroke-width:8px;}</style></defs><polyline class="checkmark-line" points="6 15.8 14.8 24.6 34 5" style="stroke-dashoffset: 0px;"></polyline></svg>
                        </div>
                        In stock
                    </div>
                </div>
                <div class="phone--picture phone--color__back-white" x-ref="phoneAnimate1" style="opacity: 1; transform: rotate(-10deg) translateX(-50%) translateY(-40px) scale(1);"></div>
                <div class="phone--picture phone--color__back-gray" x-ref="phoneAnimate2" style="opacity: 1; transform: rotate(-10deg) translateX(-30%) translateY(20px) scale(1);"></div>
                <div class="phone--picture phone--color__back-blue" x-ref="phoneAnimate3" style="opacity: 1; transform: rotate(-15deg) translateX(-45%) translateY(20px) scale(1);"></div>
                <div class="phone--picture phone--color__back-pink" x-ref="phoneAnimate4" style="opacity: 1; transform: translateX(0%) rotate(0deg) translateY(20px) scale(1);"></div>
                <div class="phone--badge-price">
                    <div>
                        Only
                    </div>
                    <div>
                        $2
                    </div>
                </div>
            </figure>

            <div class="phone--form-container">
                <h1>
                    Get a brand new <big>Galaxy&nbsp;S20</big>
                    <small>Choose your color and fill the form below</small>
                </h1>
                <nav class="phone--form-color">
                    <ul x-ref="chooseColorButtons" x-bind:class="{ 'disabledButtons': !introAnimationDone }" x-on:click.prevent="chooseColor(event, $refs.chooseColorButtons, $refs.phoneAnimate1, $refs.phoneAnimate2, $refs.phoneAnimate3, $refs.phoneAnimate4)" class="">
                        <li><a href="#pink">Pink</a></li>
                        <li><a href="#cloudwhite" class="phone--form-color-selected">Cloud White</a></li>
                        <li><a href="#spacegray">Space Gray</a></li>
                        <li><a href="#cloudblue">Cloud Blue</a></li>
                    </ul>
                </nav>
                <form method="post" action="{{ lurl(trans('routes.register')) }}" class="phone--form-form">
                    @csrf
                    <fieldset x-bind:disabled="!colorSelected">
                        <h2>
                            Please fill in your details
                        </h2>
                        <label for="useremail">Type in your email:</label>
                        <input type="email" name="email" id="useremail" placeholder="email@example.com" required="">
                        <label for="userpassword">Type in your password:</label>
                        <input type="password" name="password" id="userpassword" placeholder="Abcd1234" required="">
                        <input type="hidden" name="txid" value="" x-bind:value="txid">
                        <input type="hidden" name="affid" value="" x-bind:value="affid">
                        <input type="hidden" name="clickid" value="" x-bind:value="clickid">
                        <input type="hidden" name="source" value="" x-bind:value="source">
                        <input type="hidden" name="project" value="storefy.net/invite-galaxy">
                        <input type="hidden" name="lang" value="en">
                        <input type="hidden" name="invite" value="galaxy">
                        <button type="submit">
                            <div class="default-state">Submit</div>
                            <div class="submit-state">
                                <div>Loading</div>
                                <div class="buttonSpinner">Loading</div>
                            </div>
                        </button>
                    </fieldset>

                </form>
            </div>

        </main>

        <aside class="phone--features">

            <div class="divider">
            </div>

            <div class="flex-full">
                <img draggable="false" class="phone--feature-hero-image" src="img/allday.jpg" alt="">
            </div>

            <h1 class="flex-full">
                <small>Your all day long</small> companion
            </h1>

            <div class="phone--feature">
                <img draggable="false" class="phone--feature-image phone--feature-camera-app" src="img/s20-feature_01.jpg" alt="" style="transform: translateX(-150px); opacity: 0;">
                <div class="phone--feature-description" style="transform: translateX(150px); opacity: 0;">
                    <h2>
                        Amazing camera
                    </h2>
                    <ul>
                        <li>8K video support</li>
                        <li>Up to 16× more details</li>
                        <li>3× hybrid zoom</li>
                    </ul>
                </div>
            </div>

            <div class="phone--feature">
                <img draggable="false" style="order: 2; transform: translateX(150px); opacity: 0;" class="phone--feature-image phone--feature-video-app" src="img/s20-feature_02.jpg" alt="">
                <div class="phone--feature-description" style="transform: translateX(-150px); opacity: 0;">
                    <h2>
                        Huge memory for your moments
                    </h2>
                    <ul>
                        <li>Up to 512 GB internal storage</li>
                        <li>Up to 1 TB microSD card</li>
                    </ul>
                </div>

            </div>

            <div class="phone--feature">
                <img draggable="false" class="phone--feature-image phone--feature-a13-bionic-chip" src="img/s20-feature_03.jpg" alt="" style="transform: translateX(-150px); opacity: 0;">
                <div class="phone--feature-description" style="transform: translateX(150px); opacity: 0;">
                    <h2>
                        HDR10+ Infinity-O display
                    </h2>
                    <ul>
                        <li>Minimal borders</li>
                        <li>Dynamic AMOLED 2X</li>
                        <li>6,2" Quad HD+ 563ppi</li>
                    </ul>
                </div>
            </div>

            <div class="divider">
            </div>

        </aside>

        <aside class="phone--features full-width phone--photo-demo-wrapper">
            <div class="phone--photo-demo">
                <img draggable="false" src="img/galaxys20_photo-demo-1.jpg" alt="">
            </div>
            <div class="phone--photo-demo">
                <img draggable="false" src="img/galaxys20_photo-demo-2.jpg" alt="">
            </div>
            <div class="phone--photo-demo">
                <img draggable="false" src="img/galaxys20_photo-demo-3.jpg" alt="">
            </div>
        </aside>

        <footer>
            <div class="logo-badge"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 214.45 88.86"><defs><radialGradient id="coin-grad" cx="43.53" cy="29.82" r="68.67" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#ffeba7"></stop><stop offset="1" stop-color="#ffd647"></stop></radialGradient><style>.fp-logo-1{fill:#fcc505;}.fp-logo-2{fill:url(#coin-grad);}.fp-logo-3{fill:#5cab31;}</style></defs><g><g><circle class="fp-logo-1" cx="36.64" cy="44.18" r="36.64"></circle><circle class="fp-logo-2" cx="36.64" cy="44.18" r="31.79"></circle><path class="fp-logo-3" d="M38.18 41.47c-2.83 7.2-14.84 28.88-11.56 46.05 0 0-2.37 3.83-6-1.49S39 39.33 38.18 41.47z"></path><path class="fp-logo-3" d="M60.47 43.62c2.85 2.46 5.77 5.66 5.4 9.41a6.8 6.8 0 01-4.43 5.58 7.68 7.68 0 01-7.12-1.17 26.35 26.35 0 01-4.65 4.37 8.77 8.77 0 01-6 1.66c-3.39-.47-6-3.61-6.69-6.95s0-6.83 1-10.1c1.2-3.9 3.28-11.42 3.28-11.42a90.64 90.64 0 01-9.95 14c-2.46 2.85-5.66 5.77-9.41 5.4a6.83 6.83 0 01-5.58-4.4 7.69 7.69 0 011.18-7.12 26.41 26.41 0 01-4.38-4.65 8.88 8.88 0 01-1.66-6c.47-3.39 3.62-6 7-6.69s6.83 0 10.1 1c3.9 1.21 11.38 3.29 11.38 3.29a90.64 90.64 0 01-14-9.95c-2.85-2.46-5.77-5.66-5.41-9.4a6.86 6.86 0 014.37-5.56A7.67 7.67 0 0132 6.1a26.41 26.41 0 014.65-4.38 8.89 8.89 0 016-1.66c3.39.47 5.94 3.62 6.68 7s0 6.83-1 10.1c-1.21 3.9-3.3 11.38-3.3 11.38a91.32 91.32 0 0110-14c2.46-2.85 5.66-5.77 9.41-5.41A6.83 6.83 0 0170 13.5a7.67 7.67 0 01-1.17 7.11 26.35 26.35 0 014.37 4.65 8.79 8.79 0 011.66 6c-.47 3.39-3.61 5.94-7 6.68s-6.84 0-10.1-1a59.68 59.68 0 01-11.25-4.8s9.61 7.73 13.96 11.48z"></path><path class="fp-logo-1" d="M99.7 72.86H83.29v-.54h1l1.38-.19a1.63 1.63 0 001.06-.5 2.61 2.61 0 00.48-1.5l.07-1.54V52.65l-.07-1.55a2.52 2.52 0 00-.5-1.51 1.86 1.86 0 00-1.13-.54 11.17 11.17 0 00-1.31-.12h-1.06v-.54h15.71q5.48 0 7.28 1.21a7.28 7.28 0 012.5 2.61 6.57 6.57 0 01.71 3A9 9 0 01109 58a5.45 5.45 0 01-1.45 2.27 6.24 6.24 0 01-2.42 1.33 13.31 13.31 0 01-3.73.43h-3.53l-2.26.05v6.46l.07 1.54a2.6 2.6 0 00.49 1.5 1.81 1.81 0 001.12.52 12.32 12.32 0 001.45.12h1zm1.3-17.79a14.1 14.1 0 00-.5-3.73q-.5-1.81-1.5-2.1a8 8 0 00-2-.31h-1.41v12.56l1.41-.07a13.31 13.31 0 001.87-.25c.77-.14 1.33-.82 1.68-2a14.66 14.66 0 00.45-4.1zM122.16 60.62v7.87l.07 1.54a2.63 2.63 0 00.54 1.55 2.34 2.34 0 001.48.6l1.71.14v.54h-16.14v-.54h1.05l1.41-.19a1.63 1.63 0 001.06-.5 2.61 2.61 0 00.48-1.5l.07-1.54V52.65l-.07-1.55a2.52 2.52 0 00-.5-1.51 1.86 1.86 0 00-1.14-.54 11.73 11.73 0 00-1.28-.12h-1v-.54h15a38.44 38.44 0 015.08.27 7.64 7.64 0 013.18 1.08 6.31 6.31 0 011.95 2 5.25 5.25 0 01.72 2.77 6.9 6.9 0 01-.42 2.35 5.07 5.07 0 01-1.3 2 6 6 0 01-2.11 1.25 12.94 12.94 0 01-4.12.47v.24c1.14.25 2.1.48 2.87.71a7.22 7.22 0 012.1 1 5.84 5.84 0 011.7 1.91 12.79 12.79 0 011.23 2.76 10.79 10.79 0 00.84 2.13 1.16 1.16 0 001 .62c.58 0 1-.37 1.16-1.12a10.59 10.59 0 00.29-2.58h.54a13.06 13.06 0 01-.21 2.63 5.07 5.07 0 01-1 2 5.6 5.6 0 01-2.3 1.72 8.12 8.12 0 01-3.24.65 6 6 0 01-4.36-1.57 6.93 6.93 0 01-2-4.11l-.62-4.3c-.16-1.17-.57-2.06-1-2.27a3 3 0 00-1.31-.36zm2.69-.71a2.58 2.58 0 001.94-1.85 10 10 0 00.65-3.66 8.3 8.3 0 00-.67-3.25c-.45-1.06-1-1.68-1.61-1.86a7.92 7.92 0 00-1.69-.31l-1.31-.06V60h1.15a9.35 9.35 0 001.54-.09zM156.34 72.86H140.5v-.54h.64c.27 0 .71 0 1.33-.13a2 2 0 001.31-.56 2.61 2.61 0 00.49-1.48l.06-1.54v-16l-.06-1.54a2.78 2.78 0 00-.46-1.5 2.15 2.15 0 00-1.39-.55l-1.82-.14v-.54h15.74v.54l-1.82.1a2.17 2.17 0 00-1.39.49 2.72 2.72 0 00-.46 1.53l-.07 1.55v16.1l.07 1.55a1.77 1.77 0 001.92 2l1.75.1zM168.57 72.18l2.37-.05h2.47c1.61 0 3.45-1.22 5.5-3.66a35.64 35.64 0 004.82-7.23h.54v11.62h-25.79v-.37l16.44-23.34V49l-3.87.1c-1.7 0-3.57 1.16-5.59 3.47a34.17 34.17 0 00-4.86 7h-.54V48.34h25v.37L168.57 72zM199.73 72.18l2.9-.05a24.81 24.81 0 003.12-.23q1.65-.23 4.07-3.33a22.4 22.4 0 003.57-6.41h.54v10.7H187.5v-.54h1c.38 0 .82-.08 1.3-.14a1.7 1.7 0 001.11-.5 2.6 2.6 0 00.49-1.5l.06-1.54V52.65l-.06-1.55a2.59 2.59 0 00-.51-1.51 1.83 1.83 0 00-1.13-.54 11.17 11.17 0 00-1.31-.12h-1.06v-.54h25.86v10h-.54a22.71 22.71 0 00-4.16-6.39q-2.46-2.58-4.12-2.74a40.4 40.4 0 00-2.81-.2h-1.82l-.07 11 1.42-.06a3.72 3.72 0 002.94-1.84 7.26 7.26 0 001-3.85h.64V66.5h-.64a7.6 7.6 0 00-1-3.93 3.7 3.7 0 00-2.94-1.89l-1.42-.06zM88 38.59V16.81a4.1 4.1 0 00-.17-1.53 1.06 1.06 0 00-.57-.34 10.93 10.93 0 00-1.91-.34 27.18 27.18 0 00-3.12-.17v-.38h26.2v10.6h-.55a12.74 12.74 0 00-1.65-6.26q-2.19-4-6.21-4c-1.83 0-3.12 0-3.87.08a10.71 10.71 0 00-2.26.43l-.38.17a2.89 2.89 0 00-.3 1.71v10q4.52 0 5.61-.89c1.18-1 1.94-3.4 2.28-7.3h.51v16.7h-.51q0-5.73-1.94-7.17-1.23-.93-6-.93v11.4a4.49 4.49 0 00.17 1.57 1.22 1.22 0 00.6.36 8.86 8.86 0 002 .32c1 .08 2.29.13 4 .13v.42h-17.7V41c1.22 0 2.27 0 3.16-.13a8.09 8.09 0 001.83-.32 1.16 1.16 0 00.63-.47 4.06 4.06 0 00.15-1.49zM124.76 32.49a9 9 0 01-2.84 6.82 8.24 8.24 0 01-11.57.17 9.09 9.09 0 01-2.88-7 8.88 8.88 0 012.84-6.78 8.28 8.28 0 0111.57-.13 8.9 8.9 0 012.88 6.92zm-4.41 0a19 19 0 00-.8-6.61 3.43 3.43 0 00-3.44-2.21 3.35 3.35 0 00-3.26 2.12 17 17 0 00-1 6.7 19.22 19.22 0 00.87 6.78 3.32 3.32 0 003.37 2.12 3.35 3.35 0 003.27-2.16 17.4 17.4 0 00.99-6.74z"></path><path class="fp-logo-1" d="M128.76 26.1a2.11 2.11 0 00-.17-1.07 1.32 1.32 0 00-.55-.51 17.2 17.2 0 00-3.48-.21v-.39l8.18-.63v5.38a7 7 0 011.19-3.26 4.12 4.12 0 013.52-2.12 3.64 3.64 0 011.74.53 2.75 2.75 0 011.25 1.33 4.06 4.06 0 01.32 1.45 2.34 2.34 0 01-1.42 2.33 2.09 2.09 0 01-.9.17 2 2 0 01-1.45-.6 2.39 2.39 0 01-.6-1.78 2.48 2.48 0 01.61-1.52 1.27 1.27 0 011.34-.6c-.16-.59-.67-.89-1.51-.89s-1.64.6-2.45 1.79a10.14 10.14 0 00-1.61 5.92v7.93a3.11 3.11 0 00.13 1.11.88.88 0 00.38.25 14.16 14.16 0 003.69.3v.38h-12.41V41c.82 0 1.56 0 2.23-.09a6.63 6.63 0 001.71-.34c.17-.14.26-.55.26-1.24zM153.81 32.36v3.87a8.53 8.53 0 01-.67 4.07c-.63 1-1.83 1.52-3.61 1.52a5 5 0 01-3.73-1.23 4.86 4.86 0 01-1.14-3.59V25h-3.4v-.4a7.87 7.87 0 005.24-4 11.59 11.59 0 001.42-5.75h.72v9h4.87V25h-4.87v11.5a15.79 15.79 0 00.17 2.95 1.83 1.83 0 001.87 1.61 2.22 2.22 0 002.25-1.85 20.19 20.19 0 00.37-4.81v-2zM168.64 25.93a2.47 2.47 0 00-.23-1.3 1.11 1.11 0 00-.77-.41c-.35 0-1.5-.08-3.45-.08v-.38l8.44-.47V38.8a1.51 1.51 0 00.19.81l.25.42a8.86 8.86 0 003.22.3v.38l-7.67.68V36a7.54 7.54 0 01-1.27 3.22 4.5 4.5 0 01-3.22 2.11 2.92 2.92 0 01-.51 0h-.51a4.93 4.93 0 01-3.9-1.57 4.61 4.61 0 01-1.21-3.13V25.54a1.94 1.94 0 00-.19-1 .75.75 0 00-.57-.32h-3v-.38l7.72-.47v14a5.53 5.53 0 00.53 2.93 1.76 1.76 0 001.54.77c1.28 0 2.35-.77 3.23-2.3a10 10 0 001.31-5zM185.07 31v8.35a3.19 3.19 0 00.12 1.11.9.9 0 00.41.25 4.26 4.26 0 001.14.21 13.69 13.69 0 001.46.09v.38h-10.85V41c.62 0 1.24 0 1.84-.09a6.51 6.51 0 001.64-.34c.17-.14.25-.55.25-1.23v-12.9-.77a1 1 0 00-.19-.6l-.25-.42a8.93 8.93 0 00-3.23-.3V24l7.68-.68v5.38a8.26 8.26 0 011.1-3.21c.79-1.3 1.62-2 2.5-2.1s1.44-.14 1.7-.14a5.63 5.63 0 014.23 1.61 4.48 4.48 0 011.32 3.23v11.26a2.89 2.89 0 00.13 1.11.84.84 0 00.42.25 5 5 0 001.23.21 16.83 16.83 0 001.69.09v.38h-10.87V41c.45 0 1 0 1.57-.09a5.87 5.87 0 001.57-.34c.17-.14.25-.55.25-1.23V28.57a10.72 10.72 0 00-.34-3.11 2.09 2.09 0 00-2-1.75q-2 0-3.18 2.43a14.89 14.89 0 00-1.34 4.86zM203.47 32.66q0 4.56 1.08 6.6a3.52 3.52 0 003.29 2.05 6 6 0 004.16-1.58 6.62 6.62 0 002.16-5.21h.34a7.1 7.1 0 01-2 5.22 7.75 7.75 0 01-10.6-.13 8.62 8.62 0 01-2.84-6.61 10 10 0 012.72-7.25 7.28 7.28 0 015.34-2.42 6.69 6.69 0 014.58 1.61q2.67 2.37 2.67 7.76zm7.29-.51a20.53 20.53 0 00-.73-6.27c-.49-1.45-1.28-2.17-2.37-2.17a3.3 3.3 0 00-3.24 2.06 16.13 16.13 0 00-.95 6.38z"></path></g></g></svg></div>
            © <span x-text="footerYear">2020</span>
            <div class="footer--disclaimer-text">
                The information that you provide will be handled by brainwholesale, in accordance with the General Data Protection Regulation 2016/679 and other applicable privacy legislation for the accurate processing of personal data. By submitting a completed questionnaire, you agree that brainwholesale may use your email address to send information and promotions concerning third party products and services and also supply your contact information and questionnaire responses to companies so that they may use them to contact you by mail, phone or email to send offers and promote services based on your preferences.
                By responding to a question you expressly consent for that named organization or preferred supplier to contact you on the details provided until you opt out from the named organization or preferred supplier. brainwholesale is not affiliated with, sponsored by or endorsed by any of the listed products or retailers. Trademarks, service marks, logos (including, without limitation, the individual names of products and retailers) are the property of their respective owners. brainwholesale receives marketing fees from advertisers including financial institutions. You should always read their terms and conditions and/or product disclosure statements.
            </div>
        </footer>

    </div>
@endsection


@section('footer_scripts')
    <script src="{{ url('invite-phone/js/bundle.min.js?v=1.03') }}"></script>
    <!--Offer Conversion: storefy -->
    <!--Offer Conversion: storefy -->
    <script language="JavaScript" type="text/javascript">var afoffer_id = 2;var afsecure = "eac423b2bcfbf5bbe1ec7873cb0bda81";</script>
    <script language="JavaScript" type="text/javascript" src="https://onlinegrup.g2afse.com/track.js"></script>
    <!-- End Offer Conversion -->
    <!-- End Offer Conversion -->
@endsection

