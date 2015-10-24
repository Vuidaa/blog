<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<!-- place in header of your html document -->
<script type="text/javascript">
$(document).ready(function(){

	tinymce.init({
		selector: "#post",
		theme: "modern",
		plugins: 
		[
	     "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
	     "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
	     "save table contextmenu directionality emoticons template paste textcolor"
		],
		toolbar: 
		"insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",  
		image_class_list: 
		[
		        {title: 'responsive', value: 'img-responsive img-thumbnail'},
		        {title: 'no-class', value: ''}
		],
	});
});
</script>