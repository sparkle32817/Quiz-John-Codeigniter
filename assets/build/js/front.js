$(document).ready(function () {

    var quizPairs = getQuiz(), images = getImages(), cur_index=0, maxCount = 40, completeCount = 30;
    var totalCnt = new Array(5).fill(0);

    $("#total-value").text(completeCount);
    setImage(cur_index);

    $(".quiz-div").on("click", function () {

        var category_id = quizPairs[cur_index][$(this).attr('cur')+"_id"];
        totalCnt[category_id-1]++;

        var response = "";
        $.ajax({
            url: base_url + "data/raiseCount",
            method: 'POST',
            data:{
                cur_index: cur_index,
                arr_index: category_id-1
            },
            dataType: 'text',
            async: false,
            success: function (data) {
                response = data;
                console.log(response);
            }
        });

        if (response != "success")
        {
            // return;
        }

        cur_index++;

        var rating = (cur_index/completeCount)*100;

        if (cur_index >= maxCount)
        {
            //Go to view page
            window.location.href = base_url + "result";

            console.log("You reached to Max Count.");
            return;
        }

        if (cur_index <= completeCount)
        {
            $(".progress-bar").css('width', rating+"%");
            $("#cur-value").text(cur_index);

        }

        if (cur_index >= completeCount)
        {
            $(".div-result-button").css("display", "block");

            console.log("You reached to Completion Count.");
        }

        $(".quiz-div").fadeOut(500, function() {

            setImage(cur_index);

            $(".quiz-div").fadeIn(300);
        });
    });

    function getQuiz() {

        var quizPairs = [];

        $.ajax({
            url: base_url + "data/getQuizPairs",
            dataType: 'json',
            async: false,
            success:
                function (data) {
                    quizPairs = data;
                }
        });

        return quizPairs;
    }

    function getImages() {

        var images = [];
        $.ajax({
            url: base_url + "data/getImages",
            dataType: 'json',
            async: false,
            success:
                function (data) {
                    images = data;
                }
        });

        return images;
    }

    function setImage(index) {

        var first_category_id = quizPairs[index]["first_id"];
        var second_category_id = quizPairs[index]["second_id"];

        var txt_first = quizPairs[index]['first'];
        var txt_second = quizPairs[index]['second'];

        var first_img_index = Math.floor(Math.random()*images[first_category_id][txt_first].length);
        var second_img_index = Math.floor(Math.random()*images[second_category_id][txt_second].length);

        $("#img-quiz-first").attr("src", images[first_category_id][txt_first][first_img_index]);
        $("#img-quiz-second").attr("src", images[second_category_id][txt_second][second_img_index]);
        $("#text-quiz-first").text(txt_first);
        $("#text-quiz-second").text(txt_second);
    }
});