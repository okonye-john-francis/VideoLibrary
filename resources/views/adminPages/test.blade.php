@extends('layouts.adminIndex')

@section('content')
 

  <div class="col-xl-12">
     <div class="card">
        <br>

                <div class="card-body">

                  <form action="/tests" method="POST">

                    @csrf
                    
                      <table style="width: 100%;">

                        
                        <tr>
                            <td class="tdstyle">Movie Actor</td>
                            <td>
                              <div class="form-group"> 
                               <input type="checkbox" name="city[]" id="New York" class="form-control" value="New York"/ >New York
                                <input type="checkbox" name="city[]" id="London" class="form-control" value="London" />London
                                <input type="checkbox" name="city[]" id="Dubai" class="form-control" value="Dubai" />Dubai
                                <input type="checkbox" name="city[]" id="Paris" class="form-control" value="Paris"/>Paris
                                <input type="checkbox" name="city[]" id="Kampala" class="form-control" value="Kampala"/>Kampala
                              </div>
                            </td>
                        </tr>

                         <tr>
                            <td class="tdstyle">Movie Actor</td>
                            <td>
                              <div class="form-group"> 
                                <input type="radio" name="city2" id="New York" class="form-control" value="New York"/ >New York
                                <input type="radio" name="city2" id="London" class="form-control" value="London" />London
                                <input type="radio" name="city2" id="Dubai" class="form-control" value="Dubai" />Dubai
                                <input type="radio" name="city2" id="Paris" class="form-control" value="Paris" />Paris
                                <input type="radio" name="city2" id="Kampala"  class="form-control" value="Kampala" />Kampala
                              </div>
                            </td>
                        </tr>
                        
                    
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" class="btn btn-primary" value="POST" />
                            </td>
                        </tr>
                    </table>
                  
                </form>
              </div>           

            </div>
       </div>

               
@endsection