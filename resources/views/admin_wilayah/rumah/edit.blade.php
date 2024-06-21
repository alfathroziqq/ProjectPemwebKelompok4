@extends('admin_wilayah.master')

@section('content')
    <h1>Edit Rumah</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('rumah.update', $rumah->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="kartu_keluarga_id">Kartu Keluarga:</label>
            <select name="kartu_keluarga_id" id="kartu_keluarga_id">
                @foreach ($kartuKeluargas as $kartuKeluarga)
                    <option value="{{ $kartuKeluarga->id }}" {{ $kartuKeluarga->id == $rumah->kartu_keluarga_id ? 'selected' : '' }}>{{ $kartuKeluarga->nomor_kk }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" value="{{ $rumah->alamat }}">
        </div>
        <div>
            <label for="luas_rumah">Luas Rumah:</label>
            <input type="number" id="luas_rumah" name="luas_rumah" value="{{ $rumah->luas_rumah }}">
        </div>
        <div>
            <label for="jumlah_kamar">Jumlah Kamar:</label>
            <input type="number" id="jumlah_kamar" name="jumlah_kamar" value="{{ $rumah->jumlah_kamar }}">
        </div>
        <div>
            <label for="spesifikasi_rumah">Spesifikasi Rumah:</label>
            <select name="spesifikasi_rumah" id="spesifikasi_rumah">
                <option value="rumah sehat" {{ $rumah->spesifikasi_rumah == 'rumah sehat' ? 'selected' : '' }}>Rumah Sehat</option>
                <option value="rumah tidak sehat" {{ $rumah->spesifikasi_rumah == 'rumah tidak sehat' ? 'selected' : '' }}>Rumah Tidak Sehat</option>
                <option value="rumah tidak layak" {{ $rumah->spesifikasi_rumah == 'rumah tidak layak' ? 'selected' : '' }}>Rumah Tidak Layak</option>
            </select>
        </div>
        <button type="submit">Simpan Perubahan</button>
    </form>
@endsection
