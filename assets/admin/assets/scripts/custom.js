jQuery(document).ready(function() {
    jQuery('.detailUkm').click(function(){       
        var id = $(this).attr('id');
        
        $.ajax({
            type: "POST",
            url: siteURL + "/ukm/ukmDetail/" + id, //here we are calling our user controller and get_cities method with the country_id

            success: function(data) {
                if (data) {
                    $('#ukmDetail').html('');
                    var code = '';
                    code += '<div class="span12">\n';
                    code += '<div class="portlet box grey">\n';
                    code += '<div class="portlet-title">\n';
                    code += '<div class="caption"><i class="icon-reorder"></i>UKM Profile</div>\n';
                    code += '<div class="tools"><a href="javascript:;" class="collapse"></a></div>\n';
                    code += '</div>\n';
                    code += '<div class="portlet-body">\n';
                    code += '<table class="table table-bordered table-hover">\n';
                    code += '<tbody>\n';
                    $.each(data, function(id, ukm) {
                        code += '<tr>\n';
                        code += '<td>Nama UKM</td>\n';
                        code += '<td>'+ukm['namaUKM']+'</td>\n';
                        code += '</tr>\n';
                        code += '<tr>\n';
                        code += '<td>Alamat UKM</td>\n';
                        code += '<td>'+ukm['alamatUKM']+'</td>\n';
                        code += '<tr>\n';
                        code += '<td>No Telepon UKM</td>\n';
                        code += '<td>'+ukm['teleponUKM']+'</td>\n';
                        code += '</tr>\n';
                        code += '<tr>\n';
                        code += '<td>No HP UKM</td>\n';
                        code += '<td>'+ukm['hpUKM']+'</td>\n';
                        code += '</tr>\n';
                        code += '<tr>\n';
                        code += '<td>Profil UKM</td>\n';
                        code += '<td>'+ukm['profilUKM']+'</td>\n';
                        code += '</tr>\n';
                        code += '<tr>\n';
                        code += '<td>Nama Pemilik</td>\n';
                        code += '<td>'+ukm['namaPemilik']+'</td>\n';
                        code += '</tr>\n';
                        code += '<tr>\n';
                        code += '<td>Alamat Pemilik</td>\n';
                        code += '<td>'+ukm['alamatPemilik']+'</td>\n';
                        code += '</tr>\n';
                        code += '<tr>\n';
                        code += '<td>Jenis Kelamin Pemilik</td>\n';
                        code += '<td>'+ukm['kelaminPemilik']+'</td>\n';
                        code += '</tr>\n';
                        code += '<tr>\n';
                        code += '<td>Kota Pemilik</td>\n';
                        code += '<td>'+ukm['kotaPemilik']+'</td>\n';
                        code += '</tr>\n';
                        
                    });
                    code += '</tbody>\n';
                    code += '</table>\n';
                    if(data[0]['isActive'] == 0){
                        code += '<p id="btnField" style="text-align: right;"><a href="#" class="btn red big" data-val="'+data[0]['idUser']+'" id="confirm">Confirm Request</a></p>\n';                        
                    }
                    code += '</div>\n';
                    code += '</div>\n';
                    code += '</div>\n';
                    code += '</div>\n';
                     
                    $('#ukmDetail').append(code);
                    
                    jQuery('#confirm').click(function(){
                        var id = $(this).attr('data-val');
                        var btn = '<a class="btn green big">Confirmed</a>\n';
                        var conf = confirm('Are you sure?');
                        if(conf)
                            $.post(siteURL + "/ukm/ukmConfirm", {
                                id: id
                            })
                            .done(function(data){
                                if(data == 'success'){
                                    jQuery('#confirm').remove();
                                    $('#btnField').append(btn); 
                                } else {
                                    alert('Maaf, terjadi kesalahan dalam proses konfirmasi');
                                }
                            });
                        // do some other stuff here
                        return false;
                    });
                    
                } else {
                    var opt = $('Profile UKM tidak tersedia');
                    $('#ukmDetail').append(opt);                
                }
            }
        });
    });
	
    jQuery('.detailIsi').click(function(){
        var isi = $(this).attr('data');
        var judul = $(this).attr('name');
        
        
        if (isi) {
            $('#isiArtikel').html('');
            var code = '';
            code += '<div class="portlet">\n';
            code += '<div class="portlet box grey">\n';
            code += '<div class="portlet-title">\n';
            code += '<div class="caption"><i class="icon-reorder"></i>Isi Artikel</div>\n';
            code += '<div class="tools"><a href="javascript:;" class="collapse"></a></div>\n';
            code += '</div>\n';
            code += '<div class="portlet-body">\n';
            code += '<div class="well">\n';
            code += '<h4>'+judul+'</h4>\n';
            code += isi+'\n';
            code += '</div>\n';
            code += '</div>\n';
            code += '</div>\n';
            code += '</div>\n';
            code += '</div>\n';
                     
            $('#isiArtikel').append(code);
                    
        } else {
            var opt = $('Isi artikel tidak tersedia');
            $('#isiArtikel').append(opt);                
        }
    });
    
    jQuery('.icon-trash, .delUkm').click(function(){
        var id = $(this).attr('data-val');
        var name = $(this).attr('name');
        var conf = confirm('Are you sure want to delete?');
        if(conf)
            jQuery(this).parents('tr').fadeOut(function(){
                $.post(siteURL + "/"+ name +"/"+ name +"Delete", {
                    id: id
                })
                .done(function(data){
                    alert(data);
                    if(data == 'success'){
                        var result = 'Data berhasil dihapus.';
                        jQuery(this).remove(); 
                    } else {
                        result = 'Data gagal dihapus.';
                    }
            
                    setTimeout(function () {
                        var unique_id = $.gritter.add({
                            // (string | mandatory) the heading of the notification
                            title: 'Perhatian!',
                            // (string | mandatory) the text inside the notification
                            text: result,
                            // (string | optional) the image to display on the left
                            // (bool | optional) if you want it to fade out on its own or just sit there
                            sticky: true,
                            // (int | optional) the time you want it to be alive for before fading out
                            time: '',
                            // (string | optional) the class name you want to apply to that specific message
                            class_name: 'my-sticky-class'
                        });

                        // You can have it return a unique id, this can be used to manually remove it later using
                        setTimeout(function () {
                            $.gritter.remove(unique_id, {
                                fade: true,
                                speed: 'slow'
                            });
                        }, 5000);
                    }, 0);
                });
            });
        return false;
    });
        
});
