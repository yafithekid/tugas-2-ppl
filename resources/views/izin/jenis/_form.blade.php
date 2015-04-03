<div>
    {{-- harus ada --}}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</div>
<div class='form-group'>
    <label for='nama'>Nama</label>
    <input name='nama' type='text' value='{{$jenis_izin->nama}}' class='form-control'/>
    <span>{{$errors->first('nama')}}</span>
</div>
<div class='form-group'>
    <label for='biaya'>Biaya</label>
    <input name='biaya' type='text' value='{{$jenis_izin->biaya}}' class='form-control'/>
    <span>{{$errors->first('biaya')}}</span>
</div>
<div class='form-group'>
    <input type='submit' value='{{$button}}' class='btn btn-primary'/>
</div>