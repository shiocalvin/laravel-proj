@if (session()->has('success'))

<div class="alert text-white alert-dismissible" style="background-color:darkred">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

  {{session()->get('success')}}

</div>

@endif