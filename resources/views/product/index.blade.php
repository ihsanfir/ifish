@extends('master')
@section('title') IFISH | {{ $title }} @endsection

@section('product') active @endsection
@section('product_li') active @endsection

@section('open_pro') menu-open @endsection

@section('content')
<body>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Product</h3>
                <div class="card-tools">
                  <form action="/product/search" method="GET">
                    <div class="input-group input-group-sm" style="width: 250px;">
                      <input type="text" name="search" class="form-control float-right" placeholder="Search" value="{{ old('search') }}">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default mr-1"><i class="fas fa-search"></i></button>
                        <div class="btn-group btn-group-sm">
                          <button type="button" class="btn btn-success">Export</button>
                          <button type="button" class="btn btn-success dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="{{ route('pdf-product') }}">Export to Pdf</a>
                            <a class="dropdown-item" href="{{ route('excel-product') }}">Export to Excel</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>price</th>
                        <th>stock</th>
                        <th>supplier</th>
                        <th>Category</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $product)
                    <tr>
                        <td>{{ ($data->currentpage()-1) * $data->perpage() + $loop->index + 1 }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->supplier }}</td>
                        <td>{{ $product->category }}</td>
                        <td><a href = '/product/edit/{{ $product->id }}' class="btn btn-block btn-warning btn-sm">Edit</a></td>
                        <td><a href = '/product/delete/{{ $product->id }}' class="btn btn-block btn-danger btn-sm">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
</body>
{{ $data->links() }}
@endsection