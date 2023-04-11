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
    <label><h5>TAKEOVER NOTICE</h5></label>
    <div class="separator separator-solid separator-border-2"></div>
</div>

<div class="letter-header mt-10">
    <label>Dear {{$data->owner}},</label>
</div>

<div class="letter-content mt-10">

<p>With reference to the previous notices routed and call of meetings requested by our management to your office,
    please be informed that as of <strong>{{Carbon\Carbon::parse($data->notice_details->overdue)->format('F d, Y')}}</strong>, you still have pending arrears amounting to
    <strong>Php {{number_format($data->notice_details->balance,2,'.',',')}}</strong>.</p>

<p>Thus, we regret to inform that due to your failure to settle the said amount, <strong>Gaisano Mall of Davao shall TAKE
    OVER your leased premises on {{Carbon\Carbon::parse($data->notice_details->takeover_date)->format('F d, Y')}}.</strong> This is pursuant to the specified provisions of
    your Contract of Lease Article 5.I.ii Non-Sufficiency of Funds, stating:</strong></p>

<blockquote>
    <q><cite>Lessor {{ucwords(strtolower($data->lessee))}} has the right to pre-terminate the lease and shall be entitled to exercise the following against
        the delinquent tenant: secure and take full and complete physical possession of the leased premises without
        resorting to court/legal action; discontinue the supply of public utilities and services to the leased premises;
        assume ownership and take full control and possession of all alterations, additions, improvements or
        installations placed in or on the leased premises; take an inventory of the furniture, fixtures, equipment,
        fittings, goods, merchandise, chattels, samples, personal effects, contents or articles found or located in the
        leased premises; take possession and dispose all items in the leased premises in any manner it deems fit and
        apply the proceeds thereof to the payment of indebtedness of the LESSEE to the LESSOR; {{$data->owner}}.</cite></q>
    </blockquote>


<p>We trust that you will give this matter your urgent attention.</p>

<p>Thank you.</p>
</div>
