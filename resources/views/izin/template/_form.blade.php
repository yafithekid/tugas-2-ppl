<input type='hidden' name='_token' value='{{ csrf_token() }}'>

<div class='form-group'>
    <label>Nama</label>
    <input name='nama' class='form-control' value='{{$template->nama}}' />
</div>
<div class='form-group'>
    <input type='submit' value='{{$button}}' class='btn btn-primary'/>
</div>