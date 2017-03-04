@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.roles.management') . ' | ' . trans('labels.backend.access.roles.create'))

@section('page-header')
    <h1>
        Create Setting
        <small>Creating Setting</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.settings.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-setting']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Create Setting</h3>

                <div class="box-tools pull-right">
                    
                    <a class="btn btn-success" href="{{route('admin.settings.index')}}">Back To Setting List</a>
                </div>
            </div>

            <div class="box-body">
                <div class="form-group">
                    
                    <div class="col-lg-2">
                        <label for="setting_name" class="control-label">Name</label>
                    </div>
                    <div class="col-lg-10">                        
                        <input type="text" id="setting_title" name="name" class="form-control" placeholder="Enter Name" />
                    </div><!--col-lg-10-->
                </div><!--form control-->
            </div><!-- /.box-body -->
                 <div class="form-group">
                    <div class="col-lg-2">
                        <label for="order_address" class="control-label">Value</label>
                    </div>
                    <div class="col-lg-10">
                        <input type="text" id="setting_title" name="value" class="form-control" placeholder="Enter Value" />
                    </div><!--col-lg-10-->
                </div><!--form control-->
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.access.role.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@stop

@section('after-scripts')
    {{ Html::script('js/backend/access/roles/script.js') }}
@stop
