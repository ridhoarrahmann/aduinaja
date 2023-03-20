<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>

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
               Laporan detail pengaduan
               {{$data_pengaduan->nama}}
               {{$data_pengaduan->email}}
            </pre>
        </td>
    </tr>

  </table>

  <table width="100%">
    <tr>
        <!-- <td><strong>From:</strong> Telaj</td> -->
        <td>Telah melakukan pengaduan {{$data_pengaduan->tgl_pengaduan}} dengan pengaduan sebagai berikut : </td>
    </tr>

  </table>

  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th>Kategori</th>
        <th>Sub Kategori</th>
        <th>tgl pengaduan</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>{{$data_pengaduan->nama_kategori}}</td>
        <td align="right">{{$data_pengaduan->nama_sub_kategori}}</td>
        <td align="right">{{$data_pengaduan->tgl_pengaduan}}</td>
        <td align="right">{{$data_pengaduan->status}}</td>
      </tr>
      
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