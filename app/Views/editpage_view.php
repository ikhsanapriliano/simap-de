<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
    <meta charset="UTF-8">
</head>

<body>
    <style>
        .right {
            float: right;
        }

    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <br />
                        <h1>Formulir Pendaftaran</h1>
                        <div class="card-tools">
                            <a href="{{route('orderlistpage')}}" class="btn btn-danger btn-sm right">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            @if($errors->any())
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>


                            @endif
                            <form method="post" action="{{route('order.update', ['order' => $order])}}">
                                @csrf
                                @method('put')
                                <div>
                                    <label>No. Registrasi</label>
                                    <input type="text" name="noregistrasi" placeholder="No. registrasi"
                                        value="{{$order->noregistrasi}}" required />
                                </div>
                                <div>
                                    <label>Tanggal Dikeluarkan</label>
                                    <input type="date" name="tanggaldikeluarkan" placeholder="Tanggal dikeluarkan"
                                        value="{{$order->tanggaldikeluarkan}}" required />
                                </div>
                                <div>
                                    <label>Tanggal Diterima</label>
                                    <input type="date" name="tanggalditerima" placeholder="Tanggal diterima"
                                        value="{{$order->tanggalditerima}}" required />
                                </div>
                                <div>
                                    <label>Tanggal Penyerahan</label>
                                    <input type="date" name="targetpenyerahan" placeholder="Target penyerahan"
                                        value="{{$order->targetpenyerahan}}" required />
                                </div>
                                <div>
                                    <label>Pemesan</label>
                                    <input type="text" name="pemesan" placeholder="Pemesan" value="{{$order->pemesan}}"
                                        required />
                                </div>
                                <div>
                                    <label>Pekerjaan</label>
                                    <input type="text" name="pekerjaan" placeholder="Pekerjaan"
                                        value="{{$order->pekerjaan}}" required />
                                </div>
                                <div>
                                    <label>Kategori Pekerjaan</label>
                                    <select type="text" name="kategoripekerjaan" placeholder="Kategori pekerjaan" value="{{$order->kategoripekerjaan}}" />
                                    <option value=""@if($order->kategoripekerjaan == '') selected @endif>Kategori Pekerjaan</option>
                                    <option value="Pekerjaan 1"@if($order->kategoripekerjaan == 'Pekerjaan 1') selected @endif>Pekerjaan 1</option>
                                    <option value="Pekerjaan 2"@if($order->kategoripekerjaan == 'Pekerjaan 2') selected @endif>Pekerjaan 2</option>
                                    <option value="Pekerjaan 3"@if($order->kategoripekerjaan == 'Pekerjaan 3') selected @endif>Pekerjaan 3</option>
                                    </select>
                                </div>
                                <div>
                                    <label>Kategori Prodi</label>
                                    <select type="text" name="kategoriprodi" placeholder="kategori prodi"
                                        value="{{$order->kategoriprodi}}"  />
                                    <option value=""@if($order->kategoriprodi == '') selected @endif>Kategori Prodi</option>
                                    <option value="prodi 1"@if($order->kategoriprodi == 'prodi 1') selected @endif>prodi 1</option>
                                    <option value="prodi 2"@if($order->kategoriprodi == 'prodi 2') selected @endif>prodi 2</option>
                                    <option value="prodi 3"@if($order->kategoriprodi == 'prodi 3') selected @endif>prodi 3</option>
                                    </select>
                                </div>
                                <div>
                                    <label>Penanggung Jawab</label>
                                    <input type="text" name="penanggungjawab" placeholder="Penanggungjawab"
                                        value="{{$order->penanggungjawab}}" required />
                                </div>
                                <div>
                                    <label>Anggota Tim</label>
                                    <input type="text" name="anggotatim" placeholder="Anggota tim"
                                        value="{{$order->anggotatim}}" required />
                                </div>
                                <div>
                                    <label>Status</label>
                                    <select type="text" name="status" placeholder="Status" value="{{$order->status}}" />
                                    <option value="" @if($order->status == '') selected @endif>Status</option>
                                    <option value="On Progress"@if($order->status == 'On Progress') selected @endif>On Progress</option>
                                    <option value="Done"@if($order->status == 'Done') selected @endif>Done</option>
                                    </select>
                                </div>
                                <div>
                                    <label>Progres</label>
                                    <select type="text" name="progres" placeholder="Persentase" value="progres" />
                                    <option value=""@if($order->progres == '') selected @endif>Persentase</option>
                                    <option value="0%"@if($order->progres == '0%') selected @endif>0%</option>
                                    <option value="25%"@if($order->progres == '25%') selected @endif>25%</option>
                                    <option value="50%"@if($order->progres == '50%') selected @endif>50%</option>
                                    <option value="75%"@if($order->progres == '75%') selected @endif>75%</option>
                                    <option value="100%"@if($order->progres == '100%') selected @endif>100%</option>
                                    </select>
                                </div>
                                <div>
                                    <label>Keterangan</label>
                                    <input type="text" name="keterangan" placeholder="Keterangan"value="{{$order->keterangan}}" />
                                </div>
                                <div>
                                    <label>Tanggal Selesai</label>
                                    <input type="date" name="tanggalselesai" placeholder="Tanggal Selesai"value="{{$order->tanggalselesai}}" />
                                </div>
                                <br />
                                <div>
                                    <input type="submit" value="Update" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>
