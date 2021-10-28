<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel 8 HTML to PDF Example</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body class="antialiased container mt-5">

    

    <table class="table">
        <thead>
            <tr class="table-primary">
                <th>Pertemuan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
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