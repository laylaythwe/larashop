@extends ('backend.layouts.app')

@section ('title', 'brand management')

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>Brands</h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Brands Management</h3>

            <div class="box-tools pull-right">
            <a href={{ route("admin.brands.create")}} class="btn btn-primary btn-xs">Create brand</a>
                @include('backend.access.includes.partials.role-header-buttons')
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="roles-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Logo</th>
                            <th>Created_at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($brands as $brand)
                        <tr>
                            <td>{{$brand->id}}</td>
                            <td>{{$brand->name}}</td>
                            <td><img src='{{url("images/90x60/brands/" . $brand->logo)}}' /></td>
                            <td>{{$brand->created_ago}}</td>
                            <td>
                            {!! Form::open(["route"=> ["admin.brands.destroy", $brand->id], "method"=>"delete"]) !!}
                                <a href="{{ route('admin.brands.edit', $brand->id) }}" class="btn btn-info btn-xs">Edit</a>
                                <!-- <a href="{{ route('admin.brands.destroy', $brand->id) }}" class="btn btn-danger btn-xs">Delete</a> -->
                                
                                    <button class="btn btn-danger btn-xs" >Delete</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->
{{$brands->links()}}
    
@stop

@section('after-scripts')
    
@stop