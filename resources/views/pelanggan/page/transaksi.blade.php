@extends('pelanggan.layout.index')

@section('content')
    <style>
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
    <h3 class="mt-5 mb-5">Keranjang Belanja</h3>
    @if (!$data)
    @else
        @foreach ($data as $x)
            <div class="card mb-3 row">
                <div class="card-body col d-flex gap-4"  style="width:max-content">
                    <img src="{{ asset('storage/product/' . $x->product->foto) }}" width="250px" height="250px" alt="">
                    <form action="{{ route('checkout.product', ['id' => $x->id]) }}" method="POST">
                        @csrf
                        <div class="desc w-100">
                            <p style="font-size:25px; font-weight:700;">{{ $x->product->nama_product }}</p>
                            <input type="hidden" name="idBarang" value="{{ $x->product->id }}">
                            <input type="number" class="form-control border-0 fs-1" style="font-size: 2px" name="harga" 
                            readonly id="harga" value="{{ $x->product->harga }}">
                            <div class="row mb-2">
                                <label for="qty" class="col-sm-3 col-form-label fs-5">Quantity</label>
                                <div class="col-sm-5 d-flex">
                                    <button class="rounded-start bg-secondary p-1 border border-0 plus"
                                        id="plus">+</button>
                                    <input type="number" name="qty" class="form-control w-25 text-center qty"
                                        id="qty" name="qty" value="{{ $x->qty }}">
                                    <button class="rounded-end bg-secondary p-2 border border-0 minus" id="minus"
                                        disabled>-</button>
                                </div>
                            </div>
                            <div class="row">
                                <label for="price" class="col-sm-3 col-form-label fs-5">Total</label>
                                <input type="text" class="col-sm-3 form-control w-25 border-0 fs-4 total" name="total"
                                    readonly id="total">
                            </div>
                            <div class="row w-50">
                                <button type="submit" class="btn btn-success">
                                    Checkout
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col text-end p-2" >
                    <form action="{{ route('delete.produk', ['id'=>$x->id]) }}" method="POST">
                        @csrf
                        <button class="btn btn-danger">
                            <i class="fa fa-trash-alt m-1"></i>
                            <span class="m-1">Hapus</span>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif


@endsection
