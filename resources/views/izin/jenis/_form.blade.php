<div>
    {{-- harus ada --}}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</div>
<div>
    <label for='nama'>Nama</label>
    <input name='nama' type='text' value='{{$jenis_izin->nama}}'/>
    <span>{{$errors->first('nama')}}</span>
</div>
<div>
    <label for='biaya'>Biaya</label>
    <input name='biaya' type='text' value='{{$jenis_izin->biaya}}'/>
    <span>{{$errors->first('biaya')}}</span>
</div>
<div>
    <input type='submit' value='{{$button}}'/>
</div>