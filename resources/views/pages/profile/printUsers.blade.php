<style>
    .logo{
       height: 100px;
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
    <div style="height:100px;" class="mb-30">
        <img src="{{public_path('assets/images/GaisanoMalls.png')}}" style="width:100%;"  class="logo" >
    </div>
    <body>
        <div class="">
                    <div class="mb-30">
                        <span class="mt-12">User Master List</span></h3>
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
                            @foreach ($Users as $user)
                            <tr>
                                <td>{{$user->people->full_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->people->phone_number}}</td>
                                <td>{{$user->people->address1}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </body>
</html>

