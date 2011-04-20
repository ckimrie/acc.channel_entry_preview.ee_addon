
// ==================================
// = Moresoda Preview Channel Entry =
// ==================================

//Self executing function so we dont clash with any other JS 
(function(){
	
	//We only fire IF there is a live look template
	
	
	//Container
	var container = $("#mainContent .pageContents");

	//Select all the preview content, but exclude the edit & preview links
	container.find(' *:not(#view_content_entry_links, #view_content_entry_links *)').hide();
	
	
	//Scrape the page to find the live look URL
	var live_look_url = "";
	container.find("#view_content_entry_links a").each(function(){
		if($(this).text() == "Live Look"){
			live_look_url = $(this).attr('href');
		}
	})
	
	
	
	//Style the iframe
	iframe_style = {
		"border" : "1px solid #ccc"
	}
	
	
	//Create the Iframe
	var iframe = $("<iframe />")
					.attr("height", "500")
					.attr("width", "100%")
					.attr("src", live_look_url)
					.css(iframe_style);
					
	//Add it to the page
	container.prepend(iframe);
	
})();


