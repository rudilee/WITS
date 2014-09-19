jQuery(document).ready(function ($) {
    // Variabel global untuk menampung semua objek2 sub-modul
    wits = {};
    
    var routes = [
        'create_new_work',
        'list_works',
        'create_new_issue',
        'list_issues',
        'change_password'
    ];
    
    // Cache hasil getScript()
    $.ajaxSetup({
        cache: true
    });
    
    // Muat menu bar navigasi
    function loadNavigation() {
        $('#navbar-collapse').load('templates/navigation.html', function () {
            $('.badge').tooltip();

            // Routing link2 di menu bar dg nangkep semua link yg diklik terus cek isi hash-nya
            $('#navbar-collapse a').click(function (event) {
                if (this.hash !== '') {
                    var route = this.hash.replace('#', '');

                    // Cek apa ada di daftar routing
                    if (typeof routes[route] !== 'undefined') {
                        // Kalo objek sub-modul belum ada muat script-nya terus render
                        if (typeof wits[route] === 'undefined') {
                            $.getScript('js/' + route + '.js', function (script, textStatus, jqXHR) {
                                wits[route].render();
                            });
                        } else {
                            wits[route].render();
                        }
                    }
                }
            });
        });
    }
    
    // Muat form login
    function loadLoginForm() {
        $('#content').load('templates/login.html', function () {
            // TODO: kalo berhasil login tampilin menu navigasi
        });
    }
    
    // Kalo request ajax gagal karna belum login(Unauthorized) tampilin form login
    $(document).ajaxError(function (event, jqXHR, ajaxSettings, thrownError) {
        if (thrownError === 'Unauthorized') {
            $('#navbar-collapse').html('');
            
            loadLoginForm();
        } else {
            // TODO: kalo error laen, tampilin messageBox kali?
        }
    });
    
    // Cek sudah login atau belum
    $.get('/user', function (data, textStatus, jqXHR) {
        loadNavigation();
    }, 'json').fail(function (jqXHR, textStatus, errorThrown) {
        loadLoginForm();
    });
});