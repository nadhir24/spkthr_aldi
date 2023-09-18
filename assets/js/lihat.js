/**
 * Created by sankester on 14/05/2017.
 */

function hapus_lihat(id){
    $.ajax({
        url :  base_url + "karyawan/" + "delete/"+id,
        type : "POST",
        dataType : "JSON",
        success : function(data){
            location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            // alert('Error adding / update data');
            alert('Data Tidak Bisa Dihapus!, Data Sudah Digunakan!');
        }
    });
}
