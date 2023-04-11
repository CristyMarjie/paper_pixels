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

<div class="letter-title mt-10 text-center">
    <label>
            <h5>PRE-TERMINATION OF LEASE</h5>
    </label>
    <div class="separator separator-solid separator-border-2"></div>
</div>

<div class="letter-header mt-10">
    <label>Dear {{$data->owner}},</label>
</div>


<div class="letter-content mt-10">

    <p>We regret to inform that due to your failure to settle overdue accounts as of  deadlineHere,amounting to
        <strong>{{$data->amount}} (P {{number_format($data->notice_details->balance,2,'.',',')}})</strong> your lease will be considered pre-terminated
        effective 01 {{Carbon\Carbon::parse($data->notice_details->issuance_date)->addMonth()->format('F Y')}}. Hence, <strong><u>you are advised to cease operation</u></strong> immediately on the said pre-
        termination date.</strong></p>

    <p>Kindly coordinate with the undersigned for proper egress procedures and settlement of outstanding accounts. <strong>As
        this is a pre-termination, your paid security deposit will be forfeited in full and may not be applied to pay your
        accounts.</strong></p>

    <p><strong>Our Mall Administration shall conduct padlock procedure to your store premises on {{Carbon\Carbon::parse($data->notice_details->issuance_date)->endOfMonth()->format('F d, Y')}} at 9PM
        after mall hours.</strong> We encourage amicable settlement prior to scheduled padlock procedure, before we resort to
        all legal remedies available to us. In such event, we will seek not only payment of the above amount plus interests
        thereof, but also reimbursement of all costs of suit and other litigation expenses</p>

    <p><strong>If payment has been made, please submit proof of payment or validation slip at the Mall Administration Office -
        Billing and Collection Department.</strong></p>

    <p>We trust that you will give this matter your urgent attention.</p>

    <p>Thank you.</p>
</div>

