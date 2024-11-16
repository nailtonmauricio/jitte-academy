<div wire:init="loadLessons">
    <table id="users" class="display table table-stripped table-hover mb-2">
        <thead>
        <tr>
            <th class="col-md-6">Aula</th>
            <th class="col-md-2 d-none d-md-table-cell">Duração</th>
            <th class="col-md-4 d-none d-md-table-cell">Último acesso</th>
            <th class="col-md-2">Status</th>
        </tr>
        </thead>
        <tbody>
        @if($lessons)
            @foreach($lessons as $index => $lesson)
                <tr>
                    @if($index == 0 || $lessons[$index - 1]->users->first()->pivot->status == 1)
                        {{-- Se for a primeira aula ou se a aula anterior estiver concluída --}}
                        @if($lesson->is_exam)
                            <td class="col-md-6"><a class="nav-link" href="{{ route('final-lesson.create', ['lesson' => $lesson->id]) }}">{{ $lesson->title }}</a></td>
                        @else
                            <td class="col-md-6"><a class="nav-link" href="{{ route('lesson-video.index', ['lesson'=>$lesson->id]) }}">{{ $lesson->title }}</a></td>
                        @endif
                    @else
                        {{-- Se a aula anterior não estiver concluída, bloqueia o acesso --}}
                        <td class="col-md-6"><a class="nav-link" href="#" onclick="callLesson('Conclua a aula atual antes de acessar a próxima.')">{{ $lesson->title }}</a></td>
                    @endif

                    <td class="col-md-2 d-none d-md-table-cell">{{ $lesson->length }}</td>
                    <td class="col-md-4 d-none d-md-table-cell">{{ $lesson->users->first()->pivot->updated_at ? \Carbon\Carbon::parse($lesson->users->first()->pivot->updated_at)->format('d/m/Y H:i') : '' }}</td>
                    <td class="col-md-2 text-end">
                        {!! $lesson->users->first()->pivot->status
                            ? 'Concluída'
                            : 'Pendente'
                        !!}
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
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
</div>
