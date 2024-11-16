<div wire:init="loadMore">
    <div class="d-flex justify-content-center mb-3">
        <form wire:submit.prevent="search" class="d-none d-md-inline-block form-inline me-md-3 my-2 my-md-0" method="POST">
            @csrf
            <div class="input-group">
                <input wire:model.live="search" id="search" name="search" class="form-control" type="text" placeholder="Buscar por..." aria-label="Search for..." aria-describedby="btnNavbarSearch">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
            </div>
        </form>
    </div>
    <div id="infinite-scroll">
        <div class="row">
            @forelse($courses as $course)
                <div class="col-12 col-sm-6 col-md-4 col-lg-4 card-curso">
                    <div class="card shadow p-0 mb-3 bg-white rounded">
                        <a href="{{ route('course-modules.index', ['course' =>$course->id]) }}">
                            <img class="card-img-top" src="{{ $course->card }}" alt="{{ $course->name }}">
                        </a>

                        <div class="card-body">
                            <div class="text-center mb-2">
                                <a href="{{ route('course-modules.index', ['course' =>$course->id]) }}" class="text-decoration-none">
                                    <span class="card-title">{{ $course->name }}</span>
                                </a>
                            </div>

                            @if($user = $course->users->first())
                                @php
                                    // Garante que o progresso não ultrapasse 100%
                                    $progress = min($user->pivot->progress, 100);
                                @endphp
                                <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-success" style="min-width: 5%;width: {{ $user->pivot->progress }}%">{{ $progress}}%</div>
                                </div>
                            @endif
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
    </div>

    <!-- Carregar mais resultados -->
    <div class="text-center mt-4">
        <div x-intersect="$wire.loadMore()"></div>
    </div>

    <!-- Botão Voltar ao Topo -->
    <div x-data="{ showButton: false }" @scroll.window="showButton = (window.pageYOffset > 300)">
        <button x-show="showButton" @click="window.scrollTo({top: 0, behavior: 'smooth'})"
                class="btn btn-dark bg-gradient"
                style="position: fixed; bottom: 20px; right: 20px; width: 50px; height: 50px; border-radius: 50%; display: flex; justify-content: center; align-items: center; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
            <i class="fa-solid fa-chevron-up"></i>
        </button>
    </div>
</div>
