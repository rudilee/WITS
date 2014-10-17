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
         cache: false
    });
    
    // Muat menu bar navigasi
    function loadNavigation(username) {
        $('#navbar-collapse').load('templates/navigation.html', function () {
            $('.badge').tooltip();
            
            // Routing link2 di menu bar dg nangkep semua link yg diklik terus cek isi hash-nya
            $('#navbar-collapse a').click(function (event) {
                if (this.hash !== '') {
                    var route = this.hash.replace('#', '');

                    // Cek apa ada di daftar routing
                    if ($.inArray(route, routes) > -1) {
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
            
            // Cari Work atau Issue berdasar isi judul & deskripsi, atau dari id-nya
            $('#search').submit(function(event) {
                var query = $('#query').val();
                
                if (query !== '') {
                    $('#content').load('templates/search.html', function() {
                        $.post('api/search', {
                            query: query
                        }).done(function(data, textStatus, jqXHR) {
                            var resultList = $('#result');

                            $('#search-query').text(data.query);

                            // Iterasi hasil pencarian, tampilin di semacem list-view gitu
                            $.each(data.result, function(indexInArray, value) {
                                resultList.append('<li>' + value + '</li>');
                            });
                        });
                    });
                }
                
                event.preventDefault();
            });
            
            // Tampilin username di option user
            $('#name').text(username);

            // Logout dari aplikasi
            $('#logout').click(function() {
                $.ajax({
                    url: 'api/user',
                    type: 'DELETE'
                }).done(function(data, textStatus, jqXHR) {
                    loadLoginForm();
                });
            });
        });
    }
    
    // Muat form login
    function loadLoginForm() {
        $('#content').load('templates/login.html', function () {
            $('#navbar-collapse').html('');
            
            // TODO: kalo berhasil login tampilin menu navigasi
            $('#login').submit(function(event) {
                $.post('api/user', {
                    username: $('#username').val(),
                    password: $('password').val()
                }).done(function(data, textStatus, jqXHR) {
                    loadNavigation(data.username);
                    
                    $('#content').html('<h1>Login Berhasil</h1>');
                }).fail(function(jqXHR, textStatus, errorThrown) {
                    if (errorThrown === 'Not Acceptable')
                        alert(JSON.parse(jqXHR.responseText).message);
                });
                
                event.preventDefault();
            });
        });
    }
    
    // Kalo request ajax gagal karna belum login(Unauthorized) tampilin form login
    $(document).ajaxError(function (event, jqXHR, ajaxSettings, thrownError) {
        if (thrownError === 'Unauthorized') {
            loadLoginForm();
        } else {
            // TODO: kalo error laen, tampilin messageBox kali?
            console.log('Result: ' + thrownError);
        }
    });
    
    // Cek sudah login atau belum
    $.get('api/user', function (data, textStatus, jqXHR) {
        loadNavigation(data.username);
    }, 'json');
});