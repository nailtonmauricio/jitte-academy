@extends('templates.academy.index')
@section('content')
    <div class="mb-1 hstack gap-3">
        <ol class="breadcrumb mb-3 mt-3 ms-auto">
            <li class="breadcrumb-item"><a href="{{ route('my-courses.index') }}" class="text-decoration-none">Meus cursos</a></li>
            <li class="breadcrumb-item"><a href="{{ route('course-modules.index', ['course' => $course_id]) }}" class="text-decoration-none">Módulos</a></li>
            <li class="breadcrumb-item active">Aula</li>
        </ol>
    </div>

    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header">
                <div>
                    <i class="fa-solid fa-book-open"></i>
                    {{ $lesson->title }}
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end mb-2">
                    @if($previous)
                        <a class="btn btn-sm btn-dark me-1" href="{{ route('lesson-video.index', ['lesson'=>$previous->id]) }}"><i class="fa-solid fa-backward-fast"></i></a>
                    @else
                        <button class="btn btn-sm btn-dark me-1" onclick="callLesson('Não há aula anterior a ser assistida...')"><i class="fa-solid fa-backward-fast"></i></button>
                    @endif

                    @if($next)
                            @if($lessonStatus == 1)
                            <a class="btn btn-sm btn-dark me-1" href="{{ route('lesson-video.index', ['lesson'=>$next->id]) }}"><i class="fa-solid fa-forward-fast"></i></a>
                            @else
                                <button class="btn btn-sm btn-dark me-1" onclick="callLesson('Conclua a aula atual antes de acessar a próxima.')"><i class="fa-solid fa-forward-fast"></i></button>
                            @endif
                    @else
                        <button class="btn btn-sm btn-dark me-1" onclick="callLesson('Não há uma próxima aula a ser assistida neste módulo, verifique os demais módulos e prossiga em sua trilha de sucesso...')"><i class="fa-solid fa-forward-fast"></i></button>
                    @endif
                    @if(!$lessonStatus == 1)
                    <form class="form-check-inline me-0" method="POST" action="{{ route('lesson-video.update') }}">
                         @csrf
                         @method('patch')
                         <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
                         <input type="hidden" name="status" value="1">
                         <button class="btn btn-sm btn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Marcar como assistida!">
                                <i class="fa-solid fa-check"></i>
                         </button>
                    </form>
                    @endif
                </div>
                <div class="ratio ratio-16x9">
                    <iframe src="{{ $lesson->content }}" title="YouTube video" allowfullscreen></iframe>
                </div>
            </div>
            <div class="card-footer">
                {{ $lesson->summary }}
            </div>
        </div>
    </div>
    <script>
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
