@extends("app")

@section("title","Laporan")

@section("script")
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<!-- <!– jQuery (necessary for Bootstrap’s JavaScript plugins) –>
<!– Latest compiled and minified JavaScript –> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
$('#example').DataTable();
});
function hapus(x) {
    var jos = confirm('Yakin mau dihapus?????');

    if (jos == true) {
        window.location.replace = "/hapus/"+x;
        // console.log("/hapus/"+x);
    } else {
        alert("Data masih mandali!");
    }
}
</script>
@endsection

@section("head")
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endsection


@section("content")
    <!-- Optional JavaScript; choose one of the two! -->
    <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $list)
            <tr>
                <td>{{$list->transaksi}}</td>
                <td>{{$list->total}}</td>
                <td><a href="" onclick="hapus({{$list->id}});" class="btn btn-danger btn-sm">Hapus</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h5>Total Transaksi : {{$count}}</h5>
    <h5>Total Barang Keluar : {{$count2}}</h5>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  @endsection