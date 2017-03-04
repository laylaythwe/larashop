@extends ('backend.layouts.app')

@section ('title', 'page management')

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>Page</h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Page Management</h3>

            <div class="box-tools pull-right">
            <a href={{ route("admin.pages.create")}} class="btn btn-primary btn-xs">Create Page</a>
                @include('backend.access.includes.partials.role-header-buttons')
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="roles-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>title</th>
                            <th>slug</th>
                            <th>description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pages as $page)
                        <tr>
                            <td>{{$page->id}}</td>
                            <td>{{$page->title}}</td>
                            <td>{{$page->slug}}</td>
                            <td>{{$page->description}}</td>
                            <td>
                            {!! Form::open(["route"=> ["admin.pages.destroy", $page->id], "method"=>"delete"]) !!}
                                <a href="{{ route('admin.pages.edit', $page->id) }}" class="btn btn-info btn-xs">Edit</a>
                    
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
{{$pages->links()}}
    
@stop

@section('after-scripts')
    
@stop