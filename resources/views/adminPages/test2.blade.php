@extends('layouts.adminIndex')

@section('content')
 

  <div class="col-xl-12">
     <div class="card">
        <br>

                <div class="card-body">
                  

                <div style="margin-bottom: 30px;">Program for testing multiple select and unselect on a single click of select all</div>

             <input type="checkbox" name="New York" id="all" value="New York"/ ><label for="New York">Select All</label><br>

               <input type="checkbox" name="New York" id="New York" class="cities" value="New York"/ ><label for="New York">New York</label><br>

                <input type="checkbox" name="London" id="London" class="cities" value="London" /><label for="London">London</label><br>

                <input type="checkbox" name="Dubai" id="Dubai" class="cities" value="Dubai" /><label for="Dubai">Dubai</label><br>

                <input type="checkbox" name="Paris" id="Paris" class="cities" value="Paris"/><label for="Paris">Paris</label><br>

                <input type="checkbox" name="Kampala" id="Kampala" class="cities" value="Kampala"/><label for="Kampala">Kampala</label>

              </div>           

            </div>
       </div>

               
@endsection