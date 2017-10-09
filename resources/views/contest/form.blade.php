@extends('layouts.front')

@section('content')
    @include('contest.sections.baner')

    <section class="formContest" id="form">
        <div class="container">
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-xs-12 col-lg-1">
                    <h2 class=" hidden-sm hidden-md hidden-lg">konkurs</h2>
                    <h2 class="hidden-xs">
						<pre>K
O
N
K
U
R
S</pre>
                    </h2>
                </div>
                <div class="col-xs-12 col-lg-10">
                    <form id="save" method="POST" action="{{ route('front.form.contest.save') }}" class="contest">
                        @csrf
                        <div class="row fieldset">
                            <div class="col-xs-12 text-center min-padding">
                                <h1>formularz zgłoszeniowy</h1>
                                <p class="p1">Masz pomysł, jak zostać legendą? Weź udział w konkursie i podziel się nim
                                    z nami! Zrób zdjęcie lub nagraj film, wykaż się kreatywnością i przekonaj Jury, że
                                    to właśnie Ty powinieneś wygrać. Czeka na Ciebie nagroda główna <br/>– <span>10 000 zł na realizację Twojego legendarnego pomysłu!</span>
                                </p>
                                <p class="p1">Dodatkowo przygotowaliśmy
                                    <span>7 nagród tygodnia – trymerów Durablade</span>, którymi co środę wyróżnimy
                                    najciekawsze zgłoszenia.</p>
                                <p class="p1">Może któraś z tych wspaniałych nagród trafi do Ciebie? </p>
                            </div>
                        </div>

                        <div class="row fieldset">
                            <div class="col-xs-12 col-sm-6 min-padding">
                                @component('components.forms.input.text', [
                                    'name' => 'firstname',
                                    'value' => '',
                                    'placeholder' => 'Imię',
                                    'required' => true,
                                    'max' => 128,
                                    'error' => ''])
                                @endcomponent
                            </div>
                            <div class="col-xs-12 col-sm-6 min-padding">
                                @component('components.forms.input.text', [
                                    'name' => 'lastname',
                                    'value' => '',
                                    'placeholder' => 'Nazwisko',
                                    'required' => true,
                                    'max' => 128,
                                    'error' => ''])
                                @endcomponent
                            </div>
                        </div>
                        <div class="row fieldset">
                            <div class="col-xs-12 col-sm-6 min-padding">
                                @component('components.forms.input.email', [
                                    'name' => 'email',
                                    'value' => '',
                                    'placeholder' => 'Adres e-mail',
                                    'required' => true,
                                    'max' => 255,
                                    'error' => ''])
                                @endcomponent
                            </div>
                            <div
                                class="col-xs-12 col-md-6 min-padding birthday-col">
                                @component('components.forms.input.text', [
                                   'name' => 'birthday',
                                   'value' => '',
                                   'placeholder' => 'Data urodzenia [DD-MM-YYYY]',
                                   'required' => true,
                                   'max' => 10,
                                   'error' => ''])
                                @endcomponent
                            </div>
                        </div>

                        <div class="row fieldset">
                            <div class="col-xs-12 col-sm-12 min-padding">
                                @component('components.forms.select', [
                                    'name' => 'whence',
                                    'value' => '',
                                    'placeholder' => 'Skąd dowiedziałeś się o promocji?',
                                    'required' => true,
                                    'error' => '',
                                    'items' => $whences])
                                @endcomponent
                            </div>
                        </div>

                        <div class="row fieldset">
                            <div class="col-xs-12 min-padding">
                                @component('components.forms.input.text', [
                                    'name' => 'title',
                                    'value' => '',
                                    'placeholder' => 'Tytuł zgłoszenia',
                                    'required' => true,
                                    'max' => 128,
                                    'error' => ''])
                                @endcomponent
                            </div>

                            <div class="col-xs-12 col-sm-6 min-padding">
                                @component('components.forms.textarea', [
                                    'name' => 'message',
                                    'value' => '',
                                    'placeholder' => 'Opisz krótko, co zrobisz by stać się legendą (maksymalnie 500 znaków)',
                                    'required' => true,
                                    'max' => 500,
                                    'error' => ''])
                                @endcomponent
                            </div>
                            <div class="col-xs-12 col-sm-6 min-padding">
                                @component('components.forms.input.file', [
                                    'name' => 'img_tip',
                                    'required' => true,
                                    'error' => ''])
                                    Dodaj zdjęcie
                                @endcomponent
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-xs-12 min-padding">
                            @component('components.forms.input.text', [
                                 'name' => 'video_url',
                                 'value' => '',
                                 'placeholder' => 'Wklej link do filmu (Vimeo lub YouTube)',
                                 'required' => true,
                                 'max' => 255,
                                 'error' => ''])
                            @endcomponent
                        </div>
                        <div class="col-xs-12 min-padding">
                            <p class="p3">Twoje zgłoszenie może zawierać tekst ze zdjęciem lub tekst z video. Wybór jest
                                Twój!</p>
                        </div>

                        <div class="row fieldset">
                            <div class="col-xs-12 col-lg-12 min-padding">
                                @component('components.forms.input.checkbox', [
                                    'name' => 'legal_1',
                                    'required' => true,
                                    'error' => ''
                                ])
                                    Akceptuję regulamin
                                @endcomponent
                            </div>
                            <div class="col-xs-12 col-lg-12 min-padding">
                                @component('components.forms.input.checkbox', [
                                    'name' => 'legal_2',
                                    'required' => true,
                                    'error' => ''
                                ])
                                    Wyrażam zgodę na przetwarzanie moich danych osobowych
                                    w celach marketingowych i handlowych przez Spectrum Brands Poland Sp. z o.o. z siedzibą w
                                    Warszawie, ul. Bitwy Warszawskiej 1920r 7a, 02-366 Warszawa Loyal Concept Sp. z o.o. z siedzibą w
                                    Warszawie przy ul. Tużyckiej 8 lok. 6, 03-683 Warszawa, oraz Highlite z siedzibą we Wrocławiu, ul.
                                    Pomorska 55/2, 50-217 Wrocław zgodnie z ustawą z dnia 29 sierpnia 1997 o ochronie danych osobowych (Dz.
                                    U. z 2002r. nr 101, poz. 926 z późn. zm.)
                                @endcomponent
                            </div>
                            <div class="col-xs-12 col-lg-12 min-padding">
                                @component('components.forms.input.checkbox', [
                                    'name' => 'legal_3',
                                    'required' => true,
                                    'error' => ''
                                ])
                                    Wyrażam zgodę na otrzymywanie od Spectrum Brands
                                    Poland Sp. z o.o. z siedzibą w Warszawie, ul. Bitwy Warszawskiej 1920r 7a, 02-366 Warszawa, w formie
                                    e-maila informacji handlowej w rozumieniu ustawy z dnia 18 lipca 2002 r. o świadczeniu usług
                                    drogą elektroniczną (Dz. U. z 2002r. nr 144, 1204 z późn. zm.)
                                @endcomponent
                            </div>
                            <div class="col-xs-12 col-lg-12 min-padding">
                                @component('components.forms.input.checkbox', [
                                    'name' => 'legal_4',
                                    'required' => true,
                                    'error' => ''
                                ])
                                    Przyjmuje do wiadomości, że podanie danych osobowych
                                    jest dobrowolne, lecz konieczne dla uczestniczenia w promocji oraz że przysługuje mi prawo
                                    dostępu do treści moich danych oraz ich poprawiania
                                @endcomponent
                            </div>
                        </div>

                        <div class="row fieldset">
                            <div class="col-xs-12 text-center">
                                <a href="#" class="cta-button submit">
                                    <span>WYŚLIJ ZGŁOSZENIE</span>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
@endsection

