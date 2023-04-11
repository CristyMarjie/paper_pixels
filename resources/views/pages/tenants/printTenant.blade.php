<style>
    .logo{
       height: 150px;
       }
       body {
        font-family: Helvetica, sans-serif;
        font-size: 14px;
       }
       .mb-30{
       margin-bottom: 30px;
       }
       .mt-12{
       margin-top: -12px;
       }
       .logo{
       height: 100px;;
       }

       #user {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        #user td, #user th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        #user tr:nth-child(even){background-color: #f2f2f2;}

        #user th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #d4243a;
        color: white;
        }


 </style>

<html>
    <div style="height:100px;width:100%;" class="mb-30">
        <div style="float: right;width:60%;">
            <img src="{{public_path('assets/images/davao.jpg')}}"  class="logo" >
        </div>
     </div>
    <body>
        <div class="">
                    <div class="mb-30">
                        <span class="mt-12">Tenant Master List</span></h3>
                    </div>
                <div class="">
                    <table class="" id="user">
                        <thead>
                        <tr>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>Address</th>
                        </tr>
                        </thead>
                        <tbody class="">
                            @foreach ($Tenants as $tenant)
                            <tr>
                                <td>{{$tenant->full_name}}</td>
                                <td>{{$tenant->user->email}}</td>
                                <td>{{$tenant->phone_number}}</td>
                                <td>{{$tenant->address1}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </body>
</html>

