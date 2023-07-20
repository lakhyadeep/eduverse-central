@if($client->status)
<div class="">
    <span class="badge badge-success">Active</span>
</div>
@endif


@if(!$client->status)
<div class="">
    <span class="badge badge-danger">Pending</span>
</div>
@endif