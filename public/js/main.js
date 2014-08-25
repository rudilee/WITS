jQuery(document).ready(function ($) {
    wits = {
        login: {
            test: 'Cuman ngetest doank'
        }
    };
    
    if (typeof wits.test === 'undefined')
        console.log('Test belum ada');
    
    $.getScript('js/test.js', function (script, textStatus, jqXHR) {
        if (typeof wits.test === 'undefined')
            console.log('Test masih belum ada');
        
        console.log('Sukses ' + wits.test);
        
        wits['doank']();
    });
    
    $('#navbar-collapse').load('templates/navigation.html', function () {
        $('.badge').tooltip();
        
        $('a').click(function (event) {
            if (this.hash !== '')
            console.log('Klik: ' + this.hash);
        });
    });
});