

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidbar')
      <!-- partial -->

@include('admin.navbar')

    <div class="container-fluid page-body-wrapper">


            <div align="center" style="padding: 100px;" >
                @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">
                        x
                    </button>
                    {{session()->get('message')}}
                </div>
                @endif
                <table>
                    <tr style="background-color: black">
                    <th style="padding:10px;">ID</th>
                    <th style="padding:10px;">Customer Name</th>
                    <th style="padding:10px;">Email</th>
                    <th style="padding:10px;">Doctor Name</th>
                    <th style="padding:10px;">Phone</th>
                    <th style="padding:10px;">Date</th>
                    <th style="padding:10px;">Message</th>
                    <th style="padding:10px;">Status</th>
                    <th style="padding:10px;">Approvaled</th>
                    <th style="padding:10px;">Canceled</th>
                    </tr>
                    @foreach ($Appointment as $Appointments)

                    <tr align="center" style="backdrop-color:skyblue;">
                        <td>{{$Appointments->id}}</td>
                        <td>{{$Appointments->name}}</td>
                        <td>{{$Appointments->email}}</td>
                        <td>{{$Appointments->doctor}}</td>
                        <td>{{$Appointments->phone}}</td>
                        <td>{{$Appointments->date}}</td>
                        <td>{{$Appointments->message}}</td>
                        <td>{{$Appointments->status}}</td>
                        <td><a class ="btn btn-success" href="{{url('Approvaled',$Appointments->id)}}">Approve</a></td>
                        <td><a class ="btn btn-danger" href="{{url('Canceled',$Appointments->id)}}">Cancel</a></td>


                    </tr>
                    @endforeach

                </table>
            </div>
    </div>

        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>
</div>

        <!-- partial -->
    <!-- container-scroller -->
    <!-- plugins:js -->
      @include('admin.scripts')
  </body>
</html>
