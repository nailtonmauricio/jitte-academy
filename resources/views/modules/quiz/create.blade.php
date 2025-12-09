@extends('templates.academy.index')
@section('content')
    <div class="mb-1 hstack gap-3">
        <ol class="breadcrumb mb-3 mt-3 ms-auto">
            <li class="breadcrumb-item"><a href="{{ route('my-courses.index') }}" class="text-decoration-none">Meus cursos</a></li>
            <li class="breadcrumb-item"><a href="{{ route('my-courses.index') }}" class="text-decoration-none">Módulos</a></li>
            <li class="breadcrumb-item active">Avaliação</li>
        </ol>
    </div>

    <div class="col-xl">
        <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <span class="fw-bold h5"><i class="fa-solid fa-clipboard-question mt-1"></i> Avaliação Final:  {{ $quiz->course->name }} </span>
                        <span class="fw-bold text-secondary">Questão {{ $questions->currentPage() }} de {{ $questions->lastPage() }}</span>
                    </div>
                </div>
                @foreach($questions as $question)
                <div class="card-body d-flex justify-content-between">
                    <p class="h5">{{ $question->question_text }}</p>
                    <p class="h5"></p>
                </div>

                <div class="card-footer">
                    <form action="{{ route('answer.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="page" value="{{ $questions->currentPage() }}">
                        <input type="hidden" name="lastPage" value="{{ $questions->total() }}">
                        <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                        <input type="hidden" name="user_quiz_id" value="{{ $quiz_user_id }}">
                        <input type="hidden" name="question_id" value="{{ $question->id }}">
                        <input type="hidden" name="course_id" value="{{ $quiz->course_id }}">
                        <input type="hidden" name="lesson_id" value="{{ $lesson_id }}">
                        <table class="table table-hover">
                            <tbody>
                            @foreach($question->answers as $answer)
                                <tr onclick="selectAnswer({{ $answer->id }})" style="cursor: pointer;">
                                    <td>
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="answer_id"
                                            id="flexRadioDefault{{ $answer->id }}"
                                            value="{{ $answer->id }}"
                                            style="pointer-events: none;">
                                        <label
                                            class="form-check-label"
                                            for="flexRadioDefault{{ $answer->id }}">
                                            {{ $answer->answer_text }}
                                        </label>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-end mb-2">
                            <button type="submit" class="btn btn-primary">Próximo <i class="fa-solid fa-chevron-right"></i></button>
                        </div>
                    </form>
                </div>
                @endforeach

            {{--{{ $questions->links() }}--}}
        </div>
    </div>
    <script>
        function selectAnswer(id) {
            document.getElementById('flexRadioDefault' + id).checked = true;
        }

        function callLesson(message)
        {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            Toast.fire({
                icon: 'info',
                title: message
            });
        }
    </script>
@endsection
