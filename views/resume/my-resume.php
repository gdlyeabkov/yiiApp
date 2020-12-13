<div class="content">
    <div class="container">
        <div class="col-lg-9">
            <div class="main-title mb32 mt50 d-flex justify-content-between align-items-center">Мои резюме
                <a href="http://myheadhunter/web/index.php?r=//resume/edit-reg-resume" class="link-orange-btn orange-btn my-vacancies-add-btn">Добавить резюме</a><a
                        class="my-vacancies-mobile-add-btn link-orange-btn orange-btn plus-btn" href="#">+</a></div>
            <div class="tabs mb64">
            <?php foreach($myResumeList as $oneResume): ?>
                <div class="tabs__content active">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex">
                                <div class="paragraph mb8 mr16">У вас <span><?= count($myResumeList) ?></span> резюме</div>
                            </div>
                            <div class="vakancy-page-block my-vacancies-block p-rel mb16">
                                <div class="row">
                                    <div class="my-resume-dropdown dropdown show mb8">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="<?= $oneResume->photo ?>" alt="dots">
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="http://myheadhunter/web/index.php?r=//resume/edit-reg-resume&edittedResumeID=<?= $oneResume->id ?>">Редактировать</a>
                                            <a class="dropdown-item" href="http://myheadhunter/web/index.php?r=//resume/edit-reg-resume-remove&edittedResumeID=<?= $oneResume->id ?>">Удалить</a>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 my-vacancies-block__left-col mb16">
                                        <h2 class="mini-title mb8"><?= $oneResume->salary ?> </h2>
                                        <div class="d-flex align-items-center flex-wrap mb8 ">
                                            <span class="mr16 paragraph"><?= $oneResume->salary ?> ₽</span>
                                            <span class="mr16 paragraph">Опыт работы <?= $oneResume->experience ?> года</span>
                                            <span class="mr16 paragraph"><?= $oneResume->recidense ?></span>
                                        </div>
                                        <div class="d-flex flex-wrap">
                                            <div class="paragraph mr16">
                                                <strong>Просмотров</strong>
                                                <span class="grey">
                                                    <?= $oneResume->views ?>

                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                            class="col-xl-12 d-flex justify-content-between align-items-center flex-wrap">
                                        <div class="d-flex flex-wrap mobile-mb12">
                                            <a class="mr16" href="http://myheadhunter/web/index.php?r=//resume/resume-view&id=<?= $oneResume->id ?>"">Открыть</a>
                                        </div>
                                        <span class="mini-paragraph cadet-blue">Опубликовано <?= $oneResume->date_updated ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
                
                
        </div>
    </div>
</div>