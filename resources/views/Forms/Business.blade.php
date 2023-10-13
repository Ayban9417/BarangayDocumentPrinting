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
                                            <img src="{{ public_path('images/logo.jpg') }}" width="100"  /> 
										</div>
                                       
										<div class="text-center">
                                            <p class="mb-0">Republic of the Philippines</p>
                                            <p class="mb-0">Province of Bukidnon</p>
											<p class="mb-0">Municipality of Kitaotao</p>
											
										</div>
									</div>
                                    <div class="row mt-3">
                                        <div class="col-md-3">
                                           

                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="text-center">
                                                <h5 class="fw-bold">OFFICE OF THE BARANGAY CAPTAIN</h5>
                                            </div>
                                            <div class="text-center">
                                                <h5 class=" fw-bold mb-5">BUSINESS PERMIT</h5>
                                            </div>
                                            <p class="fw-bold">GRANTED TO:</p>
                                            <p class="mt-3" style="text-indent: 20px;"><span>{{$item->lastname}}, {{$item->firstname}} {{$item->middlename}}</span>, is a permanent resident of 
                                            <span class="fw-bold" >{{ $item->barangay }} Barangay Bolocaon, Kitaotao, Bukidnon</span>. In establishing his/her business {{ request('businessName') }} at {{ request('businessAddress') }}</p>
                                            <p class="mt-3" style="text-indent: 20px;">This clearance is granted in accordance with section 152 of R.A. 7160 of Barangay Tax Ordinance, provided however, that the necessary fees are paid to the Barangay Treasurer.
                                                This is non-transferable and shall be deemed null and void upon failure by the owner to follow the said rules and regulations set forth by the Local Government Unit of Brgy. Bolocaon, Kitaotao</p>
                                            <p class="mt-3">Given this <span>{{ now()->setTimezone('GMT+8')->formatLocalized('%B %d %Y') }}.</span></p>
                                            <p class="text-uppercase" style="margin-top:50px;">NOT VALID WITHOUT SEAL:</p>
                                        </div>
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
                                        <div class="col-md-12" >
                                          
                                           
                                           
                                            </div>
                                                <div class="p-3 text-left">
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
                                <!-- <p>OR #:{{ request('orNo') }}  </p> -->
                                </div>
                                            
</body>
</html>