@extends('templates.academy.index')
@section('content')
    <div class="mb-1 hstack gap-3">
        <ol class="breadcrumb mb-3 mt-3 ms-auto">
            <li class="breadcrumb-item"><a href="{{ route('my-courses.index') }}" class="text-decoration-none">Meus cursos</a></li>
            <li class="breadcrumb-item active">{{ $course->id }}</li>
            <li class="breadcrumb-item active">Módulos</li>
        </ol>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h2>{{ $course->name }}</h2>
                <a class="btn btn-primary bg-gradient mb-2" href="{{ route('course-files.download', $course->id) }}"><i class="fa-solid fa-download"></i><span class="d-none d-sm-inline ms-2">Material de apoio</span></a>
            </div>

            @if($user = $course->users->first())
                @php
                    // Garante que o progresso não ultrapasse 100%
                    $progress = min($courseUser->progress, 100);
                @endphp
                <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-success" style="min-width: 5%; width: {{ $progress }}%;">
                        {{ $progress }}%
                    </div>
                </div>
            @endif

        </div>
    </div>
    @php $counter = 1; @endphp
    @forelse($modules as $module)
    <div class="card mb-4 border-light shadow">
            <div class="card-header">
                <h4>Modulo {{ $counter.' - '.$module->title }}</h4>
                <p class="mb-4">{{ $module->summary }}</p>
            </div>
            <div class="card-body">

                <x-alert/>
                @livewire('lesson', ['moduleId' => $module->id, 'is_accessible' => $module->is_accessible])
            </div>
        </div>
    @php $counter++; @endphp
    @empty
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    text: "Não foram encontrados registros na base de dados.",
                    icon: "info",
                    showConfirmButton: false,
                    timer: 5000,
                });
            });
        </script>
    @endforelse
@endsection
