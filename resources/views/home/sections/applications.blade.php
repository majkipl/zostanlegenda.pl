<section class="applications" id="applications">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-1">
                <h2 class="hidden-xs">
					<pre>Z
G
Ł
O
S
Z
E
N
I
A</pre></h2>
                <h2 class="hidden-sm hidden-md hidden-lg">zgłoszenia</h2>
            </div>
            <div class="col-xs-12 col-sm-10">
                <div class="row">

                    <div class="col-xs-12 col-sm-7">
                        {{-- KROK 1 - ZAKOŃCZENIE KONKURSU--}}
                        @if($isEndContest)
                            <p>Dziękujemy wszystkim za zgłoszenia!</p>
                        @else
                            <p>Weź sprawy w swoje ręce! <span>Jaki jest Twój sposób na zostanie legendą?</span> Dołącz do naszego konkursu,  przekonaj nas, że to właśnie Twój legendarny pomysł zasługuje na realizację i poczuj smak zwycięstwa!</p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-5 search">
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" name="find" id="find" value="" placeholder="imię i nazwisko / tytuł pracy" autocomplete="off" />
                                <a href="#" class="submit"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 list">
                        <div class="row items"></div>
                    </div>

                    <div class="col-xs-12 text-center">
                        <a href="#" id="getMoreItem" class="cta-button">POKAŻ WIĘCEJ</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
