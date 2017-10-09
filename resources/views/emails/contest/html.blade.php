<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
        u + .body .foo {
            line-height: 100% !important;
        }
    </style>
</head>
<body>
<table id="promotion" width="600" border="0" cellpadding="0" cellspacing="0" style="margin: 0 auto; font-family: Arial;">
    <tr>
        <td>
            <img id="promotion_01" src="{{ asset('images/mail/men_01.jpg') }}" width="600" height="250" border="0" alt="Młodość jest w Tobie" style="float: left;" />
        </td>
    </tr>
    <tr>
        <td style="background-color: #e0e0e0; text-align: center;">
            <h2 style="color: #000000; font-size: 26px; text-transform: uppercase; font-weight: bold; margin-top: 30px; margin-bottom: 15px;">Potwierdź swoje <br />zgłoszenie konkursowe</h2>
        </td>
    </tr>
    <tr>
        <td style="background-color: #e0e0e0; text-align: center;">
            <p style="font-size: 15px; color: #000000; margin-top: 15px; margin-bottom: 40px;">Dziękujemy za udział w naszym konkursie. <br />Jesteś już blisko – od wygrania niezwykłych nagród dzieli Cię już tylko <br />jeden krok! <span style="font-weight: bold; color:#e41e13;">Kliknij poniżej</span>, aby potwierdzić swoje zgłoszenie konkursowe <br />i opublikować je na stronie akcji.</p>
        </td>
    </tr>
    <tr>
        <td style="background-color: #e0e0e0;">
            <table width="600" border="0" cellpadding="0" cellspacing="0" style="margin: 0 auto;">
                <tr>
                    <td style="width: 180px; height: 50px;"></td>
                    <td>
                        <a href="{{ route('front.confirm.contest', $details) }}" title="POTWIERDZAM ZGŁOSZENIE">
                            <img id="promotion_02" src="{{ asset('images/mail/men_02.jpg') }}" width="235" height="50" border="0" alt="POTWIERDZAM ZGŁOSZENIE" style="float: left;" />
                        </a>
                    </td>
                    <td style="width: 185px; height: 50px;"></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td style="background-color: #e0e0e0; text-align: center;">
            <p style="font-size: 15px; color: #000000; margin-top: 40px; margin-bottom: 30px;">Wyniki już 16.01.2018 r. na stronie <span style="font-weight: bold; color:#e41e13;">www.zostanlegenda.pl</span>. <br />Trzymamy za Ciebie kciuki!</p>
        </td>
    </tr>
    <tr>
        <td style="background-color: #e0e0e0; text-align: center;">
            <p style="font-size: 15px; color: #000000; margin-bottom: 30px;">Pozdrawiamy! <br />Zespół Remington Polska</p>
        </td>
    </tr>
    <tr>
        <td style="background-color: #000000;">
            <table width="600" border="0" cellpadding="0" cellspacing="0" style="margin: 0 auto;">
                <tr>
                    <td colspan="9" width="600" height="25">

                    </td>
                </tr>
                <tr>
                    <td width="253" height="34">

                    </td>
                    <td>
                        <a href="#" title="facebook">
                            <img id="promotion_04" src="{{ asset('images/mail/men_04.jpg') }}" width="34" height="34" border="0" alt="" style="float: left;" />
                        </a>
                    </td>
                    <td width="20" height="34">

                    </td>
                    <td>
                        <a href="#" title="instagram">
                            <img id="promotion_04" src="{{ asset('images/mail/men_06.jpg') }}" width="34" height="34" border="0" alt="" style="float: left;" />
                        </a>
                    </td>
                    <td width="20" height="34">

                    </td>
                    <td>
                        <a href="#" title="printerest">
                            <img id="promotion_04" src="{{ asset('images/mail/men_08.jpg') }}" width="34" height="34" border="0" alt="" style="float: left;" />
                        </a>
                    </td>
                    <td width="20" height="34">

                    </td>
                    <td>
                        <a href="#" title="youtube">
                            <img id="promotion_04" src="{{ asset('images/mail/men_10.jpg') }}" width="34" height="34" border="0" alt="" style="float: left;" />
                        </a>
                    </td>
                    <td width="253" height="34">

                    </td>
                </tr>
                <tr>
                    <td colspan="9" width="600" height="25">

                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td style="background-color: #000000; text-align: center;">
            <p style="font-size: 15px; color: #ffffff; margin-top: 0px; margin-bottom: 30px;">© 2017 REMINGTON Polska<br />ul. Bitwy Warszawskiej 1920 r. 7A <br />Warszawa 02-366</p>
        </td>
    </tr>
</table>
</body>
</html>
