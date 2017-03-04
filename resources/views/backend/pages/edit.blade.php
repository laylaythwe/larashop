@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.roles.management') . ' | ' . trans('labels.backend.access.roles.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.roles.management') }}
        <small>{{ trans('labels.backend.access.roles.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($page, ['route' => ['admin.pages.update', $page], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-page', 'files'=>true]) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Page</h3>

                <div class="box-tools pull-right">
                    
                    <a class="btn btn-success" href="{{route('admin.pages.index')}}">Back To Page List</a>
                </div>
            </div>

            <div class="box-body">
                <div class="form-group">
                    
                    <div class="col-lg-2">
                        <label for="page_name" class="control-label">Title</label>
                    </div>
                    <div class="col-lg-10">                        
                        {!!Form::text("title", null, ["class"=>"form-control", "id"=>"title"])!!}
                    </div><!--col-lg-10-->
                </div><!--form control-->
            </div><!-- /.box-body -->
                 <div class="form-group">
                    <div class="col-lg-2">
                        <label for="order_address" class="control-label">Slug</label>
                    </div>
                    <div class="col-lg-10">
                        {!!Form::text("slug", null, ["class"=>"form-control", "id"=>"slug"])!!}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                  <div class="form-group">
                    <div class="col-lg-2">
                        <label for="order_address" class="control-label">Description</label>
                    </div>
                    <div class="col-lg-10">
                        {!!Form::textarea("description",null, ["class"=>"form-control", "id"=>"description"])!!}
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