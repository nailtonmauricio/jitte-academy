<!DOCTYPE html>
<html lang="pt-br">
    <head>
    <meta charset="UTF-8">
    <title>Certificado de Conclusão</title>
    <style>
        body {
            font-family: 'Roboto Light', sans-serif;
            font-size: 12pt;
            position: relative;
            margin: 0;
            padding: 0;
        }
        .container {
            margin: 25px;
            padding-top: 45px;
        }
        .text-center {
            text-align: center;
        }
        .fw-bold {
            font-weight: bold;
        }
        .qrcode {
            width: 150px;
            height: auto;
            display: inline-block;
        }
        .text-0 {
            font-size: 10pt;
        }
        .text-1 {
            font-size: 14pt;
        }
        .text-2 {
            font-size: 18pt;
        }
        .text-3 {
            font-size: 35pt;
        }
    </style>
</head>
    <body>
        <div class="container">
            <table>
                <tr>
                    <td colspan="2"><h1 class="text-center text-3" style="color: #800080;">Cetificado de Conclusão</h1></td>
                    <td><img src="{{ public_path('images/logo.png') }}" alt="Talem Logo" style="height: 50px; width: 160px;"></td>
                </tr>
                <tr>
                    <td colspan="3" style="padding-top: 50px; padding-bottom: 50px;">
                        <p class="text-1">Talem Learning certifica que</p><br>
                        <p class="fw-bold text-2">{{ $student->name }}</p><br>
                        <p class="text-1">portador(a) do CPF <span class="fw-bold">{{ preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $student->document) }}</span></p>
                        <br>
                        <p class="text-1">concluiu com êxito o curso</p><br>
                        <span class="fw-bold text-2">{{ $course->name }}</span></p><br>
                        <p class="text-1">com carga horária de <span class="fw-bold">{{ $course->duration }}</span> horas.</p>
                    </td>
                </tr>
                <tr>
                    <td style="padding-bottom: 20px;"><img src="{{ public_path('images/signature.png') }}" alt="Assinatura"></td>
                    <td style="padding-left: 190px; padding-bottom: 20px;">Verifique a autenticidade em: <br>https://academy.talem.com.br/validate<br>
                        Código: <span class="text-center fw-bold">{{ $certificate->validate_code }}</span><br><br>
                    Ou acesse pelo QR Code</td>
                    <td><img class="qrcode" src="{{ $qrcode }}" alt="QR Code"></td>
                </tr>
                <tr>
                    <td colspan="3"><p class="text-0">Certificado emitido em <span class="fw-bold">{{ \Carbon\Carbon::parse($certificate->created_at)->locale('pt_BR')->translatedFormat('d \d\e F \d\e Y') }}</span> em conformidade com a Lei nº 9.394/96 (LDB), art. 39, § 2º, Inciso I, art. 41, 42 e 43, Incisos VII e VIII, Lei nº 11.741/08, art. 1º, Decreto nº 5.154/04 e Decreto nº 8.268/14. Copyright Talem Learning | CNPJ 38.238.281/0001-98 | www.learning.talem.com.br
                        </p>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>
