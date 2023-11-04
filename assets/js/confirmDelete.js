// JavaScript Document
function confirmDelete(){
	
	var del = confirm("Are you sure you want to delete this movie?");
	
    if (del == true){
		
       alert ("Movie has been deleted")
	   
    }else{
		
        alert("Failed to delete movie")
		
    }
    return del;
    }
}