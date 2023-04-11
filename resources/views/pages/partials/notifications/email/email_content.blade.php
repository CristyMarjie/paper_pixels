<div class="d-flex justify-content-between">
    <div class="address d-flex flex-column">
        <label>{{Carbon\Carbon::parse($data->created_at)->format('F d, Y')}}</label>
        <label><strong>{{$details->email}}</strong></label>
    </div>


</div>

<div class="letter-title mt-10">
{{-- <label><h5>Re: FIRST NOTICE OF DEFAULT PAYMENT (30 DAYS)</h5></label> --}}
<div class="separator separator-solid separator-border-2"></div>
</div>

<div class="letter-header mt-10">
<label>Dear Admin,</label>
</div>

<div class="letter-content mt-10">
<p>{{$data->message}}</p>
<p>Thank you.</p>

{{-- {{dd($data->request_submitted[0])}} --}}
<div class="letter-footer mt-10">
    <label>From: {{$data->request_submitted[0]->user->email}}</label>
</div>

</div>



