@extends('layouts.app')
@inject('category','App\Category')
@inject('product','App\Product')


@section('page_title')
Store Shop
@endsection
@section('small_title')
  Statistics
@endsection
@section('content')
    <!-- Main content -->
   
        
            <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div>
                <div class="panel-body">
                        <div class="row">
                                <div class="col-lg-4 col-xs-6">
                                  <!-- small box -->
                                  <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3>Categories</h3>
                                        <p>{{$category->count()}}</p>
                                    </div>
                                    <div class="icon">
                                      <i class="fa fa-users"></i>
                                    </div>
                                  </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-4 col-xs-6">
                                  <!-- small box -->
                                  <div class="small-box bg-green">
                                    <div class="inner">
                                        <h3>Products</h3>
                                        <p>{{$product->count()}}</p>
                                    </div>
                                    <div class="icon">
                                      <i class="fa fa-university"></i>
                                    </div>
                                  </div>
                                </div>
                                <!-- ./col -->
                                

                                
                               
                              </div>
                </div>
            </div>
        </div>
    </div>
</div>

        




  
    <!-- /.content -->
@endsection
