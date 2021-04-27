@extends("app")

@section("SiGudangJNE")

@section('script')
<script>
        $(document).ready(function () {
            $(window).keydown(function (event) {
                if (event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });
        });
</script>
@endsection

@section("content")
@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form id="inputform" action="/entry" method="post">
    @csrf
    <div class="form-row">
        <input type="hidden" name="loop" value="1">
        <div class="form-group col-md-6">
            <h1 class="text-center">Id Transaksi</h1>
            <input data-index="1" type="text" name="id" class="form-control" id="exampleInputPassword1" autofocus>
        </div>
        <div class="form-group col-md-3">
            <h1 class="text-center">Total Belanja</h1>
            <input data-index="3" type="number" name="total" class="form-control" id="exampleInputPassword1">
        </div>
    </div>
    <button data-index="5" type="submit" class="btn btn-primary">Selanjutnya</button>
</form>
@endsection
