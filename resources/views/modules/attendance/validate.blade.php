@extends('templates.academy.index')
@section('content')
    <div class="mb-1 hstack gap-1">
        <ol class="breadcrumb mb-3 mt-3 ms-auto">
            <li class="breadcrumb-item active">Certificado</li>
            <li class="breadcrumb-item active">Declaração</li>
            <li class="breadcrumb-item active">Validar</li>
        </ol>
    </div>

    <div class="card mb-4 border-light shadow">
        <div class="card-body">
            <x-alert/>
            <form action="{{ route('validate.link') }}" method="post">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" id="validateCode" class="form-control" name="validateCode"
                           placeholder="Código de validação" value="{{ old('validateCode') }}" autofocus required>
                    <label for="validateCode">Código do documento</label>
                </div>
                <div class="d-flex justify-content-end mb-2">
                    <button type="submit" class="btn btn-primary bg-gradient">Verificar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
