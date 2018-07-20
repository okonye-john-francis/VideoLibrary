@extends('layouts.adminIndex')

@section('content')
 

  <div class="col-xl-12">
     <div class="card">
        <br><br>
        
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
                        <th>Action</th>
                  </tr>
              </thead>
                  <tbody>
                      @foreach($pending_orders as $row)
                    <tr>

                        <td>{{$row['video_title']}}</td>
                        <td>{{$row['quantity']}}</td>
                        <td>{{$row['price']}}</td>
                        <td>{{$row['name']}}</td>
                        <td>{{$row['contact']}}</td>
                        <td>{{$row['address']}}</td>
                        <td>{{$row['updated_at']}}</td>
                        <td>
                          <a href="/oderApproval?orderId={{$row['id']}}">
                            <button type="button" class="btn btn-outline-success">
                              Approve
                            </button>
                          </a>
                        </td>
                    </tr>
                      @endforeach
                            
                  </tbody>
          </table>      

    </div>
  </div>

               
@endsection