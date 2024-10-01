@extends('templates.academy.index')
@section('content')
    <div class="mb-1 hstack gap-3">
        <ol class="breadcrumb mb-3 mt-3 ms-auto">
            <li class="breadcrumb-item"><a href="{{ route('my-courses.index') }}" class="text-decoration-none">Meus cursos</a></li>
            <li class="breadcrumb-item active">Módulos</li>
            <li class="breadcrumb-item active">Listar</li>
        </ol>
    </div>

    <div class="card mb-4">
        <div class="card-header ">
            <h2>{{ $course->name }}</h2>
            @if($user = $course->users->first())
                <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="{{ $user->pivot->progress }}" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-success" style="min-width: 5%;width: {{ $user->pivot->progress }}%">{{ $user->pivot->progress }}%</div>
                </div>
            @endif
        </div>
    </div>
    @php $counter = 1; @endphp
    @forelse($modules as $module)
    <div class="card mb-4 border-light shadow">
            <div class="card-header hstack gap-1">
                <h4>Modulo {{ $counter.' - '.$module->title }}</h4>
            </div>
            <div class="card-body">
                <p class="mb-4">{{ $module->summary }}</p>
                <x-alert/>
                @livewire('lesson', ['moduleId' => $module->id])
            </div>
        </div>
    @php $counter++; @endphp
    @empty
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    title: "Info!",
                    text: "Não foram encontrados registros na base de dados.",
                    icon: "info",
                    showConfirmButton: false,
                    timer: 5000,
                });
            });
        </script>
    @endforelse
@endsection

