@php
            function getDates($startTime, $endTime) {
                $day = 86400;
                $format = 'd M';
                $startTime = strtotime($startTime);
                $endTime = strtotime($endTime);
                //$numDays = round(($endTime - $startTime) / $day) + 1;
                $numDays = round(($endTime - $startTime) / $day); // без +1

                $days = array();

                for ($i = 1; $i < $numDays; $i++) {
                    $days[] = date($format, ($startTime + ($i * $day)));
                }

                return $days;
            }

            $date = new DateTime('-2 weeks');
            $m = $date->format('d.m.Y');

            $days = getDates($m, date('d.m.Y'));
            $price = (float)$bestSellerProduct->price;
            $fake_oldprice = round($price - (($price / 100) * 100 - ceil($post->id * 3.14 / 100) ), 2) + $price;

            $prices = [];

            for($i = 0; $i < count($days); $i++){
                switch ($i) {
                    case 0:
                        $prices[] = $fake_oldprice;
                        break;
                    case 1:
                        $prices[] = $fake_oldprice - 1;
                        break;
                    case 2:
                        $prices[] = $fake_oldprice - 2;
                        break;
                    case 3:
                        $prices[] = $fake_oldprice - 5;
                        break;
                    case 4:
                        $prices[] = $fake_oldprice - 4;
                        break;
                    case 5:
                        $prices[] = $fake_oldprice + 2;
                        break;
                    case 6:
                        $prices[] = $fake_oldprice - 15;
                        break;
                    case 7:
                        $prices[] = $fake_oldprice - 1.7;
                        break;
                    case 8:
                        $prices[] = $fake_oldprice + 1;
                        break;
                    case 9:
                        $prices[] = $price + 2;
                        break;
                    case 10:
                        $prices[] = $price + 3;
                        break;
                    default:
                        $prices[] = $price;
                }
            }
@endphp
<script>
    document.addEventListener('DOMContentLoaded',function(){
        var ctx = document.getElementById('product-card-chart').getContext('2d');
        // ctx.canvas.width = 300;
        ctx.canvas.height = 60;
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',
            // The data for our dataset
            data: {
                labels: {!! json_encode($days) !!},
                datasets: [{
                    label: '',
                    borderColor: 'rgb(1, 119, 228)',
                    data: {!! json_encode($prices) !!},
                    fill: false,
                }]
            },

            // Configuration options go here
            options: {
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false
                        },
                        display: false
                    }],
                    yAxes: [{
                        id: 'share_price',
                        type: 'linear',
                        position: "right",
                        gridLines: {
                            display: false,
                            drawBorder: false,
                        },
                    }]
                },
                legend: {
                    display: false
                },
                layout: {
                    padding: {
                        left: 15,
                        right: 15,
                        top: 15,
                        bottom: 15
                    }
                }
            }
        });
    });
</script>

<div class="column___1WRbZ marginBottom___lo7lp md-6___1lvJ4 product-card-right">
    <div class="column___ev7rq enabled___72Ed0 stickyWithOverflow___3cJJ2 scrollDown___3KO2l" style="min-height: auto;top: 0;position: -webkit-sticky;position: sticky;">
        <div class="inner___3Z5Lk">
            <div class="element___Zz7DL">
                <div class="right___1nJYh">
                    <div class="only_desktop product_price_container">
                        @include('post.inc.seller-best-price')
                    </div>
                    <div class="whiteList___1-H1l item___jF3um product-card-chart">
                        <div class="SectionPriceHistory__Header-rnxutl-1 kYXLem">
                            <h2 class="SectionPriceHistory__Title-rnxutl-3 dLSACT">{{ trans('global.Price lower by price - cheaper than the average', ['price' => currency($fake_oldprice - $bestSellerProduct->price)]) }}</h2>
                            <span class="Badge-sc-1pi3log-0 SectionPriceHistory__StyledBadge-rnxutl-2 dKKvaS">{{ ceil($post->id * 3.14 / 100) }}%</span>
                            @if(\Illuminate\Support\Facades\Auth::user())
                                <button rel="noreferrer noopener" class="make-favorite Button-sc-1c0nofd-0 SectionPriceHistory__TrackButton-rnxutl-4 gEzaAL" id="{{$post->id}}">
                                    {{ t('Price Alert') }}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="#FF4E15" class="IconBell__Svg-rba900-0 cowUzP">
                                        <g fill-rule="evenodd">
                                            <path stroke="#c9c9c9" stroke-width=".1" d="M13 25c6.627 0 12-5.373 12-12S19.627 1 13 1 1 6.373 1 13s5.373 12 12 12z"></path>
                                            <path fill="#fff" d="M14 8.12c1.907.453 3 2.167 3 4.213v3.333L18.333 17v.667H7.667V17L9 15.667v-3.333c0-2.053 1.087-3.76 3-4.213v-.453a1 1 0 1 1 2 0v.453zm-.733 11.52a1.17 1.17 0 0 1-.267.027c-.74 0-1.333-.6-1.34-1.333h2.667c0 .187-.033.36-.1.52-.173.4-.527.693-.96.787z"></path>
                                        </g>
                                    </svg>
                                </button>

                            @else
                                <a href="{{ lurl('register') }}" rel="noreferrer noopener" class="Button-sc-1c0nofd-0 SectionPriceHistory__TrackButton-rnxutl-4 gEzaAL" id="{{$post->id}}">
                                    {{ t('Price Alert') }}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="#FF4E15" class="IconBell__Svg-rba900-0 cowUzP">
                                        <g fill-rule="evenodd">
                                            <path stroke="#c9c9c9" stroke-width=".1" d="M13 25c6.627 0 12-5.373 12-12S19.627 1 13 1 1 6.373 1 13s5.373 12 12 12z"></path>
                                            <path fill="#fff" d="M14 8.12c1.907.453 3 2.167 3 4.213v3.333L18.333 17v.667H7.667V17L9 15.667v-3.333c0-2.053 1.087-3.76 3-4.213v-.453a1 1 0 1 1 2 0v.453zm-.733 11.52a1.17 1.17 0 0 1-.267.027c-.74 0-1.333-.6-1.34-1.333h2.667c0 .187-.033.36-.1.52-.173.4-.527.693-.96.787z"></path>
                                        </g>
                                    </svg>
                                </a>

                            @endif
                        </div>
                        <canvas id="product-card-chart"></canvas>
                    </div>
                    @include('post.inc.offer-list')
                    @if(!empty($featured->posts))
                        <div class="whiteList___1-H1l item___jF3um product-card-similar">
                            @include('home.inc.latest', ['posts' => $featured->posts, 'block_title' => t('Similar products')])
                        </div>
                    @endif
                </div>
            </div>
            <div class="resizeTriggers___O7gyu">
                <div>
                    <div style="width: 618px; height: 1364px;"></div>
                </div>
                <div class="contractTrigger___2DSPP"></div>
            </div>
        </div>
    </div>
</div>

@include('post.inc.popup')