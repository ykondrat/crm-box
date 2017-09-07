var save_list = document.getElementById('save_list');
var save_section = document.getElementById('save_section');
var save_serv = document.getElementById('save_serv');
var save_post = document.getElementById('save_post');
var save_worker_btn = document.getElementById('add_new_worker');
var add_client_to_list_but = document.getElementById('save_client');
var client_sex_m = document.getElementById('men');
var client_sex_w = document.getElementById('women');
var client_sex;
var xml = new XMLHttpRequest;
var image_master;

save_post.onclick = function () {
    var new_post = document.getElementById('new_post_personal_input').value;
    xml.open("POST", "new_post");
    xml.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xml.send("post_name=" + new_post);
};
save_section.onclick = function () {
    var new_section = document.getElementById('section_input').value;

    xml.open("POST", "new_section");
    xml.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xml.send("section_name=" + new_section);
};
client_sex_m.addEventListener("click", function(){
    client_sex = "Мужской";
});
client_sex_w.addEventListener("click", function(){
    client_sex = "Женский";
});
add_client_to_list_but.addEventListener("click", function() {
    var client_name = document.getElementById('client_name').value;
    var client_phone = document.getElementById('phone_nb').value;
    var client_description = document.getElementById('client_description').value;

    xml.open("POST", 'save_client');
    xml.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xml.send("client_name=" + client_name + "&client_sex=" + client_sex + "&client_phone=" + client_phone + "&client_description=" + client_description);
});
save_serv.onclick = function () {
    var service_type = document.getElementById('select_section_new').value;
    var service_name = document.getElementById('service_name').value;
    var service_price = document.getElementById('service_price').value;
    var service_time = document.getElementById('service_time').value;
    var service_desc = document.getElementById('service_description').value;

    xml.open("POST", 'save_service');
    xml.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xml.send("service_type=" + service_type + "&service_name=" + service_name + "&service_price=" + service_price + "&service_time=" + service_time + "&service_desc=" + service_desc);
};
function previewFile() {
    var preview = document.querySelector('#master_photo');
    var file    = document.querySelector('input[type=file]').files[0];

    if ( /\.(jpe?g|png)$/i.test(file.name) ) {
        var reader = new FileReader();


        reader.addEventListener("load", function () {
            preview.src = reader.result;
            image_master = preview.src;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }
}
save_worker_btn.onclick = function () {
    var worker_name_sename = document.getElementById('name_secname').value;
    var worker_telephon_number = document.getElementById('telephon_number').value;
    var worker_mailik = $('#new_worker input').eq(2).val();
    var post = document.getElementById('post_select').value;
    var discription = document.getElementById('master_serv_add');
    var label = discription.getElementsByTagName('label');
    discription = "";

    for (var i = 0; label[i]; i++) {
        if (label[i + 1]) {
            discription += label[i].innerText + "$^$";
        } else {
            discription += label[i].innerText;
        }
    }

    xml.open('POST', 'worker_save');
    xml.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xml.send('worker_name_secname=' + worker_name_sename + '&worker_telephon_number=' + worker_telephon_number + '&worker_email=' + worker_mailik + '&worker_post=' + post + '&discription=' + discription + "&worker_image=" + image_master);
};
save_list.onclick = function () {
        var date = $("#date_l").val();
        var time = document.getElementById('sel_time').value;
        var section = document.getElementById('section_list_sel').value;
        var master_timetable = document.getElementById('sel_master').value;
        var service_visits = document.getElementById('service_visits').value;
        var price = document.getElementById('price_input').value;
        var duration = document.getElementById('duration_input').value;
        var phone_numb = document.getElementById('tel_input').value;
        var client_name = document.getElementById('name_input').value;
        var extra = document.getElementById('additionaly_input').value;
        var discount_type = document.getElementById('ps_or_cur').value;
        var discount = document.getElementById('discount_input').value;
        var discription = document.getElementById('note_txtarea').value;
        var all = document.getElementById('total_input').value;
        phone_numb = phone_numb.slice(1);
        phone_numb = phone_numb;
        console.log(phone_numb, client_name,master_timetable);
        console.log(this_td);
        $.ajax({
            type        :   'POST',
            url         :   'timetable',
            data        :   "date=" + date + "&time=" + time + "&section=" + section + "&master_timetable=" + master_timetable +
            "&service_visits=" + service_visits + "&price=" + price + "&duration=" + duration + "&phone_numb=" + phone_numb +
            "&client_name=" + client_name + "&extra=" + extra + "&discount_type=" + discount_type + "&discount=" + discount +
            "&discription=" + discription + "&all=" + all,
            dataType    :   'json',
            cache       :   false
        });
};