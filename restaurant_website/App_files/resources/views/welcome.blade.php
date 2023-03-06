@extends('layouts.app')

@section('content')
    <div class="container mx-5">
        <div class="row justify-content-center">
            <div>

                <div class="row row-cols-1 row-cols-md-12 g-4 mt-5 col-m">
                    <div class="col-6 ">
                        <div class="card">
                        
                            <div class="card-body">
                                <h5 class="card-title">Make a Booking</h5>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <img src={{ url('storage/viewAll.jpg') }}
                                class="card-img-top"  alt="...">
                            <div class="card-body">
                                <h5 class="card-title">View All Restaurants!</h5>
                                
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection