<div class="main">
    <div class="container">
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            <!-- BEGIN CONTENT -->
            <div class="col-md-12 col-sm-12">
                <div class="content-page">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 blog-posts">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-12 quiz-div thumbnail" cur="first">
                                    <img id="img-quiz-first" class="img" src="" style="max-width:100%;height: 100%;">
                                    <div class="quiz-text-div">
                                        <h2 class="quiz-text" id="text-quiz-first"></h2>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 quiz-div thumbnail" cur="second">
                                    <img id="img-quiz-second" class="img" src="" style="max-width:100%;height: 100%;">
                                    <div class="quiz-text-div">
                                        <h2 class="quiz-text" id="text-quiz-second"></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12" style="text-align: center; font-weight: bold;">
                                    <span id="cur-value">0</span>/
                                    <span id="total-value">30</span>
                                </div>
                                <div class="col-md-12 col-sm-12 div-result-button">
                                    <a href="<?= base_url('result'); ?>" class="btn blue btn-circle" style="float: right;">View Result&nbsp;&nbsp;<i class="fa fa-bar-chart-o"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
    </div>
</div>