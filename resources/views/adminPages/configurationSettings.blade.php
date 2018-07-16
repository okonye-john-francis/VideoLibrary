@extends('layouts.adminIndex')

@section('content')
 

  <div class="col-xl-12">
      <div class="card">
        <br>


              <div class="card-body">
              

                  <table style="width: 100%;">

                      <tr>
                          <td class="tdstyle">Configuration Category</td>
                          <td>
                              <div class="form-group"> 
                  <select name="config_key" class="form-control" id="dropdownID">
                    <option value="#">Select Configuration Category</option>
                    <option value="pricing">Movie Pricing</option>
                    <option value="genre">Movie Genre</option>
                  </select>
                   </div>
                          </td>
                      </tr>           
                    
                  </table>
                        
                 </div> 
                  
                 <form id="pricing-form" action="/priceConfiguration" method="POST" style="display: none;">
                        @csrf
                 </form>

                 <form id="genre-form" action="/genreConfiguration" method="POST" style="display: none;">
                        @csrf
                 </form>

                 @yield('content2')          

            </div>
       </div>

               
@endsection