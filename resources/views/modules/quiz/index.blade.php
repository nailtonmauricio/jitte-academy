@extends('templates.academy.index')
@section('content')
    <div class="mb-1 hstack gap-1">
        <ol class="breadcrumb mb-3 mt-3 ms-auto">
            <li class="breadcrumb-item active"><a href="{{ route('all-courses.index') }}" class="text-decoration-none">Cursos</a></li>
            <li class="breadcrumb-item active">Avaliações</li>
        </ol>
    </div>

    @if(!empty($quizzes))
        <div class="card mb-4 border-light shadow">
            <div class="card-body">
                <x-alert/>
                <table id="users" class="display table table-stripped table-hover mb-2">
                    <thead>
                    <tr>
                        <th>CURSO</th>
                        <th class="d-none d-md-table-cell">FINALIZADO EM</th>
                        <th class="d-none d-md-table-cell">PONTUAÇÃO</th>
                        <th>STATUS</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($quizzes as $quiz)
                        <tr class="align-middle">
                            <td>{{ $quiz->course->name }}</td>
                            @foreach($quiz->users as $user)
                                <td class="d-none d-md-table-cell">{{--{{ \Carbon\Carbon::parse($user->pivot->updated_at)->format('d/m/Y H:i:s') }}--}}</td>
                                <td class="d-none d-md-table-cell">{{ $user->pivot->score }}</td>
                            @endforeach
                            <td>
                                {{--<a href="{{ route('quiz.create', ['quiz'=>$quiz->id]) }}" class="bg-gradient btn btn-xs btn-primary me-2 mt-1 mt-md-0">Iniciar <i class="fa-solid fa-chevron-right"></i></a>--}}
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
            </div>
        </div>
        {{ $quizzes->links() }}
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
