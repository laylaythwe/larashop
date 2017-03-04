@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.roles.management') . ' | ' . trans('labels.backend.access.roles.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.roles.management') }}
        <small>{{ trans('labels.backend.access.roles.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($setting, ['route' => ['admin.settings.update', $setting], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-setting', 'files'=>true]) }}

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
                        <input type="text" id="setting_title" name="name" class="form-control" value="{{$setting->name}}" />
                    </div><!--col-lg-10-->
                </div><!--form control-->
            </div><!-- /.box-body -->
                 <div class="form-group">
                    <div class="col-lg-2">
                        <label for="order_address" class="control-label">Value</label>
                    </div>
                    <div class="col-lg-10">
                        <input type="text" id="setting_title" name="value" class="form-control" value="{{$setting->value}}" />
                    </div><!--col-lg-10-->
                </div><!--form control-->
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.access.role.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@stop

@section('after-scripts')
    {{ Html::script('js/backend/access/roles/script.js') }}
@stop