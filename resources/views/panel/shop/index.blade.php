@extends('layouts.panel')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <table
                    class="bt-table"
                    data-buttons="buttons"
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
                    data-url="{{ route('api.shop') }}"
                    data-ajax="btAjax"
                >
                    <thead>
                    <tr>
                        <th
                            data-field="id"
                            data-sortable="true"
                            data-search-highlight-formatter="customSearchFormatter"
                            data-valign="middle"
                            data-filter-control="input"
                        >
                            ID
                        </th>
                        <th
                            data-field="name"
                            data-sortable="true"
                            data-search-highlight-formatter="customSearchFormatter"
                            data-valign="middle"
                            data-filter-control="input"
                        >
                            Nazwa
                        </th>
                        <th
                            data-field="actions"
                            class="text-center"
                            data-valign="middle"
                            data-searchable="false"
                            data-formatter="actionsFormatter"
                            data-events="actionsEvents"
                        ></th>
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
                            '<a href="{{ route('back.shop') }}/' + row.id + '" title="Zobacz" class="show icon">',
                            '   <i class="bi bi-eye-fill"></i>',
                            '</a>',
                            '<a href="{{ route('back.shop') }}/zmien/' + row.id + '" title="Zmień" class="edit icon">',
                            '   <i class="bi bi-pencil-square"></i>',
                            '</a>',
                            '<a href="{{ route('api.shop') }}" title="Usuń" class="remove icon" data-id="' + row.id + '">',
                            '   <i class="bi bi-trash"></i>',
                            '</a>'].join('');
                        return view_button;
                    }
                    window.actionsEvents = {
                        'click .modify': function (e, value, row, index) {
                            console.log(e);
                            console.log(value);
                            console.log(row);
                            console.log(index);
                        },
                    }

                    function buttons() {
                        return {
                            btnAdd: {
                                text: "Dodaj nowy",
                                icon: "bi-plus-square",
                                event: function () {
                                    window.location.href = '{{ route('back.shop.create') }}';
                                },
                                attributes: {
                                    title: "Dodaj nowy",
                                },
                                render: true,
                            },
                        };
                    }
                </script>
            </div>
        </div>
    </div>
@endsection
