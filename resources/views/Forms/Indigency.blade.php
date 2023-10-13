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
                                                <h5 class=" fw-bold mb-5">Certificate Of Indigency</h5>
                                            </div>
                                            <p class="fw-bold">TO WHOM IT MAY CONCERN:</p>
                                            <p class="mt-3" style="text-indent: 20px;">This is to certify that <span>{{$item->lastname}}, {{$item->firstname}} {{$item->middlename}}</span>, age of {{ \Carbon\Carbon::parse($item->birth_date)->age }}, a resident of 
                                            <span class="fw-bold" >Barangay Bolocaon, Kitaotao, Bukidnon</span> and that he/she is one of indigents in our barangay.</p>
                                            <p class="mt-3" style="text-indent: 20px;">THIS IS CERTIFIES FURTHER that the above-named person. He belongs to the indigent family of this Barangay whose annual income belongs to the poverty line.</p>
                                            <p class="mt-3" style="text-indent: 20px;">THIS CERTIFICATION is being issued upon the request of the above-named person to avail an Educational Assistant Program.</p>

                                            <p class="mt-3">Issued this <span>{{ now()->setTimezone('GMT+8')->formatLocalized('%B %d %Y') }} at the office of Punong Barangay at Bolocaon Kitaotao, Bukidnon..</span></p>
                                        </div>
                                        
                                       
                                        <div class="col-md-12" >
                                          
                                           
                                            
                                                <div class="p-3 text-left mt-4">
                                                    <h5 class="fw-bold mt-4 mb-0 text-uppercase">{{$sec->name}}</h5>
                                                    <p>BARANGAY SECRETARY</p>
                                                </div>
                                                <br>
                                            <div class="p-3 text-right">
                                             <br>   
                                                <h5 class="fw-bold mb-0 text-uppercase">{{$cman->name}}</h5>
                                                <p>PUNONG BARANGAY</p>
                                            </div>
                                        </div>
                                        <div class="mt-0 text-left" >
                                                    </div>
                                    </div>
								</div>
</body>
</html>