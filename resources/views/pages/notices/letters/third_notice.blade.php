<html>
    <style>
       .logo{
       height: 150px;
       }
       body {
        font-family: Helvetica, sans-serif;
       font-size: 14px;
       }
       .font-small{
       font-size: 10px;
       }
       .mb-10{
       margin-bottom: 10px;
       }
       .mb-5{
       margin-bottom: 5px;
       }
       .mb-30{
       margin-bottom: 30px;
       }
       .mb-20{
       margin-bottom: 20px;
       }
       .mb-15{
           margin-bottom: 15px;
       }
       .mt-12{
       margin-top: -12px;
       }
       .logo{
       height: 100px;;
       }
       .f-right{
       float: right;
       }
       .block{
       display: inline-block;
       }
       hr{
       height: 1px;
       border: none;
       max-width: 100%;
       color: grey;
       background-color: grey;
       margin-top: -10px;
       }

       .text-justify{
           text-align: justify;
       }
    </style>
    <body>
        <p class="date mb-10">{{Carbon\Carbon::parse($issuance)->format('F d, Y')}}</p>
        <p><strong>{{$owner}}</strong></p>
        <p class="mt-12">{{$position}}</p>
        <p class="mt-12"><strong>{{$lesse}}</strong></p>
        <p class="mt-12">{{$location}}</p>
        <p class="mt-12 mb-30" style="word-wrap: break-word;width:200px;">{{$address}}</p>
       <p style="text-align: center;"><strong>PRE-TERMINATION OF LEASE</strong></p>

       <p class="mb-30">Dear {{$owner}},</p>

       <p class="mb-20 text-justify">We regret to inform that due to your failure to settle overdue accounts as of  {{Carbon\Carbon::parse($deadline)->format('F d, Y')}},amounting to
        <strong>{{$balance}} (P{{$balanceAmount}})</strong> your lease will be considered pre-terminated
        effective 01 {{Carbon\Carbon::parse($issuance)->addMonth()->format('F Y')}}. Hence, <strong><u>you are advised to cease operation</u></strong> immediately on the said pre-
        termination date.
       </p>
       <p class="mb-20 text-justify">Kindly coordinate with the undersigned for proper egress procedures and settlement of outstanding accounts. <strong>As
        this is a pre-termination, your paid security deposit will be forfeited in full and may not be applied to pay your
        accounts.</strong>
       </p>
       <p class="mb-20 text-justify"><strong>Our Mall Administration shall conduct padlock procedure to your store premises on {{Carbon\Carbon::parse($issuance)->endOfMonth()->format('F d, Y')}} at 9PM
        after mall hours.</strong> We encourage amicable settlement prior to scheduled padlock procedure, before we resort to
        all legal remedies available to us. In such event, we will seek not only payment of the above amount plus interests
        thereof, but also reimbursement of all costs of suit and other litigation expenses
       </p>
       <p class="mb-20 text-justify">If payment has been made, please submit proof of payment or validation slip at the Mall Administration Office –
        Billing and Collection Department.
       </p>
       <p class="mb-20">We trust that you will give this matter your urgent attention.</p>
       <p class="mb-20">Thank you.</p>
       <div style="height:100px;width:100%;margin-top:30px;">
          <div style="float: left;width:50%;">
             <div class="mb-20">Sincerely,</div>
             <div><strong><u>{{$preparedBy}}</u></strong></div>
             <div><small>Tenant Relations Officer</small></div>
          </div>
       </div>
       <div style="height:100px;width:100%;">
          <div style="float: right;width:30%;">
             <div class="mb-15">Noted By:</div>
             <div class="mb-5">Connie Ann C. Tapia</div>
             <div class="mb-20"><small class="font-small">Regional Leasing Manager</small></div>
          </div>
       </div>
    </body>
 </html>

