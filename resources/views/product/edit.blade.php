@extends('master')
@section('title') IFISH | {{ $title }} @endsection

@section('product') active @endsection
@section('product_li') active @endsection

@section('open_pro') menu-open @endsection

@section('content')
<body>
    <form action = "/product/edit/<?php echo$data->id; ?>" method = "post">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
      <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Add Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Add Prodcut</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="name">Name</label>
                <input type = 'text' name = 'name' class="form-control" value = '{{ $data->name }}'/>
              </div>
              <div class="form-group">
                <label for="name">Price</label>
                <input type = 'number' name = 'price' class="form-control" value = '{{ $data->price }}'/>
              </div>
              <div class="form-group">
                <label for="name">Stock</label>
                <input type = 'number' name = 'stock' class="form-control" value = '{{ $data->stock }}'/>
              </div>
              <div class="form-group">
                <label for="name">Category</label>
                <select class="form-control" name="id_category">
                    <option>Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ ( $category->id == $data->id_category) ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach    
                </select>
              </div>
              <div class="form-group">
                <label for="name">Supplier</label>
                <select class="form-control" name="id_supplier">
                    <option>Select Supplier</option>
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ ( $supplier->id == $data->id_supplier) ? 'selected' : '' }} >{{ $supplier->name }}</option>
                    @endforeach    
                </select>
              </div>
              <div class="btn-group-sm float-right">
                <input type="submit" value="Save Changes" class="btn btn-success toastsDefaultSuccess">
                <a href="#" class="btn btn-danger toastsDefaultDanger">Cancel</a>
              </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        </div>
</body>
@endsection