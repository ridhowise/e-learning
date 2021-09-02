<?php
 
namespace App\Exports;
 
use App\Models\akuntansi;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class ExportExcel implements FromCollection, WithHeadings
{
  use Exportable;
  public function headings() : array
  {
    return [ 'Keterangan', 'tanggal', 'Debit','Credit','Balance','Source'];
  }
  public function collection()
  {
    return akuntansi::all('name', 'tanggal', 'debit','credit','balance','source');
  }
}