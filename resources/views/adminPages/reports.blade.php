@extends('layouts.adminIndex')

@section('content')

<div class="col-xl-12">

     <div class="card">
        <br><br>

        <div class="col-lg-12">

        <nav>
          <div class="nav nav-tabs mb-4" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
            aria-controls="nav-home" aria-selected="true">
            Sales
            </a>

            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
            aria-controls="nav-profile" aria-selected="false">
            Total Revenue
            </a>

            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
            aria-controls="nav-contact" aria-selected="false">

            </a>

          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

              <table width="100%" class="table table-striped table-bordered able-hover" id="dataTables-example">
              <thead>
                  <tr>
                        <th>Movie</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Customer Name</th>
                        <th>Customer Telephone</th>
                        <th>Customer Residence</th>
                        <th>Order Date</th>
                        <th>Approval Date</th>
                  </tr>
              </thead>
                  <tbody>
                      @foreach($approved_orders as $row)
                    <tr>

                        <td>{{$row['video_title']}}</td>
                        <td>{{$row['quantity']}}</td>
                        <td>{{$row['price']}}</td>
                        <td>{{$row['name']}}</td>
                        <td>{{$row['contact']}}</td>
                        <td>{{$row['address']}}</td>
                        <td>{{$row['created_at']}}</td>
                        <td>{{$row['updated_at']}}</td>

                    </tr>
                      @endforeach

                  </tbody>
          </table>


          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

            <div class="row">
              <div class="col-lg-6">
                  Start Date
              </div>
              <div class="col-lg-6">
                  <input type="date" class="form-control" name="start_date"/>
              </div>
            </div>

            <div class="row mt-4">
              <div class="col-lg-6">
                  End Date
              </div>
              <div class="col-lg-6">
                  <input type="date" class="form-control" name="end_date"/>
              </div>
            </div>

          </div>
          <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
        </div>

        </div>



    </div>
  </div>


@endsection
