<div wire:init="loadLessons">
    <table id="users" class="display table table-stripped table-hover mb-2">
        <thead>
        <tr>
            <th class="col-md-6">Aula</th>
            <th class="col-md-2">Duração</th>
            <th class="col-md-4">Último acesso</th>
            <th class="col-md-2">Status</th>
        </tr>
        </thead>
        <tbody>
        @if($lessons)
            @foreach($lessons as $lesson)
                <tr>
                    <td class="col-md-6"><a class="nav-link" href="{{ route('lesson-video.index', ['lesson'=>$lesson->id]) }}">{{ $lesson->title }}</a></td>
                    <td class="col-md-2"></td>
                    <td class="col-md-4"></td>
                    <td class="col-md-2 text-end"><i class="fa-regular fa-square"></i></td>
                </tr>
            @endforeach
        @else
            <tr>
                <td>Selecione um módulo para ver as aulas.</td>
                <td class="text-center"><span class="badge bg-danger">Negado</span></td>
            </tr>
        @endif
        </tbody>
    </table>
</div>


