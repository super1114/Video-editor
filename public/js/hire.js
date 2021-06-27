$(document).ready(function() {

    $("#company_id").on('change', function() {
        var sel_id = $(this).val();                
        var sel_company
        for(var i = 0; i< companies.length; i++) {
            if(companies[i].id == sel_id) {
                sel_company = companies[i];
            }
        }                
        $("#contact").val(sel_company['contact']);
        $("#email").val(sel_company['email']);  
        $("#phone").val(sel_company['phone']);  
        $("#mobile").val(sel_company['mobile']);  
        $("#address").val(sel_company['address']);  
    });

    $("#tanker_id").on('change', function() {
        var sel_id = $(this).val();
        var sel_tank;
        for(var i = 0; i< tankers.length; i++) {
            if(tankers[i].id == sel_id) {
                sel_tank = tankers[i];
            }
        }
        var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        var adr_expiry = new Date(sel_tank['adr_expiry']);
        var adr_expiry = adr_expiry.toLocaleDateString("en-US", options);
        var moto_expiry = new Date(sel_tank['mot_expiry']);
        var mot_expiry = moto_expiry.toLocaleDateString("en-US", options);

        $("#equipment").val(sel_tank['equipment']);
        $("#make").val(sel_tank['make']);
        $("#chassis").val(sel_tank['chassis_num']);
        $("#service_interval").val(sel_tank['service_interval']);
        $("#motoexpiry").val(mot_expiry);
        $("#adrexpiry").val(adr_expiry);
        
        var sel_op = sel_tank['discharge_pump'];
        if(sel_op) {
            $("#discharge-filled_t").attr('checked', true);
        } else {
            $("#discharge-filled_f").attr('checked', true);
        }
    });
});
