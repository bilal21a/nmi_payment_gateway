@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Title and Top Buttons Start -->
        <div class="page-title-container">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h1 class="mb-0 pb-0 display-4" id="title">Merchants Managment</h1>
                </div>
            </div>
        </div>

        <button class="btn btn-icon btn-icon-start btn-primary mb-4" type="button" data-bs-toggle="modal"
            onclick="addFormShow()" data-bs-target="#myModal">
            <i data-acorn-icon="plus"></i>
            <span>Add Merchant</span>
        </button>

        {{-- -----Table----- --}}
        @php
            $tableName = 'datatable';
            $tableData = ['Name', 'Keys', 'Date', 'Actions'];
        @endphp
        @include('common.table.table')
    </div>

    @include('common.modal.add_edit_modal')
@endsection

@section('js_after')
    {{-- **Show Data** --}}
    <script>
        var tabelDataArray = ['name', 'keys', 'date', 'action'];
        var get_data_url = "{{ route('get_merchents') }}"
    </script>
    @include('common.js.get_data')

    {{-- **Save Data** --}}
    <script>
        var add_form_url = "{{ route('merchents.create') }}"
        var save_data_url = "{{ route('merchents.store') }}"
        var add_title = "Add Merchant"
    </script>
    @include('common.js.add_data')


    {{-- **Update Data** --}}
    <script>
        var edit_form_url = '{{ route('merchents.edit', ':id') }}'
        var update_data_url = '{{ route('merchents.update', ':id') }}'
        var edit_title = "Edit User"
    </script>
    @include('common.js.edit_data')


    {{-- **Delete Data** --}}
    <script>
        var delete_data_url = '{{ route('merchents.destroy', ':id') }}'
    </script>
    @include('common.js.delete_data')
@endsection
