
$(document).ready(function(){
	$("#avatar").change(function(){
		var preview = $("#preview");
		if(this.files && this.files[0]){
			preview[0].src=URL.createObjectURL(this.files[0]);
			preview.show();
		}else{
			preview.hide();
		}
	});
});

// var view= document.getElementById('avatar');

// view.addEventListener('change',function(){
// 	var preview=document.getElementById('preview');
// 	if(this.files && this.files[0]){
// 		preview.src=URL.createObjectURL(this.files[0]);
// 			preview.style.display='block';
// 		}else{
// 			preview.style.display='none';
// 		}
// });







