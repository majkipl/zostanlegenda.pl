@extends('layouts.panel')

@section('content')
    <div class="container">
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Zgłoszenie do promocji</h1>
                </div>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Zgłoszenie do promocji {{ $promotion->id }}</div>
                        <div class="panel-body">
                            <table class="item show data">
                                <tbody>
                                <tr>
                                    <td>Imię: </td>
                                    <td>{{ $promotion->firstname }}</td>
                                </tr>
                                <tr>
                                    <td>Nazwisko: </td>
                                    <td>{{ $promotion->lastname }}</td>
                                </tr>
                                <tr>
                                    <td>Data urodzenia: </td>
                                    <td>{{ $promotion->birthday }}</td>
                                </tr>
                                <tr>
                                    <td>Adres: </td>
                                    <td>{{ $promotion->address }}</td>
                                </tr>
                                <tr>
                                    <td>Miasto: </td>
                                    <td>{{ $promotion->city }}</td>
                                </tr>
                                <tr>
                                    <td>Kod pocztowy: </td>
                                    <td>{{ $promotion->zip }}</td>
                                </tr>
                                <tr>
                                    <td>Adres e-mail: </td>
                                    <td>{{ $promotion->email }}</td>
                                </tr>
                                <tr>
                                    <td>Telefon: </td>
                                    <td>{{ $promotion->phone }}</td>
                                </tr>
                                <tr>
                                    <td>Numer dowodu sprzedaży: </td>
                                    <td>{{ $promotion->receiptnb }}</td>
                                </tr>
                                <tr>
                                    <td>Zdjęcie dowodu sprzedaży: </td>
                                    <td><img src="{{ asset('storage/' . $promotion->img_receipt) }}" alt="Dowód zakupu dla zgłoszenia: {{ $promotion->id }}" /></td>
                                </tr>
                                <tr>
                                    <td>Zdjęcie kodu ean: </td>
                                    <td><img src="{{ asset('storage/' . $promotion->img_ean) }}" alt="Kod ean dla zgłoszenia: {{ $promotion->id }}" /></td>
                                </tr>
                                <tr>
                                    <td>Legal 1: </td>
                                    <td>{{ $promotion->legal_1 }}</td>
                                </tr>
                                <tr>
                                    <td>Legal 2: </td>
                                    <td>{{ $promotion->legal_2 }}</td>
                                </tr>
                                <tr>
                                    <td>Legal 3: </td>
                                    <td>{{ $promotion->legal_3 }}</td>
                                </tr>
                                <tr>
                                    <td>Legal 4: </td>
                                    <td>{{ $promotion->legal_4 }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div><!--/.row-->
        </div><!--/.main-->
    </div>
@endsection
