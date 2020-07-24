@inject('category','App\Category')
<div class="form-group">
   <label for="name">Name</label>
   {!! Form::text('name',$model->name,[
  'class' => 'form-control'
   ]) !!}
   <label for="price">Price</label>
   {!! Form::text('price',$model->price,[
  'class' => 'form-control'
   ]) !!}
   <label for="image">Image</label>
    {!! Form::file('image', [
    'class'=>'form-control',
    ]) !!}
    <label for="color">Color</label>
   {!! Form::text('color',$model->color,[
  'class' => 'form-control'
   ]) !!}
   <label for="store_size">Store Size</label>
   {!! Form::text('store_size',$model->price,[
  'class' => 'form-control'
   ]) !!}
   <label for="description">Description</label>
  {!! Form::text('description',$model->description,[
  'class' => 'form-control'
  ]) !!}
   <label for="name">Category </label>
   {!! Form::select('category_id',$category->pluck('name','id')->toArray(),null,[
   'class' => 'form-control',
   'placeholder' => 'Select Category'
   ])!!}
</div>
<div class="form-group">
<button class="btn btn-primary" type="submit">submit </button>
</div>
