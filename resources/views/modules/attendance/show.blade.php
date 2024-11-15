<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Declaração de Conclusão</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12pt;
            position: relative;
            margin: 0;
            padding: 0;
        }
        .container {
            margin: 25px;
        }
        .text-center {
            text-align: center;
        }
        .fw-bold {
            font-weight: bold;
        }
        .qrcode-container {
            text-align: center;
            margin: 20px 0;
        }
        .qrcode {
            width: 150px;
            height: auto;
            display: inline-block;
        }
        .text-sm {
            font-size: small;
        }
    </style>
</head>
<body>
@php
    $nomeInstituicao = "Learning Talem";
@endphp
<div class="container">
    <h3 class="text-center">DECLARAÇÃO DE CONCLUSÃO</h3>
    <p>
        Declaramos, para os devidos fins, que <span class="fw-bold">{{ $student->name }}</span>, portador(a) do CPF nº <span class="fw-bold">{{ preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $student->document) }}</span>, concluiu o curso "<span class="fw-bold">{{ $course->name }}</span>", realizado pela <strong>{{ $nomeInstituicao }}</strong> em <span class="fw-bold">{{ \Carbon\Carbon::parse($attendance->created_at)->format('d/m/Y') }}</span>, com carga horária de <span class="fw-bold">{{ $course->duration }}</span> horas.
    </p>

    Conteúdo programático:
    <ul>
        @foreach($modules as $module)
            <li>{{ $module->title }}</li>
        @endforeach
    </ul>
    <p>A presente declaração é válida por 15 dias, contados a partir da data de sua emissão, até a finalização do processo de emissão do certificado.</p>

    <p class="text-center fw-bold">Verificar autenticidade</p>

    <div class="qrcode-container">
        <img class="qrcode" src="{{ $qrcode }}" alt="QR Code">
    </div>

    <p class="text-center">
        Para verificar manualmente autenticidade acesse:<br>
        <a href="#">https://academy.talem.com.br/attendance/validate</a><br>
        Em validar declarações digite
    </p>

    <p class="text-center fw-bold">{{ $attendance->validate_code }}</p>

    <table>
        <tr>
            <td>Emitida em {{ date('d/m/Y') }},<br> Campina Grande - PB</td>
            <td><img src="{{ public_path('images/signature.png') }}" alt="Assinatura"></td>
        </tr>
    </table>
</div>
</body>
</html>
