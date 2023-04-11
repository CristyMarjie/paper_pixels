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
    @isset($withLogo)
        <img src="{{public_path('assets/images/davao.jpg')}}"  class="logo" >
    @endisset
    <body>
       <p class="date mb-10">{{Carbon\Carbon::parse($issuance)->format('F d, Y')}}</p>
       <p><strong>{{$owner}}</strong></p>
       <p class="mt-12">{{$position}}</p>
       <p class="mt-12"><strong>{{$lesse}}</strong></p>
       <p class="mt-12">{{$location}}</p>
       <p class="mt-12 mb-30" style="word-wrap: break-word;width:200px;">{{$address}}</p>
       <p><strong>Re: FIRST NOTICE OF DEFAULT PAYMENT (30 DAYS)</strong></p>
       <hr >
       <p class="mb-30">Dear {{$owner}},</p>
       <p class="mb-20 text-justify">Please be informed that as of {{Carbon\Carbon::parse($issuance)->format('F')}} 21, {{Carbon\Carbon::parse($issuance)->format('Y')}}, your account with us is <strong>Thirty (30) Days past
          due.</strong>
       </p>
       <p class="mb-20 text-justify">Your outstanding balance amounting to <strong>Php {{$balance}}</strong> per Statement of Account No. {{$soaNumber}}
          reflecting rental charges was due last {{Carbon\Carbon::parse($issuance)->format('F')}} 20, {{Carbon\Carbon::parse($issuance)->format('Y')}}</strong>
       </p>
       <p class="mb-20 text-justify">With this, <strong>kindly settle the said amount, which inclusive of 5% surcharges, on or before
        {{Carbon\Carbon::parse($deadline)->format('F d, Y')}}</strong>
       </p>
       <p class="mb-20 text-justify">For clarification and reconciliation of balances, you may call us at {{$contactNumber}} and look for the
          undersigned.
       </p>
       <p class="mb-20 text-justify"><strong>If payment has been made, please submit proof of payment or validation slip at the Mall
          Administration Office – Billing and Collection Department</strong>
       </p>
       <p class="mb-20">We trust that you will give this matter your urgent attention.</p>
       <p class="mb-20">Thank you.</p>
       <div style="height:100px;width:100%;margin-top:30px;">
          <div style="float: left;width:50%;">
             <div class="mb-20">Sincerely:</div>
             <div><strong><u>{{$preparedBy}}</u></strong></div>
             <div><small>Collection Officer</small></div>
          </div>
       </div>
       <div style="height:100px;width:100%;">
          <div style="float: right;width:30%;">
             <div class="mb-20">Received By:</div>
             <div class="mb-5">_____________________</div>
             <div class="mb-20"><small class="font-small">(Tenant Printed Name and Signature)</small></div>
             <div><small>Date:____________________</small></div>
          </div>
       </div>
    </body>
 </html>

