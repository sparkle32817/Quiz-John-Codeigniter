$(document).ready(function () {

    var categories = getCategories();
    console.log("categories::", categories);

    var str_order = '';
    categories.map(function (category, index) {
        str_order += '<div class="col-md-12 col-sm-12">\n' +
                    '    <a class="order-link" order="'+(index+1)+'"><h3>'+(index+1)+'.&nbsp;'+category.category+'</h3></a>\n' +
                    '</div>';
    });
    $('#data-order').html(str_order);

    var chart = AmCharts.makeChart("div-chart", {
        "type": "pie",
        "theme": "light",

        "fontFamily": 'Open Sans',

        "color":    '#888',

        "dataProvider": categories,
        "valueField": "count",
        "titleField": "category",
        "outlineAlpha": 0.4,
        "depth3D": 15,
        "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
        "angle": 30,
        "exportConfig": {
            menuItems: [{
                icon: '/lib/3/images/export.png',
                format: 'png'
            }]
        }
    });

    $(".order-link").on("click", function () {

        var order = $(this).attr("order");

        if ( order == 1 )
        {
            $("#video-source").attr("src", "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4");
            $(".video").load();

            $("#div-video1").css("display", "block");
        }
        else if ( order == 2 )
        {
            $("#video-source").attr("src", "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4");
            $(".video").load();

            $("#div-video1").css("display", "block");
        }
        else
        {
            $("#div-video1").css("display", "none");
        }
    });

    function getCategories() {

        var categories = [];
        $.ajax({
            url: base_url + "data/getCategories",
            method: "GET",
            dataType: "json",
            async: false,
            success: function (data) {
                categories = data;
            }
        });

        for (var i=0; i<categories.length-1; i++)
        {
            for (var j=i+1; j<categories.length; j++)
            {
                if (categories[i]["count"] < categories[j]["count"])
                {
                    [categories[i], categories[j]] = [categories[j], categories[i]];
                }
            }
        }

        return categories;
    }

});