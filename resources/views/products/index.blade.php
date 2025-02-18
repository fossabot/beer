@extends('layouts.app')


@section ('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Rediger</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

<table class="table table-striped table-sm">
  <thead>
    <tr>
      <th scope="col" style="width:180px;"  >Produktnavn</th>
      <th scope="col" style="width:80px;"  >Farve (hex)</th>
      <th scope="col" style="width:80px;"  >Quantity (digits seperated by commas)</th>
      <th scope="col" style="width:80px;"  >Pris</th>
      <th scope="col">Aktiv</th>
      <th scope="col">Gem</th>
    </tr>
  </thead>
</table>
@foreach ($products as $product)
  <form method="POST" action="/products">

    {{ csrf_field() }}
    {{ method_field('PATCH') }}

<table class="table table-striped table-sm">
  <tbody>
        <tr>
      <input type="hidden" name="id" value="{{$product->id}}">
      <th scope="row" style="width:180px;"  >
      <input type="text" class="form-control" style="width:180px;"  id="name" name="name" placeholder="Name" value="{{$product->name}}"></th>

    <td style="width:80px;"  >
      <input type="text" class="form-control" style="width:80px;" id="color" name="color" placeholder="Farve" value="{{$product->color}}">
    </td>

    <td style="width:80px;"  >
      <input type="text" class="form-control" style="width:80px;" id="quantity" name="quantity" placeholder="Quantity" value="{{$product->quantity}}">
    </td>

    <td style="width:80px;"  >
      <input type="number" step="0.01" class="form-control" style="width:80px;" id="price" name="price" placeholder="Pris" value="{{$product->price}}">
    </td>

    <td>
      <input @if($product->active) checked @endif type="checkbox" class="form-control" id="active" name="active" placeholder="Name">
    </td>

    <td>
    <button type="submit" class="btn btn-primary">Rediger</button>
    </td>
  </tr>
      </tbody>
</table>
  </form>
@endforeach


                </div>
            </div>

            <div class="card">
                <div class="card-header">Ny</div>

                <div class="card-body">

                  <form method="POST" action="/products">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="name">Produktnavn</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    </div>

                    <div class="form-group">
                      <label for="name">Farve (hex)</label>
                      <input type="text" class="form-control" id="color" name="color" placeholder="Farve">
                    </div>

                    <div class="form-group">
                      <label for="name">Quantity (digits seperated by commas)</label>
                      <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Farve">
                    </div>

                    <div class="form-group">
                      <label for="name">Pris</label>
                      <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Pris">
                    </div>

                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                  </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection ('content')
