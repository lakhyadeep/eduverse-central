@extends('layouts.backend.main')

@section('title','Add Client')


@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Client</h4>
                </div>
                <div class="box-body">
                    <div class="col-lg-12 col-12">
                        <div class="box">
                            <!-- <div class="box-header with-border">
                                <h4 class="box-title">Add Client </h4>
                            </div> -->
                            <!-- /.box-header -->
                            <form class="form" id="addClient" method="POST" action="{{route('clients.store')}}">
                                @csrf
                                <div class="box-body">
                                    <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> About User</h4>
                                    <hr class="my-15">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group {{($errors->has('primary_contact_name'))?'error':''}}">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" name="primary_contact_name" value="{{old('primary_contact_name')}}" placeholder="Name">
                                            </div>
                                            @if ($errors->has('primary_contact_name'))
                                            <span class="text-danger">{{ $errors->first('primary_contact_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group {{($errors->has('primary_contact_number'))?'error':''}}">
                                                <label class="form-label">Contact Number</label>
                                                <input type="text" class="form-control" placeholder="Contact Number" name="primary_contact_number" value="{{old('primary_contact_number')}}">
                                            </div>
                                            @if ($errors->has('primary_contact_number'))
                                            <span class="text-danger">{{ $errors->first('primary_contact_number') }}</span>
                                            @endif
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group {{($errors->has('email'))?'error':''}}">
                                                <label class="form-label">E-mail</label>
                                                <input type="text" class="form-control" name="email" value="{{old('email')}}" placeholder="E-mail">
                                            </div>
                                            @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>

                                    </div>
                                    <h4 class="box-title text-info mb-0 mt-20"><i class="ti-envelope me-15"></i> Client Details</h4>
                                    <hr class="my-15">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group {{($errors->has('client_name'))?'error':''}}">
                                                <label class="form-label">Client Name</label>
                                                <input class="form-control" type="text" placeholder="Client Name" name="client_name" value="{{old('client_name')}}">
                                            </div>
                                            @if ($errors->has('client_name'))
                                            <span class="text-danger">{{ $errors->first('client_name') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{($errors->has('client_type_id'))?'error':''}}">
                                                <label class="form-label">Client Type</label>
                                                <select class="form-control select2" name="client_type_id">
                                                    <option value="" selected>Select</option>
                                                    @foreach($types as $type)
                                                    <option value="{{$type->id}}" {{(old('client_type_id')==$type->id)?'selected':''}}>{{$type->type_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('client_type_id'))
                                            <span class="text-danger">{{ $errors->first('client_type_id') }}</span>
                                            @endif
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group {{($errors->has('address_line_1'))?'error':''}}">
                                                <label class="form-label">Address Line 1</label>
                                                <textarea rows="5" class="form-control" name="address_line_1" value="" placeholder="Address Line 1">{{old('address_line_1')}}</textarea>
                                            </div>

                                            @if ($errors->has('address_line_1'))
                                            <span class="text-danger">{{ $errors->first('address_line_1') }}</span>
                                            @endif
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">Address Line 2 (Optional)</label>
                                                <textarea rows="5" class="form-control" name="address_line_2" placeholder="Address Line 2">{{old('address_line_2')}}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="ti-save-alt"></i> Save
                                    </button>

                                    <a href="{{route('clients.index')}}" class="btn btn-warning me-1 pull-right">
                                        <i class="ti-arrow-left"></i> Back
                                    </a>
                                </div>
                            </form>
                        </div>
                        <!-- /.box -->
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection

@section('custom_js')
<script src="{{asset('admintheme/main/js/pages/advanced-form-element.js')}}"></script>
@endsection