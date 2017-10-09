@extends('layouts.front')

@section('content')
    @include('promotion.sections.baner')

    <section class="formPromotion" id="form">
        <div class="container">
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-xs-12 col-lg-1">
                    <h2 class=" hidden-sm hidden-md hidden-lg">promocja</h2>
                    <h2 class="hidden-xs">
						<pre>P
R
O
M
O
C
J
A</pre>
                    </h2>
                </div>
                <div class="col-xs-12 col-lg-10">
                    {{--                <form id="save" method="POST" action="/formularz/promocja/" class="promotion">--}}
                    <form id="save" class="promotion" method="post" action="{{ route('front.form.promo.save') }}">
                        @csrf
                        <div class="row fieldset">
                            <div class="col-xs-12 text-center min-padding">
                                <h1>formularz zgłoszeniowy</h1>
                                <p class="p1">Wypełnij formularz, zarejestruj swój zakup i odbierz gwarantowany prezent
                                    <br/>– lekką i kompaktową <span>GOLARKĘ REMINGTON R95</span>. Miej ją zawsze pod ręką!
                                </p>
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
                            <div class="col-xs-12 col-md-6 min-padding birthday-col">
                                @component('components.forms.input.text', [
                                    'name' => 'birthday',
                                    'value' => '',
                                    'placeholder' => 'Data urodzenia [DD-MM-YYYY]',
                                    'required' => true,
                                    'max' => 10,
                                    'error' => ''])
                                @endcomponent
                            </div>
                            <div class="col-xs-12 col-md-6 min-padding">
                                @component('components.forms.input.text', [
                                    'name' => 'address',
                                    'value' => '',
                                    'placeholder' => 'Adres do wysyłki prezentu',
                                    'required' => true,
                                    'max' => 255,
                                    'error' => ''])
                                @endcomponent
                            </div>
{{--                            <div class="clearfix"></div>--}}
                        </div>

                        <div class="row fieldset">
                            <div class="col-xs-12 col-sm-6 min-padding">
                                @component('components.forms.input.text', [
                                    'name' => 'city',
                                    'value' => '',
                                    'placeholder' => 'Miejscowość',
                                    'required' => true,
                                    'max' => 64,
                                    'error' => ''])
                                @endcomponent
                            </div>
                            <div class="col-xs-12 col-sm-6 min-padding">
                                @component('components.forms.input.text', [
                                    'name' => 'zip',
                                    'value' => '',
                                    'placeholder' => 'Kod pocztowy',
                                    'required' => true,
                                    'max' => 6,
                                    'error' => ''])
                                @endcomponent
                            </div>
                            <div class="clearfix"></div>
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
                            <div class="col-xs-12 col-sm-6 min-padding">
                                @component('components.forms.input.text', [
                                    'name' => 'phone',
                                    'value' => '',
                                    'placeholder' => 'Nr telefonu',
                                    'required' => true,
                                    'max' => 32,
                                    'error' => ''])
                                @endcomponent
                            </div>
                        </div>

                        <div class="row fieldset">
                            <div class="col-xs-12 col-sm-6 min-padding">
                                @component('components.forms.input.text', [
                                    'name' => 'receiptnb',
                                    'value' => '',
                                    'placeholder' => 'Nr dowodu zakupu',
                                    'required' => true,
                                    'max' => 32,
                                    'error' => ''])
                                @endcomponent
                            </div>
                            <div class="col-xs-12 col-sm-6 min-padding">
                                @component('components.forms.select', [
                                    'name' => 'category',
                                    'value' => '',
                                    'placeholder' => 'Kategoria',
                                    'required' => true,
                                    'error' => '',
                                    'items' => $categories])
                                @endcomponent
                            </div>
                        </div>

                        <div class="row fieldset">
                            <div class="col-xs-12 col-sm-6 min-padding">
                                @component('components.forms.select', [
                                    'name' => 'product',
                                    'value' => '',
                                    'placeholder' => 'Produkt',
                                    'required' => true,
                                    'error' => '',
                                    'items' => $products])
                                @endcomponent
                            </div>
                            <div class="col-xs-12 col-sm-6 min-padding">
                                @component('components.forms.select', [
                                    'name' => 'shop',
                                    'value' => '',
                                    'placeholder' => 'Sklep',
                                    'required' => true,
                                    'error' => '',
                                    'items' => $shops])
                                @endcomponent
                            </div>
                            <div class="clearfix"></div>
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
                            <div class="clearfix"></div>
                        </div>

                        <div class="row fieldset">
                            <div class="col-xs-12 col-sm-6 min-padding">
                                @component('components.forms.input.file', [
                                    'name' => 'img_receipt',
                                    'required' => true,
                                    'error' => ''])
                                    Wgraj zdjęcie paragonu
                                @endcomponent
                            </div>
                            <div class="col-xs-12 col-sm-6 min-padding">
                                @component('components.forms.input.file', [
                                    'name' => 'img_ean',
                                    'required' => true,
                                    'error' => ''
                                ])
                                    Wgraj zdjęcie kodu EAN wyciętego z opakowania produktu
                                @endcomponent
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row fieldset">
                            <div class="col-xs-12 col-lg-12 min-padding">
                                <p>PAMIĘTAJ! Kod EAN musi być fizycznie wycięty lub oderwany od opakowania produktu. Jest to
                                    warunek konieczny do odebrania gratisu</p>
                            </div>
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

