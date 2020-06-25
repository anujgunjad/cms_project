<div class="suspect-form-div">
	<div class="text-center">
        <h1 class="main-head">संदेहियों की जानकारी </h1>
    </div>
    <div id="suspectFormDiv">
    	<form id="suspectform" class="suspect-form ui blue segment form" method="POST" action="insertFiles/ insert_suspectForm.php">
    		<div class="card card-body">
    			  <!--Add Mobile Number-->
    			<div class="contact-list py-4">
    				<div class=" text-center">
                        <h1 class="sub-head">संदेही का नंबर की जानकारी</h1>
                    </div>
                    <button type="button" class="add-number-btn ui button my-3" data-toggle="collapse" data-target="#suspect_no_details">
                        Add Number
                    </button>
                    <!------------------------------>
                    <!--Suspect Number detail form-->
                    <!------------------------------>
                    <div class="collapse" id="suspect_no_details">
                    	<div class="card card-body">
                            <div class="num-detail-form-div">
                            	<form id="num_detailform" class="num-detail-form ui blue segment form" method="POST"
                                                    action="insertFiles/insert_accountForm.php">
                                    <div class="three fields">
                                        <div class="field">
                                            <label>संदेही का नंबर </label>
                                            <input type="number" name="number_one" placeholder="संदेही का नंबर ">
                                        </div>
                                        <div class="field">
                                            <label>कंपनी</label>
                                            <input type="text" name="company" placeholder="कंपनी">
                                        </div>
                                        <div class="field">
                                            <label>पहचान दस्तावेज़</label>
                                            <input type="text" name="files" placeholder="पहचान दस्तावेज़">
                                        </div>
                                    </div>

                                    <div class="three fields">
                                        <div class="four wide field">
                                            <label>ईमेल जावक</label>
                                            <input type="date" name="email_sent" placeholder="ईमेल जावक">
                                        </div>
                                        <div class="four wide field">
                                            <label>ईमेल आवक</label>
                                            <input type="date" name="email_received" placeholder="ईमेल आवक">
                                        </div>
                                        <div class="eight wide field">
                                            <label>नाम</label>
                                            <input type="text" name="suspect_name" placeholder="नाम">
                                        </div>
                                    </div>

                                    <div class="four fields">
                                        <div class="field">
                                            <label>पता</label>
                                            <input type="text" name="suspect_address" placeholder="पता">
                                        </div>
                                        <div class="field">
                                            <label>जिला</label>
                                            <input type="text" name="district" placeholder="जिला">
                                        </div>
                                        <div class="field">
                                            <label>प्रदेश</label>
                                            <input type="text" name="city" placeholder="प्रदेश">
                                        </div>
                                        <div class="field">
                                            <label>रिटेलर नाम</label>
                                            <input type="text" name="retailer_name" placeholder="रिटेलर नाम">
                                        </div>
                                    </div>

                                    <div class="four fields">
                                        <div class="fifteen wide field">
                                            <label>यू आई डी नंबर</label>
                                            <input type="number" name="uid_num" placeholder="यू आई डी नंबर">
                                        </div>
                                        <div class="fifteen wide field">
                                            <label>अन्य नंबर</label>
                                            <input type="number" name="other_num" placeholder="अन्य नंबर">
                                        </div>
                                        <div class="nine wide field">
                                            <label>पीडीएफ</label>
                                            <input type="text" name="pdf" placeholder="पीडीएफ">
                                        </div>
                                        <div class="field">
                                            <label>तस्दीक</label>
                                            <div class="fields">
                                                <select name="crime_type" class="ui fluid dropdown">
                                                    <option value='' selected='' disabled=''>तस्दीक</option>
                                                    <option value='' id=''>हाँ</option>
                                                    <option value='' id=''>नही</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="four fields">
                                        <div class="nine wide field">
                                            <label>रिमार्क्स</label>
                                            <input type="text" name="remark" placeholder="रिमार्क्स">
                                        </div>
                                        <div class="three wide field">
                                            <label>रिमाइंडर</label>
                                            <input type="date" name="reminder" placeholder="रिमाइंडर">
                                        </div>
                                        <div class="nine wide field">
                                            <label>मेल आई डी</label>
                                            <input type="email" name="mail_id" placeholder="मेल आई डी">
                                        </div>
                                        <div class="three wide field">
                                            <label>कैफ दिनाक</label>
                                            <input type="date" name="caf_date" placeholder="कैफ दिनाक">
                                        </div>
                                    </div>
                                    <!-------------------------->
                                    <!--------CDR details------->
                                    <!-------------------------->
                                    <button type="button" class="add-number-cdr-btn ui button my-3" data-toggle="collapse" data-target="#suspect_no_cdr_details">
                                        Add CDR details
                                    </button>
                                    <div  class="collapse" id="suspect_no_cdr_details">
                                        <div class="card card-body">
                                            <div class="four fields">
                                                <div class="nine wide field">
                                                    <label>सी डी आर नंबर </label>
                                                    <input type="number" name="cdr_number" placeholder="सी डी आर नंबर">
                                                </div>
                                                <div class="three wide field">
                                                    <label>इमेल जावक </label>
                                                    <input type="date" name="cdr_email_outgoing" placeholder="इमेल जावक">
                                                </div>
                                                <div class="three wide field">
                                                    <label>मेल प्राप्त </label>
                                                    <input type="date" name="cdr_mail_recieved" placeholder="मेल प्राप्त दिनाक">
                                                </div>
                                                <div class="nine wide field">
                                                    <label>IMEI</label>
                                                    <input type="number" name="imei_number" placeholder="IMEI number">
                                                </div>    
                                            </div>
                                            <div class="four fields">
                                                <div class="six wide field">
                                                    <label>IMSI</label>
                                                    <input type="number" name="imsi_number" placeholder="IMSI number">
                                                </div>
                                                <div class="nine wide field">
                                                    <label>लोकेशन  </label>
                                                    <input type="text" name="cdr_location" placeholder="लोकेशन">
                                                </div>
                                                <div class="three wide field">
                                                    <label>लोकेशन दिनाक समय  </label>
                                                    <input type="datetime-local" name="cdr_location_datetime" placeholder="लोकेशन दिनाक समय">
                                                </div>
                                                <div class="six wide field">
                                                    <label>Frequent callers 5</label>
                                                    <input type="number" name="cdr_frequent_caller" placeholder="Frequent callers 5">
                                                </div>    
                                            </div>
                                            <div class="four fields">
                                                <div class="six wide field">
                                                    <label>night location</label>
                                                    <input type="text" name="cdr_night_location" placeholder="night location">
                                                </div>
                                                <div class="eight wide field">
                                                    <label>messages bank/UPI/wallet/services name  </label>
                                                    <input type="text" name="cdr_services_name" placeholder="messages bank/UPI/wallet/services name">
                                                </div>
                                                <div class="seven wide field">
                                                    <label>संदिग्ध नंबर </label>
                                                    <input type="number" name="cdr_suspect_number" placeholder="संदिग्ध नंबर">
                                                </div>
                                                <div class="six wide field">
                                                    <label>सी डी आर, पी डी ऍफ़ </label>
                                                    <input type="file" name="cdr_pdf" placeholder="सी डी आर, पी डी ऍफ़">
                                                </div>    
                                            </div>
                                        </div>
                                    </div>
                                    <!-------------------------->
                                    <!---CDR details ends------->
                                    <!-------------------------->

                                    <!----------------------------->
                                    <!---------IPDR details-------->
                                    <!----------------------------->
                                    <button type="button" class="add-number-ipdr-btn ui button my-3" data-toggle="collapse" data-target="#suspect_no_ipdr_details">
                                                            Add IPDR details
                                    </button>
                                    <div  class="collapse" id="suspect_no_ipdr_details"> 
                                    	<div class="five fields">
                                            <div class="six wide field">
                                                <label>आई पी डी आर </label>
                                                <input type="number" name="ipdr_number" placeholder="आई पी डी आर ">
                                            </div>
                                            <div class="three wide field">
                                                <label>इमेल जावक </label>
                                                <input type="date" name="ipdr_email_outgoing" placeholder="इमेल जावक">
                                            </div>
                                            <div class="three wide field">
                                                <label>मेल प्राप्त </label>
                                                <input type="date" name="ipdr_mail_recieved" placeholder="मेल प्राप्त दिनाक">
                                            </div>
                                            <div class="six wide field">
                                                <label>लोकेशन </label>
                                                <input type="text" name="ipdr_location" placeholder="लोकेशन">
                                            </div>
                                            <div class="six wide field">
                                                <label>Websites/apps </label>
                                                <input type="text" name="ipdr_websites" placeholder="Websites/apps">
                                            </div>    
                                        </div>
                                    </div>
                                    <!----------------------------->
                                    <!------IPDR details ends------>
                                    <!----------------------------->
                                    <div class="field">
	                                    <button class="ui button form-btn" name="number_form" type="submit">
	                                    	Submit
	                                	</button>
                                	</div>
                                </form>
                           	</div>
                        </div>
                    </div>
                    <!----------------------------------->
                 	<!--Suspect Number Detail Form Ends-->
                    <!----------------------------------->
                    <table class="table table-bordered p-0 m-0">
                        <thead>
                            <tr id="table-head">
                                <th scope="col">S.No</th>
                                <th scope="col">Phone numbers</th>
                                <th scope="col">Update/Delete</th>
                            </tr>
                        </thead>
                        <tbody id="old-row">
                            <tr>
                                <td>No Number Added Yet</td>
                                <td>No Number Added Yet</td>
                                <td>No Number Added Yet</td>
                            </tr>
                        </tbody>
                        <tbody id="new-row"></tbody>
                    </table>
    			</div>
    		</div>
        </form>
    </div>
</div>