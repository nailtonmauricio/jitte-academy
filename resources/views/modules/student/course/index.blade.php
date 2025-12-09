@extends('templates.academy.index')
@section('content')
    <div class="mb-1 hstack gap-1">
        <ol class="breadcrumb mb-3 mt-3 ms-auto">
            <li class="breadcrumb-item active"><a href="#" class="text-decoration-none">Home</a></li>
            <li class="breadcrumb-item active">Courses</li>
        </ol>
    </div>

    @livewire('course')
@endsection

@push('scripts')
    <script src="{{ asset('js/chart.min.js') }}"></script>
    <script src="{{ asset('js/fullcalendar.min.js') }}"></script>
@endpush
