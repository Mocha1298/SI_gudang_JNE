<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShoppingList;
use App\Detail;
use Excel;
use DB;

class Entry extends Controller
{
    public function entry(Request $r)
    {
        $validatedData = $r->validate([
            'id' => 'required|unique:shopping_lists,transaksi',
            'total' => 'required',
        ]);
        $id = $r->id;
        $total = $r->total;
        $loop = $r->loop;
        $selesai = 0;

        return view("entry",["id"=>$id,"total"=>$total,"loop"=>$loop,'selesai'=>$selesai]);
    }
    public function selesai(Request $r)
    {
        $validatedData = $r->validate([
            'sku' => 'required',
        ]);
        $sku = $r->sku;
        $id = $r->id;
        $total = $r->total;
        $loop = $r->loop;
        $selesai = $r->selesai;

        if($loop < $total){
            $detail = new Detail();
            $detail->transaksi = $id;
            $detail->sku = $sku;
            $detail->save();
            $loop += 1;
            return view("entry",["id"=>$id,"total"=>$total,"loop"=>$loop,'selesai'=>$selesai]);
        }
        else{
            $detail = new Detail();
            $detail->transaksi = $id;
            $detail->sku = $sku;
            $detail->save();
            $master = new ShoppingList();
            $master->transaksi = $id;
            $master->total = $total;
            $master->save();
            return redirect('/');
        }
    }

    public function laporan()
    {
        $tanggal = date('Y-m-d');
        $data = ShoppingList::whereDate('created_at','=',$tanggal)->get();
        $count = $data->count();
        $data2 = Detail::whereDate('created_at','=',$tanggal)->get();
        $global = $data2->count('sku');

        $count_item = Detail::select('sku')
        ->whereDate('created_at','=',$tanggal)
        ->selectRaw('count(sku) as qty')
        ->groupBy('sku')
        ->orderBy('qty', 'DESC')
        ->having('qty', '>', 0)
        ->get();
        return view('barang',['count_item'=>$count_item,'count'=>$count,'global'=>$global]);
    }
    
    public function transaksi()
    {
        $tanggal = date('Y-m-d');
        $data = ShoppingList::whereDate('created_at','=',$tanggal)->get();
        $count = $data->count();
        $barang = Detail::whereDate('created_at','=',$tanggal)->get();
        $count2 = $barang->count('sku');
        return view('transaksi',['data'=>$data,'count'=>$count,'count2'=>$count2]);
    }

    public function tanggal_transaksi(Request $r)
    {
        $validatedData = $r->validate([
            'tanggal' => 'required',
        ]);
        $tanggal = $r->tanggal;
        $data = ShoppingList::whereDate('created_at','=',$tanggal)->get();
        $count = $data->count();
        $barang = Detail::whereDate('created_at','=',$tanggal)->get();
        $count2 = $barang->count('sku');
        return view('transaksi',['data'=>$data,'count'=>$count,'count2'=>$count2]);
    }

    public function tanggal_barang(Request $r)
    {
        $validatedData = $r->validate([
            'tanggal' => 'required',
        ]);
        $tanggal = $r->tanggal;
        $data = ShoppingList::whereDate('created_at','=',$tanggal)->get();
        $count = $data->count();
        $data2 = Detail::whereDate('created_at','=',$tanggal)->get();
        $global = $data2->count('sku');

        $count_item = Detail::select('sku')
        ->whereDate('created_at','=',$tanggal)
        ->selectRaw('count(sku) as qty')
        ->groupBy('sku')
        ->orderBy('qty', 'DESC')
        ->having('qty', '>', 0)
        ->get();
        return view('barang',['count_item'=>$count_item,'count'=>$count,'global'=>$global]);
    }
    public function hapus($id)
    {
        $data = ShoppingList::find($id);
        return $data;
    }
}
