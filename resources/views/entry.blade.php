@extends("app")

@section("title","Entry Barang")

@section("content")
<form class="mb-5" id="inputform" action="/selesai" method="POST">
    @csrf
    <input type="hidden" name="loop" value="{{$loop}}">
    <input type="hidden" name="id" value="{{$id}}">
    <input type="hidden" name="total" value="{{$total}}">
    <input type="hidden" name="selesai" value="{{$selesai}}">
    <h1 class="text-center">ID Transaksi : {{ $id }}</h1>
    <h1 class="text-center">Item : {{ $loop }}</h1>
        <div class="form-row">
            <div class="form-group col-md-4">
                <h3>SKU {{ $loop }}:</h3>
                <input data-index="1" name="sku" type="text" class="form-control" autofocus>
            </div>
        </div>
    <button data-index="4" type="submit" class="btn btn-primary">
        @if($selesai == 0)
        Selanjutnya
        @else
        Selesai
        @endif
    </button>
</form>
@endsection
