// JavaScript Document

		$(document).ready(function(){  
			$('#addMovie').click(function(){
				var mTitle = $('#mTitle').val(); 
				var mTrailerLink = $('#mTrailerLink').val(); 
				var mSynopsis = $('#mSynopsis').val(); 
				var mReleaseDate = $('#mReleaseDate').val(); 
				var mLanguage = $('#mLanguage').val(); 
				var mSubtitle = $('#mSubtitle').val(); 
				var mGenre = $('#mGenre').val(); 
				var mRuntime = $('#mRuntime').val(); 
				var mDirector = $('#mDirector').val(); 
				var mCast = $('#mCast').val(); 
				var mDistributor = $('#mDistributor').val();
				var mImage = $('#mImage').val(); 

				if(mTitle == '')  
				{  
					alert("Please Enter Movie Title");  
					return false;  
				}
				if(mTrailerLink == '')  
				{  
					alert("Please Enter Movie Trailer Link");  
					return false;  
				}
				if(mSynopsis == '')  
				{  
					alert("Please Enter Movie Synopsis");  
					return false;  
				}
				if(mReleaseDate == '')  
				{  
					alert("Please Enter Movie Release Date");  
					return false;  
				}
				if(mLanguage == '')  
				{  
					alert("Please Enter Movie Language");  
					return false;  
				}
				if(mSubtitle == '')  
				{  
					alert("Please Enter Movie Subtitle");  
					return false;  
				}
				if(mGenre == '')  
				{  
					alert("Please Enter Movie Genre");  
					return false;  
				}
				if(mRuntime == '')  
				{  
					alert("Please Enter Movie Runtime");  
					return false;  
				}
				if(mDirector == '')  
				{  
					alert("Please Enter Movie Director");  
					return false;  
				}
				if(mCast == '')  
				{  
					alert("Please Enter Movie Cast");  
					return false;  
				}
				if(mDistributor == '')  
				{  
					alert("Please Enter Movie Distributor");  
					return false;  
				}
				if(mImage == '')  
				{  
					alert("Please Select Image For Movie");  
					return false;  
				}  
				else  
				{  
					var extension = $('#mImage').val().split('.').pop().toLowerCase();  
					if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
					{  
						 alert('Invalid Image File');  
						 $('#mImage').val('');  
						 return false;  
					}  
				}  
			  });  
		 });  

		$(document).ready(function(){  
			$('#registerMember').click(function(){
				var custName = $('#custName').val(); 
				var custEmail = $('#custEmail').val(); 
				var custUsername = $('#custUsername').val();
				var custPW = $('#custPW').val(); 
				var custNRIC = $('#custNRIC').val(); 
				var custPhoneNum = $('#custPhoneNum').val(); 
				var custGender = $('#custGender').val(); 
				var custDOB = $('#custDOB').val(); 
				var custRace = $('#custRace').val(); 
				var custState = $('#custState').val(); 
				var custAddress = $('#custAddress').val(); 
				var custCity = $('#custCity').val(); 
				var custPostcode = $('#custPostcode').val(); 

				if(custName == '')  
				{  
					alert("Full Name must be filled out");  
					return false;  
				}if(custEmail == '')  
				{  
					alert("Email must be filled out");  
					return false;  
				}if(custUsername == '')  
				{  
					alert("Please Enter Username for Account Login");  
					return false;  
				}if(custPW == '')  
				{  
					alert("Please Enter Password for Account Login");  
					return false;  
				}if(custNRIC == '')  
				{  
					alert("IC Number must be filled out");  
					return false;  
				}if(custPhoneNum == '')  
				{  
					alert("Phone Number must be filled out");  
					return false;  
				}if(custGender == '')  
				{  
					alert("Please Select Gender");  
					return false;  
				}if(custDOB == '')  
				{  
					alert("Please Enter Date of Birth");  
					return false;  
				}if(custRace == '')  
				{  
					alert("Please Select Race");  
					return false;  
				}if(custState == '')  
				{  
					alert("Please Select State");  
					return false;  
				}
				if(custAddress == '')  
				{  
					alert("Address must be filled out");  
					return false;  
				}
				if(custCity == '')  
				{  
					alert("City must be filled out");  
					return false;  
				}
				if(custPostcode == '')  
				{  
					alert("Postcode must be filled out");  
					return false;  
				}

			  });  
		 });  

		 $(document).ready(function(){ 
			$('#purchaseTicket').click(function(){
				var p_mTitle = $('#p_mTitle').val(); 
				var p_Date = $('#p_Date').val(); 
				var p_mShowtime = $('#p_mShowtime').val();
				var p_mNumTicket = $('#p_mNumTicket').val();

				if(p_mTitle == '')  
				{  
					alert("Please Select a Movie");  
					return false;  
				}if(p_Date == '')  
				{  
					alert("Please Select Date ");  
					return false;  
				}if(p_mShowtime == '')  
				{  
					alert("Please Select Showtime");  
					return false;  
				}if(p_mNumTicket == '')  
				{  
					alert("Please Enter Ticket Amount");  
					return false;  
				}

			  });  
		 });

		$(document).ready(function () {
			$('#seatReserve').click(function() {
				checked = $("input[type=checkbox]:checked").length;
				var num = $('#p_mNumTicket').val();

				if(!checked) {
					alert('Please Select ' + num + ' Seats to Proceed.');
					return false;
				}

			});
		});

		$(document).ready(function () {
			$("input[name='p_Seat[]']").change(function () {
				var maxAllowed = $('#p_mNumTicket').val();

				var cnt = $("input[name='p_Seat[]']:checked").length;
				if (cnt > maxAllowed) {
					$(this).prop("checked", "");
					alert('You Can Only Select Maximum ' + maxAllowed + ' Seat.');
				}
			});	
		});

