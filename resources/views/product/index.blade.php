@extends('layouts.app')
@section('page-title')
Product
@endsection
@section('content')
<!-- Content Header (Page header) -->




<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">List Of Products</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <a href="{{url(route('product.create'))}}" class="btn btn-primary"><i class="fa fa-plus"></i> New Product</a>
      @include('flash::message')
      @if(count($records))
        <div class="table-resposive">
          <table class="table table-border">
            <thead>
            <tr>
              <th>ID</th>
              <th class="text-center">Name</th>
              <th class="text-center">Price</th>
              <th class="text-center">Color</th>
              <th class="text-center">Image</th>
              <th class="text-center">Description</th>
              <th class="text-center">Store Size</th>
              <th class="text-center">Category</th>
              <th class="text-center">Edit</th>
              <th class="text-center">Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($records as $record )
              <tr>
                <td class="text-center">{{$record->id}}</td>
                <td class="text-center">{{$record->name}}</td>
                <td class="text-center">{{$record->price}}</td>
                <td class="text-center">{{$record->color}}</td>
                <td class="text-center">{{$record->image}}</td>
                <td class="text-center">{{$record->description}}</td>
                <td class="text-center">{{$record->store_size}}</td>
                <td class="text-center">{{$record->category_id}}</td>

                <td class="text-center">
                  <a href="{{url(route('product.edit',$record->id))}}" class="btn btn-success" ><i class="fa fa-edit"></i></a>
                </td>
                <td class="text-center">
                  {!!Form::open([
                    'action' => ['ProductController@destroy',$record->id],
                    'method' =>'delete',
                    'enctype'=>'multipart/form-data'
                    ]) !!}
                  <button type="submit" class="btn btn-danger" ><i class="fa fa-trash"></i></button>

                  <script>
                  $.confirm({
                      icon: 'glyphicon glyphicon-heart',
                      title: 'glyphicon'
                  });
                </script>
                  {!!Form::close() !!}
                </td>
              </tr>
             @endforeach
          </tbody>
        </table>
        </div>
       @else
       <div class="alert alert-danger" role="alert">
           No Data
       </div>
      @endif
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->


@endsection
