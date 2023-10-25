@extends('layouts.template')
@section('content')
<div class="cart-main">
<div class="container">
  <div class="row">
    <div class="col col-md-8">
      @if(count($errors) > 0)
      @foreach($errors->all() as $error)
          <div class="alert alert-warning">{{ $error }}</div>
      @endforeach
      @endif
      @if ($message = Session::get('error'))
          <div class="alert alert-warning">
              <p>{{ $message }}</p>
          </div>
      @endif
      @if ($message = Session::get('success'))
          <div class="alert alert-success">
              <p>{{ $message }}</p>
          </div>
      @endif
      <div class="card">
        <div class="card-header">
          Item
        </div>
        <div class="card-body">
          <table class="table table-stripped">
            <thead>
              <tr>
                <th>No</th>
                <th>Produk</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Subtotal</th>
                <th></th>
              </tr>
            </thead>
            <tbody>

              <tr>
                <td>
                    1
                </td>
                <td>
spaget
                <br />

                </td>
                <td>
10000
                </td>
                <td>


                   <input type="number" name="" min="0" id="">
                  </div>
                </td>
                <td>
anu
                </td>
                <td>
                <form action="#"  style="display:inline;">

                  <button type="submit" class="btn btn-sm btn-danger mb-2">
                    Hapus
                  </button>
                </form>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col col-md-4">
      <div class="card">
        <div class="card-header">
          Ringkasan
        </div>
        <div class="card-body">
          <table class="table">
            <tr>
              <td>No Invoice</td>
              <td class="text-right">

              </td>
            </tr>
            <tr>
              <td>Subtotal</td>
              <td class="text-right">

              </td>
            </tr>
            <tr>
              <td>Diskon</td>
              <td class="text-right">

              </td>
            </tr>
            <tr>
              <td>Total</td>
              <td class="text-right">

              </td>
            </tr>
          </table>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col">
                <a href="" class="btn btn-primary btn-block">
                    Checkout
                </a>
            </div>
            <div class="col">
              <form action="#">

                <button type="submit" class="btn btn-danger btn-block">Kosongkan</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
