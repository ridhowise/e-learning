<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rekap Pertemuan</title>
    <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<style>
  h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(http://i.ibb.co/gyyKCT6/dimension.png);
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px;
}
</style>

<body class="antialiased container mt-5">
  <div id="logo">
    <img src="http://i.ibb.co/kxFwpvN/logo.png">
  </div>
  <h1>REKAP PERTEMUAN</h1>

     Nama : {{$user->user->name}}
     <br>
     Kehadiran : {{$hadir}}
     <br>
     Total Pertemuan : {{$totalhadir}}
     <br>
     Nilai : {{$nilai}}
     <br>
     <br>
    <table class="table">
        <thead>
            <tr class="table-primary">
                <th>Pertemuan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
          <tr>
            @foreach($kehadiran as $key => $items)

            <td>{{ $items->pertemuan->meetingname->name }} </td>

            @if($items->status == 0)
            <td>
              
              <button type="button" class="btn btn-danger">
               <i class="glyphicon glyphicon-download">
                Tidak Hadir
                </i>
              </button>
         
              </td>

            @else
            <td>
              
              <button type="button" class="btn btn-success">
               <i class="glyphicon glyphicon-download">
                Hadir
                </i>
              </button>
         
              </td>
          
           
              @endif

           
          
           
          </tr>
          
          @endforeach
        </tbody>
    </table>
</body>

</html>