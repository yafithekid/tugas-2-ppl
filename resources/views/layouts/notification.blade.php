<?php ?>
@if (Session::has('notif-danger'))
<div class='alert alert-danger notification' >
    {{Session::pull('notif-danger')}}
</div>
@endif
@if (Session::has('notif-success'))
<div class='alert alert-success notification' >
    {{Session::pull('notif-success')}}
</div>
@endif