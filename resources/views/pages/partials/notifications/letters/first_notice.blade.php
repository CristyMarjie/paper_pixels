<div class="d-flex justify-content-between">
        <div class="address d-flex flex-column">
            <label>{{Carbon\Carbon::parse($data->notice_details->issuance_date)->format('F d, Y')}}</label>
            <label><strong>{{$data->owner}}</strong></label>
            <label>{{$data->position}}</label>
            <label>{{$data->lessee}}</label>
            <label>{{$data->address}}</label>
        </div>

        <div class="download">
            <a href="{{route('download.notice',['id' => $data->id])}}" target="_blank" class="text-dark-75 font-weight-bold align-self-end mt-10 font-size-md filename">
                <i class="fas fa-cloud-download-alt"></i> Download PDF
            </a>
        </div>
</div>

<div class="letter-title mt-10">
    <label><h5>Re: FIRST NOTICE OF DEFAULT PAYMENT (30 DAYS)</h5></label>
    <div class="separator separator-solid separator-border-2"></div>
</div>

<div class="letter-header mt-10">
    <label>Dear {{$data->owner}},</label>
</div>
<div class="letter-content mt-10">
<p>Pease be informed that as of {{Carbon\Carbon::parse($data->notice_details->issuance_date)->format('F')}} 21, {{Carbon\Carbon::parse($data->notice_details->issuance_date)->format('Y')}}, your account with us is <strong>Thirty (30) Days past due.</strong></p>
<p>Your outstanding balance amounting to <strong>Php {{number_format($data->notice_details->balance,2,'.',',')}}</strong> per Statement of Account No. {{$data->notice_details->soa_number}}
    reflecting rental charges was due last January 20,2022</p>
<p>With this, <strong>kindly settle the said amount, which is inclusive of 5% surcharges, on or before
    {{Carbon\Carbon::parse($data->notice_details->deadline)->format('F d, Y')}}</strong></p>
<p>For clarification and reconciliation of balances, you may call us at {{$data->notice_details->contact_number}} and look for the
    undersigned</p>
<p><strong>If payment has been made, please submit proof of payment or validation slip at the Mall
    Administration Office – Billing and Collection Department</strong></p>
<p>We trust that you will give this matter your urgent attention.</p>
<p>Thank you.</p>
</div>



