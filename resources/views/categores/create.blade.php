@extends('layouts.app')
@inject('model','App\Category')
@section('page-title')
   Create Category
@endsection
@section('content')

<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Create Category</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      {!! Form::model($model , [
      'action' => 'CategoryController@store'
      ])!!}

      @if ($errors->any())
    @include('partials.validation_errors')
     @endif

      @include('categores.form')
      {!!Form::close()!!}
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->


@endsection
