<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rekap Pertemuan</title>
    <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<style>
  

</style>

<body class="antialiased container mt-5">
  <table width="100%">
    <tr>
    <td  align="center"><img src="https://i.ibb.co/hZWWpz1/logo.png" width="60px"></td>
    <td  align="center"><h6><b>PEMERINTAH KOTA BITUNG</b></h6><h5><b>SATUAN POLISI PAMONG PRAJA</h5></b><h6>Jln.Dr.Sam Ratulangi No.45 Bitung</h6></td>
    <td  align="center"><img src="https://i.ibb.co/dDvYw2r/logow.png" width="60px"></td>
    </tr>
    </table> 
    <hr style="height:5px;
    border-top:1px solid black;
    border-bottom:2px solid black;">
    <table width="100%">
      <tr>
        <td  align="center"><h6><b><u>BUKTI PENYALURAN BARANG</u></b></h6></td>
      </tr>
    </table>
     <br>
     <br>
    <table class="table">
      <thead style="">
        <tr>
          <th>Nama</th>
          <th>Jumlah</th>
          <th>Satuan</th>

        </tr>
      </thead>
      
      <tbody>
       
     @foreach($barangkeluar as $key => $items)
            <td>{{ $items->barang->nama }} </td>
            <td>{{ $items->keluar }} </td>
            <td>{{ $items->barang->satuan }} </td>
           


           
          </tr>
          
          @endforeach
      </tbody>
    </table>
</body>

</html>