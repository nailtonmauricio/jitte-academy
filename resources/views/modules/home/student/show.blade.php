@extends('templates.academy.index')
@section('content')
    <div class="mb-1 hstack gap-1">
        <ol class="breadcrumb mb-3 mt-3 ms-auto">
            <li class="breadcrumb-item active"><a href="#" class="text-decoration-none">Início</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    PRECISA MELHORAR
                    <span class="badge bg-light text-danger position-absolute top-0 end-0 m-2">
                        6 {{--PUCHAR ESSAS INFORMACOES DA BASE DE DADOS, DA TABELA QUE ARMAZENA O RESULTADO DO NIVELAMENTO--}}
                    </span>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">Exibir detalhes</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    EM DESENVOLVIMENTO
                    <span class="badge bg-light text-warning position-absolute top-0 end-0 m-2">
                        4
                    </span>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">Exibir detalhes</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    PROEFICIENTE
                    <span class="badge bg-light text-primary position-absolute top-0 end-0 m-2">
                        4
                    </span>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">Exibir detalhes</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    DOMÍNIO
                    <span class="badge bg-light text-success position-absolute top-0 end-0 m-2">
                        5
                    </span>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">Exibir detalhes</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Matemática
                </div>
                <div class="card-body">
                    <canvas id="myAreaChart" width="100%" height="40"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Portugues
                </div>
                <div class="card-body">
                    <canvas id="myBarChart" width="100%" height="40"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/chart.min.js') }}"></script>
    <script src="{{ asset('js/fullcalendar.min.js') }}"></script>
@endpush
