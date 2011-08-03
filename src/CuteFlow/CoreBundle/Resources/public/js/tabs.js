function showTab(name) {
    
    $('div#content .tab-content').each(function(index){
       $(this).hide(); 
    });
    
    $('div.tabs a').removeClass('selected');
    $('#tab-content-'+name).show();
    $('#tab-'+name).addClass('selected');
}