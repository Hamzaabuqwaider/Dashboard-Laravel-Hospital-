<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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

        <div class="container" align="center" style="padding-top: 100px;">

            @if (session()->has('status'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    x
                </button>
                {{session()->get('status')}}
            </div>
            @endif


        <form action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
              <div class="col-md-4 mb-3">
                <label>Doctor Name</label>
                <input name="name" required style="color: white" type="text" class="form-control is-valid"  placeholder="First name"  required>
              </div>
              <div class="col-md-4 mb-3">
                <label>Phone Number</label>
                <input type="number" required name="number" class="form-control"  placeholder="Number Phone" required>
              </div>
              <div class="col-md-4 mb-3">
                <label for="validationServerUsername">Speciality</label>
                <div class="input-group">
                    <select required style="color: black; width:200px" name="speciality" id="">
                        <option value>--Select--</option>
                        <option value="skin">Skin</option>
                        <option value="heart">Heart</option>
                        <option value="eye">Eye</option>
                        <option value="nose">Noise</option>
                    </select>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label>Room No</label>
                <input type="text" required name="room" class="form-control" placeholder="Room" required>
              </div>
              <div class="col-md-3 mb-3">
                <label for="validationServer04">Doctor Image</label>
                <input type="file" name="file" class="form-control is-invalid" id="validationServer04" placeholder="Image" required>
            </div>
            <button class="btn btn-primary" type="submit">Add Doctor</button>
          </form>

        </div>
    </div>


    <!-- plugins:js -->
      @include('admin.scripts')
  </body>
</html>
