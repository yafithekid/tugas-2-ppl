<div>
    {{-- harus ada --}}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</div>
<div class='form-group'>
    <label for='jenisizin_id'>Jenis Izin</label>
    <select name='jenisizin_id' class='form-control' id='jenisizin_id'>
        <option selected disabled>Pilih jenis izin</option>
        @foreach($list_jenisizin as $jenisizin)
            <option value='{{$jenisizin->id}}'>{{$jenisizin->nama}}</option>
        @endforeach
    </select>
</div>

{{-- Daftar tabel yang dibutuhkan--}}
@foreach($list_jenisizin as $jenis_izin)
    <div class='form-group daftar-dokumen' id='daftar-dokumen-{{$jenis_izin->id}}'>
        <label>Daftar dokumen yang dibutuhkan</label>
        @if (count($jenis_izin->templates) > 0)
            <ul>
            @foreach($jenis_izin->templates as $template)
                <li>{{$template->nama}}</li>
            @endforeach
            </ul>
        @else
            <ul>
                <li>Tidak ada dokumen yang dibutuhkan</li>
            </ul>
        @endif
    </div>
@endforeach



<div class='form-group'>
    <input type='submit' value='{{$button}}' class='btn btn-primary'/>
</div>

@section('scripts')
@parent
<script type="text/javascript">
$("#jenisizin_id").change(function(){
    var jenisizin_id = $(this).val();
    $(".daftar-dokumen").hide();
    $("#daftar-dokumen-"+jenisizin_id).show();
});
$(".daftar-dokumen").hide();
</script>
@stop