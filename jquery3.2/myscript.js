$(document).ready(function() {
    $.ajax({
        url: "data.json",
        dataType: "json"
    }).done(function(response) {
        console.log(response);
        var x="";
        response.forEach(element => {
            console.log(element.name, element.Years,element.price,element.county);
            x += "<tr>"+
            "<td>"+element.name+"</td>"+
            "<td>"+element.Years+"</td>"+
            "<td>"+element.price+"</td>"+
            "<td>"+element.county+"</td></tr>";
            $('#kawin').html(x);
        });

    });
    $('#advance').hide();
    $('#advance-btn').click(function(){
        $('#advance').toggle();
    });
    $('#button-btn').click(function() {
        $.ajax({
            url: "data.json",
            dataType: "json"
        }).done(function(response) {
            var y = $('#input').val();
            var x="";
            response.forEach(element => {
                if(y == element.name){
                    console.log(element.name, element.Years,element.price,element.county);
                    x += "<tr>"+
                    "<td>"+element.name+"</td>"+
                    "<td>"+element.Years+"</td>"+
                    "<td>"+element.price+"</td>"+
                    "<td>"+element.county+"</td></tr>";
                    $('#kawin').html(x);
                }else if(y ==""){
                    console.log(element.name, element.Years,element.price,element.county);
                    x += "<tr>"+
                    "<td>"+element.name+"</td>"+
                    "<td>"+element.Years+"</td>"+
                    "<td>"+element.price+"</td>"+
                    "<td>"+element.county+"</td></tr>";
                    $('#kawin').html(x);
                }
            });
        })
    });
    $('#advance-search-btn').click(function(){
        $.ajax({
            url: "data.json",
            dataType: "json"
        }).done(function(response){
            var a = $('#Price-advance').val();
            a = parseInt(a);
            var b = $('#county-advance').val();
            var x ="";
            var r = response;
            console.log(a,b);
            console.log(r); 
            for(var i = 0; i<r.length;i++){
                if(a == r[i].price&&b == r[i].county){
                    x += "<tr>"+
                    "<td>"+r[i].name+"</td>"+
                    "<td>"+r[i].Years+"</td>"+
                    "<td>"+r[i].price+"</td>"+
                    "<td>"+r[i].county+"</td></tr>";
                    $('#kawin').html(x);
                }
            }
        }
    )})
})

