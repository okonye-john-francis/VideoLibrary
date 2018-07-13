@extends('layouts.adminIndex')

@section('content')
 

  <div class="col-xl-12">
      <div class="card">
        <br>

        @if(count($errors)>0)
        
        <div class="alert alert-danger" id ="notification">
          <ul>
            @foreach($errors->all() as $error)
                  <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
        @endif

        @if($message = Session::get('success'))
        <div class="alert alert-success" id ="notification">
          <p>{{$message}}</p>
        </div>
        @endif

              <div class="card-body">
                <form action="/add" method="post">
                  @csrf
                  <table style="width: 100%;">

                      <tr>
                          <td class="tdstyle">Configuration Key</td>
                          <td>
                              <div class="form-group"> 
                  <select name="config_key" class="form-control">
                    <option value="#">Select Configuration</option>
                    <option value="std_movie_price">Standard Movie Price</option>
                    <option value="rare_movie_price">Rare Movie Price</option>
                  </select>
                   </div>
                          </td>
                      </tr>
                    
                      <tr>
                          <td class="tdstyle">Configuration Value</td>
                          <td>
                              <div class="form-group"> 
                  <input type="text" name="config_value" class="form-control" placeholder="e.g 10,000">
                   </div>
                          </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td>
                          <input type="submit" class="btn btn-primary" value="SAVE" />
                        </td>
                      </tr>
                  </table>
                </form>
                 
                  <div id="transactionRange"></div>
                               
                 </div>           

            </div>
       </div>

               
@endsection