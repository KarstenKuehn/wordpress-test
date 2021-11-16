
var d = new Date();

var tag = d.getDate();

var monat = d.getMonth() + 1;

var jahr = d.getFullYear();
var hours = ('0'+d.getHours()).substr(-2);
var minutes = ('0'+d.getMinutes()).substr(-2);
var seconds = ('0'+d.getSeconds()).substr(-2);  

//var uhrzeit = tag + "." + monat + "." + jahr ;
var uhrzeit = jahr + "-" + monat + "-" + tag+'T'+hours+':'+minutes+':'+seconds ;

vergabe_links = document.querySelectorAll('.vergabe-link');

	if(vergabe_links.length>0)
	{
		for (c = 0; c < vergabe_links.length; ++c) {
			datei_ablaufdatum=vergabe_links[c].getAttribute('dateto');
  			if(Date.parse(datei_ablaufdatum) < Date.parse(uhrzeit))
  			{
				vergabe_links[c].remove()	
			}
		
		}
	}

var video = $('.stage-video video');
var replacement = '_portraite.';
if(video.length>0)
{






var video_datei = video.attr('src');
var video_datei_mob = video_datei.replace(/.([^.]*)$/, replacement + '$1');

$.ajax({
    url:video_datei_mob,
    type:'HEAD',
    error: function()
    {
        //file not exists
        video_datei_mob = video_datei;
    },
    success: function()
    {

    }
});

}
function videoSizeUpdate(video)
{
	var WindowWidth = $(window).width();
	if (WindowWidth < 768) {
	    //It is a small screen
	    video.attr('src',video_datei_mob);
	    video.parent().addClass('mobile');
	} else {
	    //It is a big screen or desktop
		video.parent().removeClass('mobile');    
		video.attr('src',video_datei);
	}
}

videoSizeUpdate(video);
$(window).on('resize', function(){
	if(video.length>0)
{
videoSizeUpdate(video);
}
});