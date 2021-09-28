var urlsearch=window.location.search.slice(1);
urlsearch=urlsearch.replace("=",'":"');
urlsearch='{"'+urlsearch+'"}';
var usersearch=JSON.parse(urlsearch);
var search_id = usersearch.id;

$.post("http://localhost/web/php/courses.php", {search_idstr:search_id}, function(response){ 
      if (response!="not found") 
      	{
      		$(".course-details").html(response);
      	} 
      	
});