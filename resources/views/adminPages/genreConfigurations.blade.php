@extends('adminPages.configurationSettings')

@section('content2')
 

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
                <form action="/addGenre" method="post">
                  
                  @csrf

                  <table style="width: 100%;">
                    
                      <tr>
                          <td class="tdstyle">Genre</td>
                          <td>
                              <div class="form-group"> 
                                 <input type="text" name="category" class="form-control" placeholder="e.g Action or Adventure or Horror or Love Story etc">
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