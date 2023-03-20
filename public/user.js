$('#kategori').change(function(){
    var idKategori = $(this).val();    
    if(idKategori){
        $.ajax({
           type:"GET",
           url:"/getSubKategori?idKategori="+idKategori,
           dataType: 'JSON',
           success:function(res){               
            if(res){
                $("#subKategori").empty();
            
                $("#subKategori").append('<option>---Pilih subKategori---</option>');
               
                $.each(res,function(id_sub_kategori,nama_sub_kategori){
                    $("#subKategori").append('<option value="'+id_sub_kategori+'">'+nama_sub_kategori+'</option>');
                });
            }else{
               $("#kecamatan").empty();
              
            }
           }
        });
    }else{
        $("#subKategori").empty();
    
    }      
   });


