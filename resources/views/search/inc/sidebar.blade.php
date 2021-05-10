<!-- this (.mobile-filter-sidebar) part will be position fixed in mobile version -->
<?php
$fullUrl = url(request()->getRequestUri());
$tmpExplode = explode('?', $fullUrl);
$fullUrlNoParams = current($tmpExplode);
?>

<div class="column___1WRbZ marginBottom___lo7lp md-4___1LoF3 lg-3___121hB">
    <div class="column___ev7rq enabled___72Ed0 stickyWithOverflow___3cJJ2 scrollDown___3KO2l" style="">
        <div class="inner___3Z5Lk">
            <div class="element___Zz7DL">
                <div class="">
                    <div class="catalog___2_XOH">
                        <div class="catalog___34Ldo">
                            @if (isset($cat))
                                @if (!in_array($cat->type, ['not-salable']))
                                    <span class="hoverable ">
                                        <a class="parent___2-M69" href="/en/search">
                                            <span class="prev___3iRP7">
                                                <span class="icon___2Lojm hoverable___3dQPJ ">
                                                </span>
                                            </span>
                                            {!! $cat->name !!}
                                        </a>
                                    </span>
                                    <?php $parentId = ($cat->parent_id == 0) ? $cat->tid : $cat->parent_id; ?>
                                    @if ($cats->groupBy('parent_id')->has($parentId))
                                        @foreach ($cats->groupBy('parent_id')->get($parentId) as $iSubCat)
                                            @continue(!$cats->has($iSubCat->parent_id))
                                            <a class="child___1z93E" href="{{ \App\Helpers\UrlGen::category($iSubCat, 1) }}" title="{{ $iSubCat->name }}">
                                                {{ \Illuminate\Support\Str::limit($iSubCat->name, 40) }}
                                            </a>
                                        @endforeach

                                    @endif
                                @endif
                            @endif
                            </div>
                    </div>
                    <div class="parent___1WV6Z trendingLinks___1yHBD">
                        <div class="header___3P5V4">Often searched</div>
                        <div class="content___3cvUn">
                            <div class="links___OrRtF"><a class="link___bHNLY" title="Haori"
                                                          href="/en/best/haori">Haori</a><a class="link___bHNLY"
                                                                                            title="Kimono robe"
                                                                                            href="/en/best/kimono-robe">Kimono
                                    robe</a><a class="link___bHNLY" title="Hot pants" href="/en/best/hot-pants">Hot
                                    pants</a><a class="link___bHNLY" title="Brassiere" href="/en/best/brassiere">Brassiere</a><a
                                        class="link___bHNLY" title="Micro skirt" href="/en/best/micro-skirt">Micro
                                    skirt</a><a class="link___bHNLY" title="Victorian clothing"
                                                href="/en/best/victorian-clothing">Victorian clothing</a><a
                                        class="link___bHNLY" title="Poncho" href="/en/best/poncho">Poncho</a><a
                                        class="link___bHNLY" title="Cool hoodies" href="/en/best/cool-hoodies">Cool
                                    hoodies</a><a class="link___bHNLY" title="Open cup bra"
                                                  href="/en/best/open-cup-bra">Open cup bra</a><a class="link___bHNLY"
                                                                                                  title="Fingerless gloves"
                                                                                                  href="/en/best/fingerless-gloves">Fingerless
                                    gloves</a><a class="link___bHNLY" title="Latex catsuit"
                                                 href="/en/best/latex-catsuit">Latex catsuit</a><a class="link___bHNLY"
                                                                                                   title="Scarf"
                                                                                                   href="/en/best/scarf">Scarf</a><a
                                        class="link___bHNLY" title="1920s dress" href="/en/best/1920s-dress">1920s
                                    dress</a><a class="link___bHNLY" title="Corset" href="/en/best/corset">Corset</a><a
                                        class="link___bHNLY" title="Victorian dresses"
                                        href="/en/best/victorian-dresses">Victorian dresses</a><a class="link___bHNLY"
                                                                                                  title="Chinese dress"
                                                                                                  href="/en/best/chinese-dress">Chinese
                                    dress</a><a class="link___bHNLY" title="Kimono"
                                                href="/en/best/kimono-13282">Kimono</a><a class="link___bHNLY"
                                                                                          title="Hair barrettes"
                                                                                          href="/en/best/hair-barrettes">Hair
                                    barrettes</a><a class="link___bHNLY" title="Yoga pants" href="/en/best/yoga-pants">Yoga
                                    pants</a><a class="link___bHNLY" title="Micro bikini"
                                                href="/en/best/micro-bikini-28877">Micro bikini</a></div>
                        </div>
                        <div class="footer___1GqXr"><span class="toggleLink___240KR" role="button" tabindex="0">Show more</span>
                        </div>
                    </div>
                </div>
                <div class="resizeTriggers___O7gyu">
                    <div>
                        <div style="width: 301px; height: 986px;"></div>
                    </div>
                    <div class="contractTrigger___2DSPP"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('after_scripts')
    @parent
    <script>
      var baseUrl = '{{ $fullUrlNoParams }}';

      $(document).ready(function () {
        $('input[type=radio][name=postedDate]').click(function () {
          var postedQueryString = $('#postedQueryString').val();

          if (postedQueryString != '') {
            postedQueryString = postedQueryString + '&';
          }
          postedQueryString = postedQueryString + 'postedDate=' + $(this).val();

          var searchUrl = baseUrl + '?' + postedQueryString;
          redirect(searchUrl);
        });
      });
    </script>
@endsection
