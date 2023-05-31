@extends('template.master')

@section('page-title', 'Pasien')
@section('page-sub-title', 'Data')

@section('content')
    <div class="row render">
        {{-- data rendered --}}
    </div>
@endsection

@push('script')
    <script src="{{asset('assets/function/main/script.js')}}"></script>
    <script src="{{asset('assets/function/pasien/main.js')}}"></script>
@endpush
