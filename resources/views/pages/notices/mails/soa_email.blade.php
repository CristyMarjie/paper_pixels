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
        <img src="{{public_path('assets/images/davao.jpg')}}"  class="logo" >
    <body>
       <p><strong>Statement of Account</strong></p>
       <hr >
       <p class="mb-30">Dear {{$tenant_fname}},</p>
       <p class="mb-20 text-justify">Please be informed that as of {{Carbon\Carbon::today()->toDateString()}} your Statement of Account has been uploaded and can be checked through Tenant Portal System.</p>

       <p class="mb-20 text-justify">This email is sent from an account we use for sending messages only. So if
        you want to contact us, <strong>don't reply to this email.</strong>
       </p>
       <p class="mb-20">Thank you.</p>
       <div style="height:100px;width:100%;margin-top:30px;">
        <div style="float: left;width:50%;">
           <div class="mb-20">Sincerely:</div>
           <div><strong><u>Mall Admin</u></strong></div>
        </div>
     </div>
    </body>
 </html>

