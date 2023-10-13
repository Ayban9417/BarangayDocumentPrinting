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
    
<div class="d-flex flex-wrap justify-content-center" style="border-bottom: 1px solid red; border-top: 0;">
                                        <div class="text-center">
                                            <img src="{{ public_path('images/logo1.png') }}" width="100"  /> 
										</div>
                                       
										<div class="text-center">
                                            <p class="mb-0">Republic of the Philippines</p>
                                            <p class="mb-0">Province of Bukidnon</p>
											<p class="mb-0">Municipality of Kitaotao</p>
											
										</div>
									</div>
                                   
                                        <div class="col-md-9">
                                            <div class="text-center">
                                                <h5 class="fw-bold">OFFICE OF THE PUNONG BARANGAY</h5>
                                            </div>
                                            <div class="text-center">
                                                <h5 class=" fw-bold mb-5">FOR CUTTING TREES</h5>
                                            </div>
                                            
                                            <!-- <img src="{{ public_path('storage/images/' . $item->image) }}" width="100" height="100"  /> -->
                                           


                                            
                                            
                                        </div>
                                        
                                       
                                        <div class="col-md-12" >
                                          
                                        <p class="fw-bold">TO WHOM IT MAY CONCERN:</p>
                                            <p class="mt-3" style="text-indent: 20px;">This is to certify that <span>{{$item->lastname}}, {{$item->firstname}} {{$item->middlename}}</span>, a legal age,  is a permanent resident of 
                                            <span class="fw-bold" >{{ $item->barangay }} Barangay Bolocaon, Kitaotao, Bukidnon</span> is the legal Heir of <br>
                                                    Please Specify:<br>
                                                            1. {{ request('treeType') }}<br>
                                                            2. {{ request('specifications') }}</p>
                                            <p class="mt-3" style="text-indent: 20px;">This certification/clearance is being issued upon the request of the above-named person for any possible requirements.</p>
                                            <p class="mt-3">Issued this <span>{{ now()->setTimezone('GMT+8')->formatLocalized('%B %d %Y') }} at the office of Punong Barangay at Bolocaon Kitaotao, Bukidnon..</span></p>
                                            <p class="text-uppercase" style="margin-top:40px;">NOT VALID WITHOUT SEAL:</p>
                                           
                                        </div>
                                            <div class="p-3 text-left mt-3">
                                                <h5 class="fw-bold mt-4 mb-0 text-uppercase">{{$sec->name}}</h5>
                                                <p>BARANGAY SECRETARY</p>
                                            </div>
                                            <br>
                                            
                                            <div class="p-3 text-right">
                                                
                                                <h5 class="fw-bold mb-0 text-right text-uppercase">{{$cman->name}}</h5>
                                                <p>PUNONG BARANGAY</p>
                                            </div>
                                        </div>
                                        
                                    </div>
								</div>
                                <div class="mt-0 text-left" >
               
                             </div>
</body>
</html>