@if($products->count() > 0)
<section class="whiteList___seller_section item___jF3um Section-f5kaj4-0 eLOvpv">
    <div class="SectionIdenticalItems__Header-sc-1gm4lhi-0 ekqvZZ">
        <h2 class="SectionIdenticalItems__Title-sc-1gm4lhi-2 cbGCOH">
            {{ t('Offers from other sellers') }}
        </h2>
    </div>
    @foreach($products as $service => $product)
        @include('post.inc.services.default', ['picture' => 'default'])
    @endforeach
</section>
@endif

<style>
    .eLOvpv {
        background: #fff;
        border-radius: .25em;
        box-shadow: 0 .0625em .25em rgba(0,0,0,.15),0 -.0625em .0625em rgba(0,0,0,.05);
        font-size: 1rem;
        margin-bottom: .625em;
    }
    .ekqvZZ {
        -webkit-align-items: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        padding: .9em;
    }

    @media (max-width: 992px) {
        .ekqvZZ {
            padding:.75em;
        }
    }

    @media (max-width: 425px) {
        .ekqvZZ {
            -webkit-flex-wrap:wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }
    }

    .cbGCOH {
        font-size: 1.125em;
        font-weight: 700;
        line-height: 1.27em;
        margin-right: auto;
    }

    @media (max-width: 425px) {
        .cbGCOH {
            margin-bottom:.5em;
        }
    }

    .dEgpFx {
        padding: .6em .9em .9em;
        border-top: solid 1px rgba(0, 0, 0, 0.06);
    }

    @media (max-width: 992px) {
        .dEgpFx {
            padding:.75em;
        }
    }
    .jXfAJP {
        -webkit-align-items: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-flex-wrap: wrap;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        font-size: 1rem;
    }

    .jXfAJP:not(:last-of-type) {
        margin-bottom: 1em;
    }
    @media (max-width: 1320px) {
        .jXfAJP .Item__Col1-hg8vs9-1 {
            margin-right:0;
        }

        .jXfAJP .Item__Col2-hg8vs9-2 {
            margin: 0 0 .5em auto;
            width: calc(100% - 5.125em);
        }
    }

    @media (max-width: 850px) {
        .jXfAJP .Item__Col3-hg8vs9-3 {
            width: 100%;
            margin-right: auto;
        }
    }
    .kSwibS {
        margin-bottom: .5em;
        margin-right: 1em;
        width: 4.125em;
    }

    .JgZVc {
        -webkit-align-items: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        background-color: #fff;
        border-radius: .125em;
        box-shadow: 0 .0625em .25em rgba(0,0,0,.15),0 -.0625em .0625em rgba(0,0,0,.05);
        cursor: pointer;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        height: 4.125em;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        overflow: hidden;
        padding: .3125em;
        position: relative;
        width: 4.125em;
    }

    .JgZVc::before,.JgZVc::after {
        content: '';
        height: 100%;
        left: 0;
        position: absolute;
        top: 0;
        -webkit-transition: background-color .3s;
        transition: background-color .3s;
        width: 100%;
    }

    .JgZVc:hover::before {
        background-color: rgba(15,49,89,.15);
    }

    .JgZVc:active::before {
        background-color: rgba(15,49,89,.3);
    }

    .JgZVc:not(:first-of-type) {
        margin-left: .625em;
    }

    .JgZVc:last-of-type:not(:first-of-type)::before {
        background-color: rgba(0,0,0,.5);
    }

    .JgZVc:last-of-type:not(:first-of-type)::after {
        color: #fff;
        content: 'Все фото';
        font-weight: 500;
        line-height: 1.2em;
        padding-top: .85em;
        text-align: center;
    }

    .JgZVc img {
        object-fit: cover;
        height: 100%;
        width: 100%;
    }

    .hybNWy {
        margin-bottom: .5em;
        margin-right: 1em;
        width: 15em;
    }
    .khwBwc {
        color: #757575;
        font-size: .9375em;
        line-height: 1.2em;
        margin-bottom: .5em;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        max-width: 100%;
        display: inline-block;
        -webkit-text-decoration: blink;
        text-decoration: blink;
    }
    .iFVVSS {
        -webkit-align-items: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        font-size: 0.9rem;
        height: 1.5em;
        white-space: nowrap;
    }
    .dUIHcp {
        background: rgba(250,175,69,.1);
        border-radius: .75em;
        display: inline-block;
        font-weight: 700;
        height: 1.5em;
        line-height: 1.5em;
        margin-right: .5em;
        padding: 0 .35em;
    }

    .dUIHcp svg {
        height: auto;
        margin-left: .2em;
        width: .787em;
    }
    .gsRPZJ {
        font-weight: 500;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .cTtICr {
        margin-bottom: .5em;
        margin-right: 1em;
        width: 13em;
    }
    .iGuJeR {
        background: #fafbfc;
        font-size: 1rem;
        padding: .625em .875em;
        min-width: 211px;
    }
    .othkJ {
        color: #757575;
        font-size: .875em;
        line-height: 1.2em;
        margin-bottom: .65em;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .dIlsx {
        -webkit-align-items: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
    }

    .dIlsx svg {
        height: auto;
        width: 1.25em;
    }
    .diUnXJ {
        font-weight: 500;
        line-height: 1.2;
        margin-left: .45em;
    }
    .knaGeg {
        margin-bottom: .5em;
        width: 12em;
        text-align: center;
    }

    @media(max-width: 600px){
        .knaGeg {
            text-align: left;
        }
    }

    .gNwUja {
        font-size: 1.25em;
        font-weight: 700;
        line-height: 1.17em;
        margin-bottom: .4em;
    }
    .cElvzr {
        font-weight: 400;
        vertical-align: baseline;
    }
    .hlORuE {
        font-size: .75rem;
        line-height: 1.1875em;
    }

    .hlORuE svg {
        height: auto;
        margin-right: .55em;
        width: 1.5em;
    }
    .cBzCSw {
        vertical-align: top;
    }
    .RNOEi {
        /*margin-bottom: .5em;*/
        margin-left: auto;
        width: 7em;
    }
    .lnVyLn {
        -webkit-align-items: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        background: #fff;
        border: none;
        border-radius: .28em;
        box-shadow: 0 .12em .24em rgba(29,34,39,.1);
        color: #133f74;
        cursor: pointer;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        cursor: pointer;
        font-family: 'Roboto',sans-serif;
        font-size: .875rem;
        font-weight: 500;
        height: 2.43em;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        line-height: 2.43em;
        padding: 0 1em;
        -webkit-text-decoration: none;
        text-decoration: none;
        -webkit-transition-duration: .3s;
        transition-duration: .3s;
        -webkit-transition-property: background-color,border-color,box-shadow,color;
        transition-property: background-color,border-color,box-shadow,color;
        white-space: nowrap;
        background: #ebf4ff;
        box-shadow: none;
    }

    .lnVyLn:hover {
        box-shadow: 0 .11em .22em rgba(29,34,39,.1),0 .22em .44em rgba(29,34,39,.15);
    }

    .lnVyLn svg {
        margin-left: .8em;
        height: auto;
        -webkit-transition: fill .3s;
        transition: fill .3s;
        width: 1.4em;
    }

    .lnVyLn:hover {
        background: #c7e1ff;
        box-shadow: none;
    }

    .lnVyLn:active {
        background: #a9d1ff;
    }

    .whiteList___seller_section {
        font-family:Roboto, sans-serif;
        font-size:16px;
        font-stretch:100%;
        font-style:normal;
        font-variant-caps:normal;
        font-variant-east-asian:normal;
        font-variant-ligatures:normal;
        font-variant-numeric:normal;
        font-weight:400;
        margin-bottom: 16px;
    }

    .whiteList___seller_section {
        background: white none repeat scroll 0% 0%;
        border-radius: 0.25em;
        box-shadow: rgba(0, 0, 0, 0.15) 0px 0.0625em 0.25em, rgba(0, 0, 0, 0.05) 0px -0.0625em 0.0625em;
    }

</style>
