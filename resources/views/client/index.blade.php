@extends('layouts.backend.main')

@section('title','List of Clients')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">List of Clients</h4>
                    <a class="waves-effect waves-light btn btn-app btn-info pull-right" href="{{route('clients.create')}}">
                        <i class="fa fa-plus"></i> Add Client
                    </a>
                </div>
                <div class="table-responsive">
                    <div class="box-body">

                        {{ $dataTable->table() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection

@push('scripts')
<script src="{{asset('admintheme/assets/vendor_components/datatable/datatables.min.js')}}"></script>
{{ $dataTable->scripts() }}
@endpush