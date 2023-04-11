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
       <p style="text-align: center;"><strong>TAKEOVER NOTICE</strong></p>

       <p class="mb-30">Dear {{$owner}},</p>

       <p class="mb-20 text-justify">With reference to the previous notices routed and call of meetings requested by our management to your office,
        please be informed that as of <strong>{{Carbon\Carbon::parse($deadline)->format('F d, Y')}}</strong>, you still have pending arrears amounting to
        <strong>{{$balance}}</strong>.
       </p>
       <p class="mb-20 text-justify">Thus, we regret to inform that due to your failure to settle the said amount, Gaisano Mall of Davao shall TAKE
        OVER your leased premises on (insert date of intended take-over). This is pursuant to the specified provisions of
        your Contract of Lease Article 5.I.ii Non-Sufficiency of Funds, stating:
       </p>
       <blockquote class="text-justify">
        <q><cite>Lessor {{ucwords(strtolower($lesse))}} has the right to pre-terminate the lease and shall be entitled to exercise the following against
            the delinquent tenant: secure and take full and complete physical possession of the leased premises without
            resorting to court/legal action; discontinue the supply of public utilities and services to the leased premises;
            assume ownership and take full control and possession of all alterations, additions, improvements or
            installations placed in or on the leased premises; take an inventory of the furniture, fixtures, equipment,
            fittings, goods, merchandise, chattels, samples, personal effects, contents or articles found or located in the
            leased premises; take possession and dispose all items in the leased premises in any manner it deems fit and
            apply the proceeds thereof to the payment of indebtedness of the LESSEE to the LESSOR; {{$owner}}.</cite></q>
        </blockquote>

       <p class="mb-20">We anticipate your understanding and cooperation on this matter.
       </p>
       <p class="mb-20">Thank you.</p>
       <div style="height:100px;width:100%;margin-top:30px;">
          <div style="float: left;width:50%;">
             <div class="mb-20">Sincerely</div>
             <div><strong><u>{{$preparedBy}}</u></strong></div>
             <div><small>Billing and Collection (Officer/Manager)</small></div>
          </div>
       </div>
       <div style="height:100px;width:100%;">
          <div style="float: right;width:30%;">
             <div class="mb-15">Noted By:</div>
             <div class="mb-5">_____________________</div>
             <div class="mb-20"><small class="font-small">Finance Mananger</small></div>
          </div>
       </div>
    </body>
 </html>

