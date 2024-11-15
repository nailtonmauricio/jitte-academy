@extends('templates.academy.index')
@section('content')
    <div class="mb-1 hstack gap-1">
        <ol class="breadcrumb mb-3 mt-3 ms-auto">
            <li class="breadcrumb-item active"><a href="{{ route('all-courses.index') }}" class="text-decoration-none">Cursos</a></li>
            <li class="breadcrumb-item active">Declarações</li>
        </ol>
    </div>

    @if(!empty($courses))
        <div class="card mb-4 border-light shadow">
        <div class="card-body">
            <x-alert/>
            <table id="users" class="display table table-stripped table-hover mb-2">
                <thead>
                <tr>
                    <th>CURSO</th>
                    <th class="d-none d-md-table-cell">INÍCIO</th>
                    <th class="d-none d-md-table-cell">CONCLUSÃO</th>
                    <th>OPÇÕES</th>
                </tr>
                </thead>
                <tbody>
                @forelse($courses as $course)
                    <tr class="align-middle">
                        <td>{{ $course->name }}</td>
                        @foreach($course->users as $user)
                            <td class="d-none d-md-table-cell">{{ \Carbon\Carbon::parse($user->pivot->created_at)->format('d/m/Y H:i:s') }}</td>
                            <td class="d-none d-md-table-cell">{{ \Carbon\Carbon::parse($user->pivot->updated_at)->format('d/m/Y H:i:s') }}</td>
                        @endforeach
                        <td>
                            <a href="{{ route('attendance.show', ['course'=>$course->id]) }}" class="bg-gradient btn btn-xs btn-primary me-2 mt-1 mt-md-0" target="_blank"><i class="fa-solid fa-print"></i></a>
                        </td>
                    </tr>
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
                </tbody>
            </table>
            {{ $courses->links() }}
        </div>
    </div>
    @else
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    text: "Não foram encontrados registros na base de dados.",
                    icon: "info",
                    showConfirmButton: false,
                });
            });
        </script>
    @endif
@endsection
