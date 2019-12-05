<div class="main-content">
    <section class="section">
        <div class="row ">
        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-green-dark">
            <div class="card-statistic-3">
                <div class="card-icon card-icon-large"><i class="fa fa-award"></i></div>
                <div class="card-content">
                <h4 class="card-title">Total Exams</h4>
                <span><?php echo $dt_exam->num_rows();?></span>
                <div class="progress mt-1 mb-1" data-height="8">
                    <div class="progress-bar l-bg-purple" role="progressbar" data-width="<?php echo $dt_exam->num_rows();?>%" aria-valuenow="25"
                    aria-valuemin="0" aria-valuemax="100">
                    </div>
                </div>
                <p class="mb-0 text-sm">
                    <span class="mr-2"><i class=""></i>Current Date :</span>
                    <span class="text-nowrap"><?= date('Y-m-d H:i:sa');?></span>
                </p>
                </div>
            </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-cyan-dark">
            <div class="card-statistic-3">
                <div class="card-icon card-icon-large"><i class="fa fa-briefcase"></i></div>
                <div class="card-content">
                <h4 class="card-title">Total Subjects</h4>
                <span><?php echo $dt_subject->num_rows();?></span>
                <div class="progress mt-1 mb-1" data-height="8">
                    <div class="progress-bar l-bg-orange" role="progressbar" data-width="<?php echo $dt_subject->num_rows();?>%" aria-valuenow="25"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mb-0 text-sm">
                    <span class="mr-2"><i class=""></i>Current Date : </span>
                    <span class="text-nowrap"><?= date('Y-m-d H:i:sa');?></span>
                </p>
                </div>
            </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-cyan-dark">
            <div class="card-statistic-3">
                <div class="card-icon card-icon-large"><i class="fa fa-briefcase"></i></div>
                <div class="card-content">
                <h4 class="card-title">All Practice Set</h4>
                <span><?php echo $dt_test->num_rows();?></span>
                <div class="progress mt-1 mb-1" data-height="8">
                    <div class="progress-bar l-bg-orange" role="progressbar" data-width="<?php echo $dt_test->num_rows();?>%" aria-valuenow="25"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mb-0 text-sm">
                    <span class="mr-2"><i class=""></i>Current Date :</span>
                    <span class="text-nowrap"><?= date('Y-m-d H:i:sa');?></span>
                </p>
                </div>
            </div>
            </div>
        </div>
    </section>
</div>