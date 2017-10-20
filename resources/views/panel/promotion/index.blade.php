@extends('layouts.panel')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <table
                    class="bt-table"
                    data-buttons-align="right"
                    data-filter-control="true"
                    data-locale="pl-PL"
                    data-pagination="true"
                    data-remember-order="true"
                    data-search="true"
                    data-search-align="left"
                    data-search-highlight="true"
                    data-searchable="true"
                    data-side-pagination="server"
                    data-show-columns="true"
                    data-show-columns-search="true"
                    data-show-columns-toggle-all="true"
                    data-show-export="true"
                    data-show-pagination-switch="true"
                    data-show-refresh="true"
                    data-show-search-clear-button="true"
                    data-show-toggle="true"
                    data-show-fullscreen="true"
                    data-sort-class="table-active"
                    data-sortable="true"
                    data-toggle="table"
                    data-url="{{ route('api.promotion') }}"
                    data-ajax="btAjax"
                >
                    <thead>
                    <tr>
                        <th
                            data-field="id"
                            data-sortable="true"
                            data-search-highlight-formatter="customSearchFormatter"
                            rowspan="2"
                            data-valign="middle"
                            data-filter-control="input"
                        >
                            ID
                        </th>
                        <th
                            data-field="firstname"
                            data-sortable="true"
                            data-search-highlight-formatter="customSearchFormatter"
                            rowspan="2"
                            data-valign="middle"
                            data-filter-control="input"
                        >
                            Imię
                        </th>
                        <th
                            data-field="lastname"
                            data-sortable="true"
                            data-search-highlight-formatter="customSearchFormatter"
                            rowspan="2"
                            data-valign="middle"
                            data-filter-control="input"
                        >
                            Nazwisko
                        </th>
                        <th
                            data-field="birthday"
                            data-sortable="true"
                            data-search-highlight-formatter="customSearchFormatter"
                            rowspan="2"
                            data-valign="middle"
                            data-filter-control="input"
                        >
                            Data urodzin
                        </th>
                        <th
                            data-field="email"
                            data-sortable="true"
                            data-search-highlight-formatter="customSearchFormatter"
                            rowspan="2"
                            data-valign="middle"
                            data-filter-control="input"
                        >
                            E-mail
                        </th>
                        <th
                            data-field="phone"
                            data-sortable="true"
                            data-search-highlight-formatter="customSearchFormatter"
                            rowspan="2"
                            data-visible="false"
                            data-valign="middle"
                            data-filter-control="input"
                        >
                            Telefon
                        </th>
                        <th
                            data-field="address"
                            data-sortable="true"
                            data-search-highlight-formatter="customSearchFormatter"
                            rowspan="2"
                            data-visible="false"
                            data-valign="middle"
                            data-filter-control="input"
                        >
                            Adres
                        </th>
                        <th
                            data-field="city"
                            data-sortable="true"
                            data-search-highlight-formatter="customSearchFormatter"
                            rowspan="2"
                            data-visible="false"
                            data-valign="middle"
                            data-filter-control="input"
                        >
                            Miasto
                        </th>
                        <th
                            data-field="zip"
                            data-sortable="true"
                            data-search-highlight-formatter="customSearchFormatter"
                            rowspan="2"
                            data-visible="false"
                            data-valign="middle"
                            data-filter-control="input"
                        >
                            Kod pocztowy
                        </th>
                        <th
                            data-field="img_receipt"
                            data-sortable="true"
                            data-search-highlight-formatter="customSearchFormatter"
                            rowspan="2"
                            data-visible="false"
                            data-valign="middle"
                            data-filter-control="input"
                        >
                            Zdjęcie paragonu
                        </th>
                        <th
                            data-field="receiptnb"
                            data-sortable="true"
                            data-search-highlight-formatter="customSearchFormatter"
                            rowspan="2"
                            data-visible="false"
                            data-valign="middle"
                            data-filter-control="input"
                        >
                            Nr paragonu
                        </th>
                        <th
                            data-field="img_ean"
                            data-sortable="true"
                            data-search-highlight-formatter="customSearchFormatter"
                            rowspan="2"
                            data-visible="false"
                            data-valign="middle"
                            data-filter-control="input"
                        >
                            Zdjęcie kodu EAN
                        </th>
                        <th
                            data-field="category.name"
                            data-sortable="true"
                            data-search-highlight-formatter="customSearchFormatter"
                            rowspan="2"
                            data-visible="false"
                            data-valign="middle"
                            data-filter-control="input"
                        >
                            Kategoria
                        </th>
                        <th
                            data-field="product.name"
                            data-sortable="true"
                            data-search-highlight-formatter="customSearchFormatter"
                            rowspan="2"
                            data-visible="false"
                            data-valign="middle"
                            data-filter-control="input"
                        >
                            Produkt
                        </th>
                        <th
                            data-field="shop.name"
                            data-sortable="true"
                            data-search-highlight-formatter="customSearchFormatter"
                            rowspan="2"
                            data-visible="false"
                            data-valign="middle"
                            data-filter-control="input"
                        >
                            Sklep
                        </th>
                        <th
                            data-field="whence.name"
                            data-sortable="true"
                            data-search-highlight-formatter="customSearchFormatter"
                            rowspan="2"
                            data-visible="false"
                            data-valign="middle"
                            data-filter-control="input"
                        >
                            Skąd wiesz o promocji
                        </th>
                        <th
                            data-field="created_at"
                            data-sortable="true"
                            data-search-highlight-formatter="customSearchFormatter"
                            rowspan="2"
                            data-valign="middle"
                            data-filter-control="input"
                            data-formatter="dateFormatter"
                        >
                            Dodano
                        </th>
                        <th
                            colspan="4"
                            class="text-center"
                            data-valign="middle"
                        >Zgody</th>

                        <th
                            data-field="actions"
                            class="text-center"
                            rowspan="2"
                            data-valign="middle"
                            data-searchable="false"
                            data-formatter="actionsFormatter"
                        ></th>
                    </tr>
                    <tr>
                        <th
                            data-field="legal_1"
                            data-sortable="true"
                            data-search-highlight-formatter="customSearchFormatter"
                            data-visible="false"
                            data-filter-control="select"
                            data-formatter="legalFormatter"
                        >
                            Legal 1?
                        </th>
                        <th
                            data-field="legal_2"
                            data-sortable="true"
                            data-search-highlight-formatter="customSearchFormatter"
                            data-visible="false"
                            data-filter-control="select"
                            data-formatter="legalFormatter"
                        >
                            Legal 2?
                        </th>
                        <th
                            data-field="legal_3"
                            data-sortable="true"
                            data-search-highlight-formatter="customSearchFormatter"
                            data-visible="false"
                            data-filter-control="select"
                            data-formatter="legalFormatter"
                        >
                            Legal 3?
                        </th>
                        <th
                            data-field="legal_4"
                            data-sortable="true"
                            data-search-highlight-formatter="customSearchFormatter"
                            data-visible="false"
                            data-filter-control="select"
                            data-formatter="legalFormatter"
                        >
                            Legal 4?
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

                @include('panel.common.btajax')

                <script>
                    window.customSearchFormatter = function (value, searchText) {
                        return value.toString().replace(new RegExp('(' + searchText + ')', 'gim'), '<span style="background-color: pink;border: 1px solid red;border-radius:90px;padding:4px">$1</span>')
                    }

                    window.dateFormatter = function (value, row) {
                        return moment(value).format("YYYY-MM-DD HH:mm:ss");
                    }

                    window.legalFormatter = function (value, row) {
                        return value ? 'TAK' : 'NIE';
                    }

                    window.actionsFormatter = function (value, row, index) {
                        const view_button = [
                            '<a href="{{ route('back.promotion') }}/' + row.id + '" title="Zobacz" class="show icon">',
                            '   <i class="bi bi-eye-fill"></i>',
                            '</a>'].join('');
                        return view_button ;
                    }
                    window.actionsEvents = {}
                </script>
            </div>
        </div>
    </div>
@endsection
