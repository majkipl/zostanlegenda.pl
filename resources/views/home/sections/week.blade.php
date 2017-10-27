<section class="baner-week" id="baner-week">
    <div class="container week-baner">
        <div class="row">
            <div class="col-xs-12 col-sm-1 col-md-1 week-baner-header">
                <div class="c-table">
                    <div class="c-row">
                        <div class="c-cell">
                            <h2 class="hidden-xs">
								<pre>Z T
G Y
Ł G
O O
S D
Z N
E I
N A
I
A</pre>
                            </h2>
                            <h2 class="hidden-sm hidden-md hidden-lg">zgłoszenia tygodnia</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-5 col-md-4 week-baner-text">
                <div class="c-table">
                    <div class="c-row">
                        <div class="c-cell">
                            <span class="rabbits">7X</span>
                            {{-- KROK 1 - ZAKOŃCZENIE KONKURSU --}}
                            @if($isEndContest)
                                <p>Dziękujemy wszystkim za zgłoszenia, a laureatom gratulujemy!</p>
                            @else
                                <p>Każdego tygodnia, spośród wszystkich legendarnych pomysłów, wybieramy ten
                                    najciekawszy. Dla autorów wyróżnionych zgłoszeń przygotowaliśmy <span>najnowsze trymery Remington Durablade!</span>
                                    Jest o co walczyć!</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-5 col-sm-offset-1 col-md-6 col-md-offset-0 week-baner-image">
                <div class="c-table">
                    <div class="c-row">
                        <div class="c-cell">
                            <img src="{{ asset('images/week/week-bg-2.jpg') }}" alt="7x"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="week" id="week">
    <div class="container week-items">
        <div class="row">
            @if( count($week) > 0 )

                @foreach($week as $item)

                        <div class="col-12 col-sm-6 col-lg-4 hidden-xs hidden-sm week-small">
                            <div class="application last">
                                @if( $item->img_tip )
                                    <div class="image i"
                                         style="background-image : url('{{ asset('storage/' . $item->img_tip) }}');"></div>
                                @endif

                                @if( $item->video_url )
                                    @if( $item->video_type == 'youtube')
                                        <div class="image y"
                                             style="background-image : url('{{ $item->video_image_id }}');"></div>
                                    @endif
                                    @if( $item->video_type == 'vimeo')
                                        <div class="image v"
                                             style="background-image : url('{{ $item->video_image_id }}');"></div>
                                    @endif
                                    @if( $item->video_type == 'facebook')
                                        <div class="image f"
                                             style="background-image : url('{{ $item->video_image_id }}');"></div>
                                    @endif
                                @endif

                                <a href="{{ route('front.application.id', ['contest' => $item->id]) }}"
                                   title="{{ $item->title }}">
                                    <div class="c-table">
                                        <div class="c-row">
                                            <div
                                                class="c-cell">{{ $item->firstname }} {{ $item->lastname }}</div>
                                        </div>
                                    </div>
                                </a>
                                <span>{{ $dateWeek[$loop->index] }}</span>
                            </div>
                        </div>

                @endforeach

            @else
                <div class="col-xs-12 col-sm-6 col-lg-4 col-lg-offset-1 hidden-xs hidden-sm">
                    <div class="application last">
                        <div class="image i"
                             style="background-image : url('{{ asset('images/week/ask.jpg') }}');"></div>
                        <span>{{ $dateWeek[0] }}</span>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
