
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

<thead style="color:red">
    <tr>
        <th width="20">Tipe</th>
        <th width="30">Nama</th>
        <th>Max</th>
        @foreach($barangmasuk as $key =>$items)
            <th width="10" style="background-color:green;color:white" >{{$items->tanggal}}</th>
        @endforeach
        @foreach($barangkeluar as $key =>$items)
            <th width="10" style="background-color:red;color:white" >{{$items->tanggal}}</th>
        @endforeach
        <th>Jumlah</th>
        <th>Satuan</th>
        <th>Harga</th>
   
    </tr>  
</thead>

<tbody style="color:black">

    @foreach ($data as $key => $items)
        <tr>
            @if ($items->tipe == 1)
            <td>Alat Tulis Kantor</td>
            @else
            <td>Alat Kebersihan</td>
            @endif
    
            <td>{{ $items->nama }}</td>
            <td>{{ $items->max }}</td>
            {{-- <tr> --}}
            @foreach($barangmasuk as $key =>$bm)
                <td style="background-color:#2ecc71;color:white">{{isset($barangmasuktd[$bm->tanggal]["key_".$items->id]) ? $barangmasuktd[$bm->tanggal]["key_".$items->id]  : ''}}</td>
            @endforeach
            {{-- </tr> --}}
            {{-- <tr> --}}
            @foreach($barangkeluar as $key =>$bk)
            <td style="background-color:#ff4d4d;color:white">{{isset($barangkeluartd[$bk->tanggal]["key_".$items->id]) ? $barangkeluartd[$bk->tanggal]["key_".$items->id]  : ''}}</td>
            @endforeach
            {{-- </tr> --}}
            @if($items->jumlah == 0)
                <td style="background-color:red;color:white" >{{ $items->jumlah }}</td>
            @else
            <td style="background-color:green;color:white" >{{ $items->jumlah }}</td>
            @endif

            

            <td>{{ $items->satuan }}</td>
            <td>{{ $items->harga }}</td>
          
        </tr>

    @endforeach
</tbody>
</table>
