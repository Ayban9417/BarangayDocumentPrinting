<html>
<head>
    <title>Certificate</title>
    <style>
        /* Add any CSS styles for the certificate here */

        
    </style>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
<div class="card-body" id="printThis">
    
                                    <div class="d-flex flex-wrap justify-content-center" style="border-bottom:1px solid red">
                                        <div class="text-center">
                                            <img src="{{ public_path('images/logo1.png') }}" width="100"  /> 
										</div>
                                       
										<div class="text-center">
                                            <p class="mb-0">Republic of the Philippines</p>
                                            <p class="mb-0">Province of Bukidnon</p>
											<p class="mb-0">Municipality of Kitaotao</p>
											
										</div>
									</div>
                                    <div class="row mt-3">
                                       
                                        </div>
                                        <div class="col-md-9">
                                            <div class="text-center">
                                                <h5 class="fw-bold">OFFICE OF THE BARANGAY CAPTAIN</h5>
                                            </div>
                                            <div class="text-center">
                                                <h5 class=" fw-bold mb-5">BARANGAY CLEARANCE</h5>
                                            </div>
                                            
                                            <!-- <img src="{{ public_path('storage/images/' . $item->image) }}" width="100" height="100"  /> -->
                                           


                                            
                                            
                                        </div>
                                        <div class="col-md-3">
                                               
                                            </div>
                                       
                                        <div class="col-md-12" >
                                          
                                        <p class="fw-bold">TO WHOM IT MAY CONCERN:</p>
                                            <p class="mt-3" style="text-indent: 20px;">This is to certify that <span>{{$item->lastname}}, {{$item->firstname}} {{$item->middlename}}</span>, is a permanent resident of 
                                            <span class="fw-bold" >{{ $item->barangay }} Barangay Bolocaon, Kitaotao, Bukidnon</span> and that he/she is known to be of good moral character.</p>
                                            <p class="mt-3" style="text-indent: 20px;">This certification/clearance is hereby issued to the above-named person for whatever legal purpose it may serve him/her best.</p>
                                            <p class="mt-3">Given this <span>{{ now()->setTimezone('GMT+8')->formatLocalized('%B %d %Y') }}.</span></p>
                                            <p class="text-uppercase" style="margin-top:50px;">NOT VALID WITHOUT SEAL:</p>
                                            <div class="p-3 text-center  mb-" style="float:right;">
                                            <div class="text-right">
                                                @if($item->image)
                                                <img src="{{ public_path('storage/images/' . $item->image) }}" width="100" height="100" alt="Image">
                                                @else
                                                    <p></p>
                                                @endif
                                            </div>
                                                <h5 class="fw-bold text-right text-uppercase" style="margin-top: 68px">{{$item->lastname}}, {{$item->firstname}} {{$item->middlename}}</h5>
                                               
                                                <p class="mr-3 text-right">Tax Payer's Signature</p>
                                            </div>
                                        </div>
                                            <div class="p-3 text-left mt-4">
                                                <h5 class="fw-bold mt-4 mb-0 text-uppercase">{{$sec->name}}</h5>
                                                <p>BARANGAY SECRETARY</p>
                                            </div>
                                            <br>
                                            
                                            <div class="p-3 text-left">
                                                
                                                <h5 class="fw-bold mb-0 text-uppercase">{{$cman->name}}</h5>
                                                <p>PUNONG BARANGAY</p>
                                            </div>
                                        </div>
                                        <div class="col-md-12 d-flex flex-wrap">
                                            

                                        </div>
                                    </div>
								</div>
                                <div class="mt-2 text-right" >
                                <p>Cedula OR #:{{ request('orNo') }}  </p>
                                </div>
</body>
</html>