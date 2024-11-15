@extends('templates.academy.index')
@section('content')
    <div class="mb-1 hstack gap-1">
        <ol class="breadcrumb mb-3 mt-3 ms-auto">
            <li class="breadcrumb-item active"><a href="{{ route('home.index') }}" class="text-decoration-none">Dashboard</a></li>
            <li class="breadcrumb-item active">Certificados</li>
        </ol>
    </div>

    <x-alert/>
    
    <div class="row">
        @forelse($courses as $course)
            <div class="col-12 col-sm-6 col-md-4 col-lg-4 card-curso">
                <div class="card shadow p-0 mb-3 bg-white rounded">
                    <a href="{{ route('course.index', ['course' =>$course->id]) }}">
                        <img class="card-img-top" src="{{ asset('images/default-certificate.jpeg') }}" alt="{{ $course->name }}">
                    </a>

                    <div class="card-body text-center">
                        <span style="font-family: 'Roboto Light', sans-serif;"><strong>{{ $course->name }}</strong></span>
                        <p style="padding-top: 10px;">
                            <a href="{{ route('certificate.show', ['course'=>$course->id]) }}" class="bg-gradient btn btn-xs btn-primary me-2 mt-1 mt-md-0" target="_blank"><i class="fa-solid fa-print"></i> Imprimir Certificado</a>
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    Swal.fire({
                        text: "Não foram encontrados registros na base de dados.",
                        icon: "info",
                        showConfirmButton: false,
                    });
                });
            </script>

        @endforelse
    </div>
    {{ $courses->links() }}
@endsection
