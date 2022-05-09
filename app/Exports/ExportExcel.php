<?php
 
 namespace App\Exports;
 use Carbon\Carbon;
 use App\Models\masuk;
 use App\Models\persediaan;
 use App\Models\barangmasuk;
 use App\Models\keluar;
 use App\Models\barangkeluar;
 use Illuminate\Contracts\View\View;
 use Maatwebsite\Excel\Concerns\FromView;
 
 class ExportExcel implements FromView
 {
     public function view(): View
     {
      $data=persediaan::all();
      $barangmasuk=barangmasuk::where("tanggal",">", Carbon::now()->subMonths(3))->groupBy('tanggal')->get();
      $barangmasuktd=[];
      $barangkeluar=barangkeluar::where("tanggal",">", Carbon::now()->subMonths(3))->groupBy('tanggal')->get();
      $barangkeluartd=[];

      foreach($barangmasuk as $b) {
          $barangmasuktd[$b->tanggal] = null;
      }
      foreach($barangmasuktd as $key => $value) {
          $currentDateItems = barangmasuk::where('tanggal', $key)->get();
          foreach($currentDateItems as $cur) {
              $barangmasuktd[$key]["key_" . $cur->barang_id] = $cur->masuk;
          }
      }
      foreach($barangkeluar as $c) {
          $barangkeluartd[$c->tanggal] = null;
      }
      foreach($barangkeluartd as $keys => $value) {
          $currentDateItemss = barangkeluar::where('tanggal', $keys)->get();
          foreach($currentDateItemss as $curs) {
              $barangkeluartd[$keys]["key_" . $curs->barang_id] = $curs->keluar;
          }
      }

         return view('xp1', [
          'data' => $data,'barangmasuk' => $barangmasuk, 'barangmasuktd' => $barangmasuktd,'barangkeluar' => $barangkeluar,'barangkeluartd' => $barangkeluartd
         ]);
     }
 }