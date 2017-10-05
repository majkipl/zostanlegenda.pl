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
A</pre></h2>
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
                                <p>Każdego tygodnia, spośród wszystkich legendarnych pomysłów, wybieramy ten najciekawszy. Dla autorów wyróżnionych zgłoszeń przygotowaliśmy <span>najnowsze trymery Remington Durablade!</span> Jest o co walczyć!</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-5 col-sm-offset-1 col-md-6 col-md-offset-0 week-baner-image">
                <div class="c-table">
                    <div class="c-row">
                        <div class="c-cell">
                            <img src="{{ asset('images/week/week-bg-2.jpg') }}" alt="7x" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{--{assign var=week_count value=$week|@count}--}}

<section class="week" id="week">
    <div class="container week-items">
        <div class="row">
            @if( count($week) > 0 )
                <div class="col-xs-12 col-sm-6 col-lg-4 col-lg-offset-1 hidden-xs hidden-sm">
                    <div class="application last">
                        {if $week[0].fotoimg neq ''}
                        <div class="image i" style="background-image : url('{$smarty.const.CANONICAL_URL_HTTPS}{$smarty.const.CSS_UP_DIR}/tip/{$week[0].fotoimg}');"></div>
                        {/if}
                        {if $week[0].video_url}
                        {if $week[0].video_type eq 1}
                        <div class="image y" style="background-image : url('https://img.youtube.com/vi/{$week[0].video_image_id}/hqdefault.jpg');"></div>
                        {/if}
                        {if $week[0].video_type eq 2}
                        <div class="image v" style="background-image : url('https://i.vimeocdn.com/video/{$week[0].video_image_id}_640.jpg');"></div>
                        {/if}
                        {if $week[0].video_type eq 3}
                        <div class="image f" style="background-image : url('https://graph.facebook.com/{$week[0].video_image_id}/picture');"></div>
                        {/if}
                        {/if}
                        <a href="{$smarty.const.CANONICAL_URL_HTTPS}/zgloszenie/id,{$week[0].id}" title="{$week[0].title}">
                            <div class="c-table">
                                <div class="c-row">
                                    <div class="c-cell">{$week[0].firstname} {$week[0].lastname}</div>
                                </div>
                            </div>
                        </a>
                        <span>{$us->getDateWeek(0,$week_count)}</span>
                    </div>
                </div>
            @else
                <div class="col-xs-12 col-sm-6 col-lg-4 col-lg-offset-1 hidden-xs hidden-sm">
                    <div class="application last">
                        <div class="image i" style="background-image : url('{{ asset('images/week/ask.jpg') }}');"></div>
                        <span>{{ $dateWeek[0] }}</span>
                    </div>
                </div>
            @endif

            <div class="col-xs-12 col-md-6 col-lg-6">
                <div class="row">
{{--                    {foreach from=$week item=item_week name=name_week key=key_week}--}}
{{--                    {if $key_week neq 0}--}}
{{--                    <div class="col-xs-12 col-sm-6 col-lg-4">--}}
{{--                        {else}--}}
{{--                        <div class="col-xs-12 col-sm-6 col-lg-4 hidden-md hidden-lg">--}}
{{--                            {/if}--}}
{{--                            <div class="application application-xs">--}}
{{--                                {if $item_week.fotoimg neq ''}--}}
{{--                                <div class="image i" style="background-image : url('{$smarty.const.CANONICAL_URL_HTTPS}{$smarty.const.CSS_UP_DIR}/tip/{$item_week.fotoimg}');"></div>--}}
{{--                                {/if}--}}
{{--                                {if $item_week.video_url}--}}
{{--                                {if $item_week.video_type eq 1}--}}
{{--                                <div class="image y" style="background-image : url('https://img.youtube.com/vi/{$item_week.video_image_id}/hqdefault.jpg');"></div>--}}
{{--                                {/if}--}}
{{--                                {if $item_week.video_type eq 2}--}}
{{--                                <div class="image v" style="background-image : url('https://i.vimeocdn.com/video/{$item_week.video_image_id}_640.jpg');"></div>--}}
{{--                                {/if}--}}
{{--                                {if $item_week.video_type eq 3}--}}
{{--                                <div class="image f" style="background-image : url('https://graph.facebook.com/{$item_week.video_image_id}/picture');"></div>--}}
{{--                                {/if}--}}
{{--                                {/if}--}}
{{--                                <a href="{$smarty.const.CANONICAL_URL_HTTPS}/zgloszenie/id,{$item_week.id}" title="{$item_week.title}">--}}
{{--                                    <div class="c-table">--}}
{{--                                        <div class="c-row">--}}
{{--                                            <div class="c-cell">{$item_week.firstname} {$item_week.lastname}</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                                <span>{$us->getDateWeek($key_week,$week_count)}</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        {/foreach}--}}
                    </div>
                </div>
            </div>
        </div>
</section>
