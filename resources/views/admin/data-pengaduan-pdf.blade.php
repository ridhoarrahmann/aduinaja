<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Pengaduan</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        table{
            font-size: x-small;
        }
        tfoot tr td{
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }
    </style>
</head>
<body>

  <table width="100%">
    <tr>
        <td valign="top"></td>
        <td align="right">
            <h3>AduinAja</h3>
            <pre>
               Laporan data pengaduan
                @if($status=='2')
                {{'Status Selesai'}}
                @elseif($status==1)
                {{'Status sudah ditanggapi / proses '}}
                @else
                {{'Status belum ditanggapi'}}
                @endif
            </pre>
        </td>
    </tr>

  </table>

  <table width="100%">
    <tr>
        <!-- <td><strong>From:</strong> Telaj</td> -->
        <td> List data semua pengaduan </td>
    </tr>

  </table>

  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th>Email</th>
        <th>Kategori</th>
        <th>Sub Kategori</th>
        <th>tgl pengaduan</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
    <?php $no =1; ?>    
    @foreach($data_pengaduan as $dp)

      <tr>
        <th scope="row">{{$no}}</th>
        <td>{{$dp->email}}</td>
        <td>{{$dp->nama_kategori}}</td>
        <td align="right">{{$dp->nama_sub_kategori}}</td>
        <td align="right">{{$dp->tgl_pengaduan}}</td>
        <td align="right">
        @if($dp->status==0)
        {{'belum'}}
        @else
        {{$dp->status}}
        @endif
        </td>
      </tr>
      <?php $no++;?>
      @endforeach
    </tbody>

    <!-- <tfoot>
        <tr>
            <td colspan="3"></td>
            <td align="right">Subtotal $</td>
            <td align="right">1635.00</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Tax $</td>
            <td align="right">294.3</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Total $</td>
            <td align="right" class="gray">$ 1929.3</td>
        </tr>
    </tfoot> -->
  </table>

</body>
</html>